<<<<<<< HEAD
<?php 


$menu = [
    'Dashboard' => [
        'label' => 'Dashboard',
        'icon' => 'fa fa-line-chart',
        'url' => $domain . '/dashboard.php',
        'Menucode' => 'Dashboard',
        'submenucode' => 'Dashboardview',
        'pageactiveurl' =>'dashboard',
        'default_url' => $domain . '/dashboard.php'
    ],
    'Settings' => [
        'label' => 'Settings',
        'icon' => 'fa fa-cog',
        'url' => '#',
        'Menucode' => 'Settings',
        'submenus' => [
            'Department' => [
                'label' => 'Department',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM01/AddDepartment.php',
                'submenucode' => 'Department',
                'pageactiveurl' =>'adddepartment'
            ],
            'Designation' => [
                'label' => 'Designation',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM04/AddDesignation.php',
                'submenucode' => 'Designation',
                'pageactiveurl' =>'adddesignation'
            ],
            'CompanyDoc' => [
                'label' => 'Company Doc',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM46/Addcompanydocument.php',
                'submenucode' => 'CompanyDoc',
                'pageactiveurl' =>'addcompanydocument'
            ],
            'Shift' => [
                'label' => 'Shift',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM05/AddShift.php',
                'submenucode' => 'Shift',
                'pageactiveurl' =>'addshift'
            ],
            'Country' => [
                'label' => 'Country',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM06/AddCountry.php',
                'submenucode' => 'Country',
                'pageactiveurl' =>'addcountry'
            ],
            'States' => [
                'label' => 'States',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM07/AddState.php',
                'submenucode' => 'States',
                'pageactiveurl' =>'addstate'
            ],
            'City' => [
                'label' => 'City',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM03/AddCity.php',
                'submenucode' => 'City',
                'pageactiveurl' =>'addcity'
            ],
            'Holiday' => [
                'label' => 'Holiday',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM08/AddHoliday.php',
                'submenucode' => 'Holiday',
                'pageactiveurl' =>'addholiday'
            ],
            'BloodGroup' => [
                'label' => 'Blood Group',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM51/AddBloodgrp.php',
                'submenucode' => 'BloodGroup',
                'pageactiveurl' =>'addbloodgrp'
            ],
            'EducationMode' => [
                'label' => 'Education Mode',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM52/Addeducation.php',
                'submenucode' => 'EducationMode',
                'pageactiveurl' =>'addeducation'
            ],
            'Specialization' => [
                'label' => 'Specialization',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM53/AddeduSpecialization.php',
                'submenucode' => 'Specialization',
                'pageactiveurl' =>'addeduspecialization'
            ],
            'IndustrialType' => [
                'label' => 'Industrial Type',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM63/Addindustrialtype.php',
                'submenucode' => 'IndustrialType',
                'pageactiveurl' =>'addindustrialtype'
            ],
            'DocumentType' => [
                'label' => 'Document Type',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM11/AddDocumenttype.php',
                'submenucode' => 'DocumentType',
                'pageactiveurl' =>'adddocumenttype'
            ],
            'Rolesrights' => [
                'label' => 'Roles Rights',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/Rolesrights/Rolesrights.php',
                'submenucode' => 'Rolesrights',
                'pageactiveurl' =>'rolesrights'
            ],
            'Languages' => [
                'label' => 'Languages',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM12/AddLanguages.php',
                'submenucode' => 'Languages',
                'pageactiveurl' =>'addlanguages'
            ],
            'Relationship' => [
                'label' => 'Relationship',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM13/AddRelationship.php',
                'submenucode' => 'Relationship',
                'pageactiveurl' =>'addrelationship'
            ],
            'Qualification' => [
                'label' => 'Qualification',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM15/AddDegree.php',
                'submenucode' => 'Qualification',
                'pageactiveurl' =>'adddegree'
            ],
            'DepartmentHead' => [
                'label' => 'Department Head',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM36/AddDepartmenthead.php',
                'submenucode' => 'DepartmentHead',
                'pageactiveurl' =>'adddepartmenthead'
            ],
            'Location' => [
                'label' => 'Location',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM33/AddLocation.php',
                'submenucode' => 'Location',
                'pageactiveurl' =>'addlocation'
            ],
            

            

            // Add more submenus as needed
        ]
    ],
    'Jobapplication' => [
        'label' => 'Job Application',
        'icon' => 'fa fa-address-card-o',
        'url' => '#',
        'Menucode' => 'Jobapplication',
        'submenus' => [
            'JobapplicationAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM22/addjob.php',
                'submenucode' => 'JobapplicationAdd',
                'pageactiveurl' =>'addjob'
            ],
            'JobapplicationEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM22/editjob.php',
                'submenucode' => 'JobapplicationEdit',
                'pageactiveurl' =>'editjob'
            ],
            'JobapplicationView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM22/jobview.php',
                'submenucode' => 'JobapplicationView',
                'pageactiveurl' =>'jobview'
            ],
           
            

            // Add more submenus as needed
        ]
    ],
    'Candidate' => [
        'label' => 'Candidate',
        'icon' => 'fa fa-male',
        'url' => '#',
        'Menucode' => 'Candidate',
        'submenus' => [
            'CandidateAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM09/Addcandidate.php',
                'submenucode' => 'CandidateAdd',
                'pageactiveurl' =>'addcandidate'
            ],
            'CandidateEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM09/Editcandidate.php',
                'submenucode' => 'CandidateEdit',
                'pageactiveurl' =>'editcandidate'
            ],
            'CandidateView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM09/Viewcandidate.php',
                'submenucode' => 'CandidateView',
                'pageactiveurl' =>'viewcandidate'
            ],
           
            

            // Add more submenus as needed
        ]
    ],
    'Employee' => [
        'label' => 'Employee',
        'icon' => 'fa fa-user',
        'url' => '#',
        'Menucode' => 'Employee',
        'submenus' => [
            'EmployeeAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM10/AddEmployee.php',
                'submenucode' => 'EmployeeAdd',
                'pageactiveurl' =>'addemployee'
            ],
            'EmployeeEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM10/EditEmployee.php',
                'submenucode' => 'EmployeeEdit',
                'pageactiveurl' =>'editemployee'
            ],
            'EmployeeView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM10/ViewEmployee.php',
                'submenucode' => 'EmployeeView',
                'pageactiveurl' =>'viewemployee'
            ],
            'EmployeeDept' => [
                'label' => 'Departmentwise Details',
                'icon' => 'fa fa-table',
                'url' => $domain . '/HRM41/Employeedept.php',
                'submenucode' => 'EmployeeDept',
                'pageactiveurl' =>'employeedept'
            ],
           
            

           
        ]
    ],
    'EmployeeExit' => [
        'label' => 'Employee Exit',
        'icon' => 'fa fa-sign-out',
        'url' => '#',
        'Menucode' => 'EmployeeExit',
        'submenus' => [
            'EmployeeExitAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM27/AddEmp.php',
                'submenucode' => 'EmployeeExitAdd',
                'pageactiveurl' =>'addemp'
            ],
            'EmployeeExitEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM27/editExit.php',
                'submenucode' => 'EmployeeExitEdit',
                'pageactiveurl' =>'editexit'
            ],
            'EmployeeExitView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM27/View.php',
                'submenucode' => 'EmployeeExitView',
                'pageactiveurl' =>'view'
            ],
         
            

           
        ]
    ],
    'Payroll' => [
        'label' => 'Payroll',
        'icon' => 'fa fa-inr',
        'url' => '#',
        'Menucode' => 'Payroll',
        'submenus' => [
      
            'PayAttendanceRpt' => [
                'label' => 'Attendance Report',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM37/EmployeeDailyattandancerpt.php',
                'submenucode' => 'PayAttendanceRpt',
                'pageactiveurl' =>'employeedailyattandancerpt'
            ],
          
      
      
            'PayDeductionUpload' => [
                'label' => 'Deduction Upload',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Employeepayrolldeduction.php',
                'submenucode' => 'PayDeductionUpload',
                'pageactiveurl' =>'employeepayrolldeduction'
            ],
            'PayESIList' => [
                'label' => 'ESI List',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Empesidetails.php',
                'submenucode' => 'PayESIList',
                'pageactiveurl' =>'empesidetails'
            ],
            'PayDeductionList' => [
                'label' => 'Deduction List ',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Emppayrolldeductionlist.php',
                'submenucode' => 'PayDeductionList',
                'pageactiveurl' =>'emppayrolldeductionlist'
            ],
            'PayPayslip' => [
                'label' => 'Payslip',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Payrollclose.php',
                'submenucode' => 'PayPayslip',
                'pageactiveurl' =>'payrollclose'
            ],
            'PayCategorywisePayroll' => [
                'label' => 'Categorywise Payroll',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/PayrollRpt.php',
                'submenucode' => 'PayCategorywisePayroll',
                'pageactiveurl' =>'payrollrpt'
            ],
            'PayBankRpt' => [
                'label' => 'Bank Report',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Bankpayroll.php',
                'submenucode' => 'PayBankRpt',
                'pageactiveurl' =>'bankpayroll'
            ],
            'PayCategorywiseAttendance' => [
                'label' => 'Categorywise-Attendance',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Categorywise_attendanceview.php',
                'submenucode' => 'PayCategorywiseAttendance',
                'pageactiveurl' =>'categorywise_attendanceview'
            ],
         
            

           
        ]
    ],
    'Assets' => [
        'label' => 'Assets',
        'icon' => 'fa fa-yelp',
        'url' => '#',
        'Menucode' => 'Assets',
        'submenus' => [
            'AssetsCategory' => [
                'label' => 'Category',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM60/AddAsset.php',
                'submenucode' => 'AssetsCategory',
                'pageactiveurl' =>'addasset'
            ],
            'AssetList' => [
                'label' => 'Asset List',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM61/AddAssetlist.php',
                'submenucode' => 'AssetList',
                'pageactiveurl' =>'AssetList'
            ],
         
         
            

           
        ]
    ],
    'Documents' => [
        'label' => 'Documents',
        'icon' => 'fa fa-file-text-o',
        'url' => '#',
        'Menucode' => 'Documents',
        'submenus' => [
            'DocumentsAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM45/AddDocumentMaster.php',
                'submenucode' => 'DocumentsAdd',
                'pageactiveurl' =>'adddocumentmaster'
            ],
            'DocumentsEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM45/EditDocumentMaster.php',
                'submenucode' => 'DocumentsEdit',
                'pageactiveurl' =>'editdocumentmaster'
            ],
            'DocumentsView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM45/ViewDocumentMaster.php',
                'submenucode' => 'DocumentsView',
                'pageactiveurl' =>'viewdocumentmaster'
            ],
         
            

           
        ]
    ],
    'Reports' => [
        'label' => 'Reports',
        'icon' => 'fa fa-bar-chart',
        'url' => '#',
        'Menucode' => 'Reports',
        'submenus' => [
            'RptAsset' => [
                'label' => 'Asset Allocated',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM62/Assetreport.php',
                'submenucode' => 'RptAsset',
                'pageactiveurl' =>'assetreport'
            ],
           
         
            

           
        ]
    ],

    'AttReports' => [
        'label' => 'Reports',
        'icon' => 'fa fa-bar-chart',
        'url' => '#',
        'Menucode' => 'AttReports',
        'submenus' => [
            'AttendanceReportsPresent' => [
                'label' => 'Present Details',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM19/presentattendance.php',
                'submenucode' => 'AttendanceReportsPresent',
                'pageactiveurl' =>'presentattendance'
            ],
            'AttendanceReportsLeave' => [
                'label' => 'Leave Details',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM21/leaveattendance.php',
                'submenucode' => 'AttendanceReportsLeave',
                'pageactiveurl' =>'leaveattendance'
            ],
            'AttendanceReportsAbsent' => [
                'label' => 'Present Attendance',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM20/absentattendance.php',
                'submenucode' => 'AttendanceReportsAbsent',
                'pageactiveurl' =>'absentattendance'
            ],
            'AttendanceReportsOpen' => [
                'label' => 'Attendance Open',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/AttendanceOpen/AttendanceOpen.php',
                'submenucode' => 'AttendanceReportsOpen',
                'pageactiveurl' =>'attendanceopen'
            ],
           
         
            

           
        ]
    ],
    // Add more menus as needed
];
if ($_SESSION["Clientid"]==4) {
    $menu['Payroll']['submenus']['PayAttendance'] = [
        'label' => 'Attendance',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM16/AddDailyattendanceBGP.php',
        'submenucode' => 'PayAttendance',
        'pageactiveurl' =>'adddailyattendancebgp'
    ];
    $menu['Payroll']['submenus']['PayPayroll']=[
    
        'label' => 'Payroll',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/AddPayrollBGP.php',
        'submenucode' => 'PayPayroll',
        'pageactiveurl' =>'addpayrollbgp'
    ];
    $menu['Payroll']['submenus']['PayTimeRecord'] = [
        'label' => 'Time Record',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/TimeSheetList.php',
        'submenucode' => 'PayTimeRecord',
        'pageactiveurl' =>'timesheetlist'
    ];

    $menu['Payroll']['submenus']['PayBulkPayslip'] =  [
        'label' => 'Bulk Payslip',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/payrollreportbgp.php',
        'submenucode' => 'PayBulkPayslip',
        'pageactiveurl' =>'payrollreportbgp'
    ];
    
    $menu['Payroll']['submenus']['PaySalarySheet'] = [
        'label' => 'Salary Sheet',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/SalarySheet.php',
        'submenucode' => 'PaySalarySheet',
        'pageactiveurl' =>'salarysheet'
    ];
    
    $menu['Payroll']['submenus']['PayCloseAttendance'] = [
        'label' => 'Close Attendance',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM16/Monthlyattendanceclose.php',
        'submenucode' => 'PayCloseAttendance',
        'pageactiveurl' =>'monthlyattendanceclose'
    ];
    $menu['Payroll']['submenus']['PayForm12']=  [
        'label' => 'Form-12 & 25',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/LeaveAttendanceDetails.php',
        'submenucode' => 'PayForm12',
        'pageactiveurl' =>'leaveattendancedetails'
    ];
}
if ($_SESSION["Clientid"]!=4) {
    $menu['Payroll']['submenus']['PayAttendance'] = [
        'label' => 'Attendance',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM16/AddDailyattendance.php',
        'submenucode' => 'PayAttendance',
        'pageactiveurl' =>'adddailyattendance'
    ];
    $menu['Payroll']['submenus']['PayBulkPayslip'] =  [
        'label' => 'Bulk Payslip',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/Categorywise_payslip.php',
        'submenucode' => 'PayBulkPayslip',
        'pageactiveurl' =>'categorywise_payslip'
    ];
    $menu['Payroll']['submenus']['PayForm12']=[
        'label' => 'Form-12 & 25',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/attendance_details.php',
        'submenucode' => 'PayForm12',
        'pageactiveurl' =>'attendance_details',
    ];
    $menu['Payroll']['submenus']['PayPayroll']=[
    
        'label' => 'Payroll',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/AddPayrolltemp.php',
        'submenucode' => 'PayPayroll',
        'pageactiveurl' =>'addpayrolltemp'
    ];
}
=======
<?php 


$menu = [
    'Dashboard' => [
        'label' => 'Dashboard',
        'icon' => 'fa fa-line-chart',
        'url' => $domain . '/dashboard.php',
        'Menucode' => 'Dashboard',
        'submenucode' => 'Dashboardview',
        'pageactiveurl' =>'dashboard',
        'default_url' => $domain . '/dashboard.php'
    ],
    'Settings' => [
        'label' => 'Settings',
        'icon' => 'fa fa-cog',
        'url' => '#',
        'Menucode' => 'Settings',
        'submenus' => [
            'Department' => [
                'label' => 'Department',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM01/AddDepartment.php',
                'submenucode' => 'Department',
                'pageactiveurl' =>'adddepartment'
            ],
            'Designation' => [
                'label' => 'Designation',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM04/AddDesignation.php',
                'submenucode' => 'Designation',
                'pageactiveurl' =>'adddesignation'
            ],
            'CompanyDoc' => [
                'label' => 'Company Doc',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM46/Addcompanydocument.php',
                'submenucode' => 'CompanyDoc',
                'pageactiveurl' =>'addcompanydocument'
            ],
            'Shift' => [
                'label' => 'Shift',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM05/AddShift.php',
                'submenucode' => 'Shift',
                'pageactiveurl' =>'addshift'
            ],
            'Country' => [
                'label' => 'Country',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM06/AddCountry.php',
                'submenucode' => 'Country',
                'pageactiveurl' =>'addcountry'
            ],
            'States' => [
                'label' => 'States',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM07/AddState.php',
                'submenucode' => 'States',
                'pageactiveurl' =>'addstate'
            ],
            'City' => [
                'label' => 'City',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM03/AddCity.php',
                'submenucode' => 'City',
                'pageactiveurl' =>'addcity'
            ],
            'Holiday' => [
                'label' => 'Holiday',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM08/AddHoliday.php',
                'submenucode' => 'Holiday',
                'pageactiveurl' =>'addholiday'
            ],
            'BloodGroup' => [
                'label' => 'Blood Group',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM51/AddBloodgrp.php',
                'submenucode' => 'BloodGroup',
                'pageactiveurl' =>'addbloodgrp'
            ],
            'EducationMode' => [
                'label' => 'Education Mode',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM52/Addeducation.php',
                'submenucode' => 'EducationMode',
                'pageactiveurl' =>'addeducation'
            ],
            'Specialization' => [
                'label' => 'Specialization',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM53/AddeduSpecialization.php',
                'submenucode' => 'Specialization',
                'pageactiveurl' =>'addeduspecialization'
            ],
            'IndustrialType' => [
                'label' => 'Industrial Type',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM63/Addindustrialtype.php',
                'submenucode' => 'IndustrialType',
                'pageactiveurl' =>'addindustrialtype'
            ],
            'DocumentType' => [
                'label' => 'Document Type',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM11/AddDocumenttype.php',
                'submenucode' => 'DocumentType',
                'pageactiveurl' =>'adddocumenttype'
            ],
            'Rolesrights' => [
                'label' => 'Roles Rights',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/Rolesrights/Rolesrights.php',
                'submenucode' => 'Rolesrights',
                'pageactiveurl' =>'rolesrights'
            ],
            'Languages' => [
                'label' => 'Languages',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM12/AddLanguages.php',
                'submenucode' => 'Languages',
                'pageactiveurl' =>'addlanguages'
            ],
            'Relationship' => [
                'label' => 'Relationship',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM13/AddRelationship.php',
                'submenucode' => 'Relationship',
                'pageactiveurl' =>'addrelationship'
            ],
            'Qualification' => [
                'label' => 'Qualification',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM15/AddDegree.php',
                'submenucode' => 'Qualification',
                'pageactiveurl' =>'adddegree'
            ],
            'DepartmentHead' => [
                'label' => 'Department Head',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM36/AddDepartmenthead.php',
                'submenucode' => 'DepartmentHead',
                'pageactiveurl' =>'adddepartmenthead'
            ],
            'Location' => [
                'label' => 'Location',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM33/AddLocation.php',
                'submenucode' => 'Location',
                'pageactiveurl' =>'addlocation'
            ],
            

            

            // Add more submenus as needed
        ]
    ],
    'Jobapplication' => [
        'label' => 'Job Application',
        'icon' => 'fa fa-address-card-o',
        'url' => '#',
        'Menucode' => 'Jobapplication',
        'submenus' => [
            'JobapplicationAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM22/addjob.php',
                'submenucode' => 'JobapplicationAdd',
                'pageactiveurl' =>'addjob'
            ],
            'JobapplicationEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM22/editjob.php',
                'submenucode' => 'JobapplicationEdit',
                'pageactiveurl' =>'editjob'
            ],
            'JobapplicationView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM22/jobview.php',
                'submenucode' => 'JobapplicationView',
                'pageactiveurl' =>'jobview'
            ],
           
            

            // Add more submenus as needed
        ]
    ],
    'Candidate' => [
        'label' => 'Candidate',
        'icon' => 'fa fa-male',
        'url' => '#',
        'Menucode' => 'Candidate',
        'submenus' => [
            'CandidateAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM09/Addcandidate.php',
                'submenucode' => 'CandidateAdd',
                'pageactiveurl' =>'addcandidate'
            ],
            'CandidateEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM09/Editcandidate.php',
                'submenucode' => 'CandidateEdit',
                'pageactiveurl' =>'editcandidate'
            ],
            'CandidateView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM09/Viewcandidate.php',
                'submenucode' => 'CandidateView',
                'pageactiveurl' =>'viewcandidate'
            ],
           
            

            // Add more submenus as needed
        ]
    ],
    'Employee' => [
        'label' => 'Employee',
        'icon' => 'fa fa-user',
        'url' => '#',
        'Menucode' => 'Employee',
        'submenus' => [
            'EmployeeAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM10/AddEmployee.php',
                'submenucode' => 'EmployeeAdd',
                'pageactiveurl' =>'addemployee'
            ],
            'EmployeeEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM10/EditEmployee.php',
                'submenucode' => 'EmployeeEdit',
                'pageactiveurl' =>'editemployee'
            ],
            'EmployeeView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM10/ViewEmployee.php',
                'submenucode' => 'EmployeeView',
                'pageactiveurl' =>'viewemployee'
            ],
            'EmployeeDept' => [
                'label' => 'Departmentwise Details',
                'icon' => 'fa fa-table',
                'url' => $domain . '/HRM41/Employeedept.php',
                'submenucode' => 'EmployeeDept',
                'pageactiveurl' =>'employeedept'
            ],
           
            

           
        ]
    ],
    'EmployeeExit' => [
        'label' => 'Employee Exit',
        'icon' => 'fa fa-sign-out',
        'url' => '#',
        'Menucode' => 'EmployeeExit',
        'submenus' => [
            'EmployeeExitAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM27/AddEmp.php',
                'submenucode' => 'EmployeeExitAdd',
                'pageactiveurl' =>'addemp'
            ],
            'EmployeeExitEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM27/editExit.php',
                'submenucode' => 'EmployeeExitEdit',
                'pageactiveurl' =>'editexit'
            ],
            'EmployeeExitView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM27/View.php',
                'submenucode' => 'EmployeeExitView',
                'pageactiveurl' =>'view'
            ],
         
            

           
        ]
    ],
    'Payroll' => [
        'label' => 'Payroll',
        'icon' => 'fa fa-inr',
        'url' => '#',
        'Menucode' => 'Payroll',
        'submenus' => [
      
            'PayAttendanceRpt' => [
                'label' => 'Attendance Report',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM37/EmployeeDailyattandancerpt.php',
                'submenucode' => 'PayAttendanceRpt',
                'pageactiveurl' =>'employeedailyattandancerpt'
            ],
          
      
      
            'PayDeductionUpload' => [
                'label' => 'Deduction Upload',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Employeepayrolldeduction.php',
                'submenucode' => 'PayDeductionUpload',
                'pageactiveurl' =>'employeepayrolldeduction'
            ],
            'PayESIList' => [
                'label' => 'ESI List',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Empesidetails.php',
                'submenucode' => 'PayESIList',
                'pageactiveurl' =>'empesidetails'
            ],
            'PayDeductionList' => [
                'label' => 'Deduction List ',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Emppayrolldeductionlist.php',
                'submenucode' => 'PayDeductionList',
                'pageactiveurl' =>'emppayrolldeductionlist'
            ],
            'PayPayslip' => [
                'label' => 'Payslip',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Payrollclose.php',
                'submenucode' => 'PayPayslip',
                'pageactiveurl' =>'payrollclose'
            ],
            'PayCategorywisePayroll' => [
                'label' => 'Categorywise Payroll',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/PayrollRpt.php',
                'submenucode' => 'PayCategorywisePayroll',
                'pageactiveurl' =>'payrollrpt'
            ],
            'PayBankRpt' => [
                'label' => 'Bank Report',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Bankpayroll.php',
                'submenucode' => 'PayBankRpt',
                'pageactiveurl' =>'bankpayroll'
            ],
            'PayCategorywiseAttendance' => [
                'label' => 'Categorywise-Attendance',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM14/Categorywise_attendanceview.php',
                'submenucode' => 'PayCategorywiseAttendance',
                'pageactiveurl' =>'categorywise_attendanceview'
            ],
         
            

           
        ]
    ],
    'Assets' => [
        'label' => 'Assets',
        'icon' => 'fa fa-yelp',
        'url' => '#',
        'Menucode' => 'Assets',
        'submenus' => [
            'AssetsCategory' => [
                'label' => 'Category',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM60/AddAsset.php',
                'submenucode' => 'AssetsCategory',
                'pageactiveurl' =>'addasset'
            ],
            'AssetList' => [
                'label' => 'Asset List',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM61/AddAssetlist.php',
                'submenucode' => 'AssetList',
                'pageactiveurl' =>'AssetList'
            ],
         
         
            

           
        ]
    ],
    'Documents' => [
        'label' => 'Documents',
        'icon' => 'fa fa-file-text-o',
        'url' => '#',
        'Menucode' => 'Documents',
        'submenus' => [
            'DocumentsAdd' => [
                'label' => 'Add',
                'icon' => 'fa fa-plus',
                'url' => $domain . '/HRM45/AddDocumentMaster.php',
                'submenucode' => 'DocumentsAdd',
                'pageactiveurl' =>'adddocumentmaster'
            ],
            'DocumentsEdit' => [
                'label' => 'Edit',
                'icon' => 'fa fa-pencil-square-o',
                'url' => $domain . '/HRM45/EditDocumentMaster.php',
                'submenucode' => 'DocumentsEdit',
                'pageactiveurl' =>'editdocumentmaster'
            ],
            'DocumentsView' => [
                'label' => 'View',
                'icon' => 'fa fa-eye',
                'url' => $domain . '/HRM45/ViewDocumentMaster.php',
                'submenucode' => 'DocumentsView',
                'pageactiveurl' =>'viewdocumentmaster'
            ],
         
            

           
        ]
    ],
    'Reports' => [
        'label' => 'Reports',
        'icon' => 'fa fa-bar-chart',
        'url' => '#',
        'Menucode' => 'Reports',
        'submenus' => [
            'RptAsset' => [
                'label' => 'Asset Allocated',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM62/Assetreport.php',
                'submenucode' => 'RptAsset',
                'pageactiveurl' =>'assetreport'
            ],
           
         
            

           
        ]
    ],

    'AttReports' => [
        'label' => 'Reports',
        'icon' => 'fa fa-bar-chart',
        'url' => '#',
        'Menucode' => 'AttReports',
        'submenus' => [
            'AttendanceReportsPresent' => [
                'label' => 'Present Details',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM19/presentattendance.php',
                'submenucode' => 'AttendanceReportsPresent',
                'pageactiveurl' =>'presentattendance'
            ],
            'AttendanceReportsLeave' => [
                'label' => 'Leave Details',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM21/leaveattendance.php',
                'submenucode' => 'AttendanceReportsLeave',
                'pageactiveurl' =>'leaveattendance'
            ],
            'AttendanceReportsAbsent' => [
                'label' => 'Present Attendance',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/HRM20/absentattendance.php',
                'submenucode' => 'AttendanceReportsAbsent',
                'pageactiveurl' =>'absentattendance'
            ],
            'AttendanceReportsOpen' => [
                'label' => 'Attendance Open',
                'icon' => 'fa fa-angle-right',
                'url' => $domain . '/AttendanceOpen/AttendanceOpen.php',
                'submenucode' => 'AttendanceReportsOpen',
                'pageactiveurl' =>'attendanceopen'
            ],
           
         
            

           
        ]
    ],
    // Add more menus as needed
];
if ($_SESSION["Clientid"]==4) {
    $menu['Payroll']['submenus']['PayAttendance'] = [
        'label' => 'Attendance',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM16/AddDailyattendanceBGP.php',
        'submenucode' => 'PayAttendance',
        'pageactiveurl' =>'adddailyattendancebgp'
    ];
    $menu['Payroll']['submenus']['PayPayroll']=[
    
        'label' => 'Payroll',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/AddPayrollBGP.php',
        'submenucode' => 'PayPayroll',
        'pageactiveurl' =>'addpayrollbgp'
    ];
    $menu['Payroll']['submenus']['PayTimeRecord'] = [
        'label' => 'Time Record',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/TimeSheetList.php',
        'submenucode' => 'PayTimeRecord',
        'pageactiveurl' =>'timesheetlist'
    ];

    $menu['Payroll']['submenus']['PayBulkPayslip'] =  [
        'label' => 'Bulk Payslip',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/payrollreportbgp.php',
        'submenucode' => 'PayBulkPayslip',
        'pageactiveurl' =>'payrollreportbgp'
    ];
    
    $menu['Payroll']['submenus']['PaySalarySheet'] = [
        'label' => 'Salary Sheet',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/SalarySheet.php',
        'submenucode' => 'PaySalarySheet',
        'pageactiveurl' =>'salarysheet'
    ];
    
    $menu['Payroll']['submenus']['PayCloseAttendance'] = [
        'label' => 'Close Attendance',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM16/Monthlyattendanceclose.php',
        'submenucode' => 'PayCloseAttendance',
        'pageactiveurl' =>'monthlyattendanceclose'
    ];
    $menu['Payroll']['submenus']['PayForm12']=  [
        'label' => 'Form-12 & 25',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/LeaveAttendanceDetails.php',
        'submenucode' => 'PayForm12',
        'pageactiveurl' =>'leaveattendancedetails'
    ];
}
if ($_SESSION["Clientid"]!=4) {
    $menu['Payroll']['submenus']['PayAttendance'] = [
        'label' => 'Attendance',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM16/AddDailyattendance.php',
        'submenucode' => 'PayAttendance',
        'pageactiveurl' =>'adddailyattendance'
    ];
    $menu['Payroll']['submenus']['PayBulkPayslip'] =  [
        'label' => 'Bulk Payslip',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/Categorywise_payslip.php',
        'submenucode' => 'PayBulkPayslip',
        'pageactiveurl' =>'categorywise_payslip'
    ];
    $menu['Payroll']['submenus']['PayForm12']=[
        'label' => 'Form-12 & 25',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/attendance_details.php',
        'submenucode' => 'PayForm12',
        'pageactiveurl' =>'attendance_details',
    ];
    $menu['Payroll']['submenus']['PayPayroll']=[
    
        'label' => 'Payroll',
        'icon' => 'fa fa-angle-right',
        'url' => $domain . '/HRM14/AddPayrolltemp.php',
        'submenucode' => 'PayPayroll',
        'pageactiveurl' =>'addpayrolltemp'
    ];
}
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>