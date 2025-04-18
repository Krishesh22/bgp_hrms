<?php
session_start();
$Authorizedno = $_SESSION["Authorizedno"];
$Clientid = $_SESSION["Clientid"];

$cpage = strtolower(basename($_SERVER['SCRIPT_NAME'], '.php'));
?>

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php if ($Authorizedno == 1)
{
?>
                <ul class='navbar-nav flex-column sidebar-menu'>
                    <div class='links'>
                        <li class='nav-divider'>
                            Menu
                        </li>
                        <li class='nav-item'>

                            <a class='nav-link animate-charcter <?=($cpage == 'dashboard') ? 'active' : '' ?>'
                                href='<?=$domain ?>/dashboard.php'><i class='fa fa-calculator'></i>Dashboard</a>

                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'adddepartment' || $cpage == 'adddesignation' || $cpage == 'addshift' || $cpage == 'addcountry' || $cpage == 'addstate' || $cpage == 'addcity' || $cpage == 'addholiday' || $cpage == 'adddocumenttype' || $cpage == 'addlanguages' || $cpage == 'addrelationship' || $cpage == 'adddegree' || $cpage == 'adddepartmenthead' || $cpage == 'addlocation' || $cpage == 'addcompanydocument' || $cpage=='addbloodgrp' || $cpage=='addeducation' || $cpage=='addeduspecialization' || $cpage=='addindustrialtype') ? 'active' : '' ?>
     ' href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-2' aria-controls='submenu-2'><i
                                    class='fa fa-cog'></i>Settings</a>
                            <div id='submenu-2'
                                class='collapse submenu tablink <?=($cpage == 'adddepartment' || $cpage == 'adddesignation' || $cpage == 'addshift' || $cpage == 'addcountry' || $cpage == 'addstate' || $cpage == 'addcity' || $cpage == 'addholiday' || $cpage == 'adddocumenttype' || $cpage == 'addlanguages' || $cpage == 'addrelationship' || $cpage == 'adddegree' || $cpage == 'adddepartmenthead' || $cpage == 'addlocation' || $cpage == 'addcompanydocument' || $cpage=='addbloodgrp' || $cpage=='addeducation' || $cpage=='addeduspecialization' || $cpage=='addindustrialtype') ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'adddepartment') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM01/AddDepartment.php'>Department</a>
                                    </li>


                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'adddesignation') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM04/AddDesignation.php'>Designation</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addcompanydocument') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM46/Addcompanydocument.php'>Company Doc</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addshift') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM05/AddShift.php'>Shift</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addcountry') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM06/AddCountry.php'>Country</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addstate') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM07/AddState.php'>States</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addcity') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM03/AddCity.php'>City</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addholiday') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM08/AddHoliday.php'>Holiday</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addholiday') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM08/AddHoliday.php'>Holiday</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addbloodgrp') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM51/AddBloodgrp.php'>Blood Group</a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addeducation') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM52/Addeducation.php'>Education Mode</a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addeduspecialization') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM53/AddeduSpecialization.php'>Specialization</a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addindustrialtype') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM63/Addindustrialtype.php'>Industrial Type</a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'adddocumenttype') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM11/AddDocumenttype.php'>Document Type</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addlanguages') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM12/AddLanguages.php'>Languages</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addrelationship') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM13/AddRelationship.php'>Relationship</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'adddegree') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM15/AddDegree.php'>Qualification</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'adddepartmenthead') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM36/AddDepartmenthead.php'>Department Head</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addlocation') ? 'active' : '' ?>'
                                            href='<?=$domain ?>/HRM33/AddLocation.php'>Location</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'addjob' || $cpage == 'editjob' || $cpage == 'jobview') ? 'active' : '' ?>'
                                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-3'
                                aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
                                Application</a>
                            <div id='submenu-3'
                                class='collapse submenu <?=($cpage == 'addjob' || $cpage == 'editjob' || $cpage == 'jobview') ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addjob') ? 'active' : '' ?>'
                                            title='Job Application Addition' href='<?=$domain ?>/HRM22/addjob.php'><i
                                                class='fa fa-plus'></i> Add</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'editjob') ? 'active' : '' ?>'
                                            title='Job Application Edit' href='<?=$domain ?>/HRM22/editjob.php'><i
                                                class='fa fa-pencil-square-o'></i> Edit</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'jobview') ? 'active' : '' ?>'
                                            title='Job Application View' href='<?=$domain ?>/HRM22/jobview.php'><i
                                                class='fa fa-eye'></i> View</a>
                                    </li>


                                </ul>
                            </div>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'addcandidate' || $cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'active' : '' ?>'
                                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-9'
                                aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
                            <div id='submenu-9'
                                class='collapse submenu <?=($cpage == 'addcandidate' || $cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addcandidate') ? 'active' : '' ?>'
                                            title='Candidate Addition' href='<?=$domain ?>/HRM09/Addcandidate.php'><i
                                                class='fa fa-plus'></i> Add</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'editcandidate') ? 'active' : '' ?>'
                                            title='Candidate Edit' href='<?=$domain ?>/HRM09/Editcandidate.php'><i
                                                class='fa fa-pencil-square-o'></i> Edit</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'viewcandidate') ? 'active' : '' ?>'
                                            title='Candidate View' href='<?=$domain ?>/HRM09/Viewcandidate.php'><i
                                                class='fa fa-eye'></i> View</a>
                                    </li>


                                </ul>
                            </div>
                        </li>
                        <li class='nav-item '>
                            <a class='nav-link <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'active' : '' ?>'
                                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-16'
                                aria-controls='submenu-16'><i class='fa fa-list-ol'></i>Asset</a>
                            <div id='submenu-16'
                                class='collapse submenu  <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addasset') ? 'active' : '' ?>'
                                            title='Employee Addition' href='<?=$domain ?>/HRM60/AddAsset.php'><i
                                                class='fa fa-plus'></i> Category</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addassetlist') ? 'active' : '' ?>'
                                            title='Employee Edit' href='<?=$domain ?>/HRM61/AddAssetlist.php'><i
                                                class='fa fa-pencil-square-o'></i>
                                            Asset List</a>
                                    </li>




                                </ul>
                            </div>
                        </li>

                        <li class='nav-item '>
                            <a class='nav-link <?=($cpage == 'addemployee' || $cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'active' : '' ?>'
                                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-4'
                                aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
                            <div id='submenu-4'
                                class='collapse submenu <?=($cpage == 'addemployee' || $cpage == 'editemployee' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addemployee') ? 'active' : '' ?>'
                                            title='Employee Addition' href='<?=$domain ?>/HRM10/AddEmployee.php'> <i
                                                class='fa fa-plus'></i> Add</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'editemployee') ? 'active' : '' ?>'
                                            title='Employee Edit' href='<?=$domain ?>/HRM10/EditEmployee.php'><i
                                                class='fa fa-pencil-square-o'></i> Edit</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'viewemployee') ? 'active' : '' ?>'
                                            title='Employee View' href='<?=$domain ?>/HRM10/ViewEmployee.php'><i
                                                class='fa fa-eye'></i> View</a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'employeedept') ? 'active' : '' ?>'
                                            title='Employee Detail Departmentwise'
                                            href='<?=$domain ?>/HRM41/Employeedept.php'><i class='fa fa-th-list'></i>
                                            Departmentwise Employee Details</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'appresialpending') ? 'active' : '' ?>'
                                            title='Appraisal Pending List'
                                            href='<?=$domain ?>/HRM10/Appresialpending.php'><i
                                                class='fa fa-th-list'></i> Appraisal Pending List</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'backgroundverificationpending') ? 'active' : '' ?>'
                                            title='Background Verification Pending List'
                                            href='<?=$domain ?>/HRM10/BackgroundVerificationpending.php'><i
                                                class='fa fa-check'></i> Background Verification</a>
                                    </li>


                                </ul>
                            </div>
                        </li>


                        <li class='nav-item '>
                            <a class='nav-link <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'active' : '' ?>'
                                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-11'
                                aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
                            <div id='submenu-11'
                                class='collapse submenu  <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addemp') ? 'active' : '' ?>'
                                            title='Employee Addition' href='<?=$domain ?>/HRM27/AddEmp.php'><i
                                                class='fa fa-plus'></i> Add</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'editexit') ? 'active' : '' ?>'
                                            title='Employee Edit' href='<?=$domain ?>/HRM27/editExit.php'><i
                                                class='fa fa-pencil-square-o'></i> Edit</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'view') ? 'active' : '' ?>'
                                            title='Employee View' href='<?=$domain ?>/HRM27/View.php'><i
                                                class='fa fa-eye'></i> View</a>
                                    </li>



                                </ul>
                            </div>
                        </li>




                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_attendanceviewnew' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp' || $cpage == 'monthlyattendanceclose') ? 'active' : '' ?>'
                                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-5'
                                aria-controls='submenu-5'><i class='fa fa-balance-scale'></i>Payroll</a>
                            <div id='submenu-5'
                                class='collapse submenu <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp' || $cpage == 'payrollreportbgp' || $cpage == 'monthlyattendanceclose') ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <?php if ($Clientid == 4)
    { ?>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'adddailyattendancebgp') ? 'active' : '' ?>'
                                            title='Daily Attendance'
                                            href='<?=$domain ?>/HRM16/AddDailyattendanceBGP.php'> Attendance Delhi</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'leaveattendancedetails') ? 'active' : '' ?>'
                                            title='Attendance form'
                                            href='<?=$domain ?>/HRM14/LeaveAttendanceDetails.php'> </i>Form-12 & 25</a>

                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'employeeleavesummaryupload') ? 'active' : '' ?>'
                                            title='Daily Attendance'
                                            href='<?=$domain ?>/HRM39/Employeeleavesummaryupload.php'> Leave Summary
                                            Upload</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'monthlyattendanceclose') ? 'active' : '' ?>'
                                            title='Daily Attendance'
                                            href='<?=$domain ?>/HRM16/Monthlyattendanceclose.php'> Close Attendance</a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addpayrollbgp') ? 'active' : '' ?>'
                                            title='Payroll Temp' href='<?=$domain ?>/HRM14/AddPayrollBGP.php'> Payroll
                                        </a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'payrollreportbgp') ? 'active' : '' ?>'
                                            title='Payroll Temp' href='<?=$domain ?>/HRM14/payrollreportbgp.php'>
                                            Categorywise-Bulk Payslip
                                        </a>
                                    </li>
                                    <?php
    }
    else
    { ?>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'adddailyattendance') ? 'active' : '' ?>'
                                            title='Daily Attendance' href='<?=$domain ?>/HRM16/AddDailyattendance.php'>
                                            Attendance</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'attendance_details') ? 'active' : '' ?>'
                                            title='Attendance form' href='<?=$domain ?>/HRM14/attendance_details.php'>
                                            Form-12 &
                                            25</a>

                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addpayrolltemp') ? 'active' : '' ?>'
                                            title='Payroll Temp' href='<?=$domain ?>/HRM14/AddPayrolltemp.php'> Payroll
                                        </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'payrollclose') ? 'active' : '' ?>'
                                            title='Payslip' href='<?=$domain ?>/HRM14/Payrollclose.php'> Payslip </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'categorywise_payslip') ? 'active' : '' ?>'
                                            title='Categorywise-Bulk Payslip'
                                            href='<?=$domain ?>/HRM14/Categorywise_payslip.php'> Categorywise-Bulk
                                            Payslip </a>
                                    </li>

                                    <?php
    } ?>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'employeedailyattandancerpt') ? 'active' : '' ?>'
                                            title='Daily Attendance'
                                            href='<?=$domain ?>/HRM37/EmployeeDailyattandancerpt.php'> Attendance
                                            Report</a>
                                    </li>


                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'employeepayrolldeduction') ? 'active' : '' ?>'
                                            title='Deduction Upload'
                                            href='<?=$domain ?>/HRM14/Employeepayrolldeduction.php'> Deduction Upload
                                        </a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'empesidetails') ? 'active' : '' ?>'
                                            title='Employee ESI Detail' href='<?=$domain ?>/HRM14/Empesidetails.php'>
                                            Employee ESI List </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'emppayrolldeductionlist') ? 'active' : '' ?>'
                                            title='Deduction List'
                                            href='<?=$domain ?>/HRM14/Emppayrolldeductionlist.php'> Deduction List </a>
                                    </li>

                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'payrollrpt') ? 'active' : '' ?>'
                                            title='Categorywise Payrol' href='<?=$domain ?>/HRM14/PayrollRpt.php'>
                                            Categorywise Payroll </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'bankpayroll') ? 'active' : '' ?>'
                                            title='Bank Report' href='<?=$domain ?>/HRM14/Bankpayroll.php'> Bank Report
                                        </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'categorywise_attendanceview') ? 'active' : '' ?>'
                                            title='Categorywise-Attendance details'
                                            href='<?=$domain ?>/HRM14/Categorywise_attendanceview.php'>
                                            Categorywise-Attendance details </a>
                                    </li>
                        </li>


                </ul>
            </div>
            </li>

            <li class='nav-item '>
                <a class='nav-link <?=($cpage == 'addvoucher' || $cpage == 'headofaccountdetails' || $cpage == 'addinwardamount' || $cpage == 'inwardreport') ? 'active' : '' ?>'
                    href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-30'
                    aria-controls='submenu-30'><i class='fa fa-user-times'></i>Cash Voucher</a>
                <div id='submenu-30'
                    class='collapse submenu <?=($cpage == 'addvoucher' || $cpage == 'headofaccountdetails' || $cpage == 'addinwardamount' || $cpage == 'inwardreport') ? 'show' : '' ?>'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'addvoucher') ? 'active' : '' ?>' title='Add Voucher'
                                href='<?=$domain ?>/HRM30/AddVoucher.php'><i class='fa fa-plus'></i> Add</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'headofaccountdetails') ? 'active' : '' ?>'
                                title='Edit Voucher' href='<?=$domain ?>/HRM30/HeadofAccountdetails.php'><i
                                    class='fa fa-table'></i> Expenses Report</a>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'addinwardamount') ? 'active' : '' ?>' title='View Voucher'
                                href='<?=$domain ?>/HRM31/AddInwardamount.php'><i class='fa fa-plus'></i> Wallet</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'inwardreport') ? 'active' : '' ?>' title='View Voucher'
                                href='<?=$domain ?>/HRM31/InwardReport.php'><i class='fa fa-database'></i> Wallet
                                Report</a>
                        </li>



                    </ul>
                </div>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage == 'adddocumentmaster' || $cpage == 'editdocumentmaster' || $cpage == 'viewdocumentmaster') ? 'active' : '' ?>'
                    href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-6'
                    aria-controls='submenu-6'><i class='fa fa-file-pdf-o'></i> Document
                </a>
                <div id='submenu-6'
                    class='collapse submenu  <?=($cpage == 'adddocumentmaster' || $cpage == 'editdocumentmaster' || $cpage == 'viewdocumentmaster') ? 'show' : '' ?>'>
                    <ul class='nav flex-column'>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'adddocumentmaster') ? 'active' : '' ?>'
                                href='<?=$domain ?>/HRM45/AddDocumentMaster.php'><i class='fa fa-plus'></i>Add
                                Document</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'editdocumentmaster') ? 'active' : '' ?>'
                                href='<?=$domain ?>/HRM45/EditDocumentMaster.php'><i
                                    class='fa fa-pencil-square-o'></i>Edit Document</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link <?=($cpage == 'viewdocumentmaster') ? 'active' : '' ?>'
                                href='<?=$domain ?>/HRM45/ViewDocumentMaster.php'><i class='fa fa-eye'></i>View
                                Document</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class='nav-item '>
                            <a class='nav-link <?=($cpage == 'assetreport' ) ? 'active' : '' ?>' href='#'
                                data-toggle='collapse' aria-expanded='false' data-target='#submenu-17'
                                aria-controls='submenu-17'><i class='fa fa-cubes'></i>Reports</a>
                            <div id='submenu-17'
                                class='collapse submenu  <?=($cpage == 'assetreport' ) ? 'show' : '' ?>'>
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'assetreport') ? 'active' : '' ?>'
                                            title='Allocated Asset Reports' href='<?=$domain ?>/HRM62/Assetreport.php'>
                                            Asset Allocated</a>
                                    </li>





                                </ul>
                            </div>
                        </li>


            </li>
    </div>
    </ul><?php
}
else if ($Authorizedno == 7)
{ ?>

    <ul class='navbar-nav flex-column'>
        <li class='nav-divider'>
            Menu
        </li>
        <li class='nav-item '>
            <a class='nav-link animate-charcter <?=($cpage == 'dashboard') ? 'active' : '' ?>'
                href='<?=$domain ?>/dashboard.php'><i class='fa fa-calculator'></i>Dashboard</a>

        </li>

        <li class='nav-item'>
            <a class='nav-link <?=($cpage == 'addjob' || $cpage == 'editjob' || $cpage == 'jobview') ? 'active' : '' ?>'
                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-3'
                aria-controls='submenu-3'><i class='fa fa-sticky-note'></i>Job
                Application</a>
            <div id='submenu-3'
                class='collapse submenu <?=($cpage == 'addjob' || $cpage == 'editjob' || $cpage == 'jobview') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addjob') ? 'active' : '' ?>' title='Job Application Addition'
                            href='<?=$domain ?>/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editjob') ? 'active' : '' ?>' title='Job Application Edit'
                            href='<?=$domain ?>/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'jobview') ? 'active' : '' ?>' title='Job Application View'
                            href='<?=$domain ?>/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class='nav-item'>
            <a class='nav-link <?=($cpage == 'addcandidate' || $cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'active' : '' ?>'
                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-9'
                aria-controls='submenu-9'><i class='fa fa-users'></i>Candidate</a>
            <div id='submenu-9'
                class='collapse submenu <?=($cpage == 'addcandidate' || $cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addcandidate') ? 'active' : '' ?>' title='Candidate Addition'
                            href='<?=$domain ?>/HRM09/Addcandidate.php'><i class='fa fa-plus'></i> Add</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editcandidate') ? 'active' : '' ?>' title='Candidate Edit'
                            href='<?=$domain ?>/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'viewcandidate') ? 'active' : '' ?>' title='Candidate View'
                            href='<?=$domain ?>/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
                    </li>


                </ul>
            </div>
        </li>

        <li class='nav-item '>
            <a class='nav-link <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'active' : '' ?>' href='#'
                data-toggle='collapse' aria-expanded='false' data-target='#submenu-16' aria-controls='submenu-16'><i
                    class='fa fa-list-ol'></i>Asset</a>
            <div id='submenu-16'
                class='collapse submenu  <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addasset') ? 'active' : '' ?>' title='Employee Addition'
                            href='<?=$domain ?>/HRM60/AddAsset.php'><i class='fa fa-plus'></i> Category</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addassetlist') ? 'active' : '' ?>' title='Employee Edit'
                            href='<?=$domain ?>/HRM61/AddAssetlist.php'><i class='fa fa-pencil-square-o'></i>
                            Asset List</a>
                    </li>




                </ul>
            </div>
        </li>
        <li class='nav-item '>
            <a class='nav-link <?=($cpage == 'addemployee' || $cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee') ? 'active' : '' ?>'
                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-4'
                aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
            <div id='submenu-4'
                class='collapse submenu <?=($cpage == 'addemployee' || $cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addemployee') ? 'active' : '' ?>' title='Employee Addition'
                            href='<?=$domain ?>/HRM10/AddEmployee.php'> <i class='fa fa-plus'></i> Add</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editemployee') ? 'active' : '' ?>' title='Employee Edit'
                            href='<?=$domain ?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'viewemployee') ? 'active' : '' ?>' title='Employee View'
                            href='<?=$domain ?>/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'employeedept') ? 'active' : '' ?>'
                            title='Employee Detail Departmentwise' href='<?=$domain ?>/HRM41/Employeedept.php'><i
                                class='fa fa-th-list'></i> Departmentwise Employee Details</a>
                    </li>




                </ul>
            </div>
        </li>


        <li class='nav-item '>
            <a class='nav-link <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'active' : '' ?>'
                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-11'
                aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
            <div id='submenu-11'
                class='collapse submenu <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addemp') ? 'active' : '' ?>' title='Employee Addition'
                            href='<?=$domain ?>/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editexit') ? 'active' : '' ?>' title='Employee Edit'
                            href='<?=$domain ?>/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'view') ? 'active' : '' ?>' title='Employee View'
                            href='<?=$domain ?>/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
                    </li>



                </ul>
            </div>
        </li>



    </ul>
    <?php
}
else if ($Authorizedno == 2)
{ ?>

    <ul class='navbar-nav flex-column'>
        <li class='nav-divider'>
            Menu
        </li>
        <li class='nav-item '>
            <a class='nav-link animate-charcter <?=($cpage == 'dashboard') ? 'active' : '' ?>'
                href='<?=$domain ?>/dashboard.php'><i class='fa fa-calculator'></i>Dashboard</a>

        </li>


        <li class='nav-item'>
            <a class='nav-link <?=($cpage == 'editjob' || $cpage == 'jobview') ? 'active' : '' ?>' href='#'
                data-toggle='collapse' aria-expanded='false' data-target='#submenu-3' aria-controls='submenu-3'><i
                    class='fa fa-sticky-note'></i>Job
                Application</a>
            <div id='submenu-3'
                class='collapse submenu <?=($cpage == 'editjob' || $cpage == 'jobview') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editjob') ? 'active' : '' ?>' title='Job Application Edit'
                            href='<?=$domain ?>/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'jobview') ? 'active' : '' ?>' title='Job Application View'
                            href='<?=$domain ?>/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class='nav-item'>
            <a class='nav-link <?=($cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'active' : '' ?>' href='#'
                data-toggle='collapse' aria-expanded='false' data-target='#submenu-9' aria-controls='submenu-9'><i
                    class='fa fa-users'></i>Candidate</a>
            <div id='submenu-9'
                class='collapse submenu <?=($cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editcandidate') ? 'active' : '' ?>' title='Candidate Edit'
                            href='<?=$domain ?>/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'viewcandidate') ? 'active' : '' ?>' title='Candidate View'
                            href='<?=$domain ?>/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
                    </li>


                </ul>
            </div>
        </li>

        <li class='nav-item '>
            <a class='nav-link <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'active' : '' ?>' href='#'
                data-toggle='collapse' aria-expanded='false' data-target='#submenu-16' aria-controls='submenu-16'><i
                    class='fa fa-list-ol'></i>Asset</a>
            <div id='submenu-16'
                class='collapse submenu  <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addasset') ? 'active' : '' ?>' title='Employee Addition'
                            href='<?=$domain ?>/HRM60/AddAsset.php'><i class='fa fa-plus'></i> Category</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addassetlist') ? 'active' : '' ?>' title='Employee Edit'
                            href='<?=$domain ?>/HRM61/AddAssetlist.php'><i class='fa fa-pencil-square-o'></i>
                            Asset List</a>
                    </li>




                </ul>
            </div>
        </li>
        <li class='nav-item '>
            <a class='nav-link <?=($cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'active' : '' ?>'
                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-4'
                aria-controls='submenu-4'><i class='fa fa-user'></i>Employee</a>
            <div id='submenu-4'
                class='collapse submenu <?=($cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editemployee') ? 'active' : '' ?>' title='Employee Edit'
                            href='<?=$domain ?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'viewemployee') ? 'active' : '' ?>' title='Employee View'
                            href='<?=$domain ?>/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'employeedept') ? 'active' : '' ?>'
                            title='Employee Detail Departmentwise' href='<?=$domain ?>/HRM41/Employeedept.php'><i
                                class='fa fa-th-list'></i> Departmentwise Employee Details</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'appresialpending') ? 'active' : '' ?>'
                            title='Appraisal Pending List' href='<?=$domain ?>/HRM10/Appresialpending.php'><i
                                class='fa fa-th-list'></i> Appraisal Pending List</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'backgroundverificationpending') ? 'active' : '' ?>'
                            title='Background Verification Pending List'
                            href='<?=$domain ?>/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i>
                            Background Verification</a>
                    </li>


                </ul>
            </div>
        </li>


        <li class='nav-item '>
            <a class='nav-link <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'active' : '' ?>'
                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-11'
                aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
            <div id='submenu-11'
                class='collapse submenu <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addemp') ? 'active' : '' ?>' title='Employee Addition'
                            href='<?=$domain ?>/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'editexit') ? 'active' : '' ?>' title='Employee Edit'
                            href='<?=$domain ?>/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'view') ? 'active' : '' ?>' title='Employee View'
                            href='<?=$domain ?>/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
                    </li>



                </ul>
            </div>
        </li>


        <li class='nav-item '>
            <a class='nav-link <?=($cpage == 'rightadd' || $cpage == 'rightsedit') ? 'active' : '' ?>' href='#'
                data-toggle='collapse' aria-expanded='false' data-target='#submenu-15' aria-controls='submenu-15'><i
                    class='fa fa-user-circle'></i>Admin Rights</a>
            <div id='submenu-15'
                class='collapse submenu <?=($cpage == 'rightadd' || $cpage == 'rightsedit') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'rightadd') ? 'active' : '' ?>' title='Admin Addition'
                            href='<?=$domain ?>/HRM25/RightAdd.php'> <i class='fa fa-plus'></i> Add</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'rightsedit') ? 'active' : '' ?>' title='Admin Edit'
                            href='<?=$domain ?>/HRM25/RightsEdit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </li>




                </ul>
            </div>
        </li>

        <li class='nav-item'>
            <a class='nav-link <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_attendanceviewnew' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp') ? 'active' : '' ?>'
                href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-5'
                aria-controls='submenu-5'><i class='fa fa-balance-scale'></i>Payroll</a>
            <div id='submenu-5'
                class='collapse submenu <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp' || $cpage == 'payrollreportbgp') ? 'show' : '' ?>'>
                <ul class='nav flex-column'>
                    <?php if ($Clientid == 4)
    { ?>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'adddailyattendancebgp') ? 'active' : '' ?>'
                            title='Daily Attendance' href='<?=$domain ?>/HRM16/AddDailyattendanceBGP.php'> Attendance
                            Delhi</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'leaveattendancedetails') ? 'active' : '' ?>'
                            title='Attendance form' href='<?=$domain ?>/HRM14/LeaveAttendanceDetails.php'> </i>Form-12 &
                            25</a>

                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'employeeleavesummaryupload') ? 'active' : '' ?>'
                            title='Daily Attendance' href='<?=$domain ?>/HRM39/Employeeleavesummaryupload.php'> Leave
                            Summary
                            Upload</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'monthlyattendanceclose') ? 'active' : '' ?>'
                            title='Daily Attendance' href='<?=$domain ?>/HRM16/Monthlyattendanceclose.php'> Close
                            Attendance</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addpayrollbgp') ? 'active' : '' ?>' title='Payroll Temp'
                            href='<?=$domain ?>/HRM14/AddPayrollBGP.php'> Payroll
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'payrollreportbgp') ? 'active' : '' ?>' title='Payroll Temp'
                            href='<?=$domain ?>/HRM14/payrollreportbgp.php'>
                            Categorywise-Bulk Payslip
                        </a>
                    </li>


                    <?php
    }
    else
    { ?>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'adddailyattendance') ? 'active' : '' ?>'
                            title='Daily Attendance' href='<?=$domain ?>/HRM16/AddDailyattendance.php'>
                            Attendance</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'attendance_details') ? 'active' : '' ?>'
                            title='Attendance form' href='<?=$domain ?>/HRM14/attendance_details.php'>
                            Form-12 &
                            25</a>

                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'addpayrolltemp') ? 'active' : '' ?>' title='Payroll Temp'
                            href='<?=$domain ?>/HRM14/AddPayrolltemp.php'> Payroll
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'payrollclose') ? 'active' : '' ?>' title='Payslip'
                            href='<?=$domain ?>/HRM14/Payrollclose.php'> Payslip </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'categorywise_payslip') ? 'active' : '' ?>'
                            title='Categorywise-Bulk Payslip' href='<?=$domain ?>/HRM14/Categorywise_payslip.php'>
                            Categorywise-Bulk Payslip </a>
                    </li>
                    <?php
    } ?>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'employeedailyattandancerpt') ? 'active' : '' ?>'
                            title='Daily Attendance' href='<?=$domain ?>/HRM37/EmployeeDailyattandancerpt.php'>
                            Attendance
                            Report</a>
                    </li>


                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'employeepayrolldeduction') ? 'active' : '' ?>'
                            title='Deduction Upload' href='<?=$domain ?>/HRM14/Employeepayrolldeduction.php'> Deduction
                            Upload
                        </a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'empesidetails') ? 'active' : '' ?>'
                            title='Employee ESI Detail' href='<?=$domain ?>/HRM14/Empesidetails.php'>
                            Employee ESI List </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'emppayrolldeductionlist') ? 'active' : '' ?>'
                            title='Deduction List' href='<?=$domain ?>/HRM14/Emppayrolldeductionlist.php'> Deduction
                            List </a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'payrollrpt') ? 'active' : '' ?>' title='Categorywise Payrol'
                            href='<?=$domain ?>/HRM14/PayrollRpt.php'>
                            Categorywise Payroll </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'bankpayroll') ? 'active' : '' ?>' title='Bank Report'
                            href='<?=$domain ?>/HRM14/Bankpayroll.php'> Bank Report
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=($cpage == 'categorywise_attendanceview') ? 'active' : '' ?>'
                            title='Categorywise-Attendance details'
                            href='<?=$domain ?>/HRM14/Categorywise_attendanceview.php'>
                            Categorywise-Attendance details </a>
                    </li>
        </li>


    </ul>
</div>
</li>
<li class='nav-item '>
    <a class='nav-link <?=($cpage == 'headofaccountdetails' || $cpage == 'inwardreport') ? 'active' : '' ?>' href=#'
        data-toggle='collapse' aria-expanded='false' data-target='#submenu-30' aria-controls='submenu-30'><i
            class='fa fa-user-times'></i>Cash Voucher</a>
    <div id='submenu-30'
        class='collapse submenu <?=($cpage == 'headofaccountdetails' || $cpage == 'inwardreport') ? 'show' : '' ?>'>
        <ul class='nav flex-column'>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage == 'headofaccountdetails') ? 'active' : '' ?>' title='Edit Voucher'
                    href='<?=$domain ?>/HRM30/HeadofAccountdetails.php'><i class='fa fa-table'></i> Expenses Report</a>
            </li>


            <li class='nav-item'>
                <a class='nav-link <?=($cpage == 'inwardreport') ? 'active' : '' ?>' title='View Voucher'
                    href='<?=$domain ?>/HRM31/InwardReport.php'><i class='fa fa-database'></i> Wallet Report</a>
            </li>



        </ul>
    </div>
</li>




</ul><?php
}
else if ($Authorizedno == 8)
{ ?>

<ul class='navbar-nav flex-column'>
    <li class='nav-divider'>
        Menu
    </li>
    <li class='nav-item '>
        <a class='nav-link animate-charcter <?=($cpage == 'dashboard') ? 'active' : '' ?>'
            href='<?=$domain ?>/dashboard.php'><i class='fa fa-calculator'></i>Dashboard</a>

    </li>



    <li class='nav-item'>
        <a class='nav-link <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_attendanceviewnew' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp' || $cpage == 'monthlyattendanceclose') ? 'active' : '' ?>'
            href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-5' aria-controls='submenu-5'><i
                class='fa fa-balance-scale'></i>Payroll</a>
        <div id='submenu-5'
            class='collapse submenu <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp' || $cpage == 'payrollreportbgp' || $cpage == 'monthlyattendanceclose') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>
                <?php if ($Clientid == 4)
    { ?>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'adddailyattendancebgp') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM16/AddDailyattendanceBGP.php'> Attendance
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'leaveattendancedetails') ? 'active' : '' ?>'
                        title='Attendance form' href='<?=$domain ?>/HRM14/LeaveAttendanceDetails.php'> </i>Form-12 &
                        25</a>

                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'employeeleavesummaryupload') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM39/Employeeleavesummaryupload.php'> Leave
                        Summary
                        Upload</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'monthlyattendanceclose') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM16/Monthlyattendanceclose.php'> Close
                        Attendance</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addpayrollbgp') ? 'active' : '' ?>' title='Payroll Temp'
                        href='<?=$domain ?>/HRM14/AddPayrollBGP.php'> Payroll
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'payrollreportbgp') ? 'active' : '' ?>' title='Payroll Temp'
                        href='<?=$domain ?>/HRM14/payrollreportbgp.php'>
                        Categorywise-Bulk Payslip
                    </a>
                </li>


                <?php
    }
    else
    { ?>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'adddailyattendance') ? 'active' : '' ?>' title='Daily Attendance'
                        href='<?=$domain ?>/HRM16/AddDailyattendance.php'>
                        Attendance</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'attendance_details') ? 'active' : '' ?>' title='Attendance form'
                        href='<?=$domain ?>/HRM14/attendance_details.php'>
                        Form-12 &
                        25</a>

                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'payrollclose') ? 'active' : '' ?>' title='Payslip'
                        href='<?=$domain ?>/HRM14/Payrollclose.php'> Payslip </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addpayrolltemp') ? 'active' : '' ?>' title='Payroll Temp'
                        href='<?=$domain ?>/HRM14/AddPayrolltemp.php'> Payroll
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'categorywise_payslip') ? 'active' : '' ?>'
                        title='Categorywise-Bulk Payslip' href='<?=$domain ?>/HRM14/Categorywise_payslip.php'>
                        Categorywise-Bulk Payslip </a>
                </li>

                <?php
    } ?>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'employeedailyattandancerpt') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM37/EmployeeDailyattandancerpt.php'> Attendance
                        Report</a>
                </li>


                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'employeepayrolldeduction') ? 'active' : '' ?>'
                        title='Deduction Upload' href='<?=$domain ?>/HRM14/Employeepayrolldeduction.php'> Deduction
                        Upload
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'empesidetails') ? 'active' : '' ?>' title='Employee ESI Detail'
                        href='<?=$domain ?>/HRM14/Empesidetails.php'>
                        Employee ESI List </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'emppayrolldeductionlist') ? 'active' : '' ?>'
                        title='Deduction List' href='<?=$domain ?>/HRM14/Emppayrolldeductionlist.php'> Deduction List
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'payrollrpt') ? 'active' : '' ?>' title='Categorywise Payrol'
                        href='<?=$domain ?>/HRM14/PayrollRpt.php'>
                        Categorywise Payroll </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'bankpayroll') ? 'active' : '' ?>' title='Bank Report'
                        href='<?=$domain ?>/HRM14/Bankpayroll.php'> Bank Report
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'categorywise_attendanceview') ? 'active' : '' ?>'
                        title='Categorywise-Attendance details'
                        href='<?=$domain ?>/HRM14/Categorywise_attendanceview.php'>
                        Categorywise-Attendance details </a>
                </li>
    </li>

</ul>
</div>
</li>




</ul> <?php
}
else if ($Authorizedno == 5)
{
    $MenuList = "";
}

else if ($Authorizedno == 12)
{

?><ul class='navbar-nav flex-column'>
    <li class='nav-divider'>
        Menu
    </li>
    <li class='nav-item '>
        <a class='nav-link animate-charcter <?=($cpage == 'cat3dashboard') ? 'active' : '' ?>'
            href='<?=$domain ?>/cat3dashboard.php'><i class='fa fa-calculator'></i>Dashboard</a>

    </li>


    <li class='nav-item'>
        <a class='nav-link <?=($cpage == 'jobCat3view') ? 'active' : '' ?>' href='#' data-toggle='collapse'
            aria-expanded='false' data-target='#submenu-1' aria-controls='submenu-1'><i
                class='fa fa-sticky-note'></i>Job
            Application</a>
        <div id='submenu-1' class='collapse submenu <?=($cpage == 'jobCat3view') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'jobCat3view') ? 'active' : '' ?>' title='Job Application View'
                        href='<?=$domain ?>/HRM22/jobCat3view.php'><i class='fa fa-eye'></i> View</a>
                </li>


            </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link <?=($cpage == 'Cat3Candidate') ? 'active' : '' ?>' href='#' data-toggle='collapse'
            aria-expanded='false' data-target='#submenu-2' aria-controls='submenu-2'><i
                class='fa fa-users'></i>Candidate</a>
        <div id='submenu-2' class='collapse submenu <?=($cpage == 'Cat3Candidate') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'Cat3Candidate') ? 'active' : '' ?>' title='Candidate View'
                        href='<?=$domain ?>/HRM09/Cat3Candidate.php'><i class='fa fa-eye'></i> View</a>
                </li>


            </ul>
        </div>
    </li>

    <li class='nav-item '>

        <a class='nav-link <?=($cpage == 'Cat3viewEmployee') ? 'active' : '' ?>' href='#' data-toggle='collapse'
            aria-expanded='false' data-target='#submenu-3' aria-controls='submenu-3'><i
                class='fa fa-user'></i>Employee</a>

        <div id='submenu-3' class='collapse submenu <?=($cpage == 'Cat3viewEmployee') ? 'show' : '' ?>'>

            <ul class='nav flex-column'>



                <li class='nav-item'>

                    <a class='nav-link <?=($cpage == 'Cat3viewEmployee') ? 'active' : '' ?>' title='Employee View'
                        href='<?=$domain ?>/HRM10/Cat3viewEmployee.php'><i class='fa fa-eye'></i> View</a>

                </li>

            </ul>

        </div>

    </li>

    <li class='nav-item '>
        <a class='nav-link <?=($cpage == 'ViewDocumentMaster') ? 'active' : '' ?>' href='#' data-toggle='collapse'
            aria-expanded='false' data-target='#submenu-4' aria-controls='submenu-4'><i
                class='fa fa-user'></i>Document</a>
        <div id='submenu-4' class='collapse submenu <?=($cpage == 'ViewDocumentMaster') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'ViewDocumentMaster') ? 'active' : '' ?>' title='Employee View'
                        href='<?=$domain ?>/HRM45/ViewDocumentMaster.php'><i class='fa fa-eye'></i> View</a>
                </li>
            </ul>
        </div>
    </li>


</ul>
<?php
}

else if ($Authorizedno == 4)
{

?><ul class='navbar-nav flex-column'>
    <li class='nav-divider'>
        Menu
    </li>
    <li class='nav-item '>
        <a class='nav-link animate-charcter <?=($cpage == 'dashboard') ? 'active' : '' ?>'
            href='<?=$domain ?>/dashboard.php'><i class='fa fa-calculator'></i>Dashboard</a>

    </li>


    <li class='nav-item'>
        <a class='nav-link <?=($cpage == 'addjob' || $cpage == 'editjob' || $cpage == 'jobview') ? 'active' : '' ?>'
            href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-3' aria-controls='submenu-3'><i
                class='fa fa-sticky-note'></i>Job
            Application</a>
        <div id='submenu-3'
            class='collapse submenu <?=($cpage == 'addjob' || $cpage == 'editjob' || $cpage == 'jobview') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addjob') ? 'active' : '' ?>' title='Job Application Addition'
                        href='<?=$domain ?>/HRM22/addjob.php'><i class='fa fa-plus'></i> Add</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'editjob') ? 'active' : '' ?>' title='Job Application Edit'
                        href='<?=$domain ?>/HRM22/editjob.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'jobview') ? 'active' : '' ?>' title='Job Application View'
                        href='<?=$domain ?>/HRM22/jobview.php'><i class='fa fa-eye'></i> View</a>
                </li>


            </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link <?=($cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'active' : '' ?>' href='#'
            data-toggle='collapse' aria-expanded='false' data-target='#submenu-9' aria-controls='submenu-9'><i
                class='fa fa-users'></i>Candidate</a>
        <div id='submenu-9'
            class='collapse submenu <?=($cpage == 'editcandidate' || $cpage == 'viewcandidate') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>
                <!-- <li class='nav-item'>
                                        <a class='nav-link <?=($cpage == 'addcandidate') ? 'active' : '' ?>'
                                            title='Candidate Addition' href='<?=$domain ?>/HRM09/Addcandidate.php'><i
                                                class='fa fa-plus'></i> Add</a>
                                    </li> -->
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'editcandidate') ? 'active' : '' ?>' title='Candidate Edit'
                        href='<?=$domain ?>/HRM09/Editcandidate.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'viewcandidate') ? 'active' : '' ?>' title='Candidate View'
                        href='<?=$domain ?>/HRM09/Viewcandidate.php'><i class='fa fa-eye'></i> View</a>
                </li>


            </ul>
        </div>
    </li>

    <li class='nav-item '>
        <a class='nav-link <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'active' : '' ?>' href='#'
            data-toggle='collapse' aria-expanded='false' data-target='#submenu-16' aria-controls='submenu-16'><i
                class='fa fa-list-ol'></i>Asset</a>
        <div id='submenu-16'
            class='collapse submenu  <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addasset') ? 'active' : '' ?>' title='Employee Addition'
                        href='<?=$domain ?>/HRM60/AddAsset.php'><i class='fa fa-plus'></i> Category</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addassetlist') ? 'active' : '' ?>' title='Employee Edit'
                        href='<?=$domain ?>/HRM61/AddAssetlist.php'><i class='fa fa-pencil-square-o'></i>
                        Asset List</a>
                </li>




            </ul>
        </div>
    </li>
    <li class='nav-item '>
        <a class='nav-link <?=($cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'active' : '' ?>'
            href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-4' aria-controls='submenu-4'><i
                class='fa fa-user'></i>Employee</a>
        <div id='submenu-4'
            class='collapse submenu <?=($cpage == 'editemployee' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'editemployee') ? 'active' : '' ?>' title='Employee Edit'
                        href='<?=$domain ?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'viewemployee') ? 'active' : '' ?>' title='Employee View'
                        href='<?=$domain ?>/HRM10/ViewEmployee.php'><i class='fa fa-eye'></i> View</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'employeedept') ? 'active' : '' ?>'
                        title='Employee Detail Departmentwise' href='<?=$domain ?>/HRM41/Employeedept.php'><i
                            class='fa fa-th-list'></i>
                        Departmentwise Employee Details</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'appresialpending') ? 'active' : '' ?>'
                        title='Appraisal Pending List' href='<?=$domain ?>/HRM10/Appresialpending.php'><i
                            class='fa fa-th-list'></i> Appraisal Pending List</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'backgroundverificationpending') ? 'active' : '' ?>'
                        title='Background Verification Pending List'
                        href='<?=$domain ?>/HRM10/BackgroundVerificationpending.php'><i class='fa fa-check'></i>
                        Background Verification</a>
                </li>


            </ul>
        </div>
    </li>


    <li class='nav-item '>
        <a class='nav-link <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'active' : '' ?>'
            href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-11'
            aria-controls='submenu-11'><i class='fa fa-user-times'></i>Employee Exit</a>
        <div id='submenu-11'
            class='collapse submenu  <?=($cpage == 'addemp' || $cpage == 'editexit' || $cpage == 'view') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addemp') ? 'active' : '' ?>' title='Employee Addition'
                        href='<?=$domain ?>/HRM27/AddEmp.php'><i class='fa fa-plus'></i> Add</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'editexit') ? 'active' : '' ?>' title='Employee Edit'
                        href='<?=$domain ?>/HRM27/editExit.php'><i class='fa fa-pencil-square-o'></i> Edit</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'view') ? 'active' : '' ?>' title='Employee View'
                        href='<?=$domain ?>/HRM27/View.php'><i class='fa fa-eye'></i> View</a>
                </li>



            </ul>
        </div>
    </li>




    <li class='nav-item'>
        <a class='nav-link <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_attendanceviewnew' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp') ? 'active' : '' ?>'
            href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-5' aria-controls='submenu-5'><i
                class='fa fa-balance-scale'></i>Payroll</a>
        <div id='submenu-5'
            class='collapse submenu <?=($cpage == 'adddailyattendance' || $cpage == 'employeedailyattandancerpt' || $cpage == 'addpayrolltemp' || $cpage == 'employeepayrolldeduction' || $cpage == 'empesidetails' || $cpage == 'emppayrolldeductionlist' || $cpage == 'payrollclose' || $cpage == 'payrollrpt' || $cpage == 'bankpayroll' || $cpage == 'categorywise_attendanceview' || $cpage == 'categorywise_payslip' || $cpage == 'attendance_details' || $cpage == 'adddailyattendancebgp' || $cpage == 'leaveattendancedetails' || $cpage == 'employeeleavesummaryupload' || $cpage == 'addpayrollbgp' || $cpage == 'payrollreportbgp') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>
                <?php if ($Clientid == 4)
    { ?>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'adddailyattendancebgp') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM16/AddDailyattendanceBGP.php'> Attendance
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'leaveattendancedetails') ? 'active' : '' ?>'
                        title='Attendance form' href='<?=$domain ?>/HRM14/LeaveAttendanceDetails.php'> </i>Form-12 &
                        25</a>

                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'employeeleavesummaryupload') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM39/Employeeleavesummaryupload.php'> Leave
                        Summary
                        Upload</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'monthlyattendanceclose') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM16/Monthlyattendanceclose.php'> Close
                        Attendance</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addpayrollbgp') ? 'active' : '' ?>' title='Payroll Temp'
                        href='<?=$domain ?>/HRM14/AddPayrollBGP.php'> Payroll
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'payrollreportbgp') ? 'active' : '' ?>' title='Payroll Temp'
                        href='<?=$domain ?>/HRM50/payrollreportbgp.php'>
                        Categorywise-Bulk Payslip
                    </a>
                </li>
                <?php
    }
    else
    { ?>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'adddailyattendance') ? 'active' : '' ?>' title='Daily Attendance'
                        href='<?=$domain ?>/HRM16/AddDailyattendance.php'>
                        Attendance</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'attendance_details') ? 'active' : '' ?>' title='Attendance form'
                        href='<?=$domain ?>/HRM14/attendance_details.php'>
                        Form-12 &
                        25</a>

                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'payrollclose') ? 'active' : '' ?>' title='Payslip'
                        href='<?=$domain ?>/HRM14/Payrollclose.php'> Payslip </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addpayrolltemp') ? 'active' : '' ?>' title='Payroll Temp'
                        href='<?=$domain ?>/HRM14/AddPayrolltemp.php'> Payroll
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'categorywise_payslip') ? 'active' : '' ?>'
                        title='Categorywise-Bulk Payslip' href='<?=$domain ?>/HRM14/Categorywise_payslip.php'>
                        Categorywise-Bulk Payslip </a>
                </li>

                <?php
    } ?>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'employeedailyattandancerpt') ? 'active' : '' ?>'
                        title='Daily Attendance' href='<?=$domain ?>/HRM37/EmployeeDailyattandancerpt.php'> Attendance
                        Report</a>
                </li>


                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'employeepayrolldeduction') ? 'active' : '' ?>'
                        title='Deduction Upload' href='<?=$domain ?>/HRM14/Employeepayrolldeduction.php'> Deduction
                        Upload
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'empesidetails') ? 'active' : '' ?>' title='Employee ESI Detail'
                        href='<?=$domain ?>/HRM14/Empesidetails.php'>
                        Employee ESI List </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'emppayrolldeductionlist') ? 'active' : '' ?>'
                        title='Deduction List' href='<?=$domain ?>/HRM14/Emppayrolldeductionlist.php'> Deduction List
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'payrollrpt') ? 'active' : '' ?>' title='Categorywise Payrol'
                        href='<?=$domain ?>/HRM14/PayrollRpt.php'>
                        Categorywise Payroll </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'bankpayroll') ? 'active' : '' ?>' title='Bank Report'
                        href='<?=$domain ?>/HRM14/Bankpayroll.php'> Bank Report
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'categorywise_attendanceview') ? 'active' : '' ?>'
                        title='Categorywise-Attendance details'
                        href='<?=$domain ?>/HRM14/Categorywise_attendanceview.php'>
                        Categorywise-Attendance details </a>
                </li>
    </li>


</ul>
</div>
</li>


<li class='nav-item'>
    <a class='nav-link <?=($cpage == 'adddocumentmaster' || $cpage == 'editdocumentmaster' || $cpage == 'viewdocumentmaster') ? 'active' : '' ?>'
        href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-6' aria-controls='submenu-6'><i
            class='fa fa-file-pdf-o'></i> Document
    </a>
    <div id='submenu-6'
        class='collapse submenu  <?=($cpage == 'adddocumentmaster' || $cpage == 'editdocumentmaster' || $cpage == 'viewdocumentmaster') ? 'show' : '' ?>'>
        <ul class='nav flex-column'>
            <li class='nav-item'>
                <a class='nav-link <?=($cpage == 'adddocumentmaster') ? 'active' : '' ?>'
                    href='<?=$domain ?>/HRM45/AddDocumentMaster.php'><i class='fa fa-plus'></i>Add
                    Document</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link <?=($cpage == 'viewdocumentmaster') ? 'active' : '' ?>'
                    href='<?=$domain ?>/HRM45/ViewDocumentMaster.php'><i class='fa fa-eye'></i>View
                    Document</a>
            </li>

        </ul>
    </div>
</li>



</li>
</div>
</ul>

<?php
}
elseif ($Authorizedno == 13)
{ ?>



<ul class='navbar-nav flex-column'>
    <li class='nav-divider'>
        Menu
    </li>
    <li class='nav-item '>
        <a class='nav-link animate-charcter <?=($cpage == 'dashboard') ? 'active' : '' ?>'
            href='<?=$domain ?>/dashboard.php'><i class='fa fa-calculator'></i>Dashboard</a>

    </li>
    <li class='nav-item '>
        <a class='nav-link <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'active' : '' ?>' href='#'
            data-toggle='collapse' aria-expanded='false' data-target='#submenu-16' aria-controls='submenu-16'><i
                class='fa fa-list-ol'></i>Asset</a>
        <div id='submenu-16'
            class='collapse submenu  <?=($cpage == 'addasset' || $cpage == 'addassetlist') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addasset') ? 'active' : '' ?>' title='Employee Addition'
                        href='<?=$domain ?>/HRM60/AddAsset.php'><i class='fa fa-plus'></i> Category</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'addassetlist') ? 'active' : '' ?>' title='Employee Edit'
                        href='<?=$domain ?>/HRM61/AddAssetlist.php'><i class='fa fa-pencil-square-o'></i>
                        Asset List</a>
                </li>




            </ul>
        </div>
    </li>

    <li class='nav-item '>
        <a class='nav-link <?=($cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'active' : '' ?>'
            href='#' data-toggle='collapse' aria-expanded='false' data-target='#submenu-4' aria-controls='submenu-4'><i
                class='fa fa-user'></i>Employee</a>
        <div id='submenu-4'
            class='collapse submenu <?=($cpage == 'editemployee' || $cpage == 'employeedept' || $cpage == 'viewemployee' || $cpage == 'appresialpending' || $cpage == 'backgroundverificationpending') ? 'show' : '' ?>'>
            <ul class='nav flex-column'>

                <li class='nav-item'>
                    <a class='nav-link <?=($cpage == 'editemployee') ? 'active' : '' ?>' title='Employee Edit'
                        href='<?=$domain ?>/HRM10/EditEmployee.php'><i class='fa fa-pencil-square-o'></i>
                        Edit</a>
                </li>





            </ul>
        </div>
    </li>






</ul>
<?php
} ?>



</div>
</ul>
</div>
</nav>
</div>
</div>