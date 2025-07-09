<?php 
include '../config.php';

session_start();
// $_SESSION["Clientid"] = 1;

if(isset($_GET['Clientid'])){
    $_SESSION["ClientidNew"] =mysqli_real_escape_string($conn, $_GET['Clientid']);
    $_SESSION["Clientid"] = $_SESSION["ClientidNew"];
}

if(isset($_GET['Employeeid'])){
$_SESSION["EMPIDNEW"] =mysqli_real_escape_string($conn, $_GET['Employeeid']);
}

// $_SESSION["EMPIDNEW"] =172;
   
      ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <title>DH Approved</title>
    <link rel="stylesheet" href="<?php echo "$domain"; ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
    .cardapi {
        font-size: 14px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .cardapi input {
        font-size: 14px;
        padding: 3px;
    }

    .cardapi .card-header {
        color: #008000;
        background-color: #ffffff;
    }

    .dashboard-wrapper {
        margin-top: 25px;
    }

    .cardlabel .col-form-label {
        padding-bottom: 0px;
    }

    .mb-0 {
        margin-bottom: 0px !important;
    }

    .mx-15 {
        margin: 0 -15px;
    }

    .thead-1 {
        background-color: #349734;
        color: #ffffff;
    }

    .thead-2 {
        background-color: #1c511c;
        color: #ffffff;
    }

    .thead-2 th {
        font-weight: normal !important;
    }

    .can-table {
        margin-top: 10px;
    }

    .can-table th {
        font-size: 12px;
    }
    </style>
</head>

<body>
    <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRMEXITAPIController">
        <div class="container ">


            <div class="card cardapi cardlabel">
                <div class="row">


                    <div class="form-group col-md-3">
                        <label class="col-form-label">Employee ID</label>
                        <input class="form-control" ng-model="Employeeid" readonly />

                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">First Name</label>
                        <div class="input-group "><span class="input-group-prepend">
                                <input class="form-control" ng-model="Title" readonly />
                                <input class="form-control" ng-model="Firstname" readonly />


                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Last Name </label>
                        <input class="form-control" ng-model="Lastname" readonly />



                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Gender</label>
                        <input class="form-control" ng-model="Gender" readonly />


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Category</label>
                        <input class="form-control" ng-model="Category" readonly />


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Married</label>
                        <input class="form-control" ng-model="Married" readonly />


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">MotherTongue </label>
                        <input class="form-control" ng-model="Mothertongue" readonly />


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Contact No</label>
                        <input class="form-control" ng-model="Contactno" readonly />


                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Nationality</label>
                        <input class="form-control" ng-model="Nationality" readonly />

                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Email-ID</label>
                        <input class="form-control" ng-model="Emailid" readonly />

                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Employee Type</label>
                        <input class="form-control" ng-model="EmployeeType" readonly />


                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Department</label>
                        <input class="form-control" ng-model="EmpDepartment" readonly />

                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Designation</label>
                        <input class="form-control" ng-model="EmpDesignation" readonly />


                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Qualification</label>
                        <input class="form-control" ng-model="Highestqualification" readonly />


                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Father/ Spouse Name</label>
                        <input class="form-control" ng-model="FatherGuardianSpouseName" readonly />

                    </div>





                </div>
            </div>

            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    Personal and Joining Information</h5>
                <div class="card-body">

                    <div class="row">


                        <div class="form-group col-md-3">
                            <label class="col-form-label">DOB</label>
                            <input class="form-control" ng-model="Dob" readonly />


                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Languages</label>
                            <input class="form-control" ng-model="Languagestest" readonly />

                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Age</label>
                            <input class="form-control" ng-model="Age" readonly />


                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Blood Group</label>
                            <input class="form-control" ng-model="Bloodgroup" readonly />


                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Experience</label>
                            <input class="form-control" ng-model="Expereience" readonly />


                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Fresher</label>
                            <input class="form-control" ng-model="Fresher" readonly />


                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Date Of Joing</label>
                            <input class="form-control" ng-model="Date_Of_Joing2" readonly />

                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Shift</label>
                            <input class="form-control" ng-model="Shift" readonly />

                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Allow_OT</label>
                            <input class="form-control" ng-model="AllowOT" readonly />

                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Allow_LOP</label>
                            <input class="form-control" ng-model="AllowLOP" readonly />


                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Salary_Mode</label>
                            <input class="form-control" ng-model="Salary_Mode" readonly />


                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Week_Off</label>
                            <input class="form-control" ng-model="Weekoff" readonly />


                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Employee_CL</label>
                            <input class="form-control" ng-model="Employee_CL" readonly />


                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">UAN No</label>
                            <input class="form-control" ng-model="UANno" readonly />


                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">ESI No </label>
                            <input class="form-control" ng-model="ESIno" readonly />


                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">Aadhar No</label>
                            <input class="form-control" ng-model="Aadharno" readonly />


                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">PAN No</label>
                            <input class="form-control" ng-model="Panno" readonly />


                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">PF Joining Date</label>
                            <input class="form-control" ng-model="PFJoiningdate" readonly />

                        </div>
                        <div class="form-group col-md-3">
                            <label class="col-form-label">ESI Joining Date </label>
                            <input class="form-control" ng-model="ESIJoiningdate" readonly />


                        </div>




                        <div class="form-group col-md-3" ng-show="btnverification">
                            <label class="col-form-label">Background Verification
                                Completed</label>

                            <input class="form-control" ng-model="BackgroundVerification" readonly />

                        </div>



                    </div>



                </div>
            </div>

            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">Salary Informtion</h5>
                <div class="card-body">

                    <div class="row">


                        <div class="form-group col-md-3">
                            <label class="col-form-label">Basic+Da</label>
                            <input class="form-control" ng-model="Basic" readonly />
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">HR_Allowance</label>
                            <input class="form-control" ng-model="HR_Allowance" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label"> Travel Allowance </label>
                            <input class="form-control" ng-model="TA" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label"> Performance_allowance </label>
                            <input class="form-control" ng-model="Performance_allowance" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Day_allowance</label>
                            <input class="form-control" ng-model="Day_allowance" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">PF</label>
                            <input class="form-control" ng-model="PF" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">ESI</label>
                            <input class="form-control" ng-model="ESI" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">TDS</label>
                            <input class="form-control" ng-model="TDS" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Professional_tax</label>
                            <input class="form-control" ng-model="Professional_tax" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Net_Salary</label>
                            <input class="form-control" ng-model="Net_Salary" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Gross_Salary</label>
                            <input class="form-control" ng-model="Gross_Salary" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Other_Allowance</label>
                            <input class="form-control" ng-model="Other_Allowance" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">PF_Yesandno</label>
                            <input class="form-control" ng-model="PF_Yesandno" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">ESI_Yesandno</label>
                            <input class="form-control" ng-model="ESI_Yesandno" readonly />

                        </div>





                    </div>


                </div>
            </div>

            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">Relieving Information</h5>
                <div class="card-body">

                    <div class="row">


                        <div class="form-group col-md-3">
                            <label class="col-form-label">Hand OVer To</label>
                            <input class="form-control" ng-model="Handovername" readonly />
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Request Date</label>
                            <input class="form-control" ng-model="RequestDate2" readonly />

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label"> Releiving Date </label>
                            <input class="form-control" ng-model="ReleivingDate2" readonly />

                        </div>

                    </div>


                </div>
            </div>


            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                Relieving Reason</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 mx-15">
                            <label class="col-form-label">
                            Relieving Reason</label>
                            <textarea type="text" class="form-control " ng-model="Releivingreason"
                                autocomplete="off"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    HR Notes</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 mx-15">
                            <label class="col-form-label">
                                HR Notes</label>
                            <textarea type="text" class="form-control " ng-model="HR_Notes"
                                autocomplete="off" readonly></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="alert alert-success" role="alert" ng-show="Message">

                {{Message}}

            </div>

            <div class="card cardapi cardlabel">
                <h5 class="card-header text-green pl-0">
                    DH Notes</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 mx-15">
                            <label class="col-form-label">
                                DH Notes</label>
                            <textarea type="text" class="form-control " ng-model="DH_Notes"
                                autocomplete="off"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-6 ">
                </div>
                <div class="col-lg-6 ">
                    <div class="text-right"> <button class="btn btn-sm btn-rounded btn-danger"
                            ng-click="UpdatedDHRejected()"><i class="fa fa-times" aria-hidden="true"></i>
                            Reject</button>
                        <button class="btn btn-sm btn-rounded btn-success" ng-click="UpdateDHApproved()"><i
                                class="fa fa-check" aria-hidden="true"></i>
                            Approved</button>
                    </div>
                </div>


            </div>

          
         
        </div>


        <?php include '../footerjs.php'?>
        <script src="../Scripts/jspdf.min.js"></script>

        <script src="../Scripts/html2canvas/html2canvas.min.js"></script>
        <script src="../Scripts/Controller/HRMEXITAPIController.js"></script>
        <script type="text/javascript">
        function Validate(event) {
            var regex = new RegExp("^[0-9-/()]");
            var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
        </script>

        <script type="text/javascript">
        function Validateamt(event) {
            var regex = new RegExp("^[0-9-/.()]");
            var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
        </script>
</body>

</html>