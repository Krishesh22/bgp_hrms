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
    <title>Religion Creation | HRM Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM02Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                   
                                <div class="card">
                                    <h5 class="card-header text-green">Religion Creation</h5>
                                    <div class="card-body">
                                        <form>
                                             <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="inputText3" class="col-form-label">Enter Religion
                                                    Name</label>
                                                <input id="inputText3" type="text" class="form-control"
                                                    ng-model="Religion" ng-change="GetReligion();" autocomplete="off">
                                            </div>

                                             <div class="form-group col-md-4 text-right">
                                            <div class="form-btn-sm form-btn-top">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="SaveReligion();">Save</button>
                                                <button class="btn btn-rounded btn-warning"
                                                    ng-click="Reset();">Reset</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header text-green">Religion Detail</h5>
                                    <div class="card-body">
                                    <table class="table table-bordered  table-sm info-table">
                                            <thead>
                                                 <tr class="bg-green text-white">
                                                    
                                                    <th scope="col">#</th>
                                                    <th scope="col">Religion</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchReligion.Religion">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    </td>


                                                </tr>

                                                <tr dir-paginate="e in GetReligionList |filter:searchReligion|itemsPerPage:n "
                                                    pagination-id="DeparmentGrid" current-page="currentPageReligion">

                                             
                                                 
                                                
                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageReligion - 1) * pageSizeReligion}}
                                                    </td>
                                                    <td>{{e.Religion}}</td>

                                                       <td style="width:40px;">
                                                    <div class="action-btn">
                                                   <center> <img height="15" data-toggle="modal"
                                                            data-target="#ModalCenter1"
                                                            ng-click="SendEdit(e.Religion);" src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                            <center>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Religion}}</h5>
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
    <script src="../Scripts/Controller/HRM02Controller.js"></script>
</body>

</html>