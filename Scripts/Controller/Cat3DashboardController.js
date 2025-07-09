var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('Cat3DashboardController', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageDepartment = 1;
    $scope.pageSizeDepartment = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = ""; 
    $scope.CountPresentDays = 0;
    $scope.CountAbsentDays = 0;
    $scope.CountLeaveDays = 0;
    $scope.CountOfemp = 0;
    // alert("$scope.CountPresentDays");
    //////////////////////////////////////////////////////
    $scope.GetCat3AttendanceDate = function() {
        $http({
            method: "POST",
            url: "Cat3DashbrdController.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Method': 'DISPATT'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.CountPresentDays = response.data.CountPresentDays;
            $scope.CountAbsentDays = response.data.CountAbsentDays;
            $scope.CountLeaveDays = response.data.CountLeaveDays;
            $scope.CountOfemp = response.data.CountOfemp;


           
        });


    }

    ///////////////////////////////////////////////////////////////////
    $http({



        method: "POST",
        url: "Cat3DashbrdController.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.AttendanceDate = response.data.date;
        $scope.GetCat3AttendanceDate();
        //  $scope.FetchMaster();

// alert(" $scope.CountLeaveDays");
    });
    //////////////////////
});