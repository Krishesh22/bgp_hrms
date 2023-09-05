var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM60Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

  
    $scope.currentPageAssetcategory = 1;
    $scope.pageSizeAssetcategory= 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Assetcategory = "";
    $scope.Shortcode = "";
    $scope.Assetcategory = "";
    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.Assetcategory = "";
        $scope.Shortcode = "";
        $scope.Getallvalues();
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            
            if ($scope.TempMessage == "Shortcode") {
                $scope.Message = true;
                $scope.Message = "Please Enter Shortcode";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "AssetList") {
                $scope.Message = true;
                $scope.Message = "This Category Assigned ,You cannot delete this item...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "This Data Already Exists";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetAssetcategoryList = $scope.DetailListTemp;
            }


            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                
            }
            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetAssetcategoryList = $scope.DetailListTemp;
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetAssetcategoryList = $scope.DetailListTemp;
                $scope.Assetcategory = "";
                $scope.Shortcode = "";

            }



        }
        //////////////////////////////////
    $scope.SendEdit = function(Assetcategory,Shortcode,Assetcategoryid) {


            $scope.Assetcategory = Assetcategory;
            $scope.Shortcode = Shortcode;
            $scope.Assetcategoryid = Assetcategoryid;





        }
        //////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveAsset = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetcategory.php",
            data: { 
            'Shortcode': $scope.Shortcode, 
            'Assetcategory': $scope.Assetcategory, 
            'Method': 'Save' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
          
            $scope.TempSave();
            $scope.Getallvalues ();
        });

    };
    ////////////////////////////////////////////
    $scope.GetAssetcategory = function() {

        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Assetcategory.php",
            data: { 'Assetcategory': $scope.Assetcategory, 'Method': 'Change' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.GetAssetcategoryList = response.data;
        });
    };
    ////////////////////////////////////////////

    $scope.Getallvalues = function() {

        $http({
            method: "POST",
            url: "Assetcategory.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetAssetcategoryList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetcategory.php",
            data: { 'Assetcategory': $scope.Assetcategory,
            'Assetcategoryid' :$scope.Assetcategoryid, 'Method': 'Delete' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
           

            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////////////////

    $http({
        method: "POST",
        url: "Assetcategory.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

       
        $scope.GetAssetcategoryList = response.data;
        
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
        url: "Assetcategory.php",
        data: {
          
           

            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },
     

    }).then(function successCallback(response) {

      
        $scope.PageSession = response.data.Message;
       
      
    });


    $scope.GetAssetlistcount = function(Assetcategoryid,AssetListCount,Activestatus)
    {
        $scope.AssetListCount = AssetListCount;
        $scope.Assetcategoryid = Assetcategoryid;
        $scope.Activestatus = Activestatus;
   
        if($scope.Activestatus =="Active")
        {
            $scope.Assetactive = "Deactive";
        }
        if($scope.Activestatus =="Deactive")
        {
            $scope.Assetactive = "Active";
        }
        if($scope.AssetListCount ==0)
        {
            $scope.AssetactiveMessage = "Are you sure want to " + $scope.Assetactive + " " +"this record ?";
            $("#ModalCenter1AssetAllocation").modal('show');
        }
        if($scope.AssetListCount !=0)
        {
            $scope.AssetactiveMessage = "If you"+ $scope.Assetactive +"this category and it's associated asset list also will be"+ $scope.Assetactive + ", do you want to continue?";
            $("#ModalCenter1AssetAllocation").modal('show');
        }


    }

    $scope.AssetActivedeactivestatus = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetcategory.php",
            data: { 
   
            'Activestatus' :$scope.Activestatus,
            'Assetcategoryid' :$scope.Assetcategoryid, 'Method': 'ActiveDeactive' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
          

            $scope.TempSave();
            $scope.Getallvalues ();
        });

    };

    $scope.GetDeleteAssetlistcount = function(Assetcategoryid,AssetListCount)
    {
        $scope.AssetListCount = AssetListCount;
        $scope.Assetcategoryid = Assetcategoryid;
        if($scope.AssetListCount ==0)
        {
            $("#ModalCenter1").modal('show');
        }
        else
        {
            $("#ModalCenter1DeleteAssetAllocation").modal('show');
        }
    }

    $scope.AssetdeleteAssetlisttoo = function()
    {
        
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetcategory.php",
            data: { 
        
          
            'Assetcategoryid' :$scope.Assetcategoryid, 'Method': 'DeleteList' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
          

            $scope.TempSave();
            $scope.Getallvalues ();
        });
    }

    $scope.GetAssetlistbarcode = function(Assetcategoryid,AssetListCount)
    {
        $scope.Assetcategoryid = Assetcategoryid;
        $scope.AssetListCount = AssetListCount;
       if($scope.AssetListCount !=0)
       {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Assetcategory.php",
            data: { 
        
          
            'Assetcategoryid' :$scope.Assetcategoryid, 'Method': 'PRINTLIST' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.barcodes = response.data;
          
            $scope.printContent();
           
        });
       }
       else
       {
        alert("No assets lists found");
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