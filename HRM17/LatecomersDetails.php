<<<<<<< HEAD
<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Late Comers Detail</title>
</head>

<body>
 
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM17Controller">
            <div class="container-fluid dashboard-content">
                <div class="">
                   
       
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="" id="basicform">
                                    <h5 class="text-green">Late Comers</h5><hr>

                                </div>
                                <div class="">
                                    <div class="">
                                    <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input type="text" class="form-control" ng-model="Fromdate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                       >
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input type="text" class="form-control" ng-model="Todate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                      >
                                </div>
               
                                <div class="form-group text-right mt-25">
                                 
                                  
                                    <button class="btn btn-sm btn-info"
                                        ng-click="DisplayEmpLateCome();"><i class="fa fa-history"></i> Get Details</button>
                                  
                                </div>
                                
                            </div>


                                    </div>
                                    
                   
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="table-responsive custom-table custom-table-noborder ">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                  
                                                        <tr class="tablethrow">

                                                            <th style="width: 50px;">S.No</th>
                                                            
                                                            <!-- <th>Month</th>
                                                            <th>Year</th> -->
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Dept</th>
                                                            <th>Designation</th>
                                                            <!-- <th>Category</th> -->
                                                            <th>Late Days</th>
                                                            <th>OT</th>
                                                            <th>Workingdays</th>
                                                            <th>Workinghours</th>
                                                            <th>Action</th>
                                                           
                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            
                                                           
                                                            <td colspan="2"> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Employeeid"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Firstname"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Department"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Designation"></td>
                                                            <!-- <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Category"></td> -->
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.LateCount"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.OT"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Workingdays"></td>
                                                            <td colspan="2"> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Workinghours"></td>
                                                         
                                                           
                                                            </td>
                                                          
                                                            
                                                          



                                                        </tr>

                                                        <tr dir-paginate="e in GetEmpLateList |filter:searchPayroll|itemsPerPage:n "
                                                            pagination-id="PayrollGrid"
                                                            current-page="currentPageLate">


                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageLate - 1) * pageSizeLate}}
                                                            </td>
                                                           
                                                            <!-- <td>{{e.SalMonth}}</td>
                                                            <td>{{e.Salyear}}</td> -->
                                                            <td>{{e.Employeeid}}</td>
                                                            <td > {{e.Title}}{{e.Firstname}}{{e.lastname}}</td>
                                                            <td > <input class="form-control" ng-model=e.Department  style="width: 150px;" readonly/></td>
                                                            <td > <input class="form-control" ng-model=e.Designation  style="width: 150px;" readonly/></td>
                                                          
                                                            <!-- <td>{{e.Category}}</td> -->
                                                            <td>{{e.LateCount}}</td>
                                                            <td>{{e.OT}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Workeddays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS)" /></td> -->
                                                            <td>{{e.Workingdays}}</td>
                                                            <td>{{e.Workinghours}}</td>
                                                           <td> <button class="btn btn-sm btn-rounded btn-success" ng-click="Sendemail(e.Employeeid);"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            Send Email</button></td>
                 
                                                          
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                <div class="form-group text-right mt-25">
                                 
                                  
                                <button class="btn btn-sm btn-rounded btn-success" ng-click="Sendemailbulk();">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i> Send Bulk Email</button>
                                  
                                </div>
                                            </div>
                                        </div>

                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    

                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>


                </div>

            </div>

          

         
        </div>


        <?php include '../footer.php'?>
    </div>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM17Controller.js"></script>
</body>

=======
<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Late Comers Detail</title>
</head>

<body>
 
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM17Controller">
            <div class="container-fluid dashboard-content">
                <div class="">
                   
       
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="" id="basicform">
                                    <h5 class="text-green">Late Comers</h5><hr>

                                </div>
                                <div class="">
                                    <div class="">
                                    <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input type="text" class="form-control" ng-model="Fromdate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                       >
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input type="text" class="form-control" ng-model="Todate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                      >
                                </div>
               
                                <div class="form-group text-right mt-25">
                                 
                                  
                                    <button class="btn btn-sm btn-info"
                                        ng-click="DisplayEmpLateCome();"><i class="fa fa-history"></i> Get Details</button>
                                  
                                </div>
                                
                            </div>


                                    </div>
                                    
                   
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="table-responsive custom-table custom-table-noborder ">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                  
                                                        <tr class="tablethrow">

                                                            <th style="width: 50px;">S.No</th>
                                                            
                                                            <!-- <th>Month</th>
                                                            <th>Year</th> -->
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Dept</th>
                                                            <th>Designation</th>
                                                            <!-- <th>Category</th> -->
                                                            <th>Late Days</th>
                                                            <th>OT</th>
                                                            <th>Workingdays</th>
                                                            <th>Workinghours</th>
                                                            <th>Action</th>
                                                           
                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            
                                                           
                                                            <td colspan="2"> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Employeeid"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Firstname"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Department"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Designation"></td>
                                                            <!-- <td> <input type="text" class="form-control"
                                                                    ng-model="searchPayroll.Category"></td> -->
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.LateCount"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.OT"></td>
                                                            <td> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Workingdays"></td>
                                                            <td colspan="2"> <input type="text" placeholder="Search" class="form-control"
                                                                    ng-model="searchPayroll.Workinghours"></td>
                                                         
                                                           
                                                            </td>
                                                          
                                                            
                                                          



                                                        </tr>

                                                        <tr dir-paginate="e in GetEmpLateList |filter:searchPayroll|itemsPerPage:n "
                                                            pagination-id="PayrollGrid"
                                                            current-page="currentPageLate">


                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageLate - 1) * pageSizeLate}}
                                                            </td>
                                                           
                                                            <!-- <td>{{e.SalMonth}}</td>
                                                            <td>{{e.Salyear}}</td> -->
                                                            <td>{{e.Employeeid}}</td>
                                                            <td > {{e.Title}}{{e.Firstname}}{{e.lastname}}</td>
                                                            <td > <input class="form-control" ng-model=e.Department  style="width: 150px;" readonly/></td>
                                                            <td > <input class="form-control" ng-model=e.Designation  style="width: 150px;" readonly/></td>
                                                          
                                                            <!-- <td>{{e.Category}}</td> -->
                                                            <td>{{e.LateCount}}</td>
                                                            <td>{{e.OT}}</td>
                                                            <!-- <td> <input class="form-control" ng-model=e.Workeddays  onkeypress="return Validate(event);" ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue(e.Employeeid,e.SalMonth,e.Salyear,e.Workeddays,e.Leavedays,e.Salary_Advance,e.FoodDeduction,e.TDS,e.Category,e.Workingdays,e.Nationalholidays,e.CL,e.BasicDA,e.HRA,e.Otherallowance_Con_SA,e.DailyAllowanance,e.OT_HRS)" /></td> -->
                                                            <td>{{e.Workingdays}}</td>
                                                            <td>{{e.Workinghours}}</td>
                                                           <td> <button class="btn btn-sm btn-rounded btn-success" ng-click="Sendemail(e.Employeeid);"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            Send Email</button></td>
                 
                                                          
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                <div class="form-group text-right mt-25">
                                 
                                  
                                <button class="btn btn-sm btn-rounded btn-success" ng-click="Sendemailbulk();">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i> Send Bulk Email</button>
                                  
                                </div>
                                            </div>
                                        </div>

                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    

                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>


                </div>

            </div>

          

         
        </div>


        <?php include '../footer.php'?>
    </div>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM17Controller.js"></script>
</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>