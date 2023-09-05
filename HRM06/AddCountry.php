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
    <title>Country Creation | HRM Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM06Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">

                    <div class="col-md-7">
                    <h5 class="text-green">Country List</h5>
                    </div>
                    <div class="col-md-5">

                    <div class="float-right">
                    <form class="form-inline ">
                    <div class="form-group">
                    <input id="inputText3" type="text" class="form-control" placeholder="Enter Country Name" 
                                                    ng-model="Country" ng-change="GetCountry();" autocomplete="off">
                    </div>
                    <div class="form-btn-sm">&nbsp;
                    <button class="btn btn-success"
                    ng-click="SaveCountry();">Save <i class="fa fa-plus"></i></button>
                    <button class="btn btn-danger"
                    ng-click="Reset();">Clear <i class="fa fa-times"></i></button>
                    </div>
                    </form>
                    </div>                            
                    </div>

                  


                            <div class="col-md-12">
                            <div class="alert alert-info " role="alert" ng-show="Message">
                            {{Message}}
                            </div>   
                            </div>




                    <div class="col-md-12">
                        <hr/>
<table class="table table-bordered  table-sm info-table">
                                            <thead>
                                                 <tr class="bg-green text-white">
                                                    <th scope="col">#</th>
                                                   
                                                    <th scope="col">Country</th>
                                                     <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchCountry.Country">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    </td>


                                                </tr>

                                                <tr dir-paginate="e in GetCountryList |filter:searchCountry|itemsPerPage:n "
                                                    pagination-id="DeparmentGrid" current-page="currentPageCountry">

                                             
                                                   
                                                
                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageCountry - 1) * pageSizeCountry}}
                                                    </td>
                                                    <td>{{e.Country}}</td>
                                                     <td style="width:40px;">
                                                    <div class="action-btn">
                                                   <center> <img height="15" data-toggle="modal"
                                                            data-target="#ModalCenter1"
                                                            ng-click="SendEdit(e.Country);" src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                            <center>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                       


                    </div>

                </div>
            </div>
            <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Country}}</h5>
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
    <script src="../Scripts/Controller/HRM06Controller.js"></script>
</body>

</html>