<?php 
include 'session.php';
$Menus = [
    ['menucode' => 'Dashboard', 'name' => 'Dashboard'],
    ['menucode' => 'Settings', 'name' => 'Settings'],
    ['menucode' => 'Jobapplication', 'name' => 'Job Application'],
    ['menucode' => 'Candidate', 'name' => 'Candidate'],
    ['menucode' => 'Employee', 'name' => 'Employee'],
    ['menucode' => 'EmployeeExit', 'name' => 'Employee Exit'],
    ['menucode' => 'Payroll', 'name' => 'Payroll'],
    ['menucode' => 'Documents', 'name' => 'Documents'],
    ['menucode' => 'Assets', 'name' => 'Assets'],
    ['menucode' => 'Reports', 'name' => 'Reports'],
    ['menucode' => 'AttendanceReports', 'name' => 'Attendance Reports'],

];
$submenus = [
    'Dashboard' => [
        ['submenucode' => 'Dashboardview', 'name' => 'Dashboard View']

    ],
    'Settings' => [
        ['submenucode' => 'Department', 'name' => 'Department'],
        ['submenucode' => 'Designation', 'name' => 'Designation'],
        ['submenucode' => 'CompanyDoc', 'name' => 'Company Doc'],
        ['submenucode' => 'Shift', 'name' => 'Shift'],
        ['submenucode' => 'Country', 'name' => 'Country'],
        ['submenucode' => 'States', 'name' => 'States'],
        ['submenucode' => 'City', 'name' => 'City'],
        ['submenucode' => 'Holiday', 'name' => 'Holiday'],
        ['submenucode' => 'BloodGroup', 'name' => 'Blood Group'],
        ['submenucode' => 'EducationMode', 'name' => 'EducationMode'],
        ['submenucode' => 'Specialization', 'name' => 'Specialization'],
        ['submenucode' => 'IndustrialType', 'name' => 'Industrial Type'],
        ['submenucode' => 'DocumentType', 'name' => 'Document Type'],
        ['submenucode' => 'Languages', 'name' => 'Languages'],
        ['submenucode' => 'Relationship', 'name' => 'Relation Ship'],
        ['submenucode' => 'Qualification', 'name' => 'Qualification'],
        ['submenucode' => 'DepartmentHead', 'name' => 'Department Head'],
        ['submenucode' => 'Location', 'name' => 'Location'],
        ['submenucode' => 'Rolesrights', 'name' => 'Roles Rights'],

    ],
    'Jobapplication' => [
        ['submenucode' => 'JobapplicationAdd', 'name' => 'Add'],
        ['submenucode' => 'JobapplicationEdit', 'name' => 'Edit'],
        ['submenucode' => 'JobapplicationView', 'name' => 'View'],
    ],
    'AttendanceReports' => [
        ['submenucode' => 'AttendanceReportsPresent', 'name' => 'Present'],
        ['submenucode' => 'AttendanceReportsLeave', 'name' => 'Leave'],
        ['submenucode' => 'AttendanceReportsAbsent', 'name' => 'Absent'],
        ['submenucode' => 'AttendanceReportsOpen', 'name' => 'Attendance Open'],
    ],
    'Candidate' => [
        ['submenucode' => 'CandidateAdd', 'name' => 'Add'],
        ['submenucode' => 'CandidateEdit', 'name' => 'Edit'],
        ['submenucode' => 'CandidateView', 'name' => 'View'],
    ],
    'Employee' => [
        ['submenucode' => 'EmployeeAdd', 'name' => 'Add'],
        ['submenucode' => 'EmployeeEdit', 'name' => 'Edit'],
        ['submenucode' => 'EmployeeView', 'name' => 'View'],
        ['submenucode' => 'EmployeeDept', 'name' => 'Departmentwise Details'],
    ],
    'EmployeeExit' => [
        ['submenucode' => 'EmployeeExitAdd', 'name' => 'Add'],
        ['submenucode' => 'EmployeeExitEdit', 'name' => 'Edit'],
        ['submenucode' => 'EmployeeExitView', 'name' => 'View'],
    ],
    'Documents' => [
        ['submenucode' => 'DocumentsAdd', 'name' => 'Add'],
        ['submenucode' => 'DocumentsEdit', 'name' => 'Edit'],
        ['submenucode' => 'DocumentsView', 'name' => 'View'],
    ],
 
    'Payroll' => [
        ['submenucode' => 'PayAttendance', 'name' => 'Attendance'],
        ['submenucode' => 'PayAttendanceRpt', 'name' => 'Attendance Report'],
        ['submenucode' => 'PayForm12', 'name' => 'Form 12 & 25'],
        ['submenucode' => 'PayPayroll', 'name' => 'Payroll'],
        ['submenucode' => 'PayDeductionUpload', 'name' => 'Deduction Upload'],
        ['submenucode' => 'PayESIList', 'name' => 'ESI List'],
        ['submenucode' => 'PayDeductionList', 'name' => 'Deduction List'],
        ['submenucode' => 'PayPayslip', 'name' => 'Payslip'],
        ['submenucode' => 'PayCategorywisePayroll', 'name' => 'Categorywise Payroll'],
        ['submenucode' => 'PayBankRpt', 'name' => 'Bank Report'],
        ['submenucode' => 'PayCategorywiseAttendance', 'name' => 'Categorywise Attendance'],
        ['submenucode' => 'PayBulkPayslip', 'name' => 'Bulk Payslip'],
      



    ],
    'Assets' => [
        ['submenucode' => 'AssetsCategory', 'name' => 'Category'],
        ['submenucode' => 'AssetList', 'name' => 'Asset List']
        
    ],
    'Reports' => [
        ['submenucode' => 'RptAsset', 'name' => 'Assets Allocated']

    ],
    // Add more submenus as needed
]; 

if ($_SESSION["Clientid"]==4) {
    $submenus['Payroll'][] = ['submenucode' => 'PayTimeRecord', 'name' => 'Time Record'];
    $submenus['Payroll'][] = ['submenucode' => 'PaySalarySheet', 'name' => 'Salary Sheet'];
    $submenus['Payroll'][] = ['submenucode' => 'PayCloseAttendance', 'name' => 'Close Attendance'];
}
?>