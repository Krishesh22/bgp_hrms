var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM37Controller', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";


    $scope.currentPageEmpAttendance = 1;
    $scope.pageSizeEmpAttendance = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";

    $scope.NoofPresents = 0;
    $scope.NoofAbsents = 0;
    $scope.NoofLeaves = 0;
    $scope.Permissions = 0;
    $scope.Atendancestatus = "Open";
    $scope.btnOpen = true;
    $scope.btnClose = false;
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    /////////////////////////////////////////

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }


            if ($scope.TempMessage == "Status") {
                $scope.Message = true;
                $scope.Message = "Please Select Status...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Attendence") {
                $scope.Message = true;
                $scope.Message = "Please Check the Attendence  ...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);



            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }



            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
        }
        //////////////////////////////////////////////////////////////

    /////////////////////////////////////////



    /////////////////////////////////////
    $http({



        method: "POST",
        url: "Empattrpt.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.FromDate = response.data.date;

        $scope.ToDate = response.data.date;


    });



    $scope.GetAttendanceDate = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Empattrpt.php",
            data: {
                'FromDate': $scope.FromDate,
                'ToDate': $scope.ToDate,
                'Employeeid': $scope.Employeeid,
                'Method': 'DISPATT'
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEmpDailyAttendanceList = response.data;



        });


    }



    $scope.CheckingSession = function() {

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

    $scope.SessionSavedMessage = function() {
            if ($scope.SessionMessage == "SessionNo") {
                //  alert("Session Expired! Please Login Again...");

                window.location.replace($scope.Sessionurl);
                return;
            }
        }
        //////////////////////////////
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

    $scope.SendEdit02 = function(Employeeid) {
        $scope.Employeeid = Employeeid;


        $http({



            method: "POST",
            url: "Empattrpt.php",
            data: {
                'Employeeid': $scope.Employeeid,


                'Method': 'FetchEmployee'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.Employeename = response.data.Fullname;
            $scope.GetAttendanceDate();




        });



    };

    ////////////////////////////////////////
    $http({
        method: "POST",
        url: "Empattrpt.php",
        data: {

            'Method': 'EMPL01'
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetEmployeeList = response.data;



    });

    ///////////////////////////////////////////




});