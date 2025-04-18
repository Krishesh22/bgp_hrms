<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Payroll-Bank</title>
</head>

<body>




    <div class="dashboard-main-wrapper">
        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRMPayrollController">
            <div class="container-fluid dashboard-content">
                <div id="overlay">
                    <div class="cv-spinner">
                        <span class="spinner"></span>
                    </div>
                </div>

                <div class="section-block" id="basicform">
                    <h3 class="section-title">Employee ESI/UAN Details  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    <a class="btn btn-warning btn-sm "   href="EmpESIExportExcel.php"
                                   ><i class="fa fa-download"></i>
                                    Download</a> </h3>
                </div>
                <div class="card">




                 


                        <div class=" col-lg-12 table-responsive custom-table custom-table-noborder">
                            <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                <thead>


                                    <tr class="tablethrow">
                                        <th style="width: 50px;">S.No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Dept</th>
                                        <th>Designation</th>
                                        <th>DOB</th>
                                        <th>Date Of Joining</th>
                                        <th>ESI</th>
                                        <th>UAN</th>


                                    </tr>
                                </thead>

                                <tr>
                                    <td colspan="2"><input type="text" class="form-control"
                                            ng-model="searchPayroll.Employeeid"></td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Fullname"></td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Department">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Designation">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.DOB">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Accountno">
                                    </td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.IFSCcode"></td>
                                    <td><input type="text" class="form-control" ng-model="searchPayroll.Branch"></td>

                                </tr>


                                <tr dir-paginate="e in GetEsiList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                    current-page="currentPagePayroll01" pagination-id="PayrollGridAdmin">

                                    <td>
                                        {{$index+1+(currentPagePayroll01 - 1) * pageSizePayroll01}}

                                    </td>
                                    <td> {{e.Employeeid}}</td>
                                    <td>{{e.Fullname}}</td>
                                    <td>{{e.Department}}</td>
                                    <td>{{e.Designation}}</td>
                                    <td> {{RecuriseDateFormat(e.DOB) | date:'dd-MM-yyyy '  }}</td>
                                    <td >{{RecuriseDateFormat(e.Date_Of_Joing) | date:'dd-MM-yyyy '  }}</td>
                                    <td> {{e.ESIno}}</td>
                                    <td> {{e.UANno}}</td>

                                 
                                </tr>
                              

                            </table>
                            <dir-pagination-controls pagination-id="PayrollGridAdmin" max-size="3"
                                direction-links="true" boundary-links="true" class="pagination">
                            </dir-pagination-controls>
                        </div>







                    </div>
                </div>


                <?php include '../footer.php'?>
            </div>
        </div>
        <?php include '../footerjs.php'?>


        <script src="../Scripts/Controller/HRMPayrollController.js"></script>
</body>

</html>