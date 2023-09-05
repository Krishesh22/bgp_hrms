var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM30Controller', function($scope, $http, $timeout) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageDepartment = 1;
    $scope.pageSizeDepartment = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";

    $scope.currentPageVoucherDetail = 1;
    $scope.pageSizeVoucherDetail = 10;
    $scope.Receivername = "";
    $scope.Chartofaccount = "";
    $scope.DVStatus = "Open";
    $scope.Particulars = "";
    $scope.DVAmount = "0";
    $scope.btnSave = true;
    $scope.btnUpdate = false;
    // $scope.currentPageVoucherDetail = 1;
    // $scope.pageSizeVoucherDetail = 10;
    $scope.btndetails = false;
    $scope.btncamera = false;
    $scope.btnsign = false;
    $scope.btncash = false;
    $scope.btndetails = true;
    $scope.btncamera = false;
    $scope.btnsign = false;
    $scope.btncash = false;
    $scope.CurrentPageTransaction = 1;
    $scope.PageSizeTransaction = 10;
    $scope.ReceiverType = "Outside";
    $scope.btnouter = true;
    $scope.btninternal = false;
    $scope.Employeeid = "";
    $scope.Locationid = "";
    $scope.DocumentsTest = "No Documents Available";
    ///////////////////////////////
    $scope.Reset = function() {
        //$scope.CheckingSession();
        $scope.Department = "";
        $scope.btnSave = true;
        $scope.btnUpdate = false;
        $scope.btndetails = true;
        $scope.btncamera = false;
        $scope.btnsign = false;
        $scope.btncash = false;
        $scope.Receivername = "";
        $scope.Chartofaccount = "";
        $scope.DVStatus = "Open";
        $scope.Particulars = "";
        $scope.DVAmount = "0";
        $scope.btnSave = true;
        $scope.btnUpdate = false;
        $scope.GetVoucherDetailList = "";
        $scope.DVoucherno = "";
        $scope.ReceiverType = "Outside";
        $scope.btnouter = true;
        $scope.btninternal = false;
        $scope.Employeeid = "";
        $scope.Locationid = "";
        $scope.Getnextno();

        $scope.ResetDetail();
        $scope.Getlocation();



    }

    $scope.TempSave = function() {

        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Please Enter Detail";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Chartofaccount") {
            $scope.Message = true;
            $scope.Message = "Please Select Head Of Account";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "InwardAmtLess") {
            $scope.Message = true;
            $scope.Message = "Available Amount is Less than Voucher Amount";
            alert("Available Amount is Less than Voucher Amount");
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.DVAmount = 0;
        }
        if ($scope.TempMessage == "Receivername") {
            $scope.Message = true;
            $scope.Message = "Please Enter Receiver Name";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Particulars") {
            $scope.Message = true;
            $scope.Message = "Please Enter Particulars Details";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "DVAmount") {
            $scope.Message = true;
            $scope.Message = "Please Enter Amount";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "EnterDVAmount") {
            $scope.Message = true;
            $scope.Message = "Please Enter Amount";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "DVoucherdate") {
            $scope.Message = true;
            $scope.Message = "Please Enter Date";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Exists") {
            $scope.Message = true;
            $scope.Message = "This Data Already Exists";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }

        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }

        if ($scope.TempMessage == "Detail Save") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Locationid") {
            $scope.Message = true;
            $scope.Message = "Please Select Location";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Data Updated Successfully";

            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "MasterSave") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully";
            $scope.btnSave = false;
            $scope.btnUpdate = true;
            $scope.DVoucherno = $scope.Tempnextno;
            $scope.Fileuploadfunction();
            $timeout(function() { $scope.Message = ""; }, 3000);


        }



    }

    /////////////////////////////////////////////
    $scope.fndetailsinfo = function() {
        $scope.btndetails = true;
        $scope.btncamera = false;
        $scope.btnsign = false;
        $scope.btncash = false;

        // $scope.Reset();


    }

    $scope.fncamerainfo = function() {
        $scope.btndetails = false;
        $scope.btncamera = true;
        $scope.btnsign = false;
        $scope.btncash = false;
        $scope.FetchVoucherMaster($scope.DVoucherno);
        // $scope.Reset();
    }

    $scope.fnsigninfo = function() {
        $scope.btndetails = false;
        $scope.btncamera = false;
        $scope.btnsign = true;
        $scope.btncash = false;
        $scope.FetchVoucherMaster($scope.DVoucherno);
        //   $scope.Reset();
    }

    $scope.fncashinfo = function() {
            $scope.btndetails = false;
            $scope.btncamera = false;
            $scope.btnsign = false;
            $scope.btncash = true;
            $scope.FetchVoucherMaster($scope.DVoucherno);

            // $scope.Reset();
        }
        //////////////////////////////////
    $scope.Getnextno = function() {
            $http(

                {

                    method: "POST",
                    url: "Voucher.php",
                    data: { 'Method': 'ModuleNext' },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                }).then(function successCallback(response) {
                //////// alert(response.data);
                $scope.DVoucherno = response.data;
            });

            $http({



                method: "POST",
                url: "Voucher.php",
                data: {
                    'DVoucherno': $scope.DVoucherno,
                    'Method': 'DVDETAILNO'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                //alert(response.data);

                $scope.DVdetailno = response.data.Sno;

            });
        }
        ///////////////////////////////////////////////////////////////////
    $http(

        {

            method: "POST",
            url: "Voucher.php",
            data: { 'Method': 'ModuleNext' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.DVoucherno = response.data;
        $scope.DVDetailNextno();
        $scope.GetChartOfAccount();
        $scope.FetchTodayDate();
    });
    //////////////////////////

    $scope.DVDetailNextno = function() {
            //alert($scope.Employeeid);
            $http({



                method: "POST",
                url: "Voucher.php",
                data: {
                    'DVoucherno': $scope.DVoucherno,
                    'Method': 'DVDETAILNO'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                //alert(response.data);

                $scope.DVdetailno = response.data.Sno;

            });
        }
        //////////////////////////////////////

    $scope.GetChartOfAccount = function() {
        $http({



            method: "POST",
            url: "Voucher.php",
            data: {

                'Method': 'ChartOfAccountList'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {



            $scope.GetChartOfAccountList = response.data.data01;


        });

    };
    ////////////////////////////////
    $scope.FetchTodayDate = function() {
            $http({



                method: "POST",
                url: "Voucher.php",
                data: { 'Method': 'FetchDate' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.DVoucherdate = response.data.date;
                $scope.Fromdate = response.data.date;
                $scope.Todate = response.data.date;


            });
        }
        //////////////////////////////

    $scope.GetDVDetailList = function() {
            $http({



                method: "POST",
                url: "Voucher.php",
                data: {
                    'DVoucherno': $scope.DVoucherno,
                    'Method': 'SelectDCList'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {



                $scope.GetVoucherDetailList = response.data.data01;


            });

        }
        /////////////////////////////


    $scope.SaveVoucherNo = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Voucher.php",
            data: {
                'DVoucherno': $scope.DVoucherno,
                'DVoucherdate': $scope.DVoucherdate,
                'DVStatus': $scope.DVStatus,
                'Receivername': $scope.Receivername,
                'Chartofaccount': $scope.Chartofaccount,
                'DVdetailno': $scope.DVdetailno,
                'Particulars': $scope.Particulars,
                'DVAmount': $scope.DVAmount,
                'Employeeid': $scope.Employeeid,
                'ReceiverType': $scope.ReceiverType,
                'Locationid': $scope.Locationid,

                'Method': 'Save'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);


            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;


            $scope.TempSave();
            $scope.GetDVDetailList();
            $scope.GETLocationwiseBalance();
        });

    };

    /////////////////////


    $scope.Fileuploadfunction = function() {
        var form_data = new FormData();
        var ins = document.getElementById('fileInput04').files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('fileInput04').files[x]);
        }

        // form_data.append("files", files[i]);
        form_data.append("DVoucherno", $("#DVoucherno").val());
        form_data.append("DVdetailno", $("#DVdetailno").val());



        //  alert($("#Documenttype").val());
        $.ajax({
            url: 'Uploadcashvoucher.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {

                //  alert(response);
                document.getElementById("fileInput04").value = '';

                $('#msg1').html(response);
                setTimeout(function() {
                    $('#msg1')
                        .empty().append("");


                }, 3000);
                $scope.GetDVDetailList();
                //    $scope.DisplayCandidateEducation();
                // display success response from the PHP script
            },
            error: function(response) {
                //alert(response);
                $('#msg1').html(response);
                setTimeout(function() {
                    $('#msg1')
                        .empty().append("");

                    $scope.Message = "";
                }, 3000); // display error response from the PHP script
            }
        });
    }

    $scope.GetDVMaster = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Voucher.php",
            data: {

                'Method': 'MasterDCList'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {



            $scope.GetDVoucherList02 = response.data.data01;


        });

    };

    ///////////////////////////
    $http({



        method: "POST",
        url: "Voucher.php",
        data: {

            'Method': 'MasterDCList'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {



        $scope.GetDVoucherList02 = response.data.data01;


    });


    ///////////////////////////
    $http({



        method: "POST",
        url: "Voucher.php",
        data: {

            'Method': 'MasterDCListVIEW'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {



        $scope.GetDVoucherListview = response.data.data01;


    });
    //////////////////////////////////
    $scope.SendEdit02 = function(DVoucherno) {
        $scope.DVoucherno = DVoucherno;
        $('#myCarousel').carousel(1);

        $scope.FetchVoucherMaster($scope.DVoucherno);
        $scope.btndetails = true;
        $scope.btncamera = false;
        $scope.btnsign = false;
        $scope.btncash = false;
    }


    /////////////////////


    $scope.FetchVoucherMaster = function(DVoucherno) {
            $scope.CheckingSession();
            $scope.DVoucherno = DVoucherno;
            $http({



                method: "POST",
                url: "Voucher.php",
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




            });
            $scope.GetDVDetailList();
            $scope.ResetDetail();
        }
        ///////////////////////////////////
    $scope.ResetDetail = function() {
            $scope.Particulars = "";
            $scope.DVAmount = "0";
            $scope.DVDetailNextno();
        }
        /////////////////////
    $scope.UpdateVoucherNo = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Voucher.php",
            data: {
                'DVoucherno': $scope.DVoucherno,
                'DVoucherdate': $scope.DVoucherdate,
                'DVStatus': $scope.DVStatus,
                'Receivername': $scope.Receivername,
                'Chartofaccount': $scope.Chartofaccount,
                'DVdetailno': $scope.DVdetailno,
                'Particulars': $scope.Particulars,
                'DVAmount': $scope.DVAmount,
                'Employeeid': $scope.Employeeid,
                'ReceiverType': $scope.ReceiverType,
                'Locationid': $scope.Locationid,

                'Method': 'Update'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);


            $scope.TempMessage = response.data.Message;
            $scope.Fileuploadfunction();
            // $scope.Tempnextno = response.data.Nextno;


            $scope.TempSave();
            $scope.GetDVDetailList();
            $scope.GETLocationwiseBalance();
        });

    };
    /////////////////////////////////////////
    $scope.SendDetailEdit = function(DVoucherno, DVdetailno) {
            $scope.DVoucherno = DVoucherno;
            $scope.DVdetailno = DVdetailno;
            $http({



                method: "POST",
                url: "Voucher.php",
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
        ///////////////
    $scope.DeleteDetail = function() {

        // $scope.DVoucherno = DVoucherno;
        // $scope.DVdetailno = DVdetailno;
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Voucher.php",
            data: {

                'DVoucherno': $scope.DVoucherno,
                'DVdetailno': $scope.DVdetailno,
                'Method': 'FetchDelete'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {



            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.ResetDetail();
            $scope.GetDVDetailList();



        });
    }

    ////////////////////////////////
    // var sig = $('#sig').signature({
    //     syncField: '#signature64',
    //     syncFormat: 'PNG'

    // });
    ///////////////////////////////////////////////
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
    //////////////////////////////////////////////////////
    $('#formupload').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $('#formupload').attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    $scope.FetchVoucherMaster($scope.DVoucherno);
                    $('#msg3').empty().append("Signature Saved");

                    setTimeout(function() {
                        $('#msg3').empty().append("");
                    }, 1500);

                    if (condition) {} else {}
                }
            })
        })
        ////////////////////////////////////////////////////////
    $scope.SaveSign = function() {
            $scope.CheckingSession();
            $http({
                method: "POST",
                url: "Signature.php",
                data: { 'signed': $scope.signature64, 'Method': 'Test' },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {

                alert(response.data);
            });
        }
        /////////////////////////////////////
    $('#Imageupload').on('submit', function(e) {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $('#Imageupload').attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    $scope.FetchVoucherMaster($scope.DVoucherno);
                    $('#msg3').empty().append("Image Saved");
                    setTimeout(function() {
                        $('#msg3').empty().append("");
                    }, 1500);
                    if (condition) {} else {}
                }
            })
        })
        //////////////////////

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
        //////////////////////////
    $scope.CheckInwardAmount = function(DVAmount, Locationid) {
        $scope.DVAmount = DVAmount;
        $scope.Locationid = Locationid;
        $http({



            method: "POST",
            url: "Voucher.php",
            data: {

                'DVAmount': $scope.DVAmount,
                'Locationid': $scope.Locationid,
                'Method': 'CheckInwardAmount'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {



            $scope.TempMessage = response.data.Message;
            $scope.TempSave();




        });

    }
    $scope.GetInbetweendateDetails = function() {
        var chartofaccount = $("#multiple-checkboxes").val();
        $scope.Chartofaccountest = chartofaccount;
        $http(

            {

                method: "POST",
                url: "Voucher.php",
                data: {
                    'Fromdate': $scope.Fromdate,
                    'Todate': $scope.Todate,
                    'Chartofaccount': $scope.Chartofaccountest,
                    'Method': 'GETINBEDETAILS'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


            $scope.GetInwardTransactionList = response.data.data01;
            $scope.Fromdate2 = response.data.Fromdate2;
            $scope.Todate2 = response.data.Todate2;


        });
    }

    ///////////////////////////
    $scope.GetReceivertype = function(ReceiverType) {
        $scope.ReceiverType = ReceiverType;
        if ($scope.ReceiverType == "Internal") {
            $scope.btninternal = true;
            $scope.btnouter = false;
            $scope.GetEmpDETAIL();
        } else {
            $scope.btninternal = false;
            $scope.btnouter = true;
        }
    }

    //////////////////////////////////
    $scope.GetEmpDETAIL = function() {
            $http(

                {

                    method: "POST",
                    url: "Voucher.php",
                    data: {

                        'Method': 'GETEMPLIST'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {


                $scope.GetEmployeeList = response.data.data01;



            });
        }
        /////////////////////////////////////////////
    $scope.FetchReceivername = function(Employeeid) {
            $scope.CheckingSession();
            $scope.Employeeid = Employeeid;
            $http({



                method: "POST",
                url: "Voucher.php",
                data: {

                    'Employeeid': $scope.Employeeid,
                    'Method': 'FetchEmp'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.Receivername = response.data.Fullname;





            });

        }
        //////////////////////////////////////////////////////


    $http({



        method: "POST",
        url: "Voucher.php",
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
        $scope.GETLocationwiseBalance();
        // $scope.GetAuthorization();



    });
    //////////////////////////////
    $scope.Getlocation = function() {
            $http({



                method: "POST",
                url: "Voucher.php",
                data: {

                    'Method': 'LOCATIONLIST'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {



                $scope.GetLocationList = response.data.data01;



                $scope.Locationid = response.data.Locationid;
                $scope.Authorizedno = response.data.Authorizedno;
                $scope.GetAuthorization();
                $scope.GETLocationwiseBalance();



            });
        }
        ////////////////////////////////////
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
        });
    });


    $(document).ready(function(e) {
        $scope.CheckingSession();
        $('#fileButton04').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInput04').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput04').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("DVoucherno", $("#DVoucherno").val());
            form_data.append("DVdetailno", $("#DVdetailno").val());



            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploadeducationdoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInput04").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");


                    }, 3000);
                    $scope.DisplayEmpEducation();
                    //    $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function(response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });



        });
    });


    $scope.GETLocationwiseBalance = function() {
        $http(

            {

                method: "POST",
                url: "Voucher.php",
                data: {
                    'Locationid': $scope.Locationid,
                    'Method': 'ModuleNextClient'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            //alert(response.data.CurrentdateBalanceAmount);
            // $scope.InwardMasterno = response.data.InwardMasterno;
            $scope.CurrentdateTotalAmount = response.data.CurrentdateTotalAmount;
            $scope.CurrentdateVoucherAmount = response.data.CurrentdateVoucherAmount;
            $scope.CurrentdateBalanceAmount = response.data.CurrentdateBalanceAmount;
            //  $scope.Inwarddate = response.data.Inwarddate;

        });
    }
});