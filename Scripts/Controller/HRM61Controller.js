var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'ngRoute', 'ngResource', 'angular.filter', 'ngTable']);
app.controller('HRM61Controller', function($scope, $http, $timeout) {

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
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.Assetcategoryid = "";
        $scope.Assetcode = "";
        $scope.Assetname = "";
        $scope.Shortcode = "";
        $scope.btnsave = true;
        $scope.btnupdate = false;
        $scope.Assetlistid = 0;
        // $scope.Getallvalues();

    }

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
    $scope.SendEdit = function(Assetlistid) {

            $scope.CheckingSession();
            $scope.Assetlistid = Assetlistid;
            $scope.FetchAssetlist();
            $scope.btnupdate = true;
            $scope.btnsave = false;
            $scope.Getallvalues();



        }
        //////////////////////////////////////
    $scope.FetchAssetlist = function() {
        $http({
            method: "post",
            url: "Assetlist.php",
            data: { 'Assetlistid': $scope.Assetlistid, 'Method': 'FetchAsset' },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.Assetcategoryid = response.data.Assetcategoryid;
            $scope.Assetcode = response.data.Assetcode;
            $scope.Assetname = response.data.Assetname;
            $scope.GetAssetshortcode();

        });
    }

    ///////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveAssetLists = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetlist.php",
            data: {
                'Assetcategoryid': $scope.Assetcategoryid,
                'Assetcode': $scope.Assetcode,
                'Assetname': $scope.Assetname,
                'Shortcode': $scope.Shortcode,
                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.Assetlistid = response.data.Assetlistid;
            $scope.TempSave();
            $scope.Getallvalues();
            $scope.GetAssetshortcode();
        });

    };

    $scope.UpdateAssetLists = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetlist.php",
            data: {
                'Assetcategoryid': $scope.Assetcategoryid,
                'Assetcode': $scope.Assetcode,
                'Assetname': $scope.Assetname,
                'Shortcode': $scope.Shortcode,
                'Assetlistid': $scope.Assetlistid,
                'Method': 'Update'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.Getallvalues();
            $scope.GetAssetshortcode();
        });

    };
    ////////////////////////////////////////////
    $scope.GetState = function() {
        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Assetlist.php",
            data: { 'Country': $scope.Country, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.GetStateList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Assetlist.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetAssetList = response.data;
        });
    };
    /////////////////////////////////////////////////////////

    ////////////////////////////////////
    $http({
        method: "POST",
        url: "Assetlist.php",
        data: { 'Method': 'Category' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetCategoryList = response.data;
    });
    /////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetlist.php",
            data: {
                'Assetlistid': $scope.Assetlistid,
                'Assetcategoryid': $scope.Assetcategoryid,

                'Method': 'Delete'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.Getallvalues();
            $scope.Reset();
        });

    };
    /////////////////////////////////////////////////////////

    $http({
        method: "POST",
        url: "Assetlist.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetAssetList = response.data;
    });
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
    $scope.GetAssetshortcode = function() {
        $http({
            method: "post",
            url: "Assetlist.php",
            data: { 'Assetcategoryid': $scope.Assetcategoryid, 'Method': 'Fetchcategory' },
            headers: { 'Content-Type': 'application/json' },
        }).then(function successCallback(response) {
            $scope.Shortcode = response.data.Shortcode;
            $scope.Assetcategory = response.data.Assetcategory;
            // $scope.GetAssetList = response.data.data;

        });
    }


    $scope.GetAssetlistcount = function(Assetlistid, AssetListCount, Activestatus) {
        $scope.AssetListCount = AssetListCount;
        $scope.Assetlistid = Assetlistid;
        $scope.Activestatus = Activestatus;

        if ($scope.Activestatus == "Active") {
            $scope.Assetactive = "Deactive";
        }
        if ($scope.Activestatus == "Deactive") {
            $scope.Assetactive = "Active";
        }
        if ($scope.AssetListCount == 0) {
            $scope.AssetactiveMessage = "Are you sure want to " + $scope.Assetactive + " " + "this record ?";
            $("#ModalCenter1AssetAllocation").modal('show');
        }



    }

    $scope.AssetActivedeactivestatus = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetlist.php",
            data: {

                'Activestatus': $scope.Activestatus,
                'Assetlistid': $scope.Assetlistid,
                'Method': 'ActiveDeactive'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;


            $scope.TempSave();
            $scope.Getallvalues();
        });

    };

    $scope.Listfolder ={};

    $scope.getAllSelected = function() {
        $scope.selectedItems = [];
        angular.forEach($scope.Listfolder, function(key,value) {
            $scope.selectedItems.push(value);
        });
    }

    $scope.GetAssetbarcodeprint = function() {
        $scope.CheckingSession();
        $scope.getAllSelected();
        if ($scope.selectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function() { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Assetlist.php",
                data: {'Listedno': $scope.selectedItems, 'Method': 'PRINTLIST' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
           
                $scope.barcodes = response.data;
              
                $scope.Listfolder = {};
                $scope.printContent();

            });
        }
    }


    $scope.printContent = function() {
        var printWindow = window.open('', '_blank', 'width=750,height=550');
        printWindow.document.write('<html><head><title>Print Preview</title></head><body>');
        var style = `
        <style>
            @media print {
                .barcode-container { text-align: center; }
                .barcode-container img { max-width: 60px; max-height: 25px; display: block; margin: 5px auto 0; }
                .barcode-container p { margin: 1px auto; font-size: 6px; padding: 0; }
                @page { size: 19mm 12mm; margin: 0mm; } /* Adjust size and margin here */
            }
        </style>`;
        
        printWindow.document.write(style);
        
        for (var i = 0; i < $scope.barcodes.length; i++) {
            var barcode = $scope.barcodes[i];
            
            // Use a container with the "barcode-container" class
            printWindow.document.write('<div class="barcode-container">');
            printWindow.document.write('<img src="' + barcode.imageUrl + '" alt="Barcode">');
            printWindow.document.write('<p>' + barcode.code + '</p>');
            printWindow.document.write('</div>');
            
            if (i < $scope.barcodes.length - 1) {
                printWindow.document.write('<div style="page-break-before: always;"></div>'); // Force page break
            }
        }
        
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        printWindow.onload = function () {
            printWindow.print();
            printWindow.close();
        };
    };

});