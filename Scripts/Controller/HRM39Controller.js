var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM39Controller', function($scope, $http, $timeout) {


    /////////////////////////////////////
    $scope.currentPagePayroll01 = 1;
    $scope.pageSizePayroll01 = 10;
    $scope.GrandTotal = 0;


    ///////////////////////////////////////////////////

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


    $(document).ready(function(e) {
        $scope.CheckingSession();
        $('#fileButton05').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInput05').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput05').files[x]);
            }



            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Exceltest.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInput05").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

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

    //////////////////////
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
    ////////////////////////////////////////////

    $scope.GetWorkingdays = function() {
            $("#overlay").fadeIn(300);
            var Category = $("#multiple-checkboxes").val();
            $scope.Category = Category;
            $http(

                {

                    method: "POST",
                    url: "Payrollrptcontroller.php",
                    data: {
                        'Payrollmonth': $scope.Payrollmonth,
                        'Payrollyear': $scope.Payrollyear,
                        'Category': $scope.Category,
                        'Method': 'GETINBEDETAILS'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {


                $scope.GetInwardTransactionList = response.data.data01;
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);


            });
        }
        //////////////////////////////////////
    $scope.getVolumeNetSum = function(items) {
        var total = 0;
        angular.forEach(items, function(item) {
            total += parseFloat(item.NetWages);
        });
        return total;
    };
    ///////////////////////
    $scope.getVolumePerformanceSum = function(items) {
        var total = 0;
        angular.forEach(items, function(item) {
            total += parseFloat(item.Performanceallowance);
        });
        return total;
    };
    ////////////////////

    $http({
        method: "POST",
        url: "Payrollrptcontroller.php",
        data: {

            'Method': "FetchDate"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {

        // $scope.Working_Days = 26;


        $scope.Payrollmonth = response.data.Payrollmonth;
        $scope.Payrollyear = response.data.Payrollyear;

    });
    /////////////////////////////////////

    $scope.GetMonthSession = function() {
        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Payrollmonth': $scope.Payrollmonth,
                    'Payrollyear': $scope.Payrollyear,
                    'Category': $scope.Category,
                    'Method': 'GETSESSION'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {





        });
    }

    $scope.GetBankSession = function() {
            $http(

                {

                    method: "POST",
                    url: "Payrollrptcontroller.php",
                    data: {
                        'Payrollmonth': $scope.Payrollmonth,
                        'Payrollyear': $scope.Payrollyear,

                        'Method': 'GETBANKSESSION'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {





            });
        }
        ///////////////////////////
    $scope.GetEmpDetails = function() {
            $("#overlay").fadeIn(300);

            $http(

                {

                    method: "POST",
                    url: "Payrollrptcontroller.php",
                    data: {
                        'Payrollmonth': $scope.Payrollmonth,
                        'Payrollyear': $scope.Payrollyear,

                        'Method': 'GETBANKDETAILS'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {


                $scope.GetBankList = response.data.data01;
                $scope.GrandTotal = response.data.GrandTotal;
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);

            });
        }
        //////////////////////////////////


    $(document).ready(function(e) {
        $scope.CheckingSession();


        $('#fileButtonEmp').on('click', function() {
            $("#overlay").fadeIn(300);
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBulkEmp').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBulkEmp').files[x]);
            }

           
            $.ajax({
                url: 'EmpBulkUploadDetails.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    $("#overlay").fadeOut(300);
                    alert(response);
                  
                    document.getElementById("fileInputBulkEmp").value = '';
                    //  $scope.GetDeductionDetails();
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                },
                error: function(response) {
                    // alert(response);
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
   
    $(document).ready(function(e) {
        $scope.CheckingSession();


        $('#fileButtonEmp01').on('click', function() {
            $("#overlay").fadeIn(300);
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBulkEmpSalary').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBulkEmpSalary').files[x]);
            }

            // form_data.append("Payrollmonth", $("#Payrollmonth").val());
            // form_data.append("Payrollyear", $("#Payrollyear").val());



            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'EmpSalary.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    $("#overlay").fadeOut(300);
                    document.getElementById("fileInputBulkEmp").value = '';
                    //  $scope.GetDeductionDetails();
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                },
                error: function(response) {
                    // alert(response);
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
    //////////////////////////////////

 ///////////////////////////////////////////

    $(document).ready(function(e) {
        $scope.CheckingSession();


        $('#fileButtonEmpLeave').on('click', function() {
            $("#overlay").fadeIn(300);
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBulkEmpLeave').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBulkEmpLeave').files[x]);
            }

           



            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Employeeleavesummaryadd.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    $("#overlay").fadeOut(300);
                    alert(response);
              if(response=='Data Exists')
              {
                if (confirm("Do you want to overwrite the existing file?") == true) {

                    Overwritefile();
                   
                } else {
                    Textdata = " Cancelled!";
                   // document.getElementById("fileInputBulkEmpLeave").value = '';
                }
    
                document.getElementById("msg").innerHTML = Textdata;
              }
            
                  //document.getElementById("fileInputBulkEmpLeave").value = '';
                    //  $scope.GetDeductionDetails();
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

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
    ///////////////////////////////////////
    function Overwritefile()
    {
        
        var form_data = new FormData();
        var ins = document.getElementById('fileInputBulkEmpLeave').files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('fileInputBulkEmpLeave').files[x]);
        }

    
        $.ajax({
            url: 'Employeeleavesummaryaddoverwrite.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response) {
                $("#overlay").fadeOut(300);
                alert(response);
         
                
              //  document.getElementById("fileInputBulkEmpLeave").value = '';
                //  $scope.GetDeductionDetails();
                $('#msg1').html(response);
                setTimeout(function() {
                    $('#msg1')
                        .empty().append("");

                    $scope.Message = "";
                }, 3000);

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
    }
});