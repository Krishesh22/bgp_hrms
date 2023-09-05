var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM31Controller', function($scope, $http, $timeout, $filter, $window) {

    $scope.Inwardtype = "Cash";
    $scope.Inwardamount = "0";
    $scope.InwardNotes = "";
    $scope.btnsaveadmin = false;
    $scope.btnSave = true;
    $scope.CurrentPageTransaction = 1;
    $scope.PageSizeTransaction = 10;
    $scope.Locationid = "";
    $scope.CategoriesSelected = [];
    $scope.Categories = [];
    $scope.currentPageVoucherDetail = 1;
    $scope.pageSizeVoucherDetail = 10;
    $scope.btnopen = true;

    $scope.dropdownSetting = {
        scrollable: true,
        scrollableHeight: '200px'
    }


    ///////////////////////////////////////////////
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



    $scope.Reset = function() {
            $scope.Inwardtype = "Cash";
            $scope.Inwardamount = "0";
            $scope.InwardNotes = "";
            $scope.btnSave = true;
            $scope.Getnextno();
            $scope.Locationid = "";
            $scope.Getlocation();
        }
        ////////////////////////
    $scope.Getnextno = function() {
            $scope.CheckingSession();
            $http(

                {

                    method: "POST",
                    url: "Inwardwallet.php",
                    data: {

                        'Method': 'ModuleNext'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {

                //////// alert(response.data);
                $scope.InwardMasterno = response.data.InwardMasterno;
                $scope.CurrentdateTotalAmount = response.data.CurrentdateTotalAmount;
                $scope.CurrentdateVoucherAmount = response.data.CurrentdateVoucherAmount;
                $scope.CurrentdateBalanceAmount = response.data.CurrentdateBalanceAmount;
                $scope.Inwarddate = response.data.Inwarddate;

            });
        }
        ////////////////////////////////////
    $http(

        {

            method: "POST",
            url: "Inwardwallet.php",
            data: {

                'Method': 'ModuleNext'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

        //////// alert(response.data);
        $scope.InwardMasterno = response.data.InwardMasterno;
        $scope.CurrentdateTotalAmount = response.data.CurrentdateTotalAmount;
        $scope.CurrentdateVoucherAmount = response.data.CurrentdateVoucherAmount;
        $scope.CurrentdateBalanceAmount = response.data.CurrentdateBalanceAmount;
        $scope.Inwarddate = response.data.Inwarddate;
        $scope.Fromdate = response.data.Inwarddate;
        $scope.Todate = response.data.Inwarddate;
        $scope.Fromdate2 = response.data.Fromdate2;
        $scope.Todate2 = response.data.Fromdate2;




    });
    ///////////////////////////////////


    $scope.TempSave = function() {

            if ($scope.TempMessage == "Inwardamount") {
                $scope.Message = true;
                $scope.Message = "Please Enter Inward Cash Details";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Inwardtype") {
                $scope.Message = true;
                $scope.Message = "Please Select Type";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Location") {
                $scope.Message = true;
                $scope.Message = "Please Select Location Details";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Status") {
                $scope.Message = true;
                $scope.Message = "Please Select Status...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }


            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.InwardMasterno = $scope.Tempnextno;

                $scope.btnSave = false;

                $scope.Reset();
            }
            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }












        }
        //////////////////////////

    $scope.SaveInwardAmount = function() {

        $scope.btnsaveadmin = true;
        $scope.CheckingSession();
        //alert($scope.Inwardamount);

        $http({
            method: "POST",
            url: "Inwardwallet.php",
            data: {
                'InwardMasterno': $scope.InwardMasterno,
                'CurrentdateTotalAmount': $scope.CurrentdateTotalAmount,
                'CurrentdateVoucherAmount': $scope.CurrentdateVoucherAmount,
                'CurrentdateBalanceAmount': $scope.CurrentdateBalanceAmount,
                'Inwarddate': $scope.Inwarddate,
                'InwardNotes': $scope.InwardNotes,
                'Inwardamount': $scope.Inwardamount,
                'Inwardtype': $scope.Inwardtype,
                'Locationid': $scope.Locationid,

                'Method': 'Save'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);


            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;


            //alert(response.data.CurrentdateTotalAmount);
            $scope.btnsaveadmin = false;

            $scope.TempSave();



        });

    };
    ////////////////////////////////

    $http({



        method: "POST",
        url: "Inwardwallet.php",
        data: {

            'Method': 'ChartOfAccountList'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {



        $scope.GetChartOfAccountList = response.data.data01;


    });
    ////////////////////////////

    $scope.GetInbetweendateDetails = function() {

        // $scope.categoryIds = [];
        // angular.forEach($scope.CategoriesSelected, function(value, index) {
        //     $scope.categoryIds.push(value.id);
        // });

        var location = $("#multiple-checkboxes").val();
        $scope.Testlocation = location;
        $http(

            {

                method: "POST",
                url: "Inwardwallet.php",
                data: {
                    'Fromdate': $scope.Fromdate,
                    'Todate': $scope.Todate,
                    'Locationid': $scope.Testlocation,
                    'Method': 'GETINBEDETAILS'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


            $scope.GetInwardTransactionList = response.data.data01;
            $scope.Fromdate2 = response.data.Fromdate2;
            $scope.Todate2 = response.data.Todate2;
            // alert(response.data.Alertvalue);


        });
    }



    $http({



        method: "POST",
        url: "Inwardwallet.php",
        data: {

            'Method': 'LOCATIONLIST'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {



        $scope.GetLocationList = response.data.data01;

        // angular.forEach(response.data.data01, function(value, index) {
        //     $scope.Menus.push({ id: value.ID, label: value.LocationName });
        // });

        $scope.Locationid = response.data.Locationid;
        $scope.Authorizedno = response.data.Authorizedno;
        $scope.GetAuthorization();



    });
    //////////////////////////////
    $scope.Getlocation = function() {
            $http({



                method: "POST",
                url: "Inwardwallet.php",
                data: {

                    'Method': 'LOCATIONLIST'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {



                $scope.GetLocationList = response.data.data01;

                // angular.forEach(response.data.data01, function(value, index) {
                //     $scope.Menus.push({ id: value.ID, label: value.LocationName });
                // });

                $scope.Locationid = response.data.Locationid;
                $scope.Authorizedno = response.data.Authorizedno;
                $scope.GetAuthorization();



            });
        }
        ////////////////////////////////////


    $scope.GetAuthorization = function() {
        if ($scope.Authorizedno == "1") {
            // $scope.btnsaveadmin = false;

        } else {
            //$scope.btnsaveadmin = true;
        }
    }

    $scope.GETLocationwiseBalance = function() {
            $http(

                {

                    method: "POST",
                    url: "Inwardwallet.php",
                    data: {
                        'Locationid': $scope.Locationid,
                        'Method': 'ModuleNextClient'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {

                //////// alert(response.data);
                // $scope.InwardMasterno = response.data.InwardMasterno;
                $scope.CurrentdateTotalAmount = response.data.CurrentdateTotalAmount;
                $scope.CurrentdateVoucherAmount = response.data.CurrentdateVoucherAmount;
                $scope.CurrentdateBalanceAmount = response.data.CurrentdateBalanceAmount;
                $scope.Inwarddate = response.data.Inwarddate;

            });
        }
        ////////////////////
    $scope.GetInbetweendateALLDetails = function() {
        $http(

            {

                method: "POST",
                url: "Inwardwallet.php",
                data: {
                    'Fromdate': $scope.Fromdate,
                    'Todate': $scope.Todate,

                    'Method': 'GETINBEALLDETAILS'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


            $scope.GetInwardTransactionList = response.data.data01;
            $scope.Fromdate2 = response.data.Fromdate2;
            $scope.Todate2 = response.data.Todate2;


        });
    }

    //////////////////////
    $http({
        method: "POST",
        url: "Inwardwallet.php",
        data: { 'Method': 'LOCATION' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        // angular.forEach(response.data, function(value, index) {
        //     $scope.Menus.push({ id: value.ID, label: value.LocationName });
        // });
        angular.forEach(response.data, function(value, index) {
            $scope.Categories.push({ id: value.ID, label: value.LocationName });
        });

        //  $scope.GetCandidateList = response.data;
    });
    //////////////////////////////////////
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
        });
    });


    $scope.SendDetailEdit = function(DVoucherno, DVdetailno) {
        $scope.DVoucherno = DVoucherno;
        $scope.DVdetailno = DVdetailno;
        $http({



            method: "POST",
            url: "../HRM30/Voucher.php",
            data: {

                'DVoucherno': $scope.DVoucherno,
                'DVdetailno': $scope.DVdetailno,
                'Method': 'FetchDetail'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Particulars = response.data.Particulars;
            $scope.DVAmount = response.data.DVAmount;
            $scope.voucherattachmentpath = response.data.voucherattachmentpath;



        });

    }


    $scope.FetchVoucherMaster = function(DVoucherno) {
        $scope.CheckingSession();
        $scope.DVoucherno = DVoucherno;
        $http({



            method: "POST",
            url: "Inwardwallet.php",
            data: {

                'DVoucherno': $scope.DVoucherno,
                'Method': 'FetchMaster'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Chartofaccount = response.data.Chartofaccount;
            $scope.DVoucherdate = response.data.DVoucherdate;
            $scope.Receivername = response.data.Receivername;
            $scope.ReceiverImagePath = response.data.ReceiverImagePath;
            $scope.DVNotes = response.data.DVNotes;
            $scope.DVStatus = response.data.DVStatus;
            $scope.Receiversignature = response.data.Receiversignature;
            $scope.VoucherType = response.data.VoucherType;
            $scope.DVoucherdate2 = response.data.DVoucherdate2;
            $scope.Receivertype = response.data.Receivertype;
            $scope.VoucherLocation = response.data.LocationName;




        });
        $scope.GetDVDetailList();

    }


    $scope.GetDVDetailList = function() {
            $http({



                method: "POST",
                url: "Inwardwallet.php",
                data: {
                    'DVoucherno': $scope.DVoucherno,
                    'Method': 'SelectDCList'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {



                $scope.GetVoucherDetailList = response.data.data01;


            });

        }
        //////////////////////////
    $scope.SendTransactionNo = function(Transactionno, Transactiontype) {
        $scope.Transactionno = Transactionno;
        $scope.Transactiontype = Transactiontype;
        $http({



            method: "POST",
            url: "Inwardwallet.php",
            data: {
                'Transactionno': $scope.Transactionno,
                'Transactiontype': $scope.Transactiontype,
                'Method': 'TRANSACTION'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {



            $scope.Transactionno = response.data.Transactionno;

            $scope.Transactiontype = response.data.Transactiontype;
            $scope.CheckType($scope.Transactiontype, $scope.Transactionno);

        });

    }

    $scope.CheckType = function(Transactiontype, Transactionno) {
        $scope.Transactiontype = Transactiontype;
        $scope.Transactionno = Transactionno;

        if ($scope.Transactiontype == "Payment") {
            $scope.DVoucherno = $scope.Transactionno;
            $scope.FetchVoucherMaster($scope.Transactionno);
            //  $('#ModalVoucher').modal('show');
        } else {
            $scope.InwardMasterno = $scope.Transactionno;
            $scope.FetchWalletMaster($scope.InwardMasterno);
            // $('#ModalWallet').modal('show');

        }
    }



    $scope.FetchWalletMaster = function(InwardMasterno) {
            $scope.CheckingSession();
            $scope.InwardMasterno = InwardMasterno;
            $http({



                method: "POST",
                url: "Inwardwallet.php",
                data: {

                    'InwardMasterno': $scope.InwardMasterno,
                    'Method': 'FetchWalletMaster'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.Inwardtype = response.data.Inwardtype;
                $scope.Inwarddate2 = response.data.Inwarddate2;
                $scope.Inwardamount = response.data.Inwardamount;
                $scope.InwardLocation = response.data.InwardLocation;
                $scope.InwardNotes = response.data.InwardNotes;





            });


        }
        /////////////////////////
    $(function() {

        $("#data_to_image_btn").click(function() {

            $scope.btnopen = false;


            var HTML_Width = $("#pdfExport").width();
            var HTML_Height = $("#pdfExport").height();
            var data = document.getElementById('pdfExport');
            html2canvas(data, {
                allowTaint: true,
                scale: 3,
                useCORS: true
            }).then(canvas => {


                var contentWidth = canvas.width;
                var contentHeight = canvas.height;
                //One page pdf shows the canvas height generated by html pages.
                var pageHeight = contentWidth / 592.28 * 841.89;
                //html page height without pdf generation
                var leftHeight = contentHeight;
                //Page offset
                var position = 2;
                //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
                var imgWidth = 595.28;
                var imgHeight = 592.28 / contentWidth * contentHeight;
                var pageData = canvas.toDataURL('image/jpeg', 1.0);
                var pdf = new jsPDF('', 'pt', 'a4');
                //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
                //When the content does not exceed the range of pdf page display, there is no need to paginate
                if (leftHeight < pageHeight) {
                    pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        pdf.addImage(pageData, 'jpg', 2, position, imgWidth, imgHeight)
                        leftHeight -= pageHeight;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                // pdf.save('content.pdf');


                window.open(pdf.output('bloburl', {
                    filename: 'new-file.pdf'
                }), '_blank');

                $scope.btnopen = true;

            });

        });

    });
    //////////////////////////////
    $scope.GETREPORT = function() {
        var location = $("#multiple-checkboxes").val();
        $scope.Testlocation = location;
        $http(

            {

                method: "POST",
                url: "Inwardwallet.php",
                data: {
                    'Fromdate': $scope.Fromdate,
                    'Todate': $scope.Todate,
                    'Locationid': $scope.Testlocation,
                    'Method': 'Report'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {





        });
    }

});