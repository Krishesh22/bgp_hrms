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
    <title>Edit Employee Master</title>
</head>
<style>
@media print {
    @page {
        margin: 0;
    }

    #printbtn {
        display: none;
        ;
    }

}
.page-break{
    .page-break { page-break-before: always !important; 
}
</style>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM10Controller">

        <div class="container-fluid dashboard-content">
                    <div class="mt-3">

            <div id="myCarousel" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="">
                            <h5 class="text-green" >Employee Details</h5>
                            <hr/>


                            <div class="alert alert-success" role="alert" ng-show="AdminMessage">
                                {{AdminMessage}}
                            </div>

                            <div class="table-responsive ">
                                <table class="table table-bordered  table-sm table-striped">
                                    <thead>
                                        <tr class="text-green">

                                            <th>No</th>
                                            <th scope="col" style="width: 100px;">
                                                Employee ID</th>
                                            <th scope="col" style="width: 200px;">Name</th>
                                            <th scope="col" style="width: 90px;">Gender</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Designation</th>

                                            <th scope="col">Contact</th>
                                            <th scope="col" style="width: 50px;">Mobile</th>
                                            <th scope="col" style="width: 50px;">Mail</th>
                                            <th scope="col" style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Employeeid">

                                                </div>

                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Fullname">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Gender">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Department">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Designation">

                                                </div>
                                            </td>



                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Contactno">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Smsverified">

                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Emailverified" autocomplete="off">

                                                </div>
                                            </td>


                                            </td>


                                        </tr>
                                        <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                            pagination-id="Employeegrid" current-page="currentPageEmp">




                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Title}} {{e.Fullname}}</td>
                                            <td>{{e.Gender}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Designation}}</td>

                                            <td>{{e.Contactno}}</td>

                                            <td align="center" ng-show="e.Smsverified=='Yes'">
                                                <img title="Mobile Verified" height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                            </td>
                                            <td align="center" ng-show="e.Smsverified!='Yes'"
                                                title="Mobile Not Verified">
                                                <img height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                            </td>
                                            <td align="center" ng-show="e.Emailverified=='Yes'" title="Email Verified">
                                                <img height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                            </td>
                                            <td align="center" ng-show="e.Emailverified!='Yes'"
                                                title="Email Not Verified">
                                                <img height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <img height="15" ng-click="SendEdit02(e.Employeeid);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>




                            <div class="float-right mt-2">
                                <div class="pagination ">
                                    <dir-pagination-controls pagination-id="Employeegrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>

                                </div>
                            </div>


                        </div>




                    </div>



                    <div class="carousel-item">

                        <h5 class="text-green">Employee Modification</h5>
                        <hr/>
                        <div class="">


                            <div class="row">


                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="Employeeid" ng-model="Employeeid"
                                        autocomplete="off" readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">First Name</label>
                                    <div class="input-group "><span class="input-group-prepend">
                                            <select class="input-group-text surname-width" ng-model="Title">
                                                <option Value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>

                                            </select>
                                        </span>
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
                                    <label class="col-form-label">Category</label>
                                    <select class="form-control" ng-model="Category"
                                        ng-change="GetAdminCategory(Category);">
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 3</option>
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
                                    <input type="text" class="form-control" id="Contactno" ng-model="Contactno"
                                        autocomplete="off" onkeypress="return Validate(event);" maxlength="10">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Nationality</label>
                                    <input type="text" class="form-control" ng-model="Nationality" autocomplete="off">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Email-ID</label>
                                    <input type="text" class="form-control" ng-model="Emailid" autocomplete="email"
                                        ng-model-options='{ debounce: 1000 }' ng-change="emailchecking(Emailid)">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Employee Type</label>
                                    <select class="form-control" ng-model="EmployeeType">
                                        <option Value="Permanent">Permanent</option>
                                        <option value="Temporary">Temporary</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Department</label>
                                    <select ng-model="EmpDepartment" class="form-control">

                                        <option ng-repeat="s in GetDepartmentList " value="{{s.Department}}">
                                            {{s.Department}}</option>
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right mt-2 mb-2">
                                        <button class="btn btn-sm btn-success" ng-show="userviewrole == 1"
                                            ng-click="Update_Major();"><i class="fa fa-save"></i>
                                            Update</button>

                                        <button class="btn btn-sm btn-rounded btn-info" ng-show="Emailverified =='No'"
                                            ng-click="Emailverification01();"><i class="fa fa-envelope"></i>
                                            Email-Verification</button>
                                        <button id="BtnSendOTPSMS" ng-show="Smsverified == 'No'"
                                            class="btn btn-sm btn-rounded btn-primary"><i class="fa fa-mobile"></i>
                                            Mobile-Verification</button>

                                        <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                            data-slide-to="0" ng-click="Getallvalues()"><i class="fa fa-arrow-left"></i>
                                            Back</button>

                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                {{Message}}
                            </div>




                        </div>

                        <div class="row">
                            <div class="col-md-12">
                        <div class="tab-list" ng-show="userviewrole == 1">
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
                                    </a></li>
                                <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family
                                    </a></li>
                                <li class="nav-item" ng-click="fnrefinfo();"><a>Reference</a>
                                </li>
                                <li class="nav-item" ng-click="fnvaccinationinfo();">
                                    <a>Vaccination</a>
                                </li>
                                <li class="nav-item" ng-click="fnpropertychecklistinfo();">
                                    <a>Asset </a>
                                </li>
                                <li class="nav-item" ng-click="fnsalaryinfo();"><a>Salary </a>
                                </li>
                                <li class="nav-item" ng-click="fndocinfo();"><a>Document</a>
                                </li>

                                <li class="nav-item" ng-click="fnNomineeinfo();"><a>Nominee</a>
                                </li>
                                <li class="nav-item" ng-click="fnimageinfo();"><a>Image</a></li>
                                <li class="nav-item" ng-click="fnappraisalinfo();"><a>History
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

                    </div>


                    <?php include 'Empapp.php'?>
                    <?php include 'Empasset/Assetpopup.php'?>
                </div>
            </div>
</div>  
</div>

        </div>
        <?php include '../footer.php'?>
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
    // $('#download').hide();
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

   <script type="text/javascript">
    $('#upload4').hide();
    // $('#download4').hide();
    let croppie4;
    $('#avatar4').on('change', function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#croppie4 img').attr('src', e.target.result);
                croppie4 = new Croppie($('#croppie4 img')[0], {
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
            $('#upload4').show();
            $('#upload4').on('click', function() {
                $('#download4').show();
                console.log('uploading...');
                croppie4
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
                        $('#result_image4 img').attr('src', dataImg);
                    });
            });
            reader.readAsDataURL(this.files[0]);
        }
    })
    </script>
    



    <!-- OTP Modal -->
    <button type="button" style="display: none;" class="btn btn-primary OtpModal" data-toggle="modal"
        data-target="#OtpModal"> Send OTP </button>
    <div class="modal fade" id="OtpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Mobile Verification</h5>
                    <button type="button" class="close BtnOtpModalClose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Enter OTP</label>
                            <input type="text" id="MobileOtp" required class="form-control"
                                placeholder="Enter Received OTP">
                        </div>
                        <p class="text-success validOtp">Success!</p>
                        <p class="text-danger invalidOtp">Invalid Opt!. Retype it!</p>
                        <div class="text-right">

                            <button type="submit" id="BtnVerifyOtp" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Send SMS OTP -->
    <script type="text/javascript">
    $(document).on('click', '#BtnSendOTPSMS', function(event) {
        var Employeeid = $('#Employeeid').val();
        var MobileNum = $('#Contactno').val();

        $.ajax({
            type: 'POST',
            cache: false,
            url: 'SMSOtp.php',
            data: {
                Employeeid: Employeeid,
                MobileNum: MobileNum
            },
            success: function(html) {
                alert("OTP Sent Successfully!");
                $('.OtpModal').trigger('click');
            }
        });
        return false;
    });
    </script>

    <!-- Verify SMS OTP -->
    <script type="text/javascript">
    $(".validOtp").hide();
    $(".invalidOtp").hide();
    $(document).on('click', '#BtnVerifyOtp', function(event) {


        var MobileOtp = $('#MobileOtp').val();
        var Employeeid = $('#Employeeid').val();


        if (MobileOtp == "") {
            alert("Please Enter OTP!");
        } else {
            $.ajax({
                type: 'POST',
                cache: false,
                url: 'VerifySmsOtp.php',
                data: {
                    MobileOtp: MobileOtp,
                    Employeeid: Employeeid
                },
                success: function(status) {
                    updateStatus = status;
                    if (updateStatus == 1) {
                        $(".validOtp").show();

                        setTimeout(function() {
                            $(".validOtp").hide();
                        }, 3000);

                        setInterval(function() {
                            $(".BtnOtpModalClose").click();
                        }, 2000);


                        // $('.BtnOtpModalClose').trigger('click');
                    } else {
                        $(".invalidOtp").show();
                        setTimeout(function() {
                            $(".invalidOtp").hide();
                        }, 3000);
                    }
                    //alert("Updated successfully!");
                    // window.location.replace("Login.php");
                }
            });
            return false;
        }




    });
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
    <title>Edit Employee Master</title>
</head>
<style>
@media print {
    @page {
        margin: 0;
    }

    #printbtn {
        display: none;
        ;
    }

}
.page-break{
    .page-break { page-break-before: always !important; 
}
</style>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM10Controller">

        <div class="container-fluid dashboard-content">
                    <div class="mt-3">

            <div id="myCarousel" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="">
                            <h5 class="text-green" >Employee Details</h5>
                            <hr/>


                            <div class="alert alert-success" role="alert" ng-show="AdminMessage">
                                {{AdminMessage}}
                            </div>

                            <div class="table-responsive ">
                                <table class="table table-bordered  table-sm table-striped">
                                    <thead>
                                        <tr class="text-green">

                                            <th>No</th>
                                            <th scope="col" style="width: 100px;">
                                                Employee ID</th>
                                            <th scope="col" style="width: 200px;">Name</th>
                                            <th scope="col" style="width: 90px;">Gender</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Designation</th>

                                            <th scope="col">Contact</th>
                                            <th scope="col" style="width: 50px;">Mobile</th>
                                            <th scope="col" style="width: 50px;">Mail</th>
                                            <th scope="col" style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Employeeid">

                                                </div>

                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Fullname">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Gender">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Department">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Designation">

                                                </div>
                                            </td>



                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Contactno">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Smsverified">

                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control"
                                                        ng-model="searchEmployee.Emailverified" autocomplete="off">

                                                </div>
                                            </td>


                                            </td>


                                        </tr>
                                        <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                            pagination-id="Employeegrid" current-page="currentPageEmp">




                                            <td style="width: 50px;">
                                                {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                            </td>
                                            <td>{{e.Employeeid}}</td>
                                            <td>{{e.Title}} {{e.Fullname}}</td>
                                            <td>{{e.Gender}}</td>
                                            <td>{{e.Department}}</td>
                                            <td>{{e.Designation}}</td>

                                            <td>{{e.Contactno}}</td>

                                            <td align="center" ng-show="e.Smsverified=='Yes'">
                                                <img title="Mobile Verified" height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                            </td>
                                            <td align="center" ng-show="e.Smsverified!='Yes'"
                                                title="Mobile Not Verified">
                                                <img height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                            </td>
                                            <td align="center" ng-show="e.Emailverified=='Yes'" title="Email Verified">
                                                <img height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                            </td>
                                            <td align="center" ng-show="e.Emailverified!='Yes'"
                                                title="Email Not Verified">
                                                <img height="15"
                                                    src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <img height="15" ng-click="SendEdit02(e.Employeeid);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>




                            <div class="float-right mt-2">
                                <div class="pagination ">
                                    <dir-pagination-controls pagination-id="Employeegrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>

                                </div>
                            </div>


                        </div>




                    </div>



                    <div class="carousel-item">

                        <h5 class="text-green">Employee Modification</h5>
                        <hr/>
                        <div class="">


                            <div class="row">


                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="Employeeid" ng-model="Employeeid"
                                        autocomplete="off" readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">First Name</label>
                                    <div class="input-group "><span class="input-group-prepend">
                                            <select class="input-group-text surname-width" ng-model="Title">
                                                <option Value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>

                                            </select>
                                        </span>
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
                                    <label class="col-form-label">Category</label>
                                    <select class="form-control" ng-model="Category"
                                        ng-change="GetAdminCategory(Category);">
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 3</option>
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
                                    <input type="text" class="form-control" id="Contactno" ng-model="Contactno"
                                        autocomplete="off" onkeypress="return Validate(event);" maxlength="10">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Nationality</label>
                                    <input type="text" class="form-control" ng-model="Nationality" autocomplete="off">
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Email-ID</label>
                                    <input type="text" class="form-control" ng-model="Emailid" autocomplete="email"
                                        ng-model-options='{ debounce: 1000 }' ng-change="emailchecking(Emailid)">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Employee Type</label>
                                    <select class="form-control" ng-model="EmployeeType">
                                        <option Value="Permanent">Permanent</option>
                                        <option value="Temporary">Temporary</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Department</label>
                                    <select ng-model="EmpDepartment" class="form-control">

                                        <option ng-repeat="s in GetDepartmentList " value="{{s.Department}}">
                                            {{s.Department}}</option>
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right mt-2 mb-2">
                                        <button class="btn btn-sm btn-success" ng-show="userviewrole == 1"
                                            ng-click="Update_Major();"><i class="fa fa-save"></i>
                                            Update</button>

                                        <button class="btn btn-sm btn-rounded btn-info" ng-show="Emailverified =='No'"
                                            ng-click="Emailverification01();"><i class="fa fa-envelope"></i>
                                            Email-Verification</button>
                                        <button id="BtnSendOTPSMS" ng-show="Smsverified == 'No'"
                                            class="btn btn-sm btn-rounded btn-primary"><i class="fa fa-mobile"></i>
                                            Mobile-Verification</button>

                                        <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                            data-slide-to="0" ng-click="Getallvalues()"><i class="fa fa-arrow-left"></i>
                                            Back</button>

                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                {{Message}}
                            </div>




                        </div>

                        <div class="row">
                            <div class="col-md-12">
                        <div class="tab-list" ng-show="userviewrole == 1">
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
                                    </a></li>
                                <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family
                                    </a></li>
                                <li class="nav-item" ng-click="fnrefinfo();"><a>Reference</a>
                                </li>
                                <li class="nav-item" ng-click="fnvaccinationinfo();">
                                    <a>Vaccination</a>
                                </li>
                                <li class="nav-item" ng-click="fnpropertychecklistinfo();">
                                    <a>Asset </a>
                                </li>
                                <li class="nav-item" ng-click="fnsalaryinfo();"><a>Salary </a>
                                </li>
                                <li class="nav-item" ng-click="fndocinfo();"><a>Document</a>
                                </li>

                                <li class="nav-item" ng-click="fnNomineeinfo();"><a>Nominee</a>
                                </li>
                                <li class="nav-item" ng-click="fnimageinfo();"><a>Image</a></li>
                                <li class="nav-item" ng-click="fnappraisalinfo();"><a>History
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

                    </div>


                    <?php include 'Empapp.php'?>
                    <?php include 'Empasset/Assetpopup.php'?>
                </div>
            </div>
</div>  
</div>

        </div>
        <?php include '../footer.php'?>
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
    // $('#download').hide();
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

   <script type="text/javascript">
    $('#upload4').hide();
    // $('#download4').hide();
    let croppie4;
    $('#avatar4').on('change', function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#croppie4 img').attr('src', e.target.result);
                croppie4 = new Croppie($('#croppie4 img')[0], {
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
            $('#upload4').show();
            $('#upload4').on('click', function() {
                $('#download4').show();
                console.log('uploading...');
                croppie4
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
                        $('#result_image4 img').attr('src', dataImg);
                    });
            });
            reader.readAsDataURL(this.files[0]);
        }
    })
    </script>
    



    <!-- OTP Modal -->
    <button type="button" style="display: none;" class="btn btn-primary OtpModal" data-toggle="modal"
        data-target="#OtpModal"> Send OTP </button>
    <div class="modal fade" id="OtpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Mobile Verification</h5>
                    <button type="button" class="close BtnOtpModalClose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Enter OTP</label>
                            <input type="text" id="MobileOtp" required class="form-control"
                                placeholder="Enter Received OTP">
                        </div>
                        <p class="text-success validOtp">Success!</p>
                        <p class="text-danger invalidOtp">Invalid Opt!. Retype it!</p>
                        <div class="text-right">

                            <button type="submit" id="BtnVerifyOtp" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Send SMS OTP -->
    <script type="text/javascript">
    $(document).on('click', '#BtnSendOTPSMS', function(event) {
        var Employeeid = $('#Employeeid').val();
        var MobileNum = $('#Contactno').val();

        $.ajax({
            type: 'POST',
            cache: false,
            url: 'SMSOtp.php',
            data: {
                Employeeid: Employeeid,
                MobileNum: MobileNum
            },
            success: function(html) {
                alert("OTP Sent Successfully!");
                $('.OtpModal').trigger('click');
            }
        });
        return false;
    });
    </script>

    <!-- Verify SMS OTP -->
    <script type="text/javascript">
    $(".validOtp").hide();
    $(".invalidOtp").hide();
    $(document).on('click', '#BtnVerifyOtp', function(event) {


        var MobileOtp = $('#MobileOtp').val();
        var Employeeid = $('#Employeeid').val();


        if (MobileOtp == "") {
            alert("Please Enter OTP!");
        } else {
            $.ajax({
                type: 'POST',
                cache: false,
                url: 'VerifySmsOtp.php',
                data: {
                    MobileOtp: MobileOtp,
                    Employeeid: Employeeid
                },
                success: function(status) {
                    updateStatus = status;
                    if (updateStatus == 1) {
                        $(".validOtp").show();

                        setTimeout(function() {
                            $(".validOtp").hide();
                        }, 3000);

                        setInterval(function() {
                            $(".BtnOtpModalClose").click();
                        }, 2000);


                        // $('.BtnOtpModalClose').trigger('click');
                    } else {
                        $(".invalidOtp").show();
                        setTimeout(function() {
                            $(".invalidOtp").hide();
                        }, 3000);
                    }
                    //alert("Updated successfully!");
                    // window.location.replace("Login.php");
                }
            });
            return false;
        }




    });
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

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>