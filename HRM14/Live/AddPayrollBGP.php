<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Payroll-Temp</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM35Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Payroll Batch </h3>

                                </div>
                                <div class="card">
                                    <div class="" style="padding:25px 0 10px 25px">
                                        <div class="  table-responsive custom-table custom-table-noborder row">
                                            <table class="table table-bordered table-sm">
                                                <tr>


                                                    <td style="width:120px">
                                                        <label>Month</label>
                                                        <select ng-model="Payrollmonth" class="form-control"
                                                            ng-change="GetWorkingdays()">
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>

                                                    </td>

                                                    <td>
                                                        <label>Year</label>
                                                        <input type="text" class="form-control" ng-model="Payrollyear"
                                                            autocomplete="off" readonly>
                                                    </td>


                                                    <td>
                                                        <label>Total Days</label>
                                                        <input type="text" class="form-control" ng-model="TotaDays"
                                                            autocomplete="off">
                                                    </td>

                                                    <td><label>Holiday</label> <input type="text" class="form-control"
                                                            ng-model="Nationalholiday" autocomplete="off"></td>


                                                    <td><label>Week Off</label><input type="text" class="form-control"
                                                            ng-model="WeekOFF" autocomplete="off"></td>

                                                    <td style="width:100px">
                                                        <label>Status</label>
                                                        <select class="form-control" ng-model="Status">
                                                            <option Value="Open">Open</option>
                                                            <option value="Close">Close</option>
                                                            <option Value="Cancel">Cancel</option>
                                                        </select>
                                                    </td>




                                                    <td>
                                                        <label>Paid Date</label>
                                                        <input type="text" class="form-control"
                                                            ng-model="SalarypaidDate" onfocus="(this.type='date')"
                                                            onblur="(this.type='date')">
                                                    </td>

                                                </tr>
                                                <tr>

                                                </tr>
                                            </table>

                                        </div>

                                        <div class="float-right mt-2" style="margin-right: 15px;">
                                            <button class="btn btn-sm btn-success " ng-click="Getallemployee();"
                                                data-toggle="modal" data-target="#ModalEmployee"
                                                ng-disabled="btnEmployee">Select
                                                Employee</button>
                                            <button class="btn btn-sm btn-brand" ng-click="UpdateStatus();"
                                                ng-disabled="btnEmployee">Update</button>

                                        </div>
                                    </div>

                                    <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                                    </div>
                                  
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="table-responsive custom-table custom-table-noborder ">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr class="tableheadrow">

                                                            <td colspan="8" class="tabletotalrow">Employee Other Info
                                                            </td>
                                                            <td colspan="8" class="tabletotalrow">Employee
                                                                Worked/Working
                                                                Days</td>
                                                            <td colspan="7" class="tabletotalrow">Employee_Salary Info
                                                            </td>
                                                            <td colspan="9" class="tabletotalrow">Employee
                                                                Earned/OT/PF/ESI
                                                            </td>
                                                            <td colspan="3" class="tabletotalrow">Advance&Deduction</td>
                                                            <td colspan="4" class="tabletotalrow">TDS&Net</td>
                                                        </tr>
                                                        <tr class="tablethrow">

                                                            <th style="width: 50px;">S.No</th>

                                                            <!-- <th>Month</th>
                                                            <th>Year</th> -->
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Dept</th>
                                                            <th>Designation</th>
                                                            <th>Status</th>
                                                            <th>Approval_Status</th>
                                                            <th>P</th>
                                                            <th>A</th>
                                                            <th>W/O</th>
                                                            <th>H/O</th>
                                                            <th>CL</th>  
                                                            <th>SL</th>
                                                            <th>EL</th>
                                                            <th>Total</th>  
                                                            <th>Basic+DA</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th>TA</th>
                                                            <th>DA</th>
                                                            <th>LWF</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th>TA</th>
                                                            <th>DA</th>
                                                            <th>LWF</th>
                                                            <th>OT_HRS</th>
                                                            <th>OT_Wages</th>
                                                            <th class="tabletotalrow">Wages</th>
                                                            <th>PF</th>
                                                            <th>ESI</th>
                                                            <th>Advance</th>
                                                            <th>TDS</th>
                                                            <th class="tabletotalrow">Deduction</th>
                                                            <th class="tabletotalrow">Net</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <!-- <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.SalMonth"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Salyear"></td> -->
                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Employeeid"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Fullname"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Department"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Designation"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PackageHoldstatus"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Superuserapproval"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Presentdays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.AbsentDays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Weekoff"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Nationalholidays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.CL"></td>

                                                            <!-- <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workingdays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workeddays"></td> -->
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.SL"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EL"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Totaldays"></td>
                                                         
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.BasicDA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.HRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Otherallowance_Con_SA"></td>
                                                         <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Conveyence"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.DailyAllowanance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.LWF"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalSal"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedBasic"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedHRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedOtherallowance_Con_SA">
                                                            </td>

                                                              <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedConveyence"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedDailyAllowance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedLWF">
                                                            </td>
                                                           
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_HRS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.OT_Wages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.EarnedWages"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PF"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.ESI"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Salary_Advance"></td>
                                                            

                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TDS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalDeduction"></td>
                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.NetWages"></td>
                                                           



                                                        </tr>

                                                        <tr dir-paginate="e in GetPayrollList |filter:searchPayroll|itemsPerPage:10 "
                                                            pagination-id="PayrollGridAdmin"
                                                            current-page="currentPagePayroll01"
                                                            ng-class="{'rowcolorClose':e.PackageHoldstatus=='Hold'}">


                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPagePayroll01 - 1) * pageSizePayroll01}}
                                                            </td>

                                                            <!-- <td>{{e.SalMonth}}</td>
                                                            <td>{{e.Salyear}}</td> -->
                                                            <td>{{e.Employeeid}}</td>
                                                            <td> <input class="form-control" ng-model=e.Fullname
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Department
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Designation
                                                                    style="width: 150px;" readonly /></td>

                                                            <td>{{e.PackageHoldstatus}}</td>

                                                            <td ng-show="e.PackageHoldstatus=='Hold'"> <select
                                                                    class="form-control" ng-model="e.Superuserapproval"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="GetApprovalstatus(e.Employeeid,e.SalMonth,e.Salyear,e.Superuserapproval)">
                                                                    <option Value="Waiting">Waiting</option>
                                                                    <option value="Approved">Approved</option>

                                                                </select></td>
                                                            <td ng-show="e.PackageHoldstatus !='Hold'">
                                                                {{e.Superuserapproval}}</td>
                                                    


                                                            <td > <input
                                                                    class="form-control" ng-model=e.Presentdays
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                            
                                                            <td > <input
                                                                    class="form-control" ng-model=e.AbsentDays
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                            <td > <input
                                                                    class="form-control" ng-model=e.Weekoff
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                        
                                                            <td  style="width: 40px;">{{e.Nationalholidays}}</td>
                                                            <td > <input
                                                                    class="form-control" ng-model=e.CL
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                         

                                                            <td > <input
                                                                    class="form-control" ng-model=e.SL
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                            <td > <input
                                                                    class="form-control" ng-model=e.EL
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                           
                                                            <td class="tabletotalrow">{{e.Totaldays}}</td>
                                                            <td>{{e.BasicDA}}</td>
                                                            <td>{{e.HRA}}</td>
                                                            <td>{{e.Otherallowance_Con_SA}}</td>
                                                            <td>{{e.Conveyence}}</td>
                                                            <td>{{e.DailyAllowanance}}</td>
                                                            <td>{{e.LWF}}</td>
                                                            <td class="tabletotalrow">{{e.TotalSal}}</td>
                                                            <td>{{e.EarnedBasic}}</td>
                                                            <td>{{e.EarnedHRA}}</td>
                                                            <td>{{e.EarnedOtherallowance_Con_SA}}</td>
                                                            <td>{{e.EarnedConveyence}}</td>
                                                            <td>{{e.EarnedDailyAllowance}}</td>
                                                         
                                                          
                                                            <td>{{e.EarnedLWF}}</td>
                                                            <!-- // <td>{{e.DailyAllowanance}}</td> -->
                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.OT_HRS
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.OT_HRS readonly
                                                                    style="width: 70px;" /></td>
                                                            <td>{{e.OT_Wages}}</td>
                                                            <td class="tabletotalrow">{{e.EarnedWages}}</td>
                                                            <td>{{e.PF}}</td>
                                                            <td>{{e.ESI}}</td>
                                                            <td> <input class="form-control" ng-model=e.Salary_Advance
                                                                    style="width:70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                          


                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS readonly
                                                                    style="width: 70px;"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,e.Presentdays,e.AbsentDays,e.Weekoff,e.SL,e.EL)" />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS
                                                                    style="width: 70px;" /></td>

                                                            <td class="tabletotalrow">{{e.TotalDeduction}}</td>
                                                            <td class="tabletotalrow">{{e.NetWages}}</td>
                                                           

                                                            
                                                            <td style="width:40px;">
                                                                <div class="action-btn">
                                                                    <center> <img height="15" data-toggle="modal"
                                                                            data-target="#ModalPayrollDelete"
                                                                            ng-click="SendEdit(e.Employeeid,e.SalMonth,e.Salyear,e.Fullname);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                        <center>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <dir-pagination-controls pagination-id="PayrollGridAdmin" max-size="3"
                                                direction-links="true" boundary-links="true" class="pagination"
                                                ng-show="btnAdmin">
                                            </dir-pagination-controls>
                                        </div>

                                    </div>



                                 
                                </div>

                            </div>
                        </div>
                    </div>




                </div>

            </div>

            <div class="modal fade" id="ModalEmployee" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Select Employee</h5>

                        </div>
                        <div class="col-lg-12">
                            <div class=" row">

                                <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Action</th>
                                            <th>No</th>
                                            <th scope="col">
                                                Emp_ID</th>
                                            <th scope="col" style="width: 200px;">Name</th>
                                            <th scope="col" style="width: 90px;">Gender</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Designation</th>


                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Employeeid">

                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Fullname">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Gender">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Department">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    ng-model="searchEmployee.Designation">
                                            </td>



                                            </td>


                                        </tr>
                                        <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                            pagination-id="Employeegrid" current-page="currentPageEmp">



                                            <td>
                                                <div class="action-btn">
                                                    <input type="checkbox" ng-model="folder[e.Employeeid]"
                                                        value={{e.Employeeid}} />




                                                </div>
                                            </td>

                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Title}} {{e.Fullname}}</td>
                                            <td>{{e.Gender}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Designation}}</td>




                                        </tr>
                                    </tbody>
                                </table>

                                <div class="pagination">
                                    <dir-pagination-controls pagination-id="Employeegrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-success" ng-click="getAllSelected();"
                                    data-dismiss="modal">Submit</button>
                                <button class="btn btn-rounded btn-danger" ng-click="Selectallemp();"
                                    data-dismiss="modal">Select All</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ModalPayrollDelete" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Employeeid}}-{{EmpFullname}}
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
                            <button class="btn btn-rounded btn-danger" ng-click="Deletenew();"
                                data-dismiss="modal">Delete</button>
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include '../footer.php'?>
    </div>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM35Controller.js"></script>
</body>

</html>