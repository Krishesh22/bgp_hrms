<<<<<<< HEAD
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM27Controller', function ($scope, $http, $timeout, $filter) {


    $scope.today = $filter("date")(Date.now(), 'yyyy-MM-dd');

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
    $scope.Approvalstatus = "Waiting";
    $scope.MeetingDate = "";
    $scope.Meetingtime = "";
    $scope.Emailid = "";
    $scope.Releivingreason = "";
    $scope.handoverDoc = "";
    $scope.Handoveritem = "";
    $scope.item_image = "";
    $scope.Qtyitem = "";
    $scope.Notes = "";
    $scope.StoredPlace = "";
    $scope.ConcernName = "";
    $scope.Handoverdate = "";
    $scope.Distributeddate = "";
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
    $scope.btnsettlement = false;
    $scope.btndue_form = false;
    $scope.btninterview_format = false;
    $scope.handoverreport_format = false;
    $scope.btnsave = true;
    $scope.currentPageEmployee = 1;
    $scope.pageSizeEmployee = 10;
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;

    ///////////////////////////////
    $scope.Reset = function () {
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
        $scope.Approvalstatus = "Waiting";
        $scope.MeetingDate = "";
        $scope.Meetingtime = "";
        $scope.Emailid = "";
        $scope.Releivingreason = "";
        $scope.handoverDoc = "";
        $scope.item_image = "";
        $scope.Qtyitem = "";
        $scope.Notes = "";
        $scope.StoredPlace = "";
        $scope.ConcernName = "";
        $scope.Handoverdate = "";
        $scope.Distributeddate = "";
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
        $scope.btnsettlement = false;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.handoverreport_format = false;
        $scope.GetHandoveritemList = "";
    }




    $scope.TempSave = function () {

        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Please Enter Detail";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Releiving Reason") {
            $scope.Message = true;
            $scope.Message = "Please Enter Releiving Reason...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Meeting Date") {
            $scope.Message = true;
            $scope.Message = "Please Enter Meeting Date...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Meeting Time") {
            $scope.Message = true;
            $scope.Message = "Please Enter Meeting Time";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Hand Over Name") {
            $scope.Message = true;
            $scope.Message = "Please Select Handover to...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Request DATE") {
            $scope.Message = true;
            $scope.Message = "Please Select Request Date...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Exists") {
            $scope.Message = true;
            $scope.Message = "Data Exists ...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.btnsave = false;
            $scope.btnupdate = true;


        }
        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Data Updated Sucessfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.btnsave = false;
            $scope.btnupdate = true;

        }
        if ($scope.TempMessage == "description") {
            $scope.Message = true;
            $scope.Message = "Please Enter Description";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Particulars") {
            $scope.Message = true;
            $scope.Message = "Please Enter Particular";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Qtyitem") {
            $scope.Message = true;
            $scope.Message = "Please Enter Qtyitem";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Handoverdate") {
            $scope.Message = true;
            $scope.Message = "Please Enter Handoverdate";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Notes") {
            $scope.Message = true;
            $scope.Message = "Please Enter Notes";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.btnsave = false;
            $scope.btnupdate = true;

        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully";
            $timeout(function () { $scope.Message = ""; }, 3000);



        }
        if ($scope.TempMessage == "Mail Sent") {
            $scope.Message = true;
            $scope.Message = "E-Mail Sent Successfully";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "Deactive") {
            $scope.Message = true;
            $scope.Message = "Data Deactive Sucessfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.GetEditList();
            $('#myCarousel').carousel(0);



        }

        if ($scope.TempMessage == "ReturnNo") {
            $scope.Message = true;
            $scope.Message = "Asset's Not Return kindly check it .... ";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "AssetClear") {
            $('#ModalCenter1').modal('show');
        }



    }
    ////////////////////////////////////////////
    $scope.fnhandinfo = function () {
        $scope.btnHandover = true;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = false;
        $scope.btnsettlement = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        $scope.btnpayroll_format = false;
        $scope.ResetHandover();
    }


    $scope.fniteminfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = true;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.btnpayroll_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        $scope.Resetitem();

    }


    $scope.fnitemreportinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.handoverreport_format = true;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.btnpayroll_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = false;



    }


    $scope.fninterview_formatinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = true;
        $scope.btnpayroll_format = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }

    $scope.fnno_dueinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btndue_form = true;
        $scope.btnpayroll_format = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }
    $scope.fnno_statusinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = true;
        $scope.btndue_form = false;
        $scope.btnpayroll_format = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }

    ///////////////////////////////////////////////
    $scope.fnno_settlementinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = true;
        $scope.btnpayroll_format = false;
        $scope.btndue_form = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }
    $scope.fnno_payrollinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = false;
        $scope.btnpayroll_format = true;
        $scope.btndue_form = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }
    //////////////////////////////////////////////////
    $scope.Approvalbuttons = function () {
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


    $scope.SendEdit_Exitemp = function (Employeeid) {


        $scope.Employeeid = Employeeid;

        $('#myCarousel').carousel(1);

        $scope.FetcheditEmployee($scope.Employeeid);
    }

    //////////////////////////////////
    $scope.FetcheditEmployee = function (Employeeid) {
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
            $scope.Exitstatus = response.data.ExitStatus;
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



        });


        $scope.DisplayEmpHandover();
        $scope.DisplayHanditem();

        $scope.ResetHandover();
        $scope.Resetitem();
        $scope.btnsave = true;

    }
    //////////////////////////////////////////

    $scope.Deactive = function () {
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
            $scope.GetEditList();

        });

    }
    //////////////////////////////////
    $scope.FetchEmployee = function (Employeeid) {

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
        $scope.FetchSettlement($scope.Employeeid);
        //  $scope.Fetchtime_reason($scope.Employeeid);
        $scope.Approvalbuttons();

        $scope.FetchSettlement($scope.Employeeid);
        $scope.FetchSalary($scope.Employeeid);

    }
    //////////////////////////////////////
    $scope.Getuncheck = function () {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveExit = function () {
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
    $scope.Getallvalues = function () {

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
    $scope.Sendmail = function () {

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

            $timeout(function () { $scope.Message = ""; }, 3000);
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

    $scope.FetchHandover = function (Employeeid) {

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
    $scope.Fetchtime_reason = function (Employeeid) {

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
    $scope.FetchAddress = function (Employeeid) {
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

    ///////////////////////////////////////////////////////


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
    $scope.DeleteHandover = function () {
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
    $scope.DeleteHandoveritem = function () {
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

    $scope.Update_edit_employee = function () {
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Employeename': $scope.Employeename,
                'RequestDate': $scope.RequestDate,
                'Exitstatus': $scope.Exitstatus,
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


            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////
    $scope.EMPHANDNEXTno = function () {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPHANDNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.HandNextno = response.data.Sno;
            $scope.Handoverdate = response.data.Handoverdate;

        });
    }
    ////////////////////////////////////////////////////
    $scope.EMPITEMNEXTno = function () {
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
    $scope.ResetHandover = function () {
        $scope.description = "";
        $scope.DisplayEmpHandover();
        $scope.EMPHANDNEXTno();


    }

    //////////////////////////////////
    $scope.Resetitem = function () {

        $scope.Handoveritem = "";
        $scope.Qtyitem = "";
        $scope.StoredPlace = "";
        $scope.ConcernName = "";
        $scope.Notes = "";
        $scope.Handoverdate = "";
        $scope.Distributeddate = "";
        $scope.EMPITEMNEXTno();
        $scope.DisplayHanditem();
    }


    $scope.Resetitemhandover = function () {

        $scope.HandoveritemNextno = "";
        $scope.Handoveritem = "";
        $scope.Qtyitem = "";
        $scope.Distributeddate = "";
        $scope.Handoverdate = "";
        $scope.Notes = "";
        $scope.StoredPlace = "";
        $scope.ConcernName = "";
        $scope.item_image = "";
        $scope.EMPITEMNEXTno();
        // $scope.DisplayHanditem();


    }
    ///////////////////////////////////////////////
    $scope.DisplayEmpHandover = function () {



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
    $scope.Update_Handoveremp = function () {
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
    $scope.Update_handoveritem = function () {
        $http({


            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HandoveritemNextno': $scope.HandoveritemNextno,
                'Handoveritem': $scope.Handoveritem,
                'Qtyitem': $scope.Qtyitem,
                'Distributeddate': $scope.Distributeddate,
                'Handoverdate': $scope.Handoverdate,
                'Notes': $scope.Notes,
                'StoredPlace': $scope.StoredPlace,
                'ConcernName': $scope.ConcernName,


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
    $scope.Fetchempdoc = function (Employeeid, Sno) {
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

    ///////////////////////////////////////////
    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'EDITALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        //alert(response.data);

        $scope.GetEmployeeListedit = response.data;
    });
    ////////////////////////////////////////////////

    $scope.GetEditList = function () {
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: { 'Method': 'EDITALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            //alert(response.data);

            $scope.GetEmployeeListedit = response.data;


        });

    }
    /////////////////////////////////////


    $(document).ready(function (e) {
        $('#filehandoverButton04').on('click', function () {
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
                success: function (response) {

                    alert(response);
                    document.getElementById("filehandoverInput04").value = '';

                    $('#msg2').html(response);
                    setTimeout(function () {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.DisplayEmpHandover();
                    //    $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg2').html(response);
                    setTimeout(function () {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    //////////////////////////////////////////////////
    $scope.DisplayHanditem = function () {
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
    $scope.Fetchitem = function (Employeeid, Sno) {
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

            // $scope.Handoveritem = response.data.Handoveritem;
            $scope.Qtyitem = response.data.Qtyitem;
            $scope.Handoveritem = response.data.Particulars;
            $scope.Distributeddate = response.data.Distributeddate;
            $scope.HandoveritemView = response.data.Propertychecklistitemimage;
            $scope.HandoveritemView2 = response.data.HandoverImage;
            $scope.Handoverdate = response.data.Handoverdate;
            $scope.Notes = response.data.Notes;
            $scope.StoredPlace = response.data.StoredPlace;
            $scope.ConcernName = response.data.ConcernName;

        });
    }
    //////////////////////////////////////////////////////////
    $(document).ready(function (e) {
        $('#fileitemButton').on('click', function () {

            var form_data = new FormData();
            var ins = document.getElementById('fileitemInput').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileitemInput').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("HandoveritemNextno", $("#HandoveritemNextno").val());
            form_data.append("Handoveritem", $("#Handoveritem").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Distributeddate", $("#Distributeddate").val());
            form_data.append("Handoverdate", $("#Handoverdate").val());
            form_data.append("Notes", $("#Notes").val());
            form_data.append("StoredPlace", $("#StoredPlace").val());
            form_data.append("ConcernName", $("#ConcernName").val());


            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoveritem.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileitemInput").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    $scope.DisplayHanditem();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    ////////////////////////////////////////////////////////////////////
    $(document).ready(function (e) {
        $('#fileitemButton2').on('click', function () {

            var form_data = new FormData();
            var ins = document.getElementById('fileitemInput2').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileitemInput2').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("HandoveritemNextno", $("#HandoveritemNextno").val());
            form_data.append("Handoveritem", $("#Handoveritem").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Distributeddate", $("#Distributeddate").val());
            form_data.append("Handoverdate", $("#Handoverdate").val());
            form_data.append("Notes", $("#Notes").val());
            form_data.append("StoredPlace", $("#StoredPlace").val());
            form_data.append("ConcernName", $("#ConcernName").val());


            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoveritem2.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileitemInput2").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    $scope.DisplayHanditem();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    //////////////////////////////////////////////////////////
    $scope.SendMAILDH_Approve = function () {


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

    ////////////////////////////////////////////////////////
    $scope.SendMAILDH_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILDH_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }
    ////////////////////////////////////////////////////////////
    $scope.SendMAILHR_Approve = function () {


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


    ////////////////////////////////////////////////////////////
    $scope.SendMAILHR_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILHR_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }
    //////////////////////////////////////////////////
    $scope.SendMAILGM_Approve = function () {


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

    ////////////////////////////////////////////////////
    $scope.SendMAILGM_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILGM_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }

    ////////////////////////////////////////////////////////
    $scope.SendMAILADMIN_Approve = function () {


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

    ////////////////////////////////////////////////
    $scope.SendMAILADMIN_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Emailid': $scope.Emailid,




                'Method': 'SendMAILADMIN_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }


    ///////////////////////////////////////////////
    $scope.FetchSalary = function (Employeeid) {
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
            $scope.BasicDay = response.data.BasicDay;
            // alert($scope.BasicDay);

        });
    }
    //////////////////////////////////////////////////
    $scope.FetchSettlement = function (Employeeid) {
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchSettlement"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Settlementdate = response.data.Settlementdate;
            //  $scope.BasicDay = response.data.BasicDay;
            $scope.BonusBasicDays = response.data.BonusBasicDays;
            $scope.BonusBasicAmounts = response.data.BonusBasicAmounts;
            $scope.CausalBasicDays = response.data.CausalBasicDays;
            $scope.CausalBasicAmounts = response.data.CausalBasicAmounts;
            $scope.GratuityBasicAmounts = response.data.GratuityBasicAmounts;
            $scope.Settlementtotal = response.data.Settlementtotal;
            $scope.TotalDays = response.data.TotalDays;
            $scope.GratuityBasicDays = 0;


        });
    }
    /////////////////////////////////////
    $scope.UpdateSettlementDetails = function () {

        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Settlementdate': $scope.Settlementdate,
                'BasicDay': $scope.BasicDay,
                'BonusBasicDays': $scope.BonusBasicDays,
                'BonusBasicAmounts': $scope.BonusBasicAmounts,
                'CausalBasicDays': $scope.CausalBasicDays,
                'CausalBasicAmounts': $scope.CausalBasicAmounts,
                'GratuityBasicAmounts': $scope.GratuityBasicAmounts,
                'Settlementtotal': $scope.Settlementtotal,
                'TotalDays': $scope.TotalDays,

                'Method': "UpdateSettlement"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();


        });
    }
    /////////////////////////////////////////////////
    $scope.CalculateEL = function () {

        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'ReleivingDate': $scope.ReleivingDate,
                'Date_Of_Joing': $scope.Date_Of_Joing,
                'Basic': $scope.Basic,
                'BasicDay': $scope.BasicDay,

                'Method': "CalculateEL"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.BonusBasicDays = response.data.BonusBasicDays;
            $scope.BonusBasicAmounts = response.data.BonusBasicAmounts;
            $scope.CausalBasicDays = response.data.CausalBasicDays;
            $scope.CausalBasicAmounts = response.data.CausalBasicAmounts;
            $scope.GratuityBasicAmounts = response.data.GratuityBasicAmounts;
            $scope.Settlementtotal = response.data.Settlementtotal;
            $scope.GratuityBasicDays = 0;
            $scope.TotalDays = response.data.TotalDays;
        });
    }

    ///////////////////////////////
    ///////////////////////////////
    $scope.currentPageEmpeXIT = 1;
    $scope.pageSizeEmpexit = 10;


    $scope.SendAssetPropert = function (Employeeid, Sno) {
        $scope.Employeeid = Employeeid;
        $scope.CheckitemSno = Sno;
        $scope.FetchPropertyChecklist(Employeeid, Sno);
        $('#ModalCenterAssetAdd').modal('show');

    }

    $scope.folder = {};
    $scope.returnfolder = {};
    $scope.selectedItems = [];
    $scope.returnselectedItems = [];

    // Function to toggle selection of an item
    $scope.toggleSelection = function (itemId) {
        var index = $scope.selectedItems.indexOf(itemId);
        if (index > -1) {
            $scope.selectedItems.splice(index, 1);
        } else {
            $scope.selectedItems.push(itemId);
        }
    };

    $scope.GetAssetReturn = function () {
        $scope.CheckingSession();
        $scope.getAllSelected();
        if ($scope.selectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.selectedItems, 'Method': 'AssetReturn' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;

                $scope.GetAssetAllocatePrintAuto($scope.Itemsnodetail, "Employee Asset Return");
                //  alert($scope.Itemsnodetail);


                $scope.GetReturnDetails();
                $scope.DisplayPropertyChecklist();
                $scope.DisplayAssetLog();
                $scope.folder = {};

            });
        }
    }

    $scope.GetAssetReallocation = function () {
        $scope.getreturnAllSelected();
        if ($scope.returnselectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.returnselectedItems, 'Method': 'AssetReallocation' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;
                $scope.GetAssetReturnPrintAuto($scope.Itemsnodetail);
                $scope.DisplayPropertyChecklist();
                $scope.GetReturnDetails();
                $scope.DisplayAssetLog();
                $scope.returnfolder = {};

            });
        }
    }


    $scope.GetReturnDetails = function () {
        $http({
            method: 'post',
            url: "../HRM10/Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'ReturnList' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.GetPropertyReturnList = response.data.mytbl;

        });
    }
    $scope.currentPageReturn = 1;
    $scope.pageSizeReturn = 10;
    $scope.getAllSelected = function () {

        $scope.selectedItems = [];


        angular.forEach($scope.folder, function (key, value) {
            if (key)
                $scope.selectedItems.push(value)
        });
    }

    $scope.getreturnAllSelected = function () {

        $scope.returnselectedItems = [];


        angular.forEach($scope.returnfolder, function (key, value) {
            if (key)
                $scope.returnselectedItems.push(value)
        });
    }
    $scope.currentPageprintasset = 1;
    $scope.pageSizeprintasset = 10;
    ///////////////
    $scope.GetAssetAllocatePrint = function () {
        $scope.getAllSelected();
        $scope.EmpAssetTittle = "Employee Asset Allocation";
        $scope.Assetmode = "Allocate";
        $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
        if ($scope.selectedItems.length === 0) {

            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.selectedItems,
                    'Testno': 1, 'Method': 'AssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }
    /////////////////////////////
    $scope.GetAssetReturnPrint = function () {
        $scope.getreturnAllSelected();
        $scope.EmpAssetTittle = "Employee Asset Return";
        $scope.Titlename = $scope.Employeeid + "-" + "Return";
        $scope.Assetmode = "Allocate";
        if ($scope.returnselectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.returnselectedItems,
                    'Testno': 1,
                    'Method': 'ReturnAssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }
    //////////////////////////////////////

    $(function () {
        $("#btnassetprint").click(function () {

            var HTML_Width = $("#pdfExportAssetprint").width();
            var HTML_Height = $("#pdfExportAssetprint").height();

            var filename = $scope.Titlename;
            var data = document.getElementById('pdfExportAssetprint');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {

                var contentWidth = canvas.width;
                var contentHeight = canvas.height;

                //One page pdf shows the canvas height generated by html pages.
                var pageHeight = contentWidth / 592.28 * 841.89;
                //html page height without pdf generation
                var leftHeight = contentHeight;
                //Page offset
                var position = 22;
                //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
                var imgWidth = 595.28;
                var imgHeight = 592.28 / contentWidth * contentHeight;
                var pageData = canvas.toDataURL('image/jpeg', 1.0);
                var pdf = new jsPDF('', 'pt', 'a4');

                //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
                //When the content does not exceed the range of pdf page display, there is no need to paginate
                if (leftHeight < pageHeight) {
                    pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
                        leftHeight -= pageHeight;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }


                var currentTime = new Date();

                // Format the current time as YYYYMMDDHHmmss
                var formattedTime = currentTime.getFullYear() +
                    ('0' + (currentTime.getMonth() + 1)).slice(-2) +
                    ('0' + currentTime.getDate()).slice(-2) +
                    ('0' + currentTime.getHours()).slice(-2) +
                    ('0' + currentTime.getMinutes()).slice(-2) +
                    ('0' + currentTime.getSeconds()).slice(-2);
                pdf.save(filename + "-" + formattedTime + '.pdf');



                // window.open(pdf.output('bloburl', {
                //     filename: 'new-file.pdf'
                // }), '_blank');
            });

        });
    });
    ///////////////////////////////
    $('#myDiv').hide();
    $('body').on('submit', "#Assuploaddocform", function (e) {
        e.preventDefault();

        var file = $('#assuploadfile').prop('files')[0];
        if (file == undefined) {

            $('#myDiv').show();
            $('#msgtst').text("Please Choose the file");
            setTimeout(function () {
                $('#msgtst').empty().append("");
                $('#myDiv').hide();
                // $scope.Messagenew = false;
            }, 3000);

            return;
        }




        $('#myDiv').show();
        $('#msgtst').text("Please wait file is processing.........");

        var form_data = new FormData(this);

        $.ajax({
            url: '../HRM10/UploadAssetDocument.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            dataType: 'json',
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (res) {
                // alert(res.status);
                $('#myDiv').show();
                if (res.status == 'success') {

                    $('#msgtst').text("File Upload Successfully.....");
                    $('#ModalCenterAssetUpload').modal('hide');

                    $("#Assuploaddocform")[0].reset();
                    $scope.DisplayAssetLog();

                }

                if (res.status == 'Note') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Enter the Notes");

                }

                if (res.status == 'NoFile') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Choose the file");

                }


                //alert(response);


                //  $scope.Messagenew = true;



                setTimeout(function () {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            },
            error: function (response) {
                $('#myDiv').show();
                $('#msg1').text("Error in processing.........");
                setTimeout(function () {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            }
        });
    });
    /////////////////////////////////////////
    $scope.Assetupload = function (Mode) {
        var Assettype = Mode;
        var Empid = $scope.Employeeid;
        $('#Empid').val(Empid);
        $('#Assettype').val(Assettype);

        $('#ModalCenterAssetUpload').modal('show');
    }

    $scope.DisplayAssetLog = function () {



        $http({



            method: "POST",
            url: "../HRM10/Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPASSETLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogList = response.data;


        });

    };
    ///////////////////////
    $scope.GetAssetDoc = function (Assetdocumentpath) {
        $scope.Assetdocumentpath = Assetdocumentpath;
        $('#ModalCenterAssetDocumentView').modal('show');

    }
    //////////////
    $scope.DisplayPropertyChecklist = function () {



        $http({



            method: "POST",
            url: "../HRM10/Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROPERTYCHECKLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetPropertyCheckList = response.data;


        });

    };
    //////////////////////////////////////////////

    $scope.getAllocateStyle = function () {
        return {
            color: 'Darkgreen',
            border: '1px solid green'
        };
    };

    $scope.getStyle = function () {
        return {
            color: 'red',
            border: '1px solid red'
        };
    };

    $scope.getAllocateStyleP = function () {
        return {
            color: 'Darkgreen',
            fontSize: '15px'


        };
    };

    $scope.getStyleP = function () {
        return {
            color: 'red',
            fontSize: '15px'

        };
    };
    $scope.CheckingSession = function () {

        $http({



            method: "POST",
            url: "../Sessionhandling/SessionChecking.php",
            data: {



                'Method': 'SessionCheck'
            },
            headers: { 'Content-Type': 'application/json' },


        }).then(function successCallback(response) {


            $scope.SessionMessage = response.data.Message;
            $scope.Sessionurl = response.data.Url;

            $scope.SessionSavedMessage();
        });
    }


    $scope.SessionSavedMessage = function () {
        if ($scope.SessionMessage == "SessionNo") {
            //  alert("Session Expired! Please Login Again...");

            window.location.replace($scope.Sessionurl);
            return;
        }
    }
    ///////////////
    $scope.currentPageProperty = 1;
    $scope.pageSizeProperty = 10;
    $scope.currentPageAssetlist = 1;
    $scope.pageSizeAssetlist = 10;




    $scope.GetAssetListlogdetails = function (Asselistid) {
        $scope.Asselistid = Asselistid;

        $http({
            method: "POST",
            url: "../HRM10/Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Assetlistids': $scope.Asselistid,
                'Method': 'EMPLOGLIST'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogvieeeList = response.data.mytbl;
        });

    }





    $scope.GetAssetAllocatePrintAuto = function (Listedno, Title) {

        $scope.testttt = Listedno;

        $scope.EmpAssetTittle = Title;
        $scope.Assetmode = "Allocate";
        $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
        if ($scope.testttt.length === 0) {

            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.testttt,
                    'Testno': 0,
                    'Method': 'AssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }

    //////////////////////

    $scope.GetAssetReturnPrintAuto = function (Listedno) {

        $scope.testttt = Listedno;
        $scope.EmpAssetTittle = "Employee Asset Return";
        $scope.Titlename = $scope.Employeeid + "-" + "Return";
        $scope.Assetmode = "Allocate";


        $http({
            method: 'post',
            url: "../HRM10/Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Listedno': $scope.testttt,
                'Testno': 0,
                'Method': 'ReturnAssetPrint'
            },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.GetPropertyPageAssetList = response.data.mytbl;
            $('#ModalCenter1AssetPrint').modal('show');
        });

    }
    /////////////////////////////////////////////

    $scope.DeactiveMessage = function () {
        $http({
            method: "post",
            url: "Exitemp.php",
            data: {
                'Exitempid': $scope.Employeeid,
                'Method': 'ExitAsset'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
        });

    }
    //////////////  
    $http({
        method: "POST",
        url: "../HRM22/job.php",
        data: { 'Method': 'Maritalstatus' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetMaritalstatusList = response.data;
    });
});


//////// set default date

=======
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM27Controller', function ($scope, $http, $timeout, $filter) {


    $scope.today = $filter("date")(Date.now(), 'yyyy-MM-dd');

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
    $scope.Approvalstatus = "Waiting";
    $scope.MeetingDate = "";
    $scope.Meetingtime = "";
    $scope.Emailid = "";
    $scope.Releivingreason = "";
    $scope.handoverDoc = "";
    $scope.Handoveritem = "";
    $scope.item_image = "";
    $scope.Qtyitem = "";
    $scope.Notes = "";
    $scope.StoredPlace = "";
    $scope.ConcernName = "";
    $scope.Handoverdate = "";
    $scope.Distributeddate = "";
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
    $scope.btnsettlement = false;
    $scope.btndue_form = false;
    $scope.btninterview_format = false;
    $scope.handoverreport_format = false;
    $scope.btnsave = true;
    $scope.currentPageEmployee = 1;
    $scope.pageSizeEmployee = 10;
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;

    ///////////////////////////////
    $scope.Reset = function () {
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
        $scope.Approvalstatus = "Waiting";
        $scope.MeetingDate = "";
        $scope.Meetingtime = "";
        $scope.Emailid = "";
        $scope.Releivingreason = "";
        $scope.handoverDoc = "";
        $scope.item_image = "";
        $scope.Qtyitem = "";
        $scope.Notes = "";
        $scope.StoredPlace = "";
        $scope.ConcernName = "";
        $scope.Handoverdate = "";
        $scope.Distributeddate = "";
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
        $scope.btnsettlement = false;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.handoverreport_format = false;
        $scope.GetHandoveritemList = "";
    }




    $scope.TempSave = function () {

        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Please Enter Detail";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Releiving Reason") {
            $scope.Message = true;
            $scope.Message = "Please Enter Releiving Reason...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Meeting Date") {
            $scope.Message = true;
            $scope.Message = "Please Enter Meeting Date...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Meeting Time") {
            $scope.Message = true;
            $scope.Message = "Please Enter Meeting Time";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Hand Over Name") {
            $scope.Message = true;
            $scope.Message = "Please Select Handover to...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Request DATE") {
            $scope.Message = true;
            $scope.Message = "Please Select Request Date...";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Exists") {
            $scope.Message = true;
            $scope.Message = "Data Exists ...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.btnsave = false;
            $scope.btnupdate = true;


        }
        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Data Updated Sucessfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.btnsave = false;
            $scope.btnupdate = true;

        }
        if ($scope.TempMessage == "description") {
            $scope.Message = true;
            $scope.Message = "Please Enter Description";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Particulars") {
            $scope.Message = true;
            $scope.Message = "Please Enter Particular";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Qtyitem") {
            $scope.Message = true;
            $scope.Message = "Please Enter Qtyitem";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Handoverdate") {
            $scope.Message = true;
            $scope.Message = "Please Enter Handoverdate";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Notes") {
            $scope.Message = true;
            $scope.Message = "Please Enter Notes";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.btnsave = false;
            $scope.btnupdate = true;

        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully";
            $timeout(function () { $scope.Message = ""; }, 3000);



        }
        if ($scope.TempMessage == "Mail Sent") {
            $scope.Message = true;
            $scope.Message = "E-Mail Sent Successfully";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "Deactive") {
            $scope.Message = true;
            $scope.Message = "Data Deactive Sucessfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.GetEditList();
            $('#myCarousel').carousel(0);



        }

        if ($scope.TempMessage == "ReturnNo") {
            $scope.Message = true;
            $scope.Message = "Asset's Not Return kindly check it .... ";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "AssetClear") {
            $('#ModalCenter1').modal('show');
        }



    }
    ////////////////////////////////////////////
    $scope.fnhandinfo = function () {
        $scope.btnHandover = true;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = false;
        $scope.btnsettlement = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        $scope.btnpayroll_format = false;
        $scope.ResetHandover();
    }


    $scope.fniteminfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = true;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.btnpayroll_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        $scope.Resetitem();

    }


    $scope.fnitemreportinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.handoverreport_format = true;
        $scope.btndue_form = false;
        $scope.btninterview_format = false;
        $scope.btnpayroll_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = false;



    }


    $scope.fninterview_formatinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btndue_form = false;
        $scope.btnstatus = false;
        $scope.btninterview_format = true;
        $scope.btnpayroll_format = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }

    $scope.fnno_dueinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btndue_form = true;
        $scope.btnpayroll_format = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }
    $scope.fnno_statusinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = true;
        $scope.btndue_form = false;
        $scope.btnpayroll_format = false;
        $scope.btnsettlement = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }

    ///////////////////////////////////////////////
    $scope.fnno_settlementinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = true;
        $scope.btnpayroll_format = false;
        $scope.btndue_form = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }
    $scope.fnno_payrollinfo = function () {
        $scope.btnHandover = false;
        $scope.btnitem = false;
        $scope.btninterview_format = false;
        $scope.btnstatus = false;
        $scope.btnsettlement = false;
        $scope.btnpayroll_format = true;
        $scope.btndue_form = false;
        $scope.handoverreport_format = false;
        // $scope.Resetitem();

    }
    //////////////////////////////////////////////////
    $scope.Approvalbuttons = function () {
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


    $scope.SendEdit_Exitemp = function (Employeeid) {


        $scope.Employeeid = Employeeid;

        $('#myCarousel').carousel(1);

        $scope.FetcheditEmployee($scope.Employeeid);
    }

    //////////////////////////////////
    $scope.FetcheditEmployee = function (Employeeid) {
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
            $scope.Exitstatus = response.data.ExitStatus;
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



        });


        $scope.DisplayEmpHandover();
        $scope.DisplayHanditem();

        $scope.ResetHandover();
        $scope.Resetitem();
        $scope.btnsave = true;

    }
    //////////////////////////////////////////

    $scope.Deactive = function () {
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
            $scope.GetEditList();

        });

    }
    //////////////////////////////////
    $scope.FetchEmployee = function (Employeeid) {

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
        $scope.FetchSettlement($scope.Employeeid);
        //  $scope.Fetchtime_reason($scope.Employeeid);
        $scope.Approvalbuttons();

        $scope.FetchSettlement($scope.Employeeid);
        $scope.FetchSalary($scope.Employeeid);

    }
    //////////////////////////////////////
    $scope.Getuncheck = function () {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveExit = function () {
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
    $scope.Getallvalues = function () {

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
    $scope.Sendmail = function () {

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

            $timeout(function () { $scope.Message = ""; }, 3000);
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

    $scope.FetchHandover = function (Employeeid) {

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
    $scope.Fetchtime_reason = function (Employeeid) {

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
    $scope.FetchAddress = function (Employeeid) {
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

    ///////////////////////////////////////////////////////


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
    $scope.DeleteHandover = function () {
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
    $scope.DeleteHandoveritem = function () {
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

    $scope.Update_edit_employee = function () {
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Employeename': $scope.Employeename,
                'RequestDate': $scope.RequestDate,
                'Exitstatus': $scope.Exitstatus,
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


            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////
    $scope.EMPHANDNEXTno = function () {
        $http({



            method: "POST",
            url: "Exitemp.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPHANDNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.HandNextno = response.data.Sno;
            $scope.Handoverdate = response.data.Handoverdate;

        });
    }
    ////////////////////////////////////////////////////
    $scope.EMPITEMNEXTno = function () {
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
    $scope.ResetHandover = function () {
        $scope.description = "";
        $scope.DisplayEmpHandover();
        $scope.EMPHANDNEXTno();


    }

    //////////////////////////////////
    $scope.Resetitem = function () {

        $scope.Handoveritem = "";
        $scope.Qtyitem = "";
        $scope.StoredPlace = "";
        $scope.ConcernName = "";
        $scope.Notes = "";
        $scope.Handoverdate = "";
        $scope.Distributeddate = "";
        $scope.EMPITEMNEXTno();
        $scope.DisplayHanditem();
    }


    $scope.Resetitemhandover = function () {

        $scope.HandoveritemNextno = "";
        $scope.Handoveritem = "";
        $scope.Qtyitem = "";
        $scope.Distributeddate = "";
        $scope.Handoverdate = "";
        $scope.Notes = "";
        $scope.StoredPlace = "";
        $scope.ConcernName = "";
        $scope.item_image = "";
        $scope.EMPITEMNEXTno();
        // $scope.DisplayHanditem();


    }
    ///////////////////////////////////////////////
    $scope.DisplayEmpHandover = function () {



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
    $scope.Update_Handoveremp = function () {
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
    $scope.Update_handoveritem = function () {
        $http({


            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'HandoveritemNextno': $scope.HandoveritemNextno,
                'Handoveritem': $scope.Handoveritem,
                'Qtyitem': $scope.Qtyitem,
                'Distributeddate': $scope.Distributeddate,
                'Handoverdate': $scope.Handoverdate,
                'Notes': $scope.Notes,
                'StoredPlace': $scope.StoredPlace,
                'ConcernName': $scope.ConcernName,


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
    $scope.Fetchempdoc = function (Employeeid, Sno) {
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

    ///////////////////////////////////////////
    $http({
        method: "POST",
        url: "Exitemp.php",
        data: { 'Method': 'EDITALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        //alert(response.data);

        $scope.GetEmployeeListedit = response.data;
    });
    ////////////////////////////////////////////////

    $scope.GetEditList = function () {
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: { 'Method': 'EDITALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            //alert(response.data);

            $scope.GetEmployeeListedit = response.data;


        });

    }
    /////////////////////////////////////


    $(document).ready(function (e) {
        $('#filehandoverButton04').on('click', function () {
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
                success: function (response) {

                    alert(response);
                    document.getElementById("filehandoverInput04").value = '';

                    $('#msg2').html(response);
                    setTimeout(function () {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.DisplayEmpHandover();
                    //    $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg2').html(response);
                    setTimeout(function () {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    //////////////////////////////////////////////////
    $scope.DisplayHanditem = function () {
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
    $scope.Fetchitem = function (Employeeid, Sno) {
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

            // $scope.Handoveritem = response.data.Handoveritem;
            $scope.Qtyitem = response.data.Qtyitem;
            $scope.Handoveritem = response.data.Particulars;
            $scope.Distributeddate = response.data.Distributeddate;
            $scope.HandoveritemView = response.data.Propertychecklistitemimage;
            $scope.HandoveritemView2 = response.data.HandoverImage;
            $scope.Handoverdate = response.data.Handoverdate;
            $scope.Notes = response.data.Notes;
            $scope.StoredPlace = response.data.StoredPlace;
            $scope.ConcernName = response.data.ConcernName;

        });
    }
    //////////////////////////////////////////////////////////
    $(document).ready(function (e) {
        $('#fileitemButton').on('click', function () {

            var form_data = new FormData();
            var ins = document.getElementById('fileitemInput').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileitemInput').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("HandoveritemNextno", $("#HandoveritemNextno").val());
            form_data.append("Handoveritem", $("#Handoveritem").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Distributeddate", $("#Distributeddate").val());
            form_data.append("Handoverdate", $("#Handoverdate").val());
            form_data.append("Notes", $("#Notes").val());
            form_data.append("StoredPlace", $("#StoredPlace").val());
            form_data.append("ConcernName", $("#ConcernName").val());


            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoveritem.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileitemInput").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    $scope.DisplayHanditem();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    ////////////////////////////////////////////////////////////////////
    $(document).ready(function (e) {
        $('#fileitemButton2').on('click', function () {

            var form_data = new FormData();
            var ins = document.getElementById('fileitemInput2').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileitemInput2').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("HandoveritemNextno", $("#HandoveritemNextno").val());
            form_data.append("Handoveritem", $("#Handoveritem").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Distributeddate", $("#Distributeddate").val());
            form_data.append("Handoverdate", $("#Handoverdate").val());
            form_data.append("Notes", $("#Notes").val());
            form_data.append("StoredPlace", $("#StoredPlace").val());
            form_data.append("ConcernName", $("#ConcernName").val());


            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'uploadhandoveritem2.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileitemInput2").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    $scope.DisplayHanditem();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    //////////////////////////////////////////////////////////
    $scope.SendMAILDH_Approve = function () {


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

    ////////////////////////////////////////////////////////
    $scope.SendMAILDH_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILDH_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }
    ////////////////////////////////////////////////////////////
    $scope.SendMAILHR_Approve = function () {


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


    ////////////////////////////////////////////////////////////
    $scope.SendMAILHR_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILHR_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }
    //////////////////////////////////////////////////
    $scope.SendMAILGM_Approve = function () {


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

    ////////////////////////////////////////////////////
    $scope.SendMAILGM_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,



                'Method': 'SendMAILGM_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }

    ////////////////////////////////////////////////////////
    $scope.SendMAILADMIN_Approve = function () {


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

    ////////////////////////////////////////////////
    $scope.SendMAILADMIN_Approve2 = function () {


        $http({



            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Emailid': $scope.Emailid,




                'Method': 'SendMAILADMIN_Approve2'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }


    ///////////////////////////////////////////////
    $scope.FetchSalary = function (Employeeid) {
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
            $scope.BasicDay = response.data.BasicDay;
            // alert($scope.BasicDay);

        });
    }
    //////////////////////////////////////////////////
    $scope.FetchSettlement = function (Employeeid) {
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchSettlement"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Settlementdate = response.data.Settlementdate;
            //  $scope.BasicDay = response.data.BasicDay;
            $scope.BonusBasicDays = response.data.BonusBasicDays;
            $scope.BonusBasicAmounts = response.data.BonusBasicAmounts;
            $scope.CausalBasicDays = response.data.CausalBasicDays;
            $scope.CausalBasicAmounts = response.data.CausalBasicAmounts;
            $scope.GratuityBasicAmounts = response.data.GratuityBasicAmounts;
            $scope.Settlementtotal = response.data.Settlementtotal;
            $scope.TotalDays = response.data.TotalDays;
            $scope.GratuityBasicDays = 0;


        });
    }
    /////////////////////////////////////
    $scope.UpdateSettlementDetails = function () {

        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Settlementdate': $scope.Settlementdate,
                'BasicDay': $scope.BasicDay,
                'BonusBasicDays': $scope.BonusBasicDays,
                'BonusBasicAmounts': $scope.BonusBasicAmounts,
                'CausalBasicDays': $scope.CausalBasicDays,
                'CausalBasicAmounts': $scope.CausalBasicAmounts,
                'GratuityBasicAmounts': $scope.GratuityBasicAmounts,
                'Settlementtotal': $scope.Settlementtotal,
                'TotalDays': $scope.TotalDays,

                'Method': "UpdateSettlement"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();


        });
    }
    /////////////////////////////////////////////////
    $scope.CalculateEL = function () {

        $http({
            method: "POST",
            url: "Exitemp.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'ReleivingDate': $scope.ReleivingDate,
                'Date_Of_Joing': $scope.Date_Of_Joing,
                'Basic': $scope.Basic,
                'BasicDay': $scope.BasicDay,

                'Method': "CalculateEL"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.BonusBasicDays = response.data.BonusBasicDays;
            $scope.BonusBasicAmounts = response.data.BonusBasicAmounts;
            $scope.CausalBasicDays = response.data.CausalBasicDays;
            $scope.CausalBasicAmounts = response.data.CausalBasicAmounts;
            $scope.GratuityBasicAmounts = response.data.GratuityBasicAmounts;
            $scope.Settlementtotal = response.data.Settlementtotal;
            $scope.GratuityBasicDays = 0;
            $scope.TotalDays = response.data.TotalDays;
        });
    }

    ///////////////////////////////
    ///////////////////////////////
    $scope.currentPageEmpeXIT = 1;
    $scope.pageSizeEmpexit = 10;


    $scope.SendAssetPropert = function (Employeeid, Sno) {
        $scope.Employeeid = Employeeid;
        $scope.CheckitemSno = Sno;
        $scope.FetchPropertyChecklist(Employeeid, Sno);
        $('#ModalCenterAssetAdd').modal('show');

    }

    $scope.folder = {};
    $scope.returnfolder = {};
    $scope.selectedItems = [];
    $scope.returnselectedItems = [];

    // Function to toggle selection of an item
    $scope.toggleSelection = function (itemId) {
        var index = $scope.selectedItems.indexOf(itemId);
        if (index > -1) {
            $scope.selectedItems.splice(index, 1);
        } else {
            $scope.selectedItems.push(itemId);
        }
    };

    $scope.GetAssetReturn = function () {
        $scope.CheckingSession();
        $scope.getAllSelected();
        if ($scope.selectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.selectedItems, 'Method': 'AssetReturn' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;

                $scope.GetAssetAllocatePrintAuto($scope.Itemsnodetail, "Employee Asset Return");
                //  alert($scope.Itemsnodetail);


                $scope.GetReturnDetails();
                $scope.DisplayPropertyChecklist();
                $scope.DisplayAssetLog();
                $scope.folder = {};

            });
        }
    }

    $scope.GetAssetReallocation = function () {
        $scope.getreturnAllSelected();
        if ($scope.returnselectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.returnselectedItems, 'Method': 'AssetReallocation' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;
                $scope.GetAssetReturnPrintAuto($scope.Itemsnodetail);
                $scope.DisplayPropertyChecklist();
                $scope.GetReturnDetails();
                $scope.DisplayAssetLog();
                $scope.returnfolder = {};

            });
        }
    }


    $scope.GetReturnDetails = function () {
        $http({
            method: 'post',
            url: "../HRM10/Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'ReturnList' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.GetPropertyReturnList = response.data.mytbl;

        });
    }
    $scope.currentPageReturn = 1;
    $scope.pageSizeReturn = 10;
    $scope.getAllSelected = function () {

        $scope.selectedItems = [];


        angular.forEach($scope.folder, function (key, value) {
            if (key)
                $scope.selectedItems.push(value)
        });
    }

    $scope.getreturnAllSelected = function () {

        $scope.returnselectedItems = [];


        angular.forEach($scope.returnfolder, function (key, value) {
            if (key)
                $scope.returnselectedItems.push(value)
        });
    }
    $scope.currentPageprintasset = 1;
    $scope.pageSizeprintasset = 10;
    ///////////////
    $scope.GetAssetAllocatePrint = function () {
        $scope.getAllSelected();
        $scope.EmpAssetTittle = "Employee Asset Allocation";
        $scope.Assetmode = "Allocate";
        $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
        if ($scope.selectedItems.length === 0) {

            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.selectedItems,
                    'Testno': 1, 'Method': 'AssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }
    /////////////////////////////
    $scope.GetAssetReturnPrint = function () {
        $scope.getreturnAllSelected();
        $scope.EmpAssetTittle = "Employee Asset Return";
        $scope.Titlename = $scope.Employeeid + "-" + "Return";
        $scope.Assetmode = "Allocate";
        if ($scope.returnselectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.returnselectedItems,
                    'Testno': 1,
                    'Method': 'ReturnAssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }
    //////////////////////////////////////

    $(function () {
        $("#btnassetprint").click(function () {

            var HTML_Width = $("#pdfExportAssetprint").width();
            var HTML_Height = $("#pdfExportAssetprint").height();

            var filename = $scope.Titlename;
            var data = document.getElementById('pdfExportAssetprint');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {

                var contentWidth = canvas.width;
                var contentHeight = canvas.height;

                //One page pdf shows the canvas height generated by html pages.
                var pageHeight = contentWidth / 592.28 * 841.89;
                //html page height without pdf generation
                var leftHeight = contentHeight;
                //Page offset
                var position = 22;
                //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
                var imgWidth = 595.28;
                var imgHeight = 592.28 / contentWidth * contentHeight;
                var pageData = canvas.toDataURL('image/jpeg', 1.0);
                var pdf = new jsPDF('', 'pt', 'a4');

                //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
                //When the content does not exceed the range of pdf page display, there is no need to paginate
                if (leftHeight < pageHeight) {
                    pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
                        leftHeight -= pageHeight;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }


                var currentTime = new Date();

                // Format the current time as YYYYMMDDHHmmss
                var formattedTime = currentTime.getFullYear() +
                    ('0' + (currentTime.getMonth() + 1)).slice(-2) +
                    ('0' + currentTime.getDate()).slice(-2) +
                    ('0' + currentTime.getHours()).slice(-2) +
                    ('0' + currentTime.getMinutes()).slice(-2) +
                    ('0' + currentTime.getSeconds()).slice(-2);
                pdf.save(filename + "-" + formattedTime + '.pdf');



                // window.open(pdf.output('bloburl', {
                //     filename: 'new-file.pdf'
                // }), '_blank');
            });

        });
    });
    ///////////////////////////////
    $('#myDiv').hide();
    $('body').on('submit', "#Assuploaddocform", function (e) {
        e.preventDefault();

        var file = $('#assuploadfile').prop('files')[0];
        if (file == undefined) {

            $('#myDiv').show();
            $('#msgtst').text("Please Choose the file");
            setTimeout(function () {
                $('#msgtst').empty().append("");
                $('#myDiv').hide();
                // $scope.Messagenew = false;
            }, 3000);

            return;
        }




        $('#myDiv').show();
        $('#msgtst').text("Please wait file is processing.........");

        var form_data = new FormData(this);

        $.ajax({
            url: '../HRM10/UploadAssetDocument.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            dataType: 'json',
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (res) {
                // alert(res.status);
                $('#myDiv').show();
                if (res.status == 'success') {

                    $('#msgtst').text("File Upload Successfully.....");
                    $('#ModalCenterAssetUpload').modal('hide');

                    $("#Assuploaddocform")[0].reset();
                    $scope.DisplayAssetLog();

                }

                if (res.status == 'Note') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Enter the Notes");

                }

                if (res.status == 'NoFile') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Choose the file");

                }


                //alert(response);


                //  $scope.Messagenew = true;



                setTimeout(function () {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            },
            error: function (response) {
                $('#myDiv').show();
                $('#msg1').text("Error in processing.........");
                setTimeout(function () {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            }
        });
    });
    /////////////////////////////////////////
    $scope.Assetupload = function (Mode) {
        var Assettype = Mode;
        var Empid = $scope.Employeeid;
        $('#Empid').val(Empid);
        $('#Assettype').val(Assettype);

        $('#ModalCenterAssetUpload').modal('show');
    }

    $scope.DisplayAssetLog = function () {



        $http({



            method: "POST",
            url: "../HRM10/Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPASSETLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogList = response.data;


        });

    };
    ///////////////////////
    $scope.GetAssetDoc = function (Assetdocumentpath) {
        $scope.Assetdocumentpath = Assetdocumentpath;
        $('#ModalCenterAssetDocumentView').modal('show');

    }
    //////////////
    $scope.DisplayPropertyChecklist = function () {



        $http({



            method: "POST",
            url: "../HRM10/Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROPERTYCHECKLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetPropertyCheckList = response.data;


        });

    };
    //////////////////////////////////////////////

    $scope.getAllocateStyle = function () {
        return {
            color: 'Darkgreen',
            border: '1px solid green'
        };
    };

    $scope.getStyle = function () {
        return {
            color: 'red',
            border: '1px solid red'
        };
    };

    $scope.getAllocateStyleP = function () {
        return {
            color: 'Darkgreen',
            fontSize: '15px'


        };
    };

    $scope.getStyleP = function () {
        return {
            color: 'red',
            fontSize: '15px'

        };
    };
    $scope.CheckingSession = function () {

        $http({



            method: "POST",
            url: "../Sessionhandling/SessionChecking.php",
            data: {



                'Method': 'SessionCheck'
            },
            headers: { 'Content-Type': 'application/json' },


        }).then(function successCallback(response) {


            $scope.SessionMessage = response.data.Message;
            $scope.Sessionurl = response.data.Url;

            $scope.SessionSavedMessage();
        });
    }


    $scope.SessionSavedMessage = function () {
        if ($scope.SessionMessage == "SessionNo") {
            //  alert("Session Expired! Please Login Again...");

            window.location.replace($scope.Sessionurl);
            return;
        }
    }
    ///////////////
    $scope.currentPageProperty = 1;
    $scope.pageSizeProperty = 10;
    $scope.currentPageAssetlist = 1;
    $scope.pageSizeAssetlist = 10;




    $scope.GetAssetListlogdetails = function (Asselistid) {
        $scope.Asselistid = Asselistid;

        $http({
            method: "POST",
            url: "../HRM10/Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Assetlistids': $scope.Asselistid,
                'Method': 'EMPLOGLIST'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogvieeeList = response.data.mytbl;
        });

    }





    $scope.GetAssetAllocatePrintAuto = function (Listedno, Title) {

        $scope.testttt = Listedno;

        $scope.EmpAssetTittle = Title;
        $scope.Assetmode = "Allocate";
        $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
        if ($scope.testttt.length === 0) {

            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "../HRM10/Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.testttt,
                    'Testno': 0,
                    'Method': 'AssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }

    //////////////////////

    $scope.GetAssetReturnPrintAuto = function (Listedno) {

        $scope.testttt = Listedno;
        $scope.EmpAssetTittle = "Employee Asset Return";
        $scope.Titlename = $scope.Employeeid + "-" + "Return";
        $scope.Assetmode = "Allocate";


        $http({
            method: 'post',
            url: "../HRM10/Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Listedno': $scope.testttt,
                'Testno': 0,
                'Method': 'ReturnAssetPrint'
            },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.GetPropertyPageAssetList = response.data.mytbl;
            $('#ModalCenter1AssetPrint').modal('show');
        });

    }
    /////////////////////////////////////////////

    $scope.DeactiveMessage = function () {
        $http({
            method: "post",
            url: "Exitemp.php",
            data: {
                'Exitempid': $scope.Employeeid,
                'Method': 'ExitAsset'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
        });

    }
    //////////////  
    $http({
        method: "POST",
        url: "../HRM22/job.php",
        data: { 'Method': 'Maritalstatus' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetMaritalstatusList = response.data;
    });
});


//////// set default date

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
