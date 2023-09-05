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
    <title>Specialization List | HRM Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM53Controller">
            <div class="container-fluid dashboard-content">
               
                    
                     
                        <div class="row">

                            <div class="col-md-5">
                            <h5 class="text-green">Specialization List</h5>
                            </div>

                            <div class="col-md-7">
                            <div class="float-right">
                            <form class="form-inline ">
                            <div class="form-group">
                            <input id="inputText3" type="text" class="form-control" ng-model="Specialization"
                             placeholder="Enter SpecializationName" ng-change="GetSpecialization();" autocomplete="off">
                            </div>
                            <div class="form-btn-sm">&nbsp;
                            <button class="btn btn-success"
                            ng-click="SaveSpecialization();">Save <i class="fa fa-plus"></i></button>
                            <button class="btn btn-danger"
                            ng-click="Reset();">Clear <i class="fa fa-times"></i></button>
                            </div>
                            </form>
                            </div>
                            </div>


                            <div class="col-md-12">
                                <hr/>
                            <div class="alert alert-info " role="alert" ng-show="Message">
                            {{Message}}
                            </div>   
                            </div>
                                
                            <div class="col-md-12">
                               
                                        <table class="table table-bordered  table-sm info-table">
                                            <thead>
                                                <tr class="bg-green text-white">
                                                    
                                                    <th>#</th>
                                                    <th>Specialization</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="input-group">
                                                            <input placeholder="Search" type="text" class="form-control"
                                                                ng-model="searchSpecialization.Specialization">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text input-group-green"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    </td>


                                                </tr>

                                                <tr dir-paginate="e in GetSpecializationList |filter:searchSpecialization|itemsPerPage:n "
                                                    pagination-id="SpecializationGrid" current-page="currentPageSpecialization">

                                                   
                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageSpecialization - 1) * pageSizeSpecialization}}
                                                    </td>
                                                    <td>{{e.Specialization}}</td>
                                                     <td style="width:40px;">
                                                    <div class="action-btn">
                                                   <center> <img height="15" data-toggle="modal"
                                                            data-target="#ModalCenter1"
                                                            ng-click="SendEdit(e.Specialization);" src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                            </center>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Specialization}} ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure want to delete this record?</h3>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" ng-click="Deletenew();"
                                data-dismiss="modal"><i class="fa fa-trash"></i> Delete</button>
                            <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <?php include '../footer.php'?>
        </div>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM53Controller.js"></script>
</body>

</html>