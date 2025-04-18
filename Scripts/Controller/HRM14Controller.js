var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM14Controller', function($scope, $http, $timeout) {

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
            url: "Payrolltemp.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Status': $scope.Status,
                'Category': $scope.Category,
                'SalaryPaidDate': $scope.SalarypaidDate,
                // 'Todate': $scope.Todate,
                'Method': "UpdateStatus"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.FetchMaster();
            $scope.GetStatus();
        });
    }


    ///////////////////////////////////////////////
    $scope.Getnextno = function() {
            $http(

                {

                    method: "POST",
                    url: "Payrolltemp.php",
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
            url: "Payrolltemp.php",
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
        url: "Payrolltemp.php",
        data: {

            'Method': "FetchDate"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {

        // $scope.Working_Days = 26;
        $scope.Fromdate = response.data.Fromdate;
        $scope.Todate = response.data.Todate;
        $scope.Working_Days = response.data.Working_Days;

        $scope.Payrollmonth = response.data.Payrollmonth;
        $scope.Payrollyear = response.data.Payrollyear;
        $scope.AuthorizedType = response.data.AuthorizedType;
        $scope.Nationalholiday = response.data.Nationalholiday;
        $scope.SalarypaidDate = response.data.TodayDate;
        $scope.Weekoff = response.data.Weekoff;
        $scope.TotalDays = response.data.TotalDays;
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
        //  $scope.Working_Days = 26;
        // $http({
        //     method: "POST",
        //     url: "Payrolltemp.php",
        //     data: {
        //         'Payrollmonth': $scope.Payrollmonth,
        //         'Payrollyear': $scope.Payrollyear,

        //         // 'Todate': $scope.Todate,
        //         'Method': "FetchDays"
        //     },
        //     headers: { 'Content_Type': 'application/json' }
        // }).then(function successCallback(response) {


        //     $scope.Nationalholiday = response.data.Nationalholiday;
        //     $scope.Working_Days = response.data.Working_Days;
        $scope.FetchMaster();
        $scope.GetStatus();
        $scope.DisplayEmpPayroll();
        $scope.DisplayViewEmp();

        // });
    }

    ///////////////////////////////////

    $scope.FetchMaster = function() {
        $http({
            method: "POST",
            url: "Payrolltemp.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,

                'Category': $scope.Category,
                'Method': "FetchMaster"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {


            $scope.Nationalholiday = response.data.Nationholidays;
            $scope.Working_Days = response.data.Workingdays;
            $scope.Status = response.data.Payrollstatus;
            $scope.SalarypaidDate = response.data.SalaryPaidDate;
            $scope.CasualLeave = response.data.Casual_Leave;
            $scope.Weekoff = response.data.Weekoff;
            $scope.TotalDays = response.data.TotalDays;

        });
    }

    $scope.GetStatus = function() {

        $http({
            method: "POST",
            url: "Payrolltemp.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Category': $scope.Category,

                'Method': "FetchPayrollTemp"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {


            $scope.Status = response.data.Payrollstatus;
            $scope.SalarypaidDate = response.data.SalaryPaidDate;
            //alert(response.data.Payrollstatus);
            $scope.CheckStatus($scope.Status);
            $scope.CheckingSession();

        });
    }


    //////////////////////////////////////
    $scope.Getallemployee = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Payrolltemp.php",
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
            url: "Payrolltemp.php",
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

                'Method': 'Fetcharray'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //$scope.Message = "Please Enter Detail";
            $timeout(function() { $scope.Message = ""; }, 3000);

            //s alert(response.data.Message);
            $scope.DisplayEmpPayroll();



        });
    }

    ////////////   

    $scope.Selectallemp = function() {
            $scope.Message = "Please wait data will be saved ............";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            $http({


                method: "POST",
                url: "Payrolltemp.php",
                data: {
                    'Fromdate': $scope.Fromdate,
                    'Todate': $scope.Todate,
                    'Payrollmonth': $scope.Payrollmonth,
                    'Payrollyear': $scope.Payrollyear,
                    'Working_Days': $scope.Working_Days,
                    'Nationalholiday': $scope.Nationalholiday,
                    'Status': $scope.Status,
                    'CasualLeave': $scope.CasualLeave,
                    'Category': $scope.Category,
                    'Weekoff' :$scope.Weekoff,
                    'TotalDays' :$scope.TotalDays,


                    'Method': 'FetchBulk'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                //$scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);

                $scope.DisplayEmpPayroll();



            });
        }
        /////////////////////////
    $scope.DisplayEmpPayroll = function() {
        $scope.NetWages = 0;
        $scope.Performanceallowance = 0;
        $scope.GrandTotal = 0;

        $http({



            method: "POST",
            url: "Payrolltemp.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Category': $scope.Category,
                'Method': 'EMPPAYROLL'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.GetPayrollList = null;
            $scope.GetPayrollList = response.data.data01;
            $scope.NetWages = response.data.NetWages;
            $scope.Performanceallowance = response.data.Performanceallowance;
            $scope.GrandTotal = response.data.GrandTotal;


        });

    };
    //////////////////////

    /////////////////////////


    $scope.Getcalvalue = function(Employeeid, SalMonth, Salyear, Workeddays, Leavedays, Salary_Advance, FoodDeduction, TDS, Category, Workingdays, Nationalholidays, CL, BasicDA, HRA, Otherallowance_Con_SA, DailyAllowanance, OT_HRS, index, Performanceallowance) {
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
            $scope.OT_HRS = OT_HRS;
            $scope.index = index;
            $scope.Performanceallowance = Performanceallowance;

            $http({
                method: "POST",
                url: "Payrolltemp.php",
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
                    'Performanceallowance': $scope.Performanceallowance,
                    'Method': "ParollFunction"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.FetchDetailValue($scope.Employeeid, $scope.SalMonth, $scope.Salyear, $scope.Category, $scope.index)

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
            url: "Payrolltemp.php",
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

    /////////////////////////////
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

            if ($scope.TempMessage == "Category") {
                $scope.Message = true;
                $scope.Message = "Please Select Category...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }


            if ($scope.TempMessage == "Payroll Not") {
                $scope.Message = true;
                $scope.Message = "Payroll Cannot be processing please check the month...";
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
            if ($scope.TempMessage == "FAIL") {
                $scope.Message = true;
                $scope.Message = "Error in Closing...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "PayrollClose") {
                $scope.Message = true;
                $scope.Message = "Payroll Closed for Selected Category ...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }



        }
        //////////////////////////////
    $scope.AddAttendence = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Payrolltemp.php",
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
            url: "Payrolltemp.php",
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
                url: "Payrolltemp.php",
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
                url: "Payrolltemp.php",
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
            url: "Payrolltemp.php",
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


    $scope.GetPayslip = function(Employeeid, SalMonth, Salyear, Category) {
        $scope.Payrollrpturl ="payslip_monthwise.php";
        $scope.Payrollmonth = SalMonth;
        $scope.Payrollyear = Salyear;
        $scope.Employeeid = Employeeid;
        $scope.Category = Category;

        $http({



            method: "POST",
            url: "Payrolltemp.php",
            data: {
                'Payrollmonth': $scope.Payrollmonth,
                'Payrollyear': $scope.Payrollyear,
                'Employeeid': $scope.Employeeid,
                'Category': $scope.Category,
                'Method': 'EMPREPORT'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


           $scope.Clientid = response.data.Clientid;
          $scope.payrollshow();

        });

    };

    ///////////////////////////////////////////////////
   $scope.payrollshow=function()
    {
       
        if($scope.Clientid=='4')
        {   $scope.Payrollrpturl ="payrollreportbulkbgp.php";
            window.open($scope.Payrollrpturl, '_blank');
        }
        else
        { 
            window.open($scope.Payrollrpturl, '_blank');
        }
    }
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


    $scope.FetchDetailValue = function(Employeeid, SalMonth, Salyear, Category, index) {
            $scope.Employeeid = Employeeid;
            $scope.SalMonth = SalMonth;
            $scope.Salyear = Salyear;
            $scope.Category = Category;


            $http({
                method: "POST",
                url: "Payrolltemp.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'SalMonth': $scope.SalMonth,
                    'Salyear': $scope.Salyear,
                    'Category': $scope.Category,

                    'Method': "PayrollFetch"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.Employeeid = response.data.Employeeid;
                $scope.SalMonth = response.data.SalMonth;
                $scope.Salyear = response.data.Salyear;
                $scope.Title = response.data.Title;
                $scope.Firstname = response.data.Firstname;
                $scope.Lastname = response.data.Lastname;
                $scope.Fullname = response.data.Fullname;
                $scope.Department = response.data.Department;
                $scope.Designation = response.data.Designation;
                $scope.Workingdays = response.data.Workingdays;
                $scope.Workeddays = response.data.Workeddays;
                $scope.Category = response.data.Category;
                $scope.Nationalholidays = response.data.Nationalholidays;
                $scope.Leavedays = response.data.Leavedays;
                $scope.CL = response.data.CL;
                $scope.LOP = response.data.LOP;
                $scope.Totaldays = response.data.Totaldays;
                $scope.BasicDA = response.data.BasicDA;
                $scope.HRA = response.data.HRA;
                $scope.Otherallowance_Con_SA = response.data.Otherallowance_Con_SA;
                $scope.TotalSal = response.data.TotalSal;
                $scope.EarnedBasic = response.data.EarnedBasic;
                //  alert(response.data.EarnedBasic);
                $scope.EarnedHRA = response.data.EarnedHRA;
                $scope.EarnedOtherallowance_Con_SA = response.data.EarnedOtherallowance_Con_SA;
                $scope.EarnedWages = response.data.EarnedWages;
                $scope.PF = response.data.PF;
                $scope.ESI = response.data.ESI;
                $scope.Salary_Advance = response.data.Salary_Advance;
                $scope.FoodDeduction = response.data.FoodDeduction;
                $scope.TotalDeduction = response.data.TotalDeduction;
                $scope.NetWages = response.data.NetWages;
                $scope.DailyAllowanance = response.data.DailyAllowanance;
                $scope.TDS = response.data.TDS;
                $scope.OT_HRS = response.data.OT_HRS;
                $scope.OT_Wages = response.data.OT_Wages;
                $scope.PFEmployeecompany = response.data.PFEmployeecompany;
                $scope.ESIEmployeecompany = response.data.ESIEmployeecompany;
                $scope.Performanceallowance = response.data.Performanceallowance;
                $scope.Backgroundverificationstatus = response.data.Backgroundverificationstatus;
                $scope.PackageHoldstatus = response.data.PackageHoldstatus;
                $scope.Superuserapproval = response.data.Superuserapproval;
                $scope.TakenEL = response.data.TakenEL;
                  $scope.Dormitory = response.data.Dormitory;
                $scope.Transport = response.data.Transport;

                //////////////
                $scope.GetPayrollList[index]['Employeeid'] = response.data.Employeeid;
                $scope.GetPayrollList[index]['SalMonth'] = response.data.SalMonth;
                $scope.GetPayrollList[index]['Salyear'] = response.data.Salyear;
                $scope.GetPayrollList[index]['Title'] = response.data.Title;
                $scope.GetPayrollList[index]['Firstname'] = response.data.Firstname;
                $scope.GetPayrollList[index]['Lastname'] = response.data.Lastname;
                $scope.GetPayrollList[index]['Fullname'] = response.data.Fullname;
                $scope.GetPayrollList[index]['Department'] = response.data.Department;
                $scope.GetPayrollList[index]['Designation'] = response.data.Designation;
                $scope.GetPayrollList[index]['Workingdays'] = response.data.Workingdays;
                $scope.GetPayrollList[index]['Workeddays'] = response.data.Workeddays;
                $scope.GetPayrollList[index]['Category'] = response.data.Category;
                $scope.GetPayrollList[index]['Nationalholidays'] = response.data.Nationalholidays;
                $scope.GetPayrollList[index]['Leavedays'] = response.data.Leavedays;
                $scope.GetPayrollList[index]['CL'] = response.data.CL;
                $scope.GetPayrollList[index]['LOP'] = response.data.LOP;
                $scope.GetPayrollList[index]['Totaldays'] = response.data.Totaldays;
                $scope.GetPayrollList[index]['BasicDA'] = response.data.BasicDA;
                $scope.GetPayrollList[index]['HRA'] = response.data.HRA;
                $scope.GetPayrollList[index]['Otherallowance_Con_SA'] = response.data.Otherallowance_Con_SA;
                $scope.GetPayrollList[index]['TotalSal'] = response.data.TotalSal;
                $scope.GetPayrollList[index]['EarnedBasic'] = response.data.EarnedBasic;
                $scope.GetPayrollList[index]['EarnedHRA'] = response.data.EarnedHRA;
                $scope.GetPayrollList[index]['EarnedOtherallowance_Con_SA'] = response.data.EarnedOtherallowance_Con_SA;
                $scope.GetPayrollList[index]['EarnedWages'] = response.data.EarnedWages;
                $scope.GetPayrollList[index]['PF'] = response.data.PF;
                $scope.GetPayrollList[index]['ESI'] = response.data.ESI;
                $scope.GetPayrollList[index]['Salary_Advance'] = response.data.Salary_Advance;
                $scope.GetPayrollList[index]['FoodDeduction'] = response.data.FoodDeduction;
                $scope.GetPayrollList[index]['TotalDeduction'] = response.data.TotalDeduction;
                $scope.GetPayrollList[index]['NetWages'] = response.data.NetWages;
                $scope.GetPayrollList[index]['DailyAllowanance'] = response.data.DailyAllowanance;
                $scope.GetPayrollList[index]['TDS'] = response.data.TDS;
                $scope.GetPayrollList[index]['OT_HRS'] = response.data.OT_HRS;
                $scope.GetPayrollList[index]['OT_Wages'] = response.data.OT_Wages;
                $scope.GetPayrollList[index]['PFEmployeecompany'] = response.data.PFEmployeecompany;
                $scope.GetPayrollList[index]['ESIEmployeecompany'] = response.data.ESIEmployeecompany;
                $scope.GetPayrollList[index]['Performanceallowance'] = response.data.Performanceallowance;
                $scope.GetPayrollList[index]['Backgroundverificationstatus'] = response.data.Backgroundverificationstatus;
                $scope.GetPayrollList[index]['PackageHoldstatus'] = response.data.PackageHoldstatus;
                $scope.GetPayrollList[index]['Superuserapproval'] = response.data.Superuserapproval;
                $scope.GetPayrollList[index]['TakenEL'] = response.data.TakenEL;
                //////////////////////////////////



            });


            $timeout(function() { $scope.Message = ""; }, 10000);
            $scope.DisplayEmpPayroll();
        }
        ///////////////////////
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({ includeSelectAllOption: true, });
    });
    //////////////////////
});