<<<<<<< HEAD
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM22Controller', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageApplication = 1;
    $scope.pageSizeApplication = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Title = "Mr.";
    $scope.Firstname = "";
    $scope.Lastname = "";
    $scope.Gender = "Male";
    $scope.Qualification = "";
    $scope.Married = "Married";
    $scope.Mothertongue = "";
    $scope.Contactno = "";
    $scope.Category = "";
    $scope.Emailid = "";
    $scope.Selectionstatus = "Shortlisted";
    $scope.Vaccancy = "";
    $scope.ApplicationDate = "";
    $scope.InterviewDate = "";
    $scope.Interviewtime = "";
    $scope.Smsverified = "No";
    $scope.Emailverified = "No";
    $scope.btnSave = true;
    $scope.btnUpdate = false;
    $scope.Fresher = "Yes";
    $scope.ExpectedCTC = "0";
    $scope.PreviousCTC = "0";
    $scope.Otherallowance = "0";
    $scope.Experience = "";
    if ($scope.Fresher == "Yes") {
        $scope.btnPrevious = true;
        $scope.PreviousCTC = "0";
    } else {
        $scope.btnPrevious = false;
    }
$scope.btnsms = false;
$scope.btnemail = false;

    $scope.Reset = function() {
        $scope.CheckingSession();

        $scope.Title = "Mr.";
        $scope.Firstname = "";
        $scope.Lastname = "";
        $scope.Gender = "Male";
        $scope.Qualification = "";
        $scope.Married = "Married";
        $scope.Mothertongue = "";
        $scope.Contactno = "";
        $scope.Category = "";
        $scope.Emailid = "";
        $scope.Selectionstatus = "Shortlisted";
        $scope.Vaccancy = "";
        $scope.ApplicationDate = "";
        $scope.InterviewDate = "";
        $scope.Interviewtime = "";
        $scope.btnSave = true;
        $scope.btnUpdate = false;
        $scope.Smsverified = "No";
        $scope.Emailverified = "No";
        $scope.Fresher = "Yes";
        $scope.ExpectedCTC = "0";
        $scope.PreviousCTC = "0";
        $scope.btnsms = false;
$scope.btnemail = false;
$scope.Otherallowance = "0";
$scope.Experience = "";
        $scope.Getnextno();

    }

    $scope.GetExpereience = function(Fresher) {
        $scope.Fresher = Fresher;
        if ($scope.Fresher == "Yes") {
            $scope.btnPrevious = true;
            $scope.PreviousCTC = "0";
        } else {
            $scope.btnPrevious = false;
        }

    }
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
        if ($scope.TempMessage == "vacc") {
            $scope.Message = true;
            $scope.Message = "Please Select Position of Applicant";
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

        if($scope.TempMessage =="InternalNumberYes"){
            $scope.Message = true;
            $scope.Message = "This number is Internal Office Number. Use another mobile number.";
            $scope.Contactno="";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if($scope.TempMessage =="InternalEmailYes"){
            $scope.Message = true;
            $scope.Message = "This email is an internal official email id. Use different email id.";
            $scope.Emailid="";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Applicationid = $scope.Tempnextno;

            $scope.btnSave = false;
            $scope.btnUpdate = true;

            $scope.btnsms = true;
            $scope.btnemail = true;
            $scope.Emailverification01();

        }
        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Data Updated Sucessfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Email") {
            $scope.Message = true;
            $scope.Message = "Please Fill the Email...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Category") {
            $scope.Message = true;
            $scope.Message = "Please Select Category...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Emailverification") {
            $scope.Message = true;
            $scope.Message = "Email sent successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Mail Sent") {
            $scope.Message = true;
            $scope.Message = "Email sent successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "ContactYes") {
            $scope.Message = true;
            $scope.Message = "This Mobile No Already Exists...";

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Contactno = "";


        }

        if ($scope.TempMessage == "MailYes") {
            $scope.Message = true;
            $scope.Message = "This Mail ID Already Exists...";

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Emailid = "";


        }
        if ($scope.TempMessage == "MovedToCandidate") {
            $scope.Message = true;
            $scope.Message = "Data  Moved to Candidate Master Sucessfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.GetEditList();
            $('#myCarousel').carousel(0);


        }




    }
    $scope.SendEdit = function(Applicationid) {


        $scope.Applicationid = Applicationid;

        $('#myCarousel').carousel(1);

        $scope.FetchApplication($scope.Applicationid);
    }




    ///////////////////////////////////////////////////////
    $scope.FetchApplication = function(Applicationid) {
        $scope.CheckingSession();
        $scope.selectedValue = [];
        $scope.Applicationid = Applicationid;
        $scope.btnsms = true;
        $scope.btnemail = true;
        
        $http({
            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Method': "FetchApplication"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Title = response.data.Title;
            $scope.Firstname = response.data.Firstname;
            $scope.Lastname = response.data.Lastname;
            $scope.Gender = response.data.Gender;
            $scope.Qualification = response.data.Qualification;
            $scope.Married = response.data.Married;
            $scope.Mothertongue = response.data.Mothertongue;
            $scope.Contactno = response.data.Contactno;
            $scope.Category = response.data.Category;
            $scope.Emailid = response.data.Emailid;
            $scope.Selectionstatus = response.data.Selectionstatus;
            $scope.ApplicationDate = response.data.ApplicationDate;
            $scope.InterviewDate = response.data.InterviewDate;
            $scope.Interviewtime = response.data.Interviewtime;
            $scope.Vaccancy = response.data.Vaccancy;
            $scope.Smsverified = response.data.Smsverified;
            $scope.Emailverified = response.data.Emailverified;
            $scope.Fresher = response.data.Fresher;
            $scope.ExpectedCTC = response.data.ExpectedCTC;
            $scope.PreviousCTC = response.data.PreviousCTC;
            $scope.Otherallowance = response.data.Otherallowance;
            $scope.Experience = response.data.Experience;
            $scope.Candidatephoto = response.data.Candidatephoto;
            $scope.GetExpereience($scope.Fresher);
            if ($scope.Emailverified == "Yes")
            {
                $scope.btnemail = false;
            }
            if($scope.Smsverified == "Yes")
            {
                $scope.btnsms = false;
            }
            if ($scope.Emailverified == "Yes" && $scope.Smsverified == "Yes") {
                $scope.btnMove = true;
                $scope.btnsms = false;
            $scope.btnemail = false;
            } else {
                $scope.btnMove = false;
            }
            // $scope.ResetEducation();
        });
    }


    ////////////////////////////

    ///////////////////////////////////////////////////////
    $scope.MoveToCandidate = function() {
        $scope.btnsaveadmin2 = true;
        $scope.CheckingSession();
        // $scope.Applicationid = Applicationid;
        $http({
            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Method': "MoveToCandidate"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.btnsaveadmin2 = false;
            $scope.TempMessage = response.data.Message;
            //$scope.Tempnextno = response.data.Nextno;


            $scope.TempSave();
       
            // $scope.ResetEducation();
        });
    }

    //////////////////////////////


    $scope.SaveApplication = function() {
        
       // $scope.btnsaveadmin = true;
     $scope.CheckingSession();
        
        $http({
            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Qualification': $scope.Qualification,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'Vaccancy': $scope.Vaccancy,
                'Selectionstatus': $scope.Selectionstatus,
                'ApplicationDate': $scope.ApplicationDate,
                'InterviewDate': $scope.InterviewDate,
                'Interviewtime': $scope.Interviewtime,
                'Fresher': $scope.Fresher,
                'ExpectedCTC': $scope.ExpectedCTC,
                'PreviousCTC': $scope.PreviousCTC,
                'Otherallowance' : $scope.Otherallowance,
                'Experience' :$scope.Experience,
                'Method': 'Save'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
           


            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;
          //  $scope.btnsaveadmin = false;

            $scope.TempSave();
            
       

        });

    };
    ///////////////////////////////////////////
    $scope.Getallvalues = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "job.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetApplicationList = response.data;
        });
    };



    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Qualifi' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetQualififcationList = response.data;
    });



    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Posapp' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetVaccancyList = response.data;
    });

    ///////////////////////////////

    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Lang' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetLanguageList = response.data;
    });
    //////////////////////////////////////


    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetApplicationList = response.data;
    });

    ////////////////////////////////////////

    $http(

        {

            method: "POST",
            url: "job.php",
            data: { 'Method': 'ModuleNext' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.Applicationid = response.data;
    });

    //////////////////////////////////////////////
    $http({



        method: "POST",
        url: "job.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.ApplicationDate = response.data.date;
        //   $scope.GetApplicationDate();
        //  $scope.FetchMaster();


    });
    ///////////////////////////////////////////////
    $http({



        method: "POST",
        url: "job.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.InterviewDate = response.data.date;
        //$scope.GetInterviewDate();
        //  $scope.FetchMaster();


    });


    ///////////////////////////////////////////////


    $scope.Getnextno = function() {
            $http(

                {

                    method: "POST",
                    url: "job.php",
                    data: { 'Method': 'ModuleNext' },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                }).then(function successCallback(response) {
                //////// alert(response.data);
                $scope.Applicationid = response.data;
                $scope.GetExpereience($scope.Fresher);
            });


        }
        //////////////////////////////////

    $scope.UpdateApplication = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Qualification': $scope.Qualification,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'ApplicationDate': $scope.ApplicationDate,
                'InterviewDate': $scope.InterviewDate,
                'Interviewtime': $scope.Interviewtime,
                'Vaccancy': $scope.Vaccancy,
                'Selectionstatus': $scope.Selectionstatus,
                'Fresher': $scope.Fresher,
                'ExpectedCTC': $scope.ExpectedCTC,
                'PreviousCTC': $scope.PreviousCTC,
                'Otherallowance' : $scope.Otherallowance,
                'Experience' :$scope.Experience,
                'Method': 'Update'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            //  $scope.Tempnextno = response.data.Nextno;
            $scope.TempSave();
        });

    };
    ///////////////////////////////////////////
    $scope.Sendemail = function() {
        $http({



            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Emailid': $scope.Emailid,

                'Method': 'Emailverification'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            // alert(response.data.Message);
            // $scope.Tempnextno = response.data.Nextno;
            $scope.TempSave();
        });

    };

    ////////////////////////////////////////////
    $scope.Emailverification01 = function() {

        $scope.Message = true;
        $scope.Message = "Please Wait Email Sending...";

        $http({



            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Firstname': $scope.Firstname,
                'Emailid': $scope.Emailid,

                'Method': 'Emailverification01'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();
        });
    }

    /////////////////////////////////


    $scope.emailchecking = function(email) {
            $scope.Testemail = email;
            var val = $scope.Testemail;
         
            var useremail = val;
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
    
    if(!pattern.test(useremail))
    {
        $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID ..........";
         $timeout(function() { $scope.Message = ""; }, 3000);
             return false;
    }
    $scope.Message = false;
    $scope.GetMailunique(val);
    return true;
            $scope.Message = false;
            $scope.GetMailunique(val);
            return true;
        }
        ////////////////////////////////
    $scope.emailchecking01 = function(email) {
        $scope.Testemail = email;
        var val = $scope.Testemail;
        if (!val.match(/\S+@\S+\.\S+/)) { // Jaymon's / Squirtle's solution
            // Do something
            $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID ..........";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            return false;
        }
        if (val.indexOf(' ') != -1 || val.indexOf('..') != -1) {
            // Do something
            $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID ..........";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            return false;
        }
        $scope.Message = false;
        //   $scope.GetMailunique(val);
        return true;
    }

    ///////////////////////

    $scope.GetMailunique = function(Emailid) {
        $scope.Emailid = Emailid;
        $http({
            method: "POST",
            url: "job.php",
            data: {

                'Emailid': $scope.Emailid,

                'Method': 'Mailunique'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);


            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
        });
    }


    /////////////////////

    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'EDITMASTER' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetApplicationList02 = response.data;
    });
    /////////////////////////////////
    $scope.GetEditList = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "job.php",
            data: { 'Method': 'EDITMASTER' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetApplicationList02 = response.data;
        });

    }

    $scope.GetContactnounique = function(Contactno) {
        $scope.CheckingSession();
        $scope.Contactno = Contactno;
        $http({
            method: "POST",
            url: "job.php",
            data: {

                'Contactno': $scope.Contactno,

                'Method': 'Contactnounique'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);


            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
        });

    };
    ////////////////////////////////
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
    
    ///////////////////////////
        $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'cat3' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetCat3ApplicationList = response.data;
    });
    ///////////////////////////////////////
    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Maritalstatus' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetMaritalstatusList = response.data;
    });
    ///////////////////
    $scope.Getallvaluescat03 = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "job.php",
            data: { 'Method': 'cat3' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetCat3ApplicationList = response.data;
        });
    };
    //////////////////////
    $(document).ready(function(e) {
        $scope.CheckingSession();
        $('#fileButton01').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInput01').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput01').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Applicationid", $("#Applicationid").val());
           
           
            $.ajax({
                url: 'Uploadimage.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    $scope.FetchApplication ($scope.Applicationid);
                    document.getElementById("fileInput01").value = '';

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
    ////////////////////
=======
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM22Controller', function($scope, $http, $timeout, $filter) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageApplication = 1;
    $scope.pageSizeApplication = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.Title = "Mr.";
    $scope.Firstname = "";
    $scope.Lastname = "";
    $scope.Gender = "Male";
    $scope.Qualification = "";
    $scope.Married = "Married";
    $scope.Mothertongue = "";
    $scope.Contactno = "";
    $scope.Category = "";
    $scope.Emailid = "";
    $scope.Selectionstatus = "Shortlisted";
    $scope.Vaccancy = "";
    $scope.ApplicationDate = "";
    $scope.InterviewDate = "";
    $scope.Interviewtime = "";
    $scope.Smsverified = "No";
    $scope.Emailverified = "No";
    $scope.btnSave = true;
    $scope.btnUpdate = false;
    $scope.Fresher = "Yes";
    $scope.ExpectedCTC = "0";
    $scope.PreviousCTC = "0";
    $scope.Otherallowance = "0";
    $scope.Experience = "";
    if ($scope.Fresher == "Yes") {
        $scope.btnPrevious = true;
        $scope.PreviousCTC = "0";
    } else {
        $scope.btnPrevious = false;
    }
$scope.btnsms = false;
$scope.btnemail = false;

    $scope.Reset = function() {
        $scope.CheckingSession();

        $scope.Title = "Mr.";
        $scope.Firstname = "";
        $scope.Lastname = "";
        $scope.Gender = "Male";
        $scope.Qualification = "";
        $scope.Married = "Married";
        $scope.Mothertongue = "";
        $scope.Contactno = "";
        $scope.Category = "";
        $scope.Emailid = "";
        $scope.Selectionstatus = "Shortlisted";
        $scope.Vaccancy = "";
        $scope.ApplicationDate = "";
        $scope.InterviewDate = "";
        $scope.Interviewtime = "";
        $scope.btnSave = true;
        $scope.btnUpdate = false;
        $scope.Smsverified = "No";
        $scope.Emailverified = "No";
        $scope.Fresher = "Yes";
        $scope.ExpectedCTC = "0";
        $scope.PreviousCTC = "0";
        $scope.btnsms = false;
$scope.btnemail = false;
$scope.Otherallowance = "0";
$scope.Experience = "";
        $scope.Getnextno();

    }

    $scope.GetExpereience = function(Fresher) {
        $scope.Fresher = Fresher;
        if ($scope.Fresher == "Yes") {
            $scope.btnPrevious = true;
            $scope.PreviousCTC = "0";
        } else {
            $scope.btnPrevious = false;
        }

    }
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
        if ($scope.TempMessage == "vacc") {
            $scope.Message = true;
            $scope.Message = "Please Select Position of Applicant";
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

        if($scope.TempMessage =="InternalNumberYes"){
            $scope.Message = true;
            $scope.Message = "This number is Internal Office Number. Use another mobile number.";
            $scope.Contactno="";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if($scope.TempMessage =="InternalEmailYes"){
            $scope.Message = true;
            $scope.Message = "This email is an internal official email id. Use different email id.";
            $scope.Emailid="";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Applicationid = $scope.Tempnextno;

            $scope.btnSave = false;
            $scope.btnUpdate = true;

            $scope.btnsms = true;
            $scope.btnemail = true;
            $scope.Emailverification01();

        }
        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Data Updated Sucessfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Email") {
            $scope.Message = true;
            $scope.Message = "Please Fill the Email...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Category") {
            $scope.Message = true;
            $scope.Message = "Please Select Category...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Emailverification") {
            $scope.Message = true;
            $scope.Message = "Email sent successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Mail Sent") {
            $scope.Message = true;
            $scope.Message = "Email sent successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "ContactYes") {
            $scope.Message = true;
            $scope.Message = "This Mobile No Already Exists...";

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Contactno = "";


        }

        if ($scope.TempMessage == "MailYes") {
            $scope.Message = true;
            $scope.Message = "This Mail ID Already Exists...";

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Emailid = "";


        }
        if ($scope.TempMessage == "MovedToCandidate") {
            $scope.Message = true;
            $scope.Message = "Data  Moved to Candidate Master Sucessfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.GetEditList();
            $('#myCarousel').carousel(0);


        }




    }
    $scope.SendEdit = function(Applicationid) {


        $scope.Applicationid = Applicationid;

        $('#myCarousel').carousel(1);

        $scope.FetchApplication($scope.Applicationid);
    }




    ///////////////////////////////////////////////////////
    $scope.FetchApplication = function(Applicationid) {
        $scope.CheckingSession();
        $scope.selectedValue = [];
        $scope.Applicationid = Applicationid;
        $scope.btnsms = true;
        $scope.btnemail = true;
        
        $http({
            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Method': "FetchApplication"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Title = response.data.Title;
            $scope.Firstname = response.data.Firstname;
            $scope.Lastname = response.data.Lastname;
            $scope.Gender = response.data.Gender;
            $scope.Qualification = response.data.Qualification;
            $scope.Married = response.data.Married;
            $scope.Mothertongue = response.data.Mothertongue;
            $scope.Contactno = response.data.Contactno;
            $scope.Category = response.data.Category;
            $scope.Emailid = response.data.Emailid;
            $scope.Selectionstatus = response.data.Selectionstatus;
            $scope.ApplicationDate = response.data.ApplicationDate;
            $scope.InterviewDate = response.data.InterviewDate;
            $scope.Interviewtime = response.data.Interviewtime;
            $scope.Vaccancy = response.data.Vaccancy;
            $scope.Smsverified = response.data.Smsverified;
            $scope.Emailverified = response.data.Emailverified;
            $scope.Fresher = response.data.Fresher;
            $scope.ExpectedCTC = response.data.ExpectedCTC;
            $scope.PreviousCTC = response.data.PreviousCTC;
            $scope.Otherallowance = response.data.Otherallowance;
            $scope.Experience = response.data.Experience;
            $scope.Candidatephoto = response.data.Candidatephoto;
            $scope.GetExpereience($scope.Fresher);
            if ($scope.Emailverified == "Yes")
            {
                $scope.btnemail = false;
            }
            if($scope.Smsverified == "Yes")
            {
                $scope.btnsms = false;
            }
            if ($scope.Emailverified == "Yes" && $scope.Smsverified == "Yes") {
                $scope.btnMove = true;
                $scope.btnsms = false;
            $scope.btnemail = false;
            } else {
                $scope.btnMove = false;
            }
            // $scope.ResetEducation();
        });
    }


    ////////////////////////////

    ///////////////////////////////////////////////////////
    $scope.MoveToCandidate = function() {
        $scope.btnsaveadmin2 = true;
        $scope.CheckingSession();
        // $scope.Applicationid = Applicationid;
        $http({
            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Method': "MoveToCandidate"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.btnsaveadmin2 = false;
            $scope.TempMessage = response.data.Message;
            //$scope.Tempnextno = response.data.Nextno;


            $scope.TempSave();
       
            // $scope.ResetEducation();
        });
    }

    //////////////////////////////


    $scope.SaveApplication = function() {
        
       // $scope.btnsaveadmin = true;
     $scope.CheckingSession();
        
        $http({
            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Qualification': $scope.Qualification,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'Vaccancy': $scope.Vaccancy,
                'Selectionstatus': $scope.Selectionstatus,
                'ApplicationDate': $scope.ApplicationDate,
                'InterviewDate': $scope.InterviewDate,
                'Interviewtime': $scope.Interviewtime,
                'Fresher': $scope.Fresher,
                'ExpectedCTC': $scope.ExpectedCTC,
                'PreviousCTC': $scope.PreviousCTC,
                'Otherallowance' : $scope.Otherallowance,
                'Experience' :$scope.Experience,
                'Method': 'Save'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
           


            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;
          //  $scope.btnsaveadmin = false;

            $scope.TempSave();
            
       

        });

    };
    ///////////////////////////////////////////
    $scope.Getallvalues = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "job.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetApplicationList = response.data;
        });
    };



    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Qualifi' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetQualififcationList = response.data;
    });



    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Posapp' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetVaccancyList = response.data;
    });

    ///////////////////////////////

    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Lang' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetLanguageList = response.data;
    });
    //////////////////////////////////////


    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetApplicationList = response.data;
    });

    ////////////////////////////////////////

    $http(

        {

            method: "POST",
            url: "job.php",
            data: { 'Method': 'ModuleNext' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.Applicationid = response.data;
    });

    //////////////////////////////////////////////
    $http({



        method: "POST",
        url: "job.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.ApplicationDate = response.data.date;
        //   $scope.GetApplicationDate();
        //  $scope.FetchMaster();


    });
    ///////////////////////////////////////////////
    $http({



        method: "POST",
        url: "job.php",
        data: { 'Method': 'FetchDate' },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.InterviewDate = response.data.date;
        //$scope.GetInterviewDate();
        //  $scope.FetchMaster();


    });


    ///////////////////////////////////////////////


    $scope.Getnextno = function() {
            $http(

                {

                    method: "POST",
                    url: "job.php",
                    data: { 'Method': 'ModuleNext' },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

                }).then(function successCallback(response) {
                //////// alert(response.data);
                $scope.Applicationid = response.data;
                $scope.GetExpereience($scope.Fresher);
            });


        }
        //////////////////////////////////

    $scope.UpdateApplication = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Qualification': $scope.Qualification,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'ApplicationDate': $scope.ApplicationDate,
                'InterviewDate': $scope.InterviewDate,
                'Interviewtime': $scope.Interviewtime,
                'Vaccancy': $scope.Vaccancy,
                'Selectionstatus': $scope.Selectionstatus,
                'Fresher': $scope.Fresher,
                'ExpectedCTC': $scope.ExpectedCTC,
                'PreviousCTC': $scope.PreviousCTC,
                'Otherallowance' : $scope.Otherallowance,
                'Experience' :$scope.Experience,
                'Method': 'Update'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            //  $scope.Tempnextno = response.data.Nextno;
            $scope.TempSave();
        });

    };
    ///////////////////////////////////////////
    $scope.Sendemail = function() {
        $http({



            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Emailid': $scope.Emailid,

                'Method': 'Emailverification'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            // alert(response.data.Message);
            // $scope.Tempnextno = response.data.Nextno;
            $scope.TempSave();
        });

    };

    ////////////////////////////////////////////
    $scope.Emailverification01 = function() {

        $scope.Message = true;
        $scope.Message = "Please Wait Email Sending...";

        $http({



            method: "POST",
            url: "job.php",
            data: {
                'Applicationid': $scope.Applicationid,
                'Firstname': $scope.Firstname,
                'Emailid': $scope.Emailid,

                'Method': 'Emailverification01'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();
        });
    }

    /////////////////////////////////


    $scope.emailchecking = function(email) {
            $scope.Testemail = email;
            var val = $scope.Testemail;
         
            var useremail = val;
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
    
    if(!pattern.test(useremail))
    {
        $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID ..........";
         $timeout(function() { $scope.Message = ""; }, 3000);
             return false;
    }
    $scope.Message = false;
    $scope.GetMailunique(val);
    return true;
            $scope.Message = false;
            $scope.GetMailunique(val);
            return true;
        }
        ////////////////////////////////
    $scope.emailchecking01 = function(email) {
        $scope.Testemail = email;
        var val = $scope.Testemail;
        if (!val.match(/\S+@\S+\.\S+/)) { // Jaymon's / Squirtle's solution
            // Do something
            $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID ..........";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            return false;
        }
        if (val.indexOf(' ') != -1 || val.indexOf('..') != -1) {
            // Do something
            $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID ..........";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            return false;
        }
        $scope.Message = false;
        //   $scope.GetMailunique(val);
        return true;
    }

    ///////////////////////

    $scope.GetMailunique = function(Emailid) {
        $scope.Emailid = Emailid;
        $http({
            method: "POST",
            url: "job.php",
            data: {

                'Emailid': $scope.Emailid,

                'Method': 'Mailunique'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);


            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
        });
    }


    /////////////////////

    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'EDITMASTER' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetApplicationList02 = response.data;
    });
    /////////////////////////////////
    $scope.GetEditList = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "job.php",
            data: { 'Method': 'EDITMASTER' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetApplicationList02 = response.data;
        });

    }

    $scope.GetContactnounique = function(Contactno) {
        $scope.CheckingSession();
        $scope.Contactno = Contactno;
        $http({
            method: "POST",
            url: "job.php",
            data: {

                'Contactno': $scope.Contactno,

                'Method': 'Contactnounique'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);


            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
        });

    };
    ////////////////////////////////
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
    
    ///////////////////////////
        $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'cat3' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetCat3ApplicationList = response.data;
    });
    ///////////////////////////////////////
    $http({
        method: "POST",
        url: "job.php",
        data: { 'Method': 'Maritalstatus' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetMaritalstatusList = response.data;
    });
    ///////////////////
    $scope.Getallvaluescat03 = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "job.php",
            data: { 'Method': 'cat3' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetCat3ApplicationList = response.data;
        });
    };
    //////////////////////
    $(document).ready(function(e) {
        $scope.CheckingSession();
        $('#fileButton01').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInput01').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput01').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Applicationid", $("#Applicationid").val());
           
           
            $.ajax({
                url: 'Uploadimage.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    $scope.FetchApplication ($scope.Applicationid);
                    document.getElementById("fileInput01").value = '';

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
    ////////////////////
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
});