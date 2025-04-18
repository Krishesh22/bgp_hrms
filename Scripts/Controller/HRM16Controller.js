var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'ngSanitize']);
app.controller('HRM16Controller', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";


    $scope.currentPageEmpAttendance = 1;
    $scope.pageSizeEmpAttendance = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";

    $scope.NoofPresents = 0;
    $scope.NoofAbsents = 0;
    $scope.NoofLeaves = 0;
    $scope.Permissions = 0;
    $scope.Atendancestatus = "Open";
    $scope.Adminapproval = "No";
    $scope.btnOpen = true;
    $scope.btnClose = false;
    $scope.currentPageMonthLeave = 1;
    $scope.pageSizeMonthPayroll = 10;
    /////////////////////////////////////////

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "FNAME") {
                $scope.Message = true;
                $scope.Message = "Please Enter First Name";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Contact") {
                $scope.Message = true;
                $scope.Message = "Please Enter Contact No";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Quali") {
                $scope.Message = true;
                $scope.Message = "Please Select Qualification";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
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

            if ($scope.TempMessage == "Attendence") {
                $scope.Message = true;
                $scope.Message = "Please Check the Attendence  ...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

                $scope.btnsave = false;
                $scope.btnupdate = true;

            }


            if ($scope.TempMessage == "AdminPermission") {
                $scope.Message = true;
                $scope.Message = "Cannot Edit Attendance You need to Get Admin Approval For Editing...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }


            if ($scope.TempMessage == "OKAY") {
                // $scope.UpdateMaster();



            }
            if ($scope.TempMessage == "Mail Sent") {
                $scope.Message = true;
                $scope.Message = "Mail Sent Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            if ($scope.TempMessage == "No Need") {
                $scope.Message = true;
                $scope.Message = "You can edit Attendance ...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "AttendanceDT") {
                $scope.Message = true;
                $scope.Message = "Please Select Attendance Date ...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.Resetbreakdetail();


            }
            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Sucessfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "DataSaved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Sucessfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            if ($scope.TempMessage == "NOTELIGABLE") {
                $scope.Message = true;
                $scope.Message = "Sick Leave not eligible for this Employee...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            if ($scope.TempMessage == "CLLIMIT") {
                $scope.Message = true;
                $scope.Message = "Causal Leave  Not Available For This Employee...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            if ($scope.TempMessage == "SLLIMIT") {
                $scope.Message = true;
                $scope.Message = "Sick Leave  Not Available For This Employee...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            if ($scope.TempMessage == "STATUSOPEN") {
                $scope.Message = true;
                $scope.Message = "Please Close The Previous Attendance Leave status...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "BreakIntime") {
                $scope.Message = true;
                $scope.Message = "Please Select Break In Time...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "Error") {
                $scope.Message = true;
                $scope.Message = "Data Not Saved / Updated...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            

            if ($scope.TempMessage == "NEWJOINEE") {
                $scope.Message = true;
                $scope.Message = "CL/SL Not Allowd Probation Period...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            if ($scope.TempMessage == "Not Delete") {
                $scope.Message = true;
                $scope.Message = "Data Not Deleted...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "BreakIntimeExists") {
                $scope.Message = true;
                $scope.Message = "Please Check the Time...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.BreakIntime = "00:00:00";



            }

            if ($scope.TempMessage == "BreakOuttimeExists") {
                $scope.Message = true;
                $scope.Message = "Please Check the Time...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.BreakOuttime = "00:00:00";


            }

            if ($scope.TempMessage == "BreakOuttime") {
                $scope.Message = true;
                $scope.Message = "Please Enter Out Time...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.BreakOuttime = "00:00:00";


            }


        }
        //////////////////////////////////////////////////////////////

    /////////////////////////////////////////

    $scope.DailyAttendanceSave = function() {
        $("#overlay").fadeIn(300);
        $scope.CheckingSession();
        $scope.Message = true;
        $scope.Message = "Please Wait data will be fetched from server.......";

        //alert($scope.AttendanceDate);
        $http({



            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Atendancestatus': $scope.Atendancestatus,

                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.Message = false;



            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
            $scope.UpdateMaster();

            $scope.GetAttendanceDate();
            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);


        });

    };

    /////////////////////////////////////


    $scope.Loadingfunctioncheck = function(TestingMessage) {
        $scope.TestingMessage = TestingMessage;
        if ($scope.TestingMessage == "Yes") {
            $scope.GetAttendanceDate();
            $scope.FetchMaster();
        } else {
            $scope.NoofPresents = 0;
            $scope.NoofAbsents = 0;
            $scope.NoofLeaves = 0;
            $scope.Permissions = 0;
            $scope.Atendancestatus = "Open";
            $scope.Adminapproval = 'No';

        }

    }

    /////////////////////////////////////
    // $http({
    //     method: "POST",
    //     url: "Dailyattendance.php",
    //     data: {
    //         'AttendanceDate': $scope.AttendanceDate,
    //         'Method': 'DISPATT'
    //     },
    //     headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    // }).then(function successCallback(response) {

    //     $scope.GetEmpDailyAttendanceList = response.data;
    // });
    //////////////////////////////
    $scope.GetAttendanceDate = function() {

        $("#overlay").fadeIn(300);
        $scope.CheckingSession();

        $scope.FetchMaster();

        $http({
            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Method': 'DISPATT'
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEmpDailyAttendanceList = response.data;
            $scope.UpdateMaster();
            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);

        });


    }


    ///////////////////////
    $scope.ChangeInOutUpdate = function(Employeeid, Attendencedate, AttenStatus, Intime, Outtime, Permissionyesorno, OTIntime, OTOuttime) {
            $scope.Employeeid = Employeeid;
            $scope.Attendencedate = Attendencedate;
            $scope.AttenStatus = AttenStatus;
            $scope.Intime = Intime;
            $scope.Outtime = Outtime;
            $scope.Permissionyesorno = Permissionyesorno;
            $scope.OTOuttime = OTOuttime;
            $scope.OTIntime = OTIntime;
            $scope.CheckingSession();
            // alert($scope.Permissionyesorno);
            $http({
                method: "POST",
                url: "Dailyattendance.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Attendencedate': $scope.AttendanceDate,
                    'AttenStatus': $scope.AttenStatus,
                    'Intime': $scope.Intime,
                    'Outtime': $scope.Outtime,
                    'Permissionyesorno': $scope.Permissionyesorno,
                    'OTOuttime': $scope.OTOuttime,
                    'OTIntime': $scope.OTIntime,

                    'Method': 'CalculationUpdate'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //alert(response.data.WorkingHours);
                //$scope.GetEmpDailyAttendanceList = response.data.data01;


            });
        }
        /////////////////////////////////
    $scope.UpdateOutTime = function() {

        $scope.Message = true;
        $scope.Message = "Please Wait data will be fetched from server.......";

        $http({



            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Atendancestatus': $scope.Atendancestatus,

                'Method': 'OutTimeFetch'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.Message = false;
            $scope.GetAttendanceDate();
            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
            $scope.UpdateMaster();

        });

    };

    /////////////////////////////////
    $scope.GetRefresh = function() {
        $scope.GetAttendanceDate();
        $scope.UpdateMaster();
        $scope.FetchMaster();
    }


    ///////////////////////////////////
    $scope.UpdateMaster = function() {

        $http({



            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Atendancestatus': $scope.Atendancestatus,

                'Method': 'MasterUpdate'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
            $scope.FetchMaster();

        });

    };
    //////////////////////////////////
    $scope.FetchMaster = function() {


            $http({



                method: "POST",
                url: "Dailyattendance.php",
                data: {
                    'AttendanceDate': $scope.AttendanceDate,


                    'Method': 'FetchMaster'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.Atendancestatus = response.data.Empattendencestatus;

                $scope.NoofPresents = response.data.NoofPresent;
                $scope.NoofAbsents = response.data.NoofAbsents;
                $scope.NoofLeaves = response.data.Noofleave;
                $scope.NoofEmployee = response.data.NoofEmployee;
                $scope.Adminapproval = response.data.Adminapproval;
                $scope.CheckStatus($scope.Atendancestatus);




            });

        }
        //////////////////////
    $scope.CheckStatus = function(Atendancestatus) {
            $scope.Atendancestatus = Atendancestatus;


            if ($scope.Atendancestatus == "Open") {
                $scope.btnOpen = true;
                $scope.btnClose = false;

            } else {
                $scope.btnOpen = false;
                $scope.btnClose = true;

            }
        }
        /////////////////////////////////
        $scope.CheckingSession = function()
        {
       
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
            url: "Dailyattendance.php",
            data: {
              
               
    
                'Method': 'PageSession'
            },
            headers: { 'Content-Type': 'application/json' },
         
    
        }).then(function successCallback(response) {
    
          
            $scope.PageSession = response.data.Message;
            $scope.CheckingSession();
            $scope.LoadDatefunction();
          
        });

        $scope.LoadDatefunction = function()
        {
            $http({



                method: "POST",
                url: "Dailyattendance.php",
                data: { 'Method': 'FetchDate' },
                headers: { 'Content-Type': 'application/json' }
        
            }).then(function successCallback(response) {
        
        
                $scope.AttendanceDate = response.data.date;
                $scope.TestingMessage = response.data.Message;
                $scope.Loadingfunctioncheck($scope.TestingMessage);
        
            });
        }

    $scope.SendEdit02 = function(Employeeid, Attendencedate) {
        $scope.Employeeid = Employeeid;
        $scope.Attendencedate = Attendencedate;

        $http({



            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Attendencedate': $scope.Attendencedate,

                'Method': 'EditDetail'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.Fullname = response.data.Fullname;
            $scope.Workingdays = response.data.Workingdays;
            $scope.OT_HRS = response.data.OT_HRS;
            $scope.Intime = response.data.Intime;
            $scope.Outtime = response.data.Outtime;
            $scope.Workinghours = response.data.Workinghours;
            $scope.AttenStatus = response.data.AttenStatus;
            $scope.Actualworkinghours = response.data.Actualworkinghours;
            $scope.ActualOt_HRS = response.data.ActualOt_HRS;
            $scope.OTIntime = response.data.OTIntime;
            $scope.OTOuttime = response.data.OTOuttime;
            $scope.Allowotyesorno = response.data.Allowotyesorno;
            $scope.Fullname = response.data.Fullname;
            $scope.Permissionyesorno = response.data.Permissionyesorno;



        });

        if ($scope.Allowotyesorno == "Yes") {
            $scope.btnOT1 = true;
            $scope.btnOT2 = true;
        } else {
            $scope.btnOT1 = false;
            $scope.btnOT2 = false;
        }
        $scope.Resetbreakdetail();

    };


    $scope.CalculateOTTime = function(Employeeid, Attendencedate, AttenStatus, Intime, Outtime, OTIntime, OTOuttime, Allowotyesorno, Permissionyesorno, index, Editedvalues) {
 
        $scope.Employeeid = Employeeid;
        $scope.AttendanceDate = Attendencedate;
        $scope.Attendencedate = Attendencedate;
        $scope.AttenStatus = AttenStatus;
        $scope.Intime = Intime;
        $scope.Outtime = Outtime;
        $scope.OTIntime = OTIntime;
        $scope.OTOuttime = OTOuttime;
        $scope.Allowotyesorno = Allowotyesorno;
        $scope.Permissionyesorno = Permissionyesorno;
        $scope.index = index;
        $scope.Editedvalues = Editedvalues;
        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Attendencedate': $scope.AttendanceDate,
                'AttenStatus': $scope.AttenStatus,
                'Intime': $scope.Intime,
                'Outtime': $scope.Outtime,
                'Permissionyesorno': $scope.Permissionyesorno,
                'OTOuttime': $scope.OTOuttime,
                'OTIntime': $scope.OTIntime,
                'Editedvalues': $scope.Editedvalues,

                'Method': 'CalculateManually'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            // alert(response.data.Message);
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();


            //$scope.GetEmpDailyAttendanceList = response.data.data01;

            $scope.GetSelectedEmp($scope.index);
            // $scope.GetAttendanceDate();
            // $scope.UpdateMaster();
            // $scope.FetchMaster();



        });




    }



    $scope.GetSelectedEmp = function(index) {
  
        $http({



            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Attendencedate': $scope.Attendencedate,

                'Method': 'EditDetail'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.Fullname = response.data.Fullname;
            $scope.Workingdays = response.data.Workingdays;
            $scope.OT_HRS = response.data.OT_HRS;
            $scope.Intime = response.data.Intime;
            $scope.Outtime = response.data.Outtime;
            $scope.Workinghours = response.data.Workinghours;
            $scope.AttenStatus = response.data.AttenStatus;
            $scope.Actualworkinghours = response.data.Actualworkinghours;
            $scope.ActualOt_HRS = response.data.ActualOt_HRS;
            $scope.OTIntime = response.data.OTIntime;
            $scope.OTOuttime = response.data.OTOuttime;
            $scope.Allowotyesorno = response.data.Allowotyesorno;
            $scope.Fullname = response.data.Fullname;
            $scope.Permissionyesorno = response.data.Permissionyesorno;
            $scope.Firstname = response.data.Firstname;
            $scope.Title = response.data.Title;
            $scope.lastname = response.data.lastname;
            $scope.Manualattendence = response.data.Manualattendence;
            $scope.Mismatchedattendence = response.data.Mismatchedattendence;
            $scope.Manualattendence = response.data.Manualattendence;
            $scope.Manualattendence = response.data.Manualattendence;

            $scope.GetEmpDailyAttendanceList[index]['Employeeid'] = $scope.Employeeid;
            $scope.GetEmpDailyAttendanceList[index]['Attendencedate'] = $scope.Attendencedate;
            $scope.GetEmpDailyAttendanceList[index]['Title'] = $scope.Title;
            $scope.GetEmpDailyAttendanceList[index]['Firstname'] = $scope.Firstname;
            $scope.GetEmpDailyAttendanceList[index]['lastname'] = $scope.lastname;
            $scope.GetEmpDailyAttendanceList[index]['Workingdays'] = $scope.Workingdays;
            $scope.GetEmpDailyAttendanceList[index]['OT_HRS'] = $scope.OT_HRS;
            $scope.GetEmpDailyAttendanceList[index]['Intime'] = $scope.Intime;
            $scope.GetEmpDailyAttendanceList[index]['Outtime'] = $scope.Outtime;
            $scope.GetEmpDailyAttendanceList[index]['Workinghours'] = $scope.Workinghours;
            $scope.GetEmpDailyAttendanceList[index]['AttenStatus'] = $scope.AttenStatus;
            $scope.GetEmpDailyAttendanceList[index]['ActualOt_HRS'] = $scope.ActualOt_HRS;
            $scope.GetEmpDailyAttendanceList[index]['Actualworkinghours'] = $scope.Actualworkinghours;
            $scope.GetEmpDailyAttendanceList[index]['OTIntime'] = $scope.OTIntime;
            $scope.GetEmpDailyAttendanceList[index]['OTOuttime'] = $scope.OTOuttime;
            $scope.GetEmpDailyAttendanceList[index]['Allowotyesorno'] = $scope.Allowotyesorno;
            $scope.GetEmpDailyAttendanceList[index]['Permissionyesorno'] = $scope.Permissionyesorno;
            $scope.GetEmpDailyAttendanceList[index]['Manualattendence'] = $scope.Manualattendence;
            $scope.GetEmpDailyAttendanceList[index]['Mismatchedattendence'] = $scope.Mismatchedattendence;
            // $scope.UpdateMaster();


            $timeout(function() { $scope.Message = ""; }, 10000);
             $scope.GetCustomized();
           // $scope.FetchMaster();
        });


    }



    $scope.GetCustomized = function() {

       
        $scope.CheckingSession();

       $scope.FetchMaster();

        $http({
            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Method': 'DISPATT'
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEmpDailyAttendanceList = response.data;
           //$scope.UpdateMaster();
        

        });


    }

    $scope.CloseAttendence = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,


                'Method': 'CloseAttendence'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.FetchMaster();

        });

    }


    $scope.SendMailToAdmin = function() {

            $http({
                method: "POST",
                url: "Dailyattendance.php",
                data: {
                    'AttendanceDate': $scope.AttendanceDate,


                    'Method': 'MAILTOADMIN'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.TempMessage = response.data.Message;
                $scope.TempSave();

            });

        }
        ////////////////////////////////
    $scope.Notes = "";
    $scope.BreakIntime = "00:00:00";
    $scope.BreakOuttime = "00:00:00";
    $scope.Takenbreakhours = "00:00:00";
    $scope.currentPagebreak = 1;
    $scope.pageSizebreak = 10;
    //////////////////////////
    $scope.Resetbreakdetail = function() {
        $scope.Notes = "";
        $scope.BreakIntime = "00:00:00";
        $scope.BreakOuttime = "00:00:00";
        $scope.Takenbreakhours = "0";
        $scope.Takenbreakhoursduration = "00:00:00";
        $scope.Getbreaknextno();
        $scope.DisplayBreaktime();


    }

    $scope.Getbreaknextno = function() {
            $http({
                method: "POST",
                url: "breaktime.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Attendencedate': $scope.AttendanceDate,


                    'Method': 'BREAKNEXT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.breaksno = response.data.Sno;
                //alert(response.data.WorkingHours);
                //$scope.GetEmpDailyAttendanceList = response.data.data01;


            });
        }
        ///////////////////////////////////////
    $scope.GetDurationHours = function() {
            $http({
                method: "POST",
                url: "breaktime.php",
                data: {

                    'BreakIntime': $scope.BreakIntime,
                    'BreakOuttime': $scope.BreakOuttime,


                    'Method': 'FETCHDURATION'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.Takenbreakhours = response.data.Takenbreakhours;
                $scope.Takenbreakhoursduration = response.data.Takenbreakhoursduration;
                //alert(response.data.WorkingHours);
                //$scope.GetEmpDailyAttendanceList = response.data.data01;


            });
        }
        /////////////////////////////////////////
    $scope.UpdateBreaktime = function() {
            $http({
                method: "POST",
                url: "breaktime.php",
                data: {
                    'BreakIntime': $scope.BreakIntime,
                    'BreakOuttime': $scope.BreakOuttime,
                    'Employeeid': $scope.Employeeid,
                    'Attendencedate': $scope.AttendanceDate,
                    'Notes': $scope.Notes,
                    'breaksno': $scope.breaksno,
                    'Takenbreakhours': $scope.Takenbreakhours,
                    'Takenbreakhoursduration': $scope.Takenbreakhoursduration,

                    'Method': 'UpdateBreakhours'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.DisplayBreaktime();
                $scope.GetAttendanceDate();
                //alert(response.data.WorkingHours);
                //$scope.GetEmpDailyAttendanceList = response.data.data01;


            });
        }
        /////////////////////////////////////////
    $scope.DisplayBreaktime = function() {
        $http({
            method: "POST",
            url: "breaktime.php",
            data: {
                'AttendanceDate': $scope.AttendanceDate,
                'Employeeid': $scope.Employeeid,
                'Method': 'DISPATTBREAK'
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            //alert(response.data);
            $scope.GetBreakList = response.data;
            // $scope.UpdateMaster();


        });
    }


    $scope.FetchBreakTime = function(Employeeid, Sno, Attendencedate) {

        $scope.Employeeid = Employeeid;
        $scope.breaksno = Sno;
        $scope.Attendencedate = Attendencedate;
        $http({



            method: "POST",
            url: "breaktime.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Attendencedate': $scope.Attendencedate,
                'breaksno': $scope.breaksno,


                'Method': 'Fetchbreak'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.BreakIntime = response.data.BreakIntime;
            $scope.BreakOuttime = response.data.BreakOuttime;
            $scope.Notes = response.data.Notes;
            $scope.Takenbreakhours = response.data.Takenbreakhours;
            $scope.Takenbreakhoursduration = response.data.Takenbreakhoursduration;




        });


    }

    $scope.DeleteBreak = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "breaktime.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Attendencedate': $scope.Attendencedate,
                'breaksno': $scope.breaksno,


                'Method': 'DELETEBREAK'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.GetAttendanceDate();





        });
    }


    $scope.GetDurationInHours = function() {
        $http({
            method: "POST",
            url: "breaktime.php",
            data: {

                'BreakIntime': $scope.BreakIntime,
                'BreakOuttime': $scope.BreakOuttime,
                'Attendancedate': $scope.AttendanceDate,
                'Employeeid': $scope.Employeeid,


                'Method': 'FETCHINDURATION'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //  alert(response.data.Message);
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();

            $scope.Takenbreakhours = response.data.Takenbreakhours;
            $scope.Takenbreakhoursduration = response.data.Takenbreakhoursduration;

            //alert(response.data.WorkingHours);
            //$scope.GetEmpDailyAttendanceList = response.data.data01;


        });
    }


    $scope.GetDurationOutHours = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "breaktime.php",
            data: {

                'BreakIntime': $scope.BreakIntime,
                'BreakOuttime': $scope.BreakOuttime,
                'Attendancedate': $scope.AttendanceDate,
                'Employeeid': $scope.Employeeid,


                'Method': 'FETCHOUTDURATION'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //  alert(response.data.Message);
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();

            $scope.Takenbreakhours = response.data.Takenbreakhours;
            $scope.Takenbreakhoursduration = response.data.Takenbreakhoursduration;

            //alert(response.data.WorkingHours);
            //$scope.GetEmpDailyAttendanceList = response.data.data01;


        });
    }
  $http({
        method: "POST",
        url: "Dailyattendance.php",
        data: {
            
            'Method': 'DAILYATTENSTATUSLIST'
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetdailyattenstatusList = response.data;
    });



    $http({
        method: "POST",
        url: "Dailyattendance.php",
        data: {
            
            'Method': 'DAILYATTENSTATUSDELHILIST'
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        //alert(response.data);
        $scope.GetAttenstatusmasterDelhiList = response.data;
    });





    $scope.CalculateOTTimeBGP = function(Employeeid, Attendencedate, AttenStatus, Intime, Outtime, OTIntime, OTOuttime, Allowotyesorno, Permissionyesorno, index, Editedvalues) {

        $scope.Employeeid = Employeeid;
        $scope.AttendanceDate = Attendencedate;
        $scope.Attendencedate = Attendencedate;
        $scope.AttenStatus = AttenStatus;
        $scope.Intime = Intime;
        $scope.Outtime = Outtime;
        $scope.OTIntime = OTIntime;
        $scope.OTOuttime = OTOuttime;
        $scope.Allowotyesorno = Allowotyesorno;
        $scope.Permissionyesorno = Permissionyesorno;
        $scope.index = index;
        $scope.Editedvalues = Editedvalues;
        // $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Dailyattendance.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Attendencedate': $scope.AttendanceDate,
                'AttenStatus': $scope.AttenStatus,
                'Intime': $scope.Intime,
                'Outtime': $scope.Outtime,
                'Permissionyesorno': $scope.Permissionyesorno,
                'OTOuttime': $scope.OTOuttime,
                'OTIntime': $scope.OTIntime,
                'Editedvalues': $scope.Editedvalues,

                'Method': 'CalculateDelhi'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            // alert(response.data.Message);
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();


            //$scope.GetEmpDailyAttendanceList = response.data.data01;

            $scope.GetSelectedEmp($scope.index);
            // $scope.GetAttendanceDate();
            // $scope.UpdateMaster();
            // $scope.FetchMaster();



        });




    }




    $http({



        method: "POST",
        url: "Dailyattendance.php",
        data: {
            


            'Method': 'FetchMonth'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {
      //  alert(response.data.Attendancemonth);
        $scope.Attendancemonth = response.data.Attendancemonth;
        $scope.Attendanceyear = response.data.Attendanceyear;
        $scope.Leavestatus = response.data.Leavestatus;
        $scope.GetMonthLeaveSummaryList = response.data.MonthList;
        $scope.CheckMonthStatus($scope.Leavestatus);




    });


    $scope.GetLeaveDetails = function() {
        $scope.CheckingSession();
        $("#overlay").fadeIn(300);
        $http({
            method: "POST",
            url: "Dailyattendance.php",
            data: {

                'Attendancemonth': $scope.Attendancemonth,
                'Attendanceyear': $scope.Attendanceyear,
             


                'Method': 'GETLEAVE'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $("#overlay").fadeOut(300);
            $scope.Leavestatus = response.data.Leavestatus;
            $scope.GetMonthLeaveSummaryList = response.data.MonthList;
            $scope.CheckMonthStatus($scope.Leavestatus);


        });
    }

    $scope.CheckMonthStatus = function(Leavestatus)
    {
        $scope.Leavestatus = Leavestatus;
        if($scope.Leavestatus=="Open")
        {
$scope.btnMonthOpen = true;
        }
        else
        {
            $scope.btnMonthOpen = false;
        }
    }


    $scope.MonthClose = function() {
        $scope.CheckingSession();
        $("#overlay").fadeIn(300);
        $http({
            method: "POST",
            url: "Dailyattendance.php",
            data: {

                'Attendancemonth': $scope.Attendancemonth,
                'Attendanceyear': $scope.Attendanceyear,
             


                'Method': 'CLOSEMONTH'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $("#overlay").fadeOut(300);
            $scope.Leavestatus = response.data.Leavestatus;
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
          //  $scope.GetMonthLeaveSummaryList = response.data.MonthList;
            $scope.CheckMonthStatus($scope.Leavestatus);
         

        });
    }
    /////////////////////
     $http({



        method: "POST",
        url: "OpenAttendanceDetails.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.FromDate = response.data.date;

        $scope.ToDate = response.data.date;


    });


    $scope.OpenAttendance = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "OpenAttendanceDetails.php",
            data: {
                'FromDate': $scope.FromDate,
                'ToDate': $scope.ToDate,
               
                'Method': 'OPENATT'
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

          
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });


    }
    /////////////////////////

});