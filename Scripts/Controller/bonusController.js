var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('bonusController', function($scope, $http, $timeout) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Status = "Open";
    $scope.Bonuspercentage ="8.33";
    ///////////////////////////////
    $scope.Reset = function() {
       $scope.CheckingSession();
        $scope.Status = "Open";
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
                $scope.GetDepartmentList = $scope.DetailListTemp;
            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetDepartmentList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetDepartmentList = $scope.DetailListTemp;
                $scope.Department = "";

            }



        }
        //////////////////////////////////
   

    ////////////////////////////

    $scope.SaveDetails = function() {
     $scope.Session=   $scope.CheckingSession();
     if ($scope.Session =='X')
     {

     }
     else

     {
     	 $http({



            method: "POST",
            url: "bonusController.php",
            data: { 'Category': $scope.Category,'Bonusyear': $scope.Bonusyear,'Bonuspercentage': $scope.Bonuspercentage, 'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.DetailListTemp = response.data.mytbl;
            $scope.TempSave();
            $scope.Getallvalues();
        });
     }
       

    };
    ////////////////////////////////////////////

    ////////////////////////////////////////////

    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "bonusController.php",
            data: { 'Category': $scope.Category,'Bonusyear': $scope.Bonusyear,'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeBonusList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.Session=   $scope.CheckingSession();
     if ($scope.Session =='X')
     {

     }
     else

     {
        $http({



            method: "POST",
            url: "Department.php",
            data: { 'Department': $scope.Department, 'Method': 'Delete' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.DetailListTemp = response.data.mytbl;

            $scope.TempSave();
        });
    }

    };
    /////////////////////////////////////////////////////////


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
            return X;
        }
    }
    /////////////////////////////////

    $http({



        method: "POST",
        url: "Department.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
        $scope.LoadDepartment ();
      
    });

    $scope.LoadDepartment = function()
    {
    	    $scope.Session=   $scope.CheckingSession();
     if ($scope.Session =='X')
     {

     }
     else

     {
    	    $http({
        method: "POST",
        url: "Department.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

       
        $scope.GetDepartmentList = response.data;
        
    });
}
    }

});