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
    <title>Designation Creation | HRM Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM04Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-7">
                                <h5 class="text-green">Designation List</h5>
                            </div>
                            <div class="col-md-5">

                                <div class="float-right">
                                    <form class="form-inline ">
                                        <div class="form-group">
                                            <input id="inputText3" type="text" placeholder="Enter Designation Name"
                                                class="form-control" ng-model="Designation"
                                                ng-change="GetDesignation();" autocomplete="off">
                                        </div>
                                        <div class="form-btn-sm">&nbsp;
                                            <button class="btn btn-success" ng-click="SaveDesignation();">Save <i
                                                    class="fa fa-plus"></i></button>
                                            <button class="btn btn-danger" ng-click="Reset();">Clear <i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">

                                <table class="table table-bordered  table-sm info-table">
                                    <thead>
                                        <tr class="bg-green text-white">
                                            <th scope="col">#</th>

                                            <th scope="col">Designation</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchDesignation.Designation">
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="fa fa-search"></i></span></div>
                                                </div>
                                            </td>
                                            </td>


                                        </tr>

                                        <tr dir-paginate="e in GetDesignationList |filter:searchDesignation|itemsPerPage:n "
                                            pagination-id="DeparmentGrid" current-page="currentPageDesignation">




                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageDesignation - 1) * pageSizeDesignation}}
                                            </td>
                                            <td>{{e.Designation}}</td>
                                            <td style="width:70px;">
                                                <div class="action-btn">
                                                    <img height="15" data-toggle="modal"
                                                        data-target="#ModalEnableResthours"
                                                        ng-click="SendEdit(e.Designation,e.Enableresthours);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/clock.png">
                                                    <img height="15" data-toggle="modal" data-target="#ModalCenter1"
                                                        ng-click="SendEdit(e.Designation,e.Enableresthours);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">


                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- ============================================================== -->
                            <!-- basic table  -->
                            <!-- ============================================================== -->

                        </div>

                    </div>

                </div>
            </div>
            <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Designation}}</h5>
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
            <div class="modal fade" id="ModalEnableResthours" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update Rest Hours {{Designation}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <label class="col-form-label">Rest Hours</label>
                                </div>
                                <div class="col-lg-7 nopadding">
                                    <select class="form-control" ng-model="Enableresthours"
                                      >
                                        <option Value="Yes">Yes
                                        </option>
                                        <option value="No">No
                                        </option>
                                      


                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-rounded btn-success" ng-click="UpdateResthours();"
                                data-dismiss="modal">Update</button>
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <?php include '../footer.php'?>
        </div>




    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM04Controller.js"></script>
</body>

</html>