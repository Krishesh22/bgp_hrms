<<<<<<< HEAD
<?php 
include '../config.php';
include '../session.php';

session_start();


    $Clientid =$_SESSION["Clientid"];
    $query = "SELECT * FROM indsys1003departmentmaster WHERE Clientid ='$Clientid' "; 
    $result = $conn->query($query);
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
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM62Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">

                    <div class="col-md-3">
                        <h5 class="text-green">Asset Report</h5>
                    </div>



                </div>


                <style type="text/css">
                button.multiselect {
                    min-width: 200px !important;
                    background-color: #3ac47d;
                    color: #ffffff;
                    padding: 5px !important
                }

                .multiselect-container {
                    min-width: 250px;
                    padding: 10px;
                    max-height: 300px;
                    overflow-y: auto;
                }

                .multiselect-selected-text {
                    font-size: 13px
                }

                .multiselect.dropdown-toggle.btn.btn-default {
                    margin-right: 5px;
                    max-width: 200px;
                    overflow: hidden;
                }
                </style>
                <div class="row">
                    <div class="col-lg-2">
                        <label>Department</label>
                    </div>
                    <div class="col-lg-3">

                        <div class="select-check">

                            <select id="multiple-checkboxes" multiple="multiple" name="DEPTName[]"
                                class="form-control multiple-checkboxes" style="width:250px">
                                <?php 
                                                            if($result->num_rows > 0){ 
                                                                while($row = $result->fetch_assoc()){  
                                                                    echo '<option value="'.$row['Department'].'">'.$row['Department'].'</option>'; 
                                                                } 
                                                            }
                                                            ?>




                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right mt-2 mb-2">

                                    <button name="view" class="btn btn-sm btn-warning"
                                        ng-click="GetDepartmentDetailstwo()"><i
                                                                    class="fa fa-print"></i> Download</button>

                                  
                                </div>
                            </div>
                        </div>
                    </div>







                        <div class="row">

                            <div class="col-md-12">

                                <hr />
                                <table class="table table-bordered  table-sm info-table">
                                    <thead>
                                        <tr class="bg-green text-white">

                                            <th scope="col">S.no</th>
                                            <th scope="col">Empid</th>
                                            <th scope="col">Empname</th>
                                            <th scope="col">Department</th>
                                            <th>Assetname</th>
                                            <th>Assetcategory</th>
                                            <th>Allocate date</th>
                                            <th>Assetcode</th>
                                           

                                        </tr>
                                    </thead>

                                    <tr>
                                        <td colspan="2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Employeeid">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Fullname">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Department">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Assetname">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Assetcategory">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>

                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Allocateddatetime2">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Assetshortcode">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                      

                                    </tr>
                                    <tbody>


                                        <tr dir-paginate="e in GetAssetList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchAsset|itemsPerPage:10"
                                            current-page="currentPageState" pagination-id="StateGrid">


                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageState - 1) * pageSizeState}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Fullname}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Assetname}}</td>
                                            <td>{{e.Assetcategory}}</td>
                                            <td>{{e.Allocateddatetime2}}</td>
                                            <td>{{e.Assetshortcode}}</td>


                                        


                                            <!-- <td>{{e.Assetshortcode}}</td> -->



                                        </tr>
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    <dir-pagination-controls pagination-id="StateGrid" max-size="3"
                                        direction-links="true" boundary-links="true">
                                    </dir-pagination-controls>
                                </div>

                            </div>

                        </div>


                    </div>



                    <?php include '../footer.php'?>
                </div>




            </div>

            <?php include '../footerjs.php'?>

            <script src="../Scripts/bootstrap-multiselect.js"></script>
            <script src="../Scripts/Controller/HRM62Controller.js"></script>

            <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = "<html moznomarginboxes mozdisallowselectionprint><body>" +
                    printContents + "</body></html>";

                window.print();

                document.body.innerHTML = originalContents;
                window.close();
            }

            $(document).ready(function() {
                $('#multiple-checkboxes').multiselect({
                    includeSelectAllOption: true,
                });
            });
            </script>
</body>

=======
<?php 
include '../config.php';
include '../session.php';

session_start();


    $Clientid =$_SESSION["Clientid"];
    $query = "SELECT * FROM indsys1003departmentmaster WHERE Clientid ='$Clientid' "; 
    $result = $conn->query($query);
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
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM62Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">

                    <div class="col-md-3">
                        <h5 class="text-green">Asset Report</h5>
                    </div>



                </div>


                <style type="text/css">
                button.multiselect {
                    min-width: 200px !important;
                    background-color: #3ac47d;
                    color: #ffffff;
                    padding: 5px !important
                }

                .multiselect-container {
                    min-width: 250px;
                    padding: 10px;
                    max-height: 300px;
                    overflow-y: auto;
                }

                .multiselect-selected-text {
                    font-size: 13px
                }

                .multiselect.dropdown-toggle.btn.btn-default {
                    margin-right: 5px;
                    max-width: 200px;
                    overflow: hidden;
                }
                </style>
                <div class="row">
                    <div class="col-lg-2">
                        <label>Department</label>
                    </div>
                    <div class="col-lg-3">

                        <div class="select-check">

                            <select id="multiple-checkboxes" multiple="multiple" name="DEPTName[]"
                                class="form-control multiple-checkboxes" style="width:250px">
                                <?php 
                                                            if($result->num_rows > 0){ 
                                                                while($row = $result->fetch_assoc()){  
                                                                    echo '<option value="'.$row['Department'].'">'.$row['Department'].'</option>'; 
                                                                } 
                                                            }
                                                            ?>




                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right mt-2 mb-2">

                                    <button name="view" class="btn btn-sm btn-warning"
                                        ng-click="GetDepartmentDetailstwo()"><i
                                                                    class="fa fa-print"></i> Download</button>

                                  
                                </div>
                            </div>
                        </div>
                    </div>







                        <div class="row">

                            <div class="col-md-12">

                                <hr />
                                <table class="table table-bordered  table-sm info-table">
                                    <thead>
                                        <tr class="bg-green text-white">

                                            <th scope="col">S.no</th>
                                            <th scope="col">Empid</th>
                                            <th scope="col">Empname</th>
                                            <th scope="col">Department</th>
                                            <th>Assetname</th>
                                            <th>Assetcategory</th>
                                            <th>Allocate date</th>
                                            <th>Assetcode</th>
                                           

                                        </tr>
                                    </thead>

                                    <tr>
                                        <td colspan="2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Employeeid">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Fullname">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Department">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Assetname">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Assetcategory">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>

                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Allocateddatetime2">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search "
                                                    ng-model="searchAsset.Assetshortcode">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fa fa-search"></i></span></div>
                                            </div>

                                        </td>
                                      

                                    </tr>
                                    <tbody>


                                        <tr dir-paginate="e in GetAssetList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchAsset|itemsPerPage:10"
                                            current-page="currentPageState" pagination-id="StateGrid">


                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageState - 1) * pageSizeState}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Fullname}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Assetname}}</td>
                                            <td>{{e.Assetcategory}}</td>
                                            <td>{{e.Allocateddatetime2}}</td>
                                            <td>{{e.Assetshortcode}}</td>


                                        


                                            <!-- <td>{{e.Assetshortcode}}</td> -->



                                        </tr>
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    <dir-pagination-controls pagination-id="StateGrid" max-size="3"
                                        direction-links="true" boundary-links="true">
                                    </dir-pagination-controls>
                                </div>

                            </div>

                        </div>


                    </div>



                    <?php include '../footer.php'?>
                </div>




            </div>

            <?php include '../footerjs.php'?>

            <script src="../Scripts/bootstrap-multiselect.js"></script>
            <script src="../Scripts/Controller/HRM62Controller.js"></script>

            <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = "<html moznomarginboxes mozdisallowselectionprint><body>" +
                    printContents + "</body></html>";

                window.print();

                document.body.innerHTML = originalContents;
                window.close();
            }

            $(document).ready(function() {
                $('#multiple-checkboxes').multiselect({
                    includeSelectAllOption: true,
                });
            });
            </script>
</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>