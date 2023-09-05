var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM12Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageLanguages = 1;
    $scope.pageSizeLanguages = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Languages = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.Languages = "";
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
                $scope.GetLanguagesList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetLanguagesList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetLanguagesList = $scope.DetailListTemp;
                $scope.Languages = "";

            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(Languages) {

        $scope.CheckingSession();
            $scope.Languages = Languages;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveLanguages = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Languages.php",
            data: { 'Languages': $scope.Languages, 'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.GetLanguages = function() {
        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Languages.php",
            data: { 'Languages': $scope.Languages, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetLanguagesList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Languages.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetLanguagesList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Languages.php",
            data: { 'Languages': $scope.Languages, 'Method': 'Delete' },
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
        url: "Languages.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetLanguagesList = response.data;
    });
    ///////////////////////////////////////////////////////////////////
    $scope.CheckingSession = function()
    {
   
        $http({



            method: "POST",
            url: "../Sessionhandling/SessionChecking.php",
            data: {
               'PageSession' :$scope.PageSession,
               

                'Method': 'CurrentSession'
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

    $http({



        method: "POST",
        url: "Languages.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
       
      
    });

    /////////////////////////////
});