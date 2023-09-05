var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM11Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageDocumenttype = 1;
    $scope.pageSizeDocumenttype = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Documenttype = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.Documenttype = "";
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
                $scope.GetDocumenttypeList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetDocumenttypeList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetDocumenttypeList = $scope.DetailListTemp;
                $scope.Documenttype = "";

            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(Documenttype) {
        $scope.CheckingSession();

            $scope.Documenttype = Documenttype;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveDocumenttype = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Documenttype.php",
            data: { 'Documenttype': $scope.Documenttype, 'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    ////////////////////////////////////////////
    $scope.GetDocumenttype = function() {
        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Documenttype.php",
            data: { 'Documenttype': $scope.Documenttype, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetDocumenttypeList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Documenttype.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetDocumenttypeList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Documenttype.php",
            data: { 'Documenttype': $scope.Documenttype, 'Method': 'Delete' },
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
        url: "Documenttype.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetDocumenttypeList = response.data;
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
        url: "Documenttype.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
       
      
    });

});