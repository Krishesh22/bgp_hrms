var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('DASHBOARDController', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageDepartment = 1;
    $scope.pageSizeDepartment = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Department = "";
    $scope.NoofPresent = 0;
    $scope.NoofAbsents = 0;
    $scope.Noofleave = 0;
    $scope.NoofEmployee = 0;
    $scope.currentPageDepartment = 1;
    $scope.pageSizeDepartment = 10;
    //////////////////////////////////////////////////////

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Attendence Close") {
                $scope.Message = true;
                $scope.Message = "Attendance Status Close You Cannot Send Mail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Mail Sent") {
                $scope.Message = true;
                $scope.Message = "Mail Sent Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }



        }
        /////////////////////////
    $scope.GetAttendanceDate = function() {
              $scope.CheckingSession();
        $http({
            method: "POST",
            url: "DashboardController.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Method': 'DISPATT'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

               $scope.NoofPresent = response.data.NoofPresent;
            $scope.NoofAbsents = response.data.NoofAbsents;
            $scope.Noofleave = response.data.Noofleave;
            $scope.NoofEmployee = response.data.NoofEmployee;
            $scope.GetDepartmentEmployeeList = response.data.mytbl;
            $scope.Cat1Present = response.data.Cat1Present;
            $scope.Cat1Absent = response.data.Cat1Absent;
            $scope.Cat1Leave = response.data.Cat1Leave;
            $scope.Cat1Employee = response.data.Cat1Employee;
            $scope.Cat2Present = response.data.Cat2Present;
            $scope.Cat2Absent = response.data.Cat2Absent;
            $scope.Cat2Leave = response.data.Cat2Leave;
            $scope.Cat2Employee = response.data.Cat2Employee;
            $scope.Cat3Present = response.data.Cat3Present;
            $scope.Cat3Absent = response.data.Cat3Absent;
            $scope.Cat3Leave = response.data.Cat3Leave;
            $scope.Cat3Employee = response.data.Cat3Employee;
                  $scope.Cat1onrollmale = response.data.Cat1onrollmale;
            $scope.Cat1onrollfemale = response.data.Cat1onrollfemale;
            $scope.Cat1onrolltotal = response.data.Cat1onrolltotal;
            $scope.Cat1onrollmalepresent = response.data.Cat1onrollmalepresent;
            $scope.Cat1onrollfemalepresent = response.data.Cat1onrollfemalepresent;
            $scope.Cat1onrollpresent = response.data.Cat1onrollpresent;
            $scope.Cat1onrollmaleabsent = response.data.Cat1onrollmaleabsent;
            $scope.Cat1onrollfemaleabsent =response.data.Cat1onrollfemaleabsent;
            $scope.Cat1onrollabsent =response.data.Cat1onrollabsent;
            $scope.Cat1onrollmaleleave =response.data.Cat1onrollmaleleave;
            $scope.Cat1onrollfemaleleave =response.data.Cat1onrollfemaleleave;
            $scope.Cat1onrollleave =response.data.Cat1onrollleave;
            $scope.Cat2onrollmale = response.data.Cat2onrollmale;
            $scope.Cat2onrollfemale = response.data.Cat2onrollfemale;
            $scope.Cat2onrolltotal = response.data.Cat2onrolltotal;
            $scope.Cat2onrollmalepresent = response.data.Cat2onrollmalepresent;
            $scope.Cat2onrollfemalepresent = response.data.Cat2onrollfemalepresent;
            $scope.Cat2onrollpresent = response.data.Cat2onrollpresent;
            $scope.Cat2onrollmaleabsent = response.data.Cat2onrollmaleabsent;
            $scope.Cat2onrollfemaleabsent = response.data.Cat2onrollfemaleabsent;
            $scope.Cat2onrollabsent = response.data.Cat2onrollabsent;
            $scope.Cat2onrollmaleleave = response.data.Cat2onrollmaleleave;
            $scope.Cat2onrollfemaleleave = response.data.Cat2onrollfemaleleave;
            $scope.Cat2onrollleave = response.data.Cat2onrollleave;
            $scope.Cat3onrollmale = response.data.Cat3onrollmale;
            $scope.Cat3onrollfemale = response.data.Cat3onrollfemale;
            $scope.Cat3onrolltotal = response.data.Cat3onrolltotal;
            $scope.Cat3onrollmalepresent =response.data.Cat3onrollmalepresent;
            $scope.Cat3onrollfemalepresent = response.data.Cat3onrollfemalepresent;
            $scope.Cat3onrollpresent = response.data.Cat3onrollpresent;
            $scope.Cat3onrollmaleabsent = response.data.Cat3onrollmaleabsent;
            $scope.Cat3onrollfemaleabsent = response.data.Cat3onrollfemaleabsent;
            $scope.Cat3onrollabsent = response.data.Cat3onrollabsent;
            $scope.Cat3onrollmaleleave = response.data.Cat3onrollmaleleave;
            $scope.Cat3onrollfemaleleave = response.data.Cat3onrollfemaleleave;
            $scope.Cat3onrollleave = response.data.Cat3onrollleave;
            $scope.Cat1migrantmale =response.data.Cat1migrantmale;
            $scope.Cat1migrantfemale = response.data.Cat1migrantfemale;
            $scope.Cat1migranttotal = response.data.Cat1migranttotal;
            $scope.Cat1migrantmalepresent = response.data.Cat1migrantmalepresent;
            $scope.Cat1migrantfemalepresent = response.data.Cat1migrantfemalepresent;
            $scope.Cat1migrantpresent = response.data.Cat1migrantpresent;
            $scope.Cat1migrantmaleabsent = response.data.Cat1migrantmaleabsent;
            $scope.Cat1migrantfemaleabsent = response.data.Cat1migrantfemaleabsent;
            $scope.Cat1migrantabsent = response.data.Cat1migrantabsent;
            $scope.Cat1migrantmaleleave = response.data.Cat1migrantmaleleave;
            $scope.Cat1migrantfemaleleave  = response.data.Cat1migrantfemaleleave;
            $scope.Cat1migrantleave = response.data.Cat1migrantleave;
            $scope.Cat2migrantmale = response.data.Cat2migrantmale;
            $scope.Cat2migrantfemale = response.data.Cat2migrantfemale;
            $scope.Cat2migranttotal = response.data.Cat2migranttotal;
            $scope.Cat2migrantmalepresent = response.data.Cat2migrantmalepresent;
            $scope.Cat2migrantfemalepresent = response.data.Cat2migrantfemalepresent;
            $scope.Cat2migrantpresent=response.data.Cat2migrantpresent;
            $scope.Cat2migrantmaleabsent = response.data.Cat2migrantmaleabsent;
            $scope.Cat2migrantfemaleabsent =response.data.Cat2migrantfemaleabsent;
            $scope.Cat2migrantabsent =response.data.Cat2migrantabsent;
            $scope.Cat2migrantmaleleave = response.data.Cat2migrantmaleleave;
            $scope.Cat2migrantfemaleleave = response.data.Cat2migrantfemaleleave;
            $scope.Cat2migrantleave = response.data.Cat2migrantleave;
            $scope.Cat3migrantmale = response.data.Cat3migrantmale;
            $scope.Cat3migrantfemale = response.data.Cat3migrantfemale;
            $scope.Cat3migranttotal =response.data.Cat3migranttotal;
            $scope.Cat3migrantmalepresent = response.data.Cat3migrantmalepresent;
            $scope.Cat3migrantfemalepresent = response.data.Cat3migrantfemalepresent;
            $scope.Cat3migrantpresent = response.data.Cat3migrantpresent;
            $scope.Cat3migrantmaleabsent = response.data.Cat3migrantmaleabsent;
            $scope.Cat3migrantfemaleabsent = response.data.Cat3migrantfemaleabsent;
            $scope.Cat3migrantabsent = response.data.Cat3migrantabsent;
            $scope.Cat3migrantmaleleave = response.data.Cat3migrantmaleleave;
            $scope.Cat3migrantfemaleleave =response.data.Cat3migrantfemaleleave;
            $scope.Cat3migrantleave =response.data.Cat3migrantleave;


        });


    }

    ///////////////////////////////////////////////////////////////////
    $http({



        method: "POST",
        url: "DashboardController.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.AttendanceDate = response.data.date;
        $scope.GetAttendanceDate();
        //  $scope.FetchMaster();


    });
    //////////////////////

    $scope.SendMailToDepartmenthead = function(Employeeid, Department, Attendencedate) {
            $scope.Message = "Please Wait Request is processing...";


            $scope.Attendencedateemp = Attendencedate;
            $scope.Employeeid = Employeeid;
            $scope.Department = Department;
                  $scope.CheckingSession();

            $http({
                method: "POST",
                url: "DashboardController.php",
                data: {
                    'AttendanceDate': $scope.Attendencedateemp,
                    'Employeeid': $scope.Employeeid,
                    'Department': $scope.Department,
                    'Method': 'SendMail'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();


            });


        }
        ////////////////////
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

});