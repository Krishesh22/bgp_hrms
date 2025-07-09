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
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM10Controller">
            <div class="container-fluid">


                <div class="container-fluid dashboard-content">
                    <div class="card">
                        <h5 class="card-header text-green">Employee Creation</h5>
                        <div class="card-body">


                            <div class="row">


                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Employee ID</label>
                                    <input type="text" class="form-control" ng-model="Employeeid" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Category</label>

                                    <select class="form-control" ng-model="Category"
                                        ng-change="GetNextnoByCategory(Category,EmpDepartment);" ng-show="btnsave">
                                        <option value="Category 1">Category 1
                                        </option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 3</option>

                                    </select>
                                    <select class="form-control" ng-model="Category"
                                        ng-change="GetAdminCategory(Category);" ng-show="btnupdate">
                                        <option value="Category 1">Category 1
                                        </option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 3</option>

                                    </select>

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Department</label>



                                    <select ng-model="EmpDepartment" class="form-control" ng-show="btnsave"
                                        ng-change="GetNextnoByCategory(Category,EmpDepartment);">

                                        <option ng-repeat="s in GetDepartmentList " value="{{s.Department}}">
                                            {{s.Department}}</option>
                                    </select>


                                    <select ng-model="EmpDepartment" class="form-control" ng-show="btnupdate">

                                        <option ng-repeat="s in GetDepartmentList " value="{{s.Department}}">
                                            {{s.Department}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">First Name</label>
                                    <div class="input-group "><span class="input-group-prepend">
                                    <select class="input-group-text surname-width" ng-model="Title">
                                                <option Value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>

                                            </select></span>
                                        <input type="text" placeholder="Firstname" class="form-control"
                                            ng-model="Firstname">
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Last Name </label>
                                    <input type="text" class="form-control" ng-model="Lastname" autocomplete="off">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Gender</label>
                                    <select class="form-control" ng-model="Gender">
                                        <option Value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>



                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Marital Status</label>
                                    <select class="form-control" ng-model="Married">
                                        <option ng-repeat="s in GetMaritalstatusList " value="{{s.Maritalstatus}}">
                                            {{s.Maritalstatus}}</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">MotherTongue </label>
                                    <select ng-model="Mothertongue" class="form-control">

                                        <option ng-repeat="s in GetLanguageList " value="{{s.Languages}}">
                                            {{s.Languages}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Contact No</label>
                                    <input type="text" class="form-control" ng-model="Contactno" autocomplete="off"
                                        onkeypress="return Validate(event);" maxlength="10"
                                        ng-change="GetContactnounique(Contactno)">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Nationality</label>
                                    <input type="text" class="form-control" ng-model="Nationality" autocomplete="off">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Email-ID</label>
                                    <input type="text" class="form-control" ng-model="Emailid" autocomplete="email"
                                        ng-model-options='{ debounce: 1000 }' ng-change="emailchecking02(Emailid)">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Employee Type</label>
                                    <select class="form-control" ng-model="EmployeeType">
                                        <option Value="Permanent">Permanent</option>
                                        <option value="Temporary">Temporary</option>

                                    </select>
                                </div>


                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Designation</label>
                                    <select ng-model="EmpDesignation" class="form-control">

                                        <option ng-repeat="s in GetDesignationList " value="{{s.Designation}}">
                                            {{s.Designation}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Qualification</label>
                                    <select ng-model="Highestqualification" class="form-control"
                                        id="Highestqualification">
                                        <option ng-repeat="s in GetQualififcationList" value="{{s.Degree}}">
                                            {{s.Degree}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Father/ Spouse Name</label>
                                    <input type="text" class="form-control" ng-model="FatherGuardianSpouseName"
                                        placeholder="Enther Father / Spouse Name" autocomplete="off">
                                </div>

                                <div class="text-right mt-25">
                                    <button class="btn btn-sm btn-success" ng-click="SaveEmployee();" ng-show="btnsave"
                                        ng-disabled="btnsaveadmin">Save</button>
                                    <button class=" btn btn-sm btn-success" ng-click="Update_Major();"
                                        ng-show="btnupdate">Update</button>
                                    <button class="btn btn-sm  btn-primary " ng-click="Reset();">Reset</button>
                                </div>


                            </div>

                            <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                {{Message}}
                            </div>
                            <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;" ng-show="btnupdate">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item" ng-click="fnotherinfo();"><a>Personal</a>
                                    </li>
                                    <li class="nav-item" ng-click="fneducationinfo();">
                                        <a>Education</a>
                                    </li>
                                    <li class="nav-item" ng-click="fnaddressinfo();">
                                        <a>Address</a>
                                    </li>
                                    <li class="nav-item" ng-click="fnbankinfo();"><a>Bank
                                            Ac</a></li>
                                    <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family Info
                                        </a></li>
                                    <li class="nav-item" ng-click="fnrefinfo();"><a>Reference</a>
                                    </li>
                                    <li class="nav-item" ng-click="fnvaccinationinfo();">
                                        <a>Vaccination</a>
                                    </li>

                                    <li class="nav-item" ng-click="fnpropertychecklistinfo();">
                                        <a>Asset</a>
                                    </li>
                                    <li class="nav-item" ng-click="fnsalaryinfo();"><a>Salary </a>
                                    </li>
                                    <li class="nav-item" ng-click="fndocinfo();"><a>Document</a>
                                    </li>

                                    <li class="nav-item" ng-click="fnNomineeinfo();"><a>Nominee</a>
                                    </li>
                                    <li class="nav-item" ng-click="fnimageinfo();"><a>Image</a></li>
                                    <li class="nav-item" ng-click="fnappraisalinfo();"><a>Appraisal
                                        </a></li>

                                    <li class="nav-item" ng-click="fnidcardinfo();">
                                        <a>ID Card</a>
                                    </li>

                                    <li class="nav-item" ng-click="fnpromotioninfo();">
                                        <a>Promotion</a>
                                    </li>

                                    <li class="nav-item" ng-click="fnsiplTamil();">
                                        <a>Application</a>
                                    </li>





                                </ul>
                            </div>



                        </div>
                    </div>
                    <?php include 'Empasset/Empothers.php'?>

                   <?php include 'Empapp.php'?>
                    <?php include 'Empasset/Assetpopup.php'?>


                </div>


                <?php include '../footer.php'?>
            </div>
        </div>

    </div>
    </div>
    <?php include '../footerjs.php'?>
    <script src="../Scripts/jspdf.min.js"></script>
    <script src="../Scripts/Croppie/croppie.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Scripts/Croppie/croppie.min.css">
    <script src="../Scripts/html2canvas/html2canvas.min.js"></script>
    <script src="../Scripts/Controller/HRM10Controller.js"></script>
    <script type="text/javascript">
    function Validate(event) {
        var regex = new RegExp("^[0-9-/()]");
        var key = String.fromCharCode(event.charCode ? event.which : event
            .charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    </script>

    <script type="text/javascript">
    function Validateamt(event) {
        var regex = new RegExp("^[0-9-/.()]");
        var key = String.fromCharCode(event.charCode ? event.which : event
            .charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    </script>

    <script type="text/javascript">
    $(".tab-list ul").on('click', 'li', function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
    </script>

    <script type="text/javascript">
    $('#upload').hide();
    $('#download').hide();
    let croppie;
    $('#avatar').on('change', function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#croppie img').attr('src', e.target.result);
                croppie = new Croppie($('#croppie img')[0], {
                    boundary: {
                        width: 200,
                        height: 200
                    },
                    viewport: {
                        width: 100,
                        height: 100,
                        type: 'circle'
                    }
                })
            }
            $('#upload').show();
            $('#upload').on('click', function() {
                $('#download').show();
                console.log('uploading...');
                croppie
                    .result({
                        type: 'base64',
                        circle: false
                    })
                    .then(function(dataImg) {
                        var data = [{
                            image: dataImg
                        }, {
                            name: 'myimgage.jpg'
                        }];
                        // use ajax to send data to php
                        $('#result_image img').attr('src', dataImg);
                    });
            });
            reader.readAsDataURL(this.files[0]);
        }
    })
    </script>
    <script>
    $(document).ready(function() {
        $(".FIXED").show();
        $(".NOTFIXED").hide();
        $('#PF_Fixed').on('change', function() {
            if (this.value == 'Yes') {
                $(".NOTFIXED").show();
                $(".FIXED").hide();
            } else {
                $(".NOTFIXED").hide();
                $(".FIXED").show();
            }
        });
    });
    </script>
</body>

</html>