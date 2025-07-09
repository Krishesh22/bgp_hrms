<<<<<<< HEAD
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'ngRoute', 'ngResource', 'angular.filter', 'ngTable']);
app.controller('HRM62Controller', function($scope, $http, $timeout) {

    $scope.Method = "";


    $scope.currentPageState = 1;
    $scope.pageSizeState = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";

    $scope.Assetcategoryid = "";
    $scope.Assetcode = "";
    $scope.Assetname = "";
    $scope.Shortcode = "";
    $scope.btnsave = true;
    $scope.btnupdate = false;
    $scope.Assetlistid = 0;

    ///////////////////////////////


    $scope.TempSave = function() {

            if ($scope.TempMessage == "Assetcategoryid") {
                $scope.Message = true;
                $scope.Message = "Please Select Asset Category...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Assetcode") {
                $scope.Message = true;
                $scope.Message = "Please Enter Asset Code...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Assetname") {
                $scope.Message = true;
                $scope.Message = "Please Enter Asset Name...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "This Data Already Exists";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Allocation") {
                $scope.Message = true;
                $scope.Message = "This Asset allocated you cannot delete this asset...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Return") {
                $scope.Message = true;
                $scope.Message = "This Asset allocated you cannot delete this asset...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $scope.btnupdate = true;
                $scope.btnsave = false;
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }



        }
        //////////////////////////////////
   
    ////////////////////////////////////////////

   
    /////////////////////////////////////////////////////////

 
    /////////////////////////////////////////////////////////

 
    ///////////////////////////////////////////////////////////////////
    $scope.CheckingSession = function() {

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


    $scope.SessionSavedMessage = function() {
            if ($scope.SessionMessage == "SessionNo") {
                //  alert("Session Expired! Please Login Again...");

                window.location.replace($scope.Sessionurl);
                return;
            }
        }
        //////////////////////////////


        $scope.GetDepartmentDetails = function()
        {
            var Department = $("#multiple-checkboxes").val();
            $http({
                method: "POST",
                url: "Rptcontroller.php",
                data: { 'Department':Department,
                    'Method': 'DEPARTMENTLISTS' },
                    responseType: 'arraybuffer',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        
            }).then(function successCallback(response) {
        
        
                var contentType = response.headers('content-type');
                if (contentType === 'application/json') {
                   // $scope.GetAssetList = response.data;
                } else if (contentType === 'application/vnd.ms-excel') {
                    // Trigger Excel download
                    var blob = new Blob([response.data], { type: 'application/vnd.ms-excel' });
                    var downloadLink = document.createElement('a');
                    downloadLink.href = window.URL.createObjectURL(blob);
                    downloadLink.download = 'Asset_allocated_list.xls';
                    downloadLink.click();
                }
            });
        }


        
        $scope.GetDepartmentDetailstwo = function()
        {
            var Department = $("#multiple-checkboxes").val();
            $http({
                method: "POST",
                url: "Rptcontroller.php",
                data: { 'Department':Department,
                    'Method': 'DEPARTMENTLISTS2' },
                  
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        
            }).then(function successCallback(response) {
        

                    $scope.GetAssetList = response.data;
                    // alert($scope.GetAssetList.length );
                    if(response.data !=null)
                    {
                    $scope.GetDepartmentDetails();
                    }
                    else
                    {
                        alert("No Record Found");
                    }
               
            });
        }
   
=======
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'ngRoute', 'ngResource', 'angular.filter', 'ngTable']);
app.controller('HRM62Controller', function($scope, $http, $timeout) {

    $scope.Method = "";


    $scope.currentPageState = 1;
    $scope.pageSizeState = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";

    $scope.Assetcategoryid = "";
    $scope.Assetcode = "";
    $scope.Assetname = "";
    $scope.Shortcode = "";
    $scope.btnsave = true;
    $scope.btnupdate = false;
    $scope.Assetlistid = 0;

    ///////////////////////////////


    $scope.TempSave = function() {

            if ($scope.TempMessage == "Assetcategoryid") {
                $scope.Message = true;
                $scope.Message = "Please Select Asset Category...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Assetcode") {
                $scope.Message = true;
                $scope.Message = "Please Enter Asset Code...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Assetname") {
                $scope.Message = true;
                $scope.Message = "Please Enter Asset Name...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "This Data Already Exists";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Allocation") {
                $scope.Message = true;
                $scope.Message = "This Asset allocated you cannot delete this asset...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Return") {
                $scope.Message = true;
                $scope.Message = "This Asset allocated you cannot delete this asset...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $scope.btnupdate = true;
                $scope.btnsave = false;
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }



        }
        //////////////////////////////////
   
    ////////////////////////////////////////////

   
    /////////////////////////////////////////////////////////

 
    /////////////////////////////////////////////////////////

 
    ///////////////////////////////////////////////////////////////////
    $scope.CheckingSession = function() {

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


    $scope.SessionSavedMessage = function() {
            if ($scope.SessionMessage == "SessionNo") {
                //  alert("Session Expired! Please Login Again...");

                window.location.replace($scope.Sessionurl);
                return;
            }
        }
        //////////////////////////////


        $scope.GetDepartmentDetails = function()
        {
            var Department = $("#multiple-checkboxes").val();
            $http({
                method: "POST",
                url: "Rptcontroller.php",
                data: { 'Department':Department,
                    'Method': 'DEPARTMENTLISTS' },
                    responseType: 'arraybuffer',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        
            }).then(function successCallback(response) {
        
        
                var contentType = response.headers('content-type');
                if (contentType === 'application/json') {
                   // $scope.GetAssetList = response.data;
                } else if (contentType === 'application/vnd.ms-excel') {
                    // Trigger Excel download
                    var blob = new Blob([response.data], { type: 'application/vnd.ms-excel' });
                    var downloadLink = document.createElement('a');
                    downloadLink.href = window.URL.createObjectURL(blob);
                    downloadLink.download = 'Asset_allocated_list.xls';
                    downloadLink.click();
                }
            });
        }


        
        $scope.GetDepartmentDetailstwo = function()
        {
            var Department = $("#multiple-checkboxes").val();
            $http({
                method: "POST",
                url: "Rptcontroller.php",
                data: { 'Department':Department,
                    'Method': 'DEPARTMENTLISTS2' },
                  
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        
            }).then(function successCallback(response) {
        

                    $scope.GetAssetList = response.data;
                    // alert($scope.GetAssetList.length );
                    if(response.data !=null)
                    {
                    $scope.GetDepartmentDetails();
                    }
                    else
                    {
                        alert("No Record Found");
                    }
               
            });
        }
   
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
});