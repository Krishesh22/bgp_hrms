<<<<<<< HEAD
<div class="card" ng-show="btnstatus">
    <h5 class="card-header">Approval Status</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm ">
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
                        <th>Send
                            Approval
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>HR</td>
                        <td> <input type="text" class="form-control" ng-model="HR_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="HR_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="HR_Notes" ng-disabled="HR_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnHR" ng-click="SendMAILHR_Approve2();">Send</button>
                            <!-- ng-disabled="btnHR" -->
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>DH</td>
                        <td> <input type="text" class="form-control" ng-model="DH_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="DH_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="DH_Notes" ng-disabled="DH_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnDH" ng-click="SendMAILDH_Approve2();">Send</button>
                            <!-- ng-disabled="btnDH" -->
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>GM</td>
                        <td> <input type="text" class="form-control" ng-model="GM_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="GM_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="GM_Notes" ng-disabled="GM_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnGM" ng-click="SendMAILGM_Approve2()">Send</button>
                            <!-- ng-disabled="btnGM" -->
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>ADMIN</td>
                        <td> <input type="text" class="form-control" ng-model="ADMIN_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="ADMIN_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="ADMIN_Notes" ng-disabled="ADMIN_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnMD" ng-click="SendMAILGM_Approve()">Send</button>
                            <!-- ng-disabled="btnMD" -->
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Employee
                        </td>
                        <td> <input type="text" class="form-control" ng-model="EmployeeAccepted" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="Employeeofferaccepteddatetime" readonly>
                        </td>
                        <td>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card" ng-show="btnsettlement">
    <h5 class="card-header">Settlement Details</h5>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-6">

                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Settlement Date
                        </label>

                    </div>
                    <div class="col-lg-6">
                        <!-- <input type="text" class="form-control" ng-model="Settlementdate"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')"> -->

                        <input type="date" class="form-control" ng-model="Settlementdate" onfocus="(this.type='date')" onblur="(this.type='date')">

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Employee Name
                        </label>

                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" ng-model="Employeename" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Employee No
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="Employeeid" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Department
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="EmpDepartment" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Designation
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="EmpDesignation" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Date Of Joining
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="Date_Of_Joing2" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Date Of Releiving
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="ReleivingDate2" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Basic Wages/Day
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="BasicDay" autocomplete="off" readonly>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="col-form-label">

                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Total Days
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Amount
                        </label>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Total worked days
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="BonusBasicDays" autocomplete="off" readonly>

                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="BonusBasicAmounts" autocomplete="off" readonly>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Leave Balance days
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="CausalBasicDays" autocomplete="off" readonly>
                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="CausalBasicAmounts" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Gratuity
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="GratuityBasicDays" autocomplete="off" readonly>

                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="GratuityBasicAmounts" autocomplete="off" readonly>

                    </div>


                </div>


                <div class="row">

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Total
                        </label>
                    </div>
                    <!-- <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="TotalDays" autocomplete="off" readonly>

                    </div> -->
                    <div class="col-lg-4"></div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="Settlementtotal" autocomplete="off" readonly>

                    </div>


                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <button class="btn btn-sm btn-rounded btn-success" ng-click="UpdateSettlementDetails();"><i class="fa fa-save"></i> Update</button>
                            <button class="btn btn-sm btn-rounded btn-info" ng-click="CalculateEL();"><i class="fa fa-calculator"></i> Calculate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered  table-sm table-striped">
                <thead>
                    <tr class="text-green">
                        <th>Month-Year</th>

                        <th>Worked days</th>
                        <th>Balance&nbsp;EL</th>

                    </tr>
                </thead>
                <tbody>

                    <tr dir-paginate="e in GetempSettleList |filter:searchEmployeessss|itemsPerPage:10" pagination-id="Employeegrid">
                        <td>{{e.SalMonth}}-{{e.Salyear}}</td>
                        <td>{{e.TotalWorkingdays}}</td>
                        <td>{{e.TotalBalanceEL}}</td>

                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>



<div class="card" ng-show="btnHandover">

    <h5 class="card-header text-green">Handover Details</h5>

    <div class="card-body">
        <div class="row">
            <div class="table-responsive custom-table custom-table-noborder col-lg-4">
                <table class="table table-bordered table-sm">
                    <tr>
                        <td> <label class="col-form-label">S.No</label>
                        </td>
                        <td> <input class="form-control" ng-model="HandNextno" id="HandNextno" readonly /> </td>
                    </tr>
                    <tr>
                        <td> <label class="col-form-label">Description</label>
                        </td>
                        <td> <input class="form-control" ng-model="description" id="description" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td> <label class="col-form-label">Select_file</label>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="file" class="form-control" ng-model="handoverDoc" id="filehandoverInput04" name=files[] accept="image/png, image/gif, image/jpeg,application/pdf">
                                <div class="input-group-append">
                                    <p id="filehandoverButton04" class="input-group-text">
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
                                <th scope="col">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="e in GetHandoverList|filter:searchHandover|itemsPerPage:5" pagination-id="Handovergrid" current-page="currentPageHandover">
                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageHandover - 1) * pageSizeHandover}}
                                </td>
                                <td>{{e.description}}</td>
                                <td>
                                    <div class="action-btn">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1Handover" ng-click="Fetchempdoc(e.Employeeid,e.Sno);" src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                        <img height="15" ng-click="Fetchempdoc(e.Employeeid,e.Sno);" src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1HandoverView" ng-click="Fetchempdoc(e.Employeeid,e.Sno);" src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <dir-pagination-controls pagination-id="Handovergrid" max-size="3" direction-links="true" boundary-links="true" class="pagination">
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-right">
        <button class="btn btn-sm btn-success" ng-click="Update_Handoveremp();">Update</button>
        <button class="btn btn-sm btn-danger" ng-click="ResetHandover();">Clear(Next)</button>
    </div>
</div>



<div class="card" ng-show="btnHandForm">
    <h5 class="card-header text-green">Handover Form</h5>
    <div class="card-body">
        <a id="HandoverFormBtn" class="btn btn-sm btn-info btn-nda-down mb-0"><i class="fa fa-download"></i> Download</a>
        <div class="row">
            <div class="col-md-12">
                <div id="handOverFormExport">

                    <style>
                        table {
                            max-width: 794px;
                            position: relative;
                        }

                        .date {
                            left: 685px;
                            top: 83px
                        }

                        .handover-data table {
                            width: 100%;
                        }

                        .handover-data table,
                        .handover-data td,
                        .handover-data th {
                            border: 1px solid #888888;
                            border-collapse: collapse;
                        }

                        table.no-border td,
                        table.no-border th {
                            border: 1px solid transparent;
                            border-collapse: collapse;
                            font-size: 1rem !important;
                        }

                        .handover-data td,
                        .handover-data th {
                            padding: 3px;
                            height: 45px;
                            font-size: 13px;
                        }

                        .handover-data th {
                            background: #f0e6cc;
                        }

                        .handover-data .even {
                            background: #fbf8f0;
                        }

                        .handover-data .odd {
                            background: #fefcf9;
                        }

                        .handover-data .settlement-logo {
                            height: 45px;
                            position: absolute;
                            margin: 2px 0 0px 0px
                        }

                        .handover-data {
                            position: relative;
                        }

                        .text-center {
                            text-align: center;
                        }

                        .text-bold {
                            font-weight: bold;
                        }

                        .form-head {
                            font-weight: bold;
                            background-color: #f5f5f5;
                        }
                    </style>
                    <div class='handover-data'>
                        <table class=''>
                            <tbody>
                                <tr>
                                    <td colspan='6'>
                                        <img class='settlement-logo' src='sainmarks.png'>
                                        <center><b>{{Clientname}}</b><br />
                                            {{ClientAddressLine1}}
                                            {{ClientAddressLine2}},<br />
                                            {{ClientAddressLine3}}<br />
                                            {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                                        </center>
                                    </td>
                                <tr>
                                    <td colspan="6" class="text-center form-head">List of Hand Over Documents/Equipments and Others</td>
                                </tr>
                                <tr class="text-center text-bold">
                                    <td style="width:6%">S.NO</td>
                                    <td>Particulars</td>
                                    <td style="width:10%">Qty</td>
                                    <td style="width:15%">Place of Stored</td>
                                    <td style="width:15%">Receiver Name</td>
                                    <td style="width:15%">Receiver Sign</td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr class="text-bold">
                                    <td style='border:1px solid transparent;padding:0px' colspan="2">
                                        <br /><br /><br /><br /><br />
                                        Employee Sign
                                    </td>
                                    <td colspan="2" style='border:1px solid transparent;padding:0px'>
                                        <br /><br /><br /><br /><br />
                                        HR Sign
                                    </td>
                                    <td colspan="2" style='border:1px solid transparent;padding:0px;text-align:right'>
                                        <br /><br /><br /><br /><br />
                                        Auth. Signatory Signature
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="btnitem">
    <h5 class="card-header text-green">Asset </h5>
    <?php include 'Empreturn/Empreturn.php' ?>
</div>

<div class="card" ng-show="btninterview_format">
    <h5 class="card-header text-green">Exit Interview Format</h5>
    <div class="card-body">
        <a id="edit_interview_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body"> <!-- dk-->
            <div style="padding:20px;">
                <div id="pdfExport">

                    <div class="input-group-append">
                        <p ng-click="FetchEmployee(Employeeid);" data-toggle="modal">

                        </p>
                    </div>


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
                            margin: 20px;
                            width: 100%;
                            border-collapse: collapse;
                        }
                    </style>

                    <div class="pdf-data" style="padding: 25px 40px;">
                        <center><img class="exit-emp-logo" style="height: 80px;margin: 15px;" src='sainmarks.png'>
                        </center>
                        <h1 style="color:green;font-size: 20px;"> BRITANNIA LABELS INDIA PVT LTD</h1>
                        <h2 style="color:green;font-size: 20px;">Exit Interview</h2>

                        <p><b>Name :</b> {{Title}} {{Firstname}} &nbsp;{{Lastname}}</p>

                        <p><b>Employee Code :</b> {{Employeeid}}</p>

                        <p><b>Address For Correspondence:</b><br /> {{CurrentAddress}}

                            {{CurrentCountry}},<br />
                            {{CurrentState}},<br />
                            {{CurrentCity}},<br />
                        <p><b>Pincode:</b> {{CurrentPincode}}</p>

                        <p><b>Phone No:</b> {{Contactno}}</p>


                        <br /><br />
                        <p><b>1. Reasons for resigning (You can tick more than one):</b></p>
                        <p>a. Better Compensation</p>
                        <p>b. Better Growth Opportunities</p>
                        <p>c. Higher Education</p>
                        <p>d. Work Related Issues (Please Specify):
                            _______________________________________________</p>
                        <p>e. Personal Reasons (Please Specify):
                            __________________________________________________</p>
                        <p>f. Others (Please specify):
                            _______________________________________________</p>
                        <br /><br />
                        <p><b>2. During your tenure with us;</b></p>
                        <p>a. Did you know what was expected of you at work? Yes / No</p>
                        <p>b. Did you have the materials and equipment to do your work
                            right? Yes / No</p>
                        <p>c. At work, did you have the opportunity to do what you did best
                            every day? Yes / No</p>
                        <p>d. In the last seven days, have you received recognition or
                            praise for doing good work? Yes / No</p>
                        <p>e. Does your supervisor, or someone at work, seem to care about
                            you as a person? Yes / No</p>
                        <p>f. Is there someone at work who encourages your development? Yes
                            / No</p>
                        <p>g. At work, do your opinions seem to count? Yes / No</p>
                        <p>h. In the last six months, has someone at work talked to you
                            about your progress? Yes / No</p>
                        <p>i. In the last year, have you had opportunities to learn and
                            grow? Yes / No</p>
                        <br /><br />
                        <p><b>3. Describe what you liked while working with Company
                                Name.</b></p>

                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p style="display: none;"><br /><br /><br /><br /></p>
                        <br /><br />
                        <p> <br /><br /> <b>4. Describe what you disliked while working with Company
                                Name.</b></p>

                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p><b>5. What were the factors that attracted you to your next
                                job?</b></p>
                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p><b>6. Any other relevant information/suggestions which, you feel
                                will help make Company Name a better place to work.</b></p>

                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p><b>7. Comments of the interviewer</b></p>

                        <p>________________________________________________________________________
                        </p>
                        <p>________________________________________________________________________
                        </p>



                        <br /><br />


                        <table class='data-table'>
                            <tr>
                                <td>Name of the interviewer</td>
                                <td>Signature of the interviewer</td>
                                <td>Date of interview</td>
                            </tr>

                            <tr>
                                <td>____________________________ </td>
                                <td>____________________________</td>
                                <td>____________________________</td>
                            </tr>


                        </table>
                    </div>

                    <!-- <div class="modal-footer"> -->


                </div>
            </div>
        </div>
    </div>
</div>




<div class="card" ng-show="btnpayroll_format">
    <h5 class="card-header text-green">Payroll Settlement</h5>
    <div class="card-body">
        <a id="payroll_settle_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">
            <div id="payrollExport">
                <div class="input-group-append">

                </div>

                <style>
                    table {
                        max-width: 794px;
                        position: relative;
                    }

                    .date {
                        left: 685px;
                        top: 83px
                    }

                    .settlement-data table {
                        width: 100%;
                    }

                    .settlement-data table,
                    .settlement-data td,
                    .settlement-data th {
                        border: 1px solid #888888;
                        border-collapse: collapse;
                    }

                    table.no-border td,
                    table.no-border th {
                        border: 1px solid transparent;
                        border-collapse: collapse;
                        font-size: 1rem !important;
                    }

                    .settlement-data td,
                    .settlement-data th {
                        padding: 3px;
                        width: 30px;
                        height: 25px;
                        font-size: 13px;
                    }

                    .settlement-data th {
                        background: #f0e6cc;
                    }

                    .settlement-data .even {
                        background: #fbf8f0;
                    }

                    .settlement-data .odd {
                        background: #fefcf9;
                    }

                    .settlement-data .settlement-logo {
                        height: 45px;
                        position: absolute;
                        margin: 2px 0 0px 0px
                    }

                    .settlement-data {
                        position: relative;
                    }

                    .date-info {
                        position: absolute;
                        right: 225px;
                        top: 76px
                    }
                </style>
                <div class='settlement-data'>
                    <!-- <div class='date-info'>Date: {{Settlementdate}}</div> -->
                    <div class='date-info'></div>
                    <table class=''>
                        <tbody>
                            <tr>
                                <td colspan='3'>
                                    <img class='settlement-logo' src='sainmarks.png'>
                                    <center><b>{{Clientname}}</b><br />
                                        {{ClientAddressLine1}}<br />
                                        {{ClientAddressLine2}}<br />
                                        {{ClientAddressLine3}}<br />
                                        {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3' align='center'>
                                    <h3 style='margin:5px 0'>Full & Final Settlement</h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3' align='center'>
                                    <table class='no-border'>
                                        <tr>
                                            <td>NAME : {{Employeename}}</td>
                                            <td>EMP NO : {{Employeeid}}</td>
                                        </tr>
                                        <tr>
                                            <td>DEPT : {{EmpDepartment}}</td>
                                            <td>DESIGNATION : {{EmpDesignation}}</td>
                                        </tr>
                                        <tr>
                                            <td>DOJ : {{Date_Of_Joing2}}</td>
                                            <td>DOL : {{ReleivingDate2}}</td>
                                        </tr>
                                        <tr>
                                            <td>BASIC WAGES/ DAY : {{BasicDay}} </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                             <tr dir-paginate="e in GetempSettleList |filter:searchEmployeessss|itemsPerPage:10" pagination-id="Employeegrid">
                        <td>{{e.SalMonth}}-{{e.Salyear}}</td>
                        <td>{{e.TotalWorkingdays}}</td>
                        <td>{{e.TotalBalanceEL}}</td>

                    </tr>
                            <tr>
                                <td></td>
                                <td style='background-color: #f5f5f5;font-weight: bold;'>
                                    TOTAL DAYS</td>
                                <td style='background-color: #f5f5f5;font-weight: bold;'>
                                    Amount</td>
                            </tr>
                            <tr>
                                <td>BONUS(B+DA)</td>
                                <td style='text-align:right'>{{BonusBasicDays}}</td>
                                <td style='text-align:right'>{{BonusBasicAmounts}}</td>
                            </tr>
                            <tr>
                                <td>EL</td>
                                <td style='text-align:right'>{{CausalBasicDays}}</td>
                                <td style='text-align:right'>{{CausalBasicAmounts}}</td>
                            </tr>
                            <tr>
                                <td>GRATUITY</td>
                                <td style='text-align:right'>{{GratuityBasicDays}}</td>
                                <td style='text-align:right'>{{GratuityBasicAmounts}}</td>
                            </tr>
                            <tr>
                                <td>GRAND TOTAL</td>
                                <td></td>
                                <td style='text-align:right'>{{Settlementtotal}}</td>
                            </tr>
                            <tr align='center' valign='bottom' style='height:100px;'>
                                <td>PREPARED BY</td>
                                <td>APPROVED BY</td>
                                <td>EMPLOYEE SIGN</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="btndue_form">
    <h5 class="card-header text-green">No Due Form</h5>
    <div class="card-body">
        <a id="no_due_btn" class="btn btn-info btn-sm btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">

            <div id="nodueExport">

                <div class="input-group-append">
                    <p ng-click="FetchEmployee(Employeeid);" data-toggle="modal">

                    </p>
                </div>


                <style type='text/css'>
                    h1,
                    h2 {
                        text-align: center;
                    }

                    .edit_emp_data_box {
                        padding: 0px 50px;
                        font-size: 16px;
                        margin-top: 20px;
                    }

                    /*
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

                                            .data-table-no-border {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }

                                            .data-table-no-border td,
                                            .data-table-no-border th {
                                                padding: 5px;
                                            }

                                            .font15 {
                                                font-size: 15px;
                                            }*/
                </style>



                <div class="edit_emp_data_box">
                    <center><img class="exit-emp-logo" style="height: 80px;margin: 15px;" src='sainmarks.png'>
                    </center>
                    <h1 style="color:green;font-size: 20px;">BRITANNIA LABELS INDIA PVT LTD
                    </h1>
                    <br />
                    <h2 style="color:green;font-size: 20px;">No Dues Certificate</h2> <br />
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td style="width:200px">Name of the employees:</td>
                            <td>{{Title}} {{Firstname}}&nbsp;{{Lastname}}</td>
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
                    <table class='table table-sm table-bordered'>
                        <tr class="text-center">
                            <td style="width: 20px;">S.No</td>
                            <td>Department</td>
                            <td style="width: 22%;">No Dues</td>
                            <td style="width: 22%;">Dues</td>
                            <td style="width: 22%;">Dept Head Sign</td>
                        </tr>
                        <tr>
                            <td style="padding:10px">1.</td>
                            <td>Production</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">2.</td>
                            <td>HR & Admin.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">3.</td>
                            <td>Accounts </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">4.</td>
                            <td>Marketing</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">5.</td>
                            <td>Store</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">6.</td>
                            <td>Company Property Returned</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                    </br></br>

                    <table class='w-100'>
                        <tr>
                            <td style="width:50%">Employee Signature<br /><br /></td>
                            <td style="width:50%;text-align: right;">HOD Signature<br /><br /></td>
                        </tr>
                        <tr>
                            <td>_____________________________ </td>
                            <td style="text-align: right;">_____________________________</td>
                        </tr>
                    </table>

                    </br></br>

                    <table class='w-100'>
                        <tr>
                            <td style="width:50%;">HR & Admin.Signature<br /><br /></td>
                            <td style="width:50%;text-align: right;">Auth.Signatory Signature<br /><br /></td>
                        </tr>
                        <tr>
                            <td>_____________________________ </td>
                            <td style="text-align: right;">_____________________________</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


=======
<div class="card" ng-show="btnstatus">
    <h5 class="card-header">Approval Status</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm ">
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
                        <th>Send
                            Approval
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>HR</td>
                        <td> <input type="text" class="form-control" ng-model="HR_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="HR_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="HR_Notes" ng-disabled="HR_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnHR" ng-click="SendMAILHR_Approve2();">Send</button>
                            <!-- ng-disabled="btnHR" -->
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>DH</td>
                        <td> <input type="text" class="form-control" ng-model="DH_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="DH_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="DH_Notes" ng-disabled="DH_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnDH" ng-click="SendMAILDH_Approve2();">Send</button>
                            <!-- ng-disabled="btnDH" -->
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>GM</td>
                        <td> <input type="text" class="form-control" ng-model="GM_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="GM_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="GM_Notes" ng-disabled="GM_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnGM" ng-click="SendMAILGM_Approve2()">Send</button>
                            <!-- ng-disabled="btnGM" -->
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>ADMIN</td>
                        <td> <input type="text" class="form-control" ng-model="ADMIN_Approve" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="ADMIN_Approve_date_time" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="ADMIN_Notes" ng-disabled="ADMIN_Notes"></input>
                        </td>
                        <td> <button class="btn btn-sm btn-rounded btn-info" ng-disabled="btnMD" ng-click="SendMAILADMIN_Approve2()">Send</button>
                            <!-- ng-disabled="btnMD" -->
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Employee
                        </td>
                        <td> <input type="text" class="form-control" ng-model="EmployeeAccepted" readonly>
                        </td>
                        <td><input type="text" class="form-control" ng-model="Employeeofferaccepteddatetime" readonly>
                        </td>
                        <td>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card" ng-show="btnsettlement">
    <h5 class="card-header">Settlement Details</h5>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-6">

                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Settlement Date
                        </label>

                    </div>
                    <div class="col-lg-6">
                        <!-- <input type="text" class="form-control" ng-model="Settlementdate"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')"> -->

                        <input type="date" class="form-control" ng-model="Settlementdate" onfocus="(this.type='date')" onblur="(this.type='date')">

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Employee Name
                        </label>

                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" ng-model="Employeename" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Employee No
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="Employeeid" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Department
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="EmpDepartment" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Designation
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="EmpDesignation" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Date Of Joining
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="Date_Of_Joing2" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Date Of Releiving
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="ReleivingDate2" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <label class="col-form-label">Basic Wages/Day
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="text" class="form-control" ng-model="BasicDay" autocomplete="off" readonly>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="col-form-label">

                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Total Days
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Amount
                        </label>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Total worked days
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="BonusBasicDays" autocomplete="off" readonly>

                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="BonusBasicAmounts" autocomplete="off" readonly>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Leave Balance days
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="CausalBasicDays" autocomplete="off" readonly>
                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="CausalBasicAmounts" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Gratuity
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="GratuityBasicDays" autocomplete="off" readonly>

                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="GratuityBasicAmounts" autocomplete="off" readonly>

                    </div>


                </div>


                <div class="row">

                    <div class="col-lg-4">
                        <label class="col-form-label">
                            Total
                        </label>
                    </div>
                    <!-- <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="TotalDays" autocomplete="off" readonly>

                    </div> -->
                    <div class="col-lg-4"></div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="Settlementtotal" autocomplete="off" readonly>

                    </div>


                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <button class="btn btn-sm btn-rounded btn-success" ng-click="UpdateSettlementDetails();"><i class="fa fa-save"></i> Update</button>
                            <button class="btn btn-sm btn-rounded btn-info" ng-click="CalculateEL();"><i class="fa fa-calculator"></i> Calculate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered  table-sm table-striped">
                <thead>
                    <tr class="text-green">
                        <th>Month-Year</th>

                        <th>Worked days</th>
                        <th>Balance&nbsp;EL</th>

                    </tr>
                </thead>
                <tbody>

                    <tr dir-paginate="e in GetempSettleList |filter:searchEmployeessss|itemsPerPage:10" pagination-id="Employeegrid">
                        <td>{{e.SalMonth}}-{{e.Salyear}}</td>
                        <td>{{e.TotalWorkingdays}}</td>
                        <td>{{e.TotalBalanceEL}}</td>

                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>



<div class="card" ng-show="btnHandover">

    <h5 class="card-header text-green">Handover Details</h5>

    <div class="card-body">
        <div class="row">
            <div class="table-responsive custom-table custom-table-noborder col-lg-4">
                <table class="table table-bordered table-sm">
                    <tr>
                        <td> <label class="col-form-label">S.No</label>
                        </td>
                        <td> <input class="form-control" ng-model="HandNextno" id="HandNextno" readonly /> </td>
                    </tr>
                    <tr>
                        <td> <label class="col-form-label">Description</label>
                        </td>
                        <td> <input class="form-control" ng-model="description" id="description" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td> <label class="col-form-label">Select_file</label>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="file" class="form-control" ng-model="handoverDoc" id="filehandoverInput04" name=files[] accept="image/png, image/gif, image/jpeg,application/pdf">
                                <div class="input-group-append">
                                    <p id="filehandoverButton04" class="input-group-text">
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
                                <th scope="col">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="e in GetHandoverList|filter:searchHandover|itemsPerPage:5" pagination-id="Handovergrid" current-page="currentPageHandover">
                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageHandover - 1) * pageSizeHandover}}
                                </td>
                                <td>{{e.description}}</td>
                                <td>
                                    <div class="action-btn">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1Handover" ng-click="Fetchempdoc(e.Employeeid,e.Sno);" src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                        <img height="15" ng-click="Fetchempdoc(e.Employeeid,e.Sno);" src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1HandoverView" ng-click="Fetchempdoc(e.Employeeid,e.Sno);" src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <dir-pagination-controls pagination-id="Handovergrid" max-size="3" direction-links="true" boundary-links="true" class="pagination">
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-right">
        <button class="btn btn-sm btn-success" ng-click="Update_Handoveremp();">Update</button>
        <button class="btn btn-sm btn-danger" ng-click="ResetHandover();">Clear(Next)</button>
    </div>
</div>



<div class="card" ng-show="btnHandForm">
    <h5 class="card-header text-green">Handover Form</h5>
    <div class="card-body">
        <a id="HandoverFormBtn" class="btn btn-sm btn-info btn-nda-down mb-0"><i class="fa fa-download"></i> Download</a>
        <div class="row">
            <div class="col-md-12">
                <div id="handOverFormExport">

                    <style>
                        table {
                            max-width: 794px;
                            position: relative;
                        }

                        .date {
                            left: 685px;
                            top: 83px
                        }

                        .handover-data table {
                            width: 100%;
                        }

                        .handover-data table,
                        .handover-data td,
                        .handover-data th {
                            border: 1px solid #888888;
                            border-collapse: collapse;
                        }

                        table.no-border td,
                        table.no-border th {
                            border: 1px solid transparent;
                            border-collapse: collapse;
                            font-size: 1rem !important;
                        }

                        .handover-data td,
                        .handover-data th {
                            padding: 3px;
                            height: 45px;
                            font-size: 13px;
                        }

                        .handover-data th {
                            background: #f0e6cc;
                        }

                        .handover-data .even {
                            background: #fbf8f0;
                        }

                        .handover-data .odd {
                            background: #fefcf9;
                        }

                        .handover-data .settlement-logo {
                            height: 45px;
                            position: absolute;
                            margin: 2px 0 0px 0px
                        }

                        .handover-data {
                            position: relative;
                        }

                        .text-center {
                            text-align: center;
                        }

                        .text-bold {
                            font-weight: bold;
                        }

                        .form-head {
                            font-weight: bold;
                            background-color: #f5f5f5;
                        }
                    </style>
                    <div class='handover-data'>
                        <table class=''>
                            <tbody>
                                <tr>
                                    <td colspan='6'>
                                        <img class='settlement-logo' src='sainmarks.png'>
                                        <center><b>{{Clientname}}</b><br />
                                            {{ClientAddressLine1}}
                                            {{ClientAddressLine2}},<br />
                                            {{ClientAddressLine3}}<br />
                                            {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                                        </center>
                                    </td>
                                <tr>
                                    <td colspan="6" class="text-center form-head">List of Hand Over Documents/Equipments and Others</td>
                                </tr>
                                <tr class="text-center text-bold">
                                    <td style="width:6%">S.NO</td>
                                    <td>Particulars</td>
                                    <td style="width:10%">Qty</td>
                                    <td style="width:15%">Place of Stored</td>
                                    <td style="width:15%">Receiver Name</td>
                                    <td style="width:15%">Receiver Sign</td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr class="text-bold">
                                    <td style='border:1px solid transparent;padding:0px' colspan="2">
                                        <br /><br /><br /><br /><br />
                                        Employee Sign
                                    </td>
                                    <td colspan="2" style='border:1px solid transparent;padding:0px'>
                                        <br /><br /><br /><br /><br />
                                        HR Sign
                                    </td>
                                    <td colspan="2" style='border:1px solid transparent;padding:0px;text-align:right'>
                                        <br /><br /><br /><br /><br />
                                        Auth. Signatory Signature
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="btnitem">
    <h5 class="card-header text-green">Asset </h5>
    <?php include 'Empreturn/Empreturn.php' ?>
</div>

<div class="card" ng-show="btninterview_format">
    <h5 class="card-header text-green">Exit Interview Format</h5>
    <div class="card-body">
        <a id="edit_interview_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body"> <!-- dk-->
            <div style="padding:20px;">
                <div id="pdfExport">

                    <div class="input-group-append">
                        <p ng-click="FetchEmployee(Employeeid);" data-toggle="modal">

                        </p>
                    </div>


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
                            margin: 20px;
                            width: 100%;
                            border-collapse: collapse;
                        }
                    </style>

                    <div class="pdf-data" style="padding: 25px 40px;">
                        <center><img class="exit-emp-logo" style="height: 80px;margin: 15px;" src='sainmarks.png'>
                        </center>
                        <h1 style="color:green;font-size: 20px;"> BRITANNIA LABELS INDIA PVT LTD</h1>
                        <h2 style="color:green;font-size: 20px;">Exit Interview</h2>

                        <p><b>Name :</b> {{Title}} {{Firstname}} &nbsp;{{Lastname}}</p>

                        <p><b>Employee Code :</b> {{Employeeid}}</p>

                        <p><b>Address For Correspondence:</b><br /> {{CurrentAddress}}

                            {{CurrentCountry}},<br />
                            {{CurrentState}},<br />
                            {{CurrentCity}},<br />
                        <p><b>Pincode:</b> {{CurrentPincode}}</p>

                        <p><b>Phone No:</b> {{Contactno}}</p>


                        <br /><br />
                        <p><b>1. Reasons for resigning (You can tick more than one):</b></p>
                        <p>a. Better Compensation</p>
                        <p>b. Better Growth Opportunities</p>
                        <p>c. Higher Education</p>
                        <p>d. Work Related Issues (Please Specify):
                            _______________________________________________</p>
                        <p>e. Personal Reasons (Please Specify):
                            __________________________________________________</p>
                        <p>f. Others (Please specify):
                            _______________________________________________</p>
                        <br /><br />
                        <p><b>2. During your tenure with us;</b></p>
                        <p>a. Did you know what was expected of you at work? Yes / No</p>
                        <p>b. Did you have the materials and equipment to do your work
                            right? Yes / No</p>
                        <p>c. At work, did you have the opportunity to do what you did best
                            every day? Yes / No</p>
                        <p>d. In the last seven days, have you received recognition or
                            praise for doing good work? Yes / No</p>
                        <p>e. Does your supervisor, or someone at work, seem to care about
                            you as a person? Yes / No</p>
                        <p>f. Is there someone at work who encourages your development? Yes
                            / No</p>
                        <p>g. At work, do your opinions seem to count? Yes / No</p>
                        <p>h. In the last six months, has someone at work talked to you
                            about your progress? Yes / No</p>
                        <p>i. In the last year, have you had opportunities to learn and
                            grow? Yes / No</p>
                        <br /><br />
                        <p><b>3. Describe what you liked while working with Company
                                Name.</b></p>

                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p style="display: none;"><br /><br /><br /><br /></p>
                        <br /><br />
                        <p> <br /><br /> <b>4. Describe what you disliked while working with Company
                                Name.</b></p>

                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p><b>5. What were the factors that attracted you to your next
                                job?</b></p>
                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p><b>6. Any other relevant information/suggestions which, you feel
                                will help make Company Name a better place to work.</b></p>

                        <p>________________________________________________________________________________________________________________________________________________
                        </p>

                        <br /><br />
                        <p><b>7. Comments of the interviewer</b></p>

                        <p>________________________________________________________________________
                        </p>
                        <p>________________________________________________________________________
                        </p>



                        <br /><br />


                        <table class='data-table'>
                            <tr>
                                <td>Name of the interviewer</td>
                                <td>Signature of the interviewer</td>
                                <td>Date of interview</td>
                            </tr>

                            <tr>
                                <td>____________________________ </td>
                                <td>____________________________</td>
                                <td>____________________________</td>
                            </tr>


                        </table>
                    </div>

                    <!-- <div class="modal-footer"> -->


                </div>
            </div>
        </div>
    </div>
</div>




<div class="card" ng-show="btnpayroll_format">
    <h5 class="card-header text-green">Payroll Settlement</h5>
    <div class="card-body">
        <a id="payroll_settle_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">
            <div id="payrollExport">
                <div class="input-group-append">

                </div>

                <style>
                    table {
                        max-width: 794px;
                        position: relative;
                    }

                    .date {
                        left: 685px;
                        top: 83px
                    }

                    .settlement-data table {
                        width: 100%;
                    }

                    .settlement-data table,
                    .settlement-data td,
                    .settlement-data th {
                        border: 1px solid #888888;
                        border-collapse: collapse;
                    }

                    table.no-border td,
                    table.no-border th {
                        border: 1px solid transparent;
                        border-collapse: collapse;
                        font-size: 1rem !important;
                    }

                    .settlement-data td,
                    .settlement-data th {
                        padding: 3px;
                        width: 30px;
                        height: 25px;
                        font-size: 13px;
                    }

                    .settlement-data th {
                        background: #f0e6cc;
                    }

                    .settlement-data .even {
                        background: #fbf8f0;
                    }

                    .settlement-data .odd {
                        background: #fefcf9;
                    }

                    .settlement-data .settlement-logo {
                        height: 45px;
                        position: absolute;
                        margin: 2px 0 0px 0px
                    }

                    .settlement-data {
                        position: relative;
                    }

                    .date-info {
                        position: absolute;
                        right: 225px;
                        top: 76px
                    }
                </style>
                <div class='settlement-data'>
                    <!-- <div class='date-info'>Date: {{Settlementdate}}</div> -->
                    <div class='date-info'></div>
                    <table class=''>
                        <tbody>
                            <tr>
                                <td colspan='3'>
                                    <img class='settlement-logo' src='sainmarks.png'>
                                    <center><b>{{Clientname}}</b><br />
                                        {{ClientAddressLine1}}<br />
                                        {{ClientAddressLine2}}<br />
                                        {{ClientAddressLine3}}<br />
                                        {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3' align='center'>
                                    <h3 style='margin:5px 0'>Full & Final Settlement</h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3' align='center'>
                                    <table class='no-border'>
                                        <tr>
                                            <td>NAME : {{Employeename}}</td>
                                            <td>EMP NO : {{Employeeid}}</td>
                                        </tr>
                                        <tr>
                                            <td>DEPT : {{EmpDepartment}}</td>
                                            <td>DESIGNATION : {{EmpDesignation}}</td>
                                        </tr>
                                        <tr>
                                            <td>DOJ : {{Date_Of_Joing2}}</td>
                                            <td>DOL : {{ReleivingDate2}}</td>
                                        </tr>
                                        <tr>
                                            <td>BASIC WAGES/ DAY : {{BasicDay}} </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style='background-color: #f5f5f5;font-weight: bold;'>
                                    TOTAL DAYS</td>
                                <td style='background-color: #f5f5f5;font-weight: bold;'>
                                    Amount</td>
                            </tr>
                            <tr>
                                <td>BONUS(B+DA)</td>
                                <td style='text-align:right'>{{BonusBasicDays}}</td>
                                <td style='text-align:right'>{{BonusBasicAmounts}}</td>
                            </tr>
                            <tr>
                                <td>EL</td>
                                <td style='text-align:right'>{{CausalBasicDays}}</td>
                                <td style='text-align:right'>{{CausalBasicAmounts}}</td>
                            </tr>
                            <tr>
                                <td>GRATUITY</td>
                                <td style='text-align:right'>{{GratuityBasicDays}}</td>
                                <td style='text-align:right'>{{GratuityBasicAmounts}}</td>
                            </tr>
                            <tr>
                                <td>GRAND TOTAL</td>
                                <td></td>
                                <td style='text-align:right'>{{Settlementtotal}}</td>
                            </tr>
                            <tr align='center' valign='bottom' style='height:100px;'>
                                <td>PREPARED BY</td>
                                <td>APPROVED BY</td>
                                <td>EMPLOYEE SIGN</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="btndue_form">
    <h5 class="card-header text-green">No Due Form</h5>
    <div class="card-body">
        <a id="no_due_btn" class="btn btn-info btn-sm btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">

            <div id="nodueExport">

                <div class="input-group-append">
                    <p ng-click="FetchEmployee(Employeeid);" data-toggle="modal">

                    </p>
                </div>


                <style type='text/css'>
                    h1,
                    h2 {
                        text-align: center;
                    }

                    .edit_emp_data_box {
                        padding: 0px 50px;
                        font-size: 16px;
                        margin-top: 20px;
                    }

                    /*
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

                                            .data-table-no-border {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }

                                            .data-table-no-border td,
                                            .data-table-no-border th {
                                                padding: 5px;
                                            }

                                            .font15 {
                                                font-size: 15px;
                                            }*/
                </style>



                <div class="edit_emp_data_box">
                    <center><img class="exit-emp-logo" style="height: 80px;margin: 15px;" src='sainmarks.png'>
                    </center>
                    <h1 style="color:green;font-size: 20px;">BRITANNIA LABELS INDIA PVT LTD
                    </h1>
                    <br />
                    <h2 style="color:green;font-size: 20px;">No Dues Certificate</h2> <br />
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td style="width:200px">Name of the employees:</td>
                            <td>{{Title}} {{Firstname}}&nbsp;{{Lastname}}</td>
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
                    <table class='table table-sm table-bordered'>
                        <tr class="text-center">
                            <td style="width: 20px;">S.No</td>
                            <td>Department</td>
                            <td style="width: 22%;">No Dues</td>
                            <td style="width: 22%;">Dues</td>
                            <td style="width: 22%;">Dept Head Sign</td>
                        </tr>
                        <tr>
                            <td style="padding:10px">1.</td>
                            <td>Production</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">2.</td>
                            <td>HR & Admin.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">3.</td>
                            <td>Accounts </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">4.</td>
                            <td>Marketing</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">5.</td>
                            <td>Store</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding:10px">6.</td>
                            <td>Company Property Returned</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                    </br></br>

                    <table class='w-100'>
                        <tr>
                            <td style="width:50%">Employee Signature<br /><br /></td>
                            <td style="width:50%;text-align: right;">HOD Signature<br /><br /></td>
                        </tr>
                        <tr>
                            <td>_____________________________ </td>
                            <td style="text-align: right;">_____________________________</td>
                        </tr>
                    </table>

                    </br></br>

                    <table class='w-100'>
                        <tr>
                            <td style="width:50%;">HR & Admin.Signature<br /><br /></td>
                            <td style="width:50%;text-align: right;">Auth.Signatory Signature<br /><br /></td>
                        </tr>
                        <tr>
                            <td>_____________________________ </td>
                            <td style="text-align: right;">_____________________________</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
<?php include 'Relieving.php'?>