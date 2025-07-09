var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM35Controller', function($scope, $http, $timeout) {

    $scope.Status = "Open";
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    $scope.currentPagePayroll = 1;
    $scope.pageSizePayroll = 10;
    $scope.Nationalholiday = 0;
    $scope.CasualLeave = "1.5";
    $scope.currentPagePayroll01 = 1;
    $scope.pageSizePayroll01 = 10;
    $scope.btnclose = false;
    $scope.btnEmployee = false;
    /////////////////////////////////////////////
    $scope.UpdateStatus = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Status': $scope.Status,
                'SalaryPaidDate': $scope.SalarypaidDate,
                // 'Todate': $scope.Todate,
                'Method': "UpdateStatus"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.CheckStatus($scope.Status);

        });
    }


    ///////////////////////////////////////////////
    $scope.Getnextno = function() {
            $http(

                {

                    method: "POST",
                    url: "PayrollBGP.php",
                    data: { 'Method': 'ModuleNext' },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                }).then(function successCallback(response) {
                //////// alert(response.data);
                $scope.Payrollno = response.data;
            });
        }
        //////////////////////////////////////////////////
    $http(

        {

            method: "POST",
            url: "PayrollBGP.php",
            data: { 'Method': 'ModuleNext' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.Payrollno = response.data;
    });
    //////////////////////////////////////////////////////
    ///////////////////////////////////////////

    $http({
        method: "POST",
        url: "PayrollBGP.php",
        data: {

            'Method': "FetchDate"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {

        $scope.Working_Days = 26;
        $scope.Fromdate = response.data.Fromdate;
        $scope.Todate = response.data.Todate;
        //  $scope.Working_Days = response.data.Working_Days;

        $scope.Payrollmonth = response.data.Payrollmonth;
        $scope.Payrollyear = response.data.Payrollyear;
        $scope.AuthorizedType = response.data.AuthorizedType;
        $scope.Nationalholiday = response.data.Nationalholiday;
        $scope.SalarypaidDate = response.data.TodayDate;
        $scope.TotaDays = response.data.TotalDays;
        $scope.WeekOFF = response.data.Weekoffdays;
        $scope.CheckAdminrights($scope.AuthorizedType);
        $scope.DisplayEmpPayroll();
        $scope.GetStatus();
        $scope.CheckStatus($scope.Status);
        $scope.DisplayViewEmp();
        $scope.CheckingSession();
    });

    /////////////////////////////
    $scope.CheckStatus = function(Status) {
            $scope.Status = Status;
            if ($scope.Status == "Open") {
                $scope.btnclose = false;
                $scope.btnEmployee = false;
                $scope.CheckAdminrights($scope.AuthorizedType);
            } else

            {
                $scope.btnclose = true;
                $scope.btnEmployee = true;
                $scope.btnAdmin = false;
                $scope.btnOtheruser = false;
            }
        }
        //////////////////

    $scope.CheckAdminrights = function(AuthorizedType) {
        $scope.AuthorizedType = AuthorizedType;
        // alert($scope.AuthorizedType);
        if ($scope.AuthorizedType == "ADMIN") {
            $scope.btnAdmin = true;
            $scope.btnOtheruser = false;
            $scope.btnclose = false;
        } else {
            $scope.btnAdmin = false;
            $scope.btnOtheruser = true;
            $scope.btnclose = false;
        }

    }

    //////////////////////////////////////////
    $scope.GetWorkingdays = function() {
        $scope.Working_Days = 26;
        $http({
            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                // 'Todate': $scope.Todate,
                'Method': "FetchDays"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {


            $scope.Nationalholiday = response.data.Nationalholiday;
            $scope.TotaDays = response.data.TotalDays;
            $scope.WeekOFF = response.data.Weekoffdays;
            $scope.GetStatus();
            $scope.DisplayEmpPayroll();
            $scope.DisplayViewEmp();

        });
    }

    ///////////////////////////////////

    $scope.GetStatus = function() {

        $http({
            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,

                'Method': "FetchPayrollTemp"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {


            $scope.Status = response.data.Payrollstatus;
            $scope.SalarypaidDate = response.data.SalaryPaidDate;

            $scope.CheckStatus($scope.Status);
            $scope.CheckingSession();

        });
    }


    //////////////////////////////////////
    $scope.Getallemployee = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "PayrollBGP.php",
            data: { 'Method': 'EmployeeALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeList = response.data;
        });
    };
    /////////////////////////////////////
    $scope.folder = {};

    /////////////////////////////////
    $scope.getAllSelected = function() {

            $scope.Empidarray = [];


            angular.forEach($scope.folder, function(key, value) {
                if (key)
                    $scope.Empidarray.push(value)
            });

            $scope.SaveMultiple();






        }
        //////////////////////////////////////////////////////////////////////

    $scope.SaveMultiple = function() {
        $scope.CheckingSession();
        $scope.Message = "Please wait data will be saved..............";


        $http({


            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Fromdate': $scope.Fromdate,
                'Todate': $scope.Todate,
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Working_Days': $scope.Working_Days,
                'Nationalholiday': $scope.Nationalholiday,
                'Status': $scope.Status,
                'CasualLeave': $scope.CasualLeave,
                'Emparray': $scope.Empidarray,
                'TotaDays': $scope.TotaDays,
                'WeekOFF': $scope.WeekOFF,


                'Method': 'Fetcharray'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //$scope.Message = "Please Enter Detail";
            $timeout(function() { $scope.Message = ""; }, 3000);

            //   alert(response.data.Message);
            $scope.DisplayEmpPayroll();



        });
    }

    ////////////   

    $scope.Selectallemp = function() {
            $scope.Message = "Please wait data will be saved ............";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            $http({


                method: "POST",
                url: "PayrollBGP.php",
                data: {
                    'Fromdate': $scope.Fromdate,
                    'Todate': $scope.Todate,
                    'Payrollmonth': $scope.Payrollmonth,
                    'Payrollyear': $scope.Payrollyear,
                    'Working_Days': $scope.Working_Days,
                    'Nationalholiday': $scope.Nationalholiday,
                    'Status': $scope.Status,
                    'CasualLeave': $scope.CasualLeave,
                    'TotaDays': $scope.TotaDays,
                    'WeekOFF': $scope.WeekOFF,



                    'Method': 'FetchBulk'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //$scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);

                $scope.DisplayEmpPayroll();



            });
        }
        /////////////////////////
    $scope.DisplayEmpPayroll = function() {
        $scope.GetPayrollList = null;
        $http({



            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Method': 'EMPPAYROLL'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetPayrollList = response.data.data01;

        });

    };
    //////////////////////
    $scope.Getcalvalue = function(Employeeid, SalMonth, Salyear, Workeddays, Leavedays, Salary_Advance, FoodDeduction, TDS, Category, Workingdays, Nationalholidays, CL, BasicDA, HRA, Otherallowance_Con_SA, DailyAllowanance, OT_HRS, Presentdays, AbsentDays, Weekoff, SL, EL) {
            $scope.Employeeid = Employeeid;
            $scope.SalMonth = SalMonth;
            $scope.Salyear = Salyear;
            $scope.Workeddays = Workeddays;
            $scope.Leavedays = Leavedays;
            $scope.Salary_Advance = Salary_Advance;
            $scope.FoodDeduction = FoodDeduction;
            $scope.TDS = TDS;
            $scope.Category = Category;
            $scope.Workingdays = Workingdays;
            $scope.Nationalholidays = Nationalholidays;
            $scope.CL = CL;
            $scope.BasicDA = BasicDA;
            $scope.HRA = HRA;
            $scope.Otherallowance_Con_SA = Otherallowance_Con_SA;
            $scope.DailyAllowanance = DailyAllowanance;
            $scope.Presentdays = Presentdays;
            $scope.AbsentDays = AbsentDays;
            $scope.Weekoff = Weekoff;
            $scope.SL = SL;
            $scope.EL = EL;


            $http({
                method: "POST",
                url: "PayrollBGP.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'SalMonth': $scope.SalMonth,
                    'Salyear': $scope.Salyear,
                    'Workeddays': $scope.Workeddays,
                    'Leavedays': $scope.Leavedays,
                    'Salary_Advance': $scope.Salary_Advance,
                    'FoodDeduction': $scope.FoodDeduction,
                    'TDS': $scope.TDS,
                    'Category': $scope.Category,
                    'Workingdays': $scope.Workingdays,
                    'Nationalholidays': $scope.Nationalholidays,
                    'CL': $scope.CL,
                    'BasicDA': $scope.BasicDA,
                    'HRA': $scope.HRA,
                    'Otherallowance_Con_SA': $scope.Otherallowance_Con_SA,
                    'DailyAllowanance': $scope.DailyAllowanance,
                    'OT_HRS': $scope.OT_HRS,

                    'Presentdays': $scope.Presentdays,
                    'AbsentDays': $scope.AbsentDays,
                    'Weekoff': $scope.Weekoff,
                    'SL': $scope.SL,
                    'EL': $scope.EL,
                    'TotaDays': $scope.TotaDays,
                    'Method': "ParollFunction"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.DisplayEmpPayroll();
            });
        }
        ////////////////////////////////////////////////////
    $scope.SendEdit = function(Employeeid, SalMonth, Salyear, Fullname) {
            $scope.EmpFullname = Fullname;
            $scope.Employeeid = Employeeid;
            $scope.SalMonth = SalMonth;
            $scope.Salyear = Salyear;
        }
        ////////////////

    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'SalMonth': $scope.SalMonth,
                'Salyear': $scope.Salyear,
                'Method': 'Delete'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            //$scope.DetailListTemp = response.data.mytbl;

            $scope.TempSave();

        });
        $scope.DisplayEmpPayroll();

    };
    ////////////////////////////////////
    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Salary Date") {
                $scope.Message = true;
                $scope.Message = "Please Enter Salary Date ...";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Exists") {
                $scope.Message = true;
                $scope.Message = "Data Updated Successfully...";
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
        //////////////////////////////
    $scope.AddAttendence = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "PayrollBGP.php",
            data: {

                'Method': 'AddAtendence'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            // $scope.TempMessage = response.data.Message;
            // //$scope.DetailListTemp = response.data.mytbl;

            // $scope.TempSave();

        });
        // $scope.DisplayEmpPayroll();

    };
    ///////////////////////////////////

    $scope.GetReport = function() {
        $http({



            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Method': 'PAYREPORT'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            // $scope.GetPayrollList = response.data.data01;

        });

    };
    /////////////////////////////

    $scope.Getperformancecalvalue = function(Employeeid, SalMonth, Salyear, Performanceallowance) {
            $scope.Employeeid = Employeeid;
            $scope.SalMonth = SalMonth;
            $scope.Salyear = Salyear;
            $scope.Performanceallowance = Performanceallowance;


            $http({
                method: "POST",
                url: "PayrollBGP.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'SalMonth': $scope.SalMonth,
                    'Salyear': $scope.Salyear,
                    'Performanceallowance': $scope.Performanceallowance,

                    'Method': "PayrollPerformanceFunction"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.DisplayEmpPayroll();
            });
        }
        //////////////////////////////////////////////////
    $scope.GetApprovalstatus = function(Employeeid, SalMonth, Salyear, Superuserapproval) {
            $scope.Employeeid = Employeeid;
            $scope.SalMonth = SalMonth;
            $scope.Salyear = Salyear;
            $scope.Superuserapproval = Superuserapproval;
            $scope.CheckingSession();

            $http({
                method: "POST",
                url: "PayrollBGP.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'SalMonth': $scope.SalMonth,
                    'Salyear': $scope.Salyear,
                    'Superuserapproval': $scope.Superuserapproval,

                    'Method': "PayrollSuperUserFunction"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.DisplayEmpPayroll();
            });
        }
        ////////////////////////////////////////
    $scope.DisplayViewEmp = function() {

        $http({



            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Method': 'EMPPAYROLLVIEW'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetVIEWPayrollList = response.data.data01;

        });

    };


    $scope.GetPayslip = function(Employeeid, SalMonth, Salyear) {
        $scope.Payrollmonth = SalMonth;
        $scope.Payrollyear = Salyear;
        $scope.Employeeid = Employeeid;

        $http({



            method: "POST",
            url: "PayrollBGP.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Employeeid': $scope.Employeeid,
                'Method': 'EMPREPORT'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.EmpRptList = response.data.data01;

            // $("#data_to_image_btn").trigger("click");

        });

    };

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
});