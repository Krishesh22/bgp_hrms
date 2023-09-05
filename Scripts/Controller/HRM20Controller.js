var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM20Controller', function($scope, $http, $timeout, $filter) {

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
    /////////////////////////////////////////

 
        //////////////////////////////////////////////////////////////

    /////////////////////////////////////////



    /////////////////////////////////////
    $http({



        method: "POST",
        url: "absent.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.AttendanceDate = response.data.date;
     //   $scope.TestingMessage = response.data.Message;

     $scope.GetAttendanceDate();
    });


   
    $scope.GetAttendanceDate = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "absent.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Method': 'DISPATT'
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEmpDailyAttendanceList = response.data;
        
          //  $scope.FetchMaster();

        });


    }




    /////////////////////////////////
    $scope.GetRefresh = function() {
        $scope.CheckingSession();
        $scope.GetAttendanceDate();
        $scope.UpdateMaster();
        $scope.FetchMaster();
    }



    //////////////////////////////////
    $scope.FetchMaster = function() {
        $http({



            method: "POST",
            url: "absent.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,


                'Method': 'FetchMaster'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.NoofPresents = response.data.NoofPresent;
            $scope.NoofAbsents = response.data.NoofAbsents;
            $scope.NoofLeaves = response.data.Noofleave;
            $scope.Atendancestatus = response.data.Empattendencestatus;
            $scope.NoofEmployee = response.data.NoofEmployee;





        });

    }

    ////////////////////////////////////
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

/////////////////////////////////////////////

});