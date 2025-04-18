<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Edit Employee Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM25Controller">
            <div class="container-fluid dashboard-content">


                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="">
                                            <h5 class="text-green">Employee Rights Details</h5><hr>
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered  table-sm table-striped">
                                                                <thead>
                                                                    <tr class="text-green">

                                                                        <th>No</th>
                                                                        <th scope="col">
                                                                            User ID</th>
                                                                        <th scope="col" >User Name</th>
                                                                        <th scope="col" >Email Id</th>
                                                                        <th scope="col">Department</th>
                                                                        <th scope="col">Designation</th>

                                                                        <th scope="col">Contact</th>
                                                                        <th scope="col">Authorized Type </th>
                                                                        <th scope="col">Member Active</th>
                                                                  
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                    ng-model="searchEmployee.Userid">
                                                                              
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                    ng-model="searchEmployee.Username">
                                                                               
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                    ng-model="searchEmployee.Emailid">
                                                                               
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                    ng-model="searchEmployee.Department">
                                                                              
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                    ng-model="searchEmployee.Designation">
                                                                                
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                    ng-model="searchEmployee.Contactno">
                                                                              
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                    ng-model="searchEmployee.Authorizedtype">
                                                                               
                                                                            </div>
                                                                        </td>
                                                                        <td colspan="2"> 
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control" placeholder="Search" 
                                                                                 autocomplete="off"   ng-model="searchEmployee.Memberactive">
                                                                               
                                                                            </div>
                                                                        </td>
                                                                       

                                                                       
                                                                        

                                                                        </td>


                                                                    </tr>
                                                                    <tr dir-paginate="e in GetEmployeeList2 |filter:searchEmployee|itemsPerPage:10 "
                                                                        pagination-id="Employeegrid"
                                                                        current-page="currentPageEmp">




                                                                        <td style="width: 50px;">
                                                                            {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                                                        </td>
                                                                        <td>{{e.Userid}}</td>
                                                                        <td>{{e.Username}} </td>
                                                                        <td>{{e.Emailid}}</td>
                                                                        <td>{{e.Department}}</td>
                                                                        <td>{{e.Designation}}</td>

                                                                        <td>{{e.Contactno}}</td>
                                                                        <td>{{e.Authorizedtype}}</td>
                                                                        <td>{{e.Memberactive}}</td>
                                                                      

                                                                        <td>
                                                                            <div class="action-btn">
                                                                                <img height="15"
                                                                                    ng-click="SendEdit(e.Userid);"
                                                                                   
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">



                                                                                    </div>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="float-right mt-2">
                                                    <div class="pagination ">
                                                        <dir-pagination-controls pagination-id="Employeegrid"
                                                            max-size="3" direction-links="true" boundary-links="true"
                                                            class="pagination">
                                                        </dir-pagination-controls>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="carousel-item">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">





                                        <div class="">
                                            <h5 class="text-green">Employee Rights Modification</h5><hr>
                                            <div class="">


                                                <div class="row">


                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">User ID</label>
                                                        <input type="text" class="form-control" ng-model="Userid"
                                                            autocomplete="off" readonly>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">User Name</label>
                                                        
                                                                
                                                            <input type="text" placeholder="Username"
                                                                class="form-control" ng-model="Username" > 
                                                        
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Email-ID</label>
                                                        <input type="text" class="form-control" ng-model="Emailid"
                                                            autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                            ng-change="emailchecking(Emailid)">
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Department</label>
                                                        <select ng-model="Department" class="form-control">

                                                            <option ng-repeat="s in GetDepartmentList "
                                                                value="{{s.Department}}">
                                                                {{s.Department}}</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Designation</label>
                                                        <select ng-model="Designation" class="form-control">

                                                            <option ng-repeat="s in GetDesignationList "
                                                                value="{{s.Designation}}">
                                                                {{s.Designation}}</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Contact No</label>
                                                        <input type="text" class="form-control" ng-model="Contactno"
                                                            
                                                            maxlength="10">
                                                    </div>

                                                    

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Authorized Type</label>
                                                        <select class="form-control" ng-model="Authorizedtype">
                                                <option Value="SuperUser">ADMIN</option>
                                                <option value="HR-Manager">HR Manager</option>
                                                <option value="Dept-Head">Dept Head</option>
                                                <option value="HR-Assistant">HR Assistant</option>

                                            </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Member Active</label>
                                                        <select class="form-control" ng-model="Memberactive"
                                                            ng-change="GetAdminCategory(Category);">
                                                            <option Value="Active">Active
                                                            </option>
                                                            <option value="Not-Active">Not-Active</option>
                                                            

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                    <label> Password</label>
                                              
                                                    <input class="form-control" type="password" id="Userpassword" ng-model="Userpassword" name="Userpassword">
                                                </div>

                                                    


                                                    <div class="text-right mt-25">
                                                        <button class="btn btn-sm btn-success"
                                                            ng-click="UpdateEmp();"><i class="fa fa-save"></i>
                                                            Update</button>
                                                        <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                                            data-slide-to="0" ng-click="Getallvalues()"><i
                                                                class="fa fa-arrow-left"></i> Back</button>
                                                    </div>


                                                </div>

                        <?php include '../footer.php'?>
            </div>




        </div>

        <?php include '../footerjs.php'?>
        <script src="../Scripts/Controller/HRM25Controller.js"></script>

        <style type="text/css">footer{display: none;}</style>
</body>

</html>
