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
                    <h3 class="section-title">Employee Payroll Deduction List Upload </h3>
                </div>

                <div id="overlay">
                    <div class="cv-spinner">
                        <span class="spinner"></span>
                    </div>
                </div>
                <div class="card">




                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="col-form-label">Month</label>
                            <select ng-model="Payrollmonth" class="form-control" ng-change="GetMonthSession02()"
                                id="Payrollmonth">
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


                                                   echo '<select   ng-model="Payrollyear" class="form-control"    ng-change="GetMonthSession02()" id="Payrollyear">'."\n";

                                                   for ($i_year=$year_start; $i_year <=$year_end; $i_year++) {
                                                       $selected=($user_selected_year==$i_year ? ' selected' : '');
                                                       echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                        }

                                                                echo '</select>'."\n";
                                                    ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Select File</label>
                            <div class="input-group">
                                <input type="file" class="form-control" ng-model="clearinput" id="fileInput05"
                                    name=files[]
                                    accept=" application/vnd.ms-excel">
                                <!-- <div class="input-group-append">
                                        <p id="fileButton05" class="input-group-text">
                                                                    <i class="fa fa-upload"></i>
                                                                </p>                  
                                                              
                                        </div> -->
                            </div>
                        </div>


                        <div class="form-group col-md-4">

                            <div class="mt-25">
                                <button class="btn btn-sm btn-success" id="fileButton05"><i class="fa fa-table"></i>
                                    Upload
                                </button>

                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#ModalPayrollCategory" ng-click="GetBankSession()"><i
                                        class="fa fa-download"></i>
                                    Template Download</button>

                            </div>

                        </div>
                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>





                        <div class="modal fade" id="ModalPayrollConfirm" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Payroll List
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            Are You sure want to confirm this payroll list?
                                            Once you confirmed again you cannot update
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-rounded btn-danger" ng-click="ConfirmList();"
                                            data-dismiss="modal">Confirm</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">No</button>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="ModalPayrollCategory" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Category List
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            <style type="text/css">
                                            button.multiselect {
                                                min-width: 150px !important;
                                                background-color: #3ac47d;
                                                color: #ffffff;
                                                padding: 5px !important
                                            }

                                            .multiselect-container {
                                                min-width: 150px;
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

                                            <div class="form-group col-md-12">
                                                <div class="select-check">
                                                    <label class="col-form-label">Category</label><br />
                                                    <select id="multiple-checkboxes" multiple="multiple"
                                                        name="cat_name[]" ng-model="cat_name"
                                                        class="form-control multiple-checkboxes"
                                                        ng-change="GetMonthSession02()">
                                                        <option value="Category 1">Category 1 </option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 3</option>
                                                    </select>


                                                </div>



                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-warning btn-sm" href="Payrolldeductiontemplate.php"
                                            ng-click="GetMonthSession02()"><i class="fa fa-download"></i>
                                            Template Download</a>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">No</button>

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


        <script src="../Scripts/bootstrap-multiselect.js"></script>
        <script src="../Scripts/Controller/HRMPayrollController.js"></script>
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
                    <h3 class="section-title">Employee Payroll Deduction List Upload </h3>
                </div>

                <div id="overlay">
                    <div class="cv-spinner">
                        <span class="spinner"></span>
                    </div>
                </div>
                <div class="card">




                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="col-form-label">Month</label>
                            <select ng-model="Payrollmonth" class="form-control" ng-change="GetMonthSession02()"
                                id="Payrollmonth">
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


                                                   echo '<select   ng-model="Payrollyear" class="form-control"    ng-change="GetMonthSession02()" id="Payrollyear">'."\n";

                                                   for ($i_year=$year_start; $i_year <=$year_end; $i_year++) {
                                                       $selected=($user_selected_year==$i_year ? ' selected' : '');
                                                       echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                        }

                                                                echo '</select>'."\n";
                                                    ?>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Select File</label>
                            <div class="input-group">
                                <input type="file" class="form-control" ng-model="clearinput" id="fileInput05"
                                    name=files[]
                                    accept=" application/vnd.ms-excel">
                                <!-- <div class="input-group-append">
                                        <p id="fileButton05" class="input-group-text">
                                                                    <i class="fa fa-upload"></i>
                                                                </p>                  
                                                              
                                        </div> -->
                            </div>
                        </div>


                        <div class="form-group col-md-4">

                            <div class="mt-25">
                                <button class="btn btn-sm btn-success" id="fileButton05"><i class="fa fa-table"></i>
                                    Upload
                                </button>

                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#ModalPayrollCategory" ng-click="GetBankSession()"><i
                                        class="fa fa-download"></i>
                                    Template Download</button>

                            </div>

                        </div>
                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>





                        <div class="modal fade" id="ModalPayrollConfirm" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Payroll List
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            Are You sure want to confirm this payroll list?
                                            Once you confirmed again you cannot update
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-rounded btn-danger" ng-click="ConfirmList();"
                                            data-dismiss="modal">Confirm</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">No</button>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="ModalPayrollCategory" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Category List
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            <style type="text/css">
                                            button.multiselect {
                                                min-width: 150px !important;
                                                background-color: #3ac47d;
                                                color: #ffffff;
                                                padding: 5px !important
                                            }

                                            .multiselect-container {
                                                min-width: 150px;
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

                                            <div class="form-group col-md-12">
                                                <div class="select-check">
                                                    <label class="col-form-label">Category</label><br />
                                                    <select id="multiple-checkboxes" multiple="multiple"
                                                        name="cat_name[]" ng-model="cat_name"
                                                        class="form-control multiple-checkboxes"
                                                        ng-change="GetMonthSession02()">
                                                        <option value="Category 1">Category 1 </option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 3</option>
                                                    </select>


                                                </div>



                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-warning btn-sm" href="Payrolldeductiontemplate.php"
                                            ng-click="GetMonthSession02()"><i class="fa fa-download"></i>
                                            Template Download</a>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">No</button>

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


        <script src="../Scripts/bootstrap-multiselect.js"></script>
        <script src="../Scripts/Controller/HRMPayrollController.js"></script>
</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>