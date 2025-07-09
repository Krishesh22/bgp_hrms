<<<<<<< HEAD
<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Application Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM22Controller">
            <div class="container-fluid dashboard-content">

                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            
                                <div class="row">

                                    <div class="col-md-12">
                                        <h5 class="primary-title text-green">Application Details </h5>
                                        <hr />

                                    </div>

                                    <div class="col-md-12">

                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm ">

                                                <tr>

                                                    <th>No</th>
                                                    <th scope="col" style="width: 110px;">
                                                        Application ID</th>
                                                    <th scope="col" style="width: 200px;">Name</th>
                                                    <th scope="col" style="width: 90px;">Gender</th>
                                                    <th scope="col">Contact No.</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Qualification</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email</th>

                                                    <th scope="col">Action</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group ">
                                                            <input id="" type="text" class="form-control"
                                                                ng-model="searchApplication.Applicationid">

                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Fullname">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Gender">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Contactno">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Type_Of_Posistion">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.HighestQualification">

                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Selectionstatus">

                                                        </div>
                                                    </td>





                                                </tr>

                                                <tbody>
                                                    <tr dir-paginate="e in GetApplicationList02 |filter:searchApplication|itemsPerPage:10 "
                                                        pagination-id="Applicationgrid"
                                                        current-page="currentPageApplication">




                                                        <td style="width: 50px;text-align: center;">
                                                            {{$index+1 + (currentPageApplication - 1) * pageSizeApplication}}
                                                        </td>

                                                        <td>{{e.Applicationid}}</td>
                                                        <td>{{e.Title}} {{e.Fullname}}</td>
                                                        <td>{{e.Gender}}</td>
                                                        <td>{{e.Contactno}}</td>
                                                        <td>{{e.Type_Of_Posistion}}</td>
                                                        <td>{{e.HighestQualification}}</td>
                                                        <td>{{e.Selectionstatus}}</td>
                                                        <td align="center" ng-show="e.Smsverified=='Yes'">
                                                            <img title="Mobile Verified" height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                        </td>
                                                        <td align="center" ng-show="e.Smsverified!='Yes'"
                                                            title="Mobile Not Verified">
                                                            <img height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                        </td>
                                                        <td align="center" ng-show="e.Emailverified=='Yes'"
                                                            title="Email Verified">
                                                            <img height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                        </td>
                                                        <td align="center" ng-show="e.Emailverified!='Yes'"
                                                            title="Email Not Verified">
                                                            <img height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                        </td>

                                                        <td align="center">
                                                            <div class="action-btn">
                                                                <img height="15" title="Edit"
                                                                    ng-click="SendEdit(e.Applicationid);"
                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="float-right mt-2">
                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="Applicationgrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                         
                        </div>



                        <div class="carousel-item">
                 

                                <div class="row">

                                    <div class="col-md-12">
                                        <h5 class="primary-title text-green">Application Update</h5>

                                        <div class="form-group verify-btn-group">
                                            <span>Mail</span>
                                            <img ng-show="Emailverified!='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />

                                            <img ng-show="Emailverified=='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                            <span>Mobile No</span>
                                            <img ng-show="Smsverified!='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                            <img ng-show="Smsverified=='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                        </div>
                                        <hr />
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Application ID</label>
                                                <input type="text" class="form-control" ng-model="Applicationid" id="Applicationid"  name="Applicationid"
                                                    autocomplete="off" readonly>
                                            </div>

                                            <div class="form-group col-md-9 mb-0">

                                                <style>
                                                .surname-width {
                                                    max-width: 75px !important;
                                                }
                                                </style>
                                                <div class="row mb-0">

                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">First Name</label>
                                                        <div class="input-group "><span class="input-group-prepend">
                                                                <select class="input-group-text surname-width"
                                                                    ng-model="Title">
                                                                    <option Value="Mr.">Mr.</option>
                                                                    <option value="Mrs.">Mrs.</option>
                                                                    <option value="Ms.">Ms.</option>
                                                                </select>
                                                            </span>
                                                            <input type="text" placeholder="Firstname"
                                                                class="form-control" ng-model="Firstname">
                                                        </div>

                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">Last Name</label>
                                                        <input type="text" class="form-control" ng-model="Lastname"
                                                            autocomplete="off">

                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">Status</label>
                                                        <select class="form-control" ng-model="Selectionstatus">
                                                            <option Value="Shortlisted">Shortlisted</option>                                                          
                                                            <option value="Rejected">Rejected</option>
                                                            </option>

                                                        </select>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Application Date</label>
                                                <input type="text" class="form-control" ng-model="ApplicationDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')"
                                                    ng-change="GetApplicationDate();">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Interview schedule Date</label>
                                                <input type="text" class="form-control" ng-model="InterviewDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')"
                                                    ng-change="GetInterviewDate();">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Interview Timing</label>
                                                <input class="form-control" onfocus="(this.type='time')"
                                                    onblur="(this.type='time')" ng-model="Interviewtime"
                                                    placeholder="HH:mm:ss" />

                                            </div>


                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Gender</label>
                                                <select class="form-control" ng-model="Gender">
                                                    <option Value="Male">Male</option>
                                                    <option value="Female">Female</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Qualification</label>
                                                <select ng-model="Qualification" class="form-control">

                                                    <option ng-repeat="s in GetQualififcationList "
                                                        value="{{s.Degree}}">
                                                        {{s.Degree}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Marital Status</label>
                                                <select class="form-control" ng-model="Married">
                                                    <option ng-repeat="s in GetMaritalstatusList "
                                                        value="{{s.Maritalstatus}}">
                                                        {{s.Maritalstatus}}</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Mother Tongue </label>
                                                <select ng-model="Mothertongue" class="form-control">

                                                    <option ng-repeat="s in GetLanguageList " value="{{s.Languages}}">
                                                        {{s.Languages}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Position of Applicant </label>
                                                <select ng-model="Vaccancy" class="form-control">

                                                    <option ng-repeat="s in GetVaccancyList " value="{{s.Designation}}">
                                                        {{s.Designation}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Contact No</label>
                                                <input type="text" class="form-control" ng-model="Contactno" id="MobileNum"
                                                    autocomplete="off" onkeypress="return Validate(event);"
                                                    maxlength="10" ng-change="GetContactnounique(Contactno)">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Category</label>
                                                <select class="form-control" ng-model="Category">
                                                    <option value="Category 1">Category 1 </option>
                                                    <option value="Category 2">Category 2</option>
                                                    <option value="Category 3">Category 3</option>

                                                </select>
                                            </div>



                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Fresher</label>
                                                <select class="form-control" ng-model="Fresher"
                                                    ng-change="GetExpereience(Fresher)">
                                                    <option Value="Yes">Yes
                                                    </option>
                                                    <option value="No">No
                                                    </option>


                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Current Salary</label>
                                                <input type="text" class="form-control" ng-model="PreviousCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);"
                                                    ng-disabled="btnPrevious">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Expected Salary</label>
                                                <input type="text" class="form-control" ng-model="ExpectedCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Other Allowance</label>
                                                <input type="text" class="form-control" ng-model="Otherallowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Experience</label>
                                                <input type="text" class="form-control" ng-model="Experience"
                                                    autocomplete="off" ng-disabled="btnPrevious">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Email ID</label>
                                                <input type="email" class="form-control" ng-model="Emailid"
                                                    autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                    ng-change="emailchecking(Emailid)">

                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-12">



                                        <div class="alert alert-success" role="alert" ng-show="Message">
                                            {{Message}}
                                        </div>

                                        <div class="form-group text-right">
                                            <button class="btn btn-sm  btn-success"
                                                ng-click="UpdateApplication();"><i class="fa fa-save"></i>
                                                Update</button>
                                            <button id="BtnSendOTPSMS" class="btn btn-sm  btn-primary"
                                                ng-show="btnsms"><i class="fa fa-mobile"></i>
                                                Mobile Verification</button>
                                            <button class="btn btn-sm  btn-info"
                                                ng-click="Emailverification01();" ng-show="btnemail"><i
                                                    class="fa fa-envelope"></i>
                                                Mail Verification</button>
                                             <button class="btn btn-sm  btn-primary"
                                               data-toggle="modal" data-target="#ModalCenterUpload" ><i
                                                    class="fa fa-user"></i>
                                                Add Image</button>
                                            <button ng-show="btnMove" class="btn btn-sm  btn-info"
                                                ng-click="MoveToCandidate();" ng-disabled="btnsaveadmin2"><i
                                                    class="fa fa-save"></i>
                                                Move To Candidate</button>
                                            <button class="btn btn-sm  btn-warning"
                                                ng-click="Sendemail();"><i class="fa fa-envelope"></i>
                                                Interview Mail</button>
                                            <button class="btn btn-sm  btn-info"
                                                ng-click="FetchApplication(Applicationid);"><i
                                                    class="fa fa-circle-notch"></i>
                                                Refresh</button>
                                            <button class="btn btn-sm  btn-warning" data-target="#myCarousel"
                                                data-slide-to="0"><i class="fa  fa-arrow-left"></i>
                                                Back</button>
                                        </div>


                                        <!--Mobile Modal -->





                                    </div>

                                </div>


                               
                     
                        </div>
                        <?php include 'Addphoto.php'?>
                    </div>


                </div>
            </div>
            <?php include '../footerjs.php'?>

            <script src="../Scripts/Controller/HRM22Controller.js">
            </script>
            <script type="text/javascript">
            function Validate(event) {
                var regex = new RegExp("^[0-9-/()]");
                var key = String.fromCharCode(event.charCode ? event
                    .which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            }
            </script>



            <button type="button" style="display: none;" class="btn btn-primary OtpModal" data-toggle="modal"
                data-target="#OtpModal"> Send OTP </button>
            <div class="modal fade" id="OtpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Mobile Verification</h5>
                            <button type="button" class="close BtnOtpModalClose" data-dismiss="modal"
                                aria-label="Close">
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

                                    <button type="submit" id="BtnVerifyOtp"
                                        class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Send SMS OTP -->
            <script type="text/javascript">
            $(document).on('click', '#BtnSendOTPSMS', function(event) {

                $("#MobileOtp").val('');
                var Applicationid = $('#Applicationid').val();
                var MobileNum = $('#MobileNum').val();




                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: 'SMSOtp.php',
                    data: {
                        Applicationid: Applicationid,
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
                var Applicationid = $('#Applicationid').val();


                if (MobileOtp == "") {
                    alert("Please Enter OTP!");
                } else {
                    $.ajax({
                        type: 'POST',
                        cache: false,
                        url: 'VerifySmsOtp.php',
                        data: {
                            MobileOtp: MobileOtp,
                            Applicationid: Applicationid
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

</body>

=======
<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Application Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM22Controller">
            <div class="container-fluid dashboard-content">

                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            
                                <div class="row">

                                    <div class="col-md-12">
                                        <h5 class="primary-title text-green">Application Details </h5>
                                        <hr />

                                    </div>

                                    <div class="col-md-12">

                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm ">

                                                <tr>

                                                    <th>No</th>
                                                    <th scope="col" style="width: 110px;">
                                                        Application ID</th>
                                                    <th scope="col" style="width: 200px;">Name</th>
                                                    <th scope="col" style="width: 90px;">Gender</th>
                                                    <th scope="col">Contact No.</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Qualification</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email</th>

                                                    <th scope="col">Action</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group ">
                                                            <input id="" type="text" class="form-control"
                                                                ng-model="searchApplication.Applicationid">

                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Fullname">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Gender">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Contactno">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Type_Of_Posistion">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.HighestQualification">

                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Selectionstatus">

                                                        </div>
                                                    </td>





                                                </tr>

                                                <tbody>
                                                    <tr dir-paginate="e in GetApplicationList02 |filter:searchApplication|itemsPerPage:10 "
                                                        pagination-id="Applicationgrid"
                                                        current-page="currentPageApplication">




                                                        <td style="width: 50px;text-align: center;">
                                                            {{$index+1 + (currentPageApplication - 1) * pageSizeApplication}}
                                                        </td>

                                                        <td>{{e.Applicationid}}</td>
                                                        <td>{{e.Title}} {{e.Fullname}}</td>
                                                        <td>{{e.Gender}}</td>
                                                        <td>{{e.Contactno}}</td>
                                                        <td>{{e.Type_Of_Posistion}}</td>
                                                        <td>{{e.HighestQualification}}</td>
                                                        <td>{{e.Selectionstatus}}</td>
                                                        <td align="center" ng-show="e.Smsverified=='Yes'">
                                                            <img title="Mobile Verified" height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                        </td>
                                                        <td align="center" ng-show="e.Smsverified!='Yes'"
                                                            title="Mobile Not Verified">
                                                            <img height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                        </td>
                                                        <td align="center" ng-show="e.Emailverified=='Yes'"
                                                            title="Email Verified">
                                                            <img height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                        </td>
                                                        <td align="center" ng-show="e.Emailverified!='Yes'"
                                                            title="Email Not Verified">
                                                            <img height="15"
                                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                        </td>

                                                        <td align="center">
                                                            <div class="action-btn">
                                                                <img height="15" title="Edit"
                                                                    ng-click="SendEdit(e.Applicationid);"
                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="float-right mt-2">
                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="Applicationgrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                         
                        </div>



                        <div class="carousel-item">
                 

                                <div class="row">

                                    <div class="col-md-12">
                                        <h5 class="primary-title text-green">Application Update</h5>

                                        <div class="form-group verify-btn-group">
                                            <span>Mail</span>
                                            <img ng-show="Emailverified!='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />

                                            <img ng-show="Emailverified=='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                            <span>Mobile No</span>
                                            <img ng-show="Smsverified!='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                            <img ng-show="Smsverified=='Yes'" height="15"
                                                src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                        </div>
                                        <hr />
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Application ID</label>
                                                <input type="text" class="form-control" ng-model="Applicationid" id="Applicationid"  name="Applicationid"
                                                    autocomplete="off" readonly>
                                            </div>

                                            <div class="form-group col-md-9 mb-0">

                                                <style>
                                                .surname-width {
                                                    max-width: 75px !important;
                                                }
                                                </style>
                                                <div class="row mb-0">

                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">First Name</label>
                                                        <div class="input-group "><span class="input-group-prepend">
                                                                <select class="input-group-text surname-width"
                                                                    ng-model="Title">
                                                                    <option Value="Mr.">Mr.</option>
                                                                    <option value="Mrs.">Mrs.</option>
                                                                    <option value="Ms.">Ms.</option>
                                                                </select>
                                                            </span>
                                                            <input type="text" placeholder="Firstname"
                                                                class="form-control" ng-model="Firstname">
                                                        </div>

                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">Last Name</label>
                                                        <input type="text" class="form-control" ng-model="Lastname"
                                                            autocomplete="off">

                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">Status</label>
                                                        <select class="form-control" ng-model="Selectionstatus">
                                                            <option Value="Shortlisted">Shortlisted</option>                                                          
                                                            <option value="Rejected">Rejected</option>
                                                            </option>

                                                        </select>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Application Date</label>
                                                <input type="text" class="form-control" ng-model="ApplicationDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')"
                                                    ng-change="GetApplicationDate();">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Interview schedule Date</label>
                                                <input type="text" class="form-control" ng-model="InterviewDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')"
                                                    ng-change="GetInterviewDate();">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Interview Timing</label>
                                                <input class="form-control" onfocus="(this.type='time')"
                                                    onblur="(this.type='time')" ng-model="Interviewtime"
                                                    placeholder="HH:mm:ss" />

                                            </div>


                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Gender</label>
                                                <select class="form-control" ng-model="Gender">
                                                    <option Value="Male">Male</option>
                                                    <option value="Female">Female</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Qualification</label>
                                                <select ng-model="Qualification" class="form-control">

                                                    <option ng-repeat="s in GetQualififcationList "
                                                        value="{{s.Degree}}">
                                                        {{s.Degree}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Marital Status</label>
                                                <select class="form-control" ng-model="Married">
                                                    <option ng-repeat="s in GetMaritalstatusList "
                                                        value="{{s.Maritalstatus}}">
                                                        {{s.Maritalstatus}}</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Mother Tongue </label>
                                                <select ng-model="Mothertongue" class="form-control">

                                                    <option ng-repeat="s in GetLanguageList " value="{{s.Languages}}">
                                                        {{s.Languages}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Position of Applicant </label>
                                                <select ng-model="Vaccancy" class="form-control">

                                                    <option ng-repeat="s in GetVaccancyList " value="{{s.Designation}}">
                                                        {{s.Designation}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Contact No</label>
                                                <input type="text" class="form-control" ng-model="Contactno" id="MobileNum"
                                                    autocomplete="off" onkeypress="return Validate(event);"
                                                    maxlength="10" ng-change="GetContactnounique(Contactno)">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Category</label>
                                                <select class="form-control" ng-model="Category">
                                                    <option value="Category 1">Category 1 </option>
                                                    <option value="Category 2">Category 2</option>
                                                    <option value="Category 3">Category 3</option>

                                                </select>
                                            </div>



                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Fresher</label>
                                                <select class="form-control" ng-model="Fresher"
                                                    ng-change="GetExpereience(Fresher)">
                                                    <option Value="Yes">Yes
                                                    </option>
                                                    <option value="No">No
                                                    </option>


                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Current Salary</label>
                                                <input type="text" class="form-control" ng-model="PreviousCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);"
                                                    ng-disabled="btnPrevious">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Expected Salary</label>
                                                <input type="text" class="form-control" ng-model="ExpectedCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Other Allowance</label>
                                                <input type="text" class="form-control" ng-model="Otherallowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Experience</label>
                                                <input type="text" class="form-control" ng-model="Experience"
                                                    autocomplete="off" ng-disabled="btnPrevious">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Email ID</label>
                                                <input type="email" class="form-control" ng-model="Emailid"
                                                    autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                    ng-change="emailchecking(Emailid)">

                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-12">



                                        <div class="alert alert-success" role="alert" ng-show="Message">
                                            {{Message}}
                                        </div>

                                        <div class="form-group text-right">
                                            <button class="btn btn-sm  btn-success"
                                                ng-click="UpdateApplication();"><i class="fa fa-save"></i>
                                                Update</button>
                                            <button id="BtnSendOTPSMS" class="btn btn-sm  btn-primary"
                                                ng-show="btnsms"><i class="fa fa-mobile"></i>
                                                Mobile Verification</button>
                                            <button class="btn btn-sm  btn-info"
                                                ng-click="Emailverification01();" ng-show="btnemail"><i
                                                    class="fa fa-envelope"></i>
                                                Mail Verification</button>
                                             <button class="btn btn-sm  btn-primary"
                                               data-toggle="modal" data-target="#ModalCenterUpload" ><i
                                                    class="fa fa-user"></i>
                                                Add Image</button>
                                            <button ng-show="btnMove" class="btn btn-sm  btn-info"
                                                ng-click="MoveToCandidate();" ng-disabled="btnsaveadmin2"><i
                                                    class="fa fa-save"></i>
                                                Move To Candidate</button>
                                            <button class="btn btn-sm  btn-warning"
                                                ng-click="Sendemail();"><i class="fa fa-envelope"></i>
                                                Interview Mail</button>
                                            <button class="btn btn-sm  btn-info"
                                                ng-click="FetchApplication(Applicationid);"><i
                                                    class="fa fa-circle-notch"></i>
                                                Refresh</button>
                                            <button class="btn btn-sm  btn-warning" data-target="#myCarousel"
                                                data-slide-to="0"><i class="fa  fa-arrow-left"></i>
                                                Back</button>
                                        </div>


                                        <!--Mobile Modal -->





                                    </div>

                                </div>


                               
                     
                        </div>
                        <?php include 'Addphoto.php'?>
                    </div>


                </div>
            </div>
            <?php include '../footerjs.php'?>

            <script src="../Scripts/Controller/HRM22Controller.js">
            </script>
            <script type="text/javascript">
            function Validate(event) {
                var regex = new RegExp("^[0-9-/()]");
                var key = String.fromCharCode(event.charCode ? event
                    .which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            }
            </script>



            <button type="button" style="display: none;" class="btn btn-primary OtpModal" data-toggle="modal"
                data-target="#OtpModal"> Send OTP </button>
            <div class="modal fade" id="OtpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Mobile Verification</h5>
                            <button type="button" class="close BtnOtpModalClose" data-dismiss="modal"
                                aria-label="Close">
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

                                    <button type="submit" id="BtnVerifyOtp"
                                        class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Send SMS OTP -->
            <script type="text/javascript">
            $(document).on('click', '#BtnSendOTPSMS', function(event) {

                $("#MobileOtp").val('');
                var Applicationid = $('#Applicationid').val();
                var MobileNum = $('#MobileNum').val();




                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: 'SMSOtp.php',
                    data: {
                        Applicationid: Applicationid,
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
                var Applicationid = $('#Applicationid').val();


                if (MobileOtp == "") {
                    alert("Please Enter OTP!");
                } else {
                    $.ajax({
                        type: 'POST',
                        cache: false,
                        url: 'VerifySmsOtp.php',
                        data: {
                            MobileOtp: MobileOtp,
                            Applicationid: Applicationid
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

</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>