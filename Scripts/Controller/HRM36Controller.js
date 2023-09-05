var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'ngRoute', 'ngResource', 'angular.filter', 'ngTable']);
app.controller('HRM36Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageDeptHead = 1;
    $scope.pageSizeDeptHead = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.DeptHead = "";
    $scope.Employeeid = "";
    $scope.currentPageDepartment = 1;
    $scope.pageSizeDepartment = 10;
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.DeptHead = "";
        $scope.Employeeid = "";
        $scope.Employeename = "";
        $scope.Getallvalues();
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.CheckingSession();

                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }



            if ($scope.TempMessage == "DeptHead") {
                $scope.Message = true;
                $scope.Message = "Please Select Department";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Employeeid") {
                $scope.CheckingSession();

                $scope.Message = true;
                $scope.Message = "Please Select Employee";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(DeptHead) {


            $scope.DeptHead = DeptHead;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////


    ////////////////////////////////////////////
    $scope.GetDeptHead = function() {

        $scope.CheckingSession();
        // $http({
        //     method: "POST",
        //     url: "DeptHead.php",
        //     data: { 'DeptHead': $scope.DeptHead, 'Method': 'Change' },
        //     headers: { 'Content-Type': 'application/json' }

        // }).then(function successCallback(response) {


        //     // $scope.GetEmployeeList = response.data;

        // });
        $scope.GetEmployee();
    };
    ////////////////////////////////////////////


    $http({
        method: "POST",
        url: "DeptHead.php",
        data: { 'Method': 'GETCATEGORY' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.GetEmployeeList = response.data;

    });

    //////////////


    $scope.GetEmployee = function() {
        $http({
            method: "POST",
            url: "DeptHead.php",
            data: { 'DeptHead': $scope.DeptHead, 'Method': 'EMPLOYEE' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Employeeid = response.data.Employeeid;
            $scope.Employeename = response.data.Fullname;
        });
    }

    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "DeptHead.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetDepartmentEmployeeList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "DeptHead.php",
            data: { 'DeptHead': $scope.DeptHead, 'Method': 'Delete' },
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
        url: "DeptHead.php",
        data: { 'Method': 'Deptnew' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.GetDeptList = response.data;

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
        url: "DeptHead.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
       
      
    });
        /////////////////////////////////

    $http({
        method: "POST",
        url: "DeptHead.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        //   alert(response.data);
        $scope.GetDepartmentEmployeeList = response.data;
    });
    ///////////////////////

    $scope.SaveDeptHead = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "DeptHead.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'DeptHead': $scope.DeptHead,



                'Method': 'SaveDeptHead'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.Getallvalues();

        });

    };


    $scope.SendEdit02 = function(Employeeid) {
        $scope.Employeeid = Employeeid;
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "DeptHead.php",
            data: {
                'Employeeid': $scope.Employeeid,




                'Method': 'FetchEmployee'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Employeename = response.data.Fullname;

        });
    }
});