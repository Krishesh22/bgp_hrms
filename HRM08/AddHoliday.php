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
    <title>Holiday Master | HRM Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM08Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">


                     <div class="col-md-4">
                            <h5 class="text-green">Holiday List</h5>
                            </div>
                            <div class="col-md-8">
                            <div class="float-right">
                            <form class="form-inline ">
                            <div class="form-group">
                            <input type="text" class="form-control w150px" placeholder="Enter Holiday Date" 
                                                                ng-model="Holidaydate" onfocus="(this.type='date')"
                                                                onblur="(this.type='date')"
                                                                ng-change="GetHolidaydate();">
                            </div>&nbsp;
                             <div class="form-group">
                             <input type="text" class="form-control" placeholder="Enter Holiday Detail" 
                                                                ng-model="Holidaydetail" autocomplete="off">
                            </div>
                            <div class="form-btn-sm">&nbsp;
                            <button class="btn btn-success"
                            ng-click="SaveHoliday();">Save <i class="fa fa-plus"></i></button>
                            <button class="btn btn-danger"
                            ng-click="Reset();">Clear <i class="fa fa-times"></i></button>
                            </div>
                            </form>
                            </div>
                            </div>


                    <div class="col-md-12">

                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>
                         </div>

                          <div class="col-md-12">
                            <hr/>
                            <table class="table table-bordered  table-sm info-table">
                                            <thead>
                                                <tr class="bg-green text-white">

                                                    <th>#</th>
                                                    <th scope="col">Holiday Date</th>
                                                    <th scope="col">Detail</th>
                                                    <th scope="col">Day</th>
                                                    <th scope="col">Month</th>
                                                    <th scope="col">Year</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Holidaydate2">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Holidaydetail">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Day">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Monthname">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Year">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>

                                                    </td>


                                                </tr>
                                                <tr dir-paginate="e in GetHolidaydateList |filter:searchHoliday|itemsPerPage:5 "
                                                    pagination-id="Holidaygrid" current-page="currentPageHoliday">




                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageHoliday - 1) * pageSizeHoliday}}
                                                    </td>
                                                    <td>{{e.Holidaydate2}}</td>
                                                    <td>{{e.Holidaydetail}}</td>
                                                    <td>{{e.Day}}</td>
                                                    <td>{{e.Monthname}}</td>
                                                    <td>{{e.Year}}</td>
                                                    <td style="width:100px">
                                                        <div class="action-btn">
                                                            <center> <img height="15"
                                                                    ng-click="SendEdit(e.Holidaydate,e.Holidaydetail);"
                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                               
                                                            </center>

                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="float-right mt-2">
                                            <div class="pagination ">
                                                <dir-pagination-controls pagination-id="Holidaygrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>
                                            </div>

                                        </div>
                             </div>


                        

                    </div>

                </div>
            
             <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Holidaydate}}</h5>
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
                            <button class="btn btn-sm btn-danger" ng-click="Deletenew();"
                                data-dismiss="modal"><i class="fa fa-times"></i> Delete</button>
                            <button type="button" class="btn btn-sm btn-darh" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>

            </div>




            <?php include '../footer.php'?>
        </div>




    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM08Controller.js"></script>
</body>

</html>