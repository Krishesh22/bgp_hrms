<<<<<<< HEAD
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM52Controller', function($scope, $http, $timeout) {

    $scope.Method = "";
    $scope.GetMembertypeList = [];
    $scope.currentPageEducationMode = 1;
    $scope.pageSizeEducationMode = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.EducationMode = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.EducationMode = "";
        $scope.Getallvalues();
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "This Data Already Exists";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetEducationModeList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetEducationModeList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetEducationModeList = $scope.DetailListTemp;
                $scope.EducationMode = "";

            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(EducationMode) {


            $scope.EducationMode = EducationMode;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveEducationMode = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "educationmode.php",
            data: { 'EducationMode': $scope.EducationMode, 'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.DetailListTemp = response.data.mytbl;
            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.GetEducationMode = function() {

        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "educationmode.php",
            data: { 'EducationMode': $scope.EducationMode, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.GetEducationModeList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "educationmode.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEducationModeList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "educationmode.php",
            data: { 'EducationMode': $scope.EducationMode, 'Method': 'Delete' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.DetailListTemp = response.data.mytbl;

            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////////////////

    $http({
        method: "POST",
        url: "educationmode.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetEducationModeList = response.data;
        $scope.CheckingSession();
    });
    ///////////////////////////////////////////////////////////////////
    
    $scope.CheckingSession = function()
    {
   
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


    $scope.SessionSavedMessage = function()
    {
        if ($scope.SessionMessage == "SessionNo") {
          //  alert("Session Expired! Please Login Again...");
           
            window.location.replace($scope.Sessionurl);
            return;
        }
    }
    /////////////////////////////////
=======
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM52Controller', function($scope, $http, $timeout) {

    $scope.Method = "";
    $scope.GetMembertypeList = [];
    $scope.currentPageEducationMode = 1;
    $scope.pageSizeEducationMode = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.EducationMode = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.EducationMode = "";
        $scope.Getallvalues();
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "This Data Already Exists";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetEducationModeList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetEducationModeList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetEducationModeList = $scope.DetailListTemp;
                $scope.EducationMode = "";

            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(EducationMode) {


            $scope.EducationMode = EducationMode;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveEducationMode = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "educationmode.php",
            data: { 'EducationMode': $scope.EducationMode, 'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.DetailListTemp = response.data.mytbl;
            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.GetEducationMode = function() {

        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "educationmode.php",
            data: { 'EducationMode': $scope.EducationMode, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.GetEducationModeList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "educationmode.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEducationModeList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "educationmode.php",
            data: { 'EducationMode': $scope.EducationMode, 'Method': 'Delete' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.DetailListTemp = response.data.mytbl;

            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////////////////

    $http({
        method: "POST",
        url: "educationmode.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetEducationModeList = response.data;
        $scope.CheckingSession();
    });
    ///////////////////////////////////////////////////////////////////
    
    $scope.CheckingSession = function()
    {
   
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


    $scope.SessionSavedMessage = function()
    {
        if ($scope.SessionMessage == "SessionNo") {
          //  alert("Session Expired! Please Login Again...");
           
            window.location.replace($scope.Sessionurl);
            return;
        }
    }
    /////////////////////////////////
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
});