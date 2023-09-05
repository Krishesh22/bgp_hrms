var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRMApiController', function($scope, $http, $timeout, $filter, $window) {

    $scope.Method = "";

    $scope.GetMembertypeList = [];
    $scope.currentPageCandidate = 1;
    $scope.pageSizeCandidate = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
    $scope.currentPageEducation = 1;
    $scope.pageSizeEducation = 10;

    $scope.btnotherinformation = false;
    $scope.btnprevious = false;
    $scope.btnpresentworking = false;
    $scope.Title = "Mr.";
    $scope.Firstname = "";
    $scope.Lastname = "";
    $scope.Gender = "Male";
    $scope.Qualification = "";
    $scope.Married = "";
    $scope.Mothertongue = "";
    $scope.Contactno = "";
    $scope.Category = "";
    $scope.Emailid = "";
    $scope.Dob = "";
    $scope.Age = "";
    $scope.Bloodgroup = "";
    $scope.Expereience = "";
    $scope.Fresher = "";
    $scope.ServingNoticeperiod = "";
    $scope.NoticePeriod = "";
    $scope.Religion = "";
    $scope.Languagesknown = "";
    $scope.Previoussainmarksemployee = "";
    $scope.Previous_Sainmark_Worked_Designation = "";
    $scope.PreviousDesignation = "";
    $scope.PreviousDepartment = "";
    $scope.Workingperiod = "";
    $scope.Releivingreason = "";
    $scope.CurrentOrganization = "";
    $scope.Availableoninterview = "";
    $scope.PreviousPosition = "";
    $scope.AppliedPosition = "";
    $scope.CurrentCTC = "";
    $scope.ExpectedCTC = "";
    $scope.NegotiableCTC = "";
    $scope.Willingtorelocate = "";
    $scope.MD_Approve = "";
    $scope.HR_Approve = "";
    $scope.GM_Approve = "";
    $scope.DH_Approve = "";
    $scope.Vaccancy_Known = "";
    $scope.Refrence = "";
    $scope.Taken_Interview = "";
    $scope.Interview_held_On = "";
    $scope.Date_Of_Joing = "";
    $scope.MD_Decline = "";
    $scope.GM_Decline = "";
    $scope.HR_Decline = "";
    $scope.DH_Decline = "";
    $scope.Selectionstatus = "";
    $scope.MD_Approve_datetime = "";
    $scope.HR_Approve_datetime = "";
    $scope.GM_Approve_datetime = "";
    $scope.DH_Approve_datetime = "";
    $scope.HRDecline = true;
    $scope.DHDecline = true;
    $scope.GMDecline = true;
    $scope.MDDecline = true;
    $scope.btnsave = true;
    $scope.btnupdate = false;
    $scope.ApprovedType = "";
    $scope.Approvedstatus = "";
    $scope.CandidateAccepted = "";
    $scope.CommitedCTC = "";
    $scope.btnotherinformation = false;
    $scope.btnprevious = false;
    $scope.btnpresentworking = false;
    $scope.btnapprove = false;
    $scope.btninterviewinfo = false;
    $scope.btnappointmentinfo = false;
    $scope.City = "";
    $scope.btnEducation = false;
    $scope.interviewerid = "";
    $scope.Reschedule_interview = "";
    $scope.Reschedule_interview_reason = "";
    $scope.DHinterviewdate = "";
    /////////Basic DA//////////
    $scope.CurMotBasicDA = 0;
    $scope.CurAnnuaBasicDA = 0;
    $scope.CurincperBasicDA = 0;
    $scope.CurincperHRA = 0;
    $scope.CurAnnuaHRA = 0;
    $scope.CurMotHRA = 0;
    $scope.CurMotSpecialAllowance = 0;
    $scope.CurAnnuaSpecialAllowance = 0;
    $scope.CurincperSpecialAllowance = 0;
    $scope.CurMotTotalAllowance = 0;

    $scope.CurAnnuaTotalAllowance = 0;
    $scope.CurincperTotalAllowance = 0;
    $scope.CurMotPFemployeer = 0;
    $scope.CurAnnuaPFemployeer = 0;
    $scope.CurincperPFemployeer = 0;
    $scope.CurMotGratuity = 0;
    $scope.CurAnnuaGratuity = 0;
    $scope.CurincperGratuity = 0;
    $scope.CurMotRetairlsTotal = 0;
    $scope.CurAnnuaRetairlsTotal = 0;

    $scope.CurincperRetairlsTotal = 0;
    $scope.CurMotGAC = 0;
    $scope.CurAnnuaGAC = 0;
    $scope.CurincperGAC = 0;
    $scope.CurMotEstimatedBonous = 0;
    $scope.CurAnnuaEstimatedBonous = 0;
    $scope.CurincperEstimatedBonous = 0;
    $scope.CurMotOtherBonous = 0;
    $scope.CurAnnuaOtherBonous = 0;
    $scope.CurincperOtherBonous = 0;
    $scope.CurMotOtherComponents = 0;
    $scope.CurAnnuaOtherComponents = 0;
    $scope.CurincperOtherComponents = 0;
    $scope.CurMotCTC = 0;
    $scope.CurAnnuaCTC = 0;
    $scope.CurincperCTC = 0;
    $scope.CurMotDeductions = 0;
    $scope.CurAnnuaDeductions = 0;
    $scope.CurincperDeductions = 0;
    $scope.CurMotESIC = 0;
    $scope.CurAnnuaESIC = 0;
    $scope.CurincperESIC = 0;
    $scope.CurMotCurincperPFemployee = 0;
    $scope.CurAnnuaCurincperPFemployee = 0;
    $scope.CurincperCurincperPFemployee = 0;
    $scope.CurMotCanteen = 0;
    $scope.CurAnnuaCanteen = 0;
    $scope.CurincperCanteen = 0;
    $scope.CurMotStayAllowance = 0;
    $scope.CurAnnuaStayAllowance = 0;
    $scope.CurincperStayAllowance = 0;
    $scope.CurMotTravelAllowance = 0;
    $scope.CurAnnuaTravelAllowance = 0;
    $scope.CurincperTravelAllowance = 0;
    $scope.CurMotOtherDeductions = 0;
    $scope.CurAnnuaOtherDeductions = 0;
    $scope.CurincperOtherDeductions = 0;
    $scope.CurMotDeductionTotal = 0;
    $scope.CurAnnuaDeductionTotal = 0;

    $scope.CurincperDeductionTotal = 0;
    $scope.CurMottakehomewithouttax = 0;
    $scope.CurAnnuatakehomewithouttax = 0;
    $scope.Curincpertakehomewithouttax = 0;
    $scope.CurMotPFemployee = 0;
    $scope.CurAnnuaPFemployee = 0;
    $scope.CurincperPFemployee = 0;
    $scope.FitStatus = "Open";
    $scope.AllowPF = "";
    $scope.currentPageSalary = 1;
    $scope.pageSizeSalary = 10;
    $scope.Reportingname = "";
    $scope.ReportingToid = "";
    $scope.Business = "";
    $scope.Designationproposed = "";
    $scope.Location = "";
    $scope.VaccinationView = "";
    $scope.Vaccinateddate = "";
    $scope.Covidvaccinated = "";
    $scope.OldEmpName = "";
    $scope.OldEmpid = "";
    $scope.Department = "";
    $scope.Selectionstatus = "Pending";
    $scope.currentPageVaccination = 1;
    $scope.pageSizeVaccination = 5;
    $scope.btnfresherno = false;
    $scope.selectedValue = "";
    $scope.selected = {};
    $scope.DHinterviewdate = "";
    $scope.Address = "";
    $scope.ApplicationDate = "";
    $scope.Category = "";
    $scope.Married = "Yes";
    $scope.Mothertongue = "Tamil";
    $scope.Nationality = "INDIAN";
    $scope.Candidateinterviewtime = "";
    $scope.btnHR = true;
    $scope.btnDH = true;
    $scope.btnGM = true;
    $scope.btnMD = true;
    $scope.HRinterviewnotes = "";
    $scope.DHinterviewnotes = "";
    $scope.GMinterviewnotes = "";
    $scope.MDinterviewnotes = "";
    $scope.btnshow = false;
    $scope.Performanceallowancemonthly = "0";
    $scope.Performanceallowanceyearly = "0";
    ///////////Retailrs(PF Employeer 12%)

    ///////////////////////////////



    $scope.TempSave = function() {

        if ($scope.TempMessage == "Mail Sent") {
            $scope.Message = true;
            $scope.Message = "E-Mail Sent Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }


        if ($scope.TempMessage == "HRApproved") {
            $scope.btnshowfitment = true;
        }
        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Please Enter Detail";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }


        if ($scope.TempMessage == "DHinterviewnotes") {
            alert("Please Enter Depertment Interview Notes");
            $scope.Message = true;
            $scope.Message = "Please Enter Depertment Interview Notes";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "GMinterviewnotes") {
            alert("Please Enter General Interview Notes");
            $scope.Message = true;
            $scope.Message = "Please Enter General Interview Notes";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "MDinterviewnotes") {
            alert("Please Enter Admin Interview Notes");
            $scope.Message = true;
            $scope.Message = "Please Enter Admin Interview Notes";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "HRinterviewnotes") {
            alert("Please Enter  Interview Notes");
            $scope.Message = true;
            $scope.Message = "Please Enter  Interview Notes";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }


        if ($scope.TempMessage == "FitmentCreate") {
            alert("Please Create Fitment ");
            $scope.Message = true;
            $scope.Message = "Please Create Fitment";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "FitType") {
            $scope.Message = true;
            $scope.Message = "Please Select Fitment Type";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }

        if ($scope.TempMessage == "Candidateinterviewtime") {
            $scope.Message = true;
            $scope.Message = "Please Enter Interview Time";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }


        if ($scope.TempMessage == "Thankyou") {
            $scope.Message = true;
            window.location.replace($scope.LoadUrl);
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "interviewerid") {
            $scope.Message = true;
            $scope.Message = "Please Select Interviewer Details";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Interview_held_On") {
            $scope.Message = true;
            $scope.Message = "Please Enter Interview Date";
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
        if ($scope.TempMessage == "Emailid") {
            $scope.Message = true;
            $scope.Message = "Please Enter Email Id ...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Gender") {
            $scope.Message = true;
            $scope.Message = "Please Select Gender ...";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Category") {
            $scope.Message = true;
            $scope.Message = "Please Select Category...";
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

        if ($scope.TempMessage == "FinalNotMove") {
            $scope.Message = true;
            $scope.Message = "Please confirm Fitment ....."
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "MD_Decline") {
            $scope.Message = true;
            $scope.Message = "Please Enter Rejected Reason...";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "DH_Decline") {
            $scope.Message = true;
            $scope.Message = "Please Enter Rejected Reason...";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "HR_Decline") {
            $scope.Message = true;
            $scope.Message = "Please Enter Rejected Reason...";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "GM_Decline") {
            $scope.Message = true;
            $scope.Message = "Please Enter Rejected Reason...";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Approved") {
            $scope.Message = true;
            $scope.Message = "Please Select Type...";
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
            $scope.Candidateid = $scope.Tempnextno;
            $scope.btnsave = false;
            $scope.btnupdate = true;
            $scope.ResetEducation();
        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "ChkApprove") {
            $scope.Message = true;
            $scope.Message = "Still Management not Approved this Candidate..........";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Alreadyin") {
            $scope.Message = true;
            $scope.Message = "This Candidate Already Moved in Employee Master..........";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }

        if ($scope.TempMessage == "Address") {
            $scope.Message = true;
            $scope.Message = "Please Enter Address Information..........";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Moved") {
            $scope.Message = true;
            $scope.Message = "Candidate Moved Employee Master";
            $timeout(function() { $scope.Message = ""; }, 3000);



        }

        if ($scope.TempMessage == "FitNextno") {
            $scope.Message = true;
            $scope.Message = "Please Select Fitment Details";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }

        if ($scope.TempMessage == "Studied") {
            $scope.Message = true;
            $scope.Message = "Please Enter Studied Detail";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Monthly HRA") {
            $scope.Message = true;
            $scope.Message = "Please Enter Monthly HRA ";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Monthly Basic") {
            $scope.Message = true;
            $scope.Message = "Please Enter Monthly Basic ";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Annual Basic") {
            $scope.Message = true;
            $scope.Message = "Please Enter Annual Basic";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Annual HRA") {
            $scope.Message = true;
            $scope.Message = "Please Enter Annual HRA";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Annual GAC") {
            $scope.Message = true;
            $scope.Message = "Please Enter Annual Gross Salary";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Month GAC") {
            $scope.Message = true;
            $scope.Message = "Please Enter Monthly Gross Salary";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "CurMotSpecialAllowance") {
            $scope.Message = true;
            $scope.Message = "Please Enter Monthly Special Allowance";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Annua Special Allowance") {
            $scope.Message = true;
            $scope.Message = "Please Enter Annual Special Allowance";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Monthly Take Home") {
            $scope.Message = true;
            $scope.Message = "Please Enter Monthly Take Home Salary";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Month CTC") {
            $scope.Message = true;
            $scope.Message = "Please Enter Monthly CTC";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Annua CTC") {
            $scope.Message = true;
            $scope.Message = "Please Enter Annual CTC";
            $timeout(function() { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "FitUpdate") {

            $scope.Message = true;
            $scope.Message = "Data Saved / Updated Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);
            if ($scope.FitStatus == "Final") {
                $scope.FinalMove();
                $('#ModalCenter1').modal('hide');
            }
            if ($scope.FitStatus == "Cancel") {
                $('#ModalCenter1').modal('hide');
            }
        }
        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Data Updated Sucessfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
    }


    /////////////////////////////////////////





    //////////////////////////////////





    ///////////////////////////////////////////////////////
    $scope.FetchCandidate = function(Candidateid) {
        $scope.selectedValue = [];
        $scope.Candidateid = Candidateid;
        $http({
            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Method': "FetchCandidate"
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
            //alert($scope.Category);
            $scope.GMApprovalbutton();
            $scope.Emailid = response.data.Emailid;
            $scope.Dob = response.data.Dob;
            $scope.Age = response.data.Age;
            $scope.Bloodgroup = response.data.Bloodgroup;
            $scope.Expereience = response.data.Expereience;
            $scope.Fresher = response.data.Fresher;
            $scope.ServingNoticeperiod = response.data.ServingNoticeperiod;
            $scope.NoticePeriod = response.data.NoticePeriod;
            $scope.Religion = response.data.Religion;
            // $scope.Languagesknown = response.data.Languagesknown;
            $scope.Previoussainmarksemployee = response.data.Previoussainmarksemployee;
            $scope.PreviousDesignation = response.data.Previous_Sainmark_Worked_Designation;
            // $scope.PreviousDesignation =response.data.PreviousDesignation;
            $scope.PreviousDepartment = response.data.PreviousDepartment;
            $scope.Workingperiod = response.data.Workingperiod;
            $scope.Releivingreason = response.data.Releivingreason;
            $scope.CurrentOrganization = response.data.CurrentOrganization;
            $scope.Availableoninterview = response.data.Availableoninterview;
            $scope.PreviousPosition = response.data.PreviousPosition;
            $scope.AppliedPosition = response.data.AppliedPosition;
            $scope.CurrentCTC = response.data.CurrentCTC;
            $scope.ExpectedCTC = response.data.ExpectedCTC;
            $scope.NegotiableCTC = response.data.NegotiableCTC;
            $scope.Willingtorelocate = response.data.Willingtorelocate;
            $scope.MD_Approve = response.data.MD_Approve;
            $scope.HR_Approve = response.data.HR_Approve;
            $scope.GM_Approve = response.data.GM_Approve;
            $scope.DH_Approve = response.data.DH_Approve;
            $scope.Vaccancy_Known = response.data.Vaccancy_Known;
            $scope.Refrence = response.data.Refrence;
            $scope.Taken_Interview = response.data.Taken_Interview;
            $scope.Interview_held_On = response.data.Interview_held_On;
            $scope.Date_Of_Joing = response.data.Date_Of_Joing;
            $scope.MD_Decline = response.data.MD_Decline;
            $scope.GM_Decline = response.data.GM_Decline;
            $scope.HR_Decline = response.data.HR_Decline;
            $scope.DH_Decline = response.data.DH_Decline;
            $scope.Selectionstatus = response.data.Selectionstatus;
            $scope.MD_Approve_datetime = response.data.MD_Approve_datetime;
            $scope.HR_Approve_datetime = response.data.HR_Approve_datetime;
            $scope.GM_Approve_datetime = response.data.GM_Approve_datetime;
            $scope.DH_Approve_datetime = response.data.DH_Approve_datetime;
            $scope.Reschedule_interview = response.data.Reschedule_interview;
            $scope.Reschedule_interview_reason = response.data.Reschedule_interview_reason;
            $scope.CandidateAccepted = response.data.CandidateAccepted;
            $scope.CommitedCTC = response.data.CommitedCTC;
            $scope.City = response.data.City;
            $scope.interviewerid = response.data.interviewerid;
            $scope.Reportingname = response.data.Reportingname;
            $scope.ReportingToid = response.data.ReportingToid;
            $scope.Business = response.data.Business;
            $scope.Designationproposed = response.data.Designationproposed;
            $scope.Location = response.data.Location;
            $scope.OldEmpName = response.data.OldEmpName;
            $scope.OldEmpid = response.data.OldEmpid;
            $scope.Department = response.data.Department;
            $scope.Languages = response.data.Languagesknown;
            $scope.Address = response.data.Address;
            $scope.ApplicationDate = response.data.ApplicationDate;
            $scope.Languagestest = response.data.Languagesknown;
            $scope.selectedValue = response.data.Languagesknown;
            $scope.Candidateinterviewtime = response.data.Candidateinterviewtime;
            $scope.HRinterviewnotes = response.data.HRinterviewnotes;
            $scope.DHinterviewnotes = response.data.DHinterviewnotes;
            $scope.GMinterviewnotes = response.data.GMinterviewnotes;
            $scope.MDinterviewnotes = response.data.MDinterviewnotes;
            $scope.DHinterviewdate = response.data.DHinterviewdate;
            // alert($scope.selectedValue);
            if ($scope.selectedValue == "") {
                $scope.selectedValue = [];
            } else {
                $scope.selectedValue = $scope.selectedValue.split(',');
            }
            $scope.selected = {};
            angular.forEach($scope.selectedValue, function(val, key) {
                var r = $filter('filter')($scope.GetLanguageList, { Languages: val })[0].Languages;
                if (r != undefined) {
                    $scope.selected[r] = true;
                } else {
                    $scope.selected[r] = false;
                }


            });
            // $scope.GMApprovalbutton();
            $scope.Approvalbuttons();




            //$scope.FetchCovidvaccination();
        });
    }


    /////////////////
    $scope.GMApprovalbutton = function() {
            // alert($scope.Category);

            $scope.btncategory3 = false;
            if ($scope.Category == "Category 1") {
                $scope.btncategory3 = true;
            }
        }
        //////////////////////////////////////
    $scope.Approvalbuttons = function() {



        $scope.btnHR = true;
        $scope.btnDH = true;
        $scope.btnGM = true;
        $scope.btnMD = true;
        // $scope.btncategory3 = false;

        if ($scope.Category == "Category 3") {


            if ($scope.HR_Approve == "Pending") {
                $scope.btnHR = false;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
            }
            if ($scope.HR_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = false;
                $scope.btnGM = true;
                $scope.btnMD = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = false;
                $scope.btnMD = true;
            }
        }





        if ($scope.Category == "Category 1") {
            //alert("I am in cat 1");

            // $scope.btncategory3 = true;

            if ($scope.HR_Approve == "Pending") {
                $scope.btnHR = false;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
            }
            if ($scope.HR_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = false;
                $scope.btnMD = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.GM_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = false;
            }

        }

        if ($scope.Category == "Category 2") {
            if ($scope.HR_Approve == "Pending") {
                $scope.btnHR = false;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
            }
            if ($scope.HR_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = false;
                $scope.btnGM = true;
                $scope.btnMD = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = false;
                $scope.btnMD = true;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = false;
            }

            if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved" && $scope.MD_Approve == "Approved") {
                $scope.btnHR = true;
                $scope.btnDH = true;
                $scope.btnGM = true;
                $scope.btnMD = true;
            }
        }

    }




    ///////////////////////////////
    $scope.Languageselection = [];
    $scope.albumNameArray = [];
    ////////////////////////////////////////////////
    $scope.getcheckvaluefun = function() {
        $scope.Languageselection = [];
        $scope.albumNameArray = [];

        angular.forEach($scope.selected, function(key, value) {
            if (key)
                $scope.albumNameArray.push(value)

        });

    };

    //////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////









    ///////////////////

    $scope.FitNextnofn = function() {
            $http({



                method: "POST",
                url: "Fitment.php",
                data: { 'Candidateid': $scope.Candidateid, 'Method': 'FITNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.FitNextno = response.data.Sno;

            });
        }
        /////////////////////////////////////////
    $scope.UpdateFitement = function() {

            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'CurMotBasicDA': $scope.CurMotBasicDA,
                    'CurMotHRA': $scope.CurMotHRA,
                    'CurMotSpecialAllowance': $scope.CurMotSpecialAllowance,
                    'CurMotTotalAllowance': $scope.CurMotTotalAllowance,
                    'CurMotPFemployeer': $scope.CurMotPFemployeer,
                    'CurMotGratuity': $scope.CurMotGratuity,
                    'CurMotRetairlsTotal': $scope.CurMotRetairlsTotal,
                    'CurMotGAC': $scope.CurMotGAC,
                    'CurMotEstimatedBonous': $scope.CurMotEstimatedBonous,
                    'CurMotOtherBonous': $scope.CurMotOtherBonous,
                    'CurMotCTC': $scope.CurMotCTC,
                    'CurMotDeductions': $scope.CurMotDeductions,
                    'CurMotESIC': $scope.CurMotESIC,
                    'CurMotPFemployee': $scope.CurMotPFemployee,
                    'CurMotCanteen': $scope.CurMotCanteen,
                    'CurMotStayAllowance': $scope.CurMotStayAllowance,
                    'CurMotTravelAllowance': $scope.CurMotTravelAllowance,
                    'CurMotOtherDeductions': $scope.CurMotOtherDeductions,
                    'CurMotDeductionTotal': $scope.CurMotDeductionTotal,
                    'CurMottakehomewithouttax': $scope.CurMottakehomewithouttax,
                    'CurAnnuaBasicDA': $scope.CurAnnuaBasicDA,
                    'CurAnnuaHRA': $scope.CurAnnuaHRA,
                    'CurAnnuaSpecialAllowance': $scope.CurAnnuaSpecialAllowance,
                    'CurAnnuaTotalAllowance': $scope.CurAnnuaTotalAllowance,
                    'CurAnnuaPFemployeer': $scope.CurAnnuaPFemployeer,
                    'CurAnnuaGratuity': $scope.CurAnnuaGratuity,
                    'CurAnnuaRetairlsTotal': $scope.CurAnnuaRetairlsTotal,
                    'CurAnnuaGAC': $scope.CurAnnuaGAC,
                    'CurAnnuaEstimatedBonous': $scope.CurAnnuaEstimatedBonous,
                    'CurAnnuaOtherBonous': $scope.CurAnnuaOtherBonous,
                    'CurAnnuaCTC': $scope.CurAnnuaCTC,
                    'CurAnnuaDeductions': $scope.CurAnnuaDeductions,
                    'CurAnnuaESIC': $scope.CurAnnuaESIC,
                    'CurAnnuaPFemployee': $scope.CurAnnuaPFemployee,
                    'CurAnnuaCanteen': $scope.CurAnnuaCanteen,
                    'CurAnnuaStayAllowance': $scope.CurAnnuaStayAllowance,
                    'CurAnnuaTravelAllowance': $scope.CurAnnuaTravelAllowance,
                    'CurAnnuaOtherDeductions': $scope.CurAnnuaOtherDeductions,
                    'CurAnnuaDeductionTotal': $scope.CurAnnuaDeductionTotal,
                    'CurAnnuatakehomewithouttax': $scope.CurAnnuatakehomewithouttax,
                    'CurincperBasicDA': $scope.CurincperBasicDA,
                    'CurincperHRA': $scope.CurincperHRA,
                    'CurincperSpecialAllowance': $scope.CurincperSpecialAllowance,
                    'CurincperTotalAllowance': $scope.CurincperTotalAllowance,
                    'CurincperPFemployeer': $scope.CurincperPFemployeer,
                    'CurincperGratuity': $scope.CurincperGratuity,
                    'CurincperRetairlsTotal': $scope.CurincperRetairlsTotal,
                    'CurincperGAC': $scope.CurincperGAC,
                    'CurincperEstimatedBonous': $scope.CurincperEstimatedBonous,
                    'CurincperOtherBonous': $scope.CurincperOtherBonous,
                    'CurincperCTC': $scope.CurincperCTC,
                    'CurincperDeductions': $scope.CurincperDeductions,
                    'CurincperESIC': $scope.CurincperESIC,
                    'CurincperPFemployee': $scope.CurincperPFemployee,
                    'CurincperCanteen': $scope.CurincperCanteen,
                    'CurincperStayAllowance': $scope.CurincperStayAllowance,
                    'CurincperTravelAllowance': $scope.CurincperTravelAllowance,
                    'CurincperOtherDeductions': $scope.CurincperOtherDeductions,
                    'CurincperDeductionTotal': $scope.CurincperDeductionTotal,
                    'Curincpertakehomewithouttax': $scope.Curincpertakehomewithouttax,
                    'Performanceallowancemonthly': $scope.Performanceallowancemonthly,
                    'Performanceallowanceyearly': $scope.Performanceallowanceyearly,
                    'FitStatus': $scope.FitStatus,
                    'FitType': $scope.FitType,
                    'AllowPF': $scope.AllowPF,



                    'Method': 'SaveUpdateFitment'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                //alert(response.data.Message);

                $scope.AllowPF = response.data.AllowPF;

                if ($scope.AllowPF == "Yes") {
                   $scope.btnpfshow = true;
                    } else {
                        $scope.btnpfshow = false;
                    }

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.Displayfit();
                ///// $scope.UserLoginDestroy();

            });
        }
        /////////////////////////////////////////////

    $scope.FetchFit = function() {
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'FitType': $scope.FitType,

                    'Method': 'FetchFIT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.CurMotBasicDA = response.data.CurMotBasicDA;
                $scope.CurMotHRA = response.data.CurMotHRA;
                $scope.CurMotSpecialAllowance = response.data.CurMotSpecialAllowance;
                $scope.CurMotTotalAllowance = response.data.CurMotTotalAllowance;
                $scope.CurMotPFemployeer = response.data.CurMotPFemployeer;
                $scope.CurMotGratuity = response.data.CurMotGratuity;
                $scope.CurMotGAC = response.data.CurMotGAC;
                $scope.CurMotEstimatedBonous = response.data.CurMotEstimatedBonous;
                $scope.CurMotOtherBonous = response.data.CurMotOtherBonous;
                $scope.CurMotCTC = response.data.CurMotCTC;
                $scope.CurMotDeductions = response.data.CurMotDeductions;
                $scope.CurMotESIC = response.data.CurMotESIC;
                $scope.CurMotPFemployee = response.data.CurMotPFemployee;
                $scope.CurMotCanteen = response.data.CurMotCanteen;
                $scope.CurMotStayAllowance = response.data.CurMotStayAllowance;
                $scope.CurMotTravelAllowance = response.data.CurMotTravelAllowance;
                $scope.CurMotOtherDeductions = response.data.CurMotOtherDeductions;
                $scope.CurMotDeductionTotal = response.data.CurMotDeductionTotal;
                $scope.CurMottakehomewithouttax = response.data.CurMottakehomewithouttax;
                $scope.CurAnnuaBasicDA = response.data.CurAnnuaBasicDA;
                $scope.CurAnnuaHRA = response.data.CurAnnuaHRA;
                $scope.CurAnnuaSpecialAllowance = response.data.CurAnnuaSpecialAllowance;
                $scope.CurAnnuaTotalAllowance = response.data.CurAnnuaTotalAllowance;
                $scope.CurAnnuaPFemployeer = response.data.CurAnnuaPFemployeer;
                $scope.CurAnnuaGratuity = response.data.CurAnnuaGratuity;
                $scope.CurAnnuaRetairlsTotal = response.data.CurAnnuaRetairlsTotal;
                $scope.CurAnnuaGAC = response.data.CurAnnuaGAC;
                $scope.CurAnnuaEstimatedBonous = response.data.CurAnnuaEstimatedBonous;
                $scope.CurAnnuaOtherBonous = response.data.CurAnnuaOtherBonous;
                $scope.CurAnnuaCTC = response.data.CurAnnuaCTC;
                $scope.CurAnnuaDeductions = response.data.CurAnnuaDeductions;
                $scope.CurAnnuaESIC = response.data.CurAnnuaESIC;
                $scope.CurAnnuaPFemployee = response.data.CurAnnuaPFemployee;
                $scope.CurAnnuaCanteen = response.data.CurAnnuaCanteen;
                $scope.CurAnnuaStayAllowance = response.data.CurAnnuaStayAllowance;
                $scope.CurAnnuaTravelAllowance = response.data.CurAnnuaTravelAllowance;
                $scope.CurAnnuaOtherDeductions = response.data.CurAnnuaOtherDeductions;
                $scope.CurAnnuaDeductionTotal = response.data.CurAnnuaDeductionTotal;
                $scope.CurAnnuatakehomewithouttax = response.data.CurAnnuatakehomewithouttax;
                $scope.CurincperBasicDA = response.data.CurincperBasicDA;
                $scope.CurincperHRA = response.data.CurincperHRA;
                $scope.CurincperSpecialAllowance = response.data.CurincperSpecialAllowance;
                $scope.CurincperTotalAllowance = response.data.CurincperTotalAllowance;
                $scope.CurincperPFemployeer = response.data.CurincperPFemployeer;
                $scope.CurincperGratuity = response.data.CurincperGratuity;
                $scope.CurincperRetairlsTotal = response.data.CurincperRetairlsTotal;
                $scope.CurincperGAC = response.data.CurincperGAC;
                $scope.CurincperEstimatedBonous = response.data.CurincperEstimatedBonous;
                $scope.CurincperOtherBonous = response.data.CurincperOtherBonous;
                $scope.CurincperCTC = response.data.CurincperCTC;
                $scope.CurincperDeductions = response.data.CurincperDeductions;
                $scope.CurincperESIC = response.data.CurincperESIC;
                $scope.CurincperPFemployee = response.data.CurincperPFemployee;
                $scope.CurincperCanteen = response.data.CurincperCanteen;
                $scope.CurincperStayAllowance = response.data.CurincperStayAllowance;
                $scope.CurincperTravelAllowance = response.data.CurincperTravelAllowance;
                $scope.CurincperOtherDeductions = response.data.CurincperOtherDeductions;
                $scope.CurincperDeductionTotal = response.data.CurincperDeductionTotal;
                $scope.Curincpertakehomewithouttax = response.data.Curincpertakehomewithouttax;
                $scope.FitStatus = response.data.FitStatus;
                $scope.TxtMessage = $scope.FitStatus;
                $scope.CurMotRetairlsTotal = response.data.CurMotRetairlsTotal;
                $scope.Performanceallowanceyearly = response.data.Performanceallowanceyearly;
                $scope.Performanceallowancemonthly = response.data.Performanceallowancemonthly;
                $scope.AllowPF = response.data.AllowPF;
                $scope.GetPF($scope.AllowPF);


            });
        }
        ///////////////////////////////


    $scope.FetchFinalFit = function() {
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,


                    'Method': 'FetchFinalFIT'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.CurMotBasicDA = response.data.CurMotBasicDA;
                $scope.CurMotHRA = response.data.CurMotHRA;
                $scope.CurMotSpecialAllowance = response.data.CurMotSpecialAllowance;
                $scope.CurMotTotalAllowance = response.data.CurMotTotalAllowance;
                $scope.CurMotPFemployeer = response.data.CurMotPFemployeer;
                $scope.CurMotGratuity = response.data.CurMotGratuity;
                $scope.CurMotGAC = response.data.CurMotGAC;
                $scope.CurMotEstimatedBonous = response.data.CurMotEstimatedBonous;
                $scope.CurMotOtherBonous = response.data.CurMotOtherBonous;
                $scope.CurMotCTC = response.data.CurMotCTC;
                $scope.CurMotDeductions = response.data.CurMotDeductions;
                $scope.CurMotESIC = response.data.CurMotESIC;
                $scope.CurMotPFemployee = response.data.CurMotPFemployee;
                $scope.CurMotCanteen = response.data.CurMotCanteen;
                $scope.CurMotStayAllowance = response.data.CurMotStayAllowance;
                $scope.CurMotTravelAllowance = response.data.CurMotTravelAllowance;
                $scope.CurMotOtherDeductions = response.data.CurMotOtherDeductions;
                $scope.CurMotDeductionTotal = response.data.CurMotDeductionTotal;
                $scope.CurMottakehomewithouttax = response.data.CurMottakehomewithouttax;
                $scope.CurAnnuaBasicDA = response.data.CurAnnuaBasicDA;
                $scope.CurAnnuaHRA = response.data.CurAnnuaHRA;
                $scope.CurAnnuaSpecialAllowance = response.data.CurAnnuaSpecialAllowance;
                $scope.CurAnnuaTotalAllowance = response.data.CurAnnuaTotalAllowance;
                $scope.CurAnnuaPFemployeer = response.data.CurAnnuaPFemployeer;
                $scope.CurAnnuaGratuity = response.data.CurAnnuaGratuity;
                $scope.CurAnnuaRetairlsTotal = response.data.CurAnnuaRetairlsTotal;
                $scope.CurAnnuaGAC = response.data.CurAnnuaGAC;
                $scope.CurAnnuaEstimatedBonous = response.data.CurAnnuaEstimatedBonous;
                $scope.CurAnnuaOtherBonous = response.data.CurAnnuaOtherBonous;
                $scope.CurAnnuaCTC = response.data.CurAnnuaCTC;
                $scope.CurAnnuaDeductions = response.data.CurAnnuaDeductions;
                $scope.CurAnnuaESIC = response.data.CurAnnuaESIC;
                $scope.CurAnnuaPFemployee = response.data.CurAnnuaPFemployee;
                $scope.CurAnnuaCanteen = response.data.CurAnnuaCanteen;
                $scope.CurAnnuaStayAllowance = response.data.CurAnnuaStayAllowance;
                $scope.CurAnnuaTravelAllowance = response.data.CurAnnuaTravelAllowance;
                $scope.CurAnnuaOtherDeductions = response.data.CurAnnuaOtherDeductions;
                $scope.CurAnnuaDeductionTotal = response.data.CurAnnuaDeductionTotal;
                $scope.CurAnnuatakehomewithouttax = response.data.CurAnnuatakehomewithouttax;
                $scope.CurincperBasicDA = response.data.CurincperBasicDA;
                $scope.CurincperHRA = response.data.CurincperHRA;
                $scope.CurincperSpecialAllowance = response.data.CurincperSpecialAllowance;
                $scope.CurincperTotalAllowance = response.data.CurincperTotalAllowance;
                $scope.CurincperPFemployeer = response.data.CurincperPFemployeer;
                $scope.CurincperGratuity = response.data.CurincperGratuity;
                $scope.CurincperRetairlsTotal = response.data.CurincperRetairlsTotal;
                $scope.CurincperGAC = response.data.CurincperGAC;
                $scope.CurincperEstimatedBonous = response.data.CurincperEstimatedBonous;
                $scope.CurincperOtherBonous = response.data.CurincperOtherBonous;
                $scope.CurincperCTC = response.data.CurincperCTC;
                $scope.CurincperDeductions = response.data.CurincperDeductions;
                $scope.CurincperESIC = response.data.CurincperESIC;
                $scope.CurincperPFemployee = response.data.CurincperPFemployee;
                $scope.CurincperCanteen = response.data.CurincperCanteen;
                $scope.CurincperStayAllowance = response.data.CurincperStayAllowance;
                $scope.CurincperTravelAllowance = response.data.CurincperTravelAllowance;
                $scope.CurincperOtherDeductions = response.data.CurincperOtherDeductions;
                $scope.CurincperDeductionTotal = response.data.CurincperDeductionTotal;
                $scope.Curincpertakehomewithouttax = response.data.Curincpertakehomewithouttax;




            });
        }
        //////////////////////////////////////////////

    $scope.Displayfit = function() {

            $http({



                method: "POST",
                url: "Fitment.php",
                data: { 'Candidateid': $scope.Candidateid, 'Method': 'FITDISPLAY' },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {

                $scope.GetSalaryList = response.data;


            });

        }
        ////////////////////////////////////



    $scope.ResetFitment = function() {
            $scope.FitType = "";
            $scope.CurMotBasicDA = 0;
            $scope.CurAnnuaBasicDA = 0;
            $scope.CurincperBasicDA = 0;
            $scope.CurincperHRA = 0;
            $scope.CurAnnuaHRA = 0;
            $scope.CurMotHRA = 0;
            $scope.CurMotSpecialAllowance = 0;
            $scope.CurAnnuaSpecialAllowance = 0;
            $scope.CurincperSpecialAllowance = 0;
            $scope.CurMotTotalAllowance = 0;

            $scope.CurAnnuaTotalAllowance = 0;
            $scope.CurincperTotalAllowance = 0;
            $scope.CurMotPFemployeer = 0;
            $scope.CurAnnuaPFemployeer = 0;
            $scope.CurincperPFemployeer = 0;
            $scope.CurMotGratuity = 0;
            $scope.CurAnnuaGratuity = 0;
            $scope.CurincperGratuity = 0;
            $scope.CurMotRetairlsTotal = 0;
            $scope.CurAnnuaRetairlsTotal = 0;

            $scope.CurincperRetairlsTotal = 0;
            $scope.CurMotGAC = 0;
            $scope.CurAnnuaGAC = 0;
            $scope.CurincperGAC = 0;
            $scope.CurMotEstimatedBonous = 0;
            $scope.CurAnnuaEstimatedBonous = 0;
            $scope.CurincperEstimatedBonous = 0;
            $scope.CurMotOtherBonous = 0;
            $scope.CurAnnuaOtherBonous = 0;
            $scope.CurincperOtherBonous = 0;
            $scope.CurMotOtherComponents = 0;
            $scope.CurAnnuaOtherComponents = 0;
            $scope.CurincperOtherComponents = 0;
            $scope.CurMotCTC = 0;
            $scope.CurAnnuaCTC = 0;
            $scope.CurincperCTC = 0;
            $scope.CurMotDeductions = 0;
            $scope.CurAnnuaDeductions = 0;
            $scope.CurincperDeductions = 0;
            $scope.CurMotESIC = 0;
            $scope.CurAnnuaESIC = 0;
            $scope.CurincperESIC = 0;
            $scope.CurMotCurincperPFemployee = 0;
            $scope.CurAnnuaCurincperPFemployee = 0;
            $scope.CurincperCurincperPFemployee = 0;
            $scope.CurMotCanteen = 0;
            $scope.CurAnnuaCanteen = 0;
            $scope.CurincperCanteen = 0;
            $scope.CurMotStayAllowance = 0;
            $scope.CurAnnuaStayAllowance = 0;
            $scope.CurincperStayAllowance = 0;
            $scope.CurMotTravelAllowance = 0;
            $scope.CurAnnuaTravelAllowance = 0;
            $scope.CurincperTravelAllowance = 0;
            $scope.CurMotOtherDeductions = 0;
            $scope.CurAnnuaOtherDeductions = 0;
            $scope.CurincperOtherDeductions = 0;
            $scope.CurMotDeductionTotal = 0;
            $scope.CurAnnuaDeductionTotal = 0;

            $scope.CurincperDeductionTotal = 0;
            $scope.CurMottakehomewithouttax = 0;
            $scope.CurAnnuatakehomewithouttax = 0;
            $scope.Curincpertakehomewithouttax = 0;
            $scope.CurMotPFemployee = 0;
            $scope.CurAnnuaPFemployee = 0;
            $scope.CurincperPFemployee = 0;
            $scope.FitStatus = "Open";
            $scope.Performanceallowancemonthly = "0";
            $scope.Performanceallowanceyearly = "0";
            $scope.FitNextnofn();
        }


        $scope.GetPF = function(AllowPF) {
            $scope.AllowPF = AllowPF;
            if ($scope.AllowPF == "Yes") {
                $scope.btnpfshow = true;
            } else {
                $scope.btnpfshow = false;
            }
        }
        ///////////////////////

    $scope.CalculateFitment = function() {
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'CurAnnuaGAC': $scope.CurAnnuaGAC,
                    'Performanceallowancemonthly': $scope.Performanceallowancemonthly,
                    'AllowPF':$scope.AllowPF,

                    // 'CurMotCanteen': $scope.CurMotCanteen,
                    // 'CurMotStayAllowance': $scope.CurMotStayAllowance,
                    // 'CurMotTravelAllowance': $scope.CurMotTravelAllowance,
                    // 'CurMotOtherDeductions': $scope.CurMotOtherDeductions,
                    // 'CurMotOtherBonous': $scope.CurMotOtherBonous,
                    // 'CurMotGAC': $scope.CurMotGAC,

                    'Method': 'FITCALCULATION'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.CurMotBasicDA = response.data.CurMotBasicDA;
                $scope.CurAnnuaBasicDA = response.data.CurAnnuaBasicDA;
                $scope.CurMotHRA = response.data.CurMotHRA;
                $scope.CurAnnuaHRA = response.data.CurAnnuaHRA;
                $scope.CurMotSpecialAllowance = response.data.CurMotSpecialAllowance;
                $scope.CurAnnuaSpecialAllowance = response.data.CurAnnuaSpecialAllowance;
                $scope.CurMotTotalAllowance = response.data.CurMotTotalAllowance;
                $scope.CurAnnuaTotalAllowance = response.data.CurAnnuaTotalAllowance;
                $scope.CurMotPFemployeer = response.data.CurMotPFemployeer;
                $scope.CurAnnuaPFemployeer = response.data.CurAnnuaPFemployeer;
                $scope.CurMotGratuity = response.data.CurMotGratuity;
                $scope.CurAnnuaGratuity = response.data.CurAnnuaGratuity;
                $scope.CurMotRetairlsTotal = response.data.CurMotRetairlsTotal;
                $scope.CurAnnuaRetairlsTotal = response.data.CurAnnuaRetairlsTotal;
                $scope.CurMotEstimatedBonous = response.data.CurMotEstimatedBonous;
                $scope.CurAnnuaEstimatedBonous = response.data.CurAnnuaEstimatedBonous;
                $scope.CurAnnuaOtherBonous = response.data.CurAnnuaOtherBonous;
                $scope.CurMotCTC = response.data.CurMotCTC;
                $scope.CurAnnuaCTC = response.data.CurAnnuaCTC;
                $scope.CurMotPFemployee = response.data.CurMotPFemployee;
                $scope.CurAnnuaPFemployee = response.data.CurAnnuaPFemployee;
                $scope.CurMotDeductionTotal = response.data.CurMotDeductionTotal;
                $scope.CurAnnuaDeductionTotal = response.data.CurAnnuaDeductionTotal;
                $scope.CurMottakehomewithouttax = response.data.CurMottakehomewithouttax;
                $scope.CurAnnuatakehomewithouttax = response.data.CurAnnuatakehomewithouttax;
                $scope.CurAnnuaGAC = response.data.CurAnnuaGAC;
                $scope.CurAnnuaESIC = response.data.CurAnnuaESIC;
                $scope.CurMotESIC = response.data.CurMotESIC;
                $scope.CurMotGAC = response.data.CurMotGAC;
                $scope.Performanceallowanceyearly = response.data.Performanceallowanceyearly;
                $scope.CurAnnuaTravelAllowance = response.data.CurAnnuaTravelAllowance;
                $scope.AllowPF = response.data.AllowPF;




            });
        }
        ////////////////////
    $scope.SendFitEdit = function(Candidateid, fitno, Fitmenttype) {

            $scope.FitType = Fitmenttype;
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            $scope.FetchFit();
            $scope.PopupAlertnew();
            $scope.btnshow = true;
            $scope.GetPF();
        }
        ////////////////////////
    $scope.SendFitEditDept = function(Candidateid, fitno, Fitmenttype) {

        $scope.FitType = Fitmenttype;
        $scope.FitNextno = fitno;
        $scope.Candidateid = Candidateid;
        $scope.FetchFit();
        $scope.btnshow = true;

    }

    /////////////////////////

    $scope.FitOpen = function() {
            $http({



                method: "POST",
                url: "Fitment.php",
                data: { 'Candidateid': $scope.Candidateid, 'Method': 'FITOPEN' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //alert(response.data.Message);
                $scope.TxtMessage = response.data.Message;
                $scope.PopupAlert();

            });
        }
        ////////////////////////////
    $scope.PopupAlert = function() {

        //alert($scope.TxtMessage);


        if ($scope.Clientid == "4") {

            if ($scope.TxtMessage == "Open") {

                $('#ModalCenterWorkers').modal('show');

            }
            if ($scope.TxtMessage == "Final") {
                alert("You Cannot Create Fitment already its moved Final Stage ");
                $('#ModalFinal').modal('show');
            }
            if ($scope.TxtMessage == "Cancel") {
                $('#ModalFinal').modal('show');
                $scope.ResetFitment();
            }
            if ($scope.TxtMessage == "No") {

                $('#ModalCenterWorkers').modal('show');

                $scope.ResetFitment();
            }

        } else {
            if ($scope.TxtMessage == "Open") {
                if ($scope.Category == "Category 3") {
                    $('#ModalCenterWorkers').modal('show');
                } else {
                    $('#ModalCenter1').modal('show');
                }
                $scope.ResetFitment();
            }
            if ($scope.TxtMessage == "Final") {
                alert("You Cannot Create Fitment already its moved Final Stage ");
                // $('#ModalFinal').modal('show');
            }
            if ($scope.TxtMessage == "Cancel") {
                if ($scope.Category == "Category 3") {
                    $('#ModalCenterWorkers').modal('show');
                } else {
                    $('#ModalCenter1').modal('show');
                }
                $scope.ResetFitment();
            }
            if ($scope.TxtMessage == "No") {
                if ($scope.Category == "Category 3") {
                    $('#ModalCenterWorkers').modal('show');
                } else {
                    $('#ModalCenter1').modal('show');
                }
                $scope.ResetFitment();
            }
        }
    }

    $scope.PopupAlertnew = function() {

            if ($scope.Clientid == "4") {

                if ($scope.TxtMessage == "Open") {

                    $('#ModalCenterWorkers').modal('show');

                }
                if ($scope.TxtMessage == "Final") {
                    alert("You Cannot Create Fitment already its moved Final Stage ");
                    $('#ModalFinal').modal('show');
                }
                if ($scope.TxtMessage == "Cancel") {
                    $('#ModalFinal').modal('show');
                    $scope.ResetFitment();
                }
                if ($scope.TxtMessage == "No") {

                    $('#ModalCenterWorkers').modal('show');

                    $scope.ResetFitment();
                }

            } else {
                //alert($scope.TxtMessage);
                if ($scope.TxtMessage == "Open") {
                    if ($scope.Category == "Category 3") {
                        $('#ModalCenterWorkers').modal('show');
                    } else {
                        $('#ModalCenter1').modal('show');
                    }
                }
                if ($scope.TxtMessage == "Final") {
                    alert("You Cannot Create Fitment already its moved Final Stage ");
                    $('#ModalFinal').modal('show');
                }
                if ($scope.TxtMessage == "Cancel") {
                    $('#ModalFinal').modal('show');
                    $scope.ResetFitment();
                }
                if ($scope.TxtMessage == "No") {
                    if ($scope.Category == "Category 3") {
                        $('#ModalCenterWorkers').modal('show');
                    } else {
                        $('#ModalCenter1').modal('show');
                    }
                    $scope.ResetFitment();
                }
            }
        }
        ////////////////////////////
    $scope.FinalMove = function() {

            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'Method': 'FinalMove'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //    $scope.UserLoginDestroy();
                //  $scope.FitNextno = response.data.Sno;

            });
        }
        ///////////////////////////////////////
    $scope.SendFitEditApprove = function(Candidateid, fitno) {
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'Method': 'FetchApprove'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.FitStatus = response.data.FitStatus;
                $scope.MDApproval = response.data.MDApproval;

            });

        }
        /////////////////////////////
    $scope.UpdateApprove = function() {

            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'MDApproval': $scope.MDApproval,
                    'FitStatus': $scope.FitStatus,
                    'Method': 'UpdateApprove'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                //     $scope.UserLoginDestroy();
                $scope.Displayfit();


            });

        }
        ///////////////////////////////////////

    $scope.SendFitView = function(Candidateid, fitno) {
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            // alert("Cursor In");
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,

                    'Method': 'FetchFIT02'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //  alert(response.data.CurMotBasicDA);
                $scope.CurMotBasicDA = response.data.CurMotBasicDA;
                $scope.CurMotHRA = response.data.CurMotHRA;
                $scope.CurMotSpecialAllowance = response.data.CurMotSpecialAllowance;
                $scope.CurMotTotalAllowance = response.data.CurMotTotalAllowance;
                $scope.CurMotPFemployeer = response.data.CurMotPFemployeer;
                $scope.CurMotGratuity = response.data.CurMotGratuity;
                $scope.CurMotGAC = response.data.CurMotGAC;
                $scope.CurMotEstimatedBonous = response.data.CurMotEstimatedBonous;
                $scope.CurMotOtherBonous = response.data.CurMotOtherBonous;
                $scope.CurMotCTC = response.data.CurMotCTC;
                $scope.CurMotDeductions = response.data.CurMotDeductions;
                $scope.CurMotESIC = response.data.CurMotESIC;
                $scope.CurMotPFemployee = response.data.CurMotPFemployee;
                $scope.CurMotCanteen = response.data.CurMotCanteen;
                $scope.CurMotStayAllowance = response.data.CurMotStayAllowance;
                $scope.CurMotTravelAllowance = response.data.CurMotTravelAllowance;
                $scope.CurMotOtherDeductions = response.data.CurMotOtherDeductions;
                $scope.CurMotDeductionTotal = response.data.CurMotDeductionTotal;
                $scope.CurMottakehomewithouttax = response.data.CurMottakehomewithouttax;
                $scope.CurAnnuaBasicDA = response.data.CurAnnuaBasicDA;
                $scope.CurAnnuaHRA = response.data.CurAnnuaHRA;
                $scope.CurAnnuaSpecialAllowance = response.data.CurAnnuaSpecialAllowance;
                $scope.CurAnnuaTotalAllowance = response.data.CurAnnuaTotalAllowance;
                $scope.CurAnnuaPFemployeer = response.data.CurAnnuaPFemployeer;
                $scope.CurAnnuaGratuity = response.data.CurAnnuaGratuity;
                $scope.CurAnnuaRetairlsTotal = response.data.CurAnnuaRetairlsTotal;
                $scope.CurAnnuaGAC = response.data.CurAnnuaGAC;
                $scope.CurAnnuaEstimatedBonous = response.data.CurAnnuaEstimatedBonous;
                $scope.CurAnnuaOtherBonous = response.data.CurAnnuaOtherBonous;
                $scope.CurAnnuaCTC = response.data.CurAnnuaCTC;
                $scope.CurAnnuaDeductions = response.data.CurAnnuaDeductions;
                $scope.CurAnnuaESIC = response.data.CurAnnuaESIC;
                $scope.CurAnnuaPFemployee = response.data.CurAnnuaPFemployee;
                $scope.CurAnnuaCanteen = response.data.CurAnnuaCanteen;
                $scope.CurAnnuaStayAllowance = response.data.CurAnnuaStayAllowance;
                $scope.CurAnnuaTravelAllowance = response.data.CurAnnuaTravelAllowance;
                $scope.CurAnnuaOtherDeductions = response.data.CurAnnuaOtherDeductions;
                $scope.CurAnnuaDeductionTotal = response.data.CurAnnuaDeductionTotal;
                $scope.CurAnnuatakehomewithouttax = response.data.CurAnnuatakehomewithouttax;
                $scope.CurincperBasicDA = response.data.CurincperBasicDA;
                $scope.CurincperHRA = response.data.CurincperHRA;
                $scope.CurincperSpecialAllowance = response.data.CurincperSpecialAllowance;
                $scope.CurincperTotalAllowance = response.data.CurincperTotalAllowance;
                $scope.CurincperPFemployeer = response.data.CurincperPFemployeer;
                $scope.CurincperGratuity = response.data.CurincperGratuity;
                $scope.CurincperRetairlsTotal = response.data.CurincperRetairlsTotal;
                $scope.CurincperGAC = response.data.CurincperGAC;
                $scope.CurincperEstimatedBonous = response.data.CurincperEstimatedBonous;
                $scope.CurincperOtherBonous = response.data.CurincperOtherBonous;
                $scope.CurincperCTC = response.data.CurincperCTC;
                $scope.CurincperDeductions = response.data.CurincperDeductions;
                $scope.CurincperESIC = response.data.CurincperESIC;
                $scope.CurincperPFemployee = response.data.CurincperPFemployee;
                $scope.CurincperCanteen = response.data.CurincperCanteen;
                $scope.CurincperStayAllowance = response.data.CurincperStayAllowance;
                $scope.CurincperTravelAllowance = response.data.CurincperTravelAllowance;
                $scope.CurincperOtherDeductions = response.data.CurincperOtherDeductions;
                $scope.CurincperDeductionTotal = response.data.CurincperDeductionTotal;
                $scope.Curincpertakehomewithouttax = response.data.Curincpertakehomewithouttax;
                $scope.FitStatus = response.data.FitStatus;
                $scope.TxtMessage = $scope.FitStatus;
                $scope.Performanceallowanceyearly = response.data.Performanceallowanceyearly;
                $scope.Performanceallowancemonthly = response.data.Performanceallowancemonthly;
                $('#ModalFinal').modal('show');
                // $scope.PopupAlertnew();


            });

        }
        //////////////////



    $scope.EmailrightsMessage = function() {
        if ($scope.RightsMessage == "Request Update") {
            $scope.AdminMessage = true;
            $scope.AdminMessage = "Request Sent Successfully .........";
            $timeout(function() { $scope.AdminMessage = ""; }, 3000);
        }
        if ($scope.RightsMessage == "EREASON") {
            $scope.AdminMessage = true;
            $scope.AdminMessage = "Please Enter Editing Reason .........";
            $timeout(function() { $scope.AdminMessage = ""; }, 3000);
        }
    }

    $scope.ResetLoginInfo = function() {
            $scope.EditingUserid = "";
            $scope.EditingPassword = "";
        }
        //////////////////////
    $scope.UserLogin = function() {

            $http({
                method: "post",
                url: "EditirightsforApproval.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'EditingUserid': $scope.EditingUserid,
                    'EditingPassword': $scope.EditingPassword,
                    'Method': 'LoginUpdate'
                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {
                $scope.LoginMessage = response.data.Message;
                $scope.LogMessageSave();

            });
        }
        ///////////////////////////
    $scope.LogMessageSave = function() {

        if ($scope.LoginMessage == "USERID") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Please Enter UserDetail";
            $timeout(function() { $scope.LogMessage = ""; }, 3000);
        }
        if ($scope.LoginMessage == "USERPASSWORD") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Please Enter Password";
            $timeout(function() { $scope.LogMessage = ""; }, 3000);
        }
        if ($scope.LoginMessage == "LOGINSUCCESS") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Login Successfully";
            $('#ModalLogin').modal('hide');
            $('#myCarousel').carousel(1);
            $timeout(function() { $scope.LogMessage = ""; }, 3000);
        }
        if ($scope.LoginMessage == "LOGINFAIL") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Username and Password Not Exists";
            $timeout(function() { $scope.LogMessage = ""; }, 3000);
        }


    }




    ///////////////////////



    $scope.UpdateFitmentApproved = function() {


        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'FitNextno': $scope.FitNextno,
                'FitType': $scope.FitType,
                'DHinterviewnotes': $scope.DHinterviewnotes,

                'Method': 'UpdateFitmentApproved'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();
            $scope.UpdateFitmentApprovedMail();



        });
    }

    //////////////////////////////////////
    $scope.UpdateFitmentApprovedMail = function() {


        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'Candidateid': $scope.Candidateid,



                'Method': 'UpdateFitmentApprovedMail'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();



        });
    }

    ////////////////////////
    $scope.UpdateFitmentRejected = function() {


        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'FitNextno': $scope.FitNextno,
                'FitType': $scope.FitType,
                'DHinterviewnotes': $scope.DHinterviewnotes,

                'Method': 'UpdateFitmentRejected'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();



        });
    }

    ///////////////////////
    $scope.UpdateFitmentGMApproved = function() {


        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'FitNextno': $scope.FitNextno,
                'FitType': $scope.FitType,
                'GMinterviewnotes': $scope.GMinterviewnotes,

                'Method': 'UpdateFitmentGMApproved'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.UpdateFitmentGMApprovedMail();



        });
    }

    ////////////////////////


    $scope.UpdateFitmentGMApprovedMail = function() {


            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,



                    'Method': 'UpdateFitmentGMApprovedMail'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;

                $scope.TempSave();



            });
        }
        ////////////////
    $scope.gmfitmsg - function() {
        if ($scope.TempMessage == "GMinterviewnotes") {
            $scope.Message = true;
            $scope.Message = "Please Enter General Interview Notes";
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Thankyou") {
            $scope.Message = true;

            window.location.replace("http://localhost/Krish/INDSYSHRM/HRM09/TYpage.php");
            $timeout(function() { $scope.Message = ""; }, 3000);
        }
    }
    $scope.UpdateFitmentGMRejected = function() {


            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'FitType': $scope.FitType,
                    'GMinterviewnotes': $scope.GMinterviewnotes,

                    'Method': 'UpdateFitmentGMRejected'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;

                $scope.TempSave();



            });
        }
        /////////////////////////////
    $http({



        method: "POST",
        url: "AllApi.php",
        data: { 'Method': 'POSTCANDIDATEID' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.Candidateid = response.data;
        $scope.FetchCandidate($scope.Candidateid);

        $scope.ResetFitment();
        $scope.Displayfit();
        $scope.FetchFitApproved($scope.Candidateid);


    });
    //////////////////////////////

    $http({



        method: "POST",
        url: "AllApi.php",
        data: { 'Method': 'POSTurl' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.LoadUrl = response.data;



    });
    /////////////////////
    $scope.FetchFitApproved = function(Candidateid) {
            $scope.Candidateid = Candidateid;
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,


                    'Method': 'FetchFitApproved'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //  alert(response.data.CurMotBasicDA);
                $scope.CurMotBasicDA = response.data.CurMotBasicDA;
                $scope.CurMotHRA = response.data.CurMotHRA;
                $scope.CurMotSpecialAllowance = response.data.CurMotSpecialAllowance;
                $scope.CurMotTotalAllowance = response.data.CurMotTotalAllowance;
                $scope.CurMotPFemployeer = response.data.CurMotPFemployeer;
                $scope.CurMotGratuity = response.data.CurMotGratuity;
                $scope.CurMotGAC = response.data.CurMotGAC;
                $scope.CurMotEstimatedBonous = response.data.CurMotEstimatedBonous;
                $scope.CurMotOtherBonous = response.data.CurMotOtherBonous;
                $scope.CurMotCTC = response.data.CurMotCTC;
                $scope.CurMotDeductions = response.data.CurMotDeductions;
                $scope.CurMotESIC = response.data.CurMotESIC;
                $scope.CurMotPFemployee = response.data.CurMotPFemployee;
                $scope.CurMotCanteen = response.data.CurMotCanteen;
                $scope.CurMotStayAllowance = response.data.CurMotStayAllowance;
                $scope.CurMotTravelAllowance = response.data.CurMotTravelAllowance;
                $scope.CurMotOtherDeductions = response.data.CurMotOtherDeductions;
                $scope.CurMotDeductionTotal = response.data.CurMotDeductionTotal;
                $scope.CurMottakehomewithouttax = response.data.CurMottakehomewithouttax;
                $scope.CurAnnuaBasicDA = response.data.CurAnnuaBasicDA;
                $scope.CurAnnuaHRA = response.data.CurAnnuaHRA;
                $scope.CurAnnuaSpecialAllowance = response.data.CurAnnuaSpecialAllowance;
                $scope.CurAnnuaTotalAllowance = response.data.CurAnnuaTotalAllowance;
                $scope.CurAnnuaPFemployeer = response.data.CurAnnuaPFemployeer;
                $scope.CurAnnuaGratuity = response.data.CurAnnuaGratuity;
                $scope.CurAnnuaRetairlsTotal = response.data.CurAnnuaRetairlsTotal;
                $scope.CurAnnuaGAC = response.data.CurAnnuaGAC;
                $scope.CurAnnuaEstimatedBonous = response.data.CurAnnuaEstimatedBonous;
                $scope.CurAnnuaOtherBonous = response.data.CurAnnuaOtherBonous;
                $scope.CurAnnuaCTC = response.data.CurAnnuaCTC;
                $scope.CurAnnuaDeductions = response.data.CurAnnuaDeductions;
                $scope.CurAnnuaESIC = response.data.CurAnnuaESIC;
                $scope.CurAnnuaPFemployee = response.data.CurAnnuaPFemployee;
                $scope.CurAnnuaCanteen = response.data.CurAnnuaCanteen;
                $scope.CurAnnuaStayAllowance = response.data.CurAnnuaStayAllowance;
                $scope.CurAnnuaTravelAllowance = response.data.CurAnnuaTravelAllowance;
                $scope.CurAnnuaOtherDeductions = response.data.CurAnnuaOtherDeductions;
                $scope.CurAnnuaDeductionTotal = response.data.CurAnnuaDeductionTotal;
                $scope.CurAnnuatakehomewithouttax = response.data.CurAnnuatakehomewithouttax;
                $scope.CurincperBasicDA = response.data.CurincperBasicDA;
                $scope.CurincperHRA = response.data.CurincperHRA;
                $scope.CurincperSpecialAllowance = response.data.CurincperSpecialAllowance;
                $scope.CurincperTotalAllowance = response.data.CurincperTotalAllowance;
                $scope.CurincperPFemployeer = response.data.CurincperPFemployeer;
                $scope.CurincperGratuity = response.data.CurincperGratuity;
                $scope.CurincperRetairlsTotal = response.data.CurincperRetairlsTotal;
                $scope.CurincperGAC = response.data.CurincperGAC;
                $scope.CurincperEstimatedBonous = response.data.CurincperEstimatedBonous;
                $scope.CurincperOtherBonous = response.data.CurincperOtherBonous;
                $scope.CurincperCTC = response.data.CurincperCTC;
                $scope.CurincperDeductions = response.data.CurincperDeductions;
                $scope.CurincperESIC = response.data.CurincperESIC;
                $scope.CurincperPFemployee = response.data.CurincperPFemployee;
                $scope.CurincperCanteen = response.data.CurincperCanteen;
                $scope.CurincperStayAllowance = response.data.CurincperStayAllowance;
                $scope.CurincperTravelAllowance = response.data.CurincperTravelAllowance;
                $scope.CurincperOtherDeductions = response.data.CurincperOtherDeductions;
                $scope.CurincperDeductionTotal = response.data.CurincperDeductionTotal;
                $scope.Curincpertakehomewithouttax = response.data.Curincpertakehomewithouttax;
                $scope.FitStatus = response.data.FitStatus;
                $scope.TxtMessage = $scope.FitStatus;
                $scope.CurMotRetairlsTotal = response.data.CurMotRetairlsTotal;
                $scope.FitType = response.data.FitType;
                $scope.FitNextno = response.data.FitNextno;
                $scope.Performanceallowanceyearly = response.data.Performanceallowanceyearly;
                $scope.Performanceallowancemonthly = response.data.Performanceallowancemonthly;
                $scope.AllowPF = response.data.AllowPF;
                $scope.GetPF($scope.AllowPF);



            });

        }
        //////////////////////
    $scope.UpdateFitmentMDApproved = function() {


            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'FitType': $scope.FitType,
                    'MDinterviewnotes': $scope.MDinterviewnotes,

                    'Method': 'UpdateFitmentMDApproved'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.SendMailToCandidate();


            });
        }
        //////////////////////////////
    $scope.UpdateFitmentMDRejected = function() {


            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'FitType': $scope.FitType,
                    'MDinterviewnotes': $scope.MDinterviewnotes,

                    'Method': 'UpdateFitmentMDRejected'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;

                $scope.TempSave();



            });
        }
        ///////////////////////////
    $scope.UpdatedHRRejected = function() {


            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,

                    'HRinterviewnotes': $scope.HRinterviewnotes,

                    'Method': 'UpdatedHRRejected'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();



            });
        }
        //////////////////////////////////////

    $scope.UpdateHRApproved = function() {


            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,

                    'HRinterviewnotes': $scope.HRinterviewnotes,

                    'Method': 'UpdateHRApproved'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                $scope.AllowPF = response.data.AllowPF;

                if ($scope.AllowPF == "Yes") {
                        $scope.btnpfshow = true;
                    } else {
                        $scope.btnpfshow = false;
                    }
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();



            });
        }
        //////////////////////////////

    $scope.SendMailToDepartmentHead = function() {


        $http({



            method: "POST",
            url: "Fitment.php",
            data: {

                'Candidateid': $scope.Candidateid,
                'Method': 'SendMailToDeptHead'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }



    $scope.SendMailToHRNEW = function() {


        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Method': 'SendMailToHRNEW'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();



        });
    }

    $scope.SendMailToCandidate = function() {


            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,



                    'Method': 'MailToCandidateNew'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();



            });
        }
        ////////////////////
    $scope.CategorycalculationFit = function() {
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'CurMotBasicDA': $scope.CurMotBasicDA,
                    'CurMotHRA': $scope.CurMotHRA,
                    'CurMotSpecialAllowance': $scope.CurMotSpecialAllowance,
                    'Performanceallowancemonthly': $scope.Performanceallowancemonthly,
                    'CurMotTravelAllowance': $scope.CurMotTravelAllowance,
                    'AllowPF':$scope.AllowPF,

                    // 'CurMotCanteen': $scope.CurMotCanteen,
                    // 'CurMotStayAllowance': $scope.CurMotStayAllowance,
                    // 'CurMotTravelAllowance': $scope.CurMotTravelAllowance,
                    // 'CurMotOtherDeductions': $scope.CurMotOtherDeductions,
                    // 'CurMotOtherBonous': $scope.CurMotOtherBonous,
                    // 'CurMotGAC': $scope.CurMotGAC,

                    'Method': 'FITCALCULATIONCATEGORY3'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.CurMotBasicDA = response.data.CurMotBasicDA;
                $scope.CurAnnuaBasicDA = response.data.CurAnnuaBasicDA;
                $scope.CurMotHRA = response.data.CurMotHRA;
                $scope.CurAnnuaHRA = response.data.CurAnnuaHRA;
                $scope.CurMotSpecialAllowance = response.data.CurMotSpecialAllowance;
                $scope.CurAnnuaSpecialAllowance = response.data.CurAnnuaSpecialAllowance;
                $scope.CurMotTotalAllowance = response.data.CurMotTotalAllowance;
                $scope.CurAnnuaTotalAllowance = response.data.CurAnnuaTotalAllowance;
                $scope.CurMotPFemployeer = response.data.CurMotPFemployeer;
                $scope.CurAnnuaPFemployeer = response.data.CurAnnuaPFemployeer;
                $scope.CurMotGratuity = response.data.CurMotGratuity;
                $scope.CurAnnuaGratuity = response.data.CurAnnuaGratuity;
                $scope.CurMotRetairlsTotal = response.data.CurMotRetairlsTotal;
                $scope.CurAnnuaRetairlsTotal = response.data.CurAnnuaRetairlsTotal;
                $scope.CurMotEstimatedBonous = response.data.CurMotEstimatedBonous;
                $scope.CurAnnuaEstimatedBonous = response.data.CurAnnuaEstimatedBonous;
                $scope.CurAnnuaOtherBonous = response.data.CurAnnuaOtherBonous;
                $scope.CurMotCTC = response.data.CurMotCTC;
                $scope.CurAnnuaCTC = response.data.CurAnnuaCTC;
                $scope.CurMotPFemployee = response.data.CurMotPFemployee;
                $scope.CurAnnuaPFemployee = response.data.CurAnnuaPFemployee;
                $scope.CurMotDeductionTotal = response.data.CurMotDeductionTotal;
                $scope.CurAnnuaDeductionTotal = response.data.CurAnnuaDeductionTotal;
                $scope.CurMottakehomewithouttax = response.data.CurMottakehomewithouttax;
                $scope.CurAnnuatakehomewithouttax = response.data.CurAnnuatakehomewithouttax;
                $scope.CurAnnuaGAC = response.data.CurAnnuaGAC;
                $scope.CurAnnuaESIC = response.data.CurAnnuaESIC;
                $scope.CurMotESIC = response.data.CurMotESIC;
                $scope.CurMotGAC = response.data.CurMotGAC;
                $scope.Performanceallowanceyearly = response.data.Performanceallowanceyearly;
                $scope.CurAnnuaTravelAllowance = response.data.CurAnnuaTravelAllowance;
                $scope.AllowPF = response.data.AllowPF;




            });
        }
        /////////////////////////////////
    $http({



        method: "POST",
        url: "AllApi.php",
        data: { 'Method': 'GETCLIENTID' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.Clientid = response.data;
    });
});