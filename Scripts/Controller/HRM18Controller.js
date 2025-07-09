var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM18Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageVaccancy = 1;
    $scope.pageSizeVaccancy = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Vaccancy = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.Vaccancy = "";
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
            $scope.GetVaccancyList = $scope.DetailListTemp;
        }

        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.GetVaccancyList = $scope.DetailListTemp;
        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.GetVaccancyList = $scope.DetailListTemp;
            $scope.Vaccancy = "";

        }



    }
    $scope.SendEdit = function(Vaccancy) {

       // $scope.CheckingSession();
        $scope.Vaccancy =Vaccancy;





    }
    //////////////////////////////////////
$scope.Getuncheck = function() {
    $scope.t1 = false;
}

////////////////////////////

$scope.SaveVaccancy = function() {
    $scope.CheckingSession();
    $http({



        method: "POST",
        url: "Vaccancy.php",
        data: { 'Vaccancy': $scope.Vaccancy, 'Method': 'Save' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.TempMessage = response.data.Message;

        $scope.DetailListTemp = response.data.mytbl;


        $scope.TempSave();
    });

};
$scope.GetDepartment = function() {
   // $scope.CheckingSession();

    $http({
        method: "POST",
        url: "Vaccancy.php",
        data: { 'Vaccancy': $scope.Vaccancy, 'Method': 'Change' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.GetVaccancyList = response.data;
    });
};
////////////////////////////////////////////

$scope.Getallvalues = function() {
    //$scope.CheckingSession();

    $http({
        method: "POST",
        url: "Vaccancy.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetVaccancyList = response.data;
    });
};
/////////////////////////////////////////////////////////
$scope.Deletenew = function() {
    $scope.CheckingSession();
    $http({



        method: "POST",
        url: "Vaccancy.php",
        data: { 'Vaccancy': $scope.Vaccancy, 'Method': 'Delete' },
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
    url: "Vaccancy.php",
    data: { 'Method': 'ALL' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {


    $scope.GetVaccancyList = response.data;
    // $scope.CheckingSession();
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
    url: "Vaccancy.php",
    data: {
      
       

        'Method': 'PageSession'
    },
    headers: { 'Content-Type': 'application/json' },
 

}).then(function successCallback(response) {

  
    $scope.PageSession = response.data.Message;
   
  
});
////////////////////////////
});