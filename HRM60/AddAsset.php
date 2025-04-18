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
    <title>Asset Category</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM60Controller">
            <div class="container-fluid dashboard-content">



                <div class="row mt-3">

                <div class="col-md-12">
                        <h5 class="text-green">Asset Category</h5>
                        <hr/>
                    </div>

                
                    <div class="col-md-12">
<div class="pull-right">
                        <table class="CityTable">
                            <tr>
                                <td>
                                    <div class="form-group">
                                      
                                        <input id="inputText3" type="text" class="form-control" ng-model="Assetcategory"
                                            placeholder="Enter Asset Category" ng-change="GetAssetcategory();"
                                            maxlength="150" autocomplete="off">
                                    </div>
                                   
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <div class="form-group">
                                       
                                        <input id="inputText3" type="text" class="form-control" ng-model="Shortcode"
                                            placeholder="Enter Asset Code" maxlength="100" autocomplete="off" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-btn-sm" style="margin-top: -12px;">&nbsp;
                                        <button class="btn btn-success" ng-click="SaveAsset();">Save <i
                                                class="fa fa-plus"></i></button>&nbsp;
                                        <button class="btn btn-danger" ng-click="Reset();">Clear <i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                        </table>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert" ng-show="Message">
                            <b>{{Message}}</b>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <table class="table table-bordered  table-sm info-table">
                            <thead>
                                <tr class="bg-green text-white">

                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Short Code</th>
                                    <th>Asset Count</th>
                                    <th>Allocate Count</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchAsset.Assetcategory">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchAsset.Shortcode">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchAsset.AssetListCount">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchAsset.EmployeeItemCount">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchAsset.Activestatus">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    </td>


                                </tr>

                                <tr dir-paginate="e in GetAssetcategoryList |filter:searchAsset|itemsPerPage:10 "
                                    pagination-id="AssetGrid" current-page="currentPageAssetcategory">


                                    <td style="width: 50px;" class="text-center">
                                        {{$index+1 + (currentPageAssetcategory - 1) * pageSizeAssetcategory}}
                                    </td>
                                    <td>{{e.Assetcategory}}</td>
                                    <td>{{e.Shortcode}}</td>
                                    <td class="text-center">{{e.AssetListCount}}</td>
                                    <td class="text-center">{{e.EmployeeItemCount}}</td>
                                    <td class="text-center">{{e.Activestatus}}</td>

                                    <td style="width:150px;">
                                        <div class="action-btn" ng-show="e.EmployeeItemCount==0">
                                            <center>

                                                <a class='btn btn-danger btn-spacing btn-smaller ' href='#'
                                                    ng-click="GetDeleteAssetlistcount(e.Assetcategoryid,e.AssetListCount);"
                                                    title="Permenately Delete"><i class='fa fa-trash'></i></a>
                                                <a ng-show="e.Activestatus=='Active'"
                                                    class=' btn btn-warning btn-spacing btn-smaller ' href='#'
                                                    title="Active/Deactive"
                                                    ng-click="GetAssetlistcount(e.Assetcategoryid,e.AssetListCount,e.Activestatus);"><i
                                                        class='fa fa-ban'></i></a>

                                                <a ng-show="e.Activestatus=='Deactive'"
                                                    class=' btn btn-success btn-spacing btn-smaller ' href='#'
                                                    title="Active/Deactive"
                                                    ng-click="GetAssetlistcount(e.Assetcategoryid,e.AssetListCount,e.Activestatus);"><i
                                                        class='fa fa-check'></i></a>
                                                <a class=' btn btn-info btn-spacing btn-smaller ' href='#' ng-disable="e.AssetListCount !=0"
                                                    title="Print asset lists barcode"
                                                    ng-click="GetAssetlistbarcode(e.Assetcategoryid,e.AssetListCount);"><i
                                                        class='fa fa-print'></i></a>

                                            </center>
                                        </div>
                                        <div class="action-btn" ng-show="e.EmployeeItemCount!=0">
                                            <center>
                                                <a class=' btn btn-info btn-spacing btn-smaller ' href='#'
                                                    title="Print asset lists barcode"
                                                    ng-click="GetAssetlistbarcode(e.Assetcategoryid,e.AssetListCount);"><i
                                                        class='fa fa-print'></i></a>

                                            </center>
                                        </div>


                                    </td>

                                </tr>
                            </tbody>
                        </table>


                    </div>


                    <div class="float-right mt-2">
                        <div class="pagination ">
                            <dir-pagination-controls pagination-id="AssetGrid" max-size="3" direction-links="true"
                                boundary-links="true" class="pagination">
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Assetcategory}} ?</h5>
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

            <div class="modal fade" id="ModalCenter1DeleteAssetAllocation" tabindex="-1" role="dialog"
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
                            <h3>If you delete this category and it's associated asset list also will be delete , do you
                                want to continue?</h3>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" ng-click="AssetdeleteAssetlisttoo();"
                                data-dismiss="modal"> Delete</button>
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
    <script src="../Scripts/Controller/HRM60Controller.js"></script>
</body>

</html>