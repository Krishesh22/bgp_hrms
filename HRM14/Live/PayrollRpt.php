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
                                    <h3 class="section-title">Payroll Report </h3>
                                </div>
                                <div class="card">
                                   
                                       


                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label class="col-form-label">Month</label>
                                                    <select ng-model="Payrollmonth" class="form-control"
                                                        ng-change="GetMonthSession()">
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
                                                    <?php $year_start=2021;
                                                 $year_end=date('Y'); // current Year


                                                   echo '<select   ng-model="Payrollyear" class="form-control"    ng-change="GetMonthSession()">'."\n";

                                                   for ($i_year=$year_start; $i_year <=$year_end; $i_year++) {
                                                       $selected=($user_selected_year==$i_year ? ' selected' : '');
                                                       echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                        }

                                                                echo '</select>'."\n";
                                                    ?>
                                                </div>

                                                <style type="text/css">
                                                button.multiselect {
                                                    min-width: 200px !important;
                                                    background-color: #3ac47d;
                                                    color: #ffffff;
                                                    padding: 5px !important
                                                }

                                                .multiselect-container {
                                                    min-width: 250px;
                                                    padding: 10px;
                                                    max-height: 300px;
                                                    overflow-y: auto;
                                                }

                                                .multiselect-selected-text {
                                                    font-size: 13px
                                                }

                                                .multiselect.dropdown-toggle.btn.btn-default {
                                                    margin-right: 5px;
                                                    max-width: 200px;
                                                    overflow: hidden;
                                                }
                                                </style>
                                                <div class="form-group col-md-3">
                                                    <div class="select-check">
                                                        <label class="col-form-label">Category</label><br />
                                                        <select id="multiple-checkboxes" multiple="multiple"
                                                            name="cat_name[]" ng-model="cat_name"
                                                            class="form-control multiple-checkboxes"  ng-change="GetMonthSession()"
                                                          >
                                                            <option value="Category 1">Category 1 </option>
                                                            <option value="Category 2">Category 2</option>
                                                            <option value="Category 3">Category 3</option>
                                                        </select>


                                                    </div>



                                                </div>
                                                <div class="form-group col-md-3">

                                                    <div class="mt-25">
                                                        <button class="btn btn-sm btn-success"
                                                            ng-click="GetWorkingdays();"><i class="fa fa-table"></i> Get
                                                            Detail</button>

                                                            <a class="btn btn-warning btn-sm" href="CategoryExportExcel.php"
                                                ng-click="GetMonthSession()"><i class="fa fa-download"></i>
                                                Download</a>

                                                    </div>

                                                </div>

                                                <div class="row" style="overflow:auto;max-height:55vh;margin-left:10px" >
                                                <div class="table-responsive custom-table custom-table-noborder" >
                                                    <table class="table table-bordered  table-sm table-striped">
                                                        <thead>
                                                         
                                                            <tr class="tableheadrow" >
                                                                <td colspan="8" class="tabletotalrow">Employee Other
                                                                    Info </td>
                                                                <td colspan="6" class="tabletotalrow">Employee
                                                                    Worked/Working Days</td>
                                                                <td colspan="4" class="tabletotalrow">
                                                                    Employee_Salary Info </td>
                                                                <td colspan="11" class="tabletotalrow">Employee
                                                                    Earned/OT/PF/ESI </td>
                                                                <td colspan="3" class="tabletotalrow">
                                                                    Advance&Deduction</td>
                                                                <td colspan="5" class="tabletotalrow">TDS&Net</td>
                                                            </tr>
                                                            <tr class="tablethrow">
                                                                <th style="width: 50px;">S.No</th>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Dept</th>
                                                                <th>Designation</th>
                                                                <th>Status</th>
                                                                <th>Approval_Status</th>
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
                                                                <th>LOP Hrs</th>
                                                                <th>LOP Wages</th>
                                                                <th>Advance</th>
                                                                <th>Food</th>
                                                                <th>TDS</th>
                                                                <th class="tabletotalrow">Deduction</th>
                                                                <th class="tabletotalrow">Net</th>
                                                                <th class="tabletotalrow" title="Performance Allowance">
                                                                    Performance</th>
                                                                <th class="tabletotalrow" title="Net+PA">Total</th>
                                                            
                                                            </tr>
                                                        </thead>
                                             
                                                            <tr>
                                                                <td colspan="2"><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Employeeid"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Fullname"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Department"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Designation"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.PackageHoldstatus">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Superuserapproval">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Workingdays"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Workeddays"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Nationalholidays">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Leavedays"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.TakenEL"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.LOP"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Totaldays"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.BasicDA"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.HRA"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Otherallowance_Con_SA">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.TotalSal"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.EarnedBasic"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.EarnedHRA"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.EarnedOtherallowance_Con_SA">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.DailyAllowanance">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.OT_HRS"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.OT_Wages"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.EarnedWages"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.PF"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.ESI"></td>
                                                                <td ><input type="text"
                                                                        class="form-control"
                                                                        ng-model="searchPayroll.Lophrs"></td>
                                                                <td><input type="text"
                                                                        class="form-control"
                                                                        ng-model="searchPayroll.Lopwages"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Salary_Advance">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.FoodDeduction"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.TDS"></td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.TotalDeduction">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.NetWages"></td>
                                                                <td colspan="2"><input type="text" class="form-control"
                                                                        ng-model="searchPayroll.Performanceallowance">
                                                                </td>
                                                            </tr>

                                                            <tbody class="table-tbody-main" dir-paginate="(key, value) in GetInwardTransactionList|orderBy:sortKeyCustomer:reverseCustomer|filter:searchCustomer  | groupBy: 'Category'|itemsPerPage:n" pagination-id="PayrollGridAdmin" >
                                                           

                                                            <tr 
                                                                ng-if="key !== 'undefined'">
                                                                <td colspan="35"
                                                                    style="padding:1px;margin:4px;padding-left:25px;padding-right:2px;background-color:Yellow;font-weight:bold;font-size:14px;color:black;">
                                                                    {{key}} &nbsp;&nbsp; Total {{getVolumeNetSum(value)--getVolumePerformanceSum(value)}} </td>

                                                            </tr>

                                                            <tr dir-paginate="e in value |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:n"
                                                                
                                                                current-page="currentPagePayroll01" pagination-id="PayrollGridAdmin">

                                                                <td style="width: 50px;">
                                                                    {{$index+1+(currentPagePayroll01 - 1) * pageSizePayroll01}}

                                                                </td>
                                                                <td> {{e.Employeeid}}</td>
                                                                <td><input class="form-control" ng-model=e.Fullname
                                                                        style="width: 150px;" readonly /></td>
                                                                <td><input class="form-control" ng-model=e.Department
                                                                        style="width: 150px;" readonly /></td>
                                                                <td><input class="form-control" ng-model=e.Designation
                                                                        style="width: 150px;" readonly /></td>
                                                                <td> {{e.PackageHoldstatus}}</td>
                                                                <td class="tabletotalrow"> {{e.Superuserapproval}}
                                                                </td>
                                                                <td> {{e.Workingdays}}</td>
                                                                <td> {{e.Workeddays}}</td>
                                                                <td> {{e.Nationalholidays}}</td>
                                                                <td> {{e.Leavedays}}</td>
                                                                <td> {{e.TakenEL}}</td>
                                                                <td> {{e.LOP}}</td>
                                                                <td class="tabletotalrow"> {{e.Totaldays}}</td>
                                                                <td> {{e.BasicDA}}</td>
                                                                <td> {{e.HRA}}</td>
                                                                <td> {{e.Otherallowance_Con_SA}}</td>
                                                                <td class="tabletotalrow"> {{e.TotalSal}}</td>
                                                                <td> {{e.EarnedBasic}}</td>
                                                                <td> {{e.EarnedHRA}}</td>
                                                                <td> {{e.EarnedOtherallowance_Con_SA}}</td>
                                                                <td> {{e.DailyAllowanance}}</td>
                                                                <td> {{e.OT_HRS}}</td>
                                                                <td> {{e.OT_Wages}}</td>
                                                                <td class="tabletotalrow"> {{e.EarnedWages}}</td>
                                                                <td> {{e.PF}}</td>
                                                                <td> {{e.ESI}}</td>
                                                                <td> {{e.Lophrs}} </td>
                                                                <td> {{e.Lopwages}}</td>
                                                                <td> {{e.Salary_Advance}}</td>
                                                                <td> {{e.FoodDeduction}}</td>
                                                                <td class="tabletotalrow"> {{e.TDS }}</td>
                                                                <td class="tabletotalrow"> {{e.TotalDeduction}}</td>
                                                                <td class="tabletotalrow"> {{e.NetWages}}</td>
                                                                <td class="tabletotalrow">
                                                                    {{e.Performanceallowance}}</td>
                                                                <td class="tabletotalrow">
                                                                    {{e.NetWages--e.Performanceallowance}}</td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
        </script>
        <script src="../Scripts/Controller/HRMPayrollController.js"></script>
</body>

</html>