<?php include '../config.php';
 session_start();
 $Clientid =$_SESSION["Clientid"];
 $Address1 = "";
 $Address2 ="";
 if($Clientid==2)
 {
  $Address1 ="'LABEL ARCADE' 476/1B1A, Jothi Nagar,";
  $Address2 =" K CHETTIPALAYAM,TIRUPPUR-641605, INDIA";

 }
 else
 {
  $Address1 ="No:471/3,Ramegoundempalaiyam,";
  $Address2 =" Peruntholuvu Village,Tirupur-641665, India. TPR-22066";
 }
?>
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
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM14Controller">
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
                                    <h3 class="section-title">Payroll </h3>

                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="  table-responsive custom-table custom-table-noborder row">
                                            <table class="table table-bordered table-sm">
                                                <tr>

                                                    <td>
                                                        <label>Month</label>
                                                    </td>
                                                    <td colspan="2">

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
                                                    </td>
                                                    <td style="width:80px">


                                                        <?php 
                                                                  $year_start  =2023;
                                                                   $year_end = date('Y'); // current Year
                                

                                                               echo '<select   ng-model="Payrollyear" class="form-control">'."\n";
                                                                for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                                                  $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                                                   echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                                      }
                                                                           echo '</select>'."\n";
                                                                               ?>

                                                    </td>
                                                    <td> <label>Category</label></td>
                                                    <td>

                                                        <select class="form-control" ng-model="Category"
                                                            style="width:140px" ng-change="GetWorkingdays()">
                                                            <option value="Category 1">Category 1
                                                            </option>
                                                            <option value="Category 2">Category 2</option>
                                                            <option value="Category 3">Category 3</option>

                                                        </select>
                                                    </td>
                                                    <td style="width:120px">
                                                        <label>Working Days</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" ng-model="Working_Days"
                                                            autocomplete="off" readonly>
                                                    </td>
                                                    <td><label>NH</label></td>
                                                    <td> <input type="text" class="form-control"
                                                            ng-model="Nationalholiday" autocomplete="off"></td>
                                                    <td><label>CL</label></td>
                                                    <td> <input type="text" class="form-control" ng-model="CasualLeave"
                                                            autocomplete="off"></td>
                                                    <td>
                                                        <label>Status</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" ng-model="Status"
                                                            autocomplete="off">

                                                    </td>

                                                </tr>

                                            </table>

                                        </div>


                                    </div>

                                    <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                                    </div>




                                    <div class="card-body">


                                        <div class="row">


                                            <div class="table-responsive custom-table custom-table-noborder ">


                                                <table class="table table-bordered  table-sm table-striped"
                                                    id="employee_table">
                                                    <thead>
                                                        <tr class="tableheadrow" ng-show="Category!='Category 3'">

                                                            <td colspan="7" class="tabletotalrow"> Employee Other
                                                                Info</td>
                                                            <td colspan="6" class="tabletotalrow"> Employee
                                                                Worked/Working Days</td>
                                                            <td colspan="4" class="tabletotalrow"> Employee_Salary
                                                                Info</td>
                                                            <td colspan="9" class="tabletotalrow"> Employee
                                                                Earned/OT/PF/ESI</td>
                                                            <td colspan="5" class="tabletotalrow"> Advance&Deduction
                                                            </td>
                                                            <td colspan="4" class="tabletotalrow"> TDS&Net</td>
                                                        </tr>

                                                        <tr class="tableheadrow" ng-show="Category=='Category 3'">

                                                            <td colspan="7" class="tabletotalrow"> Employee Other
                                                                Info</td>
                                                            <td colspan="6" class="tabletotalrow"> Employee
                                                                Worked/Working Days</td>
                                                            <td colspan="4" class="tabletotalrow"> Employee_Salary
                                                                Info</td>
                                                            <td colspan="11" class="tabletotalrow"> Employee
                                                                Earned/OT/PF/ESI</td>
                                                            <td colspan="5" class="tabletotalrow"> Advance&Deduction
                                                            </td>
                                                            <td colspan="4" class="tabletotalrow"> TDS&Net</td>
                                                        </tr>
                                                        <tr class="tablethrow">

                                                            <th style="width: 50px;" class="sticky-col first-col">S.No
                                                            </th>


                                                            <th class="sticky-col second-col" style="min-width:100px">ID
                                                            </th>
                                                            <th class="sticky-col third-col" style="min-width:150px">
                                                                Name</th>
                                                            <th>Dept</th>
                                                            <th>Designation</th>
                                                            <th>Status</th>
                                                            <!-- <th>Category</th>  -->
                                                            <th>Working</th>
                                                            <th>Worked</th>
                                                            <th>NH</th>
                                                            <th>Leavedays</th>
                                                            <th>EL</th>
                                                            <th>LOP</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic+DA</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th class="tabletotalrow">Total</th>
                                                            <th>Basic</th>
                                                            <th>HRA</th>
                                                            <th>Other_Allowance</th>
                                                            <th>DA</th>
                                                            <th>OT_HRS</th>
                                                            <th>OT_Wages</th>
                                                            <th class="tabletotalrow">Wages</th>
                                                            <th>PF</th>
                                                            <th>ESI</th>
                                                            <th ng-show="Category=='Category 3'">LOP Hrs</th>
                                                            <th ng-show="Category=='Category 3'">LOP Wages</th>
                                                            <th>Advance</th>
                                                            <th>Food</th>

                                                            <th>TDS</th>
                                                            <th>Dormitory</th>
                                                            <th>Transport</th>
                                                            <th class="tabletotalrow">Deduction</th>
                                                            <th class="tabletotalrow">Net</th>
                                                            <th class="tabletotalrow" title="Performance Allowance">
                                                                PA</th>
                                                            <th class="tabletotalrow" title="Net+PA">
                                                                Total</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>


                                                            <td colspan="2" class="sticky-col secondsearch-col"
                                                                style="min-width:150px"> <input type="text"
                                                                    class="form-control"
                                                                    ng-model="searchPayroll.Employeeid"></td>
                                                            <td class="sticky-col third-col"> <input type="text"
                                                                    class="form-control"
                                                                    ng-model="searchPayroll.Fullname"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Department"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Designation"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.PackageHoldstatus"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workingdays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Workeddays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Nationalholidays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Leavedays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TakenEL"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.LOP"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Totaldays"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.BasicDA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.HRA"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Otherallowance_Con_SA">
                                                            </td>
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
                                                                    ng-model="searchPayroll.DailyAllowanance"></td>
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
                                                            <td ng-show="Category=='Category 3'"> <input type="text"
                                                                    class="form-control"
                                                                    ng-model="searchPayroll.Lophrs"></td>
                                                            <td ng-show="Category=='Category 3'"> <input type="text"
                                                                    class="form-control"
                                                                    ng-model="searchPayroll.Lopwages"></td>

                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Salary_Advance"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.FoodDeduction"></td>

                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TDS"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Dormitory"></td>

                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Transport"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.TotalDeduction"></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.NetWages"></td>
                                                            <td colspan="2"> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Performanceallowance">
                                                            </td>



                                                        </tr>

                                                        <tr dir-paginate="e in GetPayrollList |filter:searchPayroll|itemsPerPage:10 "
                                                            pagination-id="PayrollGrid"
                                                            current-page="currentPagePayroll">

                                                      <td style="width: 50px;" class="sticky-col first-col">
                                                                <a style="padding:5px 10px;color:#3ac47d"
                                                                    ng-click="GetPayslip(e.Employeeid,e.SalMonth,e.Salyear,e.Category);" ><i
                                                                        class="fa fa-download"  ></i>
                                                                    {{$index+1 + (currentPagePayroll - 1) * pageSizePayroll}}
                                                                </a>
                                                            </td>



                                                            <td class="sticky-col second-col" style="min-width:100px">
                                                                {{e.Employeeid}}</td>
                                                            <td class="sticky-col third-col"> <input
                                                                    class="form-control" ng-model=e.Fullname
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Department
                                                                    style="width: 150px;" readonly /></td>
                                                            <td> <input class="form-control" ng-model=e.Designation
                                                                    style="width: 150px;" readonly /></td>

                                                            <td>{{e.PackageHoldstatus}}</td>
                                                            <td>{{e.Workingdays}}</td>
                                                            <td>{{e.Workeddays}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Workeddays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)" /></td> -->
                                                            <td>{{e.Nationalholidays}}</td>
                                                            <td>{{e.Leavedays}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Leavedays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS,$index,e.Performanceallowance)"/></td>                                                          -->
                                                            <td>{{e.TakenEL}}</td>
                                                            <td>{{e.LOP}}</td>
                                                            <td class="tabletotalrow">{{e.Totaldays}}</td>
                                                            <td>{{e.BasicDA}}</td>
                                                            <td>{{e.HRA}}</td>
                                                            <td>{{e.Otherallowance_Con_SA}}</td>
                                                            <td class="tabletotalrow">{{e.TotalSal}}</td>
                                                            <td>{{e.EarnedBasic}}</td>
                                                            <td>{{e.EarnedHRA}}</td>
                                                            <td>{{e.EarnedOtherallowance_Con_SA}}</td>
                                                            <td>{{e.DailyAllowanance | currency:''}}</td>
                                                            <!-- // <td>{{e.DailyAllowanance}}</td> -->
                                                            <td>{{e.OT_HRS}}</td>
                                                            <td>{{e.OT_Wages | currency:''}}</td>
                                                            <td class="tabletotalrow">{{e.EarnedWages |currency:''}}
                                                            </td>
                                                            <td>{{e.PF | currency:''}}</td>
                                                            <td>{{e.ESI | currency:''}}</td>
                                                            <td ng-show="Category=='Category 3'">{{e.Lophrs}}</td>
                                                            <td ng-show="Category=='Category 3'">{{e.Lopwages}}</td>
                                                            <td> <input class="form-control" ng-model=e.Salary_Advance
                                                                    style="width:70px;"
                                                                    onkeypress="return Validate(event);" readonly />
                                                            </td>
                                                            <td> <input class="form-control" ng-model=e.FoodDeduction
                                                                    style="width:70px"
                                                                    onkeypress="return Validate(event);" readonly />
                                                            </td>


                                                            <td ng-show="e.Category=='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS readonly
                                                                    style="width: 70px;" readonly />
                                                            </td>
                                                            <td ng-show="e.Category!='Category 3'"> <input
                                                                    class="form-control" ng-model=e.TDS
                                                                    style="width: 70px;" readonly /></td>
                                                            <td>{{e.Dormitory}}</td>
                                                            <td>{{e.Transport}}</td>
                                                            <td class="tabletotalrow">
                                                                {{e.TotalDeduction --e.Holiday_deduction}}</td>
                                                            <td class="tabletotalrow">{{e.NetWages --e.Holiday_net}}
                                                            </td>
                                                            <td class="tabletotalrow">
                                                                {{e.Performanceallowance |currency:''}}</td>

                                                            <td> {{e.NetWages--e.Performanceallowance --e.Holiday_net}}</td>
                                                        </tr>
                                                    </tbody>
                                                    <tr style='background-color:yellow'
                                                        ng-show="Category=='Category 3'">
                                                        <td colspan="36" style="text-align:right;font-weight:bold">
                                                            Total&nbsp;&nbsp;</td>

                                                        <td style="text-align:right;font-weight:bold">{{GrandTotal}}
                                                        </td>
                                                    </tr>
                                                    <tr style='background-color:yellow'
                                                        ng-show="Category!='Category 3'">
                                                        <td colspan="34" style="text-align:right;font-weight:bold">
                                                            Total&nbsp;&nbsp;</td>

                                                        <td style="text-align:right;font-weight:bold">{{GrandTotal}}
                                                        </td>
                                                    </tr>
                                                </table>





                                            </div>

                                            <div class="pagination" ng-show="GetPayrollList.length>10">
                                                <dir-pagination-controls pagination-id="PayrollGrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>
                                            </div>
                                        </div>


                                    </div>











                                    <div class="modal fade emp-modal" id="ModalCenterPaySlip" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header alert alert-info">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        Payslip Detail
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">




                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <a id="data_to_image_btn"
                                                                class="btn btn-info btn-nda-down"><i
                                                                    class="fa fa-download"></i>
                                                                Download</a>
                                                        </div>
                                                    </div>


                                                    <style>
                                                    .payslip-data table {
                                                        width: 100%;
                                                    }

                                                    .payslip-data table,
                                                    .payslip-data td,
                                                    .payslip-data th {
                                                        border: 1px solid #888888;
                                                        border-collapse: collapse;
                                                    }

                                                    .payslip-data td,
                                                    .payslip-data th {
                                                        padding: 3px;
                                                        width: 30px;
                                                        height: 25px;
                                                        font-size: 10px;
                                                    }

                                                    .payslip-data th {
                                                        background: #f0e6cc;
                                                    }

                                                    .payslip-data .even {
                                                        background: #fbf8f0;
                                                    }

                                                    .payslip-data .odd {
                                                        background: #fefcf9;
                                                    }

                                                    .payslip-data .payslip-logo {
                                                        height: 35px;
                                                        position: absolute;
                                                        margin: 6px 0 0px 5px
                                                    }
                                                    </style>

                                                    <div id="pdfExport">
                                                        <div style="padding:20px" ng-repeat="e in EmpRptList"
                                                            class="payslip-data">



                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="6"><img class="payslip-logo"
                                                                                src="../Logo/Sainmarknewlogo.png">
                                                                            <center><b>BRITANNIA LABELS INDIA PVT
                                                                                    LTD</b><br />
                                                                                <?php echo $Address1?>

                                                                                <br />
                                                                                <?php echo $Address2?>
                                                                            </center>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="6"><span>Paid Date :
                                                                                {{e.SalaryPaidDate}}</span><span
                                                                                style="float: right;">Wage slip/with
                                                                                form(25B) for the month:
                                                                                {{e.SalMonth}}&nbsp;&nbsp;
                                                                                {{e.Salyear}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Employee Name / பணியாளர் பெயர்/ कर्मचारी नाम
                                                                        </td>
                                                                        <td>{{e.Title}}{{e.Firstname}}
                                                                            {{e.Lastname}}</td>
                                                                        <td>Basic+DA / அடிப்படை சம்பளம் </td>
                                                                        <td style="width: 40px;">
                                                                            {{e.BasicDA |currency:''}}</td>
                                                                        <td>Earned Basic+DA / ஈட்டிய
                                                                            அடிப்படை ஊதியம் / अर्जित
                                                                            बेसिक + महंगाई भत्ता </td>
                                                                        <td style="width:40px">
                                                                            {{e.EarnedBasic |currency:''}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Employee Id / பணியாளர் எண் /
                                                                            कर्मचारी

                                                                            पहचान संख्या </td>
                                                                        <td>
                                                                            {{e.Employeeid}} </td>
                                                                        <td>HRA/ வீடு வாடகை படி</td>
                                                                        <td>{{e.HRA |currency:''}}</td>
                                                                        <td>Earned HRA / ஈட்டிய வீடு வாடகை
                                                                            படி / अर्जित आवास
                                                                            किराए
                                                                            की अनुमति </td>
                                                                        <td>{{e.EarnedHRA |currency:''}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Designation / பதவி / औहदा </td>
                                                                        <td>{{e.Designation}}</td>
                                                                        <td>OA / இதர படி </td>
                                                                        <td>{{e.Otherallowance_Con_SA |currency:''}}
                                                                        </td>
                                                                        <td>Earned OA / ஈட்டிய இதர படி/ अन्य
                                                                            भत्ता अर्जित किया
                                                                        </td>
                                                                        <td>{{e.EarnedOtherallowance_Con_SA |currency:''}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>WORKING DAYS/ வேலை நாட்கள் /
                                                                            कार्य

                                                                            दिवस </td>
                                                                        <td>{{e.Workingdays}}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>OT Amount / மிகை பணி செய்த
                                                                            சம்பளம் / ओवरटाइम भत्ता
                                                                        </td>
                                                                        <td>{{e.OT_Wages |currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>WORKED DAYS / வேலை செய்த

                                                                            நாட்கள் / काम किया दिन </td>
                                                                        <td>{{e.Workeddays}}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>Daily/Monthly Allowance /
                                                                            தினசரி/மாதாந்திர படி /
                                                                            दैनिक/मासिक भत्ता </td>
                                                                        <td>{{e.DailyAllowanance |currency:''}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Paid Leave / சம்பளத்துடன் கூடிய
                                                                            விடுப்பு /

                                                                            वैतनिक अवकाश </td>
                                                                        <td>{{e.TakenEL}}</td>
                                                                        <td><b>Total Wages / மொத்தம் /
                                                                                सकल वेतन</b></td>
                                                                        <td>{{e.BasicDA--e.HRA--e.Otherallowance_Con_SA}}
                                                                        </td>
                                                                        <td><b>Earned Wages/ ஈட்டிய மொத்தம்
                                                                                / अर्जित राशि</b>
                                                                        </td>
                                                                        <td>{{e.EarnedWages |currency:''}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>LOP / சம்பள இழப்பு / वेतन का
                                                                            नुकसान </td>
                                                                        <td>{{e.LOP}}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>PF / பிஎஃப் / भविष्य निधि </td>
                                                                        <td>{{e.PF |currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OT Hrs / மிகை பணி செய்த நேரம்
                                                                            /

                                                                            समयोपरि घंटे </td>
                                                                        <td>{{e.OT_HRS}}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>ESI / இ.எஸ்.ஐ. / कर्मचारियों का
                                                                            राज्य बीमा </td>
                                                                        <td>{{e.ESI |currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>LOP Hrs/ ஊதிய நேர இழப்பு / वेतन घंटों का
                                                                            नुकसान</td>
                                                                        <td>{{e.Lophrs}}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>LOP Wages/ ஊதிய இழப்பு</td>
                                                                        <td>{{e.Lopwages |currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>National / Festival Holiday /
                                                                            தேசிய விடுப்பு /

                                                                            राष्ट्रीय अवकाश </td>
                                                                        <td>{{e.Nationholidays}} </td>
                                                                        <td rowspan="2"></td>
                                                                        <td rowspan="2"></td>
                                                                        <td>Salary Advance / சம்பள முன்பணம்
                                                                            / अग्रिम वेतन
                                                                        </td>
                                                                        <td>{{e.Salary_Advance |currency:''}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> Total Days / மொத்த நாட்கள்/
                                                                            सकल

                                                                            दिन </td>
                                                                        <td>{{e.Totaldays}}</td>
                                                                        <td>Food & Other Deduction / பிடித்தம் / कटौती
                                                                        </td>
                                                                        <td>{{e.FoodDeduction |currency:''}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>UAN NO</td>
                                                                        <td>{{e.UANno}}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>TDS/ டிடிஎஸ்/ टीडीएस </td>
                                                                        <td>{{e.TDS |currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ESIC NO </td>
                                                                        <td>{{e.ESIno}}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><b>Total Deduction / மொத்த
                                                                                பிடித்தம் / कटौती</b></td>
                                                                        <td>{{e.TotalDeduction |currency:''}}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><b>Performance allowance/ஊக்க தொகை/ प्रदर्शन
                                                                                भत्ता </b> </td>
                                                                        <td>{{e.Performanceallowance |currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><b>Net Wages நிகர ஊதியம் / नेट
                                                                                सैलरी</b> </td>
                                                                        <td>{{e.NetWages--e.Performanceallowance}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Authorised Signature /
                                                                            மேலாளர்

                                                                            கையொப்பம் / कर्मचारी हस्ताक्षर
                                                                        </td>
                                                                        <td></td>
                                                                        <td colspan="2">Employee Signature /
                                                                            பணியாளர் கையொப்பம்
                                                                            /
                                                                            कर्मचारी हस्ताक्षर </td>
                                                                        <td colspan="2"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br />


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


    <?php include '../footer.php'?>
    </div>



    </div>

    <?php include '../footerjs.php'?>

    <script src="../Scripts/jspdf.min.js"></script>

    <script src="../Scripts/html2canvas/html2canvas.min.js"></script>
    <script src="../Scripts/Controller/HRM14Controller.js"></script>

    <script>
    function myFunction() {
        alert("test");

        $("#data_to_image_btn").trigger("click");
    }
    </script>


    <script>
    $(function() {
        $("#data_to_image_btn").click(function() {

            var HTML_Width = $("#pdfExport").width();
            var HTML_Height = $("#pdfExport").height();
            var data = document.getElementById('pdfExport');
            html2canvas(data, {
                allowTaint: true,
                scale: 3,
                useCORS: true
            }).then(canvas => {


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
                var imgHeight = 592.28 / contentWidth * contentHeight;
                var pageData = canvas.toDataURL('image/jpeg', 1.0);
                var pdf = new jsPDF('', 'pt', 'a4');
                //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
                //When the content does not exceed the range of pdf page display, there is no need to paginate
                if (leftHeight < pageHeight) {
                    pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        pdf.addImage(pageData, 'jpg', 2, position, imgWidth, imgHeight)
                        leftHeight -= pageHeight;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
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



    function demoFromHTML() {
        var data = document.getElementById('pdfExport');
        html2canvas(data, {
            onrendered: function(canvasObj) {
                var contentWidth = canvas.width;
                var contentHeight = canvas.height;
                //One page pdf shows the canvas height generated by html pages.
                var pageHeight = contentWidth / 592.28 * 841.89;
                //html page height without pdf generation
                var leftHeight = contentHeight;
                //Page offset
                var position = 0;
                //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
                var imgWidth = 595.28;
                var imgHeight = 592.28 / contentWidth * contentHeight;
                var pageData = canvas.toDataURL('image/jpeg', 1.0);
                var pdf = new jsPDF('', 'pt', 'a4');
                //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
                //When the content does not exceed the range of pdf page display, there is no need to paginate
                if (leftHeight < pageHeight) {
                    pdf.addImage(pageData, 'JPEG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        pdf.addImage(pageData, 'JPEG', 0, position, imgWidth, imgHeight)
                        leftHeight -= pageHeight;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                pdf.save('content.pdf');
            }
        });
    }
    </script>

    <style>
    #data_to_image_btn {
        position: absolute;
        right: 40px;
        top: -58px;
    }
    </style>




</body>

</html>