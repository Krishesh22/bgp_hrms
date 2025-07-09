<<<<<<< HEAD
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize', 'ngCookies']);

app.controller('HRM10Controller', function($scope, $http, $timeout, $filter, $location, $window) {

    $scope.Method = "";
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
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
    $scope.AllowPF = "";
    $scope.PF_Fixed = "";
    $scope.Religion = "";
    $scope.CurrentAddress = "";
    $scope.CurrentCountry = "";
    $scope.CurrentState = "";
    $scope.CurrentCity = "";
    $scope.CurrentPincode = "";
    $scope.PermanentAddress = "";
    $scope.PermanentCountry = "";
    $scope.PermanentState = "";
    $scope.PermanentCity = "";
    $scope.PermanentPincode = "";
    $scope.Employeestudied = "";
    $scope.UniversityorSchool = "";
    $scope.GradeorPercentage = "";
    $scope.Passoutyear = "";
    $scope.GetEducationList = "";
    $scope.FamilyName = "";
    $scope.Familyrelationship = "";
    $scope.FamilyAge = "";
    $scope.FamilyContactno = "";
    $scope.FamilyOccupation = "";
    $scope.GetFamilyList = "";
    $scope.Reference1name = "";
    $scope.Reference1contactno = "";
    $scope.Reference1address = "";
    $scope.Reference2name = "";
    $scope.Reference2contactno = "";
    $scope.Reference2address = "";
    $scope.GetAppList = "";
    $scope.Basic = "";
    $scope.HR_Allowance = "";
    $scope.TA = "";
    $scope.Performance_allowance = "";
    $scope.Day_allowance = "";
    $scope.PF = "";
    $scope.ESI = "";
    $scope.TDS = "";
    $scope.Professional_tax = "";
    $scope.Net_Salary = "";
    $scope.Gross_Salary = "";
    $scope.Other_Allowance = "";
    $scope.PF_Yesandno = "";
    $scope.ESI_Yesandno = "";
    $scope.Documenttype = "";
    $scope.Documentno = "";
    $scope.clearinput = "";
    $scope.GetDOCUMENTList = "";
    $scope.clearinput01 = "";
    $scope.Department = "";
    $scope.Designation = "";
    $scope.Period = "";
    $scope.GetPromoList = "";
    $scope.Bankname = "";
    $scope.Accountno = "";
    $scope.IFSCcode = "";
    $scope.Branch = "";
    $scope.btnotherinformation = false;
    $scope.btnaddress = false;
    $scope.btnEducation = false;
    $scope.btnFamily = false;
    $scope.btnReference = false;
    $scope.btnappraisal = false;
    $scope.btnsalary = false;
    $scope.btndoc = false;
    $scope.btnimage = false;
    $scope.btnpromotion = false;
    $scope.btnbank = false;
    $scope.btnvaccination = false;
    $scope.Shift = "";
    $scope.AllowOT = "";
    $scope.AllowLOP = "";
    $scope.Salary_Mode = "";
    $scope.Weekoff = "";
    $scope.Employee_CL = "0";
    $scope.Nationality = "";
    $scope.Empimage = "";
    $scope.currentPageApp = 1;
    $scope.pageSizeApp = 10;
    $scope.currentPageFamily = 1;
    $scope.pageSizeFamily = 10;
    $scope.currentPageEducation = 1;
    $scope.pageSizeEducation = 5;
    $scope.currentPageDoc = 1;
    $scope.pageSizeDoc = 10;
    $scope.currentPageDept = 1;
    $scope.pageSizeDept = 10;
    $scope.btnsave = true;
    $scope.btnupdate = false;
    $scope.selectedValue = "";
    $scope.selected = {};
    $scope.Emppassbook = "";
    $scope.UANno = "";
    $scope.ESIno = "";
    $scope.Aadharno = "";
    $scope.Panno = "";
    $scope.PFJoiningdate = "";
    $scope.ESIJoiningdate = "";
    $scope.OfficemailID = "";

    $scope.VaccinationView = "";
    $scope.Vaccinateddate = "";
    $scope.Covidvaccinated = "";
    $scope.currentPageVaccination = 1;
    $scope.pageSizeVaccination = 5;
    $scope.EmployeeType = "Permanent";
    $scope.EmpDepartment = "";
    $scope.Highestqualification = "";
    $scope.EmpDesignation = "";
    $scope.btnsipltamil = false;
    $scope.btnsiplhindi = false;
    $scope.btnpffixed = false;
    $scope.FatherGuardianSpouseName = "";
    $scope.Category = "Category 3";
    $scope.Married = "Yes";
    $scope.Mothertongue = "Tamil";
    $scope.Nationality = "INDIAN";
    $scope.SalaryType = "Normal";
    $scope.btnverification = false;
    $scope.currentPageNominee = 1;
    $scope.pageSizeNominee = 5;
    $scope.btnNominee = false;
    $scope.btnidcard = false;
    $scope.Basic = 0;
    $scope.HR_Allowance = 0;
    $scope.TA = 0;
    $scope.Performance_allowance = 0;
    $scope.Day_allowance = 0;
    $scope.PF = 0;
    $scope.ESI = 0;
    $scope.TDS = 0;
    $scope.Professional_tax = 0;
    $scope.Net_Salary = 0;
    $scope.Gross_Salary = 0;
    $scope.Other_Allowance = 0;
    $scope.currentPageProperty = 1;
    $scope.pageSizeProperty = 10;
    $scope.Empnameaspassbook = "";
    $scope.OfficemailID = "";


    ///////////////////////

    $http({



        method: "POST",
        url: "Employee.php",
        data: {



            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },


    }).then(function successCallback(response) {


        $scope.PageSession = response.data.Message;
        $scope.CheckingSession();
        //alert($scope.PageSession);
        $scope.PageLoadDept();
        $scope.PageLoadRegion();
        $scope.PageLoadQualifi();
        $scope.PageLoadDest();
        $scope.PageLoadLang();
        $scope.PageLoadCountry();
        $scope.PageLoadALL();
        $scope.PageLoadModuleNext();
        $scope.PageLoadRelationship();
        $scope.PageLoadBACKPENDING();


    });


    ///////////////////////////////
    $scope.Reset = function() {
        $scope.CheckingSession();
        $scope.btnNominee = false;
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
        $scope.Category = "Category 3";
        $scope.Emailid = "";
        $scope.Dob = "";
        $scope.Age = "";
        $scope.Bloodgroup = "";
        $scope.Expereience = "";
        $scope.Fresher = "";
        $scope.AllowPF = "";
        $scope.Religion = "";
        $scope.CurrentAddress = "";
        $scope.CurrentCountry = "";
        $scope.CurrentState = "";
        $scope.CurrentCity = "";
        $scope.CurrentPincode = "";
        $scope.PermanentAddress = "";
        $scope.PermanentCountry = "";
        $scope.PermanentState = "";
        $scope.PermanentCity = "";
        $scope.PermanentPincode = "";
        $scope.Employeestudied = "";
        $scope.UniversityorSchool = "";
        $scope.GradeorPercentage = "";
        $scope.Passoutyear = "";
        $scope.GetEducationList = "";
        $scope.FamilyName = "";
        $scope.Familyrelationship = "";
        $scope.FamilyAge = "";
        $scope.FamilyContactno = "";
        $scope.FamilyOccupation = "";
        $scope.GetFamilyList = "";
        $scope.Reference1name = "";
        $scope.Reference1contactno = "";
        $scope.Reference1address = "";
        $scope.Reference2name = "";
        $scope.Reference2contactno = "";
        $scope.Reference2address = "";
        $scope.GetAppList = "";
        $scope.Basic = "";
        $scope.HR_Allowance = "";
        $scope.TA = "";
        $scope.Performance_allowance = "";
        $scope.Day_allowance = "";
        $scope.PF = "";
        $scope.ESI = "";
        $scope.TDS = "";
        $scope.Professional_tax = "";
        $scope.Net_Salary = "";
        $scope.Gross_Salary = "";
        $scope.Other_Allowance = "";
        $scope.PF_Yesandno = "";
        $scope.ESI_Yesandno = "";
        $scope.Documenttype = "";
        $scope.Documentno = "";
        $scope.clearinput = "";
        $scope.GetDOCUMENTList = "";
        $scope.clearinput01 = "";
        $scope.Department = "";
        $scope.Designation = "";
        $scope.Period = "";
        $scope.GetPromoList = "";
        $scope.Bankname = "";
        $scope.Accountno = "";
        $scope.IFSCcode = "";
        $scope.Branch = "";
        $scope.Shift = "";
        $scope.AllowOT = "";
        $scope.AllowLOP = "";
        $scope.Salary_Mode = "";
        $scope.Weekoff = "";
        $scope.Employee_CL = "0";
        $scope.Nationality = "";
        $scope.Empimage = "";
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnpffixed = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnvaccination = false;
        $scope.btnbank = false;
        $scope.btnsave = true;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnpffixed = false;
        $scope.selectedValue = "";
        $scope.selected = {};
        $scope.btnupdate = false;
        $scope.Emppassbook = "";
        $scope.UANno = "";
        $scope.ESIno = "";
        $scope.Aadharno = "";
        $scope.Panno = "";
        $scope.PFJoiningdate = "";
        $scope.ESIJoiningdate = "";
        $scope.VaccinationView = "";
        $scope.Vaccinateddate = "";
        $scope.Covidvaccinated = "";
        $scope.EmployeeType = "Permanent";
        $scope.EmpDepartment = "";
        $scope.Highestqualification = "";
        $scope.EmpDesignation = "";
        document.getElementById("fileInput03").value = '';
        $scope.Getnextno();
        $scope.FatherGuardianSpouseName = "";
        $scope.Category = "Category 3";
        $scope.Married = "Yes";
        $scope.Mothertongue = "Tamil";
        $scope.Nationality = "INDIAN";
        $scope.SalaryType = "Normal";
        $scope.btnverification = false;
        $scope.currentPageNominee = 1;
        $scope.pageSizeNominee = 5;
        $scope.btnidcard = false;
        $scope.Basic = 0;
        $scope.HR_Allowance = 0;
        $scope.TA = 0;
        $scope.Performance_allowance = 0;
        $scope.Day_allowance = 0;
        $scope.PF = 0;
        $scope.ESI = 0;
        $scope.TDS = 0;
        $scope.Professional_tax = 0;
        $scope.Net_Salary = 0;
        $scope.Gross_Salary = 0;
        $scope.Other_Allowance = 0;
        $scope.OfficemailID = "";
        $scope.Empnameaspassbook = "";
    }

    $scope.TempSave = function() {

            if ($scope.TempMessage == "MailYes") {
                $scope.Message = true;
                $scope.Message = "This Mail ID Already Exists...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.Emailid = "";


            }

            if ($scope.TempMessage == "NOTUNIQUE") {
                $scope.Message = true;
                $scope.Message = "This Id Already Exists...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.Old_Empid = "";

            }
            if ($scope.TempMessage == "ContactYes") {
                $scope.Message = true;
                $scope.Message = "This Mobile No Already Exists...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.Contactno = "";


            }
            if ($scope.TempMessage == "Empty") {
                $scope.Message = true;
                $scope.Message = "Please Enter Detail";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "ADMINRIGHTS") {
                $scope.Message = true;
                $scope.Message = "Admin only can Update Salary Details";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }



            if ($scope.TempMessage == "PercentageHigh") {
                $scope.Message = true;
                $scope.Message = "Percentage is High than available Percentage ";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.PercentageofShare = 0;
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
            if ($scope.TempMessage == "Update") {
                $scope.Message = true;
                $scope.Message = "Data Updated Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "DH_Decline") {
                $scope.Message = true;
                $scope.Message = "Please Enter Rejected Reason...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Studied") {
                $scope.Message = true;
                $scope.Message = "Please Enter Studied Details...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Accountno") {
                $scope.Message = true;
                $scope.Message = "Please Enter Account no...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Bankname") {
                $scope.Message = true;
                $scope.Message = "Please Enter Bank Name...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Familyname") {
                $scope.Message = true;
                $scope.Message = "Please Enter  Name...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Basic") {
                $scope.Message = true;
                $scope.Message = "Please Enter  Basic...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Emailid") {
                $scope.Message = true;
                $scope.Message = "Please Enter  EmailID...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Category") {
                $scope.Message = true;
                $scope.Message = "Please Select Employee Working Category...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }


            if ($scope.TempMessage == "Department") {
                $scope.Message = true;
                $scope.Message = "Please Select Employee Department...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }

            if ($scope.TempMessage == "Familyrelationship") {
                $scope.Message = true;
                $scope.Message = "Please Selecte Relationship Detail...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Status") {
                $scope.Message = true;
                $scope.Message = "Please Select Status...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Department") {
                $scope.Message = true;
                $scope.Message = "Please Select Department...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Designation") {
                $scope.Message = true;
                $scope.Message = "Please Select Designation...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Relievingreason") {
                $scope.Message = true;
                $scope.Message = "Please Enter Relieving Reason...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "RelievingDate") {
                $scope.Message = true;
                $scope.Message = "Please Enter Relieving Date...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "Data Saved") {
                $scope.Message = true;
                $scope.Message = "Data Saved Successfully...";
                $timeout(function() { $scope.Message = ""; }, 3000);
                $scope.Employeeid = $scope.Tempnextno;
                $scope.btnsave = false;
                $scope.btnupdate = true;
                $scope.Emailverification01();

                // $scope.FetchEmployee($scope.Employeeid);
            }
            if ($scope.TempMessage == "Delete") {
                $scope.Message = true;
                $scope.Message = "Data Deleted Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "Deactive") {
                $scope.Message = true;
                $scope.Message = "Employee  Deactived Successfully";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }

            if ($scope.TempMessage == "PercentageofShare") {
                $scope.Message = true;
                $scope.Message = "Please Enter Amonut to be Share";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "NomineeAddress") {
                $scope.Message = true;
                $scope.Message = "Please Enter Nominee Address";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "NomineeRelationship") {
                $scope.Message = true;
                $scope.Message = "Please Select Relationship Details";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }



            if ($scope.TempMessage == "Error") {
                $scope.Message = true;
                $scope.Message = "Error in Saving/Updating ...";
                $timeout(function() { $scope.Message = ""; }, 3000);


            }
            if ($scope.TempMessage == "NomineeName") {
                $scope.Message = true;
                $scope.Message = "Please Enter Nominee Name";
                $timeout(function() { $scope.Message = ""; }, 3000);
            }
            if ($scope.TempMessage == "AssetDetails") {
                $scope.Message = true;
                $scope.Message = "Please Select Asset Details...";
                $timeout(function() { $scope.Message = ""; }, 3000);

            }
            if ($scope.TempMessage == "NVerified") {
                $scope.bkMessage = true;
                $scope.BankMessage = "Not Verified";


            }
            if ($scope.TempMessage == "IFSCVerified") {
                $scope.bkMessage = true;
                $scope.BankMessage = "IFSC Code Verified";


            }

            if ($scope.TempMessage == "NotValid") {
                $scope.bkMessage = true;
                $scope.BankMessage = "IFSC Code Not Valid";


            }




        }
        //////////////////////////////////

    $scope.SendEdit02 = function(Employeeid) {

        $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $scope.Authorizationcheck();

        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.GetAuthorization();
        $scope.FetchTamilhindidocument();
        $scope.FetchEmployee($scope.Employeeid);
        $('#myCarousel').carousel(1);
        // if ($scope.Authorizedno == "1") {
        //     $('#myCarousel').carousel(1);
        // } else {
        //     $('#ModalEditingReason').modal('show');
        //     $scope.EditrightsNextno();
        // }




        //   $('#myCarousel').carousel(1);


    }
    $scope.SendEdit = function(Employeeid) {
        $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $scope.FetchTamilhindidocument();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.GetReturnDetails();
        $scope.folder = {};
        $scope.FetchEmployee($scope.Employeeid);

        // $('#ModalEditingReason').modal('show');
        //$scope.EditrightsNextno();
        $('#myCarousel').carousel(1);


    }



    ////////////////////////////////

    /////////////////////////////////////////////////////////
    $scope.fnotherinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = true;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;


        }
        //////////////////////////////////////////////
    $scope.fneducationinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = true;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.ResetEducation();
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;

        }
        ///////////////////////////////////////////////
    $scope.fnbankinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = true;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;


        }
        ////////////////////////////////////////////////////////
    $scope.fnfamilyinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = true;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.ResetFamily();
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;


        }
        ///////////////////////////////////////////////////////
    $scope.fnrefinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = true;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;


        }
        //////////////////////////////////////////////////////
    $scope.fnsalaryinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = true;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;
            $scope.btnidcard = false;


        }
        ///////////////////////////////////////////////////
    $scope.fndocinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = true;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.Resetdoc();
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;
            $scope.btnidcard = false;


        }
        ////////////////////////////////////////////
    $scope.fnimageinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = true;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;
            $scope.btnidcard = false;

        }
        /////////////////////////////////////
    $scope.fnappraisalinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = true;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;
            $scope.btnidcard = false;


        }
        /////////////////////////////////////////////////////
    $scope.fnpromotioninfo = function() {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = true;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.ResetPromotion();
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;


    }

    /////////////////////////
    $scope.fnaddressinfo = function() {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = true;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;


    }


    ///////////////////////////////////////////
    $scope.fnvaccinationinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = true;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnNominee = false;
            $scope.ResetVaccination();
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;
            $scope.btnidcard = false;
        }
        //////////////////////////////
        ///////////////////////////////////////////
    $scope.fnsiplTamil = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = true;
            $scope.btnsiplhindi = false;
            $scope.FetchEmployee($scope.Employeeid);
            $scope.FetchEmpNominee2($scope.Employeeid);
            $scope.DisplayEmpFamily();
            $scope.DisplayEmpNominee();
            $scope.btnNominee = false;
            $scope.btnidcard = false;
            $scope.btnPropertyChecklist = false;
            $scope.btnidcard = false;

        }
        ////////////////////////////////////

    $scope.fnidcardinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.GetEmergencyContact();
            $scope.FetchEmployee($scope.Employeeid);
            $scope.btnNominee = false;
            $scope.btnidcard = true;
            $scope.btnPropertyChecklist = false;

        }
        ////////////////////////////////////
    $scope.fnNomineeinfo = function() {
            $scope.CheckingSession();
            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnNominee = true;
            $scope.ResetNomineeFamily();
            $scope.btnPropertyChecklist = false;
            $scope.btnidcard = false;
            //$scope.btnsiplhindi = false;
            //$scope.FetchEmployee($scope.Employeeid);
        }
        /////////////////////////////////
    $scope.fnsiplhindi = function() {
        // $scope.CheckingSession();

        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = true;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;

    }


    $scope.fnpropertychecklistinfo = function() {
            $scope.CheckingSession();

            $scope.btnotherinformation = false;
            $scope.btnaddress = false;
            $scope.btnEducation = false;
            $scope.btnFamily = false;
            $scope.btnReference = false;
            $scope.btnappraisal = false;
            $scope.btnsalary = false;
            $scope.btndoc = false;
            $scope.btnimage = false;
            $scope.btnpromotion = false;
            $scope.btnbank = false;
            $scope.btnvaccination = false;
            $scope.btnsipltamil = false;
            $scope.btnsiplhindi = false;
            $scope.btnPropertyChecklist = true;
            $scope.btnidcard = false;
            $scope.Resetpropertychecklist();
            $scope.GetReturnDetails();

        }
        /////////////////////////////////////
    $scope.GetAdminCategory = function(Category) {
        $scope.btnMarketing = true;
        $scope.Category = Category;

        if ($scope.Clientid == 4) {
            $scope.btnMarketing = false;
        }

        if ($scope.Clientid != "4") {
            if ($scope.Category == "Category 3") {
                $scope.AllowOT = "Yes";
            } else {
                $scope.AllowOT = "No";
            }
            if ($scope.Category == "Category 2") {
                $scope.btnMarketing = false;
            }
            // $http({
            //     method: "post",
            //     url: "Employee.php",
            //     data: {
            //         'Employeeid': $scope.Employeeid,
            //         'Category': $scope.Category,
            //         'AllowOT': $scope.AllowOT,


            //         'Method': 'UpdateCATEGORYOT'

            //     },
            //     headers: { 'Content-Type': 'application-json' }
            // }).then(function successCallback(response) {


            // });
        }

    }

    $scope.GetNextnoByCategory = function(Category, EmpDepartment) {
        //   $scope.CheckingSession();
        $scope.Category = Category;
        $scope.EmpDepartment = EmpDepartment;
        $scope.GetAdminCategory($scope.Category);
        $scope.Getnextno();

    }


    $scope.GetPFFixed = function(PF_Yesandno) {
        $scope.PF_Yesandno = PF_Yesandno;
        if ($scope.PF_Yesandno == "Yes") {
            $scope.btnpffixed = true;
        } else {
            $scope.btnpffixed = false;
        }
    }


    $scope.GetAllowPF = function(PF_Yesandno) {
        $scope.PF_Yesandno = PF_Yesandno;
        if ($scope.PF_Yesandno == "Yes") {
            $scope.btnpfno = true;
        } else {
            $scope.btnpfno = false;
        }
    }
    $scope.GetAllowESI = function(ESI_Yesandno) {
            $scope.ESI_Yesandno = ESI_Yesandno;
            if ($scope.ESI_Yesandno == "Yes") {
                $scope.btnesino = true;
            } else {
                $scope.btnesino = false;
            }
        }
        ////////////////////////////
    $scope.FetchEmployee = function(Employeeid) {
            // $scope.CheckingSession();
            $scope.selectedValue = [];
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetchEmployee"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.Title = response.data.Title;
                $scope.Firstname = response.data.Firstname;
                $scope.Lastname = response.data.Lastname;
                $scope.Gender = response.data.Gender;
                $scope.Fresher = response.data.Fresher;
                $scope.Expereience = response.data.Expereience;
                $scope.Married = response.data.Married;
                $scope.Mothertongue = response.data.Mothertongue;
                $scope.Contactno = response.data.Contactno;
                $scope.Category = response.data.Category;
                $scope.Emailid = response.data.Emailid;
                $scope.Dob = response.data.Dob;
                $scope.Dob2 = response.data.Dob2;
                $scope.Age = response.data.Age;
                $scope.Bloodgroup = response.data.Bloodgroup;
                $scope.Shift = response.data.Shift;
                $scope.AllowOT = response.data.AllowOT;
                $scope.AllowLOP = response.data.AllowLOP;
                $scope.Salary_Mode = response.data.Salary_Mode;
                $scope.Weekoff = response.data.Weekoff;
                $scope.Employee_CL = response.data.Employee_CL;
                $scope.Nationality = response.data.Nationality;
                $scope.Religion = response.data.Religion;
                $scope.Imagepath = response.data.Imagepath;
                $scope.Languages = response.data.Languages;
                $scope.Languagestest = response.data.Languages;
                $scope.selectedValue = response.data.Languages;
                $scope.UANno = response.data.UANno;
                $scope.ESIno = response.data.ESIno;
                $scope.Aadharno = response.data.Aadharno;
                $scope.Panno = response.data.Panno;
                $scope.PFJoiningdate = response.data.PFJoiningdate;
                $scope.ESIJoiningdate = response.data.ESIJoiningdate;
                $scope.Date_Of_Joing = response.data.Date_Of_Joing;
                $scope.Date_Of_Joing2 = response.data.Date_Of_Joing2;

                $scope.EmpDepartment = response.data.EmpDepartment;
                $scope.Highestqualification = response.data.Highestqualification;
                $scope.EmpDesignation = response.data.EmpDesignation;
                $scope.FatherGuardianSpouseName = response.data.FatherGuardianSpouseName;
                $scope.LastAppresialDate = response.data.LastAppresialDate;
                $scope.LastAppresialDate2 = response.data.LastAppresialDate2;
                $scope.BackgroundVerificationpath = response.data.BackgroundVerificationpath;
                $scope.BackgroundVerification = response.data.BackgroundVerification;
                $scope.PF_Yesandno = response.data.PF_Yesandno;
                $scope.PF_Fixed = response.data.PF_Fixed;
                $scope.OfficemailID = response.data.OfficemailID;
                $scope.Smsverified = response.data.Smsverified;
                $scope.Emailverified = response.data.Emailverified;
                $scope.Old_Empid = response.data.Old_Empid;
                $scope.GetEmergencyContact();
                $scope.GetAdminCategory($scope.Category);

                $scope.Splitlanguages($scope.selectedValue);

                $scope.GetPFFixed($scope.PF_Yesandno);





            });

            $scope.ResetVaccination();
            $scope.FetchSalary($scope.Employeeid);
            //  $scope.CheckingBackgroundverification($scope.Gross_Salary);
            $scope.FetchAddress($scope.Employeeid);
            $scope.FetchBank($scope.Employeeid);
            $scope.FetchReference($scope.Employeeid);
            $scope.DisplayEmpAppraisal();
            $scope.DisplayEmpDocument();
            $scope.DisplayEmpEducation();
            $scope.DisplayEmpFamily();
            $scope.DisplayEmpPromotion();
            $scope.ResetEducation();
            $scope.ResetFamily();
            $scope.ResetPromotion();
            $scope.Resetdoc();

            // $scope.FetchCovidvaccination();


        }
        //////////////////////////////////////
    $scope.Splitlanguages = function(selectedValue) {
        $scope.selectedValue = selectedValue;
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
    }










    //////////////////////
    $scope.CheckingBackgroundverification = function(Gross_Salary) {

        $scope.Gross_Salary = Gross_Salary;

        // alert($scope.Gross_Salary);

        if ($scope.Gross_Salary > 30000) {
            $scope.btnverification = true;
        } else {
            $scope.btnverification = false;
        }
    }

    ///////////////////////////////////////////
    $scope.FetchAddress = function(Employeeid) {
            //  $scope.CheckingSession();
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
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
        ///////////////////////////////////////
    $scope.FetchReference = function(Employeeid) {
        //  $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchReference"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Reference1name = response.data.Reference1name;
            $scope.Reference1contactno = response.data.Reference1contactno;
            $scope.Reference1address = response.data.Reference1address;
            $scope.Reference2name = response.data.Reference2name;
            $scope.Reference2contactno = response.data.Reference2contactno;
            $scope.Reference2address = response.data.Reference2address;
            $scope.Ref2relationship = response.data.Ref2relationship;
            $scope.Ref1relationship = response.data.Ref1relationship;

        });
    }

    ///////////////////////////////////////////
    $scope.FetchSalary = function(Employeeid) {
        //  $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchSalary"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Basic = response.data.Basic;
            $scope.HR_Allowance = response.data.HR_Allowance;
            $scope.TA = response.data.TA;
            $scope.Performance_allowance = response.data.Performance_allowance;
            $scope.Day_allowance = response.data.Day_allowance;
            $scope.PF = response.data.PF;
            $scope.ESI = response.data.ESI;
            $scope.TDS = response.data.TDS;
            $scope.Professional_tax = response.data.Professional_tax;
            $scope.Net_Salary = response.data.Net_Salary;
            $scope.Gross_Salary = response.data.Gross_Salary;
            $scope.Other_Allowance = response.data.Other_Allowance;
            $scope.PF_Yesandno = response.data.PF_Yesandno;
            $scope.ESI_Yesandno = response.data.ESI_Yesandno;
            $scope.LWF = response.data.LWF;
            $scope.ESIOverlimit = response.data.ESIOverlimit;
            $scope.Authorizedno = response.data.Authorizedno;
            $scope.DayallowanceincludedESI = response.data.DayallowanceincludedESI;
            $scope.Employeer_contribution_yes_no = response.data.Employeer_contribution_yes_no;
            $scope.ESI_Employeer_contribution = response.data.ESI_Employeer_contribution;
            $scope.PF_Employeer_contribution = response.data.PF_Employeer_contribution;
            $scope.Bonus = response.data.Bonus;
            $scope.CTC = response.data.CTC;
            $scope.CheckingBackgroundverification($scope.Gross_Salary);
            $scope.GetPFFixed($scope.PF_Yesandno);
            $scope.CheckEsiOverLimit($scope.ESI_Yesandno);
        });
    }

    ///////////////////////////////////////////
    $scope.CheckEsiOverLimit = function(ESI_Yesandno) {
            $scope.ESI_Yesandno = ESI_Yesandno;

            if ($scope.ESI_Yesandno == "Yes") {

                $scope.btnESIOVERLIMIT = false;
            } else {
                $scope.btnESIOVERLIMIT = true;
            }

        }
        ////////////////////////////////////
    $scope.FetchBank = function(Employeeid) {
            //  $scope.CheckingSession();
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetchBank"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.Bankname = response.data.Bankname;
                $scope.Accountno = response.data.Accountno;
                $scope.IFSCcode = response.data.IFSCcode;
                $scope.Branch = response.data.Branch;
                $scope.Emppassbook = response.data.Emppassbook;
                $scope.Empnameaspassbook = response.data.Empnameaspassbook;
                $scope.GetIFSCexists();
            });
        }
        ///////////////////////////////////////////////

    ///////////////////////////////////////////
    $scope.FetchStudy = function(Employeeid, Sno) {
            $scope.CheckingSession();
            $scope.Employeeid = Employeeid;
            $scope.EduNextno = Sno;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.EduNextno,
                    'Method': "FetchStudy"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Employeestudied = response.data.Employeestudied;
                $scope.UniversityorSchool = response.data.UniversityorSchool;
                $scope.GradeorPercentage = response.data.GradeorPercentage;
                $scope.Passoutyear = response.data.Passoutyear;
                $scope.EmpDocumentView = response.data.EmpDocumentView;

            });
        }
        /////////////////////////////////////////
        ///////////////////////////////////////////
    $scope.FetchFamily = function(Employeeid, Sno) {
            $scope.CheckingSession();

            $scope.Employeeid = Employeeid;
            $scope.FamilyNextno = Sno;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.FamilyNextno,
                    'Method': "FetchFamily"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.FamilyName = response.data.FamilyName;
                $scope.Familyrelationship = response.data.Familyrelationship
                $scope.FamilyAge = response.data.FamilyAge;
                $scope.FamilyContactno = response.data.FamilyContactno;
                $scope.FamilyOccupation = response.data.FamilyOccupation;

            });
        }
        ///////////////////////////////////////////
        ///////////////////////////////////////////
        // $scope.FetchDoc = function(Employeeid) {
        //    // $scope.CheckingSession();
        //         $scope.Employeeid = Employeeid;
        //         $http({
        //             method: "POST",
        //             url: "Employee.php",
        //             data: {
        //                 'Employeeid': $scope.Employeeid,
        //                 'Method': "FetchDoc"
        //             },
        //             headers: { 'Content_Type': 'application/json' }
        //         }).then(function successCallback(response) {

    //             $scope.Documenttype = response.data.Documenttype;
    //             $scope.Documentno = response.data.Documentno;
    //             $scope.clearinput = response.data.clearinput;

    //         });
    //     }
    //////////////////////////////////////////////
    $scope.Getuncheck = function() {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveEmployee = function() {
        $scope.CheckingSession();

        $scope.btnsaveadmin = true;
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Nationality': $scope.Nationality,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'EmployeeType': $scope.EmployeeType,
                'Department': $scope.EmpDepartment,
                'Highestqualification': $scope.Highestqualification,
                'Designation': $scope.EmpDesignation,
                'FatherGuardianSpouseName': $scope.FatherGuardianSpouseName,
                //  'City': $scope.City,
                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.btnsaveadmin = false;

            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };

    ////////////////////////////////////////////

    $scope.Getallvalues = function() {

        // dk edit starts 
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        // dk edit ends

        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function() {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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

    $scope.PageLoadDept = function() {

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Dept' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetDepartmentList = response.data;
            $scope.GetAdminCategory($scope.Category);

        });

    }
    $scope.PageLoadRegion = function() {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Religion' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetReligionList = response.data;

        });
    }

    $scope.PageLoadQualifi = function() {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Qualifi' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetQualififcationList = response.data;

        });
    }

    $scope.PageLoadDest = function() {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Dest' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetDesignationList = response.data;

        });
    }

    //////////////////////////////////////////////


    $scope.PageLoadLang = function() {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Lang' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetLanguageList = response.data;

        });
    }

    /////////////////////////////////////////////

    /////////////////////////////////////////////
    $scope.PageLoadCountry = function() {

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Country' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetCountryList = response.data;

        });
    }

    $scope.PageLoadALL = function() {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeList = response.data;

        });
    }



    ///////////////////////////////////////////////////

    /////////////////////////////////////
    $scope.PageLoadModuleNext = function() {

        $http(

            {

                method: "POST",
                url: "Employee.php",
                data: {
                    'Category': $scope.Category,
                    'EmpDepartment': $scope.EmpDepartment,
                    'Method': 'ModuleNext'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            //////// alert(response.data);
            $scope.Employeeid = response.data.Employeeidvarchar;
            $scope.EmpAutoGenerate = response.data.EmpAutoGenerate;


        });
    }

    $scope.Getnextno = function() {
        //$scope.CheckingSession();
        $http(

            {

                method: "POST",
                url: "Employee.php",
                data: {
                    'Category': $scope.Category,
                    'EmpDepartment': $scope.EmpDepartment,
                    'Method': 'ModuleNext'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

            //////// alert(response.data);
            $scope.Employeeid = response.data.Employeeidvarchar;
            $scope.EmpAutoGenerate = response.data.EmpAutoGenerate;
            $scope.CategoryAutoGeneratno = response.data.CategoryAutoGeneratno;

        });
    }
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

    ////////////////////////////////////////
    $scope.Update_Other_info = function() {

        $scope.getcheckvaluefun();
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Dob': $scope.Dob,
                'Age': $scope.Age,
                'Bloodgroup': $scope.Bloodgroup,
                'Expereience': $scope.Expereience,
                'Fresher': $scope.Fresher,
                'Shift': $scope.Shift,
                'AllowOT': $scope.AllowOT,
                'AllowLOP': $scope.AllowLOP,
                'Salary_Mode': $scope.Salary_Mode,
                'Weekoff': $scope.Weekoff,
                'Employee_CL': $scope.Employee_CL,
                'UANno': $scope.UANno,
                'ESIno': $scope.ESIno,
                'Aadharno': $scope.Aadharno,
                'Panno': $scope.Panno,
                'PFJoiningdate': $scope.PFJoiningdate,
                'ESIJoiningdate': $scope.ESIJoiningdate,
                'Date_Of_Joing': $scope.Date_Of_Joing,
                'BackgroundVerification': $scope.BackgroundVerification,
                'Languages': $scope.albumNameArray,
                'OfficemailID': $scope.OfficemailID,
                'Old_Empid': $scope.Old_Empid,

                'Method': 'UpdatOtherInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
            // $scope.SuperUserMail();
        });

    };
    /////////////////////////////////////
    $scope.Update_Previous_info = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Previoussainmarksemployee': $scope.Previoussainmarksemployee,
                'PreviousDesignation': $scope.PreviousDesignation,
                'PreviousDepartment': $scope.PreviousDepartment,
                'Workingperiod': $scope.Workingperiod,
                'Releivingreason': $scope.Releivingreason,

                'Method': 'UpdatPreviousInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ////////////////////////////////////////////
    $scope.Update_Present_info = function() {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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

                'Method': 'UpdatPresentInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ///////////////////////////////////////////////////////
    $scope.UpdateBank = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Bankname': $scope.Bankname,
                'Accountno': $scope.Accountno,
                'IFSCcode': $scope.IFSCcode,
                'Branch': $scope.Branch,
                'Empnameaspassbook': $scope.Empnameaspassbook,

                'Method': 'BankEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
            $scope.SuperUserBankAccountsMail();
        });

    };
    ///////////////////////////////////////////////////

    $scope.Update_Approval = function() {
        //  $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
        });

    };
    //////////////////////////////////////////////////////
    $scope.Update_DOJ_info = function() {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
            $scope.UserLoginDestroy();
        });

    };
    /////////////////////////////////////////////

    $scope.UpdateCandidate = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
                'Method': 'Update'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////
    $scope.Getage = function() {
        //  $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Dob': $scope.Dob,



                'Method': 'GetAge'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Age = response.data.Age;

            // $scope.DetailListTemp = response.data.mytbl;



        });

    };
    //////////////////////////////////////////////////////

    $scope.DisplayEmpEducation = function() {
        //   $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPEDUCATION' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEducationList = response.data;
        });
    };
    ///////////////////////////////////////////////
    $scope.DisplayEmpFamily = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPFAMILY' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetFamilyList = response.data.data01;

        });

    };
    ///////////////////////////////////
    $scope.DisplayEmpAppraisal = function() {
        // $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPAPPRAISAL' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetAppList = response.data.data01;

        });

    };
    ///////////////////////////////////////////////
    $scope.DisplayEmpPromotion = function() {
        //   $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPromotion' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetPromoList = response.data.data01;

        });

    };
    ////////////////////////////////

    $scope.DisplayEmpDocument = function() {
        //  $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPDOC' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetDOCUMENTList = response.data.data01;

        });

    };
    //////////////////////////////////
    $scope.Resetdoc = function() {
            $scope.CheckingSession();
            $scope.EmpDocNextno();
            $scope.DisplayEmpDocument();
            $scope.Documenttype = "";
            $scope.Documentno = "";
            $scope.clearinput = "";
            $scope.GetDOCUMENTList = ""

        }
        /////////////////////////
    $scope.EmpDocNextno = function() {
            //    $scope.CheckingSession();
            $http({



                method: "POST",
                url: "Employee.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPDOCNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.DocNextno = response.data.Sno;
                //   alert($Scope.DocNextno);

            });
        }
        /////////////////////////////////////////////////
    $scope.EmpFamilyNextno = function() {
            //   $scope.CheckingSession();
            $http({



                method: "POST",
                url: "Employee.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPFAMILYNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.FamilyNextno = response.data.Sno;

            });
        }
        /////////////////////////////////
    $scope.EmpPromotionNextno = function() {
            // $scope.CheckingSession();
            $http({



                method: "POST",
                url: "Employee.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROMOTIONNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.PromotionNextno = response.data.Sno;

            });
        }
        ////////////////////////////////////////////////////////////
    $scope.EmpEduNextno = function() {
            // $scope.CheckingSession();
            $http({



                method: "POST",
                url: "Employee.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPEDUNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {


                $scope.EduNextno = response.data.Sno;

            });
        }
        //////////////////////////////////////////////////////////////////////
    $scope.ResetEducation = function() {
            $scope.CheckingSession();

            $scope.Employeestudied = "";
            $scope.UniversityorSchool = "";
            $scope.GradeorPercentage = "";
            $scope.Passoutyear = "";
            $scope.DisplayEmpEducation();
            $scope.EmpEduNextno();
        }
        ////////////////////////////////
    $scope.ResetFamily = function() {
            $scope.CheckingSession();

            $scope.FamilyName = "";
            $scope.Familyrelationship = "";
            $scope.FamilyAge = "";
            $scope.FamilyContactno = "";
            $scope.FamilyOccupation = "";
            $scope.DisplayEmpFamily();
            $scope.EmpFamilyNextno();
        }
        /////////////////////////////////////
    $scope.ResetPromotion = function() {
            $scope.CheckingSession();
            $scope.Department = "";
            $scope.Designation = "";
            $scope.Period = "";
            $scope.Postingdays = "";
            $scope.Postingyear = "";
            $scope.Postingmonth = "";
            $scope.Postingyear = "";
            $scope.Fromperiod = "";
            $scope.Toperiod = "";
            $scope.DisplayEmpPromotion();
            $scope.EmpPromotionNextno();
        }
        ///////////////////////////////////
    $scope.GetCurrentState = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
            url: "Employee.php",
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
            url: "Employee.php",
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
            url: "Employee.php",
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
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
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
            $scope.UserLoginDestroy();
            $scope.SuperUserAddressMail();
        });

    };
    ////////////////////////////////////////////////////
    $scope.Update_Education = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'EduNextno': $scope.EduNextno,
                'Employeestudied': $scope.Employeestudied,
                'UniversityorSchool': $scope.UniversityorSchool,
                'GradeorPercentage': $scope.GradeorPercentage,
                'EducationMode': $scope.EducationMode,
                'Specialization': $scope.Specialization,
                'Passoutyear': $scope.Passoutyear,


                'Method': 'EDUCATIONEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.UserLoginDestroy();
            // $scope.DetailListTemp = response.data.mytbl;



        });
        $scope.TempSave();
        $scope.DisplayEmpEducation();
    };
    ///////////////////////////////////////////
    $scope.Update_Family = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'FamilyNextno': $scope.FamilyNextno,
                'FamilyName': $scope.FamilyName,
                'Familyrelationship': $scope.Familyrelationship,
                'FamilyAge': $scope.FamilyAge,
                'FamilyContactno': $scope.FamilyContactno,
                'FamilyOccupation': $scope.FamilyOccupation,


                'Method': 'FAMILYUPDATEEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;


            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });
        $scope.DisplayEmpFamily();
    };
    /////////////////////////////////////////////
    $scope.Update_refrence = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Reference1name': $scope.Reference1name,
                'Reference1contactno': $scope.Reference1contactno,
                'Reference1address': $scope.Reference1address,
                'Reference2name': $scope.Reference2name,
                'Reference2contactno': $scope.Reference2contactno,
                'Reference2address': $scope.Reference2address,
                'Ref1relationship': $scope.Ref1relationship,
                'Ref2relationship': $scope.Ref2relationship,
                // 'PermanentCountry': $scope.PermanentCountry,
                // 'PermanentState': $scope.PermanentState,
                // 'PermanentCity': $scope.PermanentCity,
                // 'PermanentPincode': $scope.PermanentPincode,


                'Method': 'REFEMPUPDATE'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
            $scope.SuperUserEmpRefrenceMail();
        });

    };
    ////////////////////////////////////////
    $scope.Update_Salary = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Basic': $scope.Basic,
                'HR_Allowance': $scope.HR_Allowance,
                'TA': $scope.TA,
                'Performance_allowance': $scope.Performance_allowance,
                'Day_allowance': $scope.Day_allowance,
                'PF': $scope.PF,
                'ESI': $scope.ESI,
                'TDS': $scope.TDS,
                'Professional_tax': $scope.Professional_tax,
                'Net_Salary': $scope.Net_Salary,
                'Gross_Salary': $scope.Gross_Salary,
                'Other_Allowance': $scope.Other_Allowance,
                'PF_Yesandno': $scope.PF_Yesandno,
                'PF_Fixed': $scope.PF_Fixed,
                'ESI_Yesandno': $scope.ESI_Yesandno,
                'SalaryType': $scope.SalaryType,
                'LWF': $scope.LWF,
                'ESIOverlimit': $scope.ESIOverlimit,
                'DayallowanceincludedESI': $scope.DayallowanceincludedESI,
                'Employeer_contribution_yes_no': $scope.Employeer_contribution_yes_no,
                'PF_Employeer_contribution': $scope.PF_Employeer_contribution,
                'ESI_Employeer_contribution': $scope.ESI_Employeer_contribution,
                'Bonus': $scope.Bonus,
                'CTC': $scope.CTC,

                'Method': 'UpdateSalary'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.CheckingBackgroundverification($scope.Gross_Salary);
            $scope.DisplayEmpAppraisal();

            // $scope.DetailListTemp = response.data.mytbl;



            $scope.UserLoginDestroy();
            $scope.SuperUserMail();

        });

    };
    ////////////////////////////////////////

    $(document).ready(function(e) {

        $('#fileButton01').on('click', function() {
            // $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput01').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput01').files[x]);
            }

            $.ajax({
                url: 'Empimage.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    //alert(response);
                    document.getElementById("fileInput01").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchEmployee($scope.Employeeid);
                    // display success response from the PHP script
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

    /////////////////////////////////////
    $scope.DeleteEducation = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.EduNextno,

                'Method': 'DeleteEDUCATION'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.ResetEducation();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ///////////////////////////////////////////
    $scope.PageLoadRelationship = function() {
            $http({
                method: "POST",
                url: "Employee.php",
                data: { 'Method': 'Relationship' },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {
                $scope.GetRelationshipList = response.data;
                // $scope.CheckingSession();
            });
        }
        //////////////////////////////////
    $scope.DeleteFamily = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.FamilyNextno,

                'Method': 'DeleteFamily'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.ResetFamily();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    /////////////////////////////////////////////
    $(document).ready(function(e) {

        $('#fileButton').on('click', function() {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("DocNextno", $("#DocNextno").val());
            form_data.append("Documenttype", $("#Documenttype").val());
            form_data.append("Documentno", $("#Documentno").val());
            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'UploadEmpdoc.php', // point to server-side PHP script 
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

                    $scope.DisplayEmpDocument();
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
    /////////////////////////////////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'DOCTYPE' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetDoctypeList = response.data;

    });
    //////////////////////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'SHIFT' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetShiftList = response.data;
        // $scope.CheckingSession();
    });

    ///////////////////////////////////////
    $scope.Update_document = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.DocNextno,
                'Documenttype': $scope.Documenttype,
                'Documentno': $scope.Documentno,
                'Method': 'DOCEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;



            // $scope.DetailListTemp = response.data.mytbl;



        });
        $scope.TempSave();
        $scope.DisplayEmpDocument();
    };
    ///////////////////////////////////////
    $scope.FetchDOC = function(Employeeid, Sno) {
            //  $scope.CheckingSession();

            $scope.Employeeid = Employeeid;
            $scope.DocNextno = Sno;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.DocNextno,
                    'Method': "FetchDOC"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Documenttype = response.data.Documenttype;
                $scope.Documentno = response.data.Documentno;
                $scope.Documentpath = response.data.Documentpath;
                $scope.DocumentView = response.data.Documentpath;

            });
        }
        //////////////////////////////////////////////
    $scope.DeleteDoc = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.DocNextno,

                'Method': 'DeleteDoc'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Resetdoc();

            // $scope.DetailListTemp = response.data.mytbl;
            $scope.UserLoginDestroy();

            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////////
    $scope.Update_DEPT = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'PromotionNextno': $scope.PromotionNextno,
                'Department': $scope.Department,
                'Designation': $scope.Designation,
                'Period': $scope.Period,
                'Postingyear': $scope.Postingyear,
                'Postingmonth': $scope.Postingmonth,
                'Postingdays': $scope.Postingdays,
                'Fromperiod': $scope.Fromperiod,
                'Toperiod': $scope.Toperiod,




                'Method': 'DEPTEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;


            // $scope.DetailListTemp = response.data.mytbl;
            $scope.DisplayEmpPromotion();

            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ////////////////////////////
    $scope.FetchPromotion = function(Employeeid, Sno) {
            $scope.CheckingSession();

            $scope.Employeeid = Employeeid;
            $scope.PromotionNextno = Sno;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Sno': $scope.PromotionNextno,
                    'Method': "FetchPromotion"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Department = response.data.Department;
                $scope.Designation = response.data.Designation
                $scope.Period = response.data.Period;
                $scope.Postingdays = response.data.Postingdays;
                $scope.Postingyear = response.data.Postingyear;
                $scope.Postingmonth = response.data.Postingmonth;
                $scope.Period = response.data.Period;
                $scope.Fromperiod = response.data.Fromperiod;
                $scope.Toperiod = response.data.Toperiod;


            });
        }
        ////////////////////////////////

    $scope.Update_Major = function() {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Nationality': $scope.Nationality,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'EmployeeType': $scope.EmployeeType,
                'Department': $scope.EmpDepartment,
                'Highestqualification': $scope.Highestqualification,
                'Designation': $scope.EmpDesignation,
                'FatherGuardianSpouseName': $scope.FatherGuardianSpouseName,

                //  'City': $scope.City,
                'Method': 'UpdateMajor'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            // $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();

            $scope.UserLoginDestroy();
            // $scope.SuperUserMail();
        });

    };
    /////////////////////////////////////////////
    $scope.Getcalvalue = function() {

        //  $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Basic': $scope.Basic,
                'HR_Allowance': $scope.HR_Allowance,
                'TA': $scope.TA,
                'Performance_allowance': $scope.Performance_allowance,
                'Day_allowance': $scope.Day_allowance,
                'Other_Allowance': $scope.Other_Allowance,
                'PF_Yesandno': $scope.PF_Yesandno,
                'PF_Fixed': $scope.PF_Fixed,
                'ESI_Yesandno': $scope.ESI_Yesandno,
                'PF': $scope.PF,
                'Employeer_contribution_yes_no': $scope.Employeer_contribution_yes_no,
                'Method': "CALCULAT"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.ESI = response.data.ESI;
            $scope.PF = response.data.PF
            $scope.Net_Salary = response.data.Net_Salary;
            $scope.Gross_Salary = response.data.Gross_Salary;
            $scope.PF_Yesandno = response.data.PF_Yesandno;
            $scope.ESI_Yesandno = response.data.ESI_Yesandno;
            $scope.LWF = response.data.LWF;
            $scope.Bonus = response.data.Bonus;
            $scope.PF_Employeer_contribution = response.data.PF_Employeer_contribution;
            $scope.ESI_Employeer_contribution = response.data.ESI_Employeer_contribution;
            $scope.CTC = response.data.CTC;
            //$scope.FamilyOccupation = response.data.FamilyOccupation;

        });
    }


    $scope.Getcalvalue2 = function() {

            $scope.CheckingSession();

            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Basic': $scope.Basic,
                    'HR_Allowance': $scope.HR_Allowance,
                    'TA': $scope.TA,
                    'Performance_allowance': $scope.Performance_allowance,
                    'Day_allowance': $scope.Day_allowance,
                    'Other_Allowance': $scope.Other_Allowance,
                    'PF_Yesandno': $scope.PF_Yesandno,
                    'PF_Fixed': $scope.PF_Fixed,
                    'ESI_Yesandno': $scope.ESI_Yesandno,

                    'Method': "CALCULAT"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.ESI = response.data.ESI;
                $scope.PF = response.data.PF
                $scope.Net_Salary = response.data.Net_Salary;
                $scope.Gross_Salary = response.data.Gross_Salary;
                $scope.PF_Yesandno = response.data.PF_Yesandno;
                $scope.ESI_Yesandno = response.data.ESI_Yesandno;

            });
        }
        /////////////////////////////////////
    $(document).ready(function(e) {

        $('#fileButton03').on('click', function() {
            // $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput03').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput03').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Bankname", $("#Bankname").val());
            form_data.append("Accountno", $("#Accountno").val());
            form_data.append("IFSCcode", $("#IFSCcode").val());
            form_data.append("Branch", $("#Branch").val());
            form_data.append("Empnameaspassbook", $("#Empnameaspassbook").val());
            form_data.append("Employeeid", $("#Employeeid").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploadbankpassdoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInput03").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchBank($scope.Employeeid);
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
    /////////////////////////////////////////////////


    /////////////////////////////////////
    $(document).ready(function(e) {

        $('#fileButton04').on('click', function() {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput04').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput04').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Employeestudied", $("#Employeestudied").val());
            form_data.append("UniversityorSchool", $("#UniversityorSchool").val());
            form_data.append("GradeorPercentage", $("#GradeorPercentage").val());
            form_data.append("Passoutyear", $("#Passoutyear").val());
            form_data.append("EduNextno", $("#EduNextno").val());
            form_data.append("EducationMode", $("#EducationMode").val());
            form_data.append("Specialization", $("#Specialization").val());

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
    ///////////////////////////////////////////////////////////////////
    $scope.GetDeptDays = function() {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Fromperiod': $scope.Fromperiod,
                'Toperiod': $scope.Toperiod,



                'Method': 'GetDEPTDAYS'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Postingdays = response.data.Postingdays;
            $scope.Postingyear = response.data.Postingyear;
            $scope.Postingmonth = response.data.Postingmonth;
            $scope.Period = response.data.Period;

            // $scope.DetailListTemp = response.data.mytbl;



        });

    };
    /////////////////////////////////////////////
    $scope.GetExitempname = function() {
            // $scope.CheckingSession();
            $http({

                method: "post",
                url: "Employee.php",
                data: {
                    'Exitempid': $scope.Exitempid,
                    'Method': 'ExitEmp'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.ExitGender = response.data.ExitGender;
                $scope.ExitCategory = response.data.ExitCategory;
                $scope.ExitDesignation = response.data.ExitDesignation;
                $scope.ExitEmployeetype = response.data.ExitEmployeetype;
                $scope.ExitContactno = response.data.ExitContactno;
                $scope.ExitDepartment = response.data.ExitDepartment;
                $scope.Relievingrequestdate = response.data.Relievingrequestdate;
                $scope.RelievingDate = response.data.RelievingDate;
                $scope.Handoverto = response.data.Handoverto;
                $scope.Relievingreason = response.data.Relievingreason;
            });
        }
        /////////////////////////////////
    $scope.Resetexitemp = function() {
            // $scope.CheckingSession();
            $scope.Exitempid = "";
            $scope.ExitGender = "";
            $scope.ExitCategory = "";
            $scope.ExitDesignation = "";
            $scope.ExitEmployeetype = "";
            $scope.ExitContactno = "";
            $scope.ExitDepartment = "";
            $scope.Relievingrequestdate = "";
            $scope.RelievingDate = "";
            $scope.Handoverto = "";
            $scope.Relievingreason = "";
        }
        /////////////////////////////////
    $scope.Update_Relieving = function() {
            //  $scope.CheckingSession();
            $http({
                method: "post",
                url: "Employee.php",
                data: {
                    'Exitempid': $scope.Exitempid,
                    'ExitGender': $scope.ExitGender,
                    'ExitCategory': $scope.ExitCategory,
                    'ExitDesignation': $scope.ExitDesignation,
                    'ExitEmployeetype': $scope.ExitEmployeetype,
                    'ExitContactno': $scope.ExitContactno,
                    'ExitDepartment': $scope.ExitDepartment,
                    'Relievingrequestdate': $scope.Relievingrequestdate,
                    'RelievingDate': $scope.RelievingDate,
                    'Handoverto': $scope.Handoverto,
                    'Relievingreason': $scope.Relievingreason,
                    'Method': 'ExitUpdate'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {
                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.UserLoginDestroy();
            });
        }
        //////////////////////////////////////////////
    $scope.Deactive = function() {
            $http({
                method: "post",
                url: "Employee.php",
                data: {
                    'Exitempid': $scope.Exitempid,
                    'Relievingrequestdate': $scope.Relievingrequestdate,
                    'RelievingDate': $scope.RelievingDate,
                    'Handoverto': $scope.Handoverto,
                    'Relievingreason': $scope.Relievingreason,

                    'Method': 'ExitDeactive'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
            });
        }
        ///////////////////////////////////////////////////
    $scope.GetExitallvalues = function() {

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'ExitALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetExitEmployeeList = response.data;
        });
    };
    //////////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'ExitALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetExitEmployeeList = response.data;
        // $scope.CheckingSession();
    });
    //////////////////////////////
    /////////////////////////////////////
    $(document).ready(function(e) {

        $('#fileButton05').on('click', function() {
            //$scope.CheckingSession();
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
                    $scope.DisplayCandidateVaccination();
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
    //////////////////////////////////////////////
    $scope.FetchCovidvaccination = function() {
            //  $scope.CheckingSession();
            $http({

                method: "post",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': 'Fetchvaccinationnew'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

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
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Vaccinateddate': $scope.Vaccinateddate,
                    'Covidvaccinated': $scope.Covidvaccinated,


                    'Method': 'Vaccinationupdate'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.UserLoginDestroy();
            });
        }
        /////////////////////////////////////
        ////////////////////////////////////////////
    $scope.ResetVaccination = function() {
        $scope.CheckingSession();
        $scope.Covidvaccinated = "";
        $scope.Vaccinateddate = "";
        $scope.clearinput = "";
        $scope.VaccinationNextno();
        $scope.DisplayCandidateVaccination();
    }

    $scope.DisplayCandidateVaccination = function() {
        //  $scope.CheckingSession();



        $http({



            method: "POST",
            url: "VaccinationSave.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPVACCINATION' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetVaccinationList = response.data;


        });

    };

    //////////////////////////////

    //////////////////////////////////////////////
    $scope.FetchCovidvaccination = function(Employeeid, Sno) {
            //   $scope.CheckingSession();
            $scope.Employeeid = Employeeid;
            $scope.Vaccinatedsno = Sno;
            $http({

                method: "post",
                url: "VaccinationSave.php",
                data: {
                    'Employeeid': $scope.Employeeid,
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
                    'Employeeid': $scope.Employeeid,
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
            //  $scope.CheckingSession();
            $http({
                method: "post",
                url: "VaccinationSave.php",
                data: {
                    'Employeeid': $scope.Employeeid,

                    'Vaccinatedsno': $scope.Vaccinatedsno,



                    'Method': 'VaccinationDelete'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {



                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.ResetVaccination();
                $scope.UserLoginDestroy();
            });
        }
        //////////////////
    $scope.VaccinationNextno = function() {
            //  $scope.CheckingSession();
            //alert($scope.Employeeid);
            $http({



                method: "POST",
                url: "VaccinationSave.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPVACCINATIONNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                //alert(response.data);

                $scope.Vaccinatedsno = response.data.Sno;

            });
        }
        /////////////////////////////////////
    $scope.emailchecking = function(email) {
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
            // $scope.Message = "Please Enter Validate Email ID ..........";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            return true;
        }
        ///////////////////////////////////////////




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
        //////////////////////////////////////////////

    $scope.FetchSIPLDocument = function(Employeeid) {
            // $scope.CheckingSession();
            $scope.Employeeid = Employeeid;
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Method': "FetchSIPLDOC"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.EmployeeDetailpathtamil = response.data.EmployeeDetailpathtamil;
                $scope.Form34pathtamil = response.data.Form34pathtamil;
                $scope.Attentionoftheemployeepathtamil = response.data.Attentionoftheemployeepathtamil;
                $scope.Employeedeclarationpathtamil = response.data.Employeedeclarationpathtamil;
                $scope.Employeecontractpathtamil = response.data.Employeecontractpathtamil;
                $scope.Employeestatingpathtamil = response.data.Employeestatingpathtamil;
                $scope.Employeeagreemantpathtamil = response.data.Employeeagreemantpathtamil;
                $scope.Serviceimprovementpathrecordtamil = response.data.Serviceimprovementpathrecordtamil;
                $scope.Employeetrainingpathtamil = response.data.Employeetrainingpathtamil;
                $scope.Form2revisedpathtamil = response.data.Form2revisedpathtamil;


                $scope.EmployeeDetailpathhindi = response.data.EmployeeDetailpathhindi;
                $scope.Form34pathtamilhindi = response.data.Form34pathtamilhindi;
                $scope.Attentionoftheemployeepathhindi = response.data.Attentionoftheemployeepathhindi;
                $scope.Employeedeclarationpathhindi = response.data.Employeedeclarationpathhindi;
                $scope.Employeecontractpathhindi = response.data.Employeecontractpathhindi;
                $scope.Employeestatingpathhindi = response.data.Employeestatingpathhindi;
                $scope.Employeeagreemantpathhindi = response.data.Employeeagreemantpathhindi;
                $scope.Serviceimprovementpathrecordlhindi = response.data.Serviceimprovementpathrecordlhindi;
                $scope.Employeetrainingpathhindi = response.data.Employeetrainingpathhindi;
                $scope.Form2revisedpathhindi = response.data.Form2revisedpathhindi;
                $scope.Employee_NDA_Path = response.data.Employee_NDA_Path;
                $scope.GratutityPath = response.data.GratutityPath;

            });
        }
        //////////////////////////////////////////
        /////////EMPDETAILTAMIL////////////////////
        ///////////////////////
    $(document).ready(function(e) {

        $('#fileButtonEmpDetailtamil').on('click', function() {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDetailtamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDetailtamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpdetailtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpDetailtamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $scope.CheckingSession();
        $("#btnempdetailtamil").click(function() {


            var data = $("#pdfExportempdetailtamil").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Details</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();
        });
    });

    ////////////////////////////////////////////////////////////
    //////////EMPDETAILSHINDI////////////////////
    $(document).ready(function(e) {

        $('#fileButtonEmpDetailhindi').on('click', function() {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDetailhindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDetailhindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpdetailhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpDetailhindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $scope.CheckingSession();
        $("#btnempdetailHindi").click(function() {


            var data = $("#pdfExportempdetailhindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Declaration</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////
    ///////FORM34TAMIL//////////////
    $(document).ready(function(e) {

        $('#fileButtonform34tamil').on('click', function() {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputform34tamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputform34tamil').files[x]);
            }

            $.ajax({
                url: 'UploadForm34tamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputform34tamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {

        $("#btnform34tamil").click(function() {
            //$scope.CheckingSession();

            var HTML_Width = $("#pdfExporform34ltamil").width();
            var HTML_Height = $("#pdfExporform34ltamil").height();
            var data = document.getElementById('pdfExporform34ltamil');
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
    /////////////////////////////////////////////////////////////////
    //////FORM34HINDI////////////////////////
    $(document).ready(function(e) {

        $('#fileButtonform34hindi').on('click', function() {
            // $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputform34hindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputform34hindi').files[x]);
            }

            $.ajax({
                url: 'UploadForm34hindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputform34hindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {

        $("#btnform34hindi").click(function() {
            //$scope.CheckingSession();

            var HTML_Width = $("#pdfExporform34hindi").width();
            var HTML_Height = $("#pdfExporform34hindi").height();
            var data = document.getElementById('pdfExporform34hindi');
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
    /////////////////////////////////////////
    ////////////EMPATTENTIONTAMIL
    $(document).ready(function(e) {
        $('#fileButtonEmpAttentiontamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAttentiontamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAttentiontamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAttentiontamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpAttentiontamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpAttentiontamil").click(function() {

            var HTML_Width = $("#pdfExporEmpAttentiontamil").width();
            var HTML_Height = $("#pdfExporEmpAttentiontamil").height();
            var data = document.getElementById('pdfExporEmpAttentiontamil');
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
    ///////////////////////////////////////////////////////////////
    ////////////EMPATTENTIONHINDI
    $(document).ready(function(e) {
        $('#fileButtonEmpAttentionhindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAttentionhindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAttentionhindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAttentionhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpAttentionhindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpAttentionhindi").click(function() {

            var HTML_Width = $("#pdfExporEmpAttentionhindi").width();
            var HTML_Height = $("#pdfExporEmpAttentionhindi").height();
            var data = document.getElementById('pdfExporEmpAttentionhindi');
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

    /////////////////EMPLOYEE DECLARATION TAMIL////////////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpDeclarationtamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDeclarationtamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDeclarationtamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpDeclarationtamil..php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpDeclarationtamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpDeclarationTamil").click(function() {

            var HTML_Width = $("#pdfExporEmpDeclarationtamil").width();
            var HTML_Height = $("#pdfExporEmpDeclarationtamil").height();
            var data = document.getElementById('pdfExporEmpDeclarationtamil');
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
    //////////////////////////////////////////
    //////////////EMPLOYEE DECLARATION HINDI ////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpDeclarationHindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDeclarationHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDeclarationHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpDeclarationhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpDeclarationHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpDeclarationHindi").click(function() {

            var HTML_Width = $("#pdfExporEmpDeclarationHindi").width();
            var HTML_Height = $("#pdfExporEmpDeclarationHindi").height();
            var data = document.getElementById('pdfExporEmpDeclarationHindi');
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
    //////////////////////////////////////////////////////
    //////////EMPLOYEE STATING TAMIL/////////////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpStatingTamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpStatingTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpStatingTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpStatingtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpStatingTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpStatingTamil").click(function() {


            // var data = document.getElementById('pdfExporEmpStatingTamil');
            var data = $("#pdfExporEmpStatingTamil").html();



            var printWindow = window.open('', '_blank');
            printWindow.document.open();

            printWindow.document.write('<html><head><title>Employee Stating</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();
        });
    });
    //////////////////////////////////////////////////////////////
    //////////////EMPLOYEE STATING HINDI///////////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpStatingHindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpStatingHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpStatingHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpStatinghindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpStatingHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpStatingHindi").click(function() {


            var data = $("#pdfExporEmpStatingHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Stating</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    /////////////////////////////////////////////
    /////////EMPLOYEE AGREEMENT TAMIL////////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpAgreementTamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAgreementTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAgreementTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAgreeementTamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpAgreementTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpAgreementTamil").click(function() {


            var data = $("#pdfExporEmpAgreementTamil").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Agreement</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    //////////////////////////////////////////////////////
    ////////////EMPLOYEE AGREEMENT HINDI /////////////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpAgreementHindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAgreementHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAgreementHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAgreementHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpAgreementHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpAgreementHindi").click(function() {

            var HTML_Width = $("#pdfExporEmpAgreementHindi").width();
            var HTML_Height = $("#pdfExporEmpAgreementHindi").height();


            var data = $("#pdfExporEmpAgreementHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Agreement</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ///////////////////////////
    //////////////////////EMPLOYEE TRAINING TAMIL ///////////
    $(document).ready(function(e) {
        $('#fileButtonEmpTrainingTamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpTrainingTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpTrainingTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpTrainingtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpTrainingTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpTrainingTamil").click(function() {

            var HTML_Width = $("#pdfExporEmpTrainigTamil").width();
            var HTML_Height = $("#pdfExporEmpTrainigTamil").height();
            var data = document.getElementById('pdfExporEmpTrainigTamil');
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
    //////////////////////////////////////
    ////////////////////////////EMPLOYEE TRAINING HINDI ///////////////////////////

    $(document).ready(function(e) {
        $('#fileButtonEmpTrainingHindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpTrainingHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpTrainingHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpTrainingHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpTrainingHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpTrainingHindi").click(function() {

            var HTML_Width = $("#pdfExporEmpTrainigHindi").width();
            var HTML_Height = $("#pdfExporEmpTrainigHindi").height();
            var data = document.getElementById('pdfExporEmpTrainigHindi');
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
    ///////////////////////////////////////////////
    /////////////////Employee Service Tamil/////////

    $(document).ready(function(e) {
        $('#fileButtonEmpServiceTamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpServiceTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpServiceTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpServiceTamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpServiceTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpServiceTamil").click(function() {

            var HTML_Width = $("#pdfExportEmpServiceTamil").width();
            var HTML_Height = $("#pdfExportEmpServiceTamil").height();
            var data = document.getElementById('pdfExportEmpServiceTamil');
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
    ///////////////////////////////////////////////
    ////////////EMPLOYEE SERVICE HINDI /////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpServiceHindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpServiceHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpServiceHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpServiceHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpServiceHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpServiceHindi").click(function() {

            var HTML_Width = $("#pdfExportEmpServiceHindi").width();
            var HTML_Height = $("#pdfExportEmpServiceHindi").height();
            var data = document.getElementById('pdfExportEmpServiceHindi');
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
    //////////////////////////////
    //////////EMP FORM 2 REVISED TAMIL //////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpForm2RevisedTamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpForm2RevisedTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpForm2RevisedTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpForm2revisedTamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpForm2RevisedTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpForm2RevisedTamil").click(function() {;
            //  var data = document.getElementById('pdfExportEmpForm2RevisedTamil').html();
            var data = $("#pdfExportEmpForm2RevisedTamil").html();


            var printWindow = window.open('', '_blank');
            printWindow.document.open();

            printWindow.document.write('<html><head><title>FORM-2 Revised</title></head><body>');
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();


        });
    });
    /////////////////////////////////////////////
    ////////////////////EMP FORM2 REVISED HINDI ////////////
    $(document).ready(function(e) {
        $('#fileButtonEmpForm2RevisedHindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpForm2RevisedHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpForm2RevisedHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpForm2revisedHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpForm2RevisedHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpForm2RevisedHindi").click(function() {


            var data = $("#pdfExportEmpForm2RevisedHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>FORM-2 Revised</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////////////



    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'APPPENDING' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetAPPEmployeeList = response.data;
    });

    ///////////////////////////////////////////
    $(document).ready(function(e) {
        $('#fileButtonBackgrounverification').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBackgroundVerification').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBackgroundVerification').files[x]);
            }

            $.ajax({
                url: 'UploadBackgroundVerification.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputBackgroundVerification").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////////////////////////////////
    $scope.PageLoadBACKPENDING = function() {
            $http({
                method: "POST",
                url: "Employee.php",
                data: { 'Method': 'BACKPENDING' },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {


                $scope.GetBackgroundEmployeeList = response.data;

            });
        }
        ////////////////////////////////////
    $scope.ResetNomineeFamily = function() {
        $scope.CheckingSession();
        $scope.NomineeName = "";
        $scope.NomineeRelationship = "";
        $scope.NomineeDateOfBirth = "";
        $scope.Guardianname = "";
        $scope.RelationshipContactno = "";
        $scope.PercentageofShare = "";
        $scope.NomineeAddress = "";
        $scope.NomineeSno = "0";
        $scope.DisplayEmpNominee();
        $scope.FetchNomineenextno();
    }


    ////////////////////////////////
    $scope.FetchEmpNominee = function(Employeeid, NomineeSno) {
        $scope.Employeeid = Employeeid;
        $scope.NomineeSno = NomineeSno;
        $http({
            method: "POST",
            url: "NomineeEmployee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'NomineeSno': $scope.NomineeSno,
                'Method': "FetchEmpNominee"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            // alert(response.data.NomineeDateOfBirth);

            $scope.NomineeName = response.data.NomineeName;
            $scope.NomineeRelationship = response.data.NomineeRelationship;
            $scope.NomineeDateOfBirth = response.data.NomineeDateOfBirth;
            $scope.Guardianname = response.data.Guardianname;
            $scope.RelationshipContactno = response.data.RelationshipContactno;
            $scope.PercentageofShare = response.data.PercentageofShare;
            $scope.NomineeAddress = response.data.NomineeAddress;
            $scope.NomineeAge = response.data.NomineeAge;
        });
    }


    $scope.FetchEmpNominee2 = function(Employeeid) {
            $scope.Employeeid = Employeeid;
            // $scope.NomineeSno = NomineeSno;
            $http({
                method: "POST",
                url: "NomineeEmployee.php",
                data: {
                    'Employeeid': $scope.Employeeid,

                    'Method': "FetchEmpNominee2"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                // alert(response.data.NomineeName);

                $scope.NomineeName2 = response.data.NomineeName;
                $scope.NomineeRelationship2 = response.data.NomineeRelationship;

            });
        }
        /////////////////////////////
    $scope.Update_NomineeFamily = function() {
        $scope.CheckingSession();
        $http({
            method: "post",
            url: "NomineeEmployee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'NomineeName': $scope.NomineeName,
                'NomineeRelationship': $scope.NomineeRelationship,
                'NomineeDateOfBirth': $scope.NomineeDateOfBirth,
                'NomineeAge': $scope.NomineeAge,
                'Guardianname': $scope.Guardianname,
                'RelationshipContactno': $scope.RelationshipContactno,
                'PercentageofShare': $scope.PercentageofShare,
                'NomineeAddress': $scope.NomineeAddress,
                'NomineeSno': $scope.NomineeSno,
                'Method': 'EmpNomineeUpdate'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.DisplayEmpNominee();

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.UserLoginDestroy();
        });
    }




    ////////////////////////////////
    $scope.FetchNomineenextno = function() {
            //  $scope.CheckingSession();
            //alert($scope.Employeeid);
            $http({



                method: "POST",
                url: "NomineeEmployee.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPNOMINEENEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                //alert(response.data);

                $scope.NomineeSno = response.data.Sno;

            });
        }
        ///////////////////////////////////////
    $scope.DisplayEmpNominee = function() {



        $http({



            method: "POST",
            url: "NomineeEmployee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPNOMINEE' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetNomineeList = response.data;


        });

    };
    ////////////////////////

    //////////////////////////////////////////
    $scope.DeleteNominee = function() {
            // $scope.CheckingSession();
            $http({
                method: "POST",
                url: "NomineeEmployee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'NomineeSno': $scope.NomineeSno,
                    'Method': 'NomineeDelete'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {



                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.ResetNomineeFamily();
            });
        }
        ///////////////////////
    $scope.GetNomineeage = function() {
        $http({



            method: "POST",
            url: "NomineeEmployee.php",
            data: {
                'Dob': $scope.NomineeDateOfBirth,



                'Method': 'GetNomineeAge'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.NomineeAge = response.data.Age;

            // $scope.DetailListTemp = response.data.mytbl;



        });

    };

    ///////////////////////////////
    $(function() {
        $("#btnEmpNDA").click(function() {

            var HTML_Width = $("#pdfExportNDAEnglish").width();
            var HTML_Height = $("#pdfExportNDAEnglish").height();
            var data = document.getElementById('pdfExportNDAEnglish');
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

    ////////////////////////////////////////////////////////////
    //////////EMPDETAILSHINDI////////////////////
    $(document).ready(function(e) {
        $('#fileButtonNDA').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputNDA').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputNDA').files[x]);
            }

            $.ajax({
                url: 'UploadEmpdetailNDA.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputNDA").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////
    ///////////Employee Gratuity///////////////
    $(document).ready(function(e) {
        $('#fileButtonGratuity').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputGratuity').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputGratuity').files[x]);
            }

            $.ajax({
                url: 'UploadEmpGratutity.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputGratuity").value = '';

                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
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
    /////////////////////////////////////
    $(function() {
        $("#btnEmpGratuity").click(function() {

            var HTML_Width = $("#pdfExportGratuity").width();
            var HTML_Height = $("#pdfExportGratuity").height();
            var data = document.getElementById('pdfExportGratuity');
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

    //////////////////////////////////////
    $(function() {
        $("#download").click(function() {

            frontidcard();

        });
    });

    $(function() {
        $("#download4").click(function() {
            frontidcard4();
        });
    });
    /////////////////////

    //     function frontidcard()
    //     {

    //         var Empid = $('#Employeeid').val();
    //         // var divWidth = 204; // Desired width of the exported image
    //         // var divHeight = 325;

    //         var screenWidth = $(window).width();
    //         var screenHeight = $(window).height();

    //     var canvas = document.createElement("canvas");
    //     // canvas.width = divWidth;
    //     // canvas.height = divHeight;
    //        canvas.width = screenWidth/2;
    //      canvas.height = screenHeight/2;

    //      var ctx = canvas.getContext('2d');
    //      canvas.width = screenWidth ;
    //      canvas.height = screenHeight ;

    //      // Draw the content inside the canvas (e.g., an image)
    //      // Replace the following line with your own drawing logic.

    //      ctx.fillRect(0, 0, canvas.width, canvas.height);
    //   //  ctx.scale(3);
    //     html2canvas($("#Empfront")[0], {
    //       canvas: canvas,
    //       useCORS: true, // Enable if the div contains an image from a different domain
    //     }).then(function(canvas) {
    //      // var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    //      var dataURL = canvas.toDataURL();
    //       var link = document.createElement("a");
    //       link.download = Empid+ "_Empfront.jpeg";;
    //       link.href = dataURL;
    //       link.click();
    //       backidcard();
    //     });

    //     }

    //     function backidcard()
    //     {









    //         var Empid = $('#Employeeid').val();

    //         // var divWidth = 204; // Desired width of the exported image
    //         // var divHeight = 325;
    //         var screenWidth = $(window).width();
    //         var screenHeight = $(window).height();


    //         var canvas = document.createElement("canvas");
    //         // canvas.width = divWidth;
    //         // canvas.height = divHeight;
    //         canvas.width = screenWidth;
    //      canvas.height = screenHeight;
    //      var ctx = canvas.getContext('2d');
    //      canvas.width = screenWidth ;
    //      canvas.height = screenHeight ;

    //      ctx.fillRect(0, 0, canvas.width, canvas.height);
    //         html2canvas($("#Empback")[0], {
    //           canvas: canvas,
    //           useCORS: true, // Enable if the div contains an image from a different domain
    //         }).then(function(canvas) {
    //         //   var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    //         var dataURL = canvas.toDataURL();
    //           var link = document.createElement("a");
    //           link.download = Empid+ "_Empback.jpeg";;
    //           link.href = dataURL;
    //           link.click();

    //         });
    //         //  var element = $("#Empfront"); // global variable
    //         //   html2canvas(document.getElementById("Empback"), { allowTaint: true, scale: 2, useCORS: true, logging: true,width:204,height:325 }).then(function (canvas) {                   
    //         //     var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    //         //     var anchorTag = document.createElement("a");

    //         //        document.body.appendChild(anchorTag);
    //         //     //   document.getElementById("previewImg").appendChild(canvas);
    //         //        anchorTag.download =Empid+ "_Empback.jpeg";
    //         //        anchorTag.href = image;
    //         //        anchorTag.target = '_blank';
    //         //        anchorTag.click();
    //         //    });
    //     }


    function frontidcard() {

        var Empid = $('#Employeeid').val();
        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;



        html2canvas($("#Empfront")[0], {
            scale: 2,
            useCORS: true, // Enable if the div contains an image from a different domain
        }).then(function(canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empfront.jpg";;
            link.href = image;
            link.click();
            backidcard();
        });
        // //  var element = $("#Empfront"); // global variable
        //   html2canvas(document.getElementById("Empfront"), {allowTaint: true, scale: 2, useCORS: true, logging: true,width:width,height: height}).then(function (canvas) {  
        //     var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");                 
        //       var anchorTag = document.createElement("a");
        //        document.body.appendChild(anchorTag);
        //     //   document.getElementById("previewImg").appendChild(canvas);
        //        anchorTag.download =Empid+ "_Empfront.jpeg";
        //        anchorTag.href = image;
        //        anchorTag.target = '_blank';
        //        anchorTag.click();
        //        backidcard();
        //    });
    }

    function backidcard() {

        var Empid = $('#Employeeid').val();

        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;

        html2canvas($("#Empback")[0], {
            scale: 2,
            useCORS: true,
            // Enable if the div contains an image from a different domain
        }).then(function(canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empback.jpg";;
            link.href = image;
            link.click();

        });

    }
    /////////////////////////////////////////////
    $(function() {
        $("#btnEmpAssessment").click(function() {


            var data = $("#pdfExportPerformanceAssessment").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Performance Assesment</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////////////////////
    $(function() {
        $("#btnEmpAssessment").click(function() {


            var data = $("#pdfExportPerformanceAssessment").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Performance Assesment</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////////////////////
    $(function() {
        $("#btnAppointmentordertamil").click(function() {


            var data = $("#pdfExportAppointmentorder").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>AppointmentOrderTamil</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function() {
        $("#btnAppointmentorderhindi").click(function() {


            var data = $("#pdfExportAppointmentorderHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>AppointmentOrderHindi</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function() {
        $("#btnConfirmationordertamil").click(function() {


            var data = $("#pdfExportConfirmationorder").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Confirmationordertamil</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });

    $(function() {
        $("#btnConfirmationorderHindi").click(function() {


            var data = $("#pdfExportConfirmationorderHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Confirmationorderhindi</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });

    $(function() {
        $("#btnInterviewdetailstamil").click(function() {


            var data = $("#pdfExportInterviewdetailtamil").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Interviewdetailstamil</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function() {
        $("#btnInterviewdetailshindi").click(function() {


            var data = $("#pdfExportInterviewdetailhindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Interviewdetailshindi</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function() {
        $("#btnEmployeecontract").click(function() {


            var data = $("#pdfExportEmployeeContract").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employeecontract</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    //////////////////////////////////////
    $scope.GetMailunique = function(Emailid) {

            $scope.Emailid = Emailid;
            $http({
                method: "POST",
                url: "Employee.php",
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
        ////////////////////
    $scope.GetContactnounique = function(Contactno) {
        $scope.Contactno = Contactno;
        $http({
            method: "POST",
            url: "Employee.php",
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
    ///////////////////////////

    $scope.Emailverification01 = function() {
        $scope.CheckingSession();
        $scope.Message = true;
        $scope.Message = "Please Wait Email Sending...";

        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Firstname': $scope.Firstname,

                'Emailid': $scope.Emailid,

                'Method': 'Emailverification01'
            },
            headers: { 'Content-Type': 'application/json' },


        }).then(function successCallback(response) {

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();
        });
    }



    $scope.CheckingSession = function() {

        $http({



            method: "POST",
            url: "../Sessionhandling/SessionChecking.php",
            data: {
                'PageSession': $scope.PageSession,


                'Method': 'CurrentSession'
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
        /////////////////////////////////


    ///////////////////////////////

    $scope.EditrightsNextno = function() {
            $scope.EditingReason = "";
            $http({



                method: "POST",
                url: "EditirightsforApproval.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'CANEDITRIGHTSNEXTNO' },
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
                    'Employeeid': $scope.Employeeid,
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
                    'Employeeid': $scope.Employeeid,
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
                'Employeeid': $scope.Employeeid,
                'EditingUserid': $scope.EditingUserid,
                'EditingPassword': $scope.EditingPassword,
                'Method': 'LoginDestroy'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            //$scope.SuperUserMail();

        });
    }


    $scope.Propertyitemnextno = function() {
            //  $scope.CheckingSession();
            //alert($scope.Employeeid);
            $http({



                method: "POST",
                url: "Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROPERTYNEXT' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
                //alert(response.data);

                $scope.CheckitemSno = response.data.Sno;
                $scope.Distributeddate = response.data.Distributeddate;

            });
        }
        /////////////////////////////////////////
    $scope.Resetpropertychecklist = function() {
            $scope.Qtyitem = 0;
            $scope.Particulars = "";
            $scope.Assetcategoryid = "";
            $scope.Assetlistid = "";
            $scope.Assetcode = "";
            $scope.Propertyitemnextno();
            $scope.GetAssetCategory();
            $scope.DisplayPropertyChecklist();
            $scope.DisplayAssetLog();
            $scope.GetReturnDetails();
            $("#AssetAllocation")[0].reset();
            $("#AddAsset tbody").empty();
            selectedAssetListIds = [];

        }
        ////////////////////
    $scope.DisplayPropertyChecklist = function() {



        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROPERTYCHECKLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetPropertyCheckList = response.data;


        });

    };
    //////////////////////////
    $scope.FetchPropertyChecklist = function(Employeeid, Sno) {
            $scope.Employeeid = Employeeid;
            $scope.CheckitemSno = Sno;

            $http({

                method: "post",
                url: "Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'CheckitemSno': $scope.CheckitemSno,
                    'Method': 'FetchProperty'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.Propertychecklistitemimage = response.data.Propertychecklistitemimage;
                $scope.Distributeddate = response.data.Distributeddate;
                $scope.Qtyitem = response.data.Qtyitem;
                $scope.Particulars = response.data.Particulars;
                $scope.Assetcategoryid = response.data.Assetcategoryid;
                $scope.GetAssetListnew();
                $scope.Assetlistid = response.data.Assetlistid;

                $scope.GetAssetname();

            });
        }
        ////////////////////////
    $(document).ready(function(e) {
        // $scope.CheckingSession();
        $('#fileButtonPropertychecklistimage').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('Propertychecklistitemimage').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('Propertychecklistitemimage').files[x]);
            }

            form_data.append("CheckitemSno", $("#CheckitemSno").val());
            form_data.append("Particulars", $("#Particulars").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Distributeddate", $("#Distributeddate").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'UploadPropertyImage.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("Propertychecklistitemimage").value = '';
                    $scope.DisplayPropertyChecklist();
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
    ////////////////////////////

    $scope.Update_Property = function() {
            $scope.CheckingSession();
            $http({
                method: "post",
                url: "Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'CheckitemSno': $scope.CheckitemSno,
                    'Particulars': $scope.Particulars,
                    'Qtyitem': $scope.Qtyitem,
                    'Qtyitem': $scope.Qtyitem,
                    'Assetlistid': $scope.Assetlistid,
                    'Assetcategoryid': $scope.Assetcategoryid,
                    'Distributeddate': $scope.Distributeddate,


                    'Method': 'Propertyupdate'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {
                $scope.DisplayPropertyChecklist();

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();
                $scope.UserLoginDestroy();
            });

        }
        ////////////////////////////
    $scope.DeleteProperty = function() {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.CheckitemSno,

                'Method': 'PropertyDelete'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Resetpropertychecklist();

            // $scope.DetailListTemp = response.data.mytbl;
            $scope.UserLoginDestroy();

            $scope.TempSave();
        });

    };


    $scope.SuperUserMail = function() {

            $http({
                method: "post",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,

                    'Method': 'SuperUserMail'
                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {


            });
        }
        ////////////////////////
    $scope.SuperUserAddressMail = function() {

            $http({
                method: "post",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,

                    'Method': 'SuperUserAddressMail'
                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {


            });
        }
        ///////////////////////
    $scope.SuperUserBankAccountsMail = function() {

            $http({
                method: "post",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,

                    'Method': 'SuperUserBankAccountsMail'
                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {


            });
        }
        ///////////////////////////
    $scope.SuperUserEmpRefrenceMail = function() {

            $http({
                method: "post",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,

                    'Method': 'SuperUserEmpRefrenceMail'
                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {


            });
        }
        ///////////////////////
    $scope.GetNominationsharepercentage = function(Employeeid, PercentageofShare) {
        $scope.PercentageofShare = PercentageofShare;
        $scope.Employeeid = Employeeid;

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'PercentageofShare': $scope.PercentageofShare,
                'NomineeSno': $scope.NomineeSno,

                'Method': 'EMPNOMINEEPERCENTAGE'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            //alert(response.data.Message);
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();


        });

    }


    $scope.GetEmergencyContact = function() {

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Method': 'EMERGENCYCONTACT'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.EmergencyContactno = response.data.EmergencyContactno;


        });
    }

    ////////////////////

    $scope.Authorizationcheck = function() {
            $http({
                method: "post",
                url: "Employee.php",
                data: {


                    'Method': 'ADMINAUTHORIZATION'
                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {
                $scope.Authorizedno = response.data.Authorizedno;


            });
        }
        /////////////////////////////////////

    $http({
        method: "post",
        url: "Employee.php",
        data: {


            'Method': 'ADMINAUTHORIZATION'
        },
        headers: { 'Content-Type': 'application-json' }
    }).then(function successCallback(response) {
        $scope.Authorizedno = response.data.Authorizedno;


    });
    ////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: {

            'Method': "FETCHCLIENT"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {

        // alert(response.data.ClientnameTamil);
        $scope.Clientname = response.data.Clientname;
        $scope.Location = response.data.Location;
        $scope.ClientPhoneno = response.data.Phoneno;
        $scope.ClientEmailid = response.data.Emailid;
        $scope.ClientGSTN = response.data.GSTN;
        $scope.ClientTin = response.data.Tin;
        $scope.ClientEmailpassword = response.data.Emailpassword;
        $scope.ClientRegnno = response.data.Regnno;
        $scope.ClientPanno = response.data.Panno;
        $scope.ClientAddressLine1 = response.data.AddressLine1;
        $scope.ClientAddressLine2 = response.data.AddressLine2;

        $scope.ClientAddressLine3 = response.data.AddressLine3;
        $scope.ClientCountry = response.data.Country;
        $scope.ClientCity = response.data.City;
        $scope.ClientZipcode = response.data.Zipcode;
        $scope.ClientWebsite = response.data.Website;
        $scope.ClientnameTamil = response.data.ClientnameTamil;
        $scope.ClientnameHindi = response.data.ClientnameHindi;
        $scope.ClientLogo = response.data.ClientLogo;
        $scope.Place = response.data.Place;
        $scope.Clientid = response.data.Clientid;
        $scope.Busroute = response.data.Busroute;

    });
    ////////////////////////////////

    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'cat3emp' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.Getcat3EmployeeList = response.data;
    });
    //////////////////////////////
    $(function() {


        $("#btnEmpReport").click(function() {

            $scope.CheckingSession();
            $scope.FetchEmployee($scope.Employeeid);
            $scope.FetchEmpNominee2($scope.Employeeid);
            $scope.DisplayEmpFamily();
            $scope.DisplayEmpNominee();
            setTimeout(function() {
                var Employeedetails = $("#pdfExportempdetailtamil").html();
                var Interviewdetails = $("#pdfExportInterviewdetailtamil").html();
                var AppointmentOrder = $("#pdfExportAppointmentorder").html();
                var Employeecontract = $("#pdfExportEmployeeContract").html();
                var EmployeeStating = $("#pdfExporEmpStatingTamil").html();
                var Empformno34 = $("#pdfExporform34ltamil").html();
                var Empserviceimprovement = $("#pdfExportEmpServiceTamil").html();
                var Emptraining = $("#pdfExporEmpTrainigTamil").html();
                var Empform2 = $("#pdfExportEmpForm2RevisedTamil").html();
                var EmpGratuity = $("#pdfExportGratuity").html();
                var EmpConfirmation = $("#pdfExportConfirmationorder").html();
                var EmpNDA = $("#pdfExporEmpAgreementTamil").html();
                var EmpAttention = $("#pdfExporEmpAttentiontamil").html();
                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Employee Report(Tamil)</title></head><body>');

                printWindow.document.write('<style></style>');

                // printWindow.document.write('<style>.row {display: flex;}.col-lg-6 {flex: 1;}table.doc-table {border-collapse: collapse;margin: 20px 0;}table.doc-table td,.table.doc-table th {border: 1px solid #dddddd;text-align: left;padding: 8px;}.candidate-photo {display: inline-block;height: 140px;width: 140px;padding: 5px;text-align: center;position: absolute; right: 4.8%;border: 1px solid #888888;}@media print {.page-break { page-break-before: always; }.row {  display: block; /* Change display to block for printing */  page-break-inside: avoid; /* Avoid page break inside the row */   }  .col-lg-6 {  width: 50%; /* Adjust column width for printing */    float: left; /* Float the columns for printing */    }  img {  max-width: 100%; /* Ensure images fit within the print layout */    }table.doc-table {border-collapse: collapse;margin: 20px 0;}table.doc-table td,.table.doc-table th {border: 1px solid #dddddd;text-align: left;padding: 8px;}.candidate-photo {display: inline-block;height: 140px;width: 140px;padding: 5px;text-align: center;position: absolute; right: 4.8%;border: 1px solid #888888;}}</style>');

                var divIds = [Employeedetails, Interviewdetails, AppointmentOrder, Employeecontract, EmpAttention, EmployeeStating, Empformno34, Empserviceimprovement, Emptraining, Empform2, EmpGratuity, EmpConfirmation, EmpNDA];

                // Loop through the div IDs and add them to separate pages
                for (var i = 0; i < divIds.length; i++) {

                    var divContent = divIds[i];

                    printWindow.document.write('<div class="page-break" style="page-break-before: always !important;">' + divContent + '</div>');

                }


                printWindow.document.write('</body></html>');

                printWindow.document.close();
                printWindow.print();
            }, 1000);

        });
    });
    //////////////////////////////////////
    $(function() {


        $("#btnEmpReportHindi").click(function() {

            $scope.CheckingSession();

            $scope.FetchEmployee($scope.Employeeid);
            $scope.FetchEmpNominee2($scope.Employeeid);
            $scope.DisplayEmpFamily();
            $scope.DisplayEmpNominee();
            setTimeout(function() {
                var Employeedetails = $("#pdfExportempdetailhindi").html();
                var Interviewdetails = $("#pdfExportInterviewdetailhindi").html();
                var AppointmentOrder = $("#pdfExportAppointmentorderHindi").html();
                var Employeecontract = $("#pdfExportEmployeeContract").html();
                var EmployeeStating = $("#pdfExporEmpStatingHindi").html();
                var Empformno34 = $("#pdfExporform34hindi").html();
                var Empserviceimprovement = $("#pdfExportEmpServiceHindi").html();
                var Emptraining = $("#pdfExporEmpTrainigHindi").html();
                var Empform2 = $("#pdfExportEmpForm2RevisedHindi").html();
                var EmpGratuity = $("#pdfExportGratuity").html();
                var EmpConfirmation = $("#pdfExportConfirmationorderHindi").html();
                var EmpNDA = $("#pdfExporEmpAgreementHindi").html();
                var EmpAttention = $("#pdfExporEmpAttentionhindi").html();

                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Employee Report(Hindi)</title></head><body>');

                printWindow.document.write('<style></style>');

                var divIds = [Employeedetails, Interviewdetails, AppointmentOrder, Employeecontract, EmpAttention, EmployeeStating, Empformno34, Empserviceimprovement, Emptraining, Empform2, EmpGratuity, EmpConfirmation, EmpNDA];

                // Loop through the div IDs and add them to separate pages
                for (var i = 0; i < divIds.length; i++) {
                    var divId = divIds[i];
                    var divContent = divIds[i];

                    printWindow.document.write('<div class="page-break" style="page-break-before: always !important;">' + divContent + '</div>');
                }


                printWindow.document.write('</body></html>');

                printWindow.document.close();
                printWindow.print();
            }, 1000);

        });
    });

    /////////////////////////
    ////////////////////////////
    $(document).ready(function(e) {
        $scope.CheckingSession();
        $('#fileButtonEmpReporttamil').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpReporttamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpReporttamil').files[x]);
            }
            form_data.append("Employeeid", $("#Employeeid").val());
            $.ajax({
                url: 'UploadEmpformtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpReporttamil").value = '';
                    $scope.FetchTamilhindidocument();
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    // display success response from the PHP script
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

        $('#fileButtonEmpReporthindi').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpReporthindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpReporthindi').files[x]);
            }
            form_data.append("Employeeid", $("#Employeeid").val());
            $.ajax({
                url: 'UploadEmpformhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    document.getElementById("fileInputEmpReporthindi").value = '';
                    $scope.FetchTamilhindidocument();
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    // display success response from the PHP script
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

    ///////////
    $scope.FetchTamilhindidocument = function() {


            $http({
                    method: "POST",
                    url: "Employee.php",
                    data: { 'Employeeid': $scope.Employeeid, 'Method': 'fetchTamilHindi' },
                    headers: { 'Content-Type': 'application-json' }
                })
                .then(function successCallback(response) {

                    $scope.Empformstamilpath = response.data.Empformstamilpath;
                    $scope.Empformshindipath = response.data.Empformshindipath;

                });
        }
        /////////////////////////////////////////////
    $scope.GetAssetCategory = function() {
        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Method': 'AssetCategory' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.GetCategoryList = response.data.mytbl;
        });

    }


    $scope.GetAssetListnew = function() {


        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Assetcategoryid': $scope.Assetcategoryid, 'Method': 'AssetCategoryList' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.GetAssetList = response.data.mytbl;
            $scope.Assetcategory = response.data.Assetcategory;
            $scope.Shortcode = response.data.Shortcode;
            // $scope.GetReturnDetails ();
        });


    }


    $scope.GetAssetname = function() {
        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Assetlistid': $scope.Assetlistid, 'Method': 'AssetName' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Assetcode = response.data.Assetcode;
            $scope.Assetname = response.data.Assetname;
            $scope.Shortcode = response.data.Shortcode;
        });

    }

    $scope.SendAssetPropert = function(Employeeid, Sno) {
        $scope.Employeeid = Employeeid;
        $scope.CheckitemSno = Sno;
        $scope.FetchPropertyChecklist(Employeeid, Sno);
        $('#ModalCenterAssetAdd').modal('show');

    }

    $scope.folder = {};
    $scope.returnfolder = {};
    // $scope.selectedItems = [];
    // $scope.returnselectedItems = [];

    // Function to toggle selection of an item


    $scope.GetAssetReturn = function() {
        $scope.CheckingSession();
        $scope.getAllSelected();
        if ($scope.selectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function() { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.selectedItems, 'Method': 'AssetReturn' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;

                $scope.GetAssetAllocatePrintAuto($scope.Itemsnodetail, "Employee Asset Return");
                //  alert($scope.Itemsnodetail);


                $scope.GetReturnDetails();
                $scope.DisplayPropertyChecklist();
                $scope.DisplayAssetLog();
                $scope.folder = {};

            });
        }
    }




    $scope.GetAssetReallocation = function() {
        $scope.CheckingSession();
        $scope.getreturnAllSelected();
        if ($scope.returnselectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function() { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.returnselectedItems, 'Method': 'AssetReallocation' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;
                $scope.GetAssetReturnPrintAuto($scope.Itemsnodetail, "Employee Asset Reallocation");
                $scope.DisplayPropertyChecklist();
                $scope.GetReturnDetails();
                $scope.DisplayAssetLog();
                $scope.returnfolder = {};

            });
        }
    }


    $scope.GetReturnDetails = function() {
        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'ReturnList' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.GetPropertyReturnList = response.data.mytbl;

        });
    }
    $scope.folder = {};
    $scope.returnfolder = {};
    $scope.currentPageReturn = 1;
    $scope.pageSizeReturn = 10;
    $scope.getAllSelected = function() {
        $scope.selectedItems = [];
        angular.forEach($scope.folder, function(key, value) {
            $scope.selectedItems.push(value);
        });
    }

    $scope.getreturnAllSelected = function() {

        $scope.returnselectedItems = [];


        angular.forEach($scope.returnfolder, function(key, value) {
            if (key)
                $scope.returnselectedItems.push(value)
        });
    }
    $scope.currentPageprintasset = 1;
    $scope.pageSizeprintasset = 10;
    ///////////////
    $scope.GetAssetAllocatePrint = function() {
            $scope.CheckingSession();
            $scope.getAllSelected();
            $scope.EmpAssetTittle = "Employee Asset Allocation";
            $scope.Assetmode = "Allocate";
            $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
            if ($scope.selectedItems.length === 0) {

                $scope.Message = true;
                $scope.Message = "Please Select Asset Item";
                $timeout(function() { $scope.Message = ""; }, 3000);
            } else {

                $http({
                    method: 'post',
                    url: "Propertychecklist.php",
                    data: {
                        'Employeeid': $scope.Employeeid,
                        'Listedno': $scope.selectedItems,
                        'Testno': 1,
                        'Method': 'AssetPrint'
                    },
                    headers: { 'Content-Type': 'application/json' }
                }).then(function successCallback(response) {

                    $scope.GetPropertyPageAssetList = response.data.mytbl;
                    $('#ModalCenter1AssetPrint').modal('show');
                });
            }
        }
        /////////////////////////////
    $scope.GetAssetReturnPrint = function() {
            $scope.getreturnAllSelected();
            $scope.EmpAssetTittle = "Employee Asset Return";
            $scope.Titlename = $scope.Employeeid + "-" + "Return";
            $scope.Assetmode = "Allocate";
            if ($scope.returnselectedItems.length === 0) {
                $scope.Message = true;
                $scope.Message = "Please Select Asset Item";
                $timeout(function() { $scope.Message = ""; }, 3000);
            } else {

                $http({
                    method: 'post',
                    url: "Propertychecklist.php",
                    data: {
                        'Employeeid': $scope.Employeeid,
                        'Listedno': $scope.returnselectedItems,
                        'Testno': 1,
                        'Method': 'ReturnAssetPrint'
                    },
                    headers: { 'Content-Type': 'application/json' }
                }).then(function successCallback(response) {
                    $scope.GetPropertyPageAssetList = response.data.mytbl;
                    $('#ModalCenter1AssetPrint').modal('show');
                });
            }
        }
        //////////////////////////////////////

    $(function() {
        $("#btnassetprint").click(function() {

            var HTML_Width = $("#pdfExportAssetprint").width();
            var HTML_Height = $("#pdfExportAssetprint").height();

            var filename = $scope.Titlename;
            var data = document.getElementById('pdfExportAssetprint');
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


                var currentTime = new Date();

                // Format the current time as YYYYMMDDHHmmss
                var formattedTime = currentTime.getFullYear() +
                    ('0' + (currentTime.getMonth() + 1)).slice(-2) +
                    ('0' + currentTime.getDate()).slice(-2) +
                    ('0' + currentTime.getHours()).slice(-2) +
                    ('0' + currentTime.getMinutes()).slice(-2) +
                    ('0' + currentTime.getSeconds()).slice(-2);
                pdf.save(filename + "-" + formattedTime + '.pdf');



                // window.open(pdf.output('bloburl', {
                //     filename: 'new-file.pdf'
                // }), '_blank');
            });

        });
    });
    ///////////////////////////////
    $('#myDiv').hide();
    $('body').on('submit', "#Assuploaddocform", function(e) {
        $scope.CheckingSession();
        e.preventDefault();

        var file = $('#assuploadfile').prop('files')[0];
        if (file == undefined) {

            $('#myDiv').show();
            $('#msgtst').text("Please Choose the file");
            setTimeout(function() {
                $('#msgtst').empty().append("");
                $('#myDiv').hide();
                // $scope.Messagenew = false;
            }, 3000);

            return;
        }




        $('#myDiv').show();
        $('#msgtst').text("Please wait file is processing.........");

        var form_data = new FormData(this);

        $.ajax({
            url: 'UploadAssetDocument.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            dataType: 'json',
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(res) {
                // alert(res.status);
                $('#myDiv').show();
                if (res.status == 'success') {

                    $('#msgtst').text("File Upload Successfully.....");
                    $('#ModalCenterAssetUpload').modal('hide');

                    $("#Assuploaddocform")[0].reset();
                    $scope.DisplayAssetLog();

                }

                if (res.status == 'Note') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Enter the Notes");

                }

                if (res.status == 'NoFile') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Choose the file");

                }


                //alert(response);


                //  $scope.Messagenew = true;



                setTimeout(function() {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            },
            error: function(response) {
                $('#myDiv').show();
                $('#msg1').text("Error in processing.........");
                setTimeout(function() {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            }
        });
    });
    /////////////////////////////////////////
    $scope.Assetupload = function(Mode) {
        var Assettype = Mode;
        if (Mode == 'A') {
            $scope.Assetuploadtitle = "Asset Allocation Document Upload";
        }
        if (Mode == 'R') {
            $scope.Assetuploadtitle = "Asset Return Document Upload";
        }
        var Empid = $scope.Employeeid;
        $('#Empid').val(Empid);
        $('#Assettype').val(Assettype);

        $('#ModalCenterAssetUpload').modal('show');
    }

    $scope.DisplayAssetLog = function() {



        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPASSETLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogList = response.data;


        });

    };
    ///////////////////////
    $scope.GetAssetDoc = function(Assetdocumentpath) {
            $scope.Assetdocumentpath = Assetdocumentpath;
            $('#ModalCenterAssetDocumentView').modal('show');

        }
        //////////////

    $scope.getAllocateStyle = function() {
        return {
            color: 'Darkgreen',
            border: '1px solid green'
        };
    };

    $scope.getStyle = function() {
        return {
            color: 'red',
            border: '1px solid red'
        };
    };

    $scope.getAllocateStyleP = function() {
        return {
            color: 'Darkgreen',
            fontSize: '13px'


        };
    };

    $scope.getStyleP = function() {
        return {
            color: 'red',
            fontSize: '13px'

        };
    };
    ////////////////////


    //var aliasDet = $("<tbody><tr class='bRow'><td class='sno'>1</td><td><select class='form-control assetCategory ' name='assetCategory[]'></select></td><td><select class='form-control assetList ' name='assetList[]'></td><td><input type='text' class='form-control ' name='Assetcode[]'  readonly></td><td><input type='date' class='form-control ' name='Distributedate[]' /></td><td><a class='btn btn-primary text-success addassetdetails' href='#'>+</a><a class='btn btn-danger  removeasset' href='#'>-</a></td></tr></tbody>");
    var aliasDet = $("<tr class='bRow'>" +
        "<td class='sno'>1</td>" +
        "<td><select class='form-control assetCategory' name='assetCategory[]'></select></td>" +
        "<td><select class='form-control assetList' name='assetList[]'></select></td>" +
        "<td><input type='text ' class='form-control assetCode' name='Assetcode[]' readonly></td>" +
        "<td><input type='date' class='form-control Distributedate' name='Distributedate[]' /></td>" +
        "<td>" +
        "<a class=' btn btn-success btn-spacing btn-smaller addassetdetails' href='#'><i class='fa fa-plus'></i></a>" +
        "<a class='btn btn-danger btn-spacing btn-smaller removeasset' href='#'><i class='fa fa-minus'></i></a>" +
        "</td>" +
        "</tr>");
    var today = new Date().toISOString().slice(0, 10);



    $("body").on("click", ".addassetdetails", function() {
        // var aliasDetRow = aliasDet.clone();
        // var tb = $(this).parents("#AddAsset").find("tbody");

        // var sno = tb.find("tr.bRow").length + 1;
        // aliasDetRow.find(".sno").text(sno);
        // aliasDetRow.find(".Distributedate").val(today);



        // var newTableRow = tb.find("tr:last");
        // if(newTableRow.index()==0)
        // {
        //      selectedAssetListIds = [];
        // }




        // var assetCategorySelect = aliasDetRow.find(".assetCategory");
        // populateAssetCategories(assetCategorySelect);
        // tb.append(aliasDetRow);

        var aliasDetRow = aliasDet.clone();
        var tb = $(this).parents("#AddAsset").find("tbody");
        var clickedRow = $(this).closest("tr");

        var totalRows = tb.find("tr.bRow").length;
        var clickedIndex = clickedRow.index();

        // Calculate the sno for the new row
        var sno = totalRows + 1;

        aliasDetRow.find(".sno").text(sno);
        aliasDetRow.find(".Distributedate").val(today);

        var assetCategorySelect = aliasDetRow.find(".assetCategory");
        populateAssetCategories(assetCategorySelect);



        // Insert the new row after the clicked row
        if (clickedIndex >= 0 && clickedIndex < totalRows) {
            tb.find("tr.bRow").eq(clickedIndex).after(aliasDetRow);

            // Update sno values for all rows
            tb.find("tr.bRow").each(function(index, row) {
                $(row).find(".sno").text(index + 1);
            });
        } else {
            // If clickedIndex is not valid, just append the new row to the end
            selectedAssetListIds = [];
            tb.append(aliasDetRow);
        }

    });

    function genSno(row) {
        var tbl = row.parent('tbody').parent('table').attr('id')
        row.remove()
        $('#' + tbl).find('tbody').find('tr').each(function(index, el) {
            $(el).find(".sno").text(index + 1)
        });
        if ($('#' + tbl).find('tbody').find('tr').length == 0) {
            $('#' + tbl).find('tbody').attr('data-added', 'no').html('<tr><td colspan="3">No alias</td></tr>')
        }
    }

    $('body').on("click", ".removeasset", function() {
        var row = $(this).parents('tr');
        var aid = row.find(".sno").val();
        var assetListId = row.find(".assetList").val();

        // Find the index of the assetListId in the array
        var index = selectedAssetListIds.indexOf(assetListId);
        if (index !== -1) {
            // Remove the assetListId from the array
            selectedAssetListIds.splice(index, 1);
        }
        genSno(row);

    });
    var selectedAssetListIds = [];

    function populateAssetCategories(assetCategorySelect) {

        $.ajax({
            url: "Getassetcategory.php",
            type: "POST",
            data: { Asset: '1' },
            success: function(data) {

                assetCategorySelect.html(data);
                assetCategorySelect.val("")
                    // assetCategorySelect.trigger("change");
            }
        });
    }
    //////////////////////
    function populateAssetLists(assetListSelect, assetCategoryId) {
        $.ajax({
            url: "Getassetcategory.php",
            type: "POST",
            data: { Asset: '2', assetCategoryId: assetCategoryId },
            dataType: "json",
            success: function(data) {



                // assetListSelect.html(data);


                assetListSelect.empty(); // Clear previous options
                $.each(data, function(index, asset) {
                    if (selectedAssetListIds.indexOf(asset.Assetlistid) === -1) {
                        assetListSelect.append("<option value='" + asset.Assetlistid + "'>" + asset.Assetname + "</option>");
                    }
                });

                assetListSelect.val("")
                    // assetListSelect.trigger("change");
            }
        });
    }
    /////////////////////
    $("body").on("change", ".assetCategory", function() {


        var assetListSelect = $(this).closest("tr").find(".assetList");
        var assetCategoryId = $(this).val();
        populateAssetLists(assetListSelect, assetCategoryId);


    });
    ////////////////////////////////
    //   $("body").on("change", ".assetCategory", function() {
    //     var assetListSelect = $(this).closest("tr").find(".assetList");
    //     var assetCategoryId = $(this).val();
    //     populateAssetLists(assetListSelect, assetCategoryId);
    //     $(".assetList").each(function() {
    //         $(this).trigger("change");
    //       });
    //   });
    ///////////////////////////////
    $("body").on("change", ".assetList", function() {
        var assetCodeInput = $(this).closest("tr").find(".assetCode");
        var assetCategoryId = $(this).closest("tr").find(".assetCategory").val();
        var assetListId = $(this).val();



        selectedAssetListIds.push(assetListId);
        populateAssetCodes(assetCodeInput, assetCategoryId, assetListId);
    });

    ////////////////////////////////////////////
    function populateAssetCodes(inputElement, assetCategoryId, assetListId) {
        $.ajax({
            url: "Getassetcategory.php",
            type: "POST",
            data: {
                Asset: '3',
                assetCategoryId: assetCategoryId,
                assetListId: assetListId
            },

            success: function(data) {

                // Display the first asset code (you can adjust this based on your requirement)
                data = data.trim();
                inputElement.val(data);

            }
        });
    }
    ////////////////////////////////////
    $("body").on("submit", "#AssetAllocation", function(e) {
        $scope.CheckingSession();
        e.preventDefault();
        var Empid = $scope.Employeeid;
        $('#emplid').val(Empid);
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "SaveProperty.php",
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                $scope.DisplayPropertyChecklist();
                $scope.GetReturnDetails();
                $scope.DisplayAssetLog();
                if (res.status == 'OK') {

                    $("#ModalCenterdynamicAdd").modal('hide');
                    alert('saved successfully');
                    $("#AssetAllocation")[0].reset();
                    $("#AddAsset tbody").empty();
                    var listedno = res.ListedNo;
                    $scope.GetAssetAllocatePrintAuto(listedno, "Employee Asset Allocation");
                } else {
                    alert(res.msg)
                }
            }
        });
    });
    ////////////////////////////
    $scope.currentPageAssetlist = 1;
    $scope.pageSizeAssetlist = 10;

    $scope.GetAssetListlogdetails = function(Asselistid) {
        $scope.Asselistid = Asselistid;
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Assetlistids': $scope.Asselistid,
                'Method': 'EMPLOGLIST'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogvieeeList = response.data.mytbl;


        });

    }



    $scope.GetAssetAllocatePrintAuto = function(Listedno, Title) {

        $scope.testttt = Listedno;
        $scope.EmpAssetTittle = Title;

        //  $scope.EmpAssetTittle = "Employee Asset Allocation";
        $scope.Assetmode = "Allocate";
        $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
        if ($scope.testttt.length === 0) {

            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function() { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.testttt,
                    'Testno': 0,
                    'Method': 'AssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }

    //////////////////////

    $scope.GetAssetReturnPrintAuto = function(Listedno, Title) {

            $scope.testttt = Listedno;
            $scope.EmpAssetTittle = Title;
            $scope.Titlename = $scope.Employeeid + "-" + "Return";
            $scope.Assetmode = "Allocate";


            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.testttt,
                    'Testno': 0,
                    'Method': 'ReturnAssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });

        }
        ///////////////////////////
    $scope.CopyTempAddress = function() {




        $scope.PermanentAddress = $scope.CurrentAddress;
        $scope.PermanentCountry = $scope.CurrentCountry;
        $scope.GetPerstate();
        $scope.PermanentState = $scope.CurrentState;
        $scope.GetPerCity();
        $scope.PermanentCity = $scope.CurrentCity;
        $scope.PermanentPincode = $scope.CurrentPincode;

    }
    $scope.GetAuthorization = function() {
        $http({
            method: "POST",
            url: "Employee.php",
            data: {

                'Method': "FETCHAUTHORIZATION"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Authorizedno = response.data.Authorization;
            // alert(response.data.Authorization);
            $scope.Showmenu($scope.Authorizedno);
        });

    }

    $scope.Showmenu = function(Authorizedno) {
            $scope.Authorizedno = Authorizedno;

            if ($scope.Authorizedno == 13) {

                $scope.userviewrole = 0;
                $scope.fnpropertychecklistinfo();
            } else {
                $scope.userviewrole = 1;
            }
        }
        //////////////////////////////////////////
    $http({
        method: "POST",
        url: "../HRM22/job.php",
        data: { 'Method': 'Maritalstatus' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetMaritalstatusList = response.data;
    });
    //////////////////////////////
    $scope.GETESSLCODE = function() {

        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Old_Empid': $scope.Old_Empid,
                'Method': 'EsslUnique'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);

            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
        });

    };
    $http({
        method: "POST",
        url: "../HRM09/Candidate.php",
        data: { 'Method': 'EDUCATIONMODE' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetEducationModeList = response.data;

    });
    $http({
        method: "POST",
        url: "../HRM09/Candidate.php",
        data: { 'Method': 'SPECIALIZATION' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetSpecializationList = response.data;

    });



    /////////////////////////////////////// DK EDit
    $scope.getperformanceassement = function() {
            $http({
                method: "POST",
                url: "Employee.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'EmpDepartment': $scope.EmpDepartment,
                    'Method': "LEAVECOUNT"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {

                //$scope.test = response.data.test;
                $scope.TotalWorkingdays = response.data.TotalWorkingdays;
                $scope.TotalTakenEL = response.data.TotalTakenEL;
                $scope.TotalLOPdays = response.data.TotalLOPdays;
                $scope.current_year = response.data.current_year;
                $scope.previous_year = response.data.previous_year;
                $scope.ReportToEmpName = response.data.ReportToEmpName;
                //  alert($scope.ReportToEmpName);
            });
        }
        ////////////////////////////////



    ///////////////////////////////
    $http({
        method: "POST",
        url: "../HRM09/Candidate.php",
        data: { 'Method': 'BLOODGROUP' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetBloodGroupList = response.data;
    });
    /////////////////////////
    $scope.GetIFSCexists = function() {

            $scope.CheckingSession();
            $http({
                method: "post",
                url: "Employee.php",
                data: {


                    'IFSCcode': $scope.IFSCcode,



                    'Method': 'BANKIFSC'

                },
                headers: { 'Content-Type': 'application-json' }
            }).then(function successCallback(response) {

                $scope.TempMessage = response.data.Message;
                $scope.TempSave();

            });

        }
        /////////////////
    function frontidcard4() {

        var Empid = $('#Employeeid').val();
        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;


        html2canvas($("#Empfront4")[0], {
            scale: 2,
            useCORS: true, // Enable if the div contains an image from a different domain
        }).then(function(canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empfront.jpg";;
            link.href = image;
            link.click();
            backidcard4();
        });

    }

    function backidcard4() {


        var Empid = $('#Employeeid').val();

        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;




        html2canvas($("#Empback4")[0], {
            scale: 2,
            useCORS: true,
            // Enable if the div contains an image from a different domain
        }).then(function(canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empback.jpg";;
            link.href = image;
            link.click();

        });

    }

=======
var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM10Controller', function ($scope, $http, $timeout, $filter, $location, $window) {

    $scope.Method = "";
    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    $scope.DetailListTemp = "";
    $scope.TempMessage = "";
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
    $scope.AllowPF = "";
    $scope.PF_Fixed = "";
    $scope.Religion = "";
    $scope.CurrentAddress = "";
    $scope.CurrentCountry = "";
    $scope.CurrentState = "";
    $scope.CurrentCity = "";
    $scope.CurrentPincode = "";
    $scope.PermanentAddress = "";
    $scope.PermanentCountry = "";
    $scope.PermanentState = "";
    $scope.PermanentCity = "";
    $scope.PermanentPincode = "";
    $scope.Employeestudied = "";
    $scope.UniversityorSchool = "";
    $scope.GradeorPercentage = "";
    $scope.Passoutyear = "";
    $scope.GetEducationList = "";
    $scope.FamilyName = "";
    $scope.Familyrelationship = "";
    $scope.FamilyAge = "";
    $scope.FamilyContactno = "";
    $scope.FamilyOccupation = "";
    $scope.GetFamilyList = "";
    $scope.Reference1name = "";
    $scope.Reference1contactno = "";
    $scope.Reference1address = "";
    $scope.Reference2name = "";
    $scope.Reference2contactno = "";
    $scope.Reference2address = "";
    $scope.GetAppList = "";
    $scope.Basic = "";
    $scope.HR_Allowance = "";
    $scope.TA = "";
    $scope.Performance_allowance = "";
    $scope.Day_allowance = "";
    $scope.PF = "";
    $scope.ESI = "";
    $scope.TDS = "";
    $scope.Professional_tax = "";
    $scope.Net_Salary = "";
    $scope.Gross_Salary = "";
    $scope.Other_Allowance = "";
    $scope.PF_Yesandno = "";
    $scope.ESI_Yesandno = "";
    $scope.Documenttype = "";
    $scope.Documentno = "";
    $scope.clearinput = "";
    $scope.GetDOCUMENTList = "";
    $scope.clearinput01 = "";
    $scope.Department = "";
    $scope.Designation = "";
    $scope.Period = "";
    $scope.GetPromoList = "";
    $scope.Bankname = "";
    $scope.Accountno = "";
    $scope.IFSCcode = "";
    $scope.Branch = "";
    $scope.btnotherinformation = false;
    $scope.btnaddress = false;
    $scope.btnEducation = false;
    $scope.btnFamily = false;
    $scope.btnReference = false;
    $scope.btnappraisal = false;
    $scope.btnsalary = false;
    $scope.btndoc = false;
    $scope.btnimage = false;
    $scope.btnpromotion = false;
    $scope.btnbank = false;
    $scope.btnvaccination = false;
    $scope.Shift = "";
    $scope.AllowOT = "";
    $scope.AllowLOP = "";
    $scope.Salary_Mode = "";
    $scope.Weekoff = "";
    $scope.Employee_CL = "0";
    $scope.Nationality = "";
    $scope.Empimage = "";
    $scope.currentPageApp = 1;
    $scope.pageSizeApp = 10;
    $scope.currentPageFamily = 1;
    $scope.pageSizeFamily = 10;
    $scope.currentPageEducation = 1;
    $scope.pageSizeEducation = 5;
    $scope.currentPageDoc = 1;
    $scope.pageSizeDoc = 10;
    $scope.currentPageDept = 1;
    $scope.pageSizeDept = 10;
    $scope.btnsave = true;
    $scope.btnupdate = false;
    $scope.selectedValue = "";
    $scope.selected = {};
    $scope.Emppassbook = "";
    $scope.UANno = "";
    $scope.ESIno = "";
    $scope.Aadharno = "";
    $scope.Panno = "";
    $scope.PFJoiningdate = "";
    $scope.ESIJoiningdate = "";
    $scope.OfficemailID = "";

    $scope.VaccinationView = "";
    $scope.Vaccinateddate = "";
    $scope.Covidvaccinated = "";
    $scope.currentPageVaccination = 1;
    $scope.pageSizeVaccination = 5;
    $scope.EmployeeType = "Permanent";
    $scope.EmpDepartment = "";
    $scope.Highestqualification = "";
    $scope.EmpDesignation = "";
    $scope.btnsipltamil = false;
    $scope.btnsiplhindi = false;
    $scope.btnpffixed = false;
    $scope.FatherGuardianSpouseName = "";
    $scope.Category = "Category 3";
    $scope.Married = "Yes";
    $scope.Mothertongue = "Tamil";
    $scope.Nationality = "INDIAN";
    $scope.SalaryType = "Normal";
    $scope.btnverification = false;
    $scope.currentPageNominee = 1;
    $scope.pageSizeNominee = 5;
    $scope.btnNominee = false;
    $scope.btnidcard = false;
    $scope.Basic = 0;
    $scope.HR_Allowance = 0;
    $scope.TA = 0;
    $scope.Performance_allowance = 0;
    $scope.Day_allowance = 0;
    $scope.PF = 0;
    $scope.ESI = 0;
    $scope.TDS = 0;
    $scope.Professional_tax = 0;
    $scope.Net_Salary = 0;
    $scope.Gross_Salary = 0;
    $scope.Other_Allowance = 0;
    $scope.currentPageProperty = 1;
    $scope.pageSizeProperty = 10;
    $scope.Empnameaspassbook = "";
    $scope.OfficemailID = "";


    ///////////////////////

    $http({



        method: "POST",
        url: "Employee.php",
        data: {



            'Method': 'PageSession'
        },
        headers: { 'Content-Type': 'application/json' },


    }).then(function successCallback(response) {


        $scope.PageSession = response.data.Message;
        $scope.CheckingSession();
        //alert($scope.PageSession);
        $scope.PageLoadDept();
        $scope.PageLoadRegion();
        $scope.PageLoadQualifi();
        $scope.PageLoadDest();
        $scope.PageLoadLang();
        $scope.PageLoadCountry();
        $scope.PageLoadALL();
        $scope.PageLoadModuleNext();
        $scope.PageLoadRelationship();
        $scope.PageLoadBACKPENDING();


    });


    ///////////////////////////////
    $scope.Reset = function () {
        $scope.CheckingSession();
        $scope.btnNominee = false;
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
        $scope.Category = "Category 3";
        $scope.Emailid = "";
        $scope.Dob = "";
        $scope.Age = "";
        $scope.Bloodgroup = "";
        $scope.Expereience = "";
        $scope.Fresher = "";
        $scope.AllowPF = "";
        $scope.Religion = "";
        $scope.CurrentAddress = "";
        $scope.CurrentCountry = "";
        $scope.CurrentState = "";
        $scope.CurrentCity = "";
        $scope.CurrentPincode = "";
        $scope.PermanentAddress = "";
        $scope.PermanentCountry = "";
        $scope.PermanentState = "";
        $scope.PermanentCity = "";
        $scope.PermanentPincode = "";
        $scope.Employeestudied = "";
        $scope.UniversityorSchool = "";
        $scope.GradeorPercentage = "";
        $scope.Passoutyear = "";
        $scope.GetEducationList = "";
        $scope.FamilyName = "";
        $scope.Familyrelationship = "";
        $scope.FamilyAge = "";
        $scope.FamilyContactno = "";
        $scope.FamilyOccupation = "";
        $scope.GetFamilyList = "";
        $scope.Reference1name = "";
        $scope.Reference1contactno = "";
        $scope.Reference1address = "";
        $scope.Reference2name = "";
        $scope.Reference2contactno = "";
        $scope.Reference2address = "";
        $scope.GetAppList = "";
        $scope.Basic = "";
        $scope.HR_Allowance = "";
        $scope.TA = "";
        $scope.Performance_allowance = "";
        $scope.Day_allowance = "";
        $scope.PF = "";
        $scope.ESI = "";
        $scope.TDS = "";
        $scope.Professional_tax = "";
        $scope.Net_Salary = "";
        $scope.Gross_Salary = "";
        $scope.Other_Allowance = "";
        $scope.PF_Yesandno = "";
        $scope.ESI_Yesandno = "";
        $scope.Documenttype = "";
        $scope.Documentno = "";
        $scope.clearinput = "";
        $scope.GetDOCUMENTList = "";
        $scope.clearinput01 = "";
        $scope.Department = "";
        $scope.Designation = "";
        $scope.Period = "";
        $scope.GetPromoList = "";
        $scope.Bankname = "";
        $scope.Accountno = "";
        $scope.IFSCcode = "";
        $scope.Branch = "";
        $scope.Shift = "";
        $scope.AllowOT = "";
        $scope.AllowLOP = "";
        $scope.Salary_Mode = "";
        $scope.Weekoff = "";
        $scope.Employee_CL = "0";
        $scope.Nationality = "";
        $scope.Empimage = "";
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnpffixed = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnvaccination = false;
        $scope.btnbank = false;
        $scope.btnsave = true;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnpffixed = false;
        $scope.selectedValue = "";
        $scope.selected = {};
        $scope.btnupdate = false;
        $scope.Emppassbook = "";
        $scope.UANno = "";
        $scope.ESIno = "";
        $scope.Aadharno = "";
        $scope.Panno = "";
        $scope.PFJoiningdate = "";
        $scope.ESIJoiningdate = "";
        $scope.VaccinationView = "";
        $scope.Vaccinateddate = "";
        $scope.Covidvaccinated = "";
        $scope.EmployeeType = "Permanent";
        $scope.EmpDepartment = "";
        $scope.Highestqualification = "";
        $scope.EmpDesignation = "";
        document.getElementById("fileInput03").value = '';
        $scope.Getnextno();
        $scope.FatherGuardianSpouseName = "";
        $scope.Category = "Category 3";
        $scope.Married = "Yes";
        $scope.Mothertongue = "Tamil";
        $scope.Nationality = "INDIAN";
        $scope.SalaryType = "Normal";
        $scope.btnverification = false;
        $scope.currentPageNominee = 1;
        $scope.pageSizeNominee = 5;
        $scope.btnidcard = false;
        $scope.Basic = 0;
        $scope.HR_Allowance = 0;
        $scope.TA = 0;
        $scope.Performance_allowance = 0;
        $scope.Day_allowance = 0;
        $scope.PF = 0;
        $scope.ESI = 0;
        $scope.TDS = 0;
        $scope.Professional_tax = 0;
        $scope.Net_Salary = 0;
        $scope.Gross_Salary = 0;
        $scope.Other_Allowance = 0;
        $scope.OfficemailID = "";
        $scope.Empnameaspassbook = "";
    }

    $scope.TempSave = function () {

        if ($scope.TempMessage == "MailYes") {
            $scope.Message = true;
            $scope.Message = "This Mail ID Already Exists...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.Emailid = "";


        }

        if ($scope.TempMessage == "NOTUNIQUE") {
            $scope.Message = true;
            $scope.Message = "This Id Already Exists...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.Old_Empid = "";

        }
        if ($scope.TempMessage == "ContactYes") {
            $scope.Message = true;
            $scope.Message = "This Mobile No Already Exists...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.Contactno = "";


        }
        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Please Enter Detail";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "ADMINRIGHTS") {
            $scope.Message = true;
            $scope.Message = "Admin only can Update Salary Details";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }



        if ($scope.TempMessage == "PercentageHigh") {
            $scope.Message = true;
            $scope.Message = "Percentage is High than available Percentage ";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.PercentageofShare = 0;
        }
        if ($scope.TempMessage == "FNAME") {
            $scope.Message = true;
            $scope.Message = "Please Enter First Name";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Contact") {
            $scope.Message = true;
            $scope.Message = "Please Enter Contact No";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Quali") {
            $scope.Message = true;
            $scope.Message = "Please Select Qualification";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Please Enter Detail";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "Exists") {
            $scope.Message = true;
            $scope.Message = "Data Updated Sucessfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Data Updated Successfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "DH_Decline") {
            $scope.Message = true;
            $scope.Message = "Please Enter Rejected Reason...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Studied") {
            $scope.Message = true;
            $scope.Message = "Please Enter Studied Details...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Accountno") {
            $scope.Message = true;
            $scope.Message = "Please Enter Account no...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Bankname") {
            $scope.Message = true;
            $scope.Message = "Please Enter Bank Name...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Familyname") {
            $scope.Message = true;
            $scope.Message = "Please Enter  Name...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Basic") {
            $scope.Message = true;
            $scope.Message = "Please Enter  Basic...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }

        if ($scope.TempMessage == "Emailid") {
            $scope.Message = true;
            $scope.Message = "Please Enter  EmailID...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Category") {
            $scope.Message = true;
            $scope.Message = "Please Select Employee Working Category...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }


        if ($scope.TempMessage == "Department") {
            $scope.Message = true;
            $scope.Message = "Please Select Employee Department...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }

        if ($scope.TempMessage == "Familyrelationship") {
            $scope.Message = true;
            $scope.Message = "Please Selecte Relationship Detail...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Status") {
            $scope.Message = true;
            $scope.Message = "Please Select Status...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Department") {
            $scope.Message = true;
            $scope.Message = "Please Select Department...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Designation") {
            $scope.Message = true;
            $scope.Message = "Please Select Designation...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Relievingreason") {
            $scope.Message = true;
            $scope.Message = "Please Enter Relieving Reason...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "RelievingDate") {
            $scope.Message = true;
            $scope.Message = "Please Enter Relieving Date...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully...";
            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.Employeeid = $scope.Tempnextno;
            $scope.btnsave = false;
            $scope.btnupdate = true;
            $scope.Emailverification01();

            // $scope.FetchEmployee($scope.Employeeid);
        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully";
            $timeout(function () { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Deactive") {
            $scope.Message = true;
            $scope.Message = "Employee  Deactived Successfully";
            $timeout(function () { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "PercentageofShare") {
            $scope.Message = true;
            $scope.Message = "Please Enter Amonut to be Share";
            $timeout(function () { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "NomineeAddress") {
            $scope.Message = true;
            $scope.Message = "Please Enter Nominee Address";
            $timeout(function () { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "NomineeRelationship") {
            $scope.Message = true;
            $scope.Message = "Please Select Relationship Details";
            $timeout(function () { $scope.Message = ""; }, 3000);


        }



        if ($scope.TempMessage == "Error") {
            $scope.Message = true;
            $scope.Message = "Error in Saving/Updating ...";
            $timeout(function () { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "NomineeName") {
            $scope.Message = true;
            $scope.Message = "Please Enter Nominee Name";
            $timeout(function () { $scope.Message = ""; }, 3000);
        }
        if ($scope.TempMessage == "AssetDetails") {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Details...";
            $timeout(function () { $scope.Message = ""; }, 3000);

        }
        if ($scope.TempMessage == "NVerified") {
            $scope.bkMessage = true;
            $scope.BankMessage = "Not Verified";


        }
        if ($scope.TempMessage == "IFSCVerified") {
            $scope.bkMessage = true;
            $scope.BankMessage = "IFSC Code Verified";


        }

        if ($scope.TempMessage == "NotValid") {
            $scope.bkMessage = true;
            $scope.BankMessage = "IFSC Code Not Valid";


        }




    }
    //////////////////////////////////

    $scope.SendEdit02 = function (Employeeid) {

        $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $scope.Authorizationcheck();

        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.GetAuthorization();
        $scope.FetchTamilhindidocument();
        $scope.FetchEmployee($scope.Employeeid);
        $('#myCarousel').carousel(1);
        // if ($scope.Authorizedno == "1") {
        //     $('#myCarousel').carousel(1);
        // } else {
        //     $('#ModalEditingReason').modal('show');
        //     $scope.EditrightsNextno();
        // }




        //   $('#myCarousel').carousel(1);


    }
    $scope.SendEdit = function (Employeeid) {
        $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $scope.FetchTamilhindidocument();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.GetReturnDetails();
        $scope.folder = {};
        $scope.FetchEmployee($scope.Employeeid);

        // $('#ModalEditingReason').modal('show');
        //$scope.EditrightsNextno();
        $('#myCarousel').carousel(1);


    }



    ////////////////////////////////

    /////////////////////////////////////////////////////////
    $scope.fnotherinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = true;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;


    }
    //////////////////////////////////////////////
    $scope.fneducationinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = true;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.ResetEducation();
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;

    }
    ///////////////////////////////////////////////
    $scope.fnbankinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = true;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;


    }
    ////////////////////////////////////////////////////////
    $scope.fnfamilyinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = true;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.ResetFamily();
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;


    }
    ///////////////////////////////////////////////////////
    $scope.fnrefinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = true;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;


    }
    //////////////////////////////////////////////////////
    $scope.fnsalaryinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = true;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;


    }
    ///////////////////////////////////////////////////
    $scope.fndocinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = true;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.Resetdoc();
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;


    }
    ////////////////////////////////////////////
    $scope.fnimageinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = true;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;

    }
    /////////////////////////////////////
    $scope.fnappraisalinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = true;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;


    }
    /////////////////////////////////////////////////////
    $scope.fnpromotioninfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = true;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.ResetPromotion();
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;


    }

    /////////////////////////
    $scope.fnaddressinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = true;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;


    }


    ///////////////////////////////////////////
    $scope.fnvaccinationinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = true;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.ResetVaccination();
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;
    }
    //////////////////////////////
    ///////////////////////////////////////////
    $scope.fnsiplTamil = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = true;
        $scope.btnsiplhindi = false;
        $scope.FetchEmployee($scope.Employeeid);
        $scope.FetchEmpNominee2($scope.Employeeid);
        $scope.DisplayEmpFamily();
        $scope.DisplayEmpNominee();
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;

    }
    ////////////////////////////////////

    $scope.fnidcardinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.GetEmergencyContact();
        $scope.FetchEmployee($scope.Employeeid);
        $scope.btnNominee = false;
        $scope.btnidcard = true;
        $scope.btnPropertyChecklist = false;

    }
    ////////////////////////////////////
    $scope.fnNomineeinfo = function () {
        $scope.CheckingSession();
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnNominee = true;
        $scope.ResetNomineeFamily();
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;
        //$scope.btnsiplhindi = false;
        //$scope.FetchEmployee($scope.Employeeid);
    }
    /////////////////////////////////
    $scope.fnsiplhindi = function () {
        // $scope.CheckingSession();

        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = true;
        $scope.btnPropertyChecklist = false;
        $scope.btnidcard = false;

    }


    $scope.fnpropertychecklistinfo = function () {
        $scope.CheckingSession();

        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnPropertyChecklist = true;
        $scope.btnidcard = false;
        $scope.Resetpropertychecklist();
        $scope.GetReturnDetails();

    }
    /////////////////////////////////////
    $scope.GetAdminCategory = function (Category) {
        $scope.btnMarketing = true;
        $scope.Category = Category;

        if ($scope.Clientid == 4) {
            $scope.btnMarketing = false;
        }

        if ($scope.Clientid != "4") {
            if ($scope.Category == "Category 3") {
                $scope.AllowOT = "Yes";
            } else {
                $scope.AllowOT = "No";
            }
            if ($scope.Category == "Category 2") {
                $scope.btnMarketing = false;
            }
            // $http({
            //     method: "post",
            //     url: "Employee.php",
            //     data: {
            //         'Employeeid': $scope.Employeeid,
            //         'Category': $scope.Category,
            //         'AllowOT': $scope.AllowOT,


            //         'Method': 'UpdateCATEGORYOT'

            //     },
            //     headers: { 'Content-Type': 'application-json' }
            // }).then(function successCallback(response) {


            // });
        }

    }

    $scope.GetNextnoByCategory = function (Category, EmpDepartment) {
        //   $scope.CheckingSession();
        $scope.Category = Category;
        $scope.EmpDepartment = EmpDepartment;
        $scope.GetAdminCategory($scope.Category);
        $scope.Getnextno();

    }


    $scope.GetPFFixed = function (PF_Yesandno) {
        $scope.PF_Yesandno = PF_Yesandno;
        if ($scope.PF_Yesandno == "Yes") {
            $scope.btnpffixed = true;
        } else {
            $scope.btnpffixed = false;
        }
    }


    $scope.GetAllowPF = function (PF_Yesandno) {
        $scope.PF_Yesandno = PF_Yesandno;
        if ($scope.PF_Yesandno == "Yes") {
            $scope.btnpfno = true;
        } else {
            $scope.btnpfno = false;
        }
    }
    $scope.GetAllowESI = function (ESI_Yesandno) {
        $scope.ESI_Yesandno = ESI_Yesandno;
        if ($scope.ESI_Yesandno == "Yes") {
            $scope.btnesino = true;
        } else {
            $scope.btnesino = false;
        }
    }
    ////////////////////////////
    $scope.FetchEmployee = function (Employeeid) {
        // $scope.CheckingSession();
        $scope.selectedValue = [];
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchEmployee"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Title = response.data.Title;
            $scope.Firstname = response.data.Firstname;
            $scope.Lastname = response.data.Lastname;
            $scope.Gender = response.data.Gender;
            $scope.Fresher = response.data.Fresher;
            $scope.Expereience = response.data.Expereience;
            $scope.Married = response.data.Married;
            $scope.Mothertongue = response.data.Mothertongue;
            $scope.Contactno = response.data.Contactno;
            $scope.Category = response.data.Category;
            $scope.Emailid = response.data.Emailid;
            $scope.Dob = response.data.Dob;
            $scope.Dob2 = response.data.Dob2;
            $scope.Age = response.data.Age;
            $scope.Bloodgroup = response.data.Bloodgroup;
            $scope.Shift = response.data.Shift;
            $scope.AllowOT = response.data.AllowOT;
            $scope.AllowLOP = response.data.AllowLOP;
            $scope.Salary_Mode = response.data.Salary_Mode;
            $scope.Weekoff = response.data.Weekoff;
            $scope.Employee_CL = response.data.Employee_CL;
            $scope.Nationality = response.data.Nationality;
            $scope.Religion = response.data.Religion;
            $scope.Imagepath = response.data.Imagepath;
            $scope.Languages = response.data.Languages;
            $scope.Languagestest = response.data.Languages;
            $scope.selectedValue = response.data.Languages;
            $scope.UANno = response.data.UANno;
            $scope.ESIno = response.data.ESIno;
            $scope.Aadharno = response.data.Aadharno;
            $scope.Panno = response.data.Panno;
            $scope.PFJoiningdate = response.data.PFJoiningdate;
            $scope.ESIJoiningdate = response.data.ESIJoiningdate;
            $scope.Date_Of_Joing = response.data.Date_Of_Joing;
            $scope.Date_Of_Joing2 = response.data.Date_Of_Joing2;

            $scope.EmpDepartment = response.data.EmpDepartment;
            $scope.Highestqualification = response.data.Highestqualification;
            $scope.EmpDesignation = response.data.EmpDesignation;
            $scope.FatherGuardianSpouseName = response.data.FatherGuardianSpouseName;
            $scope.LastAppresialDate = response.data.LastAppresialDate;
            $scope.LastAppresialDate2 = response.data.LastAppresialDate2;
            $scope.BackgroundVerificationpath = response.data.BackgroundVerificationpath;
            $scope.BackgroundVerification = response.data.BackgroundVerification;
            $scope.PF_Yesandno = response.data.PF_Yesandno;
            $scope.PF_Fixed = response.data.PF_Fixed;
            $scope.OfficemailID = response.data.OfficemailID;
            $scope.Smsverified = response.data.Smsverified;
            $scope.Emailverified = response.data.Emailverified;
            $scope.Old_Empid = response.data.Old_Empid;
            $scope.GetEmergencyContact();
            $scope.GetAdminCategory($scope.Category);

            $scope.Splitlanguages($scope.selectedValue);

            $scope.GetPFFixed($scope.PF_Yesandno);





        });

        $scope.ResetVaccination();
        $scope.FetchSalary($scope.Employeeid);
        //  $scope.CheckingBackgroundverification($scope.Gross_Salary);
        $scope.FetchAddress($scope.Employeeid);
        $scope.FetchBank($scope.Employeeid);
        $scope.FetchReference($scope.Employeeid);
        $scope.DisplayEmpAppraisal();
        $scope.DisplayEmpDocument();
        $scope.DisplayEmpEducation();
        $scope.DisplayEmpFamily();
        $scope.DisplayEmpPromotion();
        $scope.ResetEducation();
        $scope.ResetFamily();
        $scope.ResetPromotion();
        $scope.Resetdoc();

        // $scope.FetchCovidvaccination();


    }
    //////////////////////////////////////
    $scope.Splitlanguages = function (selectedValue) {
        $scope.selectedValue = selectedValue;
        if ($scope.selectedValue == "") {
            $scope.selectedValue = [];
        } else {
            $scope.selectedValue = $scope.selectedValue.split(',');
        }
        $scope.selected = {};
        angular.forEach($scope.selectedValue, function (val, key) {
            var r = $filter('filter')($scope.GetLanguageList, { Languages: val })[0].Languages;
            if (r != undefined) {
                $scope.selected[r] = true;
            } else {
                $scope.selected[r] = false;
            }


        });
    }










    //////////////////////
    $scope.CheckingBackgroundverification = function (Gross_Salary) {

        $scope.Gross_Salary = Gross_Salary;

        // alert($scope.Gross_Salary);

        if ($scope.Gross_Salary > 30000) {
            $scope.btnverification = true;
        } else {
            $scope.btnverification = false;
        }
    }

    ///////////////////////////////////////////
    $scope.FetchAddress = function (Employeeid) {
        //  $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
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
    ///////////////////////////////////////
    $scope.FetchReference = function (Employeeid) {
        //  $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchReference"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Reference1name = response.data.Reference1name;
            $scope.Reference1contactno = response.data.Reference1contactno;
            $scope.Reference1address = response.data.Reference1address;
            $scope.Reference2name = response.data.Reference2name;
            $scope.Reference2contactno = response.data.Reference2contactno;
            $scope.Reference2address = response.data.Reference2address;
            $scope.Ref2relationship = response.data.Ref2relationship;
            $scope.Ref1relationship = response.data.Ref1relationship;

        });
    }

    ///////////////////////////////////////////
    $scope.FetchSalary = function (Employeeid) {
        //  $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchSalary"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Basic = response.data.Basic;
            $scope.HR_Allowance = response.data.HR_Allowance;
            $scope.TA = response.data.TA;
            $scope.Performance_allowance = response.data.Performance_allowance;
            $scope.Day_allowance = response.data.Day_allowance;
            $scope.PF = response.data.PF;
            $scope.ESI = response.data.ESI;
            $scope.TDS = response.data.TDS;
            $scope.Professional_tax = response.data.Professional_tax;
            $scope.Net_Salary = response.data.Net_Salary;
            $scope.Gross_Salary = response.data.Gross_Salary;
            $scope.Other_Allowance = response.data.Other_Allowance;
            $scope.PF_Yesandno = response.data.PF_Yesandno;
            $scope.ESI_Yesandno = response.data.ESI_Yesandno;
            $scope.LWF = response.data.LWF;
            $scope.ESIOverlimit = response.data.ESIOverlimit;
            $scope.Authorizedno = response.data.Authorizedno;
            $scope.DayallowanceincludedESI = response.data.DayallowanceincludedESI;
            $scope.CheckingBackgroundverification($scope.Gross_Salary);
            $scope.GetPFFixed($scope.PF_Yesandno);
            $scope.CheckEsiOverLimit($scope.ESI_Yesandno);
        });
    }

    ///////////////////////////////////////////
    $scope.CheckEsiOverLimit = function (ESI_Yesandno) {
        $scope.ESI_Yesandno = ESI_Yesandno;

        if ($scope.ESI_Yesandno == "Yes") {

            $scope.btnESIOVERLIMIT = false;
        }
        else {
            $scope.btnESIOVERLIMIT = true;
        }

    }
    ////////////////////////////////////
    $scope.FetchBank = function (Employeeid) {
        //  $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchBank"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {


            $scope.Bankname = response.data.Bankname;
            $scope.Accountno = response.data.Accountno;
            $scope.IFSCcode = response.data.IFSCcode;
            $scope.Branch = response.data.Branch;
            $scope.Emppassbook = response.data.Emppassbook;
            $scope.Empnameaspassbook = response.data.Empnameaspassbook;
            $scope.GetIFSCexists();
        });
    }
    ///////////////////////////////////////////////

    ///////////////////////////////////////////
    $scope.FetchStudy = function (Employeeid, Sno) {
        $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $scope.EduNextno = Sno;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.EduNextno,
                'Method': "FetchStudy"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Employeestudied = response.data.Employeestudied;
            $scope.UniversityorSchool = response.data.UniversityorSchool;
            $scope.GradeorPercentage = response.data.GradeorPercentage;
            $scope.Passoutyear = response.data.Passoutyear;
            $scope.EmpDocumentView = response.data.EmpDocumentView;

        });
    }
    /////////////////////////////////////////
    ///////////////////////////////////////////
    $scope.FetchFamily = function (Employeeid, Sno) {
        $scope.CheckingSession();

        $scope.Employeeid = Employeeid;
        $scope.FamilyNextno = Sno;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.FamilyNextno,
                'Method': "FetchFamily"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.FamilyName = response.data.FamilyName;
            $scope.Familyrelationship = response.data.Familyrelationship
            $scope.FamilyAge = response.data.FamilyAge;
            $scope.FamilyContactno = response.data.FamilyContactno;
            $scope.FamilyOccupation = response.data.FamilyOccupation;

        });
    }
    ///////////////////////////////////////////
    ///////////////////////////////////////////
    // $scope.FetchDoc = function(Employeeid) {
    //    // $scope.CheckingSession();
    //         $scope.Employeeid = Employeeid;
    //         $http({
    //             method: "POST",
    //             url: "Employee.php",
    //             data: {
    //                 'Employeeid': $scope.Employeeid,
    //                 'Method': "FetchDoc"
    //             },
    //             headers: { 'Content_Type': 'application/json' }
    //         }).then(function successCallback(response) {

    //             $scope.Documenttype = response.data.Documenttype;
    //             $scope.Documentno = response.data.Documentno;
    //             $scope.clearinput = response.data.clearinput;

    //         });
    //     }
    //////////////////////////////////////////////
    $scope.Getuncheck = function () {
        $scope.t1 = false;
    }

    ////////////////////////////

    $scope.SaveEmployee = function () {
        $scope.CheckingSession();

        $scope.btnsaveadmin = true;
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Nationality': $scope.Nationality,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'EmployeeType': $scope.EmployeeType,
                'Department': $scope.EmpDepartment,
                'Highestqualification': $scope.Highestqualification,
                'Designation': $scope.EmpDesignation,
                'FatherGuardianSpouseName': $scope.FatherGuardianSpouseName,
                //  'City': $scope.City,
                'Method': 'Save'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.btnsaveadmin = false;

            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };

    ////////////////////////////////////////////

    $scope.Getallvalues = function () {

        // dk edit starts 
        $scope.btnotherinformation = false;
        $scope.btnaddress = false;
        $scope.btnEducation = false;
        $scope.btnFamily = false;
        $scope.btnReference = false;
        $scope.btnappraisal = false;
        $scope.btnsalary = false;
        $scope.btndoc = false;
        $scope.btnimage = false;
        $scope.btnpromotion = false;
        $scope.btnbank = false;
        $scope.btnvaccination = false;
        $scope.btnsipltamil = false;
        $scope.btnsiplhindi = false;
        $scope.btnNominee = false;
        $scope.btnidcard = false;
        $scope.btnPropertyChecklist = false;
        // dk edit ends

        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeList = response.data;
        });
    };
    /////////////////////////////////////////////////////////
    $scope.Deletenew = function () {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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

    $scope.PageLoadDept = function () {

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Dept' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetDepartmentList = response.data;
            $scope.GetAdminCategory($scope.Category);

        });

    }
    $scope.PageLoadRegion = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Religion' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetReligionList = response.data;

        });
    }

    $scope.PageLoadQualifi = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Qualifi' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetQualififcationList = response.data;

        });
    }

    $scope.PageLoadDest = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Dest' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetDesignationList = response.data;

        });
    }

    //////////////////////////////////////////////


    $scope.PageLoadLang = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Lang' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetLanguageList = response.data;

        });
    }

    /////////////////////////////////////////////

    /////////////////////////////////////////////
    $scope.PageLoadCountry = function () {

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Country' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetCountryList = response.data;

        });
    }

    $scope.PageLoadALL = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'ALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetEmployeeList = response.data;

        });
    }



    ///////////////////////////////////////////////////

    /////////////////////////////////////
    $scope.PageLoadModuleNext = function () {

        $http(

            {

                method: "POST",
                url: "Employee.php",
                data: {
                    'Category': $scope.Category,
                    'EmpDepartment': $scope.EmpDepartment,
                    'Method': 'ModuleNext'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //////// alert(response.data);
                $scope.Employeeid = response.data.Employeeidvarchar;
                $scope.EmpAutoGenerate = response.data.EmpAutoGenerate;


            });
    }

    $scope.Getnextno = function () {
        //$scope.CheckingSession();
        $http(

            {

                method: "POST",
                url: "Employee.php",
                data: {
                    'Category': $scope.Category,
                    'EmpDepartment': $scope.EmpDepartment,
                    'Method': 'ModuleNext'
                },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {

                //////// alert(response.data);
                $scope.Employeeid = response.data.Employeeidvarchar;
                $scope.EmpAutoGenerate = response.data.EmpAutoGenerate;
                $scope.CategoryAutoGeneratno = response.data.CategoryAutoGeneratno;

            });
    }
    $scope.Languageselection = [];
    $scope.albumNameArray = [];
    ////////////////////////////////////////////////
    $scope.getcheckvaluefun = function () {
        $scope.Languageselection = [];
        $scope.albumNameArray = [];

        angular.forEach($scope.selected, function (key, value) {
            if (key)
                $scope.albumNameArray.push(value)

        });

    };

    ////////////////////////////////////////
    $scope.Update_Other_info = function () {

        $scope.getcheckvaluefun();
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Dob': $scope.Dob,
                'Age': $scope.Age,
                'Bloodgroup': $scope.Bloodgroup,
                'Expereience': $scope.Expereience,
                'Fresher': $scope.Fresher,
                'Shift': $scope.Shift,
                'AllowOT': $scope.AllowOT,
                'AllowLOP': $scope.AllowLOP,
                'Salary_Mode': $scope.Salary_Mode,
                'Weekoff': $scope.Weekoff,
                'Employee_CL': $scope.Employee_CL,
                'UANno': $scope.UANno,
                'ESIno': $scope.ESIno,
                'Aadharno': $scope.Aadharno,
                'Panno': $scope.Panno,
                'PFJoiningdate': $scope.PFJoiningdate,
                'ESIJoiningdate': $scope.ESIJoiningdate,
                'Date_Of_Joing': $scope.Date_Of_Joing,
                'BackgroundVerification': $scope.BackgroundVerification,
                'Languages': $scope.albumNameArray,
                'OfficemailID': $scope.OfficemailID,
                'Old_Empid': $scope.Old_Empid,

                'Method': 'UpdatOtherInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
           // $scope.SuperUserMail();
        });

    };
    /////////////////////////////////////
    $scope.Update_Previous_info = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Candidateid': $scope.Candidateid,
                'Previoussainmarksemployee': $scope.Previoussainmarksemployee,
                'PreviousDesignation': $scope.PreviousDesignation,
                'PreviousDepartment': $scope.PreviousDepartment,
                'Workingperiod': $scope.Workingperiod,
                'Releivingreason': $scope.Releivingreason,

                'Method': 'UpdatPreviousInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ////////////////////////////////////////////
    $scope.Update_Present_info = function () {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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

                'Method': 'UpdatPresentInfo'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ///////////////////////////////////////////////////////
    $scope.UpdateBank = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Bankname': $scope.Bankname,
                'Accountno': $scope.Accountno,
                'IFSCcode': $scope.IFSCcode,
                'Branch': $scope.Branch,
                'Empnameaspassbook': $scope.Empnameaspassbook,

                'Method': 'BankEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
            $scope.SuperUserBankAccountsMail();
        });

    };
    ///////////////////////////////////////////////////

    $scope.Update_Approval = function () {
        //  $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
        });

    };
    //////////////////////////////////////////////////////
    $scope.Update_DOJ_info = function () {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
            $scope.UserLoginDestroy();
        });

    };
    /////////////////////////////////////////////

    $scope.UpdateCandidate = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
                'Method': 'Update'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////
    $scope.Getage = function () {
        //  $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Dob': $scope.Dob,



                'Method': 'GetAge'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Age = response.data.Age;

            // $scope.DetailListTemp = response.data.mytbl;



        });

    };
    //////////////////////////////////////////////////////

    $scope.DisplayEmpEducation = function () {
        //   $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPEDUCATION' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEducationList = response.data;
        });
    };
    ///////////////////////////////////////////////
    $scope.DisplayEmpFamily = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPFAMILY' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetFamilyList = response.data.data01;

        });

    };
    ///////////////////////////////////
    $scope.DisplayEmpAppraisal = function () {
        // $scope.CheckingSession();
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPAPPRAISAL' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetAppList = response.data.data01;

        });

    };
    ///////////////////////////////////////////////
    $scope.DisplayEmpPromotion = function () {
        //   $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPromotion' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetPromoList = response.data.data01;

        });

    };
    ////////////////////////////////

    $scope.DisplayEmpDocument = function () {
        //  $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPDOC' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.GetDOCUMENTList = response.data.data01;

        });

    };
    //////////////////////////////////
    $scope.Resetdoc = function () {
        $scope.CheckingSession();
        $scope.EmpDocNextno();
        $scope.DisplayEmpDocument();
        $scope.Documenttype = "";
        $scope.Documentno = "";
        $scope.clearinput = "";
        $scope.GetDOCUMENTList = ""

    }
    /////////////////////////
    $scope.EmpDocNextno = function () {
        //    $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPDOCNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.DocNextno = response.data.Sno;
            //   alert($Scope.DocNextno);

        });
    }
    /////////////////////////////////////////////////
    $scope.EmpFamilyNextno = function () {
        //   $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPFAMILYNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.FamilyNextno = response.data.Sno;

        });
    }
    /////////////////////////////////
    $scope.EmpPromotionNextno = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROMOTIONNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.PromotionNextno = response.data.Sno;

        });
    }
    ////////////////////////////////////////////////////////////
    $scope.EmpEduNextno = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPEDUNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.EduNextno = response.data.Sno;

        });
    }
    //////////////////////////////////////////////////////////////////////
    $scope.ResetEducation = function () {
        $scope.CheckingSession();

        $scope.Employeestudied = "";
        $scope.UniversityorSchool = "";
        $scope.GradeorPercentage = "";
        $scope.Passoutyear = "";
        $scope.DisplayEmpEducation();
        $scope.EmpEduNextno();
    }
    ////////////////////////////////
    $scope.ResetFamily = function () {
        $scope.CheckingSession();

        $scope.FamilyName = "";
        $scope.Familyrelationship = "";
        $scope.FamilyAge = "";
        $scope.FamilyContactno = "";
        $scope.FamilyOccupation = "";
        $scope.DisplayEmpFamily();
        $scope.EmpFamilyNextno();
    }
    /////////////////////////////////////
    $scope.ResetPromotion = function () {
        $scope.CheckingSession();
        $scope.Department = "";
        $scope.Designation = "";
        $scope.Period = "";
        $scope.Postingdays = "";
        $scope.Postingyear = "";
        $scope.Postingmonth = "";
        $scope.Postingyear = "";
        $scope.Fromperiod = "";
        $scope.Toperiod = "";
        $scope.DisplayEmpPromotion();
        $scope.EmpPromotionNextno();
    }
    ///////////////////////////////////
    $scope.GetCurrentState = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'CurrentCountry': $scope.CurrentCountry, 'Method': 'CSTATE' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {



            $scope.GetStateList = response.data.data01;


        });

    };
    //////////////////////////////
    $scope.GetCurrentCity = function () {
        //  $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
    $scope.GetPerstate = function () {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: { 'PermanentCountry': $scope.PermanentCountry, 'Method': 'PERSTATE' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {



            $scope.GetPerStateList = response.data.data01;


        });

    };
    //////////////////////////////////////////////////
    $scope.GetPerCity = function () {
        //   $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
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
    $scope.UpdateAddress = function () {
        $scope.CheckingSession();

        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
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
            $scope.UserLoginDestroy();
            $scope.SuperUserAddressMail();
        });

    };
    ////////////////////////////////////////////////////
    $scope.Update_Education = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'EduNextno': $scope.EduNextno,
                'Employeestudied': $scope.Employeestudied,
                'UniversityorSchool': $scope.UniversityorSchool,
                'GradeorPercentage': $scope.GradeorPercentage,
                'EducationMode': $scope.EducationMode,
                'Specialization': $scope.Specialization,
                'Passoutyear': $scope.Passoutyear,


                'Method': 'EDUCATIONEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            $scope.UserLoginDestroy();
            // $scope.DetailListTemp = response.data.mytbl;



        });
        $scope.TempSave();
        $scope.DisplayEmpEducation();
    };
    ///////////////////////////////////////////
    $scope.Update_Family = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'FamilyNextno': $scope.FamilyNextno,
                'FamilyName': $scope.FamilyName,
                'Familyrelationship': $scope.Familyrelationship,
                'FamilyAge': $scope.FamilyAge,
                'FamilyContactno': $scope.FamilyContactno,
                'FamilyOccupation': $scope.FamilyOccupation,


                'Method': 'FAMILYUPDATEEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;


            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });
        $scope.DisplayEmpFamily();
    };
    /////////////////////////////////////////////
    $scope.Update_refrence = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Reference1name': $scope.Reference1name,
                'Reference1contactno': $scope.Reference1contactno,
                'Reference1address': $scope.Reference1address,
                'Reference2name': $scope.Reference2name,
                'Reference2contactno': $scope.Reference2contactno,
                'Reference2address': $scope.Reference2address,
                'Ref1relationship': $scope.Ref1relationship,
                'Ref2relationship': $scope.Ref2relationship,
                // 'PermanentCountry': $scope.PermanentCountry,
                // 'PermanentState': $scope.PermanentState,
                // 'PermanentCity': $scope.PermanentCity,
                // 'PermanentPincode': $scope.PermanentPincode,


                'Method': 'REFEMPUPDATE'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
            $scope.SuperUserEmpRefrenceMail();
        });

    };
    ////////////////////////////////////////
    $scope.Update_Salary = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Basic': $scope.Basic,
                'HR_Allowance': $scope.HR_Allowance,
                'TA': $scope.TA,
                'Performance_allowance': $scope.Performance_allowance,
                'Day_allowance': $scope.Day_allowance,
                'PF': $scope.PF,
                'ESI': $scope.ESI,
                'TDS': $scope.TDS,
                'Professional_tax': $scope.Professional_tax,
                'Net_Salary': $scope.Net_Salary,
                'Gross_Salary': $scope.Gross_Salary,
                'Other_Allowance': $scope.Other_Allowance,
                'PF_Yesandno': $scope.PF_Yesandno,
                'PF_Fixed': $scope.PF_Fixed,
                'ESI_Yesandno': $scope.ESI_Yesandno,
                'SalaryType': $scope.SalaryType,
                'LWF': $scope.LWF,
                'ESIOverlimit': $scope.ESIOverlimit,
                'DayallowanceincludedESI': $scope.DayallowanceincludedESI,

                'Method': 'UpdateSalary'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.CheckingBackgroundverification($scope.Gross_Salary);
            $scope.DisplayEmpAppraisal();

            // $scope.DetailListTemp = response.data.mytbl;



            $scope.UserLoginDestroy();
            $scope.SuperUserMail();

        });

    };
    ////////////////////////////////////////

    $(document).ready(function (e) {

        $('#fileButton01').on('click', function () {
            // $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput01').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput01').files[x]);
            }

            $.ajax({
                url: 'Empimage.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    //alert(response);
                    document.getElementById("fileInput01").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchEmployee($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });

    /////////////////////////////////////
    $scope.DeleteEducation = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.EduNextno,

                'Method': 'DeleteEDUCATION'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.ResetEducation();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ///////////////////////////////////////////
    $scope.PageLoadRelationship = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'Relationship' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetRelationshipList = response.data;
            // $scope.CheckingSession();
        });
    }
    //////////////////////////////////
    $scope.DeleteFamily = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.FamilyNextno,

                'Method': 'DeleteFamily'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.ResetFamily();

            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    /////////////////////////////////////////////
    $(document).ready(function (e) {

        $('#fileButton').on('click', function () {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("DocNextno", $("#DocNextno").val());
            form_data.append("Documenttype", $("#Documenttype").val());
            form_data.append("Documentno", $("#Documentno").val());
            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'UploadEmpdoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInput").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    $scope.DisplayEmpDocument();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'DOCTYPE' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetDoctypeList = response.data;

    });
    //////////////////////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'SHIFT' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {

        $scope.GetShiftList = response.data;
        // $scope.CheckingSession();
    });

    ///////////////////////////////////////
    $scope.Update_document = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.DocNextno,
                'Documenttype': $scope.Documenttype,
                'Documentno': $scope.Documentno,
                'Method': 'DOCEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;



            // $scope.DetailListTemp = response.data.mytbl;



        });
        $scope.TempSave();
        $scope.DisplayEmpDocument();
    };
    ///////////////////////////////////////
    $scope.FetchDOC = function (Employeeid, Sno) {
        //  $scope.CheckingSession();

        $scope.Employeeid = Employeeid;
        $scope.DocNextno = Sno;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.DocNextno,
                'Method': "FetchDOC"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Documenttype = response.data.Documenttype;
            $scope.Documentno = response.data.Documentno;
            $scope.Documentpath = response.data.Documentpath;
            $scope.DocumentView = response.data.Documentpath;

        });
    }
    //////////////////////////////////////////////
    $scope.DeleteDoc = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.DocNextno,

                'Method': 'DeleteDoc'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Resetdoc();

            // $scope.DetailListTemp = response.data.mytbl;
            $scope.UserLoginDestroy();

            $scope.TempSave();
        });

    };
    /////////////////////////////////////////////////
    $scope.Update_DEPT = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'PromotionNextno': $scope.PromotionNextno,
                'Department': $scope.Department,
                'Designation': $scope.Designation,
                'Period': $scope.Period,
                'Postingyear': $scope.Postingyear,
                'Postingmonth': $scope.Postingmonth,
                'Postingdays': $scope.Postingdays,
                'Fromperiod': $scope.Fromperiod,
                'Toperiod': $scope.Toperiod,




                'Method': 'DEPTEMP'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;


            // $scope.DetailListTemp = response.data.mytbl;
            $scope.DisplayEmpPromotion();

            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    };
    ////////////////////////////
    $scope.FetchPromotion = function (Employeeid, Sno) {
        $scope.CheckingSession();

        $scope.Employeeid = Employeeid;
        $scope.PromotionNextno = Sno;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.PromotionNextno,
                'Method': "FetchPromotion"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Department = response.data.Department;
            $scope.Designation = response.data.Designation
            $scope.Period = response.data.Period;
            $scope.Postingdays = response.data.Postingdays;
            $scope.Postingyear = response.data.Postingyear;
            $scope.Postingmonth = response.data.Postingmonth;
            $scope.Period = response.data.Period;
            $scope.Fromperiod = response.data.Fromperiod;
            $scope.Toperiod = response.data.Toperiod;


        });
    }
    ////////////////////////////////

    $scope.Update_Major = function () {
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Title': $scope.Title,
                'Firstname': $scope.Firstname,
                'Lastname': $scope.Lastname,
                'Gender': $scope.Gender,
                'Nationality': $scope.Nationality,
                'Married': $scope.Married,
                'Mothertongue': $scope.Mothertongue,
                'Contactno': $scope.Contactno,
                'Category': $scope.Category,
                'Emailid': $scope.Emailid,
                'EmployeeType': $scope.EmployeeType,
                'Department': $scope.EmpDepartment,
                'Highestqualification': $scope.Highestqualification,
                'Designation': $scope.EmpDesignation,
                'FatherGuardianSpouseName': $scope.FatherGuardianSpouseName,

                //  'City': $scope.City,
                'Method': 'UpdateMajor'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            // $scope.Tempnextno = response.data.Nextno;
            // $scope.DetailListTemp = response.data.mytbl;


            $scope.TempSave();

            $scope.UserLoginDestroy();
           // $scope.SuperUserMail();
        });

    };
    /////////////////////////////////////////////
    $scope.Getcalvalue = function () {

        //  $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Basic': $scope.Basic,
                'HR_Allowance': $scope.HR_Allowance,
                'TA': $scope.TA,
                'Performance_allowance': $scope.Performance_allowance,
                'Day_allowance': $scope.Day_allowance,
                'Other_Allowance': $scope.Other_Allowance,
                'PF_Yesandno': $scope.PF_Yesandno,
                'PF_Fixed': $scope.PF_Fixed,
                'ESI_Yesandno': $scope.ESI_Yesandno,
                'PF': $scope.PF,
                'Method': "CALCULAT"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.ESI = response.data.ESI;
            $scope.PF = response.data.PF
            $scope.Net_Salary = response.data.Net_Salary;
            $scope.Gross_Salary = response.data.Gross_Salary;
            $scope.PF_Yesandno = response.data.PF_Yesandno;
            $scope.ESI_Yesandno = response.data.ESI_Yesandno;
            $scope.LWF = response.data.LWF;
            //$scope.FamilyOccupation = response.data.FamilyOccupation;

        });
    }


    $scope.Getcalvalue2 = function () {

        $scope.CheckingSession();

        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Basic': $scope.Basic,
                'HR_Allowance': $scope.HR_Allowance,
                'TA': $scope.TA,
                'Performance_allowance': $scope.Performance_allowance,
                'Day_allowance': $scope.Day_allowance,
                'Other_Allowance': $scope.Other_Allowance,
                'PF_Yesandno': $scope.PF_Yesandno,
                'PF_Fixed': $scope.PF_Fixed,
                'ESI_Yesandno': $scope.ESI_Yesandno,

                'Method': "CALCULAT"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.ESI = response.data.ESI;
            $scope.PF = response.data.PF
            $scope.Net_Salary = response.data.Net_Salary;
            $scope.Gross_Salary = response.data.Gross_Salary;
            $scope.PF_Yesandno = response.data.PF_Yesandno;
            $scope.ESI_Yesandno = response.data.ESI_Yesandno;

        });
    }
    /////////////////////////////////////
    $(document).ready(function (e) {

        $('#fileButton03').on('click', function () {
            // $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput03').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput03').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Bankname", $("#Bankname").val());
            form_data.append("Accountno", $("#Accountno").val());
            form_data.append("IFSCcode", $("#IFSCcode").val());
            form_data.append("Branch", $("#Branch").val());
            form_data.append("Empnameaspassbook", $("#Empnameaspassbook").val());
            form_data.append("Employeeid", $("#Employeeid").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploadbankpassdoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInput03").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchBank($scope.Employeeid);
                    //    $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////////////////


    /////////////////////////////////////
    $(document).ready(function (e) {

        $('#fileButton04').on('click', function () {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInput04').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInput04').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Employeestudied", $("#Employeestudied").val());
            form_data.append("UniversityorSchool", $("#UniversityorSchool").val());
            form_data.append("GradeorPercentage", $("#GradeorPercentage").val());
            form_data.append("Passoutyear", $("#Passoutyear").val());
            form_data.append("EduNextno", $("#EduNextno").val());
            form_data.append("EducationMode", $("#EducationMode").val());
            form_data.append("Specialization", $("#Specialization").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploadeducationdoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInput04").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");


                    }, 3000);
                    $scope.DisplayEmpEducation();
                    //    $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    ///////////////////////////////////////////////////////////////////
    $scope.GetDeptDays = function () {
        // $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Fromperiod': $scope.Fromperiod,
                'Toperiod': $scope.Toperiod,



                'Method': 'GetDEPTDAYS'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.Postingdays = response.data.Postingdays;
            $scope.Postingyear = response.data.Postingyear;
            $scope.Postingmonth = response.data.Postingmonth;
            $scope.Period = response.data.Period;

            // $scope.DetailListTemp = response.data.mytbl;



        });

    };
    /////////////////////////////////////////////
    $scope.GetExitempname = function () {
        // $scope.CheckingSession();
        $http({

            method: "post",
            url: "Employee.php",
            data: {
                'Exitempid': $scope.Exitempid,
                'Method': 'ExitEmp'
            },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.ExitGender = response.data.ExitGender;
            $scope.ExitCategory = response.data.ExitCategory;
            $scope.ExitDesignation = response.data.ExitDesignation;
            $scope.ExitEmployeetype = response.data.ExitEmployeetype;
            $scope.ExitContactno = response.data.ExitContactno;
            $scope.ExitDepartment = response.data.ExitDepartment;
            $scope.Relievingrequestdate = response.data.Relievingrequestdate;
            $scope.RelievingDate = response.data.RelievingDate;
            $scope.Handoverto = response.data.Handoverto;
            $scope.Relievingreason = response.data.Relievingreason;
        });
    }
    /////////////////////////////////
    $scope.Resetexitemp = function () {
        // $scope.CheckingSession();
        $scope.Exitempid = "";
        $scope.ExitGender = "";
        $scope.ExitCategory = "";
        $scope.ExitDesignation = "";
        $scope.ExitEmployeetype = "";
        $scope.ExitContactno = "";
        $scope.ExitDepartment = "";
        $scope.Relievingrequestdate = "";
        $scope.RelievingDate = "";
        $scope.Handoverto = "";
        $scope.Relievingreason = "";
    }
    /////////////////////////////////
    $scope.Update_Relieving = function () {
        //  $scope.CheckingSession();
        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Exitempid': $scope.Exitempid,
                'ExitGender': $scope.ExitGender,
                'ExitCategory': $scope.ExitCategory,
                'ExitDesignation': $scope.ExitDesignation,
                'ExitEmployeetype': $scope.ExitEmployeetype,
                'ExitContactno': $scope.ExitContactno,
                'ExitDepartment': $scope.ExitDepartment,
                'Relievingrequestdate': $scope.Relievingrequestdate,
                'RelievingDate': $scope.RelievingDate,
                'Handoverto': $scope.Handoverto,
                'Relievingreason': $scope.Relievingreason,
                'Method': 'ExitUpdate'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.UserLoginDestroy();
        });
    }
    //////////////////////////////////////////////
    $scope.Deactive = function () {
        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Exitempid': $scope.Exitempid,
                'Relievingrequestdate': $scope.Relievingrequestdate,
                'RelievingDate': $scope.RelievingDate,
                'Handoverto': $scope.Handoverto,
                'Relievingreason': $scope.Relievingreason,

                'Method': 'ExitDeactive'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
        });
    }
    ///////////////////////////////////////////////////
    $scope.GetExitallvalues = function () {

        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'ExitALL' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetExitEmployeeList = response.data;
        });
    };
    //////////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'ExitALL' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetExitEmployeeList = response.data;
        // $scope.CheckingSession();
    });
    //////////////////////////////
    /////////////////////////////////////
    $(document).ready(function (e) {

        $('#fileButton05').on('click', function () {
            //$scope.CheckingSession();
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
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInput05").value = '';
                    $scope.DisplayCandidateVaccination();
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    //////////////////////////////////////////////
    $scope.FetchCovidvaccination = function () {
        //  $scope.CheckingSession();
        $http({

            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': 'Fetchvaccinationnew'
            },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.VaccinationView = response.data.VaccinationView;
            $scope.Vaccinateddate = response.data.Vaccinateddate;
            $scope.Covidvaccinated = response.data.Covidvaccinated;

        });
    }
    ///////////////////
    $scope.UpdateVaccination = function () {
        $scope.CheckingSession();
        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Vaccinateddate': $scope.Vaccinateddate,
                'Covidvaccinated': $scope.Covidvaccinated,


                'Method': 'Vaccinationupdate'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.UserLoginDestroy();
        });
    }
    /////////////////////////////////////
    ////////////////////////////////////////////
    $scope.ResetVaccination = function () {
        $scope.CheckingSession();
        $scope.Covidvaccinated = "";
        $scope.Vaccinateddate = "";
        $scope.clearinput = "";
        $scope.VaccinationNextno();
        $scope.DisplayCandidateVaccination();
    }

    $scope.DisplayCandidateVaccination = function () {
        //  $scope.CheckingSession();



        $http({



            method: "POST",
            url: "VaccinationSave.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPVACCINATION' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetVaccinationList = response.data;


        });

    };

    //////////////////////////////

    //////////////////////////////////////////////
    $scope.FetchCovidvaccination = function (Employeeid, Sno) {
        //   $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $scope.Vaccinatedsno = Sno;
        $http({

            method: "post",
            url: "VaccinationSave.php",
            data: {
                'Employeeid': $scope.Employeeid,
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
    $scope.UpdateVaccination = function () {
        $scope.CheckingSession();
        $http({
            method: "post",
            url: "VaccinationSave.php",
            data: {
                'Employeeid': $scope.Employeeid,
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
    $scope.DeleteVaccination = function () {
        //  $scope.CheckingSession();
        $http({
            method: "post",
            url: "VaccinationSave.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Vaccinatedsno': $scope.Vaccinatedsno,



                'Method': 'VaccinationDelete'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {



            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.ResetVaccination();
            $scope.UserLoginDestroy();
        });
    }
    //////////////////
    $scope.VaccinationNextno = function () {
        //  $scope.CheckingSession();
        //alert($scope.Employeeid);
        $http({



            method: "POST",
            url: "VaccinationSave.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPVACCINATIONNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert(response.data);

            $scope.Vaccinatedsno = response.data.Sno;

        });
    }
    /////////////////////////////////////
    $scope.emailchecking = function (email) {
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
        // $scope.Message = "Please Enter Validate Email ID ..........";
        // $timeout(function() { $scope.Message = ""; }, 3000);
        return true;
    }
    ///////////////////////////////////////////




    $scope.emailchecking02 = function (email) {
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
    //////////////////////////////////////////////

    $scope.FetchSIPLDocument = function (Employeeid) {
        // $scope.CheckingSession();
        $scope.Employeeid = Employeeid;
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Method': "FetchSIPLDOC"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.EmployeeDetailpathtamil = response.data.EmployeeDetailpathtamil;
            $scope.Form34pathtamil = response.data.Form34pathtamil;
            $scope.Attentionoftheemployeepathtamil = response.data.Attentionoftheemployeepathtamil;
            $scope.Employeedeclarationpathtamil = response.data.Employeedeclarationpathtamil;
            $scope.Employeecontractpathtamil = response.data.Employeecontractpathtamil;
            $scope.Employeestatingpathtamil = response.data.Employeestatingpathtamil;
            $scope.Employeeagreemantpathtamil = response.data.Employeeagreemantpathtamil;
            $scope.Serviceimprovementpathrecordtamil = response.data.Serviceimprovementpathrecordtamil;
            $scope.Employeetrainingpathtamil = response.data.Employeetrainingpathtamil;
            $scope.Form2revisedpathtamil = response.data.Form2revisedpathtamil;


            $scope.EmployeeDetailpathhindi = response.data.EmployeeDetailpathhindi;
            $scope.Form34pathtamilhindi = response.data.Form34pathtamilhindi;
            $scope.Attentionoftheemployeepathhindi = response.data.Attentionoftheemployeepathhindi;
            $scope.Employeedeclarationpathhindi = response.data.Employeedeclarationpathhindi;
            $scope.Employeecontractpathhindi = response.data.Employeecontractpathhindi;
            $scope.Employeestatingpathhindi = response.data.Employeestatingpathhindi;
            $scope.Employeeagreemantpathhindi = response.data.Employeeagreemantpathhindi;
            $scope.Serviceimprovementpathrecordlhindi = response.data.Serviceimprovementpathrecordlhindi;
            $scope.Employeetrainingpathhindi = response.data.Employeetrainingpathhindi;
            $scope.Form2revisedpathhindi = response.data.Form2revisedpathhindi;
            $scope.Employee_NDA_Path = response.data.Employee_NDA_Path;
            $scope.GratutityPath = response.data.GratutityPath;

        });
    }
    //////////////////////////////////////////
    /////////EMPDETAILTAMIL////////////////////
    ///////////////////////
    $(document).ready(function (e) {

        $('#fileButtonEmpDetailtamil').on('click', function () {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDetailtamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDetailtamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpdetailtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpDetailtamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $scope.CheckingSession();
        $("#btnempdetailtamil").click(function () {


            var data = $("#pdfExportempdetailtamil").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Details</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();
        });
    });

    ////////////////////////////////////////////////////////////
    //////////EMPDETAILSHINDI////////////////////
    $(document).ready(function (e) {

        $('#fileButtonEmpDetailhindi').on('click', function () {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDetailhindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDetailhindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpdetailhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpDetailhindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $scope.CheckingSession();
        $("#btnempdetailHindi").click(function () {


            var data = $("#pdfExportempdetailhindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Declaration</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////
    ///////FORM34TAMIL//////////////
    $(document).ready(function (e) {

        $('#fileButtonform34tamil').on('click', function () {
            //  $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputform34tamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputform34tamil').files[x]);
            }

            $.ajax({
                url: 'UploadForm34tamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputform34tamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {

        $("#btnform34tamil").click(function () {
            //$scope.CheckingSession();

            var HTML_Width = $("#pdfExporform34ltamil").width();
            var HTML_Height = $("#pdfExporform34ltamil").height();
            var data = document.getElementById('pdfExporform34ltamil');
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
    /////////////////////////////////////////////////////////////////
    //////FORM34HINDI////////////////////////
    $(document).ready(function (e) {

        $('#fileButtonform34hindi').on('click', function () {
            // $scope.CheckingSession();
            var form_data = new FormData();
            var ins = document.getElementById('fileInputform34hindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputform34hindi').files[x]);
            }

            $.ajax({
                url: 'UploadForm34hindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputform34hindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {

        $("#btnform34hindi").click(function () {
            //$scope.CheckingSession();

            var HTML_Width = $("#pdfExporform34hindi").width();
            var HTML_Height = $("#pdfExporform34hindi").height();
            var data = document.getElementById('pdfExporform34hindi');
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
    /////////////////////////////////////////
    ////////////EMPATTENTIONTAMIL
    $(document).ready(function (e) {
        $('#fileButtonEmpAttentiontamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAttentiontamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAttentiontamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAttentiontamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpAttentiontamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpAttentiontamil").click(function () {

            var HTML_Width = $("#pdfExporEmpAttentiontamil").width();
            var HTML_Height = $("#pdfExporEmpAttentiontamil").height();
            var data = document.getElementById('pdfExporEmpAttentiontamil');
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
    ///////////////////////////////////////////////////////////////
    ////////////EMPATTENTIONHINDI
    $(document).ready(function (e) {
        $('#fileButtonEmpAttentionhindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAttentionhindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAttentionhindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAttentionhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpAttentionhindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpAttentionhindi").click(function () {

            var HTML_Width = $("#pdfExporEmpAttentionhindi").width();
            var HTML_Height = $("#pdfExporEmpAttentionhindi").height();
            var data = document.getElementById('pdfExporEmpAttentionhindi');
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

    /////////////////EMPLOYEE DECLARATION TAMIL////////////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpDeclarationtamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDeclarationtamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDeclarationtamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpDeclarationtamil..php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpDeclarationtamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpDeclarationTamil").click(function () {

            var HTML_Width = $("#pdfExporEmpDeclarationtamil").width();
            var HTML_Height = $("#pdfExporEmpDeclarationtamil").height();
            var data = document.getElementById('pdfExporEmpDeclarationtamil');
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
    //////////////////////////////////////////
    //////////////EMPLOYEE DECLARATION HINDI ////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpDeclarationHindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpDeclarationHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpDeclarationHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpDeclarationhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpDeclarationHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpDeclarationHindi").click(function () {

            var HTML_Width = $("#pdfExporEmpDeclarationHindi").width();
            var HTML_Height = $("#pdfExporEmpDeclarationHindi").height();
            var data = document.getElementById('pdfExporEmpDeclarationHindi');
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
    //////////////////////////////////////////////////////
    //////////EMPLOYEE STATING TAMIL/////////////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpStatingTamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpStatingTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpStatingTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpStatingtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpStatingTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpStatingTamil").click(function () {


            // var data = document.getElementById('pdfExporEmpStatingTamil');
            var data = $("#pdfExporEmpStatingTamil").html();



            var printWindow = window.open('', '_blank');
            printWindow.document.open();

            printWindow.document.write('<html><head><title>Employee Stating</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();
        });
    });
    //////////////////////////////////////////////////////////////
    //////////////EMPLOYEE STATING HINDI///////////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpStatingHindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpStatingHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpStatingHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpStatinghindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpStatingHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpStatingHindi").click(function () {


            var data = $("#pdfExporEmpStatingHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Stating</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    /////////////////////////////////////////////
    /////////EMPLOYEE AGREEMENT TAMIL////////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpAgreementTamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAgreementTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAgreementTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAgreeementTamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpAgreementTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpAgreementTamil").click(function () {


            var data = $("#pdfExporEmpAgreementTamil").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Agreement</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    //////////////////////////////////////////////////////
    ////////////EMPLOYEE AGREEMENT HINDI /////////////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpAgreementHindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpAgreementHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpAgreementHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpAgreementHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpAgreementHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpAgreementHindi").click(function () {

            var HTML_Width = $("#pdfExporEmpAgreementHindi").width();
            var HTML_Height = $("#pdfExporEmpAgreementHindi").height();


            var data = $("#pdfExporEmpAgreementHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employee Agreement</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ///////////////////////////
    //////////////////////EMPLOYEE TRAINING TAMIL ///////////
    $(document).ready(function (e) {
        $('#fileButtonEmpTrainingTamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpTrainingTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpTrainingTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpTrainingtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpTrainingTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpTrainingTamil").click(function () {

            var HTML_Width = $("#pdfExporEmpTrainigTamil").width();
            var HTML_Height = $("#pdfExporEmpTrainigTamil").height();
            var data = document.getElementById('pdfExporEmpTrainigTamil');
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
    //////////////////////////////////////
    ////////////////////////////EMPLOYEE TRAINING HINDI ///////////////////////////

    $(document).ready(function (e) {
        $('#fileButtonEmpTrainingHindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpTrainingHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpTrainingHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpTrainingHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpTrainingHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpTrainingHindi").click(function () {

            var HTML_Width = $("#pdfExporEmpTrainigHindi").width();
            var HTML_Height = $("#pdfExporEmpTrainigHindi").height();
            var data = document.getElementById('pdfExporEmpTrainigHindi');
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
    ///////////////////////////////////////////////
    /////////////////Employee Service Tamil/////////

    $(document).ready(function (e) {
        $('#fileButtonEmpServiceTamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpServiceTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpServiceTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpServiceTamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpServiceTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpServiceTamil").click(function () {

            var HTML_Width = $("#pdfExportEmpServiceTamil").width();
            var HTML_Height = $("#pdfExportEmpServiceTamil").height();
            var data = document.getElementById('pdfExportEmpServiceTamil');
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
    ///////////////////////////////////////////////
    ////////////EMPLOYEE SERVICE HINDI /////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpServiceHindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpServiceHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpServiceHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpServiceHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpServiceHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpServiceHindi").click(function () {

            var HTML_Width = $("#pdfExportEmpServiceHindi").width();
            var HTML_Height = $("#pdfExportEmpServiceHindi").height();
            var data = document.getElementById('pdfExportEmpServiceHindi');
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
    //////////////////////////////
    //////////EMP FORM 2 REVISED TAMIL //////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpForm2RevisedTamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpForm2RevisedTamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpForm2RevisedTamil').files[x]);
            }

            $.ajax({
                url: 'UploadEmpForm2revisedTamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpForm2RevisedTamil").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpForm2RevisedTamil").click(function () {
            ;
            //  var data = document.getElementById('pdfExportEmpForm2RevisedTamil').html();
            var data = $("#pdfExportEmpForm2RevisedTamil").html();


            var printWindow = window.open('', '_blank');
            printWindow.document.open();

            printWindow.document.write('<html><head><title>FORM-2 Revised</title></head><body>');
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();


        });
    });
    /////////////////////////////////////////////
    ////////////////////EMP FORM2 REVISED HINDI ////////////
    $(document).ready(function (e) {
        $('#fileButtonEmpForm2RevisedHindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpForm2RevisedHindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpForm2RevisedHindi').files[x]);
            }

            $.ajax({
                url: 'UploadEmpForm2revisedHindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpForm2RevisedHindi").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpForm2RevisedHindi").click(function () {


            var data = $("#pdfExportEmpForm2RevisedHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>FORM-2 Revised</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////////////



    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'APPPENDING' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetAPPEmployeeList = response.data;
    });

    ///////////////////////////////////////////
    $(document).ready(function (e) {
        $('#fileButtonBackgrounverification').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBackgroundVerification').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBackgroundVerification').files[x]);
            }

            $.ajax({
                url: 'UploadBackgroundVerification.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputBackgroundVerification").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////////////////////////////////
    $scope.PageLoadBACKPENDING = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Method': 'BACKPENDING' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {


            $scope.GetBackgroundEmployeeList = response.data;

        });
    }
    ////////////////////////////////////
    $scope.ResetNomineeFamily = function () {
        $scope.CheckingSession();
        $scope.NomineeName = "";
        $scope.NomineeRelationship = "";
        $scope.NomineeDateOfBirth = "";
        $scope.Guardianname = "";
        $scope.RelationshipContactno = "";
        $scope.PercentageofShare = "";
        $scope.NomineeAddress = "";
        $scope.NomineeSno = "0";
        $scope.DisplayEmpNominee();
        $scope.FetchNomineenextno();
    }


    ////////////////////////////////
    $scope.FetchEmpNominee = function (Employeeid, NomineeSno) {
        $scope.Employeeid = Employeeid;
        $scope.NomineeSno = NomineeSno;
        $http({
            method: "POST",
            url: "NomineeEmployee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'NomineeSno': $scope.NomineeSno,
                'Method': "FetchEmpNominee"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            // alert(response.data.NomineeDateOfBirth);

            $scope.NomineeName = response.data.NomineeName;
            $scope.NomineeRelationship = response.data.NomineeRelationship;
            $scope.NomineeDateOfBirth = response.data.NomineeDateOfBirth;
            $scope.Guardianname = response.data.Guardianname;
            $scope.RelationshipContactno = response.data.RelationshipContactno;
            $scope.PercentageofShare = response.data.PercentageofShare;
            $scope.NomineeAddress = response.data.NomineeAddress;
            $scope.NomineeAge = response.data.NomineeAge;
        });
    }


    $scope.FetchEmpNominee2 = function (Employeeid) {
        $scope.Employeeid = Employeeid;
        // $scope.NomineeSno = NomineeSno;
        $http({
            method: "POST",
            url: "NomineeEmployee.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Method': "FetchEmpNominee2"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            // alert(response.data.NomineeName);

            $scope.NomineeName2 = response.data.NomineeName;
            $scope.NomineeRelationship2 = response.data.NomineeRelationship;

        });
    }
    /////////////////////////////
    $scope.Update_NomineeFamily = function () {
        $scope.CheckingSession();
        $http({
            method: "post",
            url: "NomineeEmployee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'NomineeName': $scope.NomineeName,
                'NomineeRelationship': $scope.NomineeRelationship,
                'NomineeDateOfBirth': $scope.NomineeDateOfBirth,
                'NomineeAge': $scope.NomineeAge,
                'Guardianname': $scope.Guardianname,
                'RelationshipContactno': $scope.RelationshipContactno,
                'PercentageofShare': $scope.PercentageofShare,
                'NomineeAddress': $scope.NomineeAddress,
                'NomineeSno': $scope.NomineeSno,
                'Method': 'EmpNomineeUpdate'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.DisplayEmpNominee();

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.UserLoginDestroy();
        });
    }




    ////////////////////////////////
    $scope.FetchNomineenextno = function () {
        //  $scope.CheckingSession();
        //alert($scope.Employeeid);
        $http({



            method: "POST",
            url: "NomineeEmployee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPNOMINEENEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert(response.data);

            $scope.NomineeSno = response.data.Sno;

        });
    }
    ///////////////////////////////////////
    $scope.DisplayEmpNominee = function () {



        $http({



            method: "POST",
            url: "NomineeEmployee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPNOMINEE' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetNomineeList = response.data;


        });

    };
    ////////////////////////

    //////////////////////////////////////////
    $scope.DeleteNominee = function () {
        // $scope.CheckingSession();
        $http({
            method: "POST",
            url: "NomineeEmployee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'NomineeSno': $scope.NomineeSno,
                'Method': 'NomineeDelete'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {



            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.ResetNomineeFamily();
        });
    }
    ///////////////////////
    $scope.GetNomineeage = function () {
        $http({



            method: "POST",
            url: "NomineeEmployee.php",
            data: {
                'Dob': $scope.NomineeDateOfBirth,



                'Method': 'GetNomineeAge'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.NomineeAge = response.data.Age;

            // $scope.DetailListTemp = response.data.mytbl;



        });

    };

    ///////////////////////////////
    $(function () {
        $("#btnEmpNDA").click(function () {

            var HTML_Width = $("#pdfExportNDAEnglish").width();
            var HTML_Height = $("#pdfExportNDAEnglish").height();
            var data = document.getElementById('pdfExportNDAEnglish');
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

    ////////////////////////////////////////////////////////////
    //////////EMPDETAILSHINDI////////////////////
    $(document).ready(function (e) {
        $('#fileButtonNDA').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputNDA').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputNDA').files[x]);
            }

            $.ajax({
                url: 'UploadEmpdetailNDA.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputNDA").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////
    ///////////Employee Gratuity///////////////
    $(document).ready(function (e) {
        $('#fileButtonGratuity').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputGratuity').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputGratuity').files[x]);
            }

            $.ajax({
                url: 'UploadEmpGratutity.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputGratuity").value = '';

                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.FetchSIPLDocument($scope.Employeeid);
                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    /////////////////////////////////////
    $(function () {
        $("#btnEmpGratuity").click(function () {

            var HTML_Width = $("#pdfExportGratuity").width();
            var HTML_Height = $("#pdfExportGratuity").height();
            var data = document.getElementById('pdfExportGratuity');
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

    //////////////////////////////////////
    $(function () {
        $("#download").click(function () {

            frontidcard();

        });
    });

    $(function () {
        $("#download4").click(function () {
            frontidcard4();
        });
    });
    /////////////////////

    //     function frontidcard()
    //     {

    //         var Empid = $('#Employeeid').val();
    //         // var divWidth = 204; // Desired width of the exported image
    //         // var divHeight = 325;

    //         var screenWidth = $(window).width();
    //         var screenHeight = $(window).height();

    //     var canvas = document.createElement("canvas");
    //     // canvas.width = divWidth;
    //     // canvas.height = divHeight;
    //        canvas.width = screenWidth/2;
    //      canvas.height = screenHeight/2;

    //      var ctx = canvas.getContext('2d');
    //      canvas.width = screenWidth ;
    //      canvas.height = screenHeight ;

    //      // Draw the content inside the canvas (e.g., an image)
    //      // Replace the following line with your own drawing logic.

    //      ctx.fillRect(0, 0, canvas.width, canvas.height);
    //   //  ctx.scale(3);
    //     html2canvas($("#Empfront")[0], {
    //       canvas: canvas,
    //       useCORS: true, // Enable if the div contains an image from a different domain
    //     }).then(function(canvas) {
    //      // var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    //      var dataURL = canvas.toDataURL();
    //       var link = document.createElement("a");
    //       link.download = Empid+ "_Empfront.jpeg";;
    //       link.href = dataURL;
    //       link.click();
    //       backidcard();
    //     });

    //     }

    //     function backidcard()
    //     {









    //         var Empid = $('#Employeeid').val();

    //         // var divWidth = 204; // Desired width of the exported image
    //         // var divHeight = 325;
    //         var screenWidth = $(window).width();
    //         var screenHeight = $(window).height();


    //         var canvas = document.createElement("canvas");
    //         // canvas.width = divWidth;
    //         // canvas.height = divHeight;
    //         canvas.width = screenWidth;
    //      canvas.height = screenHeight;
    //      var ctx = canvas.getContext('2d');
    //      canvas.width = screenWidth ;
    //      canvas.height = screenHeight ;

    //      ctx.fillRect(0, 0, canvas.width, canvas.height);
    //         html2canvas($("#Empback")[0], {
    //           canvas: canvas,
    //           useCORS: true, // Enable if the div contains an image from a different domain
    //         }).then(function(canvas) {
    //         //   var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    //         var dataURL = canvas.toDataURL();
    //           var link = document.createElement("a");
    //           link.download = Empid+ "_Empback.jpeg";;
    //           link.href = dataURL;
    //           link.click();

    //         });
    //         //  var element = $("#Empfront"); // global variable
    //         //   html2canvas(document.getElementById("Empback"), { allowTaint: true, scale: 2, useCORS: true, logging: true,width:204,height:325 }).then(function (canvas) {                   
    //         //     var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    //         //     var anchorTag = document.createElement("a");

    //         //        document.body.appendChild(anchorTag);
    //         //     //   document.getElementById("previewImg").appendChild(canvas);
    //         //        anchorTag.download =Empid+ "_Empback.jpeg";
    //         //        anchorTag.href = image;
    //         //        anchorTag.target = '_blank';
    //         //        anchorTag.click();
    //         //    });
    //     }


    function frontidcard() {

        var Empid = $('#Employeeid').val();
        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;



        html2canvas($("#Empfront")[0], {
            scale: 2,
            useCORS: true, // Enable if the div contains an image from a different domain
        }).then(function (canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empfront.jpg";;
            link.href = image;
            link.click();
            backidcard();
        });
        // //  var element = $("#Empfront"); // global variable
        //   html2canvas(document.getElementById("Empfront"), {allowTaint: true, scale: 2, useCORS: true, logging: true,width:width,height: height}).then(function (canvas) {  
        //     var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");                 
        //       var anchorTag = document.createElement("a");
        //        document.body.appendChild(anchorTag);
        //     //   document.getElementById("previewImg").appendChild(canvas);
        //        anchorTag.download =Empid+ "_Empfront.jpeg";
        //        anchorTag.href = image;
        //        anchorTag.target = '_blank';
        //        anchorTag.click();
        //        backidcard();
        //    });
    }

    function backidcard() {

        var Empid = $('#Employeeid').val();

        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;

        html2canvas($("#Empback")[0], {
            scale: 2,
            useCORS: true,
            // Enable if the div contains an image from a different domain
        }).then(function (canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empback.jpg";;
            link.href = image;
            link.click();

        });

    }
    /////////////////////////////////////////////
    $(function () {
        $("#btnEmpAssessment").click(function () {


            var data = $("#pdfExportPerformanceAssessment").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Performance Assesment</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////////////////////
    $(function () {
        $("#btnEmpAssessment").click(function () {


            var data = $("#pdfExportPerformanceAssessment").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Performance Assesment</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    ////////////////////////////////////////////////////////
    $(function () {
        $("#btnAppointmentordertamil").click(function () {


            var data = $("#pdfExportAppointmentorder").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>AppointmentOrderTamil</title></head><body>');
            // Add the CSS file
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function () {
        $("#btnAppointmentorderhindi").click(function () {


            var data = $("#pdfExportAppointmentorderHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>AppointmentOrderHindi</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function () {
        $("#btnConfirmationordertamil").click(function () {


            var data = $("#pdfExportConfirmationorder").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Confirmationordertamil</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });

    $(function () {
        $("#btnConfirmationorderHindi").click(function () {


            var data = $("#pdfExportConfirmationorderHindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Confirmationorderhindi</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });

    $(function () {
        $("#btnInterviewdetailstamil").click(function () {


            var data = $("#pdfExportInterviewdetailtamil").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Interviewdetailstamil</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function () {
        $("#btnInterviewdetailshindi").click(function () {


            var data = $("#pdfExportInterviewdetailhindi").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Interviewdetailshindi</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    $(function () {
        $("#btnEmployeecontract").click(function () {


            var data = $("#pdfExportEmployeeContract").html();

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Employeecontract</title></head><body>');

            printWindow.document.write(data);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();

        });
    });
    //////////////////////////////////////
    $scope.GetMailunique = function (Emailid) {

        $scope.Emailid = Emailid;
        $http({
            method: "POST",
            url: "Employee.php",
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
    ////////////////////
    $scope.GetContactnounique = function (Contactno) {
        $scope.Contactno = Contactno;
        $http({
            method: "POST",
            url: "Employee.php",
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
    ///////////////////////////

    $scope.Emailverification01 = function () {
        $scope.CheckingSession();
        $scope.Message = true;
        $scope.Message = "Please Wait Email Sending...";

        $http({



            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Firstname': $scope.Firstname,

                'Emailid': $scope.Emailid,

                'Method': 'Emailverification01'
            },
            headers: { 'Content-Type': 'application/json' },


        }).then(function successCallback(response) {

            $timeout(function () { $scope.Message = ""; }, 3000);
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();
        });
    }



    $scope.CheckingSession = function () {

        $http({



            method: "POST",
            url: "../Sessionhandling/SessionChecking.php",
            data: {
                'PageSession': $scope.PageSession,


                'Method': 'CurrentSession'
            },
            headers: { 'Content-Type': 'application/json' },


        }).then(function successCallback(response) {


            $scope.SessionMessage = response.data.Message;
            $scope.Sessionurl = response.data.Url;

            $scope.SessionSavedMessage();
        });
    }


    $scope.SessionSavedMessage = function () {
        if ($scope.SessionMessage == "SessionNo") {
            //  alert("Session Expired! Please Login Again...");

            window.location.replace($scope.Sessionurl);
            return;
        }
    }
    /////////////////////////////////


    ///////////////////////////////

    $scope.EditrightsNextno = function () {
        $scope.EditingReason = "";
        $http({



            method: "POST",
            url: "EditirightsforApproval.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'CANEDITRIGHTSNEXTNO' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.EditingRightSno = response.data.Sno;

        });
    }
    ////////////////////////////////
    $scope.UpdateEditingReason = function () {
        $scope.AdminMessage = true;
        $scope.AdminMessage = "Please Wait the request will be send for approval.........";
        $http({
            method: "post",
            url: "EditirightsforApproval.php",
            data: {
                'Employeeid': $scope.Employeeid,
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

    $scope.EmailrightsMessage = function () {
        if ($scope.RightsMessage == "Request Update") {
            $scope.AdminMessage = true;
            $scope.AdminMessage = "Request Sent Successfully .........";
            $timeout(function () { $scope.AdminMessage = ""; }, 3000);
        }
        if ($scope.RightsMessage == "EREASON") {
            $scope.AdminMessage = true;
            $scope.AdminMessage = "Please Enter Editing Reason .........";
            $timeout(function () { $scope.AdminMessage = ""; }, 3000);
        }
    }

    $scope.ResetLoginInfo = function () {
        $scope.EditingUserid = "";
        $scope.EditingPassword = "";
    }
    //////////////////////
    $scope.UserLogin = function () {

        $http({
            method: "post",
            url: "EditirightsforApproval.php",
            data: {
                'Employeeid': $scope.Employeeid,
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
    $scope.LogMessageSave = function () {

        if ($scope.LoginMessage == "USERID") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Please Enter UserDetail";
            $timeout(function () { $scope.LogMessage = ""; }, 3000);
        }
        if ($scope.LoginMessage == "USERPASSWORD") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Please Enter Password";
            $timeout(function () { $scope.LogMessage = ""; }, 3000);
        }
        if ($scope.LoginMessage == "LOGINSUCCESS") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Login Successfully";
            $('#ModalLogin').modal('hide');
            $('#myCarousel').carousel(1);
            $timeout(function () { $scope.LogMessage = ""; }, 3000);
        }
        if ($scope.LoginMessage == "LOGINFAIL") {
            $scope.LogMessage = true;
            $scope.LogMessage = "Username and Password Not Exists";
            $timeout(function () { $scope.LogMessage = ""; }, 3000);
        }


    }


    $scope.UserLoginDestroy = function () {

        $http({
            method: "post",
            url: "EditirightsforApproval.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'EditingUserid': $scope.EditingUserid,
                'EditingPassword': $scope.EditingPassword,
                'Method': 'LoginDestroy'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            //$scope.SuperUserMail();

        });
    }


    $scope.Propertyitemnextno = function () {
        //  $scope.CheckingSession();
        //alert($scope.Employeeid);
        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROPERTYNEXT' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert(response.data);

            $scope.CheckitemSno = response.data.Sno;
            $scope.Distributeddate = response.data.Distributeddate;

        });
    }
    /////////////////////////////////////////
    $scope.Resetpropertychecklist = function () {
        $scope.Qtyitem = 0;
        $scope.Particulars = "";
        $scope.Assetcategoryid = "";
        $scope.Assetlistid = "";
        $scope.Assetcode = "";
        $scope.Propertyitemnextno();
        $scope.GetAssetCategory();
        $scope.DisplayPropertyChecklist();
        $scope.DisplayAssetLog();
        $scope.GetReturnDetails();
        $("#AssetAllocation")[0].reset();
        $("#AddAsset tbody").empty();
        selectedAssetListIds = [];

    }
    ////////////////////
    $scope.DisplayPropertyChecklist = function () {



        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPPROPERTYCHECKLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetPropertyCheckList = response.data;


        });

    };
    //////////////////////////
    $scope.FetchPropertyChecklist = function (Employeeid, Sno) {
        $scope.Employeeid = Employeeid;
        $scope.CheckitemSno = Sno;

        $http({

            method: "post",
            url: "Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'CheckitemSno': $scope.CheckitemSno,
                'Method': 'FetchProperty'
            },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.Propertychecklistitemimage = response.data.Propertychecklistitemimage;
            $scope.Distributeddate = response.data.Distributeddate;
            $scope.Qtyitem = response.data.Qtyitem;
            $scope.Particulars = response.data.Particulars;
            $scope.Assetcategoryid = response.data.Assetcategoryid;
            $scope.GetAssetListnew();
            $scope.Assetlistid = response.data.Assetlistid;

            $scope.GetAssetname();

        });
    }
    ////////////////////////
    $(document).ready(function (e) {
        // $scope.CheckingSession();
        $('#fileButtonPropertychecklistimage').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('Propertychecklistitemimage').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('Propertychecklistitemimage').files[x]);
            }

            form_data.append("CheckitemSno", $("#CheckitemSno").val());
            form_data.append("Particulars", $("#Particulars").val());
            form_data.append("Qtyitem", $("#Qtyitem").val());
            form_data.append("Distributeddate", $("#Distributeddate").val());

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'UploadPropertyImage.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("Propertychecklistitemimage").value = '';
                    $scope.DisplayPropertyChecklist();
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                },
                error: function (response) {
                    alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    ////////////////////////////

    $scope.Update_Property = function () {
        $scope.CheckingSession();
        $http({
            method: "post",
            url: "Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'CheckitemSno': $scope.CheckitemSno,
                'Particulars': $scope.Particulars,
                'Qtyitem': $scope.Qtyitem,
                'Qtyitem': $scope.Qtyitem,
                'Assetlistid': $scope.Assetlistid,
                'Assetcategoryid': $scope.Assetcategoryid,
                'Distributeddate': $scope.Distributeddate,


                'Method': 'Propertyupdate'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.DisplayPropertyChecklist();

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            $scope.UserLoginDestroy();
        });

    }
    ////////////////////////////
    $scope.DeleteProperty = function () {
        //$scope.CheckingSession();
        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Sno': $scope.CheckitemSno,

                'Method': 'PropertyDelete'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;
            $scope.Resetpropertychecklist();

            // $scope.DetailListTemp = response.data.mytbl;
            $scope.UserLoginDestroy();

            $scope.TempSave();
        });

    };


    $scope.SuperUserMail = function () {

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Method': 'SuperUserMail'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {


        });
    }
    ////////////////////////
    $scope.SuperUserAddressMail = function () {

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Method': 'SuperUserAddressMail'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {


        });
    }
    ///////////////////////
    $scope.SuperUserBankAccountsMail = function () {

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Method': 'SuperUserBankAccountsMail'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {


        });
    }
    ///////////////////////////
    $scope.SuperUserEmpRefrenceMail = function () {

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Method': 'SuperUserEmpRefrenceMail'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {


        });
    }
    ///////////////////////
    $scope.GetNominationsharepercentage = function (Employeeid, PercentageofShare) {
        $scope.PercentageofShare = PercentageofShare;
        $scope.Employeeid = Employeeid;

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'PercentageofShare': $scope.PercentageofShare,
                'NomineeSno': $scope.NomineeSno,

                'Method': 'EMPNOMINEEPERCENTAGE'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            //alert(response.data.Message);
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();


        });

    }


    $scope.GetEmergencyContact = function () {

        $http({
            method: "post",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,

                'Method': 'EMERGENCYCONTACT'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.EmergencyContactno = response.data.EmergencyContactno;


        });
    }

    ////////////////////

    $scope.Authorizationcheck = function () {
        $http({
            method: "post",
            url: "Employee.php",
            data: {


                'Method': 'ADMINAUTHORIZATION'
            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {
            $scope.Authorizedno = response.data.Authorizedno;


        });
    }
    /////////////////////////////////////

    $http({
        method: "post",
        url: "Employee.php",
        data: {


            'Method': 'ADMINAUTHORIZATION'
        },
        headers: { 'Content-Type': 'application-json' }
    }).then(function successCallback(response) {
        $scope.Authorizedno = response.data.Authorizedno;


    });
    ////////////////////
    $http({
        method: "POST",
        url: "Employee.php",
        data: {

            'Method': "FETCHCLIENT"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {

        // alert(response.data.ClientnameTamil);
        $scope.Clientname = response.data.Clientname;
        $scope.Location = response.data.Location;
        $scope.ClientPhoneno = response.data.Phoneno;
        $scope.ClientEmailid = response.data.Emailid;
        $scope.ClientGSTN = response.data.GSTN;
        $scope.ClientTin = response.data.Tin;
        $scope.ClientEmailpassword = response.data.Emailpassword;
        $scope.ClientRegnno = response.data.Regnno;
        $scope.ClientPanno = response.data.Panno;
        $scope.ClientAddressLine1 = response.data.AddressLine1;
        $scope.ClientAddressLine2 = response.data.AddressLine2;

        $scope.ClientAddressLine3 = response.data.AddressLine3;
        $scope.ClientCountry = response.data.Country;
        $scope.ClientCity = response.data.City;
        $scope.ClientZipcode = response.data.Zipcode;
        $scope.ClientWebsite = response.data.Website;
        $scope.ClientnameTamil = response.data.ClientnameTamil;
        $scope.ClientnameHindi = response.data.ClientnameHindi;
        $scope.ClientLogo = response.data.ClientLogo;
        $scope.Place = response.data.Place;
        $scope.Clientid = response.data.Clientid;
        $scope.Busroute = response.data.Busroute;

    });
    ////////////////////////////////

    $http({
        method: "POST",
        url: "Employee.php",
        data: { 'Method': 'cat3emp' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.Getcat3EmployeeList = response.data;
    });
    //////////////////////////////
    $(function () {


        $("#btnEmpReport").click(function () {

            $scope.CheckingSession();
            $scope.FetchEmployee($scope.Employeeid);
            $scope.FetchEmpNominee2($scope.Employeeid);
            $scope.DisplayEmpFamily();
            $scope.DisplayEmpNominee();
            setTimeout(function () {
                var Employeedetails = $("#pdfExportempdetailtamil").html();
                var Interviewdetails = $("#pdfExportInterviewdetailtamil").html();
                var AppointmentOrder = $("#pdfExportAppointmentorder").html();
                var Employeecontract = $("#pdfExportEmployeeContract").html();
                var EmployeeStating = $("#pdfExporEmpStatingTamil").html();
                var Empformno34 = $("#pdfExporform34ltamil").html();
                var Empserviceimprovement = $("#pdfExportEmpServiceTamil").html();
                var Emptraining = $("#pdfExporEmpTrainigTamil").html();
                var Empform2 = $("#pdfExportEmpForm2RevisedTamil").html();
                var EmpGratuity = $("#pdfExportGratuity").html();
                var EmpConfirmation = $("#pdfExportConfirmationorder").html();
                var EmpNDA = $("#pdfExporEmpAgreementTamil").html();
                var EmpAttention = $("#pdfExporEmpAttentiontamil").html();
                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Employee Report(Tamil)</title></head><body>');

                printWindow.document.write('<style></style>');

                // printWindow.document.write('<style>.row {display: flex;}.col-lg-6 {flex: 1;}table.doc-table {border-collapse: collapse;margin: 20px 0;}table.doc-table td,.table.doc-table th {border: 1px solid #dddddd;text-align: left;padding: 8px;}.candidate-photo {display: inline-block;height: 140px;width: 140px;padding: 5px;text-align: center;position: absolute; right: 4.8%;border: 1px solid #888888;}@media print {.page-break { page-break-before: always; }.row {  display: block; /* Change display to block for printing */  page-break-inside: avoid; /* Avoid page break inside the row */   }  .col-lg-6 {  width: 50%; /* Adjust column width for printing */    float: left; /* Float the columns for printing */    }  img {  max-width: 100%; /* Ensure images fit within the print layout */    }table.doc-table {border-collapse: collapse;margin: 20px 0;}table.doc-table td,.table.doc-table th {border: 1px solid #dddddd;text-align: left;padding: 8px;}.candidate-photo {display: inline-block;height: 140px;width: 140px;padding: 5px;text-align: center;position: absolute; right: 4.8%;border: 1px solid #888888;}}</style>');

                var divIds = [Employeedetails, Interviewdetails, AppointmentOrder, Employeecontract, EmpAttention, EmployeeStating, Empformno34, Empserviceimprovement, Emptraining, Empform2, EmpGratuity, EmpConfirmation, EmpNDA];

                // Loop through the div IDs and add them to separate pages
                for (var i = 0; i < divIds.length; i++) {

                    var divContent = divIds[i];

                    printWindow.document.write('<div class="page-break" style="page-break-before: always !important;">' + divContent + '</div>');

                }


                printWindow.document.write('</body></html>');

                printWindow.document.close();
                printWindow.print();
            }, 1000);

        });
    });
    //////////////////////////////////////
    $(function () {


        $("#btnEmpReportHindi").click(function () {

            $scope.CheckingSession();

            $scope.FetchEmployee($scope.Employeeid);
            $scope.FetchEmpNominee2($scope.Employeeid);
            $scope.DisplayEmpFamily();
            $scope.DisplayEmpNominee();
            setTimeout(function () {
                var Employeedetails = $("#pdfExportempdetailhindi").html();
                var Interviewdetails = $("#pdfExportInterviewdetailhindi").html();
                var AppointmentOrder = $("#pdfExportAppointmentorderHindi").html();
                var Employeecontract = $("#pdfExportEmployeeContract").html();
                var EmployeeStating = $("#pdfExporEmpStatingHindi").html();
                var Empformno34 = $("#pdfExporform34hindi").html();
                var Empserviceimprovement = $("#pdfExportEmpServiceHindi").html();
                var Emptraining = $("#pdfExporEmpTrainigHindi").html();
                var Empform2 = $("#pdfExportEmpForm2RevisedHindi").html();
                var EmpGratuity = $("#pdfExportGratuity").html();
                var EmpConfirmation = $("#pdfExportConfirmationorderHindi").html();
                var EmpNDA = $("#pdfExporEmpAgreementHindi").html();
                var EmpAttention = $("#pdfExporEmpAttentionhindi").html();

                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Employee Report(Hindi)</title></head><body>');

                printWindow.document.write('<style></style>');  

                var divIds = [Employeedetails, Interviewdetails, AppointmentOrder, Employeecontract, EmpAttention, EmployeeStating, Empformno34, Empserviceimprovement, Emptraining, Empform2, EmpGratuity, EmpConfirmation, EmpNDA];

                // Loop through the div IDs and add them to separate pages
                for (var i = 0; i < divIds.length; i++) {
                    var divId = divIds[i];
                    var divContent = divIds[i];

                    printWindow.document.write('<div class="page-break" style="page-break-before: always !important;">' + divContent + '</div>');
                }


                printWindow.document.write('</body></html>');

                printWindow.document.close();
                printWindow.print();
            }, 1000);

        });
    });

    /////////////////////////
    ////////////////////////////
    $(document).ready(function (e) {
        $scope.CheckingSession();
        $('#fileButtonEmpReporttamil').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpReporttamil').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpReporttamil').files[x]);
            }
            form_data.append("Employeeid", $("#Employeeid").val());
            $.ajax({
                url: 'UploadEmpformtamil.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpReporttamil").value = '';
                    $scope.FetchTamilhindidocument();
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });

        $('#fileButtonEmpReporthindi').on('click', function () {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputEmpReporthindi').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputEmpReporthindi').files[x]);
            }
            form_data.append("Employeeid", $("#Employeeid").val());
            $.ajax({
                url: 'UploadEmpformhindi.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    alert(response);
                    document.getElementById("fileInputEmpReporthindi").value = '';
                    $scope.FetchTamilhindidocument();
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

                    // display success response from the PHP script
                },
                error: function (response) {
                    // alert(response);
                    $('#msg1').html(response);
                    setTimeout(function () {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });

    ///////////
    $scope.FetchTamilhindidocument = function () {


        $http({
            method: "POST",
            url: "Employee.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'fetchTamilHindi' },
            headers: { 'Content-Type': 'application-json' }
        })
            .then(function successCallback(response) {

                $scope.Empformstamilpath = response.data.Empformstamilpath;
                $scope.Empformshindipath = response.data.Empformshindipath;

            });
    }
    /////////////////////////////////////////////
    $scope.GetAssetCategory = function () {
        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Method': 'AssetCategory' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.GetCategoryList = response.data.mytbl;
        });

    }


    $scope.GetAssetListnew = function () {


        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Assetcategoryid': $scope.Assetcategoryid, 'Method': 'AssetCategoryList' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.GetAssetList = response.data.mytbl;
            $scope.Assetcategory = response.data.Assetcategory;
            $scope.Shortcode = response.data.Shortcode;
            // $scope.GetReturnDetails ();
        });


    }


    $scope.GetAssetname = function () {
        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Assetlistid': $scope.Assetlistid, 'Method': 'AssetName' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Assetcode = response.data.Assetcode;
            $scope.Assetname = response.data.Assetname;
            $scope.Shortcode = response.data.Shortcode;
        });

    }

    $scope.SendAssetPropert = function (Employeeid, Sno) {
        $scope.Employeeid = Employeeid;
        $scope.CheckitemSno = Sno;
        $scope.FetchPropertyChecklist(Employeeid, Sno);
        $('#ModalCenterAssetAdd').modal('show');

    }

    $scope.folder = {};
    $scope.returnfolder = {};
    // $scope.selectedItems = [];
    // $scope.returnselectedItems = [];

    // Function to toggle selection of an item


    $scope.GetAssetReturn = function () {
        $scope.CheckingSession();
        $scope.getAllSelected();
        if ($scope.selectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.selectedItems, 'Method': 'AssetReturn' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;

                $scope.GetAssetAllocatePrintAuto($scope.Itemsnodetail, "Employee Asset Return");
                //  alert($scope.Itemsnodetail);


                $scope.GetReturnDetails();
                $scope.DisplayPropertyChecklist();
                $scope.DisplayAssetLog();
                $scope.folder = {};

            });
        }
    }




    $scope.GetAssetReallocation = function () {
        $scope.CheckingSession();
        $scope.getreturnAllSelected();
        if ($scope.returnselectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: { 'Employeeid': $scope.Employeeid, 'Listedno': $scope.returnselectedItems, 'Method': 'AssetReallocation' },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                response = response.data;
                console.log(response);
                $scope.Itemsnodetail = response.Itemsnodetail;
                $scope.GetAssetReturnPrintAuto($scope.Itemsnodetail, "Employee Asset Reallocation");
                $scope.DisplayPropertyChecklist();
                $scope.GetReturnDetails();
                $scope.DisplayAssetLog();
                $scope.returnfolder = {};

            });
        }
    }


    $scope.GetReturnDetails = function () {
        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'ReturnList' },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {

            $scope.GetPropertyReturnList = response.data.mytbl;

        });
    }
    $scope.folder = {};
    $scope.returnfolder = {};
    $scope.currentPageReturn = 1;
    $scope.pageSizeReturn = 10;
    $scope.getAllSelected = function () {
        $scope.selectedItems = [];
        angular.forEach($scope.folder, function (key, value) {
            $scope.selectedItems.push(value);
        });
    }

    $scope.getreturnAllSelected = function () {

        $scope.returnselectedItems = [];


        angular.forEach($scope.returnfolder, function (key, value) {
            if (key)
                $scope.returnselectedItems.push(value)
        });
    }
    $scope.currentPageprintasset = 1;
    $scope.pageSizeprintasset = 10;
    ///////////////
    $scope.GetAssetAllocatePrint = function () {
        $scope.CheckingSession();
        $scope.getAllSelected();
        $scope.EmpAssetTittle = "Employee Asset Allocation";
        $scope.Assetmode = "Allocate";
        $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
        if ($scope.selectedItems.length === 0) {

            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.selectedItems,
                    'Testno': 1, 'Method': 'AssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {

                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }
    /////////////////////////////
    $scope.GetAssetReturnPrint = function () {
        $scope.getreturnAllSelected();
        $scope.EmpAssetTittle = "Employee Asset Return";
        $scope.Titlename = $scope.Employeeid + "-" + "Return";
        $scope.Assetmode = "Allocate";
        if ($scope.returnselectedItems.length === 0) {
            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.returnselectedItems,
                    'Testno': 1,
                    'Method': 'ReturnAssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {
                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }
    //////////////////////////////////////

    $(function () {
        $("#btnassetprint").click(function () {

            var HTML_Width = $("#pdfExportAssetprint").width();
            var HTML_Height = $("#pdfExportAssetprint").height();

            var filename = $scope.Titlename;
            var data = document.getElementById('pdfExportAssetprint');
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


                var currentTime = new Date();

                // Format the current time as YYYYMMDDHHmmss
                var formattedTime = currentTime.getFullYear() +
                    ('0' + (currentTime.getMonth() + 1)).slice(-2) +
                    ('0' + currentTime.getDate()).slice(-2) +
                    ('0' + currentTime.getHours()).slice(-2) +
                    ('0' + currentTime.getMinutes()).slice(-2) +
                    ('0' + currentTime.getSeconds()).slice(-2);
                pdf.save(filename + "-" + formattedTime + '.pdf');



                // window.open(pdf.output('bloburl', {
                //     filename: 'new-file.pdf'
                // }), '_blank');
            });

        });
    });
    ///////////////////////////////
    $('#myDiv').hide();
    $('body').on('submit', "#Assuploaddocform", function (e) {
        $scope.CheckingSession();
        e.preventDefault();

        var file = $('#assuploadfile').prop('files')[0];
        if (file == undefined) {

            $('#myDiv').show();
            $('#msgtst').text("Please Choose the file");
            setTimeout(function () {
                $('#msgtst').empty().append("");
                $('#myDiv').hide();
                // $scope.Messagenew = false;
            }, 3000);

            return;
        }




        $('#myDiv').show();
        $('#msgtst').text("Please wait file is processing.........");

        var form_data = new FormData(this);

        $.ajax({
            url: 'UploadAssetDocument.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            dataType: 'json',
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (res) {
                // alert(res.status);
                $('#myDiv').show();
                if (res.status == 'success') {

                    $('#msgtst').text("File Upload Successfully.....");
                    $('#ModalCenterAssetUpload').modal('hide');

                    $("#Assuploaddocform")[0].reset();
                    $scope.DisplayAssetLog();

                }

                if (res.status == 'Note') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Enter the Notes");

                }

                if (res.status == 'NoFile') {
                    //window.location.href = res.path;
                    $('#msgtst').text("Please Choose the file");

                }


                //alert(response);


                //  $scope.Messagenew = true;



                setTimeout(function () {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            },
            error: function (response) {
                $('#myDiv').show();
                $('#msg1').text("Error in processing.........");
                setTimeout(function () {
                    $('#msg1').empty().append("");
                    $('#myDiv').hide();
                    // $scope.Messagenew = false;
                }, 3000);

            }
        });
    });
    /////////////////////////////////////////
    $scope.Assetupload = function (Mode) {
        var Assettype = Mode;
        if (Mode == 'A') {
            $scope.Assetuploadtitle = "Asset Allocation Document Upload";
        }
        if (Mode == 'R') {
            $scope.Assetuploadtitle = "Asset Return Document Upload";
        }
        var Empid = $scope.Employeeid;
        $('#Empid').val(Empid);
        $('#Assettype').val(Assettype);

        $('#ModalCenterAssetUpload').modal('show');
    }

    $scope.DisplayAssetLog = function () {



        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: { 'Employeeid': $scope.Employeeid, 'Method': 'EMPASSETLIST' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogList = response.data;


        });

    };
    ///////////////////////
    $scope.GetAssetDoc = function (Assetdocumentpath) {
        $scope.Assetdocumentpath = Assetdocumentpath;
        $('#ModalCenterAssetDocumentView').modal('show');

    }
    //////////////

    $scope.getAllocateStyle = function () {
        return {
            color: 'Darkgreen',
            border: '1px solid green'
        };
    };

    $scope.getStyle = function () {
        return {
            color: 'red',
            border: '1px solid red'
        };
    };

    $scope.getAllocateStyleP = function () {
        return {
            color: 'Darkgreen',
            fontSize: '13px'


        };
    };

    $scope.getStyleP = function () {
        return {
            color: 'red',
            fontSize: '13px'

        };
    };
    ////////////////////


    //var aliasDet = $("<tbody><tr class='bRow'><td class='sno'>1</td><td><select class='form-control assetCategory ' name='assetCategory[]'></select></td><td><select class='form-control assetList ' name='assetList[]'></td><td><input type='text' class='form-control ' name='Assetcode[]'  readonly></td><td><input type='date' class='form-control ' name='Distributedate[]' /></td><td><a class='btn btn-primary text-success addassetdetails' href='#'>+</a><a class='btn btn-danger  removeasset' href='#'>-</a></td></tr></tbody>");
    var aliasDet = $("<tr class='bRow'>" +
        "<td class='sno'>1</td>" +
        "<td><select class='form-control assetCategory' name='assetCategory[]'></select></td>" +
        "<td><select class='form-control assetList' name='assetList[]'></select></td>" +
        "<td><input type='text ' class='form-control assetCode' name='Assetcode[]' readonly></td>" +
        "<td><input type='date' class='form-control Distributedate' name='Distributedate[]' /></td>" +
        "<td>" +
        "<a class=' btn btn-success btn-spacing btn-smaller addassetdetails' href='#'><i class='fa fa-plus'></i></a>" +
        "<a class='btn btn-danger btn-spacing btn-smaller removeasset' href='#'><i class='fa fa-minus'></i></a>" +
        "</td>" +
        "</tr>");
    var today = new Date().toISOString().slice(0, 10);



    $("body").on("click", ".addassetdetails", function () {
        // var aliasDetRow = aliasDet.clone();
        // var tb = $(this).parents("#AddAsset").find("tbody");

        // var sno = tb.find("tr.bRow").length + 1;
        // aliasDetRow.find(".sno").text(sno);
        // aliasDetRow.find(".Distributedate").val(today);



        // var newTableRow = tb.find("tr:last");
        // if(newTableRow.index()==0)
        // {
        //      selectedAssetListIds = [];
        // }




        // var assetCategorySelect = aliasDetRow.find(".assetCategory");
        // populateAssetCategories(assetCategorySelect);
        // tb.append(aliasDetRow);

        var aliasDetRow = aliasDet.clone();
        var tb = $(this).parents("#AddAsset").find("tbody");
        var clickedRow = $(this).closest("tr");

        var totalRows = tb.find("tr.bRow").length;
        var clickedIndex = clickedRow.index();

        // Calculate the sno for the new row
        var sno = totalRows + 1;

        aliasDetRow.find(".sno").text(sno);
        aliasDetRow.find(".Distributedate").val(today);

        var assetCategorySelect = aliasDetRow.find(".assetCategory");
        populateAssetCategories(assetCategorySelect);



        // Insert the new row after the clicked row
        if (clickedIndex >= 0 && clickedIndex < totalRows) {
            tb.find("tr.bRow").eq(clickedIndex).after(aliasDetRow);

            // Update sno values for all rows
            tb.find("tr.bRow").each(function (index, row) {
                $(row).find(".sno").text(index + 1);
            });
        } else {
            // If clickedIndex is not valid, just append the new row to the end
            selectedAssetListIds = [];
            tb.append(aliasDetRow);
        }

    });

    function genSno(row) {
        var tbl = row.parent('tbody').parent('table').attr('id')
        row.remove()
        $('#' + tbl).find('tbody').find('tr').each(function (index, el) {
            $(el).find(".sno").text(index + 1)
        });
        if ($('#' + tbl).find('tbody').find('tr').length == 0) {
            $('#' + tbl).find('tbody').attr('data-added', 'no').html('<tr><td colspan="3">No alias</td></tr>')
        }
    }

    $('body').on("click", ".removeasset", function () {
        var row = $(this).parents('tr');
        var aid = row.find(".sno").val();
        var assetListId = row.find(".assetList").val();

        // Find the index of the assetListId in the array
        var index = selectedAssetListIds.indexOf(assetListId);
        if (index !== -1) {
            // Remove the assetListId from the array
            selectedAssetListIds.splice(index, 1);
        }
        genSno(row);

    });
    var selectedAssetListIds = [];

    function populateAssetCategories(assetCategorySelect) {

        $.ajax({
            url: "Getassetcategory.php",
            type: "POST",
            data: { Asset: '1' },
            success: function (data) {

                assetCategorySelect.html(data);
                assetCategorySelect.val("")
                // assetCategorySelect.trigger("change");
            }
        });
    }
    //////////////////////
    function populateAssetLists(assetListSelect, assetCategoryId) {
        $.ajax({
            url: "Getassetcategory.php",
            type: "POST",
            data: { Asset: '2', assetCategoryId: assetCategoryId },
            dataType: "json",
            success: function (data) {



                // assetListSelect.html(data);


                assetListSelect.empty(); // Clear previous options
                $.each(data, function (index, asset) {
                    if (selectedAssetListIds.indexOf(asset.Assetlistid) === -1) {
                        assetListSelect.append("<option value='" + asset.Assetlistid + "'>" + asset.Assetname + "</option>");
                    }
                });

                assetListSelect.val("")
                // assetListSelect.trigger("change");
            }
        });
    }
    /////////////////////
    $("body").on("change", ".assetCategory", function () {


        var assetListSelect = $(this).closest("tr").find(".assetList");
        var assetCategoryId = $(this).val();
        populateAssetLists(assetListSelect, assetCategoryId);


    });
    ////////////////////////////////
    //   $("body").on("change", ".assetCategory", function() {
    //     var assetListSelect = $(this).closest("tr").find(".assetList");
    //     var assetCategoryId = $(this).val();
    //     populateAssetLists(assetListSelect, assetCategoryId);
    //     $(".assetList").each(function() {
    //         $(this).trigger("change");
    //       });
    //   });
    ///////////////////////////////
    $("body").on("change", ".assetList", function () {
        var assetCodeInput = $(this).closest("tr").find(".assetCode");
        var assetCategoryId = $(this).closest("tr").find(".assetCategory").val();
        var assetListId = $(this).val();



        selectedAssetListIds.push(assetListId);
        populateAssetCodes(assetCodeInput, assetCategoryId, assetListId);
    });

    ////////////////////////////////////////////
    function populateAssetCodes(inputElement, assetCategoryId, assetListId) {
        $.ajax({
            url: "Getassetcategory.php",
            type: "POST",
            data: {
                Asset: '3',
                assetCategoryId: assetCategoryId,
                assetListId: assetListId
            },

            success: function (data) {

                // Display the first asset code (you can adjust this based on your requirement)
                data = data.trim();
                inputElement.val(data);

            }
        });
    }
    ////////////////////////////////////
    $("body").on("submit", "#AssetAllocation", function (e) {
        $scope.CheckingSession();
        e.preventDefault();
        var Empid = $scope.Employeeid;
        $('#emplid').val(Empid);
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "SaveProperty.php",
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                $scope.DisplayPropertyChecklist();
                $scope.GetReturnDetails();
                $scope.DisplayAssetLog();
                if (res.status == 'OK') {

                    $("#ModalCenterdynamicAdd").modal('hide');
                    alert('saved successfully');
                    $("#AssetAllocation")[0].reset();
                    $("#AddAsset tbody").empty();
                    var listedno = res.ListedNo;
                    $scope.GetAssetAllocatePrintAuto(listedno, "Employee Asset Allocation");
                } else {
                    alert(res.msg)
                }
            }
        });
    });
    ////////////////////////////
    $scope.currentPageAssetlist = 1;
    $scope.pageSizeAssetlist = 10;

    $scope.GetAssetListlogdetails = function (Asselistid) {
        $scope.Asselistid = Asselistid;
        $scope.CheckingSession();
        $http({



            method: "POST",
            url: "Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Assetlistids': $scope.Asselistid,
                'Method': 'EMPLOGLIST'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            $scope.GetAssetLogvieeeList = response.data.mytbl;


        });

    }



    $scope.GetAssetAllocatePrintAuto = function (Listedno, Title) {

        $scope.testttt = Listedno;
        $scope.EmpAssetTittle = Title;

        //  $scope.EmpAssetTittle = "Employee Asset Allocation";
        $scope.Assetmode = "Allocate";
        $scope.Titlename = $scope.Employeeid + "-" + "Allocate";
        if ($scope.testttt.length === 0) {

            $scope.Message = true;
            $scope.Message = "Please Select Asset Item";
            $timeout(function () { $scope.Message = ""; }, 3000);
        } else {

            $http({
                method: 'post',
                url: "Propertychecklist.php",
                data: {
                    'Employeeid': $scope.Employeeid,
                    'Listedno': $scope.testttt,
                    'Testno': 0,
                    'Method': 'AssetPrint'
                },
                headers: { 'Content-Type': 'application/json' }
            }).then(function successCallback(response) {


                $scope.GetPropertyPageAssetList = response.data.mytbl;
                $('#ModalCenter1AssetPrint').modal('show');
            });
        }
    }

    //////////////////////

    $scope.GetAssetReturnPrintAuto = function (Listedno, Title) {

        $scope.testttt = Listedno;
        $scope.EmpAssetTittle = Title;
        $scope.Titlename = $scope.Employeeid + "-" + "Return";
        $scope.Assetmode = "Allocate";


        $http({
            method: 'post',
            url: "Propertychecklist.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'Listedno': $scope.testttt,
                'Testno': 0,
                'Method': 'ReturnAssetPrint'
            },
            headers: { 'Content-Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.GetPropertyPageAssetList = response.data.mytbl;
            $('#ModalCenter1AssetPrint').modal('show');
        });

    }
    ///////////////////////////
    $scope.CopyTempAddress = function () {




        $scope.PermanentAddress = $scope.CurrentAddress;
        $scope.PermanentCountry = $scope.CurrentCountry;
        $scope.GetPerstate();
        $scope.PermanentState = $scope.CurrentState;
        $scope.GetPerCity();
        $scope.PermanentCity = $scope.CurrentCity;
        $scope.PermanentPincode = $scope.CurrentPincode;

    }
    $scope.GetAuthorization = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: {

                'Method': "FETCHAUTHORIZATION"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {
            $scope.Authorizedno = response.data.Authorization;
            // alert(response.data.Authorization);
            $scope.Showmenu($scope.Authorizedno);
        });

    }

    $scope.Showmenu = function (Authorizedno) {
        $scope.Authorizedno = Authorizedno;

        if ($scope.Authorizedno == 13) {

            $scope.userviewrole = 0;
            $scope.fnpropertychecklistinfo();
        }
        else {
            $scope.userviewrole = 1;
        }
    }
    //////////////////////////////////////////
    $http({
        method: "POST",
        url: "../HRM22/job.php",
        data: { 'Method': 'Maritalstatus' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetMaritalstatusList = response.data;
    });
    //////////////////////////////
    $scope.GETESSLCODE = function () {

        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Old_Empid': $scope.Old_Empid,
                'Method': 'EsslUnique'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
            //alert($scope.selectedValue);

            $scope.TempMessage = response.data.Message;



            $scope.TempSave();
        });

    };
    $http({
        method: "POST",
        url: "../HRM09/Candidate.php",
        data: { 'Method': 'EDUCATIONMODE' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetEducationModeList = response.data;

    });
    $http({
        method: "POST",
        url: "../HRM09/Candidate.php",
        data: { 'Method': 'SPECIALIZATION' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {


        $scope.GetSpecializationList = response.data;

    });



    /////////////////////////////////////// DK EDit
    $scope.getperformanceassement = function () {
        $http({
            method: "POST",
            url: "Employee.php",
            data: {
                'Employeeid': $scope.Employeeid,
                'EmpDepartment': $scope.EmpDepartment,
                'Method': "LEAVECOUNT"
            },
            headers: { 'Content_Type': 'application/json' }
        }).then(function successCallback(response) {

            //$scope.test = response.data.test;
            $scope.TotalWorkingdays = response.data.TotalWorkingdays;
            $scope.TotalTakenEL = response.data.TotalTakenEL;
            $scope.TotalLOPdays = response.data.TotalLOPdays;
            $scope.current_year = response.data.current_year;
            $scope.previous_year = response.data.previous_year;
            $scope.ReportToEmpName = response.data.ReportToEmpName;
          //  alert($scope.ReportToEmpName);
        });
    }
    ////////////////////////////////



    ///////////////////////////////
    $http({
        method: "POST",
        url: "../HRM09/Candidate.php",
        data: { 'Method': 'BLOODGROUP' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
        $scope.GetBloodGroupList = response.data;
    });
    /////////////////////////
    $scope.GetIFSCexists = function () {

        $scope.CheckingSession();
        $http({
            method: "post",
            url: "Employee.php",
            data: {


                'IFSCcode': $scope.IFSCcode,



                'Method': 'BANKIFSC'

            },
            headers: { 'Content-Type': 'application-json' }
        }).then(function successCallback(response) {

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();

        });

    }
    /////////////////
    function frontidcard4() {

        var Empid = $('#Employeeid').val();
        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;


        html2canvas($("#Empfront4")[0], {
            scale: 2,
            useCORS: true, // Enable if the div contains an image from a different domain
        }).then(function (canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empfront.jpg";;
            link.href = image;
            link.click();
            backidcard4();
        });

    }

    function backidcard4() {


        var Empid = $('#Employeeid').val();

        var divWidth = $(window).width();; // Desired width of the exported image
        var divHeight = $(window).height();;




        html2canvas($("#Empback4")[0], {
            scale: 2,
            useCORS: true,
            // Enable if the div contains an image from a different domain
        }).then(function (canvas) {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var link = document.createElement("a");
            link.download = Empid + "_Empback.jpg";;
            link.href = image;
            link.click();

        });

    }

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
});