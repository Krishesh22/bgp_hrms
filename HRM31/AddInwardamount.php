<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Inward Cash Details</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM31Controller">
            <div class="container-fluid ">





                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <h5 class="card-header text-green">Inward Cash Entry </h5>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Transaction no</label>
                                            <input type="text" class="form-control" ng-model="InwardMasterno"
                                                autocomplete="off" readonly>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Date</label>
                                            <input type="text" class="form-control" ng-model="Inwarddate"
                                                onfocus="(this.type='date')" onblur="(this.type='date')">

                                        </div>




                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Type</label>
                                            <select class="form-control" ng-model="Inwardtype">
                                                <option Value="Bank">Bank</option>
                                                <option value="Cash">Cash</option>

                                            </select>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Amount</label>
                                            <input type="text" class="form-control" ng-model="Inwardamount"
                                                autocomplete="off" onkeypress="return Validate(event);">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Location<span
                                                    class="required">*</span></label>
                                            <select ng-model="Locationid" class="form-control" ng-change="GETLocationwiseBalance();">

                                                <option ng-repeat="s in GetLocationList " value="{{s.ID}}">
                                                    {{s.LocationName}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Notes</label>
                                            <input type="text" class="form-control" ng-model="InwardNotes"
                                                autocomplete="off">
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Available Balance</label>
                                            <input type="text" class="form-control" ng-model="CurrentdateBalanceAmount"
                                                autocomplete="off" readonly>
                                        </div>





                                    </div>
                                    <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-sm btn-rounded btn-success"
                                            ng-click="SaveInwardAmount();" ng-show="btnSave"
                                            ng-disabled="btnsaveadmin"><i class="fa fa-save"></i>
                                            Save</button>
                                        <button class="btn btn-sm btn-rounded btn-success"
                                            ng-click="UpdateInwardAmount();" ng-show="btnUpdate"><i
                                                class="fa fa-save"></i>
                                            Update</button>




                                        <button class="btn btn-sm btn-rounded btn-success" ng-click="Reset()"><i
                                                class="fa fa-save"></i>
                                            Reset</button>




                                    </div>
                                    <?php include '../footerjs.php'?>
                                    <script src="../Scripts/Controller/HRM31Controller.js"></script>
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

</body>

</html>