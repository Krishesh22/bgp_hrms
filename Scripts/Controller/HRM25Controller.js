var app = angular.module('MyApp', ['angularUtils.directives.dirPagination', 'textAngular', 'ngSanitize']);
app.controller('HRM25Controller', function($scope, $http, $timeout, $filter) {

    $scope.currentPageEmp = 1;
    $scope.pageSizeEmp = 10;
    $scope.currentPagePayroll = 1;
    $scope.pageSizePayroll = 10;
    $scope.currentPageLate = 1;
    $scope.pageSizeLate = 10;
    


    $scope.TempSave = function() {

       
        

        if ($scope.TempMessage == "Empty") {
            $scope.Message = true;
            $scope.Message = "Enter the password";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Emailid Empty") {
            $scope.Message = true;
            $scope.Message = "Enter the Email-ID";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Contactno") {
            $scope.Message = true;
            $scope.Message = "Enter the Contactno";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Saved Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Exists") {
            $scope.Message = true;
            $scope.Message = "Department Already Exist";
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
            $scope.Message = "This Contact Number Already Exists...";

            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Contactno = "";


        }

        if ($scope.TempMessage == "Updated") {
            $scope.Message = true;
            $scope.Message = "Updated Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);
           

        }

        
    }

    /////////////////////////////////////////////////////

    $scope.emailchecking = function(email) {
        $scope.Testemail = email;
        var val = $scope.Testemail;
        if (!val.match(/\S+@\S+\.\S+/)) { // Jaymon's / Squirtle's solution
            // Do something
            $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID..";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            return false;
        }
        if (val.indexOf(' ') != -1 || val.indexOf('..') != -1) {
            // Do something
            $scope.Message = true;
            $scope.Message = "Please Enter Validate Email ID..";
            // $timeout(function() { $scope.Message = ""; }, 3000);
            return false;
        }
        $scope.Message = false;
        $scope.GetMailunique(val);
        return true;
    }

/////////////////////////////////////////////////////

    $scope.GetMailunique = function(Emailid) {
        $scope.Emailid = Emailid;
        $http({
            method: "POST",
            url: "EmpDetails.php",
            data: {

                'Emailid': $scope.Emailid,

                'Method': 'Mailcheck'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
       
            $scope.TempMessage = response.data.Message;

            $scope.TempSave();
            
        });
    }


    /////////////////////////////////////////////////////

    $scope.GeContactunique = function(Contactno) {
        $scope.Contactno = Contactno;
        $http({
            method: "POST",
            url: "EmpDetails.php",
            data: {

                'Contactno': $scope.Contactno,

                'Method': 'Contactcheck'
            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {
          

            $scope.TempMessage = response.data.Message;
            $scope.TempSave();
            
        });
    }

///////////////////////////////////////

$http({
    method: "POST",
    url: "EmpDetails.php",
    data: { 'Method': 'Dept' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {

    $scope.GetDepartmentList = response.data;
    
});


///////////////////////////////////////

$http({
    method: "POST",
    url: "EmpDetails.php",
    data: { 'Method': 'Desig' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {

    $scope.GetDesignationList = response.data;
    
});


///////////////////////////////////////



$scope.ResetDetails = function() {
    $scope.EmployeeType = "";
    $scope.Department = "";
    $scope.username = "";
    $scope.Exitempid = "";
    $scope.Employeeid = "";
    $scope.Designation = "";
    $scope.Emailid = "";
    $scope.Contactno = "";
    $scope.Userpassword = "";
    
}

////////////////////////////////////////////


$scope.Getempname = function() {

    
    $http({

        method: "post",
        url: "EmpDetails.php",
        data: {
            
            'Department': $scope.Department,
            'Method': 'ALL'
        },
        headers: { 'Content-Type': 'application/json' }
    }).then(function successCallback(response) {

      
        $scope.GetEmployeeList = response.data;
        
    });
}

/////////////////////////////////////////////



$scope.GetExitempname = function() {

    
    $http({

        method: "post",
        url: "EmpDetails.php",
        data: {
            
            'Exitempid': $scope.Exitempid,
            'Method': 'ExitEmp'
        },
        headers: { 'Content-Type': 'application/json' }
    }).then(function successCallback(response) {
        
        $scope.Employeeid = response.data.Employeeid;
        $scope.Designation = response.data.Designation;
        $scope.Contactno = response.data.Contactno;
        $scope.Emailid = response.data.Emailid;
        
    });
}




 /////////////////////////////////////////////////////////
 
 $http({
    method: "POST",
    url: "EmpDetails.php",
    data: { 'Method': 'FETCH' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {


    $scope.GetEmployeeList2 = response.data;
});

//////////////////////////////////////////////



$scope.Empdetails = function() {
    $http({
        method: "POST",
        url: "EmpDetails.php",
        data: { 'Method': 'FETCH' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    
    }).then(function successCallback(response) {
    
    
        $scope.GetEmployeeList2 = response.data;
    });
};

////////////////////////////////////////////

$scope.SaveEmployee = function() {
    $http({



        method: "POST",
        url: "EmpDetails.php",
        data: {
            'Employeeid': $scope.Employeeid,
            'Userpassword': $scope.Userpassword,
            'EmployeeType': $scope.EmployeeType,
            'Contactno': $scope.Contactno,
            'Emailid': $scope.Emailid,
            'Designation': $scope.Designation,
            'Exitempid': $scope.Exitempid,
            'Department': $scope.Department,
            'username': $scope.username,
            'Method': 'Save'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.TempMessage = response.data.Message;


        $scope.TempSave();
    });

};

//////////////////////////////////////

$scope.SendEdit = function(Userid) {


    $scope.Userid = Userid;
   
    $('#myCarousel').carousel(1);

    $scope.FetchEmployee($scope.Userid);
}

//////////////////////////////////////


$scope.Empdetails2 = function(Userid) {


    $scope.Userid = Userid;

    $('#myCarousel').carousel(1);

    $scope.Empdetails($scope.Userid);
}


//////////////////////////////////////



$scope.GetAuthNo = function(EmployeeType)
{
    $scope.CheckingSession();
    $scope.EmployeeType = EmployeeType;
    
    
    $scope.Getnextno();

}

$scope.Getnextno = function()
{
    $scope.CheckingSession();
    $http(

        {

            method: "POST",
            url: "EmpDetails.php",
            data: { 
                'EmployeeType' : $scope.EmployeeType,  
                                  
                'Method': 'ModuleAuthNext' },
                headers: { 'Content-Type': 'application/json' }

            }).then(function successCallback(response) {
    
       
                $scope.Employeeid = response.data.Userid;
                $scope.EmpAutoGenerate = response.data.EmpAutoGenerate;
                $scope.CategoryAutoGeneratno =response.data.CategoryAutoGeneratno;
       
      
    });

}
/////////////////////////////////////

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

$http(

    {

        method: "POST",
        url: "EmpDetails.php",
        data: { 
            'EmployeeType' : $scope.EmployeeType,                  
            'Method': 'ModuleAuthNext' },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {

            $scope.Employeeid = response.data.Userid;
            $scope.EmpAutoGenerate = response.data.EmpAutoGenerate;
  //  $scope.CheckingSession();

});
//////////////////////////////////////
// $scope.GetNextnoByCategory = function(Category,EmpDepartment)
// {
//     $scope.CheckingSession();
//     $scope.Category = Category;
//     $scope.EmpDepartment = EmpDepartment;
//     $scope.GetAdminCategory($scope.Category);
//     $scope.Getnextno();

// }
// $scope.GetAuthnextno = function() {
//     $scope.CheckingSession();
//     $http(

//         {

//             method: "POST",
//             url: "EmpDetails.php",
//             data: { 
//                 'EmployeeType' : $scope.EmployeeType,  
                                  
//                 'Method': 'ModuleAuthNext' },
//                 headers: { 'Content-Type': 'application/json' }

//             }).then(function successCallback(response) {
    
//         //////// alert(response.data);
//         $scope.Employeeid = response.data.Userid;
//         $scope.EmpAutoGenerate = response.data.EmpAutoGenerate;
//         $scope.CategoryAutoGeneratno =response.data.CategoryAutoGeneratno;
      
//     });
// }

/////////////////////////////////////////////


$scope.FetchEmployee = function(Userid) {
    
    $scope.Userid = Userid;
    $http({
        method: "POST",
        url: "EmpDetails.php",
        data: {
            'Userid': $scope.Userid,
            'Method': "FetchEmployee"
        },
        headers: { 'Content_Type': 'application/json' }
    }).then(function successCallback(response) {
        $scope.Userid = response.data.Userid;
        $scope.Username = response.data.Username;
        $scope.Emailid = response.data.Emailid;
        $scope.Contactno = response.data.Contactno;

        $scope.EmployeeType = response.data.Authorizedtype;
        $scope.Userpassword = response.data.Userpassword;
        $scope.Contactno = response.data.Contactno;
        $scope.Memberactive = response.data.Memberactive;
        $scope.Department = response.data.Department;
        $scope.Designation = response.data.Designation;
       
       
    });


}



//////////////////////////////////////

$scope.UpdateEmp = function() {
    $http({



        method: "POST",
        url: "EmpDetails.php",
        data: {
            'Userid': $scope.Userid,
            'Username': $scope.Username,
            'Emailid': $scope.Emailid,
            'Contactno': $scope.Contactno,
            'EmployeeType': $scope.EmployeeType,
            'Userpassword': $scope.Userpassword,
            'Contactno': $scope.Contactno,
            'Memberactive': $scope.Memberactive,
            'Department': $scope.Department,
            'Designation': $scope.Designation,
           
            'Method': 'UpdateEmp'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {

         
        $scope.TempMessage = response.data.Message;


        $scope.TempSave();
    });

};

///////////////////////////////////////////////

});