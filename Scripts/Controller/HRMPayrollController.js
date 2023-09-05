var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize', 'ngRoute', 'ngResource', 'angular.filter', 'ngTable']);
app.controller('HRMPayrollController', function($scope, $http, $timeout) {

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



    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
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
        $scope.Authorizedno = response.data.Authorizedno;

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


                $scope.GetBankListnew = response.data.data01;
                $scope.GrandTotal = response.data.GrandTotal;
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);

            });
        }
        //////////////////////////////////
    $(document).ready(function(e) {
        $scope.CheckingSession();


        $('#fileButton05').on('click', function() {
            $("#overlay").fadeIn(300);
            var form_data = new FormData();
            var ins = document.getElementById('fileInput05').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput05').files[x]);
            }

            form_data.append("Payrollmonth", $("#Payrollmonth").val());
            form_data.append("Payrollyear", $("#Payrollyear").val());



            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Empbulkupload.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    $("#overlay").fadeOut(300);
                    document.getElementById("fileInput05").value = '';
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
    //////////////////////////////////////
    $scope.GetDeductionDetails = function() {
            $("#overlay").fadeIn(300);

            $http(

                {

                    method: "POST",
                    url: "Payrollrptcontroller.php",
                    data: {
                        'Payrollmonth': $scope.Payrollmonth,
                        'Payrollyear': $scope.Payrollyear,

                        'Method': 'GETDEDUCTIONDETAILS'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {


                $scope.GetBankList = response.data.data01;

                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);

            });
        }
        ////////////////////////////////
    $scope.ConfirmList = function() {
        $("#overlay").fadeIn(300);
        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Payrollmonth': $scope.Payrollmonth,
                    'Payrollyear': $scope.Payrollyear,

                    'Method': 'ConfirmList'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();





            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);

        });
    }
    $scope.TempSave = function() {

        if ($scope.TempMessage == "No Record") {
            $scope.Message = true;
            $scope.Message = "No Record Found Please Check...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Success") {
            $scope.Message = true;
            $scope.Message = "Data Saved/Updated Successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Error") {
            $scope.Message = true;
            $scope.Message = "Error in Saving / Updating...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Record Not Processed") {
            $scope.Message = true;
            $scope.Message = "Some Record Not Processed Please Check ...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully ...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Mail Sent") {
            $scope.Message = true;
            $scope.Message = "Email Sent Successfully ...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Error sending") {
            $scope.Message = true;
            $scope.Message = "Error in Email Sending ...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }






    }


    $scope.GetMonthSession02 = function() {
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
                    'Method': 'GETSESSION'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {





        });
    }

    $scope.GetDeductionDetails = function() {

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
                    'Method': 'GETDEDUCTIONLIST'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            // alert(response.data);
            $scope.GetDeductionList = response.data.data01;
            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);


        });
    }

    $scope.FetchDeductionEdit02 = function(Salyear, SalMonth, Employeeid) {

        $scope.Salyear = Salyear;
        $scope.SalMonth = SalMonth;
        $scope.Employeeid = Employeeid;

        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Salyear': $scope.Salyear,
                    'SalMonth': $scope.SalMonth,
                    'Employeeid': $scope.Employeeid,

                    'Method': 'FetchDeduction'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            $scope.Fullname = response.data.Fullname;
            $scope.Department = response.data.Department;
            $scope.Designation = response.data.Designation;
            $scope.Salary_Advance = response.data.Salary_Advance;
            $scope.FoodDeduction = response.data.FoodDeduction;
            $scope.TDS = response.data.TDS;
            $scope.Editrequest = response.data.Editrequest;
            $scope.Editrequestapproval = response.data.Editrequestapproval;
            $scope.Deleterequest = response.data.Deleterequest;
            $scope.Deleterequestapproval = response.data.Deleterequestapproval;
            $scope.Editrequestreasonraisedby = response.data.Editrequestreasonraisedby;
            $scope.Deleterequestreasonraisedby = response.data.Deleterequestreasonraisedby;
            $scope.Editingreason = response.data.Editingreason;
            $scope.Deletingreason = response.data.Deletingreason;
            $scope.Category = response.data.Category;


            $scope.Editpopup();




        });


    }

    $scope.FetchDeductionEdit03 = function(Salyear, SalMonth, Employeeid) {

        $scope.Salyear = Salyear;
        $scope.SalMonth = SalMonth;
        $scope.Employeeid = Employeeid;

        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Salyear': $scope.Salyear,
                    'SalMonth': $scope.SalMonth,
                    'Employeeid': $scope.Employeeid,

                    'Method': 'FetchDeduction'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            $scope.Fullname = response.data.Fullname;
            $scope.Department = response.data.Department;
            $scope.Designation = response.data.Designation;
            $scope.Salary_Advance = response.data.Salary_Advance;
            $scope.FoodDeduction = response.data.FoodDeduction;
            $scope.TDS = response.data.TDS;
            $scope.Editrequest = response.data.Editrequest;
            $scope.Editrequestapproval = response.data.Editrequestapproval;
            $scope.Deleterequest = response.data.Deleterequest;
            $scope.Deleterequestapproval = response.data.Deleterequestapproval;
            $scope.Editrequestreasonraisedby = response.data.Editrequestreasonraisedby;
            $scope.Deleterequestreasonraisedby = response.data.Deleterequestreasonraisedby;
            $scope.Editingreason = response.data.Editingreason;
            $scope.Deletingreason = response.data.Deletingreason;
            $scope.Category = response.data.Category;


            $scope.Deletepopup($scope.Deleterequestapproval);




        });


    }


    $scope.Deletepopup = function(Deleterequestapproval) {
        $scope.Deleterequestapproval = Deleterequestapproval;
        if ($scope.Deleterequestapproval == "Approved") {
            $('#ModalPayrollDelete').modal('show');
        } else {
            $('#ModalDeletingReason').modal('show');
        }

    }
    $scope.FetchDeductionEdit = function(Salyear, SalMonth, Employeeid) {


        $scope.Salyear = Salyear;
        $scope.SalMonth = SalMonth;
        $scope.Employeeid = Employeeid;

        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Salyear': $scope.Salyear,
                    'SalMonth': $scope.SalMonth,
                    'Employeeid': $scope.Employeeid,

                    'Method': 'FetchDeduction'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            $scope.Fullname = response.data.Fullname;
            $scope.Department = response.data.Department;
            $scope.Designation = response.data.Designation;
            $scope.Salary_Advance = response.data.Salary_Advance;
            $scope.FoodDeduction = response.data.FoodDeduction;
            $scope.TDS = response.data.TDS;
            $scope.Editrequest = response.data.Editrequest;
            $scope.Editrequestapproval = response.data.Editrequestapproval;
            $scope.Deleterequest = response.data.Deleterequest;
            $scope.Deleterequestapproval = response.data.Deleterequestapproval;
            $scope.Editrequestreasonraisedby = response.data.Editrequestreasonraisedby;
            $scope.Deleterequestreasonraisedby = response.data.Deleterequestreasonraisedby;
            $scope.Editingreason = response.data.Editingreason;
            $scope.Deletingreason = response.data.Deletingreason;
            $scope.Category = response.data.Category;







        });
    }

    $scope.Editpopup = function() {

        $('#ModalEditingReason').modal('show');

    }

    $scope.UpdateEditingReason = function() {
        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Salyear': $scope.Salyear,
                    'SalMonth': $scope.SalMonth,
                    'Employeeid': $scope.Employeeid,
                    'Editingreason': $scope.Editingreason,

                    'Method': 'UpdateEditingreason'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();




            $scope.GetDeductionDetails();



        });
    }
    $scope.UpdateDeletingReason = function() {
        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Salyear': $scope.Salyear,
                    'SalMonth': $scope.SalMonth,
                    'Employeeid': $scope.Employeeid,
                    'Deletingreason': $scope.Deletingreason,

                    'Method': 'UpdateDeletingReason'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();


            $scope.GetDeductionDetails();





        });
    }


    $scope.DeleteConfirmation = function() {
            $http(

                {

                    method: "POST",
                    url: "Payrollrptcontroller.php",
                    data: {
                        'Salyear': $scope.Salyear,
                        'SalMonth': $scope.SalMonth,
                        'Employeeid': $scope.Employeeid,


                        'Method': 'DeleteDeduction'
                    },
                    headers: { 'Content-Type': 'application/json' }

                }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();


                $scope.GetDeductionDetails();





            });
        }
        ////////////////////
    $scope.Getcalvalue = function(Employeeid, SalMonth, Salyear, Salary_Advance, FoodDeduction, TDS, Editrequestapproval, Deleterequestapproval, index) {
        $scope.Employeeid = Employeeid;
        $scope.SalMonth = SalMonth;
        $scope.Salyear = Salyear;
        $scope.Salary_Advance = Salary_Advance;
        $scope.FoodDeduction = FoodDeduction;
        $scope.TDS = TDS;
        $scope.Editrequestapproval = Editrequestapproval;
        $scope.Deleterequestapproval = Deleterequestapproval;
        $scope.index = index;

        $http(

            {

                method: "POST",
                url: "Payrollrptcontroller.php",
                data: {
                    'Salyear': $scope.Salyear,
                    'SalMonth': $scope.SalMonth,
                    'Employeeid': $scope.Employeeid,
                    'Salary_Advance': $scope.Salary_Advance,
                    'FoodDeduction': $scope.FoodDeduction,
                    'TDS': $scope.TDS,
                    'Editrequestapproval': $scope.Editrequestapproval,
                    'Deleterequestapproval': $scope.Deleterequestapproval,



                    'Method': 'UpdateDetails'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();








        });
    }



    $http(

        {

            method: "POST",
            url: "Payrollrptcontroller.php",
            data: {

                'Method': 'ESILIST'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


        $scope.GetEsiList = response.data.data01;







    });


    $scope.RecuriseDateFormat = function(date) {
        return new Date(date);
    }
});