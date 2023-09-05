<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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

                  <div class="">
                    <div class="row">
                        <div class="col-md-12">


                                <h5 class="text-green">Employee ADD</h5>
                            <div class="">
<hr/>

                                <div class="row">
                                    

                                          <div class="form-group col-md-3">
                                               <label class="col-form-label">Authorised Type</label>
                                                <select class="form-control" id="EmployeeType" ng-model="EmployeeType"
                                                        ng-change="GetAuthNo(EmployeeType);">
                                                       <option Value="ADMIN">ADMIN</option>
                                                       <option value="General Manager">General Manager</option>
                                                       <option value="Dept Head">Dept Head</option>
                                                       <option value="HR Manager">HR Manager</option>
                                                       <option value="HR Assistant">HR Assistant</option>
                                                       <option value="Cash Voucher">Cash Voucher</option>
                                                 </select>
                                         </div>

                                         <div class="form-group col-md-3">
                                                <label class="col-form-label">Department</label>
                                                <input type="text" ng-model="Department" class="form-control ADMIN"  >
                                                <select ng-model="Department"  class="form-control user" ng-change="Getempname();">

                                                       <option ng-repeat="s in GetDepartmentList "
                                                        value="{{s.Department}}">
                                                        {{s.Department}}</option>
                                                </select>
                                          </div>
                                           
                                            
                                          <div class="form-group col-md-3">
                                                <label class="col-form-label"> User Name</label>

                                                <input type="text" ng-model="username" class="form-control ADMIN" >
                                                <select ng-model="Exitempid" class="form-control user"
                                                        ng-change="GetExitempname();" > 

                                                        <option ng-repeat="s in GetEmployeeList "
                                                        value="{{s.Employeeid}}" >
                                                             {{s.Fullname}}</option>
                                                </select>
                                       
                                           </div>

                                            <div class="form-group col-md-3">
                                                   
                                                   <label class="col-form-label"> User ID</label>
                                                    <input class="form-control" ng-model="Employeeid" >
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
                                                    <label class="col-form-label"> Email ID</label>
                                              
                                                    <input type="email" class="form-control" ng-model="Emailid"
                                                        autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                       ng-change="emailchecking(Emailid)" >

                                                </div>
                                               

                                             <div class="form-group col-md-3">
                                                    <label class="col-form-label"> Contactno</label>
                                              
                                                    <input class="form-control" ng-model="Contactno" 
                                                     ng-model-options='{ debounce: 1000 }'
                                                       ng-change="GeContactunique(Contactno)" >
                                               
                                                </div>

                                      
                                              <div class="form-group col-md-3">
                                                    <label class="col-form-label" for="Userpassword"> Password</label>
                                              
                                                    <input class="form-control" type="password" id="Userpassword" ng-model="Userpassword" name="Userpassword" autocomplete="off">
                                              </div>
                                       

                                              </div>    
                                              
                                       
                                            <div class="text-right mt-25">
                                                 <button class="btn btn-sm btn-success" ng-click="SaveEmployee();"
                                                  ><i class="fa fa-save"></i> Save</button>
                                                    <button class="btn btn-sm btn-danger"
                                                                ng-click="ResetDetails();"><i class="fa fa-times"></i>
                                                                Clear</button>
                                           
                                             </div>
                                    
                                   


                                      <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                        {{Message}}
                                      </div>
                                   
                                   
                                    <script>  
                                       $(document).ready(function(){
                                       $(".ADMIN").show();
                                       $(".user").hide();
                                       $('#EmployeeType').on('change', function() {
                                         if ( this.value == 'ADMIN')
                                              {
                                                $(".ADMIN").show();
                                                $(".user").hide();
                                              }
                                            else
                                             {
                                               $(".ADMIN").hide();
                                               $(".user").show();
                                              }
                                           });
                                         });
                                    </script>
                               
                            
                                </div>
                                           
                            </div>
                                              
                                       
                        </div>
                               
                               
                    </div>
                  </div>
              </div>

                                   

                <?php include '../footer.php'?>
            </div>




    </div>

        <?php include '../footerjs.php'?>
        <script src="../Scripts/Controller/HRM25Controller.js"></script>


</body>

</html>