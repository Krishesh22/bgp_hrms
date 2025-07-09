var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM04Controller', function($scope, $http, $timeout) {

    $scope.Method = "";


    $scope.currentPageDesignation = 1;
    $scope.pageSizeDesignation = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Designation = "";
    $scope.Enableresthours = "No";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();

        $scope.Enableresthours = "No";
        $scope.Designation = "";
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
                $scope.GetDesignationList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetDesignationList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetDesignationList = $scope.DetailListTemp;
                $scope.Designation = "";

            }

            if ($scope.TempMessage == "Error") {
                $scope.Message = true;
                $scope.Message = "Error In Updating...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                // $scope.GetDesignationList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetDesignationList = $scope.DetailListTemp;
            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(Designation, Enableresthours) {


            $scope.Designation = Designation;
            //alert(Enableresthours);
            $scope.Enableresthours = Enableresthours;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveDesignation = function() {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Designation.php",
            data: {
                'Designation': $scope.Designation,
                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.GetDesignation = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Designation.php",
            data: { 'Designation': $scope.Designation, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetDesignationList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "Designation.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetDesignationList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Designation.php",
            data: { 'Designation': $scope.Designation, 'Method': 'Delete' },
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
        url: "Designation.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetDesignationList = response.data;
    });
    ///////////////////////////////////////////////////////////////////
    $scope.UpdateResthours = function() {
        $http({



            method: "POST",
            url: "Designation.php",
            data: {
                'Designation': $scope.Designation,
                'Enableresthours': $scope.Enableresthours,
                'Method': 'UpdateRest'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    
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
        url: "Designation.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
       
      
    });
});