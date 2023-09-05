var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM05Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

   
    $scope.currentPageShift = 1;
    $scope.pageSizeShift = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Shift = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.Shift = "";
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
                $scope.GetShiftList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetShiftList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetShiftList = $scope.DetailListTemp;
                $scope.Shift = "";

            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(Shift) {
        $scope.CheckingSession();

            $scope.Shift = Shift;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveShift = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Shift.php",
            data: { 'Shift': $scope.Shift, 'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.GetShift = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Shift.php",
            data: { 'Shift': $scope.Shift, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetShiftList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Shift.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetShiftList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Shift.php",
            data: { 'Shift': $scope.Shift, 'Method': 'Delete' },
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
        url: "Shift.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetShiftList = response.data;
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
        url: "Shift.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
       
      
    });

    ///////////////////
});