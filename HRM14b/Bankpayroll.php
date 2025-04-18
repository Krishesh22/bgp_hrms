<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Payroll-Bank</title>
</head>

<body>




    <div class="dashboard-main-wrapper">
        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRMPayrollController">
            <div class="container-fluid dashboard-content">
                <div id="overlay">
                    <div class="cv-spinner">
                        <span class="spinner"></span>
                    </div>
                </div>

                <div class="section-block" id="basicform">
                    <h3 class="section-title">Bank Report </h3>
                </div>
                <div class="card">




                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="col-form-label">Month</label>
                            <select ng-model="Payrollmonth" class="form-control" ng-change="GetBankSession()">
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
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-form-label">Year</label>
                            <?php $year_start=2023;
                                                 $year_end=date('Y'); // current Year


                                                   echo '<select   ng-model="Payrollyear" class="form-control"    ng-change="GetBankSession()">'."\n";

                                                   for ($i_year=$year_start; $i_year <=$year_end; $i_year++) {
                                                       $selected=($user_selected_year==$i_year ? ' selected' : '');
                                                       echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                        }

                                                                echo '</select>'."\n";
                                                    ?>
                        </div>


                        <div class="form-group col-md-3">

                            <div class="mt-25">
                                <button class="btn btn-sm btn-success" ng-click="GetEmpDetails();"><i
                                        class="fa fa-table"></i> Get
                                    Detail</button>

                                <a class="btn btn-warning btn-sm" href="BankExportExcel.php"
                                    ng-click="GetBankSession()"><i class="fa fa-download"></i>
                                    Download</a>

                            </div>

                        </div>


                        <div class=" col-lg-12 table-responsive custom-table custom-table-noborder">
                            <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                <thead>


                                    <tr class="tablethrow">
                                        <th style="width: 50px;">S.No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Dept</th>
                                        <th>Designation</th>
                                        <th>Bank&nbsp;Name</th>
                                        <th>AC&nbsp;HolderName</th>
                                        <th>Accountno</th>
                                        <th>IFSCcode</th>
                                        <th>Branch</th>

                                        <!-- <th class="tabletotalrow">Net</th>
                                        <th class="tabletotalrow" title="Performance Allowance">
                                            Performance</th> -->
                                        <th class="tabletotalrow" title="Net+PA">Total</th>

                                    </tr>
                                </thead>

                                <tr>
                                    <td colspan="2"><input type="text" class="form-control"
                                            ng-model="searchPayroll.Employeeid"></td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Fullname"></td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Department">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Designation">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Bankname">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Empnameaspassbook">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Accountno">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.IFSCcode"></td>
                                    <td colspan="2"><input type="text" class="form-control" ng-model="searchPayroll.Branch"></td>

                                    <!-- <td><input type="text" class="form-control" ng-model="searchPayroll.NetWages"></td>
                                    <td colspan="2"><input type="text" class="form-control"
                                            ng-model="searchPayroll.Performanceallowance">
                                    </td> -->
                                </tr>

 <tbody >


                                    <tr dir-paginate="e in GetBankListnew |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                        current-page="currentPagePayroll01" pagination-id="PayrollGridAdmin">

                                    <td>
                                        {{$index+1+(currentPagePayroll01 - 1) * pageSizePayroll01}}

                                    </td>
                                    <td> {{e.Employeeid}}</td>
                                    <td>{{e.Fullname}}</td>
                                    <td>{{e.Department}}</td>
                                    <td>{{e.Designation}}</td>
                                    <td> {{e.Bankname}}</td>
                                    <td>{{e.Empnameaspassbook}}</td>
                                    <td class="tabletotalrow"> {{e.Accountno}}
                                    </td>
                                    <td> {{e.IFSCcode}}</td>
                                    <td> {{e.Branch}}</td>

                                    <!-- <td class="tabletotalrow"> {{e.NetWages}}</td>
                                    <td class="tabletotalrow">
                                        {{e.Performanceallowance}}</td> -->
                                    <td class="tabletotalrow">
                                        {{e.NetWages--e.Performanceallowance}}</td>
                                </tr>
                               
                             </tbody>
                              <tr style="background-color: yellow;font-weight:bold">
                                    <td colspan="10" style="text-align:right ;"> Total</td>
                                    <td>{{GrandTotal}}</td>
                                </tr>

                            </table>
                            <dir-pagination-controls pagination-id="PayrollGridAdmin" max-size="3"
                                direction-links="true" boundary-links="true" class="pagination">
                            </dir-pagination-controls>
                        </div>







                    </div>
                </div>


                <?php include '../footer.php'?>
            </div>
        </div>
        <?php include '../footerjs.php'?>


        <script src="../Scripts/Controller/HRMPayrollController.js"></script>
</body>

</html>