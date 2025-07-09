<<<<<<< HEAD
<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Bonus </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="bonusController">
            <div class="container-fluid dashboard-content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-green">Bonus</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Year</label>
                                <?php $year_start  = 2024;
                                $year_end = date('Y');

                                echo '<select   ng-model="Bonusyear" class="form-control">' . "\n";
                                for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                    $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                    echo '<option value="' . $i_year . '"' . $selected . '>' . $i_year . '</option>' . "\n";
                                }
                                echo '</select>' . "\n";
                                ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Category</label>
                                <select class="form-control" ng-model="Category">
                                    <option value="Category 1">Category 1
                                    </option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 3</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Bonus %</label>
                                <input type="text" class="form-control" id="Bonuspercentage" ng-model="Bonuspercentage"
                                    autocomplete="off">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Status</label>
                                <input type="text" class="form-control" id="Status" ng-model="Status"
                                    autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="float-right mt-2" style="margin-right: 15px;">
                            <button class="btn btn-sm btn-success " ng-click="SaveDetails();" ng-if="Status=='Open'"
                                ng-disabled="btnEmployee">
                                Get Details</button>



                            <button class="btn btn-sm btn-brand" data-toggle="modal" ng-if="Status=='Open'"
                                data-target="#ModalPayrollClose" ng-disabled="btnEmployee">Complete
                                Bonus</button>
                            <a class="btn btn-warning btn-sm" href="ExportExcelBGP.php"
                                ng-click="GETREPORT()"><i class="fa fa-download"></i>
                                Download</a>


                        </div>
                    </div>
                </div>
                <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-green">Details</h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive ">
                                <table class="table table-bordered  table-sm table-striped">
                                    <thead>
                                        <tr class="text-green">

                                            <th>No</th>
                                            <th scope="col" >
                                                Employee ID</th>
                                            <th scope="col" >Name</th>                                           
                                            <th scope="col">Department</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Service</th>
                                            <th scope="col">Oct</th>
                                            <th scope="col">Nov</th>
                                            <th scope="col">Dec</th>
                                            <th scope="col">Jan</th>
                                            <th scope="col">Feb</th>
                                            <th scope="col">Mar</th>
                                            <th scope="col">Apr</th>
                                            <th scope="col">May</th>
                                            <th scope="col">Jun</th>
                                            <th scope="col">Jul</th>
                                            <th scope="col">Aug</th>
                                            <th scope="col">Sep</th>
                                            <th scope="col">Worked_Days</th>
                                            <th scope="col">EL Days</th>
                                            <th scope="col">Basic+Da</th>
                                            <th scope="col">Basic/Day</th>
                                            <th scope="col">Gross</th>
                                            <th scope="col">Gross/Day</th>
                                            <th scope="col">Bonus</th>
                                            <th scope="col">Worked Wages</th>
                                            <th scope="col">EL Wages</th>
                                            <th scope="col">PA</th>
                                            <th scope="col">Credit Amount</th>                              
                                            <th scope="col" style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Employeeid">

                                                </div>

                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Fullname">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Department">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Designation">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Service_period">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Oct_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Nov_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Dec_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Jan_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Feb_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Mar_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Apr_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.May_workingdays">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Jun_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Jul_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Aug_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Sep_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_workeddays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_EL_days">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.BasicDA">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.BasicDA_perdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Gross_salary">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Gross_salar_perday">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Bonus_BasicDA">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_worked_wages">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_EL_wages">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Performance_allowance">

                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Credit_amount">

                                                </div>
                                            </td>
                                           


                                            </td>


                                        </tr>
                                        <tr dir-paginate="e in GetEmployeeBonusList |filter:searchBonus|itemsPerPage:10 "
                                            pagination-id="Employeebonusgrid" current-page="currentPageEmp">




                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Title}} {{e.Fullname}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Designation}}</td>
                                            <td>{{e.Service_period}}</td>
                                            <td>{{e.Oct_workingdays}}</td>
                                            <td>{{e.Nov_workingdays}}</td>
                                            <td>{{e.Dec_workingdays}}</td>
                                            <td>{{e.Jan_workingdays}}</td>
                                            <td>{{e.Feb_workingdays}}</td>
                                            <td>{{e.Mar_workingdays}}</td>
                                            <td>{{e.Apr_workingdays}}</td>
                                            <td>{{e.May_workingdays}}</td>
                                            <td>{{e.Jun_workingdays}}</td>
                                            <td>{{e.Jul_workingdays}}</td>
                                            <td>{{e.Aug_workingdays}}</td>
                                            <td>{{e.Sep_workingdays}}</td>
                                            <td>{{e.Total_workeddays}}</td>
                                            <td>{{e.Total_EL_days}}</td>
                                            <td>{{e.BasicDA}}</td>
                                            <td>{{e.BasicDA_perdays}}</td>
                                            <td>{{e.Gross_salary}}</td>
                                            <td>{{e.Gross_salar_perday}}</td>
                                            <td>{{e.Bonus_BasicDA}}</td>
                                            <td>{{e.Total_worked_wages}}</td>
                                            <td>{{e.Total_EL_wages}}</td>
                                            <td>{{e.Performance_allowance}}</td>
                                            <td>{{e.Credit_amount}}</td>

                                          
                                            <td>
                                                <div class="action-btn">
                                                    <img height="15" ng-click="SendEdit(e.Employeeid);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="float-right mt-2">
                                <div class="pagination ">
                                    <dir-pagination-controls pagination-id="Employeebonusgrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>

                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>


            <?php include '../footer.php' ?>
        </div>



    </div>

    <?php include '../footerjs.php' ?>
    <script src="../Scripts/Controller/bonusController.js"></script>

</body>

=======
<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Bonus </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="bonusController">
            <div class="container-fluid dashboard-content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-green">Bonus</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Year</label>
                                <?php $year_start  = 2024;
                                $year_end = date('Y');

                                echo '<select   ng-model="Bonusyear" class="form-control">' . "\n";
                                for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                    $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                    echo '<option value="' . $i_year . '"' . $selected . '>' . $i_year . '</option>' . "\n";
                                }
                                echo '</select>' . "\n";
                                ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Category</label>
                                <select class="form-control" ng-model="Category">
                                    <option value="Category 1">Category 1
                                    </option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 3</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Bonus %</label>
                                <input type="text" class="form-control" id="Bonuspercentage" ng-model="Bonuspercentage"
                                    autocomplete="off">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Status</label>
                                <input type="text" class="form-control" id="Status" ng-model="Status"
                                    autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="float-right mt-2" style="margin-right: 15px;">
                            <button class="btn btn-sm btn-success " ng-click="SaveDetails();" ng-if="Status=='Open'"
                                ng-disabled="btnEmployee">
                                Get Details</button>



                            <button class="btn btn-sm btn-brand" data-toggle="modal" ng-if="Status=='Open'"
                                data-target="#ModalPayrollClose" ng-disabled="btnEmployee">Complete
                                Bonus</button>
                            <a class="btn btn-warning btn-sm" href="ExportExcelBGP.php"
                                ng-click="GETREPORT()"><i class="fa fa-download"></i>
                                Download</a>


                        </div>
                    </div>
                </div>
                <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-green">Details</h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive ">
                                <table class="table table-bordered  table-sm table-striped">
                                    <thead>
                                        <tr class="text-green">

                                            <th>No</th>
                                            <th scope="col" >
                                                Employee ID</th>
                                            <th scope="col" >Name</th>                                           
                                            <th scope="col">Department</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Service</th>
                                            <th scope="col">Oct</th>
                                            <th scope="col">Nov</th>
                                            <th scope="col">Dec</th>
                                            <th scope="col">Jan</th>
                                            <th scope="col">Feb</th>
                                            <th scope="col">Mar</th>
                                            <th scope="col">Apr</th>
                                            <th scope="col">May</th>
                                            <th scope="col">Jun</th>
                                            <th scope="col">Jul</th>
                                            <th scope="col">Aug</th>
                                            <th scope="col">Sep</th>
                                            <th scope="col">Worked_Days</th>
                                            <th scope="col">EL Days</th>
                                            <th scope="col">Basic+Da</th>
                                            <th scope="col">Basic/Day</th>
                                            <th scope="col">Gross</th>
                                            <th scope="col">Gross/Day</th>
                                            <th scope="col">Bonus</th>
                                            <th scope="col">Worked Wages</th>
                                            <th scope="col">EL Wages</th>
                                            <th scope="col">PA</th>
                                            <th scope="col">Credit Amount</th>                              
                                            <th scope="col" style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Employeeid">

                                                </div>

                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Fullname">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Department">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Designation">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Service_period">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Oct_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Nov_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Dec_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Jan_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Feb_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Mar_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Apr_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.May_workingdays">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Jun_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Jul_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Aug_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Sep_workingdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_workeddays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_EL_days">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.BasicDA">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.BasicDA_perdays">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Gross_salary">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Gross_salar_perday">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Bonus_BasicDA">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_worked_wages">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Total_EL_wages">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Performance_allowance">

                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchBonus.Credit_amount">

                                                </div>
                                            </td>
                                           


                                            </td>


                                        </tr>
                                        <tr dir-paginate="e in GetEmployeeBonusList |filter:searchBonus|itemsPerPage:10 "
                                            pagination-id="Employeebonusgrid" current-page="currentPageEmp">




                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Title}} {{e.Fullname}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Designation}}</td>
                                            <td>{{e.Service_period}}</td>
                                            <td>{{e.Oct_workingdays}}</td>
                                            <td>{{e.Nov_workingdays}}</td>
                                            <td>{{e.Dec_workingdays}}</td>
                                            <td>{{e.Jan_workingdays}}</td>
                                            <td>{{e.Feb_workingdays}}</td>
                                            <td>{{e.Mar_workingdays}}</td>
                                            <td>{{e.Apr_workingdays}}</td>
                                            <td>{{e.May_workingdays}}</td>
                                            <td>{{e.Jun_workingdays}}</td>
                                            <td>{{e.Jul_workingdays}}</td>
                                            <td>{{e.Aug_workingdays}}</td>
                                            <td>{{e.Sep_workingdays}}</td>
                                            <td>{{e.Total_workeddays}}</td>
                                            <td>{{e.Total_EL_days}}</td>
                                            <td>{{e.BasicDA}}</td>
                                            <td>{{e.BasicDA_perdays}}</td>
                                            <td>{{e.Gross_salary}}</td>
                                            <td>{{e.Gross_salar_perday}}</td>
                                            <td>{{e.Bonus_BasicDA}}</td>
                                            <td>{{e.Total_worked_wages}}</td>
                                            <td>{{e.Total_EL_wages}}</td>
                                            <td>{{e.Performance_allowance}}</td>
                                            <td>{{e.Credit_amount}}</td>

                                          
                                            <td>
                                                <div class="action-btn">
                                                    <img height="15" ng-click="SendEdit(e.Employeeid);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="float-right mt-2">
                                <div class="pagination ">
                                    <dir-pagination-controls pagination-id="Employeebonusgrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>

                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>


            <?php include '../footer.php' ?>
        </div>



    </div>

    <?php include '../footerjs.php' ?>
    <script src="../Scripts/Controller/bonusController.js"></script>

</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>