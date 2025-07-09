<<<<<<< HEAD
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRMEXITAPIController', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";


    $scope.currentPageEmployee = 1;
    $scope.pageSizeEmployee = 5;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.currentPageHandover = 1;
    $scope.pageSizeHandover = 5;
    $scope.currentPageHandoveritem = 1;
    $scope.pageSizeHandoveritem = 5;



    $scope.Employeeid = "";
    $scope.Employeename = "";
    $scope.RequestDate = "";
    $scope.Exitstatus = "Initialized";
    $scope.ReleivingDate = "";
    $scope.Gender = "";
    $scope.Category = "";
    $scope.EmpDepartment = "";
    $scope.EmpDesignation = "";
    $scope.Contactno = "";
    $scope.Handoverid = "";
    $scope.Handovername = "";
    $scope.Approvalstatus = "Waiting";
    $scope.MeetingDate = "";
    $scope.Meetingtime = "";
    $scope.Emailid = "";
    $scope.Releivingreason = "";
    $scope.handoverDoc = "";
    $scope.Handoveritem = "";
    $scope.item_image = "";
    $scope.Qtyitem = "";
    $scope.Storeditem = "";
    $scope.Nameitem = "";
    $scope.HR_Approve = "";
    $scope.HR_Approve_date_time = "";
    $scope.HRinterviewnotes = "";
    $scope.description = "";
    $scope.btnHR = true;
    $scope.btnDH = true;
    $scope.btnGM = true;
    $scope.btnMD = true;
    $scope.ADMIN_Approve = "";
    $scope.HR_Approve = "";
    $scope.GM_Approve = "";
    $scope.DH_Approve = "";
    $scope.HRinterviewnotes = "";
    $scope.DHinterviewnotes = "";
    $scope.GMinterviewnotes = "";
    $scope.ADMINinterviewnotes = "";
    $scope.ADMIN_Approve_date_time = "";
    $scope.HR_Approve_date_time = "";
    $scope.GM_Approve_date_time = "";
    $scope.DH_Approve_date_time = "";
    $scope.btnupdate = false;
    $scope.btnHandover = false;
    $scope.btnitem = false;
    $scope.btnstatus = false;
    $scope.btnsave = true;
    $scope.currentPageEmployee = 1;
    $scope.pageSizeEmployee = 10;
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;

    ///////////////////////////////
    $scope.Reset = function() {
        $scope.Employeeid = "";
        $scope.Employeename = "";
        $scope.RequestDate = "";
        $scope.Exitstatus = "Initialized";
        $scope.ReleivingDate = "";
        $scope.Gender = "";
        $scope.Category = "";
        $scope.EmpDepartment = "";
        $scope.EmpDesignation = "";
        $scope.Contactno = "";
        $scope.Handoverid = "";
        $scope.Handovername = "";
        $scope.Approvalstatus = "Waiting";
        $scope.MeetingDate = "";
        $scope.Meetingtime = "";
        $scope.Emailid = "";
        $scope.Releivingreason = "";
        $scope.handoverDoc = "";
        $scope.item_image = "";
        $scope.Qtyitem = "";
        $scope.Storeditem = "";
        $scope.Nameitem = "";
        $scope.Handoveritem = "";
        $scope.description = "";
        $scope.ADMIN_Approve = "";
        $scope.HR_Approve = "";
        $scope.GM_Approve = "";
        $scope.DH_Approve = "";
        $scope.HRinterviewnotes = "";
        $scope.DHinterviewnotes = "";
        $scope.GMinterviewnotes = "";
        $scope.ADMINinterviewnotes = "";
        $scope.ADMIN_Approve_date_time = "";
        $scope.HR_Approve_date_time = "";
        $scope.GM_Approve_date_time = "";
        $scope.DH_Approve_date_time = "";
        $scope.EmployeeAccepted = "";
        $scope.Employeeofferaccepteddatetime = "";
        $scope.btnHR = true;
        $scope.btnDH = true;
        $scope.btnGM = true;
        $scope.btnMD = true;
        $scope.btnsave = true;
        $scope.btnupdate = false;
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = false;
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Releiving Reason") {
                $scope.Message = true;
                $scope.Message = "Please Enter Releiving Reason...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Thankyou") {


                $scope.Message = true;

                window.location.replace($scope.LoadUrl);
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "Meeting Date") {
                $scope.Message = true;
                $scope.Message = "Please Enter Meeting Date...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }


            if ($scope.TempMessage == "HR_Notes") {
                $scope.Message = true;
                $scope.Message = "Please Enter HR Notes...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }




            if ($scope.TempMessage == "DH_Notes") {
                $scope.Message = true;
                $scope.Message = "Please Enter DH Notes...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "GM_Notes") {
                $scope.Message = true;
                $scope.Message = "Please Enter GM Notes...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Meeting Time") {
                $scope.Message = true;
                $scope.Message = "Please Enter Meeting Time";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Hand Over Name") {
                $scope.Message = true;
                $scope.Message = "Please Select Handover to...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Request DATE") {
                $scope.Message = true;
                $scope.Message = "Please Select Request Date...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.btnsave = false;
                $scope.btnupdate = true;


            }
            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "description") {
                $scope.Message = true;
                $scope.Message = "Please Enter Description";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Handoveritem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Particular";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Qtyitem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Qtyitem";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Storeditem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Storeditem";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Nameitem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Nameitem";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.btnsave = false;
                $scope.btnupdate = true;

            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);



            }
            if ($scope.TempMessage == "Mail Sent") {
                $scope.Message = true;
                $scope.Message = "E-Mail Sent Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }




        }
        ////////////////////////////////////////////
    $scope.fnhandinfo = function() {
        $scope.btnHandover = true;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = false;

        $scope.ResetHandover();
    }


    $scope.fniteminfo = function() {
        $scope.btnHandover = false;
        $scope.btnitem = true;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.Resetitem();

    }


    $scope.fninterview_formatinfo = function() {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = true;
        // $scope.Resetitem();

    }

    $scope.fnno_dueinfo = function() {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btndue_form = true;
        // $scope.Resetitem();

    }
    $scope.fnno_statusinfo = function() {
            $scope.btnHandover = false;
            $scope.btnitem = false;
            $scope.btninterview_format = false;
            $scope.btnstatus = true;
            $scope.btndue_form = false;
            // $scope.Resetitem();

        }
        //////////////////////////////////////////////////
    $scope.Approvalbuttons = function() {
            $scope.btnHR = true;
            $scope.btnDH = true;
            $scope.btnGM = true;
            $scope.btnMD = true;
            $scope.btnEmployee = true;
            if ($scope.HR_Approve == "Pending") {
                $scope.btnHR = false;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployeeid = true;
            }
            if ($scope.HR_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = false;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployee = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = false;
                $scope.btnMD = true;
                $scope.btnEmployee = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = false;
                $scope.btnEmployee = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved" && $scope.ADMIN_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployee = false;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved" && $scope.ADMIN_Approve == "Approved" && $scope.EmployeeAccepted == "") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployee = true;
            }
        }
        ////////////////////////////////////////////////////////////


    $scope.SendEdit_Exitemp = function(Employeeid) {


        $scope.Employeeid = Employeeid;

        $('#myCarousel').carousel(1);

        $scope.FetcheditEmployee($scope.Employeeid);
    }

    //////////////////////////////////
    $scope.FetcheditEmployee = function(Employeeid) {
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetcheditEmp"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.EmpDepartment = response.data.EmpDepartment;
                $scope.EmpDesignation = response.data.EmpDesignation;
                $scope.ReleivingDate = response.data.ReleivingDate;
                $scope.RequestDate = response.data.RequestDate;
                $scope.Releivingreason = response.data.Releivingreason;
                $scope.HandoverID = response.data.HandoverID;
                $scope.Meetingtime = response.data.Meetingtime;
                $scope.Approvalstatus = response.data.Approvalstatus;
                $scope.HR_Approve = response.data.HR_Approve;
                $scope.DH_Approve = response.data.DH_Approve;
                $scope.GM_Approve = response.data.GM_Approve;
                $scope.ADMIN_Approve = response.data.ADMIN_Approve;
                $scope.HR_Approve_date_time = response.data.HR_Approve_date_time;
                $scope.DH_Approve_date_time = response.data.DH_Approve_date_time;
                $scope.GM_Approve_date_time = response.data.GM_Approve_date_time;
                $scope.ADMIN_Approve_date_time = response.data.ADMIN_Approve_date_time;
                $scope.HR_Notes = response.data.HR_Notes;
                $scope.GM_Notes = response.data.GM_Notes;
                $scope.DH_Notes = response.data.DH_Notes;
                $scope.ADMIN_Notes = response.data.ADMIN_Notes;
                $scope.MeetingDate2 = response.data.MeetingDate2;
                $scope.RequestDate2 = response.data.RequestDate2;
                $scope.ReleivingDate2 = response.data.ReleivingDate2;
                $scope.FetchEmployee($scope.Employeeid);
                $scope.FetchHandover($scope.HandoverID);
                // $scope.FetchAddress($scope.Employeeid);


            });


            $scope.DisplayEmpHandover();
            $scope.DisplayHanditem();

            $scope.ResetHandover();
            $scope.Resetitem();
            $scope.btnsave = true;

        }
        //////////////////////////////////////////

    $scope.Deactive = function() {
            $http({
                method: "post",
                url: "Exitemp.php",
                data: {
                    'Exitempid': $scope.Employeeid,
                    'Relievingrequestdate': $scope.RequestDate,
                    'RelievingDate': $scope.ReleivingDate,
                    'Handoverto': $scope.Handovername,
                    'Relievingreason': $scope.Releivingreason,

                    'Method': 'ExitDeactive'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
            });
        }
        //////////////////////////////////
    $scope.FetchEmployee = function(Employeeid) {

            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetchEmployee"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.Title = response.data.Title;
                $scope.Firstname = response.data.Firstname;
                $scope.Lastname = response.data.Lastname;
                $scope.Gender = response.data.Gender;
                $scope.Employeename = $scope.Title + $scope.Firstname + ' ' + $scope.Lastname;
                $scope.Married = response.data.Married;
                $scope.Mothertongue = response.data.Mothertongue;
                $scope.Contactno = response.data.Contactno;
                $scope.Category = response.data.Category;
                $scope.Emailid = response.data.Emailid;
                $scope.Dob = response.data.Dob;
                $scope.Dob2 = response.data.Dob2;
                $scope.Age = response.data.Age;
                $scope.Bloodgroup = response.data.Bloodgroup;
                $scope.Shift = response.data.Shift;
                $scope.AllowOT = response.data.AllowOT;
                $scope.AllowLOP = response.data.AllowLOP;
                $scope.Salary_Mode = response.data.Salary_Mode;
                $scope.Weekoff = response.data.Weekoff;
                $scope.Employee_CL = response.data.Employee_CL;
                $scope.Nationality = response.data.Nationality;
                $scope.Religion = response.data.Religion;
                $scope.Imagepath = response.data.Imagepath;
                $scope.Languages = response.data.Languages;
                $scope.Languagestest = response.data.Languages;
                $scope.selectedValue = response.data.Languages;
                $scope.UANno = response.data.UANno;
                $scope.ESIno = response.data.ESIno;
                $scope.Aadharno = response.data.Aadharno;
                $scope.Panno = response.data.Panno;
                $scope.PFJoiningdate = response.data.PFJoiningdate;
                $scope.ESIJoiningdate = response.data.ESIJoiningdate;
                $scope.Date_Of_Joing = response.data.Date_Of_Joing;
                $scope.Date_Of_Joing2 = response.data.Date_Of_Joing2;

                $scope.EmpDepartment = response.data.EmpDepartment;
                $scope.Highestqualification = response.data.Highestqualification;
                $scope.EmpDesignation = response.data.EmpDesignation;
                $scope.FatherGuardianSpouseName = response.data.FatherGuardianSpouseName;
                $scope.LastAppresialDate = response.data.LastAppresialDate;
                $scope.LastAppresialDate2 = response.data.LastAppresialDate2;
                $scope.BackgroundVerificationpath = response.data.BackgroundVerificationpath;
                $scope.BackgroundVerification = response.data.BackgroundVerification;
            });


            $scope.FetchAddress($scope.Employeeid);
            //  $scope.Fetchtime_reason($scope.Employeeid);
            $scope.Approvalbuttons();


        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveExit = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Employeename': $scope.Employeename,
                'RequestDate': $scope.RequestDate,
                'Exitstatus': $scope.Exitstatus,
                'ReleivingDate': $scope.ReleivingDate,
                'Department': $scope.EmpDepartment,
                'Designation': $scope.EmpDesignation,
                'Category': $scope.Category,
                'Handoverid': $scope.Handoverid,
                'Handovername': $scope.Handovername,
                'Approvalstatus': $scope.Approvalstatus,
                'MeetingDate': $scope.MeetingDate,
                'Meetingtime': $scope.Meetingtime,
                'Releivingreason': $scope.Releivingreason,

                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            //   $scope.Tempnextno = response.data.Nextno;




            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "Exitemp.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeList = response.data;
        });
    };
    ///////////////////////////////////////////////////
    $scope.Sendmail = function() {

            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {

                    'Employeeid': $scope.Employeeid,
                    'EmployeeName': $scope.EmployeeName,
                    'Department': $scope.EmpDepartment,
                    'Designation': $scope.EmpDesignation,
                    'RequestDate': $scope.RequestDate,
                    'ReleivingDate': $scope.ReleivingDate,
                    // 'Emailid': $scope.Emailid,

                    'Method': 'Emailsend'
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {

                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.TempMessage = response.data.Message;

                $scope.TempSave();
            });
        }
        ///////////////////////////////////////////////////////////////////
    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        //alert(response.data);

        $scope.GetEmployeeList = response.data;
    });
    //////////////////////////////////////

    $scope.FetchHandover = function(Employeeid) {

        $scope.Handoverid = Employeeid;
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Handoverid,
                'Method': "FetchHandover"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Title01 = response.data.Title;
            $scope.Firstname01 = response.data.Firstname;
            $scope.Lastname01 = response.data.Lastname;


            $scope.Handovername = $scope.Title01 + $scope.Firstname01 + ' ' + $scope.Lastname01;


        });




    }

    /////////////////////////////////////////////////
    $scope.Fetchtime_reason = function(Employeeid) {

            $scope.Handoverid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "Fetchtime_reason"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.Meetingtime = response.data.Meetingtime;
                $scope.Releivingreason = response.data.Releivingreason;
                // $scope.Lastname01 = response.data.Lastname;


                // $scope.Handovername = $scope.Title01 + $scope.Firstname01 + ' ' + $scope.Lastname01;


            });




        }
        /////////////////////////////////////////
    $scope.FetchAddress = function(Employeeid) {
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchAddress"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.CurrentAddress = response.data.CurrentAddress;
            $scope.CurrentCountry = response.data.CurrentCountry;
            $scope.CurrentState = response.data.CurrentState;
            $scope.CurrentCity = response.data.CurrentCity;
            $scope.CurrentPincode = response.data.CurrentPincode;




        });
    }

    ////////////////////////////////////////////////////////

    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        // alert(response.data);

        $scope.RequestDate = response.data;
        $scope.ReleivingDate = response.data;
        $scope.MeetingDate = response.data;
    });
    //////////////////////////////
    $scope.DeleteHandover = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.HandNextno,

                'Method': 'DeleteHandover'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.ResetHandover();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    //////////////////////////////////////////////////
    $scope.DeleteHandoveritem = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.HandoveritemNextno,

                'Method': 'DeleteHandoveritem'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Resetitem();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    //////////////////////////////////////////////////////////////

    $scope.Update_edit_employee = function() {
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Employeename': $scope.Employeename,
                'RequestDate': $scope.RequestDate,
                'Gender': $scope.Gender,
                'Handoverid': $scope.Handoverid,
                'Handovername': $scope.Handovername,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'EmployeeType': $scope.EmployeeType,
                'Department': $scope.EmpDepartment,
                'Designation': $scope.EmpDesignation,
                'MeetingDate': $scope.MeetingDate,
                'Meetingtime': $scope.Meetingtime,
                'Releivingreason': $scope.Releivingreason,


                'Method': 'Updateedit'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            // $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////
    $scope.EMPHANDNEXTno = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPHANDNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.HandNextno = response.data.Sno;

            });
        }
        ////////////////////////////////////////////////////
    $scope.EMPITEMNEXTno = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPITEMNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.HandoveritemNextno = response.data.Sno;

        });
    }


    //////////////////////////////////
    $scope.ResetHandover = function() {
        $scope.description = "";
        $scope.DisplayEmpHandover();
        $scope.EMPHANDNEXTno();


    }

    //////////////////////////////////
    $scope.Resetitem = function() {

            $scope.Handoveritem = "";
            $scope.Qtyitem = "";
            $scope.Storeditem = "";
            $scope.Nameitem = "";
            $scope.EMPITEMNEXTno();
            $scope.DisplayHanditem();
        }
        ///////////////////////////////////////////////
    $scope.DisplayEmpHandover = function() {



        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'HandoverEmpdisplay' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetHandoverList = response.data;


        });

    };
    ////////////////////////////////////////////////////////
    $scope.Update_Handoveremp = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HandNextno': $scope.HandNextno,
                'description': $scope.description,


                'Method': 'HANDOVEREMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;






        });
        $scope.TempSave();
        $scope.DisplayEmpHandover();
    };

    ///////////////////////////////////////////
    $scope.Update_handoveritem = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HandoveritemNextno': $scope.HandoveritemNextno,
                'Handoveritem': $scope.Handoveritem,
                'Qtyitem': $scope.Qtyitem,
                'Storeditem': $scope.Storeditem,
                'Nameitem': $scope.Nameitem,


                'Method': 'upload_item'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;




        });
        $scope.TempSave();
        $scope.DisplayHanditem();
    };

    /////////////////////////////////////////
    $scope.Fetchempdoc = function(Employeeid, Sno) {
            $scope.Employeeid = Employeeid;
            $scope.HandNextno = Sno;
            // $scope.description = description;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.HandNextno,
                    // 'description': $scope.description,
                    'Method': "Fetchempdoc"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.description = response.data.description;
                $scope.HandoverDocumentView = response.data.Handoverdocument;

            });
        }
        ////////////////////////////////////////////


    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'EXITALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        //alert(response.data);

        $scope.GetEmployeeList02 = response.data;
    });
    /////////////////////////////////////


    $(document).ready(function(e) {
        $('#filehandoverButton04').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('filehandoverInput04').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('filehandoverInput04').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("description", $("#description").val());
            form_data.append("HandNextno", $("#HandNextno").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoverdocument.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("filehandoverInput04").value = '';

                    $('#msg2').html(response);
                    setTimeout(function() {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.DisplayEmpHandover();
                    //    $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function(response) {
                    alert(response);
                    $('#msg2').html(response);
                    setTimeout(function() {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    //////////////////////////////////////////////////
    $scope.DisplayHanditem = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'Handitem' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetHandoveritemList = response.data;

        });

    };
    ///////////////////////////////////////////////////////////////
    $scope.Fetchitem = function(Employeeid, Sno) {
            $scope.Employeeid = Employeeid;
            $scope.HandoveritemNextno = Sno;

            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.HandoveritemNextno,
                    'Method': "Fetchitem"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Handoveritem = response.data.Handoveritem;
                $scope.Qtyitem = response.data.Qtyitem;
                $scope.Storeditem = response.data.Storeditem;
                $scope.Nameitem = response.data.Nameitem;
                $scope.HandoveritemView = response.data.Handoveritemimage;

            });
        }
        //////////////////////////////////////////////////////////
    $(document).ready(function(e) {
        $('#fileitemButton').on('click', function() {

            var form_data = new FormData();
            var ins = document.getElementById('fileitemInput').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileitemInput').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("HandoveritemNextno", $("#HandoveritemNextno").val());
            form_data.append("Handoveritem", $("#Handoveritem").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Storeditem", $("#Storeditem").val());
            form_data.append("Nameitem", $("#Nameitem").val());
            // form_data.append("Signitem", $("#Signitem").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoveritem.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileitemInput").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    $scope.DisplayHanditem();
                    // display success response from the PHP script
                },
                error: function(response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    ////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////
    $scope.SendMAILDH_Approve = function() {


            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,



                    'Method': 'SendMAILDH_Approve'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();



            });
        }
        ////////////////////////////////////////////////////////////
    $scope.SendMAILHR_Approve = function() {


            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,



                    'Method': 'SendMAILHR_Approve'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();



            });
        }
        //////////////////////////////////////////////////
    $scope.SendMAILGM_Approve = function() {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILGM_Approve'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }

    ////////////////////////////////////////////////////////
    $scope.SendMAILADMIN_Approve = function() {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Emailid': $scope.Emailid,




                'Method': 'SendMAILADMIN_Approve'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }

    ///////////////////////////////////////////////


    $http({



        method: "POST",
        url: "Allapi.php",
        data: { 'Method': 'POSTEMPID' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.Employeeid = response.data;
        $scope.FetcheditEmployee($scope.Employeeid);
        $scope.FetchSalary($scope.Employeeid);



    });

    //////////////////////////////////////////////////

    $http({



        method: "POST",
        url: "Allapi.php",
        data: { 'Method': 'POSTurl' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.LoadUrl = response.data;



    });
    /////////////////////////////////////

    $scope.FetchSalary = function(Employeeid) {
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetchSalary"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Basic = response.data.Basic;
                $scope.HR_Allowance = response.data.HR_Allowance;
                $scope.TA = response.data.TA;
                $scope.Performance_allowance = response.data.Performance_allowance;
                $scope.Day_allowance = response.data.Day_allowance;
                $scope.PF = response.data.PF;
                $scope.ESI = response.data.ESI;
                $scope.TDS = response.data.TDS;
                $scope.Professional_tax = response.data.Professional_tax;
                $scope.Net_Salary = response.data.Net_Salary;
                $scope.Gross_Salary = response.data.Gross_Salary;
                $scope.Other_Allowance = response.data.Other_Allowance;
                $scope.PF_Yesandno = response.data.PF_Yesandno;
                $scope.ESI_Yesandno = response.data.ESI_Yesandno;
             

            });
        }
        ////////////////////////////////////////////////

    $scope.UpdateHRApproved = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HR_Notes': $scope.HR_Notes,




                'Method': 'HRAPPROVED'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TYPE = response.data.TYPE;
            $scope.Category = response.data.Category;

            $scope.TempSave();
            $scope.HRAfterApprovedMail();



        });
    }


    $scope.HRAfterApprovedMail = function() {

            if ($scope.TYPE == "HR") {

                if ($scope.Category == "Category 1") {
                    $scope.SendMAILDH_Approve();

                } else {
                    $scope.SendMAILHR_Approve();
                }
            }
        }
        ////////////////////////////
    $scope.UpdatedHRRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'HR_Notes': $scope.HR_Notes,
                    'Method': 'HRREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        ////////////////////////////////////
    $scope.UpdateDHApproved = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'DH_Notes': $scope.DH_Notes,




                'Method': 'DHAPPROVED'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;


            $scope.TempSave();
            $scope.SendMAILDH_Approve();



        });
    }

    /////////////////////////////////////////////////

    $scope.UpdatedDHRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'DH_Notes': $scope.DH_Notes,
                    'Method': 'DHREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        ///////////////////////////////////////

    $scope.UpdateGMApproved = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'GM_Notes': $scope.GM_Notes,




                    'Method': 'GMAPPROVED'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TYPE = response.data.TYPE;
                $scope.Category = response.data.Category;

                $scope.TempSave();
                $scope.GMAfterApprovedMail();



            });
        }
        //////////////////////////////////////////

    $scope.GMAfterApprovedMail = function() {

            if ($scope.TYPE == "GM") {

                if ($scope.Category == "Category 3") {
                    $('#ModalAdminMail').modal('show');
                   // $scope.SendMAILADMIN_Approve();

                } else {
                    $scope.SendMAILGM_Approve();
                }
            }
        }
        ////////////////////////////////////////////
    $scope.UpdatedGMRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'GM_Notes': $scope.GM_Notes,
                    'Method': 'GMREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        //////////////////////////////////////////////////
    $scope.UpdateSuperUserApproved = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'ADMIN_Notes': $scope.ADMIN_Notes,




                    'Method': 'MDAPPROVED'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;


                $scope.TempSave();
             //   $scope.SendMAILADMIN_Approve();



            });
        }
        ////////////////////////////////////


    $scope.UpdatedSuperUserRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'ADMIN_Notes': $scope.ADMIN_Notes,
                    'Method': 'MDREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        /////////////////////////

=======
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRMEXITAPIController', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";


    $scope.currentPageEmployee = 1;
    $scope.pageSizeEmployee = 5;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.currentPageHandover = 1;
    $scope.pageSizeHandover = 5;
    $scope.currentPageHandoveritem = 1;
    $scope.pageSizeHandoveritem = 5;



    $scope.Employeeid = "";
    $scope.Employeename = "";
    $scope.RequestDate = "";
    $scope.Exitstatus = "Initialized";
    $scope.ReleivingDate = "";
    $scope.Gender = "";
    $scope.Category = "";
    $scope.EmpDepartment = "";
    $scope.EmpDesignation = "";
    $scope.Contactno = "";
    $scope.Handoverid = "";
    $scope.Handovername = "";
    $scope.Approvalstatus = "Waiting";
    $scope.MeetingDate = "";
    $scope.Meetingtime = "";
    $scope.Emailid = "";
    $scope.Releivingreason = "";
    $scope.handoverDoc = "";
    $scope.Handoveritem = "";
    $scope.item_image = "";
    $scope.Qtyitem = "";
    $scope.Storeditem = "";
    $scope.Nameitem = "";
    $scope.HR_Approve = "";
    $scope.HR_Approve_date_time = "";
    $scope.HRinterviewnotes = "";
    $scope.description = "";
    $scope.btnHR = true;
    $scope.btnDH = true;
    $scope.btnGM = true;
    $scope.btnMD = true;
    $scope.ADMIN_Approve = "";
    $scope.HR_Approve = "";
    $scope.GM_Approve = "";
    $scope.DH_Approve = "";
    $scope.HRinterviewnotes = "";
    $scope.DHinterviewnotes = "";
    $scope.GMinterviewnotes = "";
    $scope.ADMINinterviewnotes = "";
    $scope.ADMIN_Approve_date_time = "";
    $scope.HR_Approve_date_time = "";
    $scope.GM_Approve_date_time = "";
    $scope.DH_Approve_date_time = "";
    $scope.btnupdate = false;
    $scope.btnHandover = false;
    $scope.btnitem = false;
    $scope.btnstatus = false;
    $scope.btnsave = true;
    $scope.currentPageEmployee = 1;
    $scope.pageSizeEmployee = 10;
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;

    ///////////////////////////////
    $scope.Reset = function() {
        $scope.Employeeid = "";
        $scope.Employeename = "";
        $scope.RequestDate = "";
        $scope.Exitstatus = "Initialized";
        $scope.ReleivingDate = "";
        $scope.Gender = "";
        $scope.Category = "";
        $scope.EmpDepartment = "";
        $scope.EmpDesignation = "";
        $scope.Contactno = "";
        $scope.Handoverid = "";
        $scope.Handovername = "";
        $scope.Approvalstatus = "Waiting";
        $scope.MeetingDate = "";
        $scope.Meetingtime = "";
        $scope.Emailid = "";
        $scope.Releivingreason = "";
        $scope.handoverDoc = "";
        $scope.item_image = "";
        $scope.Qtyitem = "";
        $scope.Storeditem = "";
        $scope.Nameitem = "";
        $scope.Handoveritem = "";
        $scope.description = "";
        $scope.ADMIN_Approve = "";
        $scope.HR_Approve = "";
        $scope.GM_Approve = "";
        $scope.DH_Approve = "";
        $scope.HRinterviewnotes = "";
        $scope.DHinterviewnotes = "";
        $scope.GMinterviewnotes = "";
        $scope.ADMINinterviewnotes = "";
        $scope.ADMIN_Approve_date_time = "";
        $scope.HR_Approve_date_time = "";
        $scope.GM_Approve_date_time = "";
        $scope.DH_Approve_date_time = "";
        $scope.EmployeeAccepted = "";
        $scope.Employeeofferaccepteddatetime = "";
        $scope.btnHR = true;
        $scope.btnDH = true;
        $scope.btnGM = true;
        $scope.btnMD = true;
        $scope.btnsave = true;
        $scope.btnupdate = false;
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = false;
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Releiving Reason") {
                $scope.Message = true;
                $scope.Message = "Please Enter Releiving Reason...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Thankyou") {


                $scope.Message = true;

                window.location.replace($scope.LoadUrl);
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "Meeting Date") {
                $scope.Message = true;
                $scope.Message = "Please Enter Meeting Date...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }


            if ($scope.TempMessage == "HR_Notes") {
                $scope.Message = true;
                $scope.Message = "Please Enter HR Notes...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }




            if ($scope.TempMessage == "DH_Notes") {
                $scope.Message = true;
                $scope.Message = "Please Enter DH Notes...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "GM_Notes") {
                $scope.Message = true;
                $scope.Message = "Please Enter GM Notes...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Meeting Time") {
                $scope.Message = true;
                $scope.Message = "Please Enter Meeting Time";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Hand Over Name") {
                $scope.Message = true;
                $scope.Message = "Please Select Handover to...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Request DATE") {
                $scope.Message = true;
                $scope.Message = "Please Select Request Date...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.btnsave = false;
                $scope.btnupdate = true;


            }
            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "description") {
                $scope.Message = true;
                $scope.Message = "Please Enter Description";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Handoveritem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Particular";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Qtyitem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Qtyitem";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Storeditem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Storeditem";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Nameitem") {
                $scope.Message = true;
                $scope.Message = "Please Enter Nameitem";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.btnsave = false;
                $scope.btnupdate = true;

            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);



            }
            if ($scope.TempMessage == "Mail Sent") {
                $scope.Message = true;
                $scope.Message = "E-Mail Sent Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }




        }
        ////////////////////////////////////////////
    $scope.fnhandinfo = function() {
        $scope.btnHandover = true;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = false;

        $scope.ResetHandover();
    }


    $scope.fniteminfo = function() {
        $scope.btnHandover = false;
        $scope.btnitem = true;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.Resetitem();

    }


    $scope.fninterview_formatinfo = function() {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = true;
        // $scope.Resetitem();

    }

    $scope.fnno_dueinfo = function() {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btndue_form = true;
        // $scope.Resetitem();

    }
    $scope.fnno_statusinfo = function() {
            $scope.btnHandover = false;
            $scope.btnitem = false;
            $scope.btninterview_format = false;
            $scope.btnstatus = true;
            $scope.btndue_form = false;
            // $scope.Resetitem();

        }
        //////////////////////////////////////////////////
    $scope.Approvalbuttons = function() {
            $scope.btnHR = true;
            $scope.btnDH = true;
            $scope.btnGM = true;
            $scope.btnMD = true;
            $scope.btnEmployee = true;
            if ($scope.HR_Approve == "Pending") {
                $scope.btnHR = false;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployeeid = true;
            }
            if ($scope.HR_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = false;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployee = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = false;
                $scope.btnMD = true;
                $scope.btnEmployee = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = false;
                $scope.btnEmployee = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved" && $scope.ADMIN_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployee = false;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved" && $scope.ADMIN_Approve == "Approved" && $scope.EmployeeAccepted == "") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
                $scope.btnEmployee = true;
            }
        }
        ////////////////////////////////////////////////////////////


    $scope.SendEdit_Exitemp = function(Employeeid) {


        $scope.Employeeid = Employeeid;

        $('#myCarousel').carousel(1);

        $scope.FetcheditEmployee($scope.Employeeid);
    }

    //////////////////////////////////
    $scope.FetcheditEmployee = function(Employeeid) {
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetcheditEmp"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.EmpDepartment = response.data.EmpDepartment;
                $scope.EmpDesignation = response.data.EmpDesignation;
                $scope.ReleivingDate = response.data.ReleivingDate;
                $scope.RequestDate = response.data.RequestDate;
                $scope.Releivingreason = response.data.Releivingreason;
                $scope.HandoverID = response.data.HandoverID;
                $scope.Meetingtime = response.data.Meetingtime;
                $scope.Approvalstatus = response.data.Approvalstatus;
                $scope.HR_Approve = response.data.HR_Approve;
                $scope.DH_Approve = response.data.DH_Approve;
                $scope.GM_Approve = response.data.GM_Approve;
                $scope.ADMIN_Approve = response.data.ADMIN_Approve;
                $scope.HR_Approve_date_time = response.data.HR_Approve_date_time;
                $scope.DH_Approve_date_time = response.data.DH_Approve_date_time;
                $scope.GM_Approve_date_time = response.data.GM_Approve_date_time;
                $scope.ADMIN_Approve_date_time = response.data.ADMIN_Approve_date_time;
                $scope.HR_Notes = response.data.HR_Notes;
                $scope.GM_Notes = response.data.GM_Notes;
                $scope.DH_Notes = response.data.DH_Notes;
                $scope.ADMIN_Notes = response.data.ADMIN_Notes;
                $scope.MeetingDate2 = response.data.MeetingDate2;
                $scope.RequestDate2 = response.data.RequestDate2;
                $scope.ReleivingDate2 = response.data.ReleivingDate2;
                $scope.FetchEmployee($scope.Employeeid);
                $scope.FetchHandover($scope.HandoverID);
                // $scope.FetchAddress($scope.Employeeid);


            });


            $scope.DisplayEmpHandover();
            $scope.DisplayHanditem();

            $scope.ResetHandover();
            $scope.Resetitem();
            $scope.btnsave = true;

        }
        //////////////////////////////////////////

    $scope.Deactive = function() {
            $http({
                method: "post",
                url: "Exitemp.php",
                data: {
                    'Exitempid': $scope.Employeeid,
                    'Relievingrequestdate': $scope.RequestDate,
                    'RelievingDate': $scope.ReleivingDate,
                    'Handoverto': $scope.Handovername,
                    'Relievingreason': $scope.Releivingreason,

                    'Method': 'ExitDeactive'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
            });
        }
        //////////////////////////////////
    $scope.FetchEmployee = function(Employeeid) {

            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetchEmployee"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.Title = response.data.Title;
                $scope.Firstname = response.data.Firstname;
                $scope.Lastname = response.data.Lastname;
                $scope.Gender = response.data.Gender;
                $scope.Employeename = $scope.Title + $scope.Firstname + ' ' + $scope.Lastname;
                $scope.Married = response.data.Married;
                $scope.Mothertongue = response.data.Mothertongue;
                $scope.Contactno = response.data.Contactno;
                $scope.Category = response.data.Category;
                $scope.Emailid = response.data.Emailid;
                $scope.Dob = response.data.Dob;
                $scope.Dob2 = response.data.Dob2;
                $scope.Age = response.data.Age;
                $scope.Bloodgroup = response.data.Bloodgroup;
                $scope.Shift = response.data.Shift;
                $scope.AllowOT = response.data.AllowOT;
                $scope.AllowLOP = response.data.AllowLOP;
                $scope.Salary_Mode = response.data.Salary_Mode;
                $scope.Weekoff = response.data.Weekoff;
                $scope.Employee_CL = response.data.Employee_CL;
                $scope.Nationality = response.data.Nationality;
                $scope.Religion = response.data.Religion;
                $scope.Imagepath = response.data.Imagepath;
                $scope.Languages = response.data.Languages;
                $scope.Languagestest = response.data.Languages;
                $scope.selectedValue = response.data.Languages;
                $scope.UANno = response.data.UANno;
                $scope.ESIno = response.data.ESIno;
                $scope.Aadharno = response.data.Aadharno;
                $scope.Panno = response.data.Panno;
                $scope.PFJoiningdate = response.data.PFJoiningdate;
                $scope.ESIJoiningdate = response.data.ESIJoiningdate;
                $scope.Date_Of_Joing = response.data.Date_Of_Joing;
                $scope.Date_Of_Joing2 = response.data.Date_Of_Joing2;

                $scope.EmpDepartment = response.data.EmpDepartment;
                $scope.Highestqualification = response.data.Highestqualification;
                $scope.EmpDesignation = response.data.EmpDesignation;
                $scope.FatherGuardianSpouseName = response.data.FatherGuardianSpouseName;
                $scope.LastAppresialDate = response.data.LastAppresialDate;
                $scope.LastAppresialDate2 = response.data.LastAppresialDate2;
                $scope.BackgroundVerificationpath = response.data.BackgroundVerificationpath;
                $scope.BackgroundVerification = response.data.BackgroundVerification;
            });


            $scope.FetchAddress($scope.Employeeid);
            //  $scope.Fetchtime_reason($scope.Employeeid);
            $scope.Approvalbuttons();


        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveExit = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Employeename': $scope.Employeename,
                'RequestDate': $scope.RequestDate,
                'Exitstatus': $scope.Exitstatus,
                'ReleivingDate': $scope.ReleivingDate,
                'Department': $scope.EmpDepartment,
                'Designation': $scope.EmpDesignation,
                'Category': $scope.Category,
                'Handoverid': $scope.Handoverid,
                'Handovername': $scope.Handovername,
                'Approvalstatus': $scope.Approvalstatus,
                'MeetingDate': $scope.MeetingDate,
                'Meetingtime': $scope.Meetingtime,
                'Releivingreason': $scope.Releivingreason,

                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            //   $scope.Tempnextno = response.data.Nextno;




            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "Exitemp.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeList = response.data;
        });
    };
    ///////////////////////////////////////////////////
    $scope.Sendmail = function() {

            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {

                    'Employeeid': $scope.Employeeid,
                    'EmployeeName': $scope.EmployeeName,
                    'Department': $scope.EmpDepartment,
                    'Designation': $scope.EmpDesignation,
                    'RequestDate': $scope.RequestDate,
                    'ReleivingDate': $scope.ReleivingDate,
                    // 'Emailid': $scope.Emailid,

                    'Method': 'Emailsend'
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {

                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.TempMessage = response.data.Message;

                $scope.TempSave();
            });
        }
        ///////////////////////////////////////////////////////////////////
    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        //alert(response.data);

        $scope.GetEmployeeList = response.data;
    });
    //////////////////////////////////////

    $scope.FetchHandover = function(Employeeid) {

        $scope.Handoverid = Employeeid;
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Handoverid,
                'Method': "FetchHandover"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Title01 = response.data.Title;
            $scope.Firstname01 = response.data.Firstname;
            $scope.Lastname01 = response.data.Lastname;


            $scope.Handovername = $scope.Title01 + $scope.Firstname01 + ' ' + $scope.Lastname01;


        });




    }

    /////////////////////////////////////////////////
    $scope.Fetchtime_reason = function(Employeeid) {

            $scope.Handoverid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "Fetchtime_reason"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.Meetingtime = response.data.Meetingtime;
                $scope.Releivingreason = response.data.Releivingreason;
                // $scope.Lastname01 = response.data.Lastname;


                // $scope.Handovername = $scope.Title01 + $scope.Firstname01 + ' ' + $scope.Lastname01;


            });




        }
        /////////////////////////////////////////
    $scope.FetchAddress = function(Employeeid) {
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchAddress"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.CurrentAddress = response.data.CurrentAddress;
            $scope.CurrentCountry = response.data.CurrentCountry;
            $scope.CurrentState = response.data.CurrentState;
            $scope.CurrentCity = response.data.CurrentCity;
            $scope.CurrentPincode = response.data.CurrentPincode;




        });
    }

    ////////////////////////////////////////////////////////

    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        // alert(response.data);

        $scope.RequestDate = response.data;
        $scope.ReleivingDate = response.data;
        $scope.MeetingDate = response.data;
    });
    //////////////////////////////
    $scope.DeleteHandover = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.HandNextno,

                'Method': 'DeleteHandover'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.ResetHandover();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    //////////////////////////////////////////////////
    $scope.DeleteHandoveritem = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.HandoveritemNextno,

                'Method': 'DeleteHandoveritem'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Resetitem();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    //////////////////////////////////////////////////////////////

    $scope.Update_edit_employee = function() {
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Employeename': $scope.Employeename,
                'RequestDate': $scope.RequestDate,
                'Gender': $scope.Gender,
                'Handoverid': $scope.Handoverid,
                'Handovername': $scope.Handovername,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'EmployeeType': $scope.EmployeeType,
                'Department': $scope.EmpDepartment,
                'Designation': $scope.EmpDesignation,
                'MeetingDate': $scope.MeetingDate,
                'Meetingtime': $scope.Meetingtime,
                'Releivingreason': $scope.Releivingreason,


                'Method': 'Updateedit'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            // $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////
    $scope.EMPHANDNEXTno = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPHANDNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.HandNextno = response.data.Sno;

            });
        }
        ////////////////////////////////////////////////////
    $scope.EMPITEMNEXTno = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPITEMNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.HandoveritemNextno = response.data.Sno;

        });
    }


    //////////////////////////////////
    $scope.ResetHandover = function() {
        $scope.description = "";
        $scope.DisplayEmpHandover();
        $scope.EMPHANDNEXTno();


    }

    //////////////////////////////////
    $scope.Resetitem = function() {

            $scope.Handoveritem = "";
            $scope.Qtyitem = "";
            $scope.Storeditem = "";
            $scope.Nameitem = "";
            $scope.EMPITEMNEXTno();
            $scope.DisplayHanditem();
        }
        ///////////////////////////////////////////////
    $scope.DisplayEmpHandover = function() {



        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'HandoverEmpdisplay' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetHandoverList = response.data;


        });

    };
    ////////////////////////////////////////////////////////
    $scope.Update_Handoveremp = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HandNextno': $scope.HandNextno,
                'description': $scope.description,


                'Method': 'HANDOVEREMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;






        });
        $scope.TempSave();
        $scope.DisplayEmpHandover();
    };

    ///////////////////////////////////////////
    $scope.Update_handoveritem = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HandoveritemNextno': $scope.HandoveritemNextno,
                'Handoveritem': $scope.Handoveritem,
                'Qtyitem': $scope.Qtyitem,
                'Storeditem': $scope.Storeditem,
                'Nameitem': $scope.Nameitem,


                'Method': 'upload_item'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;




        });
        $scope.TempSave();
        $scope.DisplayHanditem();
    };

    /////////////////////////////////////////
    $scope.Fetchempdoc = function(Employeeid, Sno) {
            $scope.Employeeid = Employeeid;
            $scope.HandNextno = Sno;
            // $scope.description = description;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.HandNextno,
                    // 'description': $scope.description,
                    'Method': "Fetchempdoc"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.description = response.data.description;
                $scope.HandoverDocumentView = response.data.Handoverdocument;

            });
        }
        ////////////////////////////////////////////


    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'EXITALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        //alert(response.data);

        $scope.GetEmployeeList02 = response.data;
    });
    /////////////////////////////////////


    $(document).ready(function(e) {
        $('#filehandoverButton04').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('filehandoverInput04').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('filehandoverInput04').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("description", $("#description").val());
            form_data.append("HandNextno", $("#HandNextno").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoverdocument.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("filehandoverInput04").value = '';

                    $('#msg2').html(response);
                    setTimeout(function() {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.DisplayEmpHandover();
                    //    $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function(response) {
                    alert(response);
                    $('#msg2').html(response);
                    setTimeout(function() {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    //////////////////////////////////////////////////
    $scope.DisplayHanditem = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'Handitem' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetHandoveritemList = response.data;

        });

    };
    ///////////////////////////////////////////////////////////////
    $scope.Fetchitem = function(Employeeid, Sno) {
            $scope.Employeeid = Employeeid;
            $scope.HandoveritemNextno = Sno;

            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.HandoveritemNextno,
                    'Method': "Fetchitem"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Handoveritem = response.data.Handoveritem;
                $scope.Qtyitem = response.data.Qtyitem;
                $scope.Storeditem = response.data.Storeditem;
                $scope.Nameitem = response.data.Nameitem;
                $scope.HandoveritemView = response.data.Handoveritemimage;

            });
        }
        //////////////////////////////////////////////////////////
    $(document).ready(function(e) {
        $('#fileitemButton').on('click', function() {

            var form_data = new FormData();
            var ins = document.getElementById('fileitemInput').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileitemInput').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("HandoveritemNextno", $("#HandoveritemNextno").val());
            form_data.append("Handoveritem", $("#Handoveritem").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Storeditem", $("#Storeditem").val());
            form_data.append("Nameitem", $("#Nameitem").val());
            // form_data.append("Signitem", $("#Signitem").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoveritem.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileitemInput").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    $scope.DisplayHanditem();
                    // display success response from the PHP script
                },
                error: function(response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    ////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////
    $scope.SendMAILDH_Approve = function() {


            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,



                    'Method': 'SendMAILDH_Approve'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();



            });
        }
        ////////////////////////////////////////////////////////////
    $scope.SendMAILHR_Approve = function() {


            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,



                    'Method': 'SendMAILHR_Approve'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();



            });
        }
        //////////////////////////////////////////////////
    $scope.SendMAILGM_Approve = function() {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILGM_Approve'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }

    ////////////////////////////////////////////////////////
    $scope.SendMAILADMIN_Approve = function() {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Emailid': $scope.Emailid,




                'Method': 'SendMAILADMIN_Approve'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }

    ///////////////////////////////////////////////


    $http({



        method: "POST",
        url: "Allapi.php",
        data: { 'Method': 'POSTEMPID' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.Employeeid = response.data;
        $scope.FetcheditEmployee($scope.Employeeid);
        $scope.FetchSalary($scope.Employeeid);



    });

    //////////////////////////////////////////////////

    $http({



        method: "POST",
        url: "Allapi.php",
        data: { 'Method': 'POSTurl' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.LoadUrl = response.data;



    });
    /////////////////////////////////////

    $scope.FetchSalary = function(Employeeid) {
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetchSalary"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Basic = response.data.Basic;
                $scope.HR_Allowance = response.data.HR_Allowance;
                $scope.TA = response.data.TA;
                $scope.Performance_allowance = response.data.Performance_allowance;
                $scope.Day_allowance = response.data.Day_allowance;
                $scope.PF = response.data.PF;
                $scope.ESI = response.data.ESI;
                $scope.TDS = response.data.TDS;
                $scope.Professional_tax = response.data.Professional_tax;
                $scope.Net_Salary = response.data.Net_Salary;
                $scope.Gross_Salary = response.data.Gross_Salary;
                $scope.Other_Allowance = response.data.Other_Allowance;
                $scope.PF_Yesandno = response.data.PF_Yesandno;
                $scope.ESI_Yesandno = response.data.ESI_Yesandno;
             

            });
        }
        ////////////////////////////////////////////////

    $scope.UpdateHRApproved = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HR_Notes': $scope.HR_Notes,




                'Method': 'HRAPPROVED'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TYPE = response.data.TYPE;
            $scope.Category = response.data.Category;

            $scope.TempSave();
            $scope.HRAfterApprovedMail();



        });
    }


    $scope.HRAfterApprovedMail = function() {

            if ($scope.TYPE == "HR") {

                if ($scope.Category == "Category 1") {
                    $scope.SendMAILDH_Approve();

                } else {
                    $scope.SendMAILHR_Approve();
                }
            }
        }
        ////////////////////////////
    $scope.UpdatedHRRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'HR_Notes': $scope.HR_Notes,
                    'Method': 'HRREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        ////////////////////////////////////
    $scope.UpdateDHApproved = function() {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'DH_Notes': $scope.DH_Notes,




                'Method': 'DHAPPROVED'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;


            $scope.TempSave();
            $scope.SendMAILDH_Approve();



        });
    }

    /////////////////////////////////////////////////

    $scope.UpdatedDHRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'DH_Notes': $scope.DH_Notes,
                    'Method': 'DHREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        ///////////////////////////////////////

    $scope.UpdateGMApproved = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'GM_Notes': $scope.GM_Notes,




                    'Method': 'GMAPPROVED'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TYPE = response.data.TYPE;
                $scope.Category = response.data.Category;

                $scope.TempSave();
                $scope.GMAfterApprovedMail();



            });
        }
        //////////////////////////////////////////

    $scope.GMAfterApprovedMail = function() {

            if ($scope.TYPE == "GM") {

                if ($scope.Category == "Category 3") {
                    $('#ModalAdminMail').modal('show');
                   // $scope.SendMAILADMIN_Approve();

                } else {
                    $scope.SendMAILGM_Approve();
                }
            }
        }
        ////////////////////////////////////////////
    $scope.UpdatedGMRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'GM_Notes': $scope.GM_Notes,
                    'Method': 'GMREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        //////////////////////////////////////////////////
    $scope.UpdateSuperUserApproved = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'ADMIN_Notes': $scope.ADMIN_Notes,




                    'Method': 'MDAPPROVED'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;


                $scope.TempSave();
             //   $scope.SendMAILADMIN_Approve();



            });
        }
        ////////////////////////////////////


    $scope.UpdatedSuperUserRejected = function() {
            $http({



                method: "POST",
                url: "Exitemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'ADMIN_Notes': $scope.ADMIN_Notes,
                    'Method': 'MDREJECT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();




            });
        }
        /////////////////////////

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
});