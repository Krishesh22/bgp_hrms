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
    <title>City Creation | HRM Dashboard</title>

    <style type="text/css">
        .CityTable{
            position: absolute;
            right: 15px;
        }
        .col-form-label{padding-top: 0px !important; padding-bottom:0px !important}
    </style>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM03Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">



                            <div class="col-md-5">
                            <h5 class="text-green mt-4">City List</h5>
                            </div>

                            <div class="col-md-7 ">

                            

                                        <table class="CityTable">
                                            <tr>
                                                <td><div class="form-group">
<label class="col-form-label">Country</label><select  ng-model="Country" class="form-control w150px"
                                ng-change="GetState()">
                                <option ng-repeat="s in GetCountryList "
                                value="{{s.Country}}">
                                {{s.Country}}</option>
                                </select> 
</div></td>
                                                <td><div class="form-group">
<label class="col-form-label">State</label>
 <select ng-model="State"  class="form-control w150px"
                                                                ng-change="GetCity()">

                                                                <option ng-repeat="s in GetStateList "
                                                                    value="{{s.State}}">
                                                                    {{s.State}}</option>
                                                            </select>
</div></td>
                                                <td><div class="form-group">
<label class="col-form-label">City Name</label>    <div class="form-group">
                             <input type="text"  class="form-control w150px" ng-model="City" autocomplete="off">
                            </div>
</div></td>
                                                <td><div class="form-btn-sm"  style="margin-top: 6px">
                            <button class="btn btn-success"
                            ng-click="SaveCity();">Save <i class="fa fa-plus"></i></button>
                            <button class="btn btn-danger"
                            ng-click="Reset();">Clear <i class="fa fa-times"></i></button>
                            </div></td>
                                            </tr>
                                        </table>


                                     
                                

            



                            </div>



                    <div class="col-md-12 mt-2">
                        <hr/>
                       
                        <div class="alert alert-info" role="alert" ng-show="Message">
                            {{Message}}
                        </div>
                    </div>

                    <div class="col-md-12">
                         <table class="table table-bordered  table-sm info-table ">
                                            <thead>
                                                <tr class="bg-green text-white">
                                                    <th scope="col">#</th>

                                                    <th scope="col">City</th>
                                                    <th scope="col">State</th>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>

                                            <tr>
                                                <td colspan="2">
                                                    <div class="input-group">

                                                        <input type="text" class="form-control"
                                                            ng-model="searchCity.City">
                                                        <div class="input-group-append"><span
                                                                class="input-group-text"><i
                                                                    class="fa fa-search"></i></span></div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchCity.State">
                                                        <div class="input-group-append"><span
                                                                class="input-group-text"><i
                                                                    class="fa fa-search"></i></span></div>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchCity.Country">
                                                        <div class="input-group-append"><span
                                                                class="input-group-text"><i
                                                                    class="fa fa-search"></i></span></div>
                                                    </div>
                                                </td>
                                                </td>


                                            </tr>
                                            <tbody
                                                dir-paginate="(key, value) in GetCityList |filter:searchCity| groupBy: 'State'|itemsPerPage:n"
                                                pagination-id="CityGrid">

                                                <tr ng-if="key !== 'undefined'">
                                                    <td colspan="5" class="text-green text-bold"> {{key}}</td>

                                                </tr>

                                                <tr dir-paginate="e in value |orderBy:sortKeyCustomer:reverseCustomer|filter:searchCity|itemsPerPage:n"
                                                    current-page="currentPageCity">





                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageCity - 1) * pageSizeCity}}
                                                    </td>
                                                    <td>{{e.City}}</td>
                                                    <td>{{e.State}}</td>
                                                    <td>{{e.Country}}</td>
                                                    <td style="width:40px;">
                                                        <div class="action-btn">
                                                            <center> <img height="15" data-toggle="modal"
                                                                    data-target="#ModalCenter1"
                                                                    ng-click="SendEdit(e.Country,e.State,e.City);"
                                                                    src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                </center>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="pagination">
                                            <dir-pagination-controls pagination-id="CityGrid" max-size="3"
                                                direction-links="true" boundary-links="true">
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{City}}</h5>
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
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <?php include '../footer.php'?>
        </div>




    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM03Controller.js"></script>
</body>

</html>