var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM17Controller', function($scope, $http, $timeout, $filter) {

    $scope.Status = "Open";
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    $scope.currentPagePayroll = 1;
    $scope.pageSizePayroll = 10;
    $scope.Nationalholiday = 0;
    $scope.CasualLeave = "1.5";
    $scope.currentPageLate = 1;
    $scope.pageSizeLate = 10

    $scope.TempSave = function() {

       
        if ($scope.TempMessage == "Mailsent") {
            $scope.Message = true;
            $scope.Message = "Email Sent Sucessfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "MailExists") {
            $scope.Message = true;
            $scope.Message = "Mail has already sent to this recipient";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
    }
    ///////////////////////////////////////////

    $http({
        method: "POST",
        url: "Latecomers.php",
        data: {

            'Method': "FetchDate"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {

        $scope.Fromdate = response.data.Fromdate;
        $scope.Todate = response.data.Todate;

        $scope.DisplayEmpLateCome();
    });


    //////////////////////////////////////////


   
    $scope.DisplayEmpLateCome = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Latecomers.php",
            data: {
                'Fromdate': $scope.Fromdate,
                'Todate': $scope.Todate,
                'Method': 'EMPLATECOME'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetEmpLateList = response.data.data01;

        });

    };
    //////////////////////

    $scope.Sendemail = function(Employeeid) {
        $scope.CheckingSession();

        $scope.Employeeid = Employeeid;
       // alert("Employeeid");
    $http({
            method: "POST",
            url: "Latecomers.php",
            data: {

                'Employeeid': $scope.Employeeid,
                'Emaild': $scope.Emaild,
                'Method': 'Emailverification'
            },

            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            
            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
        });



    };



    /////////////////////////////


    $scope.Sendemailbulk = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Latecomers.php",
            data: {
                'Fromdate': $scope.Fromdate,
                'Todate': $scope.Todate,
                'Employeeid': $scope.Employeeid,
                'Method': 'Emailverificationbulk'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            // $scope.Tempnextno = response.data.Nextno;
            $scope.TempSave();

        });

    };

///////////////////////////////////////
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
//////////////////////////////


});