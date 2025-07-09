<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Payroll-Deduction</title>
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
                    <h3 class="section-title">Employee Payroll Deduction List</h3>
                </div>
                <div class="card">




                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="col-form-label">Month</label>
                            <select ng-model="Payrollmonth" class="form-control" ng-change="GetBankSession()"
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
                            <?php $year_start=2021;
                                                 $year_end=date('Y'); // current Year


                                                   echo '<select   ng-model="Payrollyear" class="form-control"    ng-change="GetBankSession()" id="Payrollyear">'."\n";

                                                   for ($i_year=$year_start; $i_year <=$year_end; $i_year++) {
                                                       $selected=($user_selected_year==$i_year ? ' selected' : '');
                                                       echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                        }

                                                                echo '</select>'."\n";
                                                    ?>
                        </div>
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

                        <div class="form-group col-md-2">
                            <div class="select-check">
                                <label class="col-form-label">Category</label><br />
                                <select id="multiple-checkboxes" multiple="multiple" name="cat_name[]"
                                    ng-model="cat_name" class="form-control multiple-checkboxes"
                                    ng-change="GetMonthSession()">
                                    <option value="Category 1">Category 1 </option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 3</option>
                                </select>


                            </div>



                        </div>

                        <div class="form-group col-md-1">

                            <div class="mt-25">
                                <button class="btn btn-sm btn-success" ng-click="GetDeductionDetails();"><i
                                        class="fa fa-table"></i> Get Details
                                </button>


                            </div>

                        </div>
                        <div class="row">
                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>
                        </div>
                        <div class=" col-lg-12 table-responsive custom-table custom-table-noborder"
                            ng-show="Authorizedno==1">
                            <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                <thead>


                                    <tr class="tablethrow">
                                        <th style="width: 50px;">S.No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Dept</th>
                                        <th>Designation</th>
                                        <th>Advance</th>
                                        <th>Food&nbsp;&&nbsp;Deduction</th>
                                        <th>TDS</th>
                                        <th>Edit Request</th>
                                        <th>Delete&nbsp;Request</th>
                                        <th>Notes</th>
                                        <th>Action</th>





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
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Salary_Advance">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.FoodDeduction">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.TDS"></td>

                                    <td><input type="text" class="form-control"
                                            ng-model="searchPayroll.Editrequestapproval"></td>
                                    <td colspan="3"><input type="text" class="form-control"
                                            ng-model="searchPayroll.Deleterequestapproval"></td>

                                </tr>


                                <tr dir-paginate="e in GetDeductionList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                    current-page="currentPagePayroll01" pagination-id="PayrollGridAdmin"
                                    ng-class="{'rowcoloreditmatched':e.EditDeleterequest=='Edit','rowcolormissmatched':e.EditDeleterequest=='Delete'}">

                                    <td>
                                        {{$index+1+(currentPagePayroll01 - 1) * pageSizePayroll01}}

                                    </td>
                                    <td> {{e.Employeeid}}</td>
                                    <td>{{e.Fullname}}</td>
                                    <td>{{e.Department}}</td>
                                    <td>{{e.Designation}}</td>
                                    <td ng-show="e.Payrollstatus=='Open'"> <input class="form-control"
                                            ng-model=e.Salary_Advance onkeypress="return Validate(event);"
                                            ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)" />
                                    </td>

                                    <td ng-show=" e.Payrollstatus=='Close'"> {{e.Salary_Advance}}</td>


                                    <td ng-show="e.Payrollstatus=='Open'"> <input class="form-control"
                                            ng-model=e.FoodDeduction onkeypress="return Validate(event);"
                                            ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)" />
                                    </td>
                                    <td ng-show=" e.Payrollstatus=='Close'"> {{e.FoodDeduction}}</td>
                                    <td ng-show="e.Payrollstatus=='Open'"> <input class="form-control" ng-model=e.TDS
                                            onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)" />
                                    </td>
                                    <td ng-show=" e.Payrollstatus=='Close'"> {{e.TDS}}</td>


                                    <td ng-show="e.Payrollstatus=='Open'"><select class="form-control"
                                            ng-model="e.Editrequestapproval" ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)">
                                            <option Value="Active">Active</option>
                                            <option Value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>

                                        </select>
                                    </td>
                                    <td ng-show="e.Payrollstatus=='Close'">{{e.Editrequestapproval}}
                                    </td>

                                    <td ng-show="e.Payrollstatus=='Open'">

                                        <select class="form-control" ng-model="e.Deleterequestapproval"
                                            ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)">
                                            <option Value="Active">Active</option>
                                            <option Value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>

                                        </select>
                                    </td>
                                    <td ng-show="e.Payrollstatus=='Close'">{{e.Deleterequestapproval}}
                                    </td>

                                    <td> {{e.Editingreason}} {{e.Deletingreason}}</td>
                                    <td style="width:50px;" ng-show="e.Payrollstatus=='Open'">
                                        <img height="15" data-toggle="modal" data-target="#ModalPayrollDelete"
                                            ng-click="FetchDeductionEdit(e.Salyear,e.SalMonth,e.Employeeid);"
                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                       




                                    </td>
                                    <td ng-show="e.Payrollstatus=='Close'">None</td>

                                </tr>



                            </table>
                            <dir-pagination-controls pagination-id="PayrollGridAdmin" max-size="3"
                                direction-links="true" boundary-links="true" class="pagination">
                            </dir-pagination-controls>
                        </div>



                        <div class=" col-lg-12 table-responsive custom-table custom-table-noborder"
                            ng-show="Authorizedno!=1">
                            <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                <thead>


                                    <tr class="tablethrow">
                                        <th style="width: 50px;">S.No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Dept</th>
                                        <th>Designation</th>
                                        <th>Advance</th>
                                        <th>Food&nbsp;&&nbsp;Deduction</th>
                                        <th>TDS</th>
                                        <th>Edit Request</th>
                                        <th>Delete&nbsp;Request</th>
                                        <th>Notes</th>
                                        <th>Action</th>





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
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Salary_Advance">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.FoodDeduction">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.TDS"></td>

                                    <td><input type="text" class="form-control"
                                            ng-model="searchPayroll.Editrequestapproval"></td>
                                    <td colspan="3"><input type="text" class="form-control"
                                            ng-model="searchPayroll.Deleterequestapproval"></td>

                                </tr>


                                <tr dir-paginate="e in GetDeductionList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                    current-page="currentPagePayroll01" pagination-id="PayrollGridAdmin"
                                    ng-class="{'rowcoloreditmatched':e.EditDeleterequest=='Edit','rowcolormissmatched':e.EditDeleterequest=='Delete'}">

                                    <td>
                                        {{$index+1+(currentPagePayroll01 - 1) * pageSizePayroll01}}

                                    </td>
                                    <td> {{e.Employeeid}}</td>
                                    <td>{{e.Fullname}}</td>
                                    <td>{{e.Department}}</td>
                                    <td>{{e.Designation}}</td>
                                    <td ng-show="e.Payrollstatus=='Open' && e.Editrequestapproval=='Approved'"> <input class="form-control"
                                            ng-model=e.Salary_Advance onkeypress="return Validate(event);"
                                            ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)" />
                                    </td>
                                    <td ng-show="e.Payrollstatus=='Open' && e.Editrequestapproval!='Approved'"> {{e.Salary_Advance}}</td>
                                    <td ng-show=" e.Payrollstatus=='Close'"> {{e.Salary_Advance}}</td>


                                    <td ng-show="e.Payrollstatus=='Open' && e.Editrequestapproval=='Approved'"> <input class="form-control"
                                            ng-model=e.FoodDeduction onkeypress="return Validate(event);"
                                            ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)" />
                                    </td>
                                    <td ng-show="e.Payrollstatus=='Open' && e.Editrequestapproval!='Approved'"> {{e.FoodDeduction}}</td>
                                    <td ng-show=" e.Payrollstatus=='Close'"> {{e.FoodDeduction}}</td>
                                    <td ng-show="e.Payrollstatus=='Open' && e.Editrequestapproval=='Approved'"> <input class="form-control" ng-model=e.TDS
                                            onkeypress="return Validate(event);" ng-model-options='{ debounce: 2000 }'
                                            ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Editrequestapproval,e.Deleterequestapproval,$index)"/>
                                    </td>
                                    <td ng-show="e.Payrollstatus=='Open' && e.Editrequestapproval!='Approved'"> {{e.TDS}}</td>
                                    <td ng-show=" e.Payrollstatus=='Close'"> {{e.TDS}}</td>


                  
                                    <td >{{e.Editrequestapproval}}
                                    </td>

                                  
                                    <td >{{e.Deleterequestapproval}}
                                    </td>

                                    <td> {{e.Editingreason}} {{e.Deletingreason}}</td>
                                    <td style="width:50px;" ng-show="e.Payrollstatus=='Open'">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1Property"
                                            ng-click="FetchDeductionEdit03(e.Salyear,e.SalMonth,e.Employeeid);"
                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                        <img height="15"
                                            ng-click="FetchDeductionEdit02(e.Salyear,e.SalMonth,e.Employeeid);"
                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                    </td>
                                    <td style="width:50px;" ng-show="e.Payrollstatus=='Close'">None</td>

                                </tr>



                            </table>
                            <dir-pagination-controls pagination-id="PayrollGridAdmin" max-size="3"
                                direction-links="true" boundary-links="true" class="pagination">
                            </dir-pagination-controls>
                        </div>



                        <div class="modal fade" id="ModalEditingReason" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Editing Reasons</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">

                                            <label class="col-form-label">Editing Detail</label>


                                            <textarea class="form-control" ng-model="Editingreason"></textarea>


                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn  btn-success" ng-click="UpdateEditingReason();"
                                            data-dismiss="modal">Update</button>

                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="ModalDeletingReason" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Deleting Reasons</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">

                                            <label class="col-form-label">Deleting Reason</label>


                                            <textarea class="form-control" ng-model="Deletingreason"></textarea>


                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn  btn-success" ng-click="UpdateDeletingReason();"
                                            data-dismiss="modal">Update</button>

                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ModalPayrollDelete" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete-{{Employeeid}}
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
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteConfirmation();"
                                            data-dismiss="modal">Delete</button>
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
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">No</button>

                        </div>
                    </div>
                </div>
            </div>




        </div>
        <?php include '../footerjs.php'?>




        <script src="../Scripts/bootstrap-multiselect.js"></script>
        <script src="../Scripts/Controller/HRMPayrollController.js"></script>
</body>

</html>