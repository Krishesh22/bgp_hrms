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
    <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM09Controller">
        <div class="container-fluid ">
            <div class="card">
                <h4 class="card-header text-green pl-0">Salary
                    Details</h4>



                <div class="row">
                    <div class="col-md-12">


                        <table class="table table-bordered  table-sm info-table can-table">
                            <thead>
                                <tr align="center">
                                    <th colspan="10">General
                                    </th>
                                    <th colspan="20">Monthly
                                        Detail
                                    </th>
                                    <th colspan="20">Annual
                                        Detail
                                    </th>

                                </tr>
                                <tr class="bg-green text-white">

                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>DH</th>
                                    <th>GM</th>
                                    <th>MD</th>
                                    <th>Basic</th>
                                    <th>Hra</th>
                                    <th>Special</th>
                                    <th>Total</th>
                                    <th>PF</th>
                                    <th>Graduity</th>
                                    <th>Retirals</th>
                                    <th>GAC</th>
                                    <th>Bonous</th>
                                    <th>Other Bonous</th>
                                    <th>CTC</th>
                                    <th>Deductions</th>
                                    <th>ESIC</th>
                                    <th>PFEmployee</th>
                                    <th>Canteen</th>
                                    <th>Stay</th>
                                    <th>Travel</th>
                                    <th>Other Deductions</th>
                                    <th>Deduction Total</th>
                                    <th>Take Home</th>

                                    <th>Basic</th>
                                    <th>Hra</th>
                                    <th>Special</th>
                                    <th>Total</th>
                                    <th>PF</th>
                                    <th>Graduity</th>
                                    <th>Retirals</th>
                                    <th>GAC</th>
                                    <th>Bonous</th>
                                    <th>Other Bonous</th>
                                    <th>CTC</th>
                                    <th>Deductions</th>
                                    <th>ESIC</th>
                                    <th>PFEmployee</th>
                                    <th>Canteen</th>
                                    <th>Stay</th>
                                    <th>Travel</th>
                                    <th>Other Deductions</th>
                                    <th>Deduction Total</th>
                                    <th>Take Home</th>

                                </tr>
                            </thead>


                            <tbody>

                                <tr dir-paginate="e in GetSalaryList |filter:searchSalary|itemsPerPage:5 "
                                    pagination-id="Salarygrid" current-page="currentPageSalary">




                                    <td>
                                        {{$index+1 + (currentPageSalary - 1) * pageSizeSalary}}
                                    </td>
                                    <td>
                                        <p>
                                            <span class="pointer"
                                                ng-click="SendFitEdit(e.Candidateid,e.fitno,e.Fitmenttype);">
                                                <img height="15" src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                            </span>
                                        </p>
                                    </td>




                                    <td>{{e.Fitmenttype}}</td>


                                    <td>{{e.FitStatus}}</td>
                                    <td>{{e.DeptHeadApprovalStatus}}</td>
                                    <td>{{e.GMApprovalStatus}}</td>
                                    <td>{{e.MDApproval}}</td>
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
                        <div class="float-right mt-2">
                            <div class="pagination ">
                                <dir-pagination-controls pagination-id="Salarygrid" max-size="3" direction-links="true"
                                    boundary-links="true" class="pagination">
                                </dir-pagination-controls>
                            </div>

                        </div>

                        <button class="btn btn-rounded btn-info" ng-click="FitOpen();">Add(+)</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog" id="" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="fitment-table">
                                        <table>
                                            <tbody>
                                                <tr class="table-title">
                                                    <td>Components</td>
                                                    <td>Monthly</td>
                                                    <td>Annual</td>
                                                    <td>inc%</td>
                                                    <td>&emsp;Components</td>
                                                    <td>Monthly</td>
                                                    <td>Annual</td>
                                                    <td>inc%</td>
                                                </tr>
                                                <tr>
                                                    <td style="width:150px">Basic+DA</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaBasicDA" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperBasicDA" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;HRA</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotHRA"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaHRA"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperHRA"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Special Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotSpecialAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaSpecialAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperSpecialAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Total Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>
                                </div>


                            </div>

                            <hr />





                            <div class="row">

                                <label class="col-md-12 text-green mb-2"><b>Retirals Employer
                                        Contribution</b></label>


                                <div class="col-md-12">
                                    <div class="fitment-table">

                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="width:150px">PF (12 %) From Basic</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotPFemployeer" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaPFemployeer" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td> <input type="text" class="form-control"
                                                            ng-model="CurincperPFemployeer" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;Gradutity(5%)</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotGratuity" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaGratuity" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperGratuity" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Retirals Total</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotRetairlsTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaRetairlsTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperRetairlsTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;GAC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotGAC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGAC"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperGAC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bonous @ 8.33%</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotEstimatedBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaEstimatedBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperEstimatedBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Other Bonous</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotOtherBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaOtherBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperOtherBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                            <hr />
                            <div class="row">


                                <label class="col-md-6 text-green mb-2"><b>Other Components</b></label>

                                <label class="col-md-6 text-green mb-2"><b>Deductions</b></label>

                                <div class="col-md-12">
                                    <div class="fitment-table">

                                        <table>
                                            <tbody>

                                                <tr>
                                                    <td style="width:150px">Est.CTC </td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotCTC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCTC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperCTC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;PF Employee</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotPFemployee" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaPFemployee" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperPFemployee" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ESIC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotESIC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperESIC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td>&emsp;Stay Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotStayAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaStayAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperStayAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Canteen</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotCanteen"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaCanteen" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperCanteen" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td>&emsp;Other Deductions</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotOtherDeductions" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaOtherDeductions" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperOtherDeductions" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                </tr>
                                                <tr>
                                                    <td>Travel Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotTravelAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaTravelAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperTravelAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td>&emsp;Take Home</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMottakehomewithouttax" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuatakehomewithouttax" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="Curincpertakehomewithouttax" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Deductions Total</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotDeductionTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaDeductionTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperDeductionTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
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
                                        <div class="col-md-3">
                                            <label class="col-form-label">Status</label>
                                        </div>
                                        <div class="col-md-3 nopadding">
                                            <select class="form-control" ng-model="FitStatus"
                                                ng-change="GetStatusAlert(FitStatus);">
                                                <option Value="Open">Open</option>
                                                <option value="Cancel">Cancel</option>
                                                <!-- <option value="Final">Final</option> -->
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="col-form-label">Type</label>
                                        </div>
                                        <div class="col-md-3 nopadding">
                                            <select class="form-control" ng-model="FitType">
                                                <option Value="Request Fitment">Request Fitment</option>
                                                <option value="Recommended Fitment">Recommended Fitment</option>
                                                <option value="Final Fitment">Final Fitment</option>
                                            </select>
                                        </div>
                                    </div>





                                </div>
                                <div class="col-md-6 nopadding">
                                    <div class="form-group text-right">
                                        <button class="btn btn-sm btn-success" ng-click="UpdateFitement();"><i
                                                class="fa fa-save"></i>
                                            Update</button>

                                        <button class="btn btn-sm btn-warning" ng-click="CalculateFitment();"><i
                                                class="fa fa-calculator"></i>
                                            Calculate</button>

                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
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
        <div class="modal fade" id="ModalFinal" tabindex="-1" role="dialog" id="" aria-hidden="true">
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
                                    <input type="text" class="form-control" ng-model="CurMotBasicDA" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaBasicDA" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperBasicDA" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">HRA</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotHRA" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaHRA" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperHRA" readonly>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="col-form-label">Special
                                        Allowance</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotSpecialAllowance" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaSpecialAllowance"
                                        readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperSpecialAllowance"
                                        readonly>
                                </div>

                                <div class="col-lg-2">
                                    <label class="col-form-label">Total
                                        Allowance</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotTotalAllowance" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaTotalAllowance" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperTotalAllowance" readonly>
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
                                    <input type="text" class="form-control" ng-model="CurMotPFemployeer" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaPFemployeer" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperPFemployeer" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">Gradutity(5%)</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotGratuity" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaGratuity" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperGratuity" readonly>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="col-form-label">Retirals
                                        Total</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotRetairlsTotal" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperRetairlsTotal" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">GAC</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotGAC" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaGAC" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperGAC" readonly>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="col-form-label">Bonous @
                                        8.33%</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotEstimatedBonous" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaEstimatedBonous" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperEstimatedBonous"
                                        readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">Other
                                        Bonous</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotOtherBonous" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaOtherBonous" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperOtherBonous" readonly>
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
                                    <input type="text" class="form-control" ng-model="CurMotCTC" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaCTC" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperCTC" readonly>
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
                                    <input type="text" class="form-control" ng-model="CurMotESIC" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaESIC" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperESIC" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">PF
                                        Employee</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotPFemployee" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaPFemployee" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperPFemployee" readonly>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-2">
                                    <label class="col-form-label">Canteen</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotCanteen" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaCanteen" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperCanteen" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">Stay
                                        Allowance</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotStayAllowance" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaStayAllowance" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperStayAllowance" readonly>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-2">
                                    <label class="col-form-label">Travel
                                        Allowance</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotTravelAllowance" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaTravelAllowance" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperTravelAllowance"
                                        readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">Other
                                        Deductions</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotOtherDeductions" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaOtherDeductions" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperOtherDeductions"
                                        readonly>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-2">
                                    <label class="col-form-label">Deductions
                                        Total</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMotDeductionTotal" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuaDeductionTotal" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurincperDeductionTotal" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label">Take
                                        Home</label>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurMottakehomewithouttax"
                                        readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="CurAnnuatakehomewithouttax"
                                        autocomplete="off" readonly>
                                </div>
                                <div class="col-lg-1 nopadding">
                                    <input type="text" class="form-control" ng-model="Curincpertakehomewithouttax"
                                        autocomplete="off" readonly>
                                </div>

                            </div>



                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">


                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalCenterWorkers" tabindex="-1" role="dialog" id="" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="card-body">



                            <div class="row">

                                <div class="col-md-12">
                                    <div class="fitment-table">
                                        <table>
                                            <tbody>
                                                <tr class="table-title">
                                                    <td>Components</td>
                                                    <td>Monthly</td>
                                                    <td>Annual</td>
                                                    <td>inc%</td>
                                                    <td>&emsp;Components</td>
                                                    <td>Monthly</td>
                                                    <td>Annual</td>
                                                    <td>inc%</td>
                                                </tr>
                                                <tr>
                                                    <td style="width:150px">Basic+DA</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaBasicDA" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperBasicDA" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td style="width:150px">&emsp;HRA</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotHRA"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaHRA"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperHRA"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Special Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotSpecialAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaSpecialAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperSpecialAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Total Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>
                                </div>


                            </div>

                            <hr />



                            <div class="row">

                                <label class="col-md-12 text-green mb-2"><b>Retirals Employer
                                        Contribution</b></label>


                                <div class="col-md-12">
                                    <div class="fitment-table">

                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="width:150px">PF (12 %) From Basic</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotPFemployeer" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaPFemployeer" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperPFemployeer" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;Gradutity(5%)</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotGratuity" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaGratuity" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperGratuity" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Retirals Total</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotRetairlsTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaRetairlsTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperRetairlsTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;GAC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotGAC"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGAC"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperGAC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bonous @ 8.33%</td>
                                                    <td> <input type="text" class="form-control"
                                                            ng-model="CurMotEstimatedBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td> <input type="text" class="form-control"
                                                            ng-model="CurAnnuaEstimatedBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperEstimatedBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Other Bonous</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotOtherBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaOtherBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperOtherBonous" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                            <hr />

                            <div class="row">


                                <label class="col-md-6 text-green mb-2"><b>Other Components</b></label>

                                <label class="col-md-6 text-green mb-2"><b>Deductions</b></label>

                                <div class="col-md-12">
                                    <div class="fitment-table">

                                        <table>
                                            <tbody>

                                                <tr>
                                                    <td style="width:150px">Est.CTC </td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotCTC"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCTC"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperCTC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;PF Employee</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotPFemployee" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaPFemployee" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperPFemployee" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ESIC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotESIC"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperESIC"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            readonly>
                                                    </td>
                                                    <td>&emsp;Stay Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotStayAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaStayAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperStayAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Canteen</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotCanteen"
                                                            autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaCanteen" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperCanteen" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td>&emsp;Other Deductions</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotOtherDeductions" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaOtherDeductions" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperOtherDeductions" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                </tr>
                                                <tr>
                                                    <td>Travel Allowance</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotTravelAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaTravelAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperTravelAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td>&emsp;Take Home</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMottakehomewithouttax" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuatakehomewithouttax" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="Curincpertakehomewithouttax" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Deductions Total</td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurMotDeductionTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurAnnuaDeductionTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="CurincperDeductionTotal" autocomplete="off"
                                                            onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                                    </div>

                                </div>
                            </div>





                            <div class="row">

                                <div class="col-md-6">
                                    <div class="row">
                                        div class="col-md-3">
                                        <label class="col-form-label">Status</label>
                                    </div>
                                    <div class="col-md-3 nopadding">
                                        <select class="form-control" ng-model="FitStatus"
                                            ng-change="GetStatusAlert(FitStatus);">
                                            <option Value="Open">Open</option>
                                            <option value="Cancel">Cancel</option>
                                            <!-- <option value="Final">Final</option> -->
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-form-label">Type</label>
                                    </div>
                                    <div class="col-md-3 nopadding">
                                        <select class="form-control" ng-model="FitType">
                                            <option Value="Request Fitment">Request Fitment</option>
                                            <option value="Recommended Fitment">Recommended Fitment</option>
                                            <option value="Final Fitment">Final Fitment</option>
                                        </select>
                                    </div>
                                </div>





                            </div>
                            <div class="col-md-6 nopadding">
                                <div class="form-group text-right">
                                    <button class="btn btn-sm btn-success" ng-click="UpdateFitement();"><i
                                            class="fa fa-save"></i>
                                        Update</button>



                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
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
</body>

</html>