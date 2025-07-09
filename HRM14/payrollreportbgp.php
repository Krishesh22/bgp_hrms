<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>PayrollReport Details-Category wise</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM14Controller" >
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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Category wise - PayrollReport Details</h3>

                                </div>
                                <div class="card">
                                    <div class="" style="padding:25px 0 10px 25px">
                                        <div class="table-responsive custom-table custom-table-noborder column">

                                            <form role="form" action="payrollreportbulkbgp.php" method="post"
                                                target="_blank">
                                                <input type="hidden" name="act" value="att" />
                                                <table class="table table table-sm">
                                                    <tr>

                                                        <td class="col-md-2">
                                                            <label>Month</label>
                                                            <select ng-model="Payrollmonth" class="form-control"
                                                                name="month">
                                                                <option value="January">January</option>
                                                                <option value="February">February</option>
                                                                <option value="March">March</option>
                                                                <option value="April">April</option>
                                                                <option value="May">May</option>
                                                                <option value="June">June</option>
                                                                <option value="July">July</option>
                                                                <option value="August">August</option>
                                                                <option value="September">September</option>
                                                                <option value="October">October</option>
                                                                <option value="November">November</option>
                                                                <option value="December">December</option>
                                                            </select>

                                                        </td>

                                                        <td cclass="col-md-1">
                                                            <label>Year</label>


                                                            <?php
                                                    $year_start = 2010;
                                                    $year_end = date('Y'); // current Year


                                                    echo '<select   ng-model="Payrollyear" name="year" class="form-control" >' . "\n";
                                                    for ($i_year = $year_start;$i_year <= $year_end;$i_year++) {
                                                        $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                                        echo '<option value="' . $i_year . '"' . $selected . '>' . $i_year . '</option>' . "\n";
                                                    }
                                                    echo '</select>' . "\n";
                                                    ?>
                                                            <!-- <input type="text" class="form-control" ng-model="Payrollyear"
                                                            autocomplete="off" readonly> -->
                                                        </td>

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
                                                        <td class="col-md-8">
                                                            <label>Category</label>
                                                            <div class="select-check">

                                                                <select id="multiple-checkboxes" multiple="multiple"
                                                                    name="cat_name[]" ng-model="cat_name"
                                                                    class="form-control multiple-checkboxes"
                                                                    style="width:250px">
                                                                    <option value="Category 1">Category 1
                                                                    </option>
                                                                    <option value="Category 2">Category 2</option>
                                                                    <option value="Category 3">Category 3</option>




                                                                </select>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                </table>

                                                <div>
                                                    <br><br>
                                                    <div class="form-group" style="padding-top:1px">
                                                        <button type="submit" name="view"
                                                            class="btn btn-sm btn-success">View</button>
                                                    </div>


                                                </div>

                                            </form>
                                            <!-- /.col-lg-6 (nested) -->
                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /#page-wrapper -->
                    <?php include '../footer.php'?>

                </div>





                <script src="../bower_components/jquery/dist/jquery.min.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

                <!-- Metis Menu Plugin JavaScript -->
                <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

                <!-- DataTables JavaScript -->
                <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <script
                    src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js">
                </script>

                





                <?php include '../footerjs.php'?>
        
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
                </script>

                <script src="../Scripts/Controller/HRM14Controller.js"></script>
             

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
                </script>
                <script>
                $(document).ready(function() {
                    $('#multiple-checkboxes').multiselect('select', ['Category 1', 'Category 2', 'Category 3'])
                ({
                        includeSelectAllOption: true,
                    });
                });
                </script>

</body>

</html>