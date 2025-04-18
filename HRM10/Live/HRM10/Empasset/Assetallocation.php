<div class="card-body">

    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-5">
                    <h5 class="card-header text-green"> Asset Allocation </h5>
                </div>

                <div class="form-group text-right col-md-7">
                    <button class="btn btn-sm btn-success" ng-click="Resetpropertychecklist();" data-toggle="modal"
                        data-target="#ModalCenterdynamicAdd">
                        Add</button>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalCenterassetallocation" >
                        Return</button>
                    <button class="btn btn-sm btn-warning" ng-click="GetAssetAllocatePrint()">
                        Print</button>
                    <button class="btn btn-sm btn-primary" ng-click="Assetupload('A')" ;>
                        Upload</button>

                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered  table-sm table-striped" id="data-table-allocate">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>S.No</th>
                            <!-- <th scope="col">Asset Category</th> -->

                            <th scope="col">Asset Details</th>
                            <th scope="col">Asset Code</th>
                            <!-- <th scope="col">Notes</th> -->
                            <th scope="col">Allocated Date</th>


                            <th scope="col">Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        <tr dir-paginate="e in GetPropertyCheckList |filter:searchFamily|itemsPerPage:10 "
                            pagination-id="Docgrid" current-page="currentPageProperty">
                            <td style="width: 25px;">

                                <input type="checkbox"   ng-model="folder[e.Sno]" value={{e.Sno}} />

                            </td>
                            <td style="width: 50px;">
                                {{$index+1 + (currentPageProperty - 1) * pageSizeProperty}}
                            </td>
                            <!-- <td>{{e.Assetcategory}}</td> -->
                            <td>{{e.Assetname}}</td>
                            <td>{{e.Assetshortcode}}</td>
                            <!-- <td>{{e.Particulars}}</td> -->
                            <td>{{e.Distributeddate2}}</td>






                            <td style="width: 70px;">
                                <div class="action-btn">

                                    <img height="15" data-toggle="modal" data-target="#ModalCenter1Property"
                                        ng-click="FetchPropertyChecklist(e.Employeeid,e.Sno);"
                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">




                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <dir-pagination-controls pagination-id="Docgrid" max-size="3" direction-links="true"
                    boundary-links="true" class="pagination">
                </dir-pagination-controls>


            </div>
        </div>



        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="card-header text-green">Asset Return </h5>
                </div>

                <div class="form-group text-right col-md-8">

                    <button class="btn btn-sm btn-info"  data-toggle="modal" data-target="#ModalCenterReallocation">
                        Re Allocate</button>
                    <button class="btn btn-sm btn-warning" ng-click="GetAssetReturnPrint()">
                        Print</button>
                    <button class="btn btn-sm btn-primary" ng-click="Assetupload('R')" ;>
                        Upload</button>

                </div>
            </div>
            <div class="table-responsive">

                <table class="table table-bordered  table-sm table-striped">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>No</th>
                            <!-- <th scope="col">Asset Category</th> -->

                            <th scope="col">Asset Details</th>
                            <th scope="col">Asset Code</th>

                            <th scope="col">Distributed Date</th>
                            <th scope="col">Return Date</th>




                        </tr>
                    </thead>


                    <tbody>

                        <tr dir-paginate="e in GetPropertyReturnList |filter:searchFamily|itemsPerPage:10 "
                            pagination-id="Docgrid" current-page="currentPageReturn">
                            <td style="width: 25px;">

                                <input type="checkbox" ng-model="returnfolder[e.Returnid]" value={{e.Returnid}} />

                            </td>
                            <td style="width: 50px;">
                                {{$index+1 + (currentPageReturn - 1) * pageSizeReturn}}
                            </td>
                            <!-- <td>{{e.Assetcategory}}</td> -->
                            <td>{{e.Assetname}}</td>
                            <td>{{e.Assetshortcode}}</td>

                            <td>{{e.Distributeddate2}}</td>
                            <td>{{e.Receiveddate2}}</td>









                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <dir-pagination-controls pagination-id="Docgrid" max-size="3" direction-links="true"
                    boundary-links="true" class="pagination">
                </dir-pagination-controls>


            </div>
        </div>
    </div>






</div>













<div class="card">

    <h5 class="card-header text-green"> Asset Allocation/Return Log Details </h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8" dir-paginate="e in GetAssetLogList |filter:searchAssetLog|itemsPerPage:n "
                pagination-id="Assetgrid">

                <div class="row" >
                    <div class="col-lg-1">

                        <div class="Asset-Type" ng-if="e.Assettype=='A'" ng-style="getAllocateStyle()">
                            {{e.Assettype}}
                        </div>
                        <div class="Asset-Type" ng-if="e.Assettype=='R'" ng-style="getStyle()">
                            {{e.Assettype}}
                        </div>
                    </div>

                    <div class="col-lg-6">



                        <div ng-show="e.Assettype=='R'" ng-style="getStyleP()">
                            <p>{{e.Notes}} </p>
                        </div>

                        <div ng-show="e.Assettype=='A'" ng-style="getAllocateStyleP()">
                            <p> {{e.Notes}} </p>
                        </div>

                        <p>{{e.LogDatetime}} <a ng-hide="e.Assetdocumentpath == null || e.Assetdocumentpath == '' "
                                ng-show="e.Asselistid == '0' " ng-click="GetAssetDoc(e.Assetdocumentpath)"
                                href="#"><i class='fa fa-eye'></i></a>

                                <a
                                ng-show="e.Asselistid != '0' " ng-click="GetAssetListlogdetails(e.Asselistid)"
                                href="#" data-toggle="modal" data-target="#ModalCenterAssetlogview"><i class='fa fa-eye'></i></a>
                            
                            </p>



                    </div>




                </div>
                <br/>

            

            </div>
          


        </div>



    </div>

</div>
</div>
</div>