<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>View Doc Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM45Controller">
            <div class="container-fluid dashboard-content">

                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">


                            <div class="col-md-12">
                                <h5 class="text-green">View Document Details</h5>
                                <hr />
                            </div>
                            <div class="card">







                                <div class=" col-lg-12 table-responsive custom-table custom-table-noborder">
                                    <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                        <thead>


                                            <tr class="tablethrow">
                                                <th style="width: 50px;">S.No</th>
                                                <th>Documentno</th>
                                                <th>Type</th>
                                                <th>Issued Date</th>
                                                <th>ExpiredDate</th>
                                                <th>Doucument Name</th>
                                                <th>Action</th>



                                            </tr>
                                        </thead>

                                        <tr>
                                            <td colspan="2"><input type="text" class="form-control"
                                                    ng-model="searchPayroll.Documentnoasperrecord"></td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.Documenttype"></td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.DocumentIssueDate">
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.ExpiredDate">
                                            </td>
                                            <td colspan="2"><input type="text" class="form-control"
                                                    ng-model="searchPayroll.Documentname">
                                            </td>


                                        </tr>


                                        <tr dir-paginate="e in GetDocMasterList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                            current-page="currentPagePayroll01" pagination-id="PayrollGridAdmin">

                                            <td>
                                                {{$index+1+(currentPagePayroll01 - 1) * pageSizePayroll01}}

                                            </td>
                                            <td> {{e.Documentnoasperrecord}}</td>
                                            <td>{{e.Documenttype}}</td>
                                            <td> {{RecuriseDateFormat(e.DocumentIssueDate) | date:'dd-MM-yyyy'  }}</td>
                                            <td> {{RecuriseDateFormat(e.ExpiredDate) | date:'dd-MM-yyyy'  }}</td>
                                            <td>{{e.Documentname}}</td>

                                            <td>
                                                <div class="action-btn">
                                                    <img height="15" ng-click="SendEdit02(e.Documentno);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/view.png">




                                                </div>
                                            </td>


                                        </tr>


                                    </table>
                                    <dir-pagination-controls pagination-id="PayrollGridAdmin" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>
                                </div>







                            </div>
                        </div>




                        <div class="carousel-item">

                            <div class="row">
                                <div class="card">
                                    <h5 class="card-header text-green">Document Master</h5>

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Document No</label>

                                                <input type="text" class="form-control"
                                                    ng-model="VWDocumentnoasperrecord" autocomplete="off" readonly>

                                                <input type="text" class="form-control" ng-model="VWDocumentno"
                                                    autocomplete="off" id="VWDocumentno" readonly ng-show="btnhide">


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Issued Date</label>
                                                <input type="text" class="form-control" ng-model="VWDocumentIssueDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')" readonly>

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">
                                                    Have Expired Date?
                                                </label>

                                                <input class="form-control" ng-model="VWRenewalyesorno"
                                                    autocomplete="off" readonly>

                                            </div>



                                            <div class="form-group col-md-3" ng-show="VWbtnrenewal">
                                                <label class="col-form-label">Expired Date</label>
                                                <input type="text" class="form-control" ng-model="VWRenewalDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')" readonly>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Document Type</label>

                                                <input class="form-control" ng-model="VWDocumenttype" autocomplete="off"
                                                    readonly>


                                            </div>
                                            <div class="form-group col-md-9">
                                                <label class="col-form-label">Document Name</label>
                                                <input type="text" class="form-control" ng-model="VWDocumentname"
                                                    autocomplete="off" readonly>

                                            </div>

                                            <div class="form-group col-md-3" ng-show="VWbtnrenewal">
                                                <label class="col-form-label">Renewal Notifications</label>
                                                <div class="input-group">
                                                    <input class="form-control" ng-model="VWRenewalnotificationindays"
                                                        autocomplete="off" readonly>
                                                    <div class="input-group-append">
                                                        <p id="fileButton04" class="input-group-text">
                                                            (Daily)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label class="col-form-label">Notes</label>
                                                <input type="text" class="form-control" ng-model="VWDocumentNotes"
                                                    autocomplete="off" readonly>

                                            </div>


                                            <div class="text-right  col-md-12">



                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#ModalDocumentrenewal" ng-click="GetRenewalnew()" ng-show="VWbtnrenewal"><i
                                                        class="fa fa-envelope"></i> Document Renewal</button>
                                                <button class="btn btn-sm btn-rounded btn-warning"
                                                    data-target="#myCarousel" data-slide-to="0"
                                                    ng-click="Getrefresh()"><i class="fa  fa-arrow-left"></i>
                                                    Back</button>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="alert alert-success" role="alert" ng-show="Message">
                                        {{Message}}
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <table style="width: 100%;">



                                                    <tr dir-paginate="e in VWGetDocMasterFileList |orderBy:sortKeyCustomer:reverseCustomer|itemsPerPage:10"
                                                        current-page="currentPageFile" pagination-id="Filelistgrid">

                                                        <td><button class="btn btn-sm btn-info" style="width:250px"
                                                                ng-click="SendFileEdit02(VWDocumentno,e.Sno);">
                                                                {{$index+1+(currentPageFile - 1) * pageSizeFile}}.{{e.Documentfilename}}</button>
                                                        </td>



                                                    </tr>


                                                </table>
                                                <dir-pagination-controls pagination-id="Filelistgrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>
                                            </div>
                                            <div class="col-lg-9">
                                                <iframe ng-src="{{VWDocumentfilepath}}"
                                                    ng-hide="VWDocumentfilepath == null || VWDocumentfilepath == '' "
                                                    ng-show="VWDocumentfilepath != null " style="height:350px;width:100%"
                                                    frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                            </div>


                        </div>


                        <div class="modal fade" id="ModalDelete1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete </h5>
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
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="modal fade" id="ModalDocumentrenewal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Document Renewal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Document No</label>


                                                    <input type="text" class="form-control"
                                                        ng-model="Documentnoasperrecord" autocomplete="off"
                                                        id="Documentnoasperrecord">

                                                    <input type="text" class="form-control" ng-model="Documentno"
                                                        autocomplete="off" readonly id="Documentno" ng-show="btnhide">


                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Issued Date</label>
                                                    <input type="text" class="form-control" ng-model="DocumentIssueDate"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                                        id="DocumentIssueDate">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">
                                                        Have Expired Date?
                                                    </label>
                                                    <select class="form-control" ng-model="Renewalyesorno"
                                                        ng-change="GetExpiredYesorNo()" id="Renewalyesorno">
                                                        <option Value="Yes">Yes</option>
                                                        <option value="No">No</option>




                                                    </select>
                                                </div>



                                                <div class="form-group col-md-3" ng-show="btnrenewal">
                                                    <label class="col-form-label">Expired Date</label>
                                                    <input type="text" class="form-control" ng-model="RenewalDate"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                                        id="RenewalDate">

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Document Type</label>
                                                    <select ng-model="Documenttype" class="form-control"
                                                        id="Documenttype">

                                                        <option ng-repeat="s in GetDocumenttypeList "
                                                            value="{{s.CompanyDocumenttype}}">
                                                            {{s.CompanyDocumenttype}}</option>
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label class="col-form-label">Document Name</label>
                                                    <input type="text" class="form-control" ng-model="Documentname"
                                                        autocomplete="off" id="Documentname">

                                                </div>

                                                <div class="form-group col-md-3" ng-show="btnrenewal">
                                                    <label class="col-form-label">Renewal Notifications</label>
                                                    <div class="input-group">
                                                        <input class="form-control" ng-model="Renewalnotificationindays"
                                                            autocomplete="off" id="Renewalnotificationindays"
                                                            onkeypress="return Validate(event);">
                                                        <div class="input-group-append">
                                                            <p id="fileButton04" class="input-group-text">
                                                                (Daily)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label class="col-form-label">Notes</label>
                                                    <input type="text" class="form-control" ng-model="DocumentNotes"
                                                        autocomplete="off" id="DocumentNotes">

                                                </div>





                                            </div>

                                            <h5>Select the file to upload </h5>
                                            <div class="row">

                                                <div class="form-group col-md-9">

                                                    <div class="input-group">
                                                        <input type="file" class="form-control" ng-model="clearinput"
                                                            id="fileInputBulkFiles" name=files[] multiple
                                                            accept="application/pdf,image/*">

                                                        <!-- <div class="input-group-append">
                                            <p id="fileButtonEmpLeave" class="input-group-text">
                                                <i class="fa fa-upload"></i>
                                            </p>
                                        </div> -->
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="alert alert-success" role="alert" ng-show="Message">
                                            {{Message}}
                                        </div>

                                        <div class="alert alert-success" role="alert" id="myDiv">
                                            <span id="msg1"></span>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <table style="width: 100%;">



                                                        <tr dir-paginate="e in GetDocMasterFileList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                                            current-page="currentPageFile" pagination-id="Filelistgrid">

                                                            <td><button class="btn btn-sm btn-info" style="width:250px"
                                                                    ng-click="SendFileEdit(e.Documentno,e.Sno);">
                                                                    {{$index+1+(currentPageFile - 1) * pageSizeFile}}.{{e.Documentfilename}}</button>
                                                            </td>

                                                            <!--     <td>
                                                <div class="action-btn">
                                                    <img height="15" ng-click="SendFileEdit(e.Documentno,e.Sno);"
                                                        data-toggle="modal" data-target="#ModalDelete1"
                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">




                                                </div>
                                            </td> -->


                                                        </tr>


                                                    </table>
                                                    <dir-pagination-controls pagination-id="Filelistgrid" max-size="3"
                                                        direction-links="true" boundary-links="true" class="pagination">
                                                    </dir-pagination-controls>
                                                </div>
                                                <div class="col-lg-9">
                                                    <iframe ng-src="{{Documentfilepath}}"
                                                        ng-hide="Documentfilepath == null || Documentfilepath == '' "
                                                        ng-show="Documentfilepath != null "
                                                        style="height:350px;width:100%" frameborder="0"
                                                        allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-sm btn-success" id="fileButtonEmpLeaveDoc"><i
                                                class="fa fa-save"></i>
                                            Save</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

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






    <?php include '../footerjs.php'?>

    <script src="../Scripts/Controller/HRM45Controller.js"></script>

    </script>


</body>

</html>