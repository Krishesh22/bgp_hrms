<div class="modal fade emp-modal" id="ModalCenterAssetAdd" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Asset Add/Edit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row">

                    <!-- 
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">S.No</label>
                        <input class="form-control" ng-model="CheckitemSno" autocomplete="off" id='CheckitemSno'
                            readonly />
                    </div> -->


                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Category</label>
                        <select ng-model="Assetcategoryid" class="form-control" ng-change="GetAssetListnew();">

                            <option ng-repeat="s in GetCategoryList " value="{{s.Assetcategoryid}}">
                                {{s.Assetcategory}}</option>
                        </select>
                    </div>


                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Asset Details</label>
                        <select ng-model="Assetlistid" class="form-control " ng-change="GetAssetname();">

                            <option ng-repeat="s in GetAssetList " value="{{s.Assetlistid}}">
                                {{s.Assetname}}</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Asset Code</label>
                        <input class="form-control" ng-model="Assetcode" autocomplete="off" id='Assetcode' readonly />
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Distributed Date</label>
                        <input type="text" class="form-control" ng-model="Distributeddate" onfocus="(this.type='date')"
                            onblur="(this.type='date')" id='Distributeddate'>
                    </div>
                    <!-- <div class="form-group col-lg-12">
                        <label class="col-form-label">Notes</label>
                        <input class="form-control" ng-model="Particulars" autocomplete="off" id='Particulars' />
                    </div> -->







                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group text-right col-md-12">
                    <button class="btn btn-sm btn-success" ng-click="Update_Property();"><i class="fa fa-save"></i>
                        Update</button>

                    <button class="btn btn-sm btn-warning" data-dismiss="modal">
                        Close</button>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalCenter1AssetPrint" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog application-modal modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">Employee Asset Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <a id="btnassetprint" class="btn btn-info btn-nda-down2 application-down-btn"><i
                                class="fa fa-download"></i> Download</a>
                        <div class="card-body">

                            <div id="pdfExportAssetprint">

                                <div class="pdf-sipl">
                                    <style>
                                    @media print {
                                        @page {
                                            margin: 10;
                                        }

                                        #btnassetprint {
                                            display: none;
                                            ;
                                        }

                                    }

                                    table.doc-table {
                                        border-collapse: collapse;
                                        margin: 20px 0;
                                    }

                                    table.doc-table td,
                                    table.doc-table th {
                                        border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;
                                    }
                                    </style>

                                    <br /><br />
                                    <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                    <hr />
                                    <center>
                                        <h4>{{EmpAssetTittle}}</h4>
                                    </center>


                                    <p style="text-align:left;">Employee Name :
                                        {{Title}}{{Firstname}} {{Lastname}}<span style="float:right;">
                                            Designation : {{EmpDesignation}}</span></p>
                                    <p style="text-align:left;">Given Asset Details</p>
                                    <table class="doc-table">
                                        <tbody>
                                            <tr>
                                                <th>No</th>


                                                <th scope="col">Asset Details</th>
                                                <th scope="col">Asset Code</th>
                                                <th scope="col">Asset Category</th>
                                                <th scope="col">Allocated Date</th>

                                            </tr>
                                        <tbody>

                                            <tr dir-paginate="e in GetPropertyPageAssetList |filter:searchFamily|itemsPerPage:n "
                                                pagination-id="Docgrid" current-page="currentPageprintasset">

                                                <td style="width: 50px;">
                                                    {{$index+1 + (currentPageprintasset - 1) * pageSizeprintasset}}
                                                </td>
                                                <!-- <td>{{e.Assetcategory}}</td> -->
                                                <td>{{e.Assetname}}</td>
                                                <td>{{e.Assetcode}}</td>
                                                <td>{{e.Assetcategory}}</td>
                                                <td>{{e.Distributeddate2}}</td>










                                            </tr>
                                        </tbody>
                                    </table>


                                    <p>HR Signature</p>

                                    <p style="text-align:left;">Employee Name :
                                        {{Title}}{{Firstname}} {{Lastname}}<span style="float:right;">(Employee/Receiver
                                            Signature)</span></p>




                                </div>










                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>



<div class="modal fade emp-modal" id="ModalCenterAssetUpload" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    {{Assetuploadtitle}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form id="Assuploaddocform">
                    <div class="form-group col-md-12">

                        <input type="hidden" class="form-control" id="Empid" name='Empid'>
                        <input type="hidden" class="form-control" id="Assettype" name='Assettype'>
                        <label class="col-form-label">Upload Document</label>

                        <input type="file" class="form-control" id="assuploadfile" name='assuploadfile'
                            accept="application/pdf">

                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Notes</label>
                        <input type="text" class="form-control" id="assetnotes" name='assetnotes'>

                    </div>

                    <p class="font-italic text-white text-center">
                        <input type="submit" class="btn btn-sm btn-success" value="Upload File"><i
                            class="fa fa-table"></i>
                    </p>

                    <div class="alert alert-danger" role="alert" id="myDiv">
                        <span id="msgtst"></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade emp-modal" id="ModalCenterAssetDocumentView" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog application-modal modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Documents
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <iframe ng-src="{{Assetdocumentpath}}"
                        ng-hide="Assetdocumentpath == null || Assetdocumentpath == '' "
                        ng-show="Assetdocumentpath != null " style="height:400px;width:100%"></iframe>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade emp-modal" id="ModalCenter1Property" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Delete {{CheckitemSno}}
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
                <button class="btn btn-rounded btn-danger" ng-click="DeleteProperty();"
                    data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade emp-modal" id="ModalCenter1PropertyView" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Employee Property Check Lists
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <iframe ng-src="{{Propertychecklistitemimage}}"
                        ng-hide="Propertychecklistitemimage == null || Propertychecklistitemimage == '' "
                        ng-show="Propertychecklistitemimage != null " style="height:600px;width:100%"></iframe>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade emp-modal" id="ModalCenterdynamicAdd" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog application-modal modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Asset Allocation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="AssetAllocation">
                    <input type="hidden" id="emplid" name="emplid" ng-model="Employeeid" />
                    <table class="table " id="AddAsset">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Asset Category</th>
                                <th>Asset Lists</th>
                                <th>Asset Code</th>
                                <th>Distribute Date</th>
                                <th>Action <a class="btn  btn-spacing btn-smaller float-right addassetdetails"
                                        href="#"><i class="fa fa-plus"></a></th>
                            </tr>
                        </thead>
                        <tbody data-added="no">

                        </tbody>
                    </table>

                    <div class="form-group text-right col-md-12">
                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i>
                            Submit</button>

                        <button class="btn btn-sm btn-warning" data-dismiss="modal">
                            Close</button>

                    </div>

                </form>
            </div>
            <div class="modal-footer">



            </div>
        </div>
    </div>
</div>


<div class="modal fade emp-modal" id="ModalCenterReallocation" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Asset Reallocation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Are You sure want to asset reallocation?
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-rounded btn-danger" ng-click="GetAssetReallocation();"
                    data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade emp-modal" id="ModalCenterassetallocation" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Asset Allocation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Are You sure want to asset allocation?
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-rounded btn-danger" ng-click="GetAssetReturn();"
                    data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade emp-modal" id="ModalCenterAssetlogview" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog application-modal modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Asset Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table table-bordered  table-sm info-table">
                        <thead>
                            <tr class="bg-green text-white">
                                <th scope="col">#</th>
                                <th scope="col">Asset Code</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Asset Category</th>
                             
                            </tr>
                        </thead>

                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Assetcode"
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
                          
                            </td>


                        </tr>
                        <tbody>


                            <tr dir-paginate="e in GetAssetLogvieeeList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchAsset|itemsPerPage:n"
                                current-page="currentPageAssetlist">


                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageAssetlist - 1) * pageSizeAssetlist}}
                                </td>
                                <td>{{e.Assetcode}}</td>
                                <td>{{e.Assetname}}</td>
                                <td>{{e.Assetcategory}}</td>
                               


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">



            </div>
        </div>
    </div>
</div>