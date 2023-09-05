<?php 

function($conn,$Employeeid,$Clientid,$Department,$Designation,$Category)
{
    try
    {
        $newEmployeeid = "";
    $insertCandidateHistory = "INSERT INTO indsys1017employeemaster (Clientid,Candidateid,Title,Firstname,Fullname,Lastname,Languages,Mother_tong,DOB,Age,Bloodgroup,Nationality,Country,
    Department,Emaild,Marital_status,Date_Of_Joing,Relocate,Previous_sainmarks_department,Gender,Contactno,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,
    Employee_Rights,Basic,HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,
     Net_Salary,Gross_Salary,Empusername,Emppassword,Designation,EmpActive,Empimage,Type_Of_Posistion,Expereienced,Fresher,ESIno,UANno,Aadharno,Panno,
     Vacinated,EmployeeType,PFJoindate,ESIJoindate,Bonouspercentage,Leftreason,Leftdate,Covidvacinnated,Covidvaccinationcertificatepath,Coviddose,
     Covidlastvaccinateddate,Handoverthedocument,Handoverto,Empservingnoticeperiod,Emprequestresignationdate,PFEmployeeCompany,ESIEmployeeCompany,
     Highestqualification,EmployeeDetailpathtamil,Form34pathtamil,Attentionoftheemployeepathtamil,Employeedeclarationpathtamil,Employeecontractpathtamil,Employeestatingpathtamil,Employeeagreemantpathtamil,
     Serviceimprovementpathrecordtamil,Employeetrainingpathtamil,Form2revisedpathtamil,EmployeeDetailpathhindi,Form34pathtamilhindi,Attentionoftheemployeepathhindi,Employeedeclarationpathhindi,Employeecontractpathhindi,Employeestatingpathhindi,
     Employeeagreemantpathhindi,Serviceimprovementpathrecordlhindi,Employeetrainingpathhindi,Form2revisedpathhindi,FatherGuardianSpouseName,LastAppresialDate,SalaryType,BackgroundVerification,BackgroundVerificationpath,Employee_NDA_Path,GratutityPath,Smsverified,Emailverified,OfficemailID,PF_Fixed,Employeeid) 
    SELECT Clientid,Candidateid,Title,Firstname,Fullname,Lastname,Languages,Mother_tong,DOB,Age,Bloodgroup,Nationality,Country,
Department,Emaild,Marital_status,Date_Of_Joing,Relocate,Previous_sainmarks_department,Gender,Contactno,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,
Employee_Rights,Basic,HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,
 Net_Salary,Gross_Salary,Empusername,Emppassword,Designation,EmpActive,Empimage,Type_Of_Posistion,Expereienced,Fresher,ESIno,UANno,Aadharno,Panno,
 Vacinated,EmployeeType,PFJoindate,ESIJoindate,Bonouspercentage,Leftreason,Leftdate,Covidvacinnated,Covidvaccinationcertificatepath,Coviddose,
 Covidlastvaccinateddate,Handoverthedocument,Handoverto,Empservingnoticeperiod,Emprequestresignationdate,PFEmployeeCompany,ESIEmployeeCompany,
 Highestqualification,EmployeeDetailpathtamil,Form34pathtamil,Attentionoftheemployeepathtamil,Employeedeclarationpathtamil,Employeecontractpathtamil,Employeestatingpathtamil,Employeeagreemantpathtamil,
 Serviceimprovementpathrecordtamil,Employeetrainingpathtamil,Form2revisedpathtamil,EmployeeDetailpathhindi,Form34pathtamilhindi,Attentionoftheemployeepathhindi,Employeedeclarationpathhindi,Employeecontractpathhindi,Employeestatingpathhindi,
 Employeeagreemantpathhindi,Serviceimprovementpathrecordlhindi,Employeetrainingpathhindi,Form2revisedpathhindi,FatherGuardianSpouseName,LastAppresialDate,SalaryType,BackgroundVerification,BackgroundVerificationpath,Employee_NDA_Path,GratutityPath,Smsverified,Emailverified,OfficemailID,PF_Fixed,'$newEmployeeid' FROM indsys1017employeemaster WHERE Employeeid ='$Employeeid' AND Clientid='$Clientid'";
      $resultinsertCandidateHistory = $conn->query($insertCandidateHistory); 
 

    }
    catch(Exception $e)
    {

    }
}
?>