<?php 
include '../config.php';
include '../session.php';

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Asset Lists</title>
    <style type="text/css">
    .CityTable {
        position: absolute;
        right: 15px;
    }

    .col-form-label {
        padding-top: 0px !important;
        padding-bottom: 0px !important
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM61Controller">
            <div class="container-fluid dashboard-content">
            <h5 class="text-green">Asset Lists</h5>
            <hr/>

            <div class="row">
                <div class="col-md-9">
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label class="col-form-label">Category<span class="required">*</span></label>
                                <select ng-model="Assetcategoryid" class="form-control " ng-change="GetAssetshortcode()">
                                    <option ng-repeat="s in GetCategoryList " value="{{s.Assetcategoryid}}">
                                        {{s.Assetcategory}}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label class="col-form-label">Category Code</label>
                                <input type="text" class="form-control" placeholder="Enter Asset Code" ng-model="Shortcode"
                                    autocomplete="off" readonly>
                            </div>
                            <div class="form-group col-lg-3">
                                <label class="col-form-label">Asset Code<span class="required">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Asset Code" ng-model="Assetcode"
                                    autocomplete="off">
                            </div>

                            <div class="form-group col-lg-3">
                                <label class="col-form-label">Asset Name<span class="required">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Asset Name" ng-model="Assetname"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <div class="" style="margin-top:20px">
                        <button class="btn btn-sm btn-success" ng-click="SaveAssetLists();" ng-show="btnsave">Save <i
                        class="fa fa-plus"></i></button>
                        <button class="btn btn-sm  btn-success" ng-click="UpdateAssetLists();" ng-show="btnupdate">Update <i
                        class="fa fa-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="Reset();">Clear <i
                        class="fa fa-times"></i></button>
                        <button class="btn btn-sm btn-warning" ng-click="GetAssetbarcodeprint();">Print <i
                        class="fa fa-print"></i></button>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>
                        </div>
            </div>
             
           
                <div class="row">

                    <div class="col-md-12">

                     
                        <table class="table table-bordered  table-sm info-table">
                            <thead>
                                <tr class="bg-green text-white">
                                    <th scope="col" class="text-center">#</th>
                                    <th  class="text-center" scope="col">S.No</th>
                                    <th scope="col">Asset Code</th>
                                    <th scope="col">Asset Name</th>
                                    <th scope="col">Asset Category</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Allocated</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tr>
                                <td colspan="3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Asset Code"
                                            ng-model="searchAsset.Assetcode">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="fa fa-search"></i></span></div>
                                    </div>

                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Asset Name"
                                            ng-model="searchAsset.Assetname">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="fa fa-search"></i></span></div>
                                    </div>

                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Asset Category"
                                            ng-model="searchAsset.Assetcategory">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="fa fa-search"></i></span></div>
                                    </div>

                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Status"
                                            ng-model="searchAsset.Activestatus">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="fa fa-search"></i></span></div>
                                    </div>

                                </td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Allocated"
                                            ng-model="searchAsset.AssignedCount">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                    class="fa fa-search"></i></span></div>
                                    </div>

                                </td>
                                </td>


                            </tr>
                            <tbody>


                                <tr dir-paginate="e in GetAssetList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchAsset|itemsPerPage:10"
                                    current-page="currentPageState" pagination-id="StateGrid">

                                    <td style="width: 50px;">
                                            <div class="text-center">
                                        <input type="checkbox" ng-model="Listfolder[e.Assetlistid]" value={{e.Assetlistid}} />
                                        </div>
                                    </td>
                                    <td style="width: 50px;"  class="text-center">
                                        {{$index+1 + (currentPageState - 1) * pageSizeState}}
                                    </td>
                                    <td>{{e.Assetshortcode}}</td>
                                    <td>{{e.Assetname}}</td>
                                    <td>{{e.Assetcategory}}</td>
                                    <td style="width: 100px;" class="text-center">{{e.Activestatus}}</td>
                                    <td style="width: 100px;" class="text-center">{{e.AssignedCount}}</td>
                                    <!-- <td>{{e.Assetshortcode}}</td> -->
                                    <td>


                                        <div class="action-btn" ng-show="e.AssignedCount==0" style="width:100px;">
                                            <center>

                                                <a class='btn btn-danger btn-spacing btn-smaller ' href='#'
                                                    ng-click="SendEdit(e.Assetlistid);" title="Permenately Delete"
                                                    data-toggle="modal" data-target="#ModalCenter1"><i
                                                        class='fa fa-trash'></i></a>

                                                <a ng-show="e.Activestatus=='Active' && e.Categoryactivestatus=='Active'"
                                                    class=' btn btn-warning btn-spacing btn-smaller ' href='#'
                                                    title="Active/Deactive"
                                                    ng-click="GetAssetlistcount(e.Assetlistid,e.AssignedCount,e.Activestatus,e.Categoryactivestatus);"><i
                                                        class='fa fa-ban'></i></a>

                                                <a ng-show="e.Activestatus=='Deactive' && e.Categoryactivestatus=='Active' "
                                                    class=' btn btn-success btn-spacing btn-smaller ' href='#'
                                                    title="Active/Deactive"
                                                    ng-click="GetAssetlistcount(e.Assetlistid,e.AssignedCount,e.Activestatus,e.Categoryactivestatus);"><i
                                                        class='fa fa-check'></i></a></p>

                                            </center>
                                        </div>


                                    </td>


                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination float-right my-1">
                            <dir-pagination-controls pagination-id="StateGrid" max-size="3" direction-links="true"
                                boundary-links="true">
                            </dir-pagination-controls>
                        </div>

                    </div>

                </div>


            </div>
            <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Assetname}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure want to delete this record?</h3>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" ng-click="Deletenew();" data-dismiss="modal"><i
                                    class="fa fa-trash"></i> Delete</button>
                            <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal"><i
                                    class="fa fa-times"></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalCenter1AssetAllocation" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Asset Active/Deactive - {{Assetcategory}}
                                ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>{{AssetactiveMessage}}</h3>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" ng-click="AssetActivedeactivestatus();"
                                data-dismiss="modal"> {{Assetactive}}</button>
                            <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal"><i
                                    class="fa fa-times"></i> No</button>

                        </div>
                    </div>
                </div>
            </div>



            <?php include '../footer.php'?>
        </div>




    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM61Controller.js"></script>
</body>

</html>