<?php include '../config.php' ?>
<?php
session_start();
$_SESSION["Clientid"] = 1;
//$_SESSION["ClientidNew"] = 4;
if (isset($_GET['Candidateid'])) {
    $_SESSION["CandidateidNew"] = mysqli_real_escape_string($conn, $_GET['Candidateid']);
}
if (isset($_GET['Clientid'])) {
    $_SESSION["ClientidNew"] = mysqli_real_escape_string($conn, $_GET['Clientid']);
    $_SESSION["Clientid"] =     $_SESSION["ClientidNew"];
}
//$_SESSION["CandidateidNew"] =150;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo "$domain"; ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <title>Super User Approval</title>
    <style type="text/css">
        .cardapi {
            font-size: 14px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .cardapi input {
            font-size: 14px;
            padding: 3px;
        }

        .cardapi .card-header {
            color: #008000;
            background-color: #ffffff;
        }

        .dashboard-wrapper {
            margin-top: 25px;
        }

        .cardlabel .col-form-label {
            padding-bottom: 0px;
        }

        .mb-0 {
            margin-bottom: 0px !important;
        }

        .mx-15 {
            margin: 0 -15px;
        }

        .thead-1 {
            background-color: #349734;
            color: #ffffff;
        }

        .thead-2 {
            background-color: #1c511c;
            color: #ffffff;
        }

        .thead-2 th {
            font-weight: normal !important;
        }

        .can-table {
            margin-top: 10px;
        }

        .fit-table-new {
            max-width: 800px;
            font-size: 13px;
        }

        .fit-table-new input {
            font-size: 14px;
            padding: 3px;
        }

        .table-head {
            color: #008000;
        }
    </style>
</head>

<body>
    <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRMApiController">
        <div class="container ">

            <div class="card cardapi cardlabel">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Candidate
                            ID</label>
                        <input type="text" class="form-control" ng-model="Candidateid" autocomplete="off" readonly>
                    </div>

                    <div class="form-group col-md-9 mb-0">

                        <div class="row mb-0">

                            <div class="form-group col-md-4">
                                <label class="col-form-label">First
                                    Name</label>
                                <div class="input-group "><span class="input-group-prepend">

                                        <input type="text" style="width:30%" placeholder="Firstname" class="form-control" ng-model="Title" readonly>&nbsp;

                                        <input type="text" placeholder="Firstname" class="form-control" ng-model="Firstname" readonly>
                                </div>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">Last
                                    Name</label>
                                <input type="text" class="form-control" ng-model="Lastname" autocomplete="off" readonly>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">Status</label>
                                <input type="text" class="form-control" ng-model="Selectionstatus" autocomplete="off" readonly>


                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Gender</label>
                        <input type="text" class="form-control" ng-model="Gender" autocomplete="off" readonly>


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Qualification</label>
                        <input type="text" class="form-control" ng-model="Qualification" autocomplete="off" readonly>

                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Married</label>
                        <input type="text" class="form-control" ng-model="Married" autocomplete="off" readonly>

                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Mother Tongue
                        </label>
                        <input type="text" class="form-control" ng-model="Mothertongue" autocomplete="off" readonly>

                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Contact
                            No</label>
                        <input type="text" class="form-control" ng-model="Contactno" autocomplete="off" readonly>


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Category</label>
                        <input type="text" class="form-control" ng-model="Category" autocomplete="off" readonly>

                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Email
                            ID</label>
                        <input type="text" class="form-control" ng-model="Emailid" autocomplete="off" readonly>


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Current
                            Location</label>
                        <input type="text" class="form-control" ng-model="City" autocomplete="off" readonly>

                    </div>

                </div>
            </div>

            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    Personal
                    Information</h5>
                <div class="card-body">
                    <div class="row">


                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Languages
                                    known</label>

                                <input type="text" class="form-control" ng-model="Languages" autocomplete="off" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Date
                                    of
                                    Birth</label>
                                <input type="text" class="form-control" ng-model="Dob" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Age</label>
                                <input type="text" class="form-control" ng-model="Age" autocomplete="off" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Application
                                    Date</label>
                                <input type="text" class="form-control" ng-model="ApplicationDate" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Blood
                                    Group</label>
                                <input type="text" class="form-control" ng-model="Bloodgroup" autocomplete="off" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Fresher</label>

                                <input type="text" class="form-control" ng-model="Fresher" autocomplete="off" readonly>

                            </div>

                            <div class="form-group col-md-3" ng-show="btnfresherno">
                                <label class="col-form-label">Expereience</label>
                                <input type="text" class="form-control" ng-model="Expereience" autocomplete="off" readonly>
                            </div>



                            <div class="form-group col-md-3" ng-show="btnfresherno">
                                <label class="col-form-label">Serving
                                    NP</label>
                                <input type="text" class="form-control" ng-model="ServingNoticeperiod" autocomplete="off" readonly>

                            </div>

                            <div class="form-group col-md-3" ng-show="btnfresherno">
                                <label class="col-form-label">Notice
                                    Period</label>
                                <input type="text" class="form-control" ng-model="NoticePeriod" autocomplete="off" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Available
                                    on
                                    Interview</label>
                                <input type="text" class="form-control" ng-model="Availableoninterview" readonly>
                            </div>


                            <div class="form-group col-md-12 mb-0">
                                <label class="col-form-label ">Address</label>
                                <textarea class="form-control mb-0" ng-model="Address" readonly></textarea>
                            </div>





                        </div>

                    </div>



                </div>

            </div>
            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    HR Interview Notes</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 mx-15">
                            <label class="col-form-label">
                                HR Notes</label>

                            <textarea type="text" class="form-control " ng-model="HRinterviewnotes" autocomplete="off" readonly></textarea>
                        </div>
                    </div>

                </div>
            </div>


            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    Department Head Interview Notes</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-12 mx-15">
                            <label class="col-form-label">
                                Department Head Interview Notes</label>

                            <textarea type="text" class="form-control" ng-model="DHinterviewnotes" autocomplete="off" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    General Manager Notes</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-12 mx-15">
                            <label class="col-form-label">
                                General Manager Notes</label>

                            <textarea type="text" class="form-control" ng-model="GMinterviewnotes" autocomplete="off" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    Admin Notes</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-12 mx-15">
                            <label class="col-form-label">
                                Admin Notes</label>

                            <textarea type="text" class="form-control" ng-model="MDinterviewnotes" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card cardapi cardlabel">
                <h4 class="card-header text-green pl-0">Salary
                    Details</h4>



                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table table-bordered  table-sm info-table can-table">
                                <thead>
                                    <tr align="center" class="thead-1">
                                        <th colspan="10">General
                                        </th>
                                        <th colspan="20">Monthly
                                            Detail
                                        </th>
                                        <th colspan="20">Annual
                                            Detail
                                        </th>

                                    </tr>
                                    <tr class="bg-green text-white thead-2" align="center">

                                        <th style="min-width:30px">#</th>
                                        <th>Action</th>
                                        <th style="min-width:180px">Status</th>
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
                                        <th style="min-width:110px">Other Bonous</th>
                                        <th>CTC</th>
                                        <th>Deductions</th>
                                        <th>ESIC</th>
                                        <th>PFEmployee</th>
                                        <th>Canteen</th>
                                        <th>Stay</th>
                                        <th>Travel</th>
                                        <th style="min-width:120px">Other Deductions</th>
                                        <th style="min-width:120px">Deduction Total</th>
                                        <th style="min-width:110px">Take Home</th>

                                        <th>Basic</th>
                                        <th>Hra</th>
                                        <th>Special</th>
                                        <th>Total</th>
                                        <th>PF</th>
                                        <th>Graduity</th>
                                        <th>Retirals</th>
                                        <th>GAC</th>
                                        <th>Bonous</th>
                                        <th style="min-width:100px">Other Bonous</th>
                                        <th>CTC</th>
                                        <th>Deductions</th>
                                        <th>ESIC</th>
                                        <th>PFEmployee</th>
                                        <th>Canteen</th>
                                        <th>Stay</th>
                                        <th>Travel</th>
                                        <th style="min-width:120px">Other Deductions</th>
                                        <th style="min-width:120px">Deduction Total</th>
                                        <th style="min-width:100px">Take Home</th>

                                    </tr>
                                </thead>


                                <tbody>

                                    <tr dir-paginate="e in GetSalaryList |filter:searchSalary|itemsPerPage:5 " pagination-id="Salarygrid" current-page="currentPageSalary">




                                        <td>
                                            {{$index+1 + (currentPageSalary - 1) * pageSizeSalary}}
                                        </td>
                                        <td align="center">
                                            <a href="javascript:void(0);" ng-click="SendFitEdit(e.Candidateid,e.fitno,e.Fitmenttype);">
                                                <img height="15" src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                            </a>
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
                                    <dir-pagination-controls pagination-id="Salarygrid" max-size="3" direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>
                                </div>

                            </div>
                        </div>





                    </div>
                </div>
                <div class="alert alert-success" role="alert" ng-show="Message">

                    {{Message}}

                </div>

            </div>
            <div class="card cardapi cardlabel" ng-show="btnshow">





                <h4 class="card-header text-green pl-0">Fitment Details {{FitType }}</h4>


                <table class="fit-table-new mt-2">
                    <tbody>
                        <tr class="table-head">
                            <td style="width:110px">Components</td>
                            <td style="width:90px">Monthly</td>
                            <td style="width:90px">Annual</td>
                            <td style="width:90px">inc%</td>
                            <td style="width:130px">&emsp;Components</td>
                            <td style="width:90px">Monthly</td>
                            <td style="width:90px">Annual</td>
                            <td style="width:90px">inc%</td>
                        </tr>
                        <tr>
                            <td>Basic+DA</td>
                            <td><input type="text" class="form-control" ng-model="CurMotBasicDA" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaBasicDA" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperBasicDA" readonly></td>
                            <td>&emsp;HRA</td>
                            <td><input type="text" class="form-control" ng-model="CurMotHRA" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaHRA" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperHRA" readonly></td>
                        </tr>
                        <tr>
                            <td>Other Allowance</td>
                            <td><input type="text" class="form-control" ng-model="CurMotSpecialAllowance" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaSpecialAllowance" readonly>
                            </td>
                            <td><input type="text" class="form-control" ng-model="CurincperSpecialAllowance" readonly>
                            </td>


                            <td>&emsp;Performance Allowance</td>
                            <td><input type="text" class="form-control" ng-model="Performanceallowancemonthly" autocomplete="off" onkeypress="return Validate(event);" readonly>
                            </td>
                            <td><input type="text" class="form-control" ng-model="Performanceallowanceyearly" autocomplete="off" onkeypress="return Validate(event);" readonly>
                            </td>
                            <td><input type="text" class="form-control" autocomplete="off" value="0" onkeypress="return Validate(event);" readonly>
                            </td>

                        </tr>
                        <tr>
                            <td>&emsp;Total Allowance</td>
                            <td><input type="text" class="form-control" ng-model="CurMotTotalAllowance" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaTotalAllowance" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperTotalAllowance" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" class="table-head"><br />Retirals Employer Contribution</td>

                        </tr>
                        <tr>
                            <td>PF (12 %) From Basic</td>
                            <td><input type="text" class="form-control" ng-model="CurMotPFemployeer" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployeer" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperPFemployeer" readonly></td>
                            <td>&emsp;Gradutity (5%)</td>
                            <td><input type="text" class="form-control" ng-model="CurMotGratuity" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaGratuity" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperGratuity" readonly></td>
                        </tr>
                        <tr>
                            <td>Retirals Total</td>
                            <td><input type="text" class="form-control" ng-model="CurMotRetairlsTotal" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperRetairlsTotal" readonly></td>
                            <td>&emsp;GAC</td>
                            <td><input type="text" class="form-control" ng-model="CurMotGAC" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaGAC" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperGAC" readonly></td>
                        </tr>
                        <tr>
                            <td>Bonous @ 8.33%</td>
                            <td><input type="text" class="form-control" ng-model="CurMotEstimatedBonous" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaEstimatedBonous" readonly>
                            </td>
                            <td><input type="text" class="form-control" ng-model="CurincperEstimatedBonous" readonly>
                            </td>
                            <td>&emsp;Other Bonous</td>
                            <td><input type="text" class="form-control" ng-model="CurMotOtherBonous" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaOtherBonous" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperOtherBonous" readonly></td>
                        </tr>
                        <td colspan="4" class="table-head"><br />Other Components</td>
                        <td colspan="4" class="table-head"><br />&emsp;Deductions</td>
                        <tr>
                            <td>Est.CTC</td>
                            <td><input type="text" class="form-control" ng-model="CurMotCTC" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaCTC" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperCTC" readonly></td>
                            <td>&emsp;PF Employee</td>
                            <td><input type="text" class="form-control" ng-model="CurMotPFemployee" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployee" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperPFemployee" readonly></td>
                        </tr>
                        <tr>
                            <td>ESIC</td>
                            <td><input type="text" class="form-control" ng-model="CurMotESIC" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaESIC" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperESIC" readonly></td>
                            <td>&emsp;Stay Allowance</td>
                            <td><input type="text" class="form-control" ng-model="CurMotStayAllowance" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaStayAllowance" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperStayAllowance" readonly></td>
                        </tr>
                        <tr>
                            <td>Canteen</td>
                            <td><input type="text" class="form-control" ng-model="CurMotCanteen" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaCanteen" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperCanteen" readonly></td>
                            <td>&emsp;Other Deductions</td>
                            <td><input type="text" class="form-control" ng-model="CurMotOtherDeductions" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaOtherDeductions" readonly>
                            </td>
                            <td><input type="text" class="form-control" ng-model="CurincperOtherDeductions" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Conveyence Allowance</td>
                            <td><input type="text" class="form-control" ng-model="CurMotTravelAllowance" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaTravelAllowance" readonly>
                            </td>
                            <td><input type="text" class="form-control" ng-model="CurincperTravelAllowance" readonly>
                            </td>
                            <td>&emsp;Take Home</td>
                            <td><input type="text" class="form-control" ng-model="CurMottakehomewithouttax" readonly>
                            </td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuatakehomewithouttax" autocomplete="off" readonly></td>
                            <td><input type="text" class="form-control" ng-model="Curincpertakehomewithouttax" autocomplete="off" readonly></td>
                        </tr>
                        <tr>
                            <td>Deductions Total</td>
                            <td><input type="text" class="form-control" ng-model="CurMotDeductionTotal" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurAnnuaDeductionTotal" readonly></td>
                            <td><input type="text" class="form-control" ng-model="CurincperDeductionTotal" readonly>
                            </td>

                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="3" align="right"><button class="btn btn-sm btn-rounded btn-success mt-2" ng-click="" data-toggle="modal" data-target="#ModalCenterApprovedFitment">Approve</button>
                                &nbsp;<button class="btn btn-sm btn-rounded btn-danger mt-2" ng-click="" data-toggle="modal" data-target="#ModalCenterRejectedFitment">
                                    Reject</button></td>
                        </tr>

                    </tbody>
                </table>

















            </div>


        </div>



        <div class="modal fade" id="ModalCenterApprovedFitment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header alert alert-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle">Approved {{FitType}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Once the status is approved , it goes to next level approval and the details cannot be
                            modified. Do you want to proceed ?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-rounded btn-success" ng-click="UpdateFitmentMDApproved();" data-dismiss="modal">Approved</a>
                        <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">No</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalCenterRejectedFitment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header alert alert-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle">Rejected {{FitType}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            If the status is Rejected , the candidate wil be rejected. It does not goes to next level.
                            Do you want to proceed?
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-rounded btn-danger" ng-click="UpdateFitmentMDRejected();" data-dismiss="modal">Reject</a>
                        <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">No</button>

                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog" id="" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">

                        <div class="alert alert-success" role="alert" ng-show="Message">

                            {{Message}}

                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="fit-table-new">
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
                                                    <td><input type="text" class="form-control" ng-model="CurMotBasicDA" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaBasicDA" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperBasicDA" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;HRA</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotHRA" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaHRA" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperHRA" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Special Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>

                                                    <td>&emsp;Performance Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="Performanceallowancemonthly" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="Performanceallowanceyearly" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <!-- <td><input type="text" class="form-control"
                                                            ng-model="CurincperTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td> -->

                                                </tr>
                                                <tr>
                                                    <td>&emsp;Total Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperTotalAllowance" autocomplete="off" onkeypress="return Validate(event);"></td>
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
                                    <div class="fit-table-new">

                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="width:150px">PF (12 %) From Basic</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotPFemployeer" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployeer" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td> <input type="text" class="form-control" ng-model="CurincperPFemployeer" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;Gradutity(5%)</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotGratuity" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGratuity" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperGratuity" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Retirals Total</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotRetairlsTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperRetairlsTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;GAC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotGAC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGAC" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperGAC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bonous @ 8.33%</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotEstimatedBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaEstimatedBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperEstimatedBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Other Bonous</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotOtherBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaOtherBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperOtherBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
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
                                    <div class="fit-table-new">

                                        <table>
                                            <tbody>

                                                <tr>
                                                    <td style="width:150px">Est.CTC </td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotCTC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCTC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperCTC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;PF Employee</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotPFemployee" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployee" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperPFemployee" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ESIC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotESIC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaESIC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperESIC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Stay Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotStayAllowance" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaStayAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperStayAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Canteen</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotCanteen" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCanteen" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperCanteen" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td>&emsp;Other Deductions</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotOtherDeductions" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaOtherDeductions" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperOtherDeductions" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                </tr>
                                                <tr>
                                                    <td>Travel Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotTravelAllowance" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaTravelAllowance" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperTravelAllowance" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td>&emsp;Take Home</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMottakehomewithouttax" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuatakehomewithouttax" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="Curincpertakehomewithouttax" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Deductions Total</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotDeductionTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaDeductionTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperDeductionTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
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
                                            <select class="form-control" ng-model="FitStatus" ng-change="GetStatusAlert(FitStatus);">
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
                                        <button class="btn btn-sm btn-success" ng-click="UpdateFitement();"><i class="fa fa-save"></i>
                                            Update</button>

                                        <button class="btn btn-sm btn-warning" ng-click="CalculateFitment();"><i class="fa fa-calculator"></i>
                                            Calculate</button>
                                        <button class="btn btn-sm btn-success" ng-click="CategorycalculationFit();"><i class="fa fa-save"></i>
                                            Basic Calculation</button>

                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
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
                        <h4 class="card-header text-green pl-0">{{FitType}}</h4>

                        <table class="fit-table-new mt-2">
                            <tbody>
                                <tr class="table-head">
                                    <td style="width:110px">Components</td>
                                    <td style="width:90px">Monthly</td>
                                    <td style="width:90px">Annual</td>
                                    <td style="width:90px">inc%</td>
                                    <td style="width:130px">&emsp;Components</td>
                                    <td style="width:90px">Monthly</td>
                                    <td style="width:90px">Annual</td>
                                    <td style="width:90px">inc%</td>
                                </tr>
                                <tr>
                                    <td>Basic+DA</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotBasicDA" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaBasicDA" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperBasicDA" readonly>
                                    </td>
                                    <td>&emsp;HRA</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotHRA" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaHRA" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurincperHRA" readonly></td>
                                </tr>
                                <tr>
                                    <td>Special Allowance</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                    </td>

                                    <td>&emsp;Performance Allowance</td>
                                    <td><input type="text" class="form-control" ng-model="Performanceallowancemonthly" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="Performanceallowanceyearly" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                    </td>
                                    <!-- <td><input type="text" class="form-control"
                                                            ng-model="CurincperTotalAllowance" autocomplete="off"
                                                            onkeypress="return Validate(event);"></td> -->

                                </tr>
                                <tr>
                                    <td>&emsp;Total Allowance</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="table-head"><br />Retirals Employer Contribution</td>

                                </tr>
                                <tr>
                                    <td>PF (12 %) From Basic</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotPFemployeer" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployeer" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperPFemployeer" readonly></td>
                                    <td>&emsp;Gradutity (5%)</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotGratuity" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGratuity" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperGratuity" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Retirals Total</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotRetairlsTotal" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurincperRetairlsTotal" readonly></td>
                                    <td>&emsp;GAC</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotGAC" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGAC" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurincperGAC" readonly></td>
                                </tr>
                                <tr>
                                    <td>Bonous @ 8.33%</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotEstimatedBonous" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaEstimatedBonous" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperEstimatedBonous" readonly>
                                    </td>
                                    <td>&emsp;Other Bonous</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotOtherBonous" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaOtherBonous" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperOtherBonous" readonly></td>
                                </tr>
                                <td colspan="4" class="table-head"><br />Other Components</td>
                                <td colspan="4" class="table-head"><br />&emsp;Deductions</td>
                                <tr>
                                    <td>Est.CTC</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotCTC" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCTC" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurincperCTC" readonly></td>
                                    <td>&emsp;PF Employee</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotPFemployee" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployee" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperPFemployee" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ESIC</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotESIC" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaESIC" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurincperESIC" readonly></td>
                                    <td>&emsp;Stay Allowance</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotStayAllowance" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaStayAllowance" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurincperStayAllowance" readonly></td>
                                </tr>
                                <tr>
                                    <td>Canteen</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotCanteen" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCanteen" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperCanteen" readonly>
                                    </td>
                                    <td>&emsp;Other Deductions</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotOtherDeductions" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaOtherDeductions" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperOtherDeductions" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Travel Allowance</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotTravelAllowance" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaTravelAllowance" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurincperTravelAllowance" readonly>
                                    </td>
                                    <td>&emsp;Take Home</td>
                                    <td><input type="text" class="form-control" ng-model="CurMottakehomewithouttax" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuatakehomewithouttax" autocomplete="off" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="Curincpertakehomewithouttax" autocomplete="off" readonly></td>
                                </tr>
                                <tr>
                                    <td>Deductions Total</td>
                                    <td><input type="text" class="form-control" ng-model="CurMotDeductionTotal" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurAnnuaDeductionTotal" readonly></td>
                                    <td><input type="text" class="form-control" ng-model="CurincperDeductionTotal" readonly>
                                    </td>

                                </tr>



                            </tbody>
                        </table>


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
                    <style>
                        .fitment-data-box,
                        .fitment-data-box input {
                            font-size: 12px;
                        }
                    </style>
                    <div class="modal-body fitment-data-box">

                        <div class="card-body">
                            <div class="alert alert-success" role="alert" ng-show="Message">

                                {{Message}}

                            </div>


                            <div class="row">

                                <div class="col-md-12">
                                    <div class="fitment-table">
                                        <table>
                                            <tbody>
                                                <tr class="table-head">
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
                                                    <td><input type="text" class="form-control" ng-model="CurMotBasicDA" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaBasicDA" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperBasicDA" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td style="width:150px">&emsp;HRA</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotHRA" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaHRA" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperHRA" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Other Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperSpecialAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>

                                                    <td>&emsp;Performance Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="Performanceallowancemonthly" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="Performanceallowanceyearly" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <<td><input type="text" class="form-control" ng-model="performanceallowanceincper" autocomplete="off" onkeypress="return Validate(event);" readonly value=0></td>

                                                </tr>
                                                <tr>
                                                    <td>Conveyence Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotTravelAllowance" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaTravelAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperTravelAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td>&emsp;Total Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperTotalAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
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
                                                    <td><input type="text" class="form-control" ng-model="CurMotPFemployeer" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployeer" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperPFemployeer" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;Gradutity(5%)</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotGratuity" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGratuity" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperGratuity" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Retirals Total</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotRetairlsTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperRetairlsTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;GAC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotGAC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaGAC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperGAC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bonous @ 8.33%</td>
                                                    <td> <input type="text" class="form-control" ng-model="CurMotEstimatedBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td> <input type="text" class="form-control" ng-model="CurAnnuaEstimatedBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperEstimatedBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Other Bonous</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotOtherBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaOtherBonous" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperOtherBonous" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
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
                                                    <td><input type="text" class="form-control" ng-model="CurMotCTC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCTC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperCTC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td style="width:150px">&emsp;PF Employee</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotPFemployee" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaPFemployee" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperPFemployee" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ESIC</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotESIC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaESIC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperESIC" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>&emsp;Stay Allowance</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotStayAllowance" autocomplete="off" onkeypress="return Validate(event);"></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaStayAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperStayAllowance" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Canteen</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotCanteen" autocomplete="off" onkeypress="return Validate(event);">
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaCanteen" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperCanteen" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td>&emsp;Other Deductions</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotOtherDeductions" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaOtherDeductions" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperOtherDeductions" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                </tr>
                                                <tr>

                                                    <td>Take Home</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMottakehomewithouttax" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuatakehomewithouttax" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" ng-model="Curincpertakehomewithouttax" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
                                                    <td>Deductions Total</td>
                                                    <td><input type="text" class="form-control" ng-model="CurMotDeductionTotal" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurAnnuaDeductionTotal" autocomplete="off" onkeypress="return Validate(event);" readonly></td>
                                                    <td><input type="text" class="form-control" ng-model="CurincperDeductionTotal" autocomplete="off" onkeypress="return Validate(event);" readonly>
                                                    </td>
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

                                <div class="col-md-7">

                                    <table>
                                        <tr>
                                            <td> <label class="col-form-label">Status</label></td>
                                            <td> <select class="form-control" ng-model="FitStatus" ng-change="GetStatusAlert(FitStatus);">
                                                    <option Value="Open">Open</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <!-- <option value="Final">Final</option> -->
                                                </select></td>
                                            <td><label class="col-form-label">Type</label></td>
                                            <td> <select class="form-control" ng-model="FitType">
                                                    <option Value="Request Fitment">Request Fitment</option>
                                                    <option value="Recommended Fitment">Recommended Fitment</option>
                                                    <option value="Final Fitment">Final Fitment</option>
                                                </select></td>
                                        </tr>
                                    </table>







                                </div>
                                <div class="col-md-5 nopadding">
                                    <div class="form-group text-right">
                                        <button class="btn btn-sm btn-success" ng-click="UpdateFitement();"><i class="fa fa-save"></i>
                                            Update</button>

                                        <button class="btn btn-sm btn-success" ng-click="CategorycalculationFit();"><i class="fa fa-save"></i>
                                            Calculation</button>



                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
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


            <div class="modal fade" id="ModalCenterApprovedFitment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Approved {{FitType}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" role="alert">
                                Once the status is approved , it goes to next level approval and the details cannot be
                                modified. Do you want to proceed ?
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-rounded btn-success" ng-click="UpdateFitmentApproved();" data-dismiss="modal">Approved</a>
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">No</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ModalCenterRejectedFitment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Rejected {{FitType}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" role="alert">
                                If the status is Rejected , the candidate wil be rejected. It does not goes to next
                                level.
                                Do you want to proceed?
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-rounded btn-danger" ng-click="UpdateFitmentRejected();" data-dismiss="modal">Rejected</a>
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">No</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include '../footerjs.php' ?>
    <script src="../Scripts/jspdf.min.js"></script>

    <script src="../Scripts/html2canvas/html2canvas.min.js"></script>
    <script src="../Scripts/Controller/HRMApiController.js"></script>
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