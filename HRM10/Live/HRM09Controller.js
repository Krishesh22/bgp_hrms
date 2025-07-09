var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM09Controller', function($scope, $http, $timeout, $filter, $window) {

    $scope.Method = "";
    $scope.currentPageCandidate01 =1;
    $scope.pageSizeCandidate01 = 10;
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
    $scope.Performanceallowancemonthly = "0";
    $scope.Performanceallowanceyearly = "0";
    $scope.Currentreleivingreason = "";
    $scope.Industrialtype = "";
    ///////////Retailrs(PF Employeer 12%)

    ///////////////////////////////

    $scope.Reset = function() {
        $scope.CheckingSession();
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
        $scope.GetEducationList = "";
        $scope.btnEducation = false;
        $scope.interviewerid = "";
        $scope.Reportingname = "";
        $scope.ReportingToid = "";
        $scope.Business = "";
        $scope.Designationproposed = "";
        $scope.Location = "";
        $scope.VaccinationView = "";
        $scope.Vaccinateddate = "";
        $scope.Covidvaccinated = "";
        $scope.Department = "";
        $scope.Selectionstatus = "Pending";
        $scope.btnfresherno = false;
        $scope.selectedValue = "";
        $scope.Address = "";
        $scope.ApplicationDate = "";
        $scope.selected = {};
        $scope.DHinterviewdate = "";
        $scope.Category = "";
        $scope.Married = "Yes";
        $scope.Mothertongue = "Tamil";
        $scope.Nationality = "INDIAN";
        $scope.Reschedule_interview = "";
        $scope.Reschedule_interview_reason = "";
        $scope.DHinterviewdate = "";
        $scope.Candidateinterviewtime = "";
        $scope.btnHR = true;
        $scope.btnDH = true;
        $scope.btnGM = true;
        $scope.btnMD = true;
        $scope.HRinterviewnotes = "";
        $scope.DHinterviewnotes = "";
        $scope.GMinterviewnotes = "";
        $scope.MDinterviewnotes = "";
        $scope.Currentreleivingreason = "";
        $scope.Industrialtype = "";

        $scope.Getnextno();
        $scope.ResetEducation();
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "Mail Sent") {
                $scope.Message = true;
                $scope.Message = "E-Mail Sent Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "MailYes") {
                $scope.Message = true;
                $scope.Message = "This Mail ID Already Exists...";
    
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.Emailid = "";
    
    
            }
            if ($scope.TempMessage == "ContactYes") {
                $scope.Message = true;
                $scope.Message = "This Mobile No Already Exists...";
    
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.Contactno = "";
    
    
            }

            
            if ($scope.TempMessage == "Department") {
                $scope.Message = true;
                $scope.Message = "Please Select Department in Reporting Tab and Update";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }


            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "Interview_held_On") {
                $scope.Message = true;
                $scope.Message = "Please Select Interview Date";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }


            if ($scope.TempMessage == "interviewerid") {
                $scope.Message = true;
                $scope.Message = "Please Select Interviewer Details";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "DHinterviewnotes") {
                $scope.Message = true;
                $scope.Message = "Please Enter Depertment Interview Notes";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }

            if ($scope.TempMessage == "GMinterviewnotes") {
                $scope.Message = true;
                $scope.Message = "Please Enter General Interview Notes";
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
            if ($scope.TempMessage == "FitNextno") {
                $scope.Message = true;
                $scope.Message = "Please Select Fitment Details";
                $timeout(function() { $scope.Message = ""; }, 3000);
    
            }
            if ($scope.TempMessage == "FitmentCreate") {
              //  alert("Please Create Fitment ");
                $scope.Message = true;
                $scope.Message = "Please Create Fitment";
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
                $scope.Message = "Still Management has not Approved this Candidate..........";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Alreadyin") {
                $scope.Message = true;
                $scope.Message = "This Candidate has already moved to Employee Master..........";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Address") {
                $scope.Message = true;
                $scope.Message = "Please Enter Address Information..........";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Moved") {
                $scope.Message = true;
                $scope.Message = "Candidate Moved to Employee Master";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.GetEditList();
                $('#myCarousel').carousel(0);
            }
            if ($scope.TempMessage == "Studied") {
                $scope.Message = true;
                $scope.Message = "Please enter the education Detail";
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

        

            if ($scope.TempMessage == "Date Of Joining") {
                $scope.Message = true;
                $scope.Message = "Please Enter Date Of Joining Details";
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
                $timeout(function() { $scope.Message = ""; }, 3000); }
                if ($scope.TempMessage == "Error") {
                    $scope.Message = true;
                    $scope.Message = "Error in saving / updating ...";
                    $timeout(function() { $scope.Message = ""; }, 3000);
    
    
                }
        }
        //////////////////////////////////
    $scope.GetStatusAlert = function(FitStatus) {
        $scope.FitStatus = FitStatus;
        if ($scope.FitStatus == "Final") {
            alert("Once You Changed Final Stage You Cannot Modify");
        }



    }

    /////////////////////////////////////////
    $scope.SendEdit = function(Candidateid) {

        $scope.CheckingSession();

        $scope.Candidateid = Candidateid;
        $scope.ApprovedType = "";
        $scope.Approvedstatus = "";
        $scope.btnotherinformation = false;
        $scope.btnprevious = false;
        $scope.btnpresentworking = false;
        $scope.btnapprove = false;
        $scope.btninterviewinfo = false;
        $scope.btnappointmentinfo = false;
        $('#myCarousel').carousel(1);
        $scope.FetchAddress($scope.Candidateid);
        $scope.FetchCandidate($scope.Candidateid);
    }

    //////////////////////////////////
    $scope.SendEdit02 = function(Candidateid, Selectionstatus, Empid) {
        $scope.CheckingSession();

            $scope.Selectionstatus = Selectionstatus;
            $scope.Empid = Empid;
            $scope.Candidateid = Candidateid;
            $scope.ApprovedType = "";
            $scope.Approvedstatus = "";
            $scope.btnotherinformation = false;
            $scope.btnprevious = false;
            $scope.btnpresentworking = false;
            $scope.btnapprove = false;
            $scope.btninterviewinfo = false;
            $scope.btnappointmentinfo = false;
            //  $('#ModalEditingReason').modal('show');
            $scope.EditrightsNextno();
            $scope.EditingUserid = "";
            $scope.EditingPassword = "";
            if ($scope.Selectionstatus == 'Rejected' || $scope.Empid != '0') {
                $('#myCarousel').carousel(2);
            } else {
                $('#myCarousel').carousel(1);

            }
            $scope.FetchCandidate($scope.Candidateid);

            $scope.FetchCandidatearraydiff($scope.Candidateid);
        }
        /////////////////////////////////////////////////////////
    $scope.showotheinfo = function() {
            $scope.btnotherinformation = true;
            $scope.btnprevious = false;
            $scope.btnpresentworking = false;
            $scope.btnapprove = false;
            $scope.btninterviewinfo = false;
            $scope.btnappointmentinfo = false;
            $scope.btnEducation = false;
        }
        /////////////////////////////////////////////////
    $scope.showprevious = function() {
            $scope.btnotherinformation = false;
            $scope.btnprevious = true;
            $scope.btnpresentworking = false;
            $scope.btnapprove = false;
            $scope.btninterviewinfo = false;
            $scope.btnappointmentinfo = false;
            $scope.btnEducation = false;
        }
        ////////////////////////////////////////
    $scope.showpresentworking = function() {
            $scope.btnotherinformation = false;
            $scope.btnprevious = false;
            $scope.btnpresentworking = true;
            $scope.btnapprove = false;
            $scope.btninterviewinfo = false;
            $scope.btnappointmentinfo = false;
            $scope.btnEducation = false;
        }
        //////////////////////////////////////////////
    $scope.showapprove = function() {
            $scope.btnotherinformation = false;
            $scope.btnprevious = false;
            $scope.btnpresentworking = false;
            $scope.btnapprove = true;
            $scope.btninterviewinfo = false;
            $scope.btnappointmentinfo = false;
            $scope.btnEducation = false;
        }
        /////////////////////////////////////
    $scope.showinterviewinfo = function() {
            $scope.btnotherinformation = false;
            $scope.btnprevious = false;
            $scope.btnpresentworking = false;
            $scope.btnapprove = false;
            $scope.btninterviewinfo = true;
            $scope.btnappointmentinfo = false;
            $scope.btnEducation = false;
        }
        //////////////////////////////////////
    $scope.showappointmentinfo = function() {
            $scope.btnotherinformation = false;
            $scope.btnprevious = false;
            $scope.btnpresentworking = false;
            $scope.btnapprove = false;
            $scope.btninterviewinfo = false;
            $scope.btnappointmentinfo = true;
            $scope.btnEducation = false;
        }
        //////////////////////////////
    $scope.showeducationinfo = function() {
            $scope.btnotherinformation = false;
            $scope.btnprevious = false;
            $scope.btnpresentworking = false;
            $scope.btnapprove = false;
            $scope.btninterviewinfo = false;
            $scope.btnappointmentinfo = false;
            $scope.btnEducation = true;

        }
        ///////////////////////////////////////////////////////
    $scope.FetchCandidate = function(Candidateid) {
        $scope.CheckingSession();
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
               // alert(response.data.MDinterviewnotes);
                $scope.MDinterviewnotes = response.data.MDinterviewnotes;
                $scope.DHinterviewdate = response.data.DHinterviewdate;
                $scope.Industrialtype = response.data.Industrialtype;
                $scope.Currentreleivingreason = response.data.Currentreleivingreason;
                $scope.Candidatephoto = response.data.Candidatephoto;
                $scope.Candidateofferaccepteddatetime = response.data.Candidateofferaccepteddatetime;
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
                $scope.Approvalbuttons();
                $scope.ResetEducation();
                $scope.Displayfit();
                $scope.ResetVaccination();
                $scope.GetPrevioussain($scope.Previoussainmarksemployee);
                $scope.GetExpereience($scope.Fresher);
                if ($scope.MD_Approve == "Approved") {
                    $scope.btnMoveToEmp = true;
                   
                } else {
                    $scope.btnMoveToEmp = false;
                }
                //$scope.FetchCovidvaccination();
            });
        }
        //////////////////////////////////////
    $scope.Approvalbuttons = function() {
        $scope.btnHR = true;
        $scope.btnDH = true;
        $scope.btnGM = true;
        $scope.btnMD = true;
        $scope.btnCandidate = true;
        // if ($scope.HR_Approve == "Pending") {
        //     $scope.btnHR = false;
        //     $scope.btnDH = true;
        //     $scope.btnGM = true;
        //     $scope.btnMD = true;
        //     $scope.btnCandidate = true;
        // }
        // if ($scope.HR_Approve == "Approved") {
        //     $scope.btnHR = true;
        //     $scope.btnDH = false;
        //     $scope.btnGM = true;
        //     $scope.btnMD = true;
        //     $scope.btnCandidate = true;
        // }

        // if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved") {
        //     $scope.btnHR = true;
        //     $scope.btnDH = true;
        //     $scope.btnGM = false;
        //     $scope.btnMD = true;
        //     $scope.btnCandidate = true;
        // }

        // if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved") {
        //     $scope.btnHR = true;
        //     $scope.btnDH = true;
        //     $scope.btnGM = true;
        //     $scope.btnMD = false;
        //     $scope.btnCandidate = true;
        // }

        // if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved" && $scope.MD_Approve == "Approved") {
        //     $scope.btnHR = true;
        //     $scope.btnDH = true;
        //     $scope.btnGM = true;
        //     $scope.btnMD = true;
        //     $scope.btnCandidate = false;
        // }

        // if ($scope.HR_Approve == "Approved" && $scope.DH_Approve == "Approved" && $scope.GM_Approve == "Approved" && $scope.MD_Approve == "Approved" && $scope.CandidateAccepted == "Offer Accepted By Candidate") {
        //     $scope.btnHR = true;
        //     $scope.btnDH = true;
        //     $scope.btnGM = true;
        //     $scope.btnMD = true;
        //     $scope.btnCandidate = true;
        // }
        if ($scope.HR_Approve == "Approved" && $scope.MD_Approve == "Approved") {
            $scope.btnHR = true;
            $scope.btnDH = true;
            $scope.btnGM = true;
            $scope.btnMD = true;
        }
        if ($scope.HR_Approve == "Pending") {
            $scope.btnHR = false;
            $scope.btnDH = true;
            $scope.btnGM = true;
            $scope.btnMD = true;
        }
        if ($scope.HR_Approve == "Approved") {
            $scope.btnHR = true;
            $scope.btnDH = true;
            $scope.btnGM = true;
            $scope.btnMD = false;
        }

        if ($scope.HR_Approve == "Approved"  && $scope.GM_Approve == "Approved") {
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

    $scope.SaveCandidate = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
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
                'City': $scope.City,
                'Selectionstatus': $scope.Selectionstatus,
                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };

    ////////////////////////////////////////////

    $scope.Getallvalues = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Candidate.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetCandidateList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: { 'Holidaydate': $scope.Holidaydate, 'Method': 'Delete' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.DetailListTemp = response.data.mytbl;

            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////////////////


    ///////////////////////////////////////////////////////////////////


    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'Dept' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetDepartmentList = response.data;
    });


    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'Religion' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetReligionList = response.data;
    });

    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'Qualifi' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetQualififcationList = response.data;
    });


    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'Dest' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetDesignationList = response.data;
    });

    /////////////////////////////////////////////
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'Lang' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetLanguageList = response.data;
    });
    /////////////////////////////////////////////
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'City' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetCityListLocation = response.data;
        $scope.GetCurrentcityList = response.data;
    });






    ///////////////////////////////////////////////////
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'ALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetCandidateList = response.data;
    });
    /////////////////////////////////////
    $http(

        {

            method: "POST",
            url: "Candidate.php",
            data: { 'Method': 'ModuleNext' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.Candidateid = response.data;
    });

    $scope.Getnextno = function() {
        $http(

            {

                method: "POST",
                url: "Candidate.php",
                data: { 'Method': 'ModuleNext' },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {
            //////// alert(response.data);
            $scope.Candidateid = response.data;
        });
    }

    ////////////////////////////////////////////////
    $scope.Update_Other_info = function() {
        $scope.getcheckvaluefun();
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Dob': $scope.Dob,
                'Age': $scope.Age,
                'Bloodgroup': $scope.Bloodgroup,
                'Expereience': $scope.Expereience,
                'Fresher': $scope.Fresher,
                'ServingNoticeperiod': $scope.ServingNoticeperiod,
                'NoticePeriod': $scope.NoticePeriod,
                'Languagesknown': $scope.albumNameArray,
                'Religion': $scope.Religion,
                'Address': $scope.Address,
                'ApplicationDate': $scope.ApplicationDate,
                'Availableoninterview': $scope.Availableoninterview,
                'Reportingname': $scope.Reportingname,
                'ReportingToid': $scope.ReportingToid,
                'Business': $scope.Business,
                'Designationproposed': $scope.Designationproposed,
                'Location': $scope.Location,
                'Department': $scope.Department,
                'Method': 'UpdatOtherInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.SuperUserMail();
            $scope.UserLoginDestroy();
        });

    };
    /////////////////////////////////////
    $scope.Update_Previous_info = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Previoussainmarksemployee': $scope.Previoussainmarksemployee,
                'PreviousDesignation': $scope.PreviousDesignation,
                'PreviousDepartment': $scope.PreviousDepartment,
                'Workingperiod': $scope.Workingperiod,
                'Releivingreason': $scope.Releivingreason,
                'OldEmpid': $scope.OldEmpid,
                'OldEmpName': $scope.OldEmpName,

                'Method': 'UpdatPreviousInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.SuperUserMail();
            $scope.UserLoginDestroy();
        });

    };
    ////////////////////////////////////////////
    $scope.Update_Present_info = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'CurrentOrganization': $scope.CurrentOrganization,
                'Availableoninterview': $scope.Availableoninterview,
                'PreviousPosition': $scope.PreviousPosition,
                'AppliedPosition': $scope.AppliedPosition,
                'CurrentCTC': $scope.CurrentCTC,
                'ExpectedCTC': $scope.ExpectedCTC,
                'NegotiableCTC': $scope.NegotiableCTC,
                'Willingtorelocate': $scope.Willingtorelocate,
                'Industrialtype' :$scope.Industrialtype,
                'Currentreleivingreason' :$scope.Currentreleivingreason,

                'Method': 'UpdatPresentInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.SuperUserMail();
            $scope.UserLoginDestroy();
        });

    };
    ///////////////////////////////////////////////////////
    $scope.Update_interview_info = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Taken_Interview': $scope.Taken_Interview,
                'Interview_held_On': $scope.Interview_held_On,
                'Reschedule_interview': $scope.Reschedule_interview,
                'interviewerid': $scope.interviewerid,
                'Reschedule_interview_reason': $scope.Reschedule_interview_reason,
                'DHinterviewdate': $scope.DHinterviewdate,
                'Candidateinterviewtime': $scope.Candidateinterviewtime,


                'Method': 'UpdatinterviewInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.SuperUserMail();
            $scope.UserLoginDestroy();
        });

    };
    ///////////////////////////////////////////////////
    $scope.GetRejectedReason = function() {
            $scope.HRDecline = true;
            $scope.DHDecline = true;
            $scope.GMDecline = true;
            $scope.MDDecline = true;
            if ($scope.Approvedstatus == "Rejected" && $scope.ApprovedType == "HR") {
                $scope.HRDecline = false;
                $scope.DHDecline = true;
                $scope.GMDecline = true;
                $scope.MDDecline = true;
            }
            if ($scope.Approvedstatus == "Rejected" && $scope.ApprovedType == "DH") {
                $scope.HRDecline = true;
                $scope.DHDecline = false;
                $scope.GMDecline = true;
                $scope.MDDecline = true;
            }
            if ($scope.Approvedstatus == "Rejected" && $scope.ApprovedType == "GM") {
                $scope.HRDecline = true;
                $scope.DHDecline = true;
                $scope.GMDecline = false;
                $scope.MDDecline = true;
            }
            if ($scope.Approvedstatus == "Rejected" && $scope.ApprovedType == "MD") {
                $scope.HRDecline = true;
                $scope.DHDecline = true;
                $scope.GMDecline = true;
                $scope.MDDecline = false;
            }
        }
        //////////////////////////////////////////////
    $scope.Update_Approval = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'ApprovedType': $scope.ApprovedType,
                'Approvedstatus': $scope.Approvedstatus,
                'HR_Decline': $scope.HR_Decline,

                'DH_Decline': $scope.DH_Decline,
                'GM_Decline': $scope.GM_Decline,
                'MD_Decline': $scope.MD_Decline,


                'Method': 'UpdateApproval'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.FetchCandidate($scope.Candidateid);
            $scope.UserLoginDestroy();
        });

    };
    //////////////////////////////////////////////////////
    $scope.Update_DOJ_info = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'CandidateAccepted': $scope.CandidateAccepted,
                'Date_Of_Joing': $scope.Date_Of_Joing,
                'CommitedCTC': $scope.CommitedCTC,
                'Selectionstatus': $scope.Selectionstatus,


                'Method': 'UpdatDOJInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.SuperUserMail();
            $scope.UserLoginDestroy();
        });

    };
    /////////////////////////////////////////////

    $scope.UpdateCandidate = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
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
                'City': $scope.City,
                'Selectionstatus': $scope.Selectionstatus,
                'Method': 'Update'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
           // $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;
            $scope.SuperUserMail();
            $scope.UserLoginDestroy();
            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////
    $scope.Getage = function() {
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Dob': $scope.Dob,



                'Method': 'GetAge'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Age = response.data.Age;

            // $scope.DetailListTemp = response.data.mytbl;


            //$scope.TempSave();
        });

    };
    //////////////////////////////////////////////////////
    $scope.MovetoEmp = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,


                'Method': 'MoveToCandidate'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    ///////////////////////////////////////////
    $scope.ResetEducation = function() {
            $scope.Cadidatestudied = "";
            $scope.UniversityorSchool = "";
            $scope.GradeorPercentage = "";
            $scope.Passoutyear = "";
            $scope.EducationMode = "";
            $scope.Specialization = "";
            $scope.DisplayCandidateEducation();
            $scope.CandidateEduNextno();
        }
        ////////////////////
    $scope.DisplayCandidateEducation = function() {

        $scope.CheckingSession();


        $http({



            method: "POST",
            url: "Candidate.php",
            data: { 'Candidateid': $scope.Candidateid, 'Method': 'CANEDUCATION' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEducationList = response.data;


        });

    };
    ////////////////////
    $scope.CandidateEduNextno = function() {
        $http({



            method: "POST",
            url: "Candidate.php",
            data: { 'Candidateid': $scope.Candidateid, 'Method': 'CANEDUNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.EduNextno = response.data.Sno;

        });
    }

    ///////////////////////////////

    $(document).ready(function(e) {
        $('#fileButton').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInput').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Candidatestudied", $("#Candidatestudied").val());
            form_data.append("UniversityorSchool", $("#UniversityorSchool").val());
            form_data.append("GradeorPercentage", $("#GradeorPercentage").val());
            form_data.append("Passoutyear", $("#Passoutyear").val());
            form_data.append("Specialization", $("#Specialization").val());
            form_data.append("EducationMode", $("#EducationMode").val());
            form_data.append("EduNextno", $("#EduNextno").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploadcandidatedoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInput").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                  //  $scope.Update_EducationEmail();
                    $scope.DisplayCandidateEducation();
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
    ///////////////////////////////////////////////////
    $scope.Update_Education = function() {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'EduNextno': $scope.EduNextno,
                'Candidatestudied': $scope.Cadidatestudied,
                'UniversityorSchool': $scope.UniversityorSchool,
                'GradeorPercentage': $scope.GradeorPercentage,
                'Passoutyear': $scope.Passoutyear,
                'EducationMode' :$scope.EducationMode,
                'Specialization' :$scope.Specialization,


                'Method': 'EDUCATIONCAN'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;


            // $scope.DetailListTemp = response.data.mytbl;
            $scope.TempSave();
            $scope.Update_EducationEmail();


        });

        $scope.DisplayCandidateEducation();
    };



    $scope.Update_EducationEmail = function() {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'EduNextno': $scope.EduNextno,



                'Method': 'EDUCATIONCANHISTORYMAIL'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {





        });


    };
    //////////////////////////////////////////////////
    $scope.DeleteEducation = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Sno': $scope.EduNextno,

                'Method': 'DeleteEDUCATION'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.ResetEducation();
            $scope.UserLoginDestroy();
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    ///////////////////////////////////////////
    $scope.FetchEducation = function(Candidateid, Sno) {
        $scope.CheckingSession();

            $scope.Candidateid = Candidateid;
            $scope.EduNextno = Sno;
            $http({
                method: "POST",
                url: "Candidate.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'Sno': $scope.EduNextno,
                    'Method': "FetchStudy"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Cadidatestudied = response.data.Cadidatestudied;
                $scope.UniversityorSchool = response.data.UniversityorSchool;
                $scope.GradeorPercentage = response.data.GradeorPercentage;
                $scope.Passoutyear = response.data.Passoutyear;
                $scope.Candidatedocument = response.data.Candidatedocument;
                $scope.EducationMode = response.data.EducationMode;
                $scope.Specialization = response.data.Specialization;

            });
        }
        ////////////////////////
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'InteviewEMP' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetinterviewerList = response.data;
    });
    /////////////////////////////////
    $scope.Getinterviewername = function() {

            $http({
                method: "POST",
                url: "Candidate.php",
                data: {
                    'interviewerid': $scope.interviewerid,

                    'Method': "Fetchinterviewer"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Taken_Interview = response.data.Taken_Interview;


            });
        }
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
            $scope.CheckingSession();

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



                    'Method': 'SaveUpdateFitment'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                //alert(response.data.Message);
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.Displayfit();
                ///// $scope.UserLoginDestroy();

            });
        }
        /////////////////////////////////////////////

    $scope.FetchFit = function() {
        $scope.CheckingSession();
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
                $scope.CurMotRetairlsTotal = $scope.CurMotRetairlsTotal;
                $scope.Performanceallowanceyearly = response.data.Performanceallowanceyearly;
                $scope.Performanceallowancemonthly = response.data.Performanceallowancemonthly;



            });
        }
        ///////////////////////////////


    $scope.FetchFinalFit = function() {
        $scope.CheckingSession();
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
        ///////////////////////

        $scope.CalculateFitment = function() {
            $scope.CheckingSession();

            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'CurAnnuaGAC': $scope.CurAnnuaGAC,
                    'Performanceallowancemonthly':$scope.Performanceallowancemonthly,

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




            });
        }
        ////////////////////
    $scope.SendFitEdit = function(Candidateid, fitno, Fitmenttype) {

            $scope.FitType = Fitmenttype;
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            $scope.FetchFit();
            $scope.PopupAlertnew();

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

    $scope.PopupAlertnew = function() {

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

                $scope.UserLoginDestroy();
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
                $scope.UserLoginDestroy();
                $scope.Displayfit();


            });

        }
        ///////////////////////////////////////
    $scope.GetReporterName = function() {

            $http({
                method: "POST",
                url: "Fitment.php",
                data: {
                    'ReportingToid': $scope.ReportingToid,

                    'Method': "FetchReport"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Reportingname = response.data.Reportingname;


            });
        }
        //////////////////////////////////
    $scope.Update_Reporting = function() {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Reportingname': $scope.Reportingname,
                'ReportingToid': $scope.ReportingToid,
                'Business': $scope.Business,
                'Designationproposed': $scope.Designationproposed,
                'Location': $scope.Location,
                'Department': $scope.Department,


                'Method': 'UpdatReporting'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();

            $scope.UserLoginDestroy();
            $scope.SuperUserMail();
        });

    };
    ///////////////////////////////////////////////////
    $scope.GetMailcontent = function(Candidateid, fitno) {
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            $scope.ToMail = "";
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'Method': 'MailContent'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.MessageMail = response.data.htmlcontent;


            });

        }
        ////////////////////
    $scope.SendNormalMail = function() {

        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'ToMail': $scope.ToMail,

                'SubjectMail': $scope.SubjectMail,
                'MessageMail': $scope.MessageMail,
                'Candidateid': $scope.Candidateid,





                'Method': 'MAIL'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            alert(response.data);




        });

    };
    //////////////////////////
    $scope.GetMailCANcontent = function(Candidateid, fitno) {
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'Method': 'MailContentCAN'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                $scope.ToMail = $scope.Emailid;
                $scope.MessageMail = response.data.htmlcontent;


            });

        }
        ////////////////////
    $(document).ready(function(e) {
        $('#fileButton05').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInput05').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput05').files[x]);
            }

            form_data.append("Vaccinatedsno", $("#Vaccinatedsno").val());
            form_data.append("Covidvaccinated", $("#Covidvaccinated").val());
            form_data.append("Vaccinateddate", $("#Vaccinateddate").val());


            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploadvaccination.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInput05").value = '';
                    // $scope.FetchCovidvaccination();
                    $scope.DisplayCandidateVaccination();
                    $scope.UserLoginDestroy();
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

    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'OLDEMP' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetOldList = response.data;
    });
    /////////////////////////////////

    $scope.GetOldEmpName = function() {

            $http({
                method: "POST",
                url: "Fitment.php",
                data: {
                    'OldEmpid': $scope.OldEmpid,

                    'Method': "FetchOLDEMP"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.OldEmpName = response.data.OldEmpName;
                $scope.PreviousDesignation = response.data.PreviousDesignation;
                $scope.PreviousDepartment = response.data.PreviousDepartment;
                $scope.Releivingreason = response.data.Releivingreason;
                $scope.Workingperiod = response.data.Workingperiod;


            });
        }
        ////////////////////////////
    $scope.GetOfferletter = function(Candidateid, fitno) {
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'Method': 'Report'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                alert(response.data.OfferletterView);

                $scope.OfferletterView = response.data.OfferletterView;
                $('#ModalCenter1Offerletter').modal('show');
            });

        }
        //////////////////////////////////////
    $scope.SendFitView = function(Candidateid, fitno) {
        $scope.CheckingSession();

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

    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'ALLEDIT' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetCandidateList02 = response.data;
    });


    $scope.GetEditList = function() {
        $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Candidate.php",
            data: { 'Method': 'ALLEDIT' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    
        }).then(function successCallback(response) {
    
    
            $scope.GetCandidateList02 = response.data;
        });

    }
    ////////////////////////////
    $scope.VaccinationNextno = function() {
        $http({



            method: "POST",
            url: "VaccinationSave.php",
            data: { 'Candidateid': $scope.Candidateid, 'Method': 'CANVACCINATIONNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Vaccinatedsno = response.data.Sno;

        });
    }

    ////////////////////////////////////////////
    $scope.ResetVaccination = function() {
        $scope.Covidvaccinated = "";
        $scope.Vaccinateddate = "";
        $scope.clearinput = "";
        $scope.VaccinationNextno();
        $scope.DisplayCandidateVaccination();
    }

    $scope.DisplayCandidateVaccination = function() {


        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "VaccinationSave.php",
            data: { 'Candidateid': $scope.Candidateid, 'Method': 'CANVACCINATION' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetVaccinationList = response.data;


        });

    };

    //////////////////////////////
    //////////////////////////////////////////////
    $scope.FetchCovidvaccination = function(Candidateid, Sno) {
            $scope.Candidateid = Candidateid;
            $scope.Vaccinatedsno = Sno;
            $http({

                method: "post",
                url: "VaccinationSave.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'Vaccinatedsno': $scope.Vaccinatedsno,
                    'Method': 'Fetchvaccination'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
                //$scope.VaccinationView = null;

                $scope.VaccinationView = response.data.VaccinationView;
                $scope.Vaccinateddate = response.data.Vaccinateddate;
                $scope.Covidvaccinated = response.data.Covidvaccinated;

            });
        }
        ///////////////////
    $scope.UpdateVaccination = function() {
        $scope.CheckingSession();
            $http({
                method: "post",
                url: "VaccinationSave.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'Vaccinateddate': $scope.Vaccinateddate,
                    'Vaccinatedsno': $scope.Vaccinatedsno,
                    'Covidvaccinated': $scope.Covidvaccinated,


                    'Method': 'Vaccinationupdate'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {
                $scope.DisplayCandidateVaccination();

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.UserLoginDestroy();
            });
        }
        //////////////////////////////////////////
    $scope.DeleteVaccination = function() {
        $scope.CheckingSession();
            $http({
                method: "post",
                url: "VaccinationSave.php",
                data: {
                    'Candidateid': $scope.Candidateid,

                    'Vaccinatedsno': $scope.Vaccinatedsno,



                    'Method': 'VaccinationDelete'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {



                $scope.TempMessage = response.data.Message;
               
                $scope.TempSave();
                $scope.UserLoginDestroy();
                $scope.ResetVaccination();
               
            });
        }
        //////////////////
    $scope.GetExpereience = function(Fresher) {
            $scope.Fresher = Fresher;
            if ($scope.Fresher == "Yes") {
                $scope.btnfresherno = false;
            } else {
                $scope.btnfresherno = true;
            }
        }
        ////////////////////////
    $scope.GetPrevioussain = function(Previoussainmarksemployee) {
            $scope.Previoussainmarksemployee = Previoussainmarksemployee;
            if ($scope.Previoussainmarksemployee == "Yes") {
                $scope.btnpreviousworked = true;

            } else {
                $scope.btnpreviousworked = false;
            }
        }
        //////////////////////////////

    $scope.emailchecking = function(email) {
        $scope.Testemail = email;
        var val = $scope.Testemail;
        if (!val.match(/\S+@\S+\.\S+/))
         { // Jaymon's / Squirtle's solution
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
        //$scope.GetMailunique(val);
        // $scope.Message = "Please Enter Validate Email ID ..........";
        // $timeout(function() { $scope.Message = ""; }, 3000);
        return true;
      
    }


    ////////////////////////////////////////////////////
    $scope.emailchecking02 = function(email) {
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
        $scope.GetMailunique(val);
        // $scope.Message = "Please Enter Validate Email ID ..........";
        // $timeout(function() { $scope.Message = ""; }, 3000);
        return true;
      
    }
    //////////////////////////////////////////

    $scope.AppointmentTamil = function() {
        $http({



            method: "POST",
            url: "Sipl_tamil.php",
            data: { 'Candidateid': $scope.Candidateid, 'Method': 'APPOINTMENTTAMIL' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Title = response.data.Title;
            $scope.Firstname = response.data.Firstname;
            $scope.Lastname = response.data.Lastname;
            $scope.Fullname = response.data.Fullname;
            $scope.Candidateimage = response.data.Candidateimage;
            $scope.TestDOB = response.data.DOB;
            $scope.Age = response.data.Age;
            $scope.Department = response.data.Department;
            $scope.Date_Of_Joing = response.data.Date_Of_Joing;
            $scope.HighestQualification = response.data.HighestQualification;
            $scope.ReportingTo = response.data.ReportingTo;
            $scope.Bussiness = response.data.Bussiness;
            $scope.Designationproposed = response.data.Designationproposed;
            $scope.Gender = response.data.Gender;
            $scope.Marital_status = response.data.Marital_status;
            $scope.CommitedCTC = response.data.CommitedCTC;
            $scope.Address = response.data.Address;
            $scope.ApplicationDate = response.data.ApplicationDate;
            $scope.ApplicationDate2 = response.data.ApplicationDate2;
            $scope.Appointmentsentdate = response.data.Appointmentsentdate;
            $scope.Date_Of_Joing2 = response.data.Date_Of_Joing2;


        });
    }



    $(function() {
        $("#btnAppointmentordertamil").click(function() {

            var HTML_Width = $("#pdfExportAppointmentorder").width();
            var HTML_Height = $("#pdfExportAppointmentorder").height();
            var data = document.getElementById('pdfExportAppointmentorder');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {


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
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
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
            });

        });
    });

    /////////////////////////////////////

    $(function() {
        $("#btnConfirmationordertamil").click(function() {

            var HTML_Width = $("#pdfExportConfirmationorder").width();
            var HTML_Height = $("#pdfExportConfirmationorder").height();
            var data = document.getElementById('pdfExportConfirmationorder');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {


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
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
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
            });

        });
    });
    /////////////////////////////////////
    $(function() {
        $("#btnConfirmationorderHindi").click(function() {

            var HTML_Width = $("#pdfExportConfirmationorderHindi").width();
            var HTML_Height = $("#pdfExportConfirmationorderHindi").height();
            var data = document.getElementById('pdfExportConfirmationorderHindi');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {


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
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
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
            });

        });
    });
    //////////////////////////////////////////////////////////
    $(function() {
        $("#btnAppointmentorderhindi").click(function() {

            var HTML_Width = $("#pdfExportAppointmentorderHindi").width();
            var HTML_Height = $("#pdfExportAppointmentorderHindi").height();
            var data = document.getElementById('pdfExportAppointmentorderHindi');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {


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
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
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
            });

        });
    });
    ////////////////////////////////
    ////////////////////////////////////////////
    $(function() {
        $("#btnAppointmenttamil").click(function() {
            var Candidateid = $scope.Candidateid;
            var Filenamealias1 = "ApplicationTamil.pdf";
            var filename = Candidateid + Filenamealias1;
            var HTML_Width = $("#AppointmentTamil").width();
            var HTML_Height = $("#AppointmentTamil").height();
            var data = document.getElementById('AppointmentTamil');
            html2canvas(data).then(canvas => {
                // Few necessary setting options
                //   var imgWidth = 250;
                //   var imgHeight = canvas.height * imgWidth / canvas.width;

                var contentWidth = canvas.width;
                var contentHeight = canvas.height;

                var pageHeight = contentWidth / 600 * 841.89;

                var leftHeight = contentHeight;

                var position = 0;
                //a4 paper size [595.28841.89], width and height of image in pdf of canvas generated by html page
                var imgWidth = 900;
                var imgHeight = 600 / contentWidth * contentHeight;



                var top_left_margin = 10;
                var PDF_Width = HTML_Width + (top_left_margin * 2);
                var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);


                const contentDataURL = canvas.toDataURL('image/jpeg', 1.0);
                let pdf = new jspdf('p', 'pt', [PDF_Width, PDF_Height]); // A4 size page of PDF
                var position = 0;
                var canvas_image_width = HTML_Width;
                var canvas_image_height = HTML_Height;
                //
                pdf.addImage(contentDataURL, 'JPEG', top_left_margin, top_left_margin,
                    canvas_image_width, pageHeight);

                window.open(pdf.output('bloburl', {
                    filename: filename
                }), '_blank');
            });

        });
    });
    ////////////////////////////////

    $scope.SendMailForMDApproval = function() {

        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'Candidateid': $scope.Candidateid,



                'Method': 'SendMailForMDApproval'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            alert(response.data.Message);
            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    }

    ////////////////////
    $scope.SendFitMailApprove = function(Candidateid, fitno) {
            $scope.FitNextno = fitno;
            $scope.Candidateid = Candidateid;
            $http({



                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'FitNextno': $scope.FitNextno,
                    'Method': 'MAILMDAPPROVAL'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                alert(response.data.Message);
                $scope.FetchCandidate($scope.Candidateid);


            });

        }
        //////////////////////////
    $scope.EditrightsNextno = function() {
            $scope.EditingReason = "";
            $http({



                method: "POST",
                url: "EditirightsforApproval.php",
                data: { 'Candidateid': $scope.Candidateid, 'Method': 'CANEDITRIGHTSNEXTNO' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.EditingRightSno = response.data.Sno;

            });
        }
        ////////////////////////////////
    $scope.UpdateEditingReason = function() {
            $scope.AdminMessage = true;
            $scope.AdminMessage = "Please Wait the request will be send for approval.........";
            $http({
                method: "post",
                url: "EditirightsforApproval.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'EditingReason': $scope.EditingReason,
                    'EditingRightSno': $scope.EditingRightSno,




                    'Method': 'EditingReasonUpdate'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {

                $scope.AdminMessage = false;
                $scope.RightsMessage = response.data.Message;
                $scope.EmailrightsMessage();
            });
        }
        ////////////////////////////

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


    $scope.UserLoginDestroy = function() {

        $http({
            method: "post",
            url: "EditirightsforApproval.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'EditingUserid': $scope.EditingUserid,
                'EditingPassword': $scope.EditingPassword,
                'Method': 'LoginDestroy'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
          

        });
    }


    ////////////////////////////////

    $scope.SuperUserMail = function() {

        $http({
            method: "post",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,

                'Method': 'SuperUserMail'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {


        });
    }

    ///////////////////////


    $(function() {
        $("#btnAppointmentorderEnglish").click(function() {

            var HTML_Width = $("#pdfExportAppointmentorderEnglish").width();
            var HTML_Height = $("#pdfExportAppointmentorderEnglish").height();
            var data = document.getElementById('pdfExportAppointmentorderEnglish');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {


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
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
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
            });

        });
    });
    ////////////////////////////////////
    $(function() {
        $("#btnOfferLetterEnglish").click(function() {

            var HTML_Width = $("#pdfExportOfferLetterEnglish").width();
            var HTML_Height = $("#pdfExportOfferLetterEnglish").height();
            var data = document.getElementById('pdfExportOfferLetterEnglish');
            html2canvas(data, { allowTaint: true, scale: 3, useCORS: true, logging: true, }).then(canvas => {


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
                        pdf.addImage(pageData, 'JPEG', 2, position, imgWidth, imgHeight)
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
            });

        });
    });
    ////////////////////////////////////////

    $scope.FetchCandidatearraydiff = function(Candidateid) {
        $scope.CheckingSession();

            $scope.Candidateid = Candidateid;
            $http({
                method: "POST",
                url: "Candidate.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'Method': "FetcharraydiffCandidate"
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


                $scope.ResetEducation();
                $scope.Displayfit();
                $scope.ResetVaccination();
                $scope.GetPrevioussain($scope.Previoussainmarksemployee);
                $scope.GetExpereience($scope.Fresher);
                if ($scope.MD_Approve == "Approved") {
                    $scope.btnMoveToEmp = true;
                   
                } else {
                    $scope.btnMoveToEmp = false;
                }
                //$scope.FetchCovidvaccination();
            });
        }
        ////////////////////////////////////////////


    $http({



        method: "POST",
        url: "Fitment.php",
        data: { 'Method': 'FITDISPLAYSESSION' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetSalaryList = response.data;


    });


    ///////////////////////
    $scope.SendRemindertoHR = function() {

            $http({
                method: "POST",
                url: "Fitment.php",
                data: {
                    'Candidateid': $scope.Candidateid,
                    'interviewerid': $scope.interviewerid,
                    'Interview_held_On': $scope.Interview_held_On,
                    'DHinterviewdate': $scope.DHinterviewdate,
                    'Candidateinterviewtime': $scope.Candidateinterviewtime,
                    'Method': "SendMailToHR"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;

                $scope.TempSave();
            });
        }
        //////////
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
            //$window.location.href(response.data.url);
            // window.open(response.data.url);

            // window.location.replace(response.data.url);
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
            //$window.location.href(response.data.url);
            // window.open(response.data.url);

            // window.location.replace(response.data.url);
            $scope.TempSave();



        });
    }

    ////////////////////////
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
        //////////////////////
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
        ///////////////////////////////
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

    ///////////////////////////////
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
        ///////////////////////////////

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

    /////////////////////////////////////////////////////
    $scope.GetMailunique = function(Emailid) {
        $scope.CheckingSession();
        $scope.Emailid = Emailid;
        $http({
            method: "POST",
            url: "Candidate.php",
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
    ///////////////////////////////////////////////////
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
    ///////////////////////////////////////////////
    $scope.GetContactnounique = function(Contactno) {
        $scope.CheckingSession();
        $scope.Contactno = Contactno;
        $http({
            method: "POST",
            url: "Candidate.php",
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
    $scope.CategorycalculationFit = function() {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Fitment.php",
            data: {
                'CurMotBasicDA': $scope.CurMotBasicDA,
                'CurMotHRA': $scope.CurMotHRA,
                'CurMotSpecialAllowance': $scope.CurMotSpecialAllowance,
                'Performanceallowancemonthly':$scope.Performanceallowancemonthly,

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




        });
    }
    //////////////////
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
    ///////////////////////////////////
        $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'cat3Candidate' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

     
        $scope.Getcat3CandidateList = response.data;
      
    });
    /////////////////////////////
    $http({
        method: "POST",
        url: "../HRM22/job.php",
        data: { 'Method': 'Maritalstatus' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetMaritalstatusList = response.data;
    });
    ////////////////////////
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'BLOODGROUP' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

     
        $scope.GetBloodGroupList = response.data;
      
    });
    /////////////////////////
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'EDUCATIONMODE' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

     
        $scope.GetEducationModeList = response.data;
      
    });
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'SPECIALIZATION' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

     
        $scope.GetSpecializationList = response.data;
      
    });
    ////////////////////////////////////
    $scope.GetCurrentState = function() {
        // $scope.CheckingSession();
         $http({
 
 
 
             method: "POST",
             url: "../HRM10/Employee.php",
             data: { 'CurrentCountry': $scope.CurrentCountry, 'Method': 'CSTATE' },
             headers: { 'Content-Type': 'application/json' }
 
         }).then(function successCallback(response) {
 
 
 
             $scope.GetStateList = response.data.data01;
 
 
         });
 
     };
     //////////////////////////////
     $scope.GetCurrentCity = function() {
         //  $scope.CheckingSession();
         $http({
 
 
 
             method: "POST",
             url: "../HRM10/Employee.php",
             data: {
                 'CurrentCountry': $scope.CurrentCountry,
                 'CurrentState': $scope.CurrentState,
                 'Method': 'CCITY'
             },
             headers: { 'Content-Type': 'application/json' }
 
         }).then(function successCallback(response) {
 
 
 
             $scope.GetCityList = response.data.data01;
 
 
         });
 
     };
     //////////////////////////////////////////////////
     $scope.GetPerstate = function() {
         //$scope.CheckingSession();
         $http({
 
 
 
             method: "POST",
             url: "../HRM10/Employee.php",
             data: { 'PermanentCountry': $scope.PermanentCountry, 'Method': 'PERSTATE' },
             headers: { 'Content-Type': 'application/json' }
 
         }).then(function successCallback(response) {
 
 
 
             $scope.GetPerStateList = response.data.data01;
 
 
         });
 
     };
     //////////////////////////////////////////////////
     $scope.GetPerCity = function() {
         //   $scope.CheckingSession();
         $http({
 
 
 
             method: "POST",
             url: "../HRM10/Employee.php",
             data: {
                 'PermanentCountry': $scope.PermanentCountry,
                 'PermanentState': $scope.PermanentState,
                 'Method': 'PERCITY'
             },
             headers: { 'Content-Type': 'application/json' }
 
         }).then(function successCallback(response) {
 
 
 
             $scope.GetPerCityList = response.data.data01;
 
 
         });
 
     };
     ////////////////////////////////////////
     $scope.UpdateAddress = function() {
         $scope.CheckingSession();
 
         $http({
 
 
 
             method: "POST",
             url: "Candidate.php",
             data: {
                 'Candidateid': $scope.Candidateid,
                 'CurrentAddress': $scope.CurrentAddress,
                 'CurrentCountry': $scope.CurrentCountry,
                 'CurrentState': $scope.CurrentState,
                 'CurrentCity': $scope.CurrentCity,
                 'CurrentPincode': $scope.CurrentPincode,
                 'PermanentAddress': $scope.PermanentAddress,
                 'PermanentCountry': $scope.PermanentCountry,
                 'PermanentState': $scope.PermanentState,
                 'PermanentCity': $scope.PermanentCity,
                 'PermanentPincode': $scope.PermanentPincode,
 
 
                 'Method': 'ADDRESSEMP'
             },
             headers: { 'Content-Type': 'application/json' }
 
         }).then(function successCallback(response) {
 
 
             $scope.TempMessage = response.data.Message;
 
             // $scope.DetailListTemp = response.data.mytbl;
 
 
             $scope.TempSave();
            
         });
 
     };
     //////////////////////
     $scope.FetchAddress = function(Candidateid) {
       
        $scope.Candidateid = Candidateid;
        $http({
            method: "POST",
            url: "Candidate.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Method': "FetchAddress"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.CurrentAddress = response.data.CurrentAddress;
            $scope.CurrentCountry = response.data.CurrentCountry;
            $scope.GetCurrentState();
            $scope.CurrentState = response.data.CurrentState;
            $scope.GetCurrentCity();
            $scope.CurrentCity = response.data.CurrentCity;
            $scope.CurrentPincode = response.data.CurrentPincode;
            $scope.PermanentAddress = response.data.PermanentAddress;
            $scope.PermanentCountry = response.data.PermanentCountry;
            $scope.GetPerstate();
            $scope.PermanentState = response.data.PermanentState;
            $scope.GetPerCity();
            $scope.PermanentCity = response.data.PermanentCity;
            $scope.PermanentPincode = response.data.Permanantpincode;

        });
    }
    ///////////////////////////
    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'Country' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetCountryList = response.data;
        //  $scope.CheckingSession();
    });
    $scope.CopyTempAddress = function()
    {
   
      
  
    
        $scope.PermanentAddress = $scope.CurrentAddress;
        $scope.PermanentCountry =   $scope.CurrentCountry;
        $scope.GetPerstate();
        $scope.PermanentState = $scope.CurrentState;
        $scope.GetPerCity();
        $scope.PermanentCity = $scope.CurrentCity;
        $scope.PermanentPincode =$scope.CurrentPincode;

    }


    $http({
        method: "POST",
        url: "Candidate.php",
        data: { 'Method': 'INDUSTRIAL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

     
        $scope.GetIndustrialtypeList = response.data;
      
    });
    /////////////////////////
    $('#fileButton01').on('click', function() {
        var form_data = new FormData();
        var ins = document.getElementById('fileInput01').files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('fileInput01').files[x]);
        }

        // form_data.append("files", files[i]);
        form_data.append("Candidateid", $("#Candidateid").val());
       
       
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
                $scope.FetchCandidate ($scope.Candidateid);
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
    //////////////////////////
});