var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM33Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageLocation = 1;
    $scope.pageSizeLocation = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.LocationName = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.LocationName = "";
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
                $scope.GetLocationList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetLocationList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetLocationList = $scope.DetailListTemp;
                $scope.LocationName = "";

            }



        }
        //////////////////////////////////
    $scope.SendDelete = function(LocationName) {


            $scope.LocationName = LocationName;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveLocation = function() {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Location.php",
            data: { 'LocationName': $scope.LocationName, 'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.GetLocation = function() {
        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Location.php",
            data: { 'LocationName': $scope.LocationName, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetLocationList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "Location.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetLocationList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Location.php",
            data: { 'LocationName': $scope.LocationName, 'Method': 'Delete' },
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
        url: "Location.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetLocationList = response.data;
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
        url: "Location.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
       
      
    });

});