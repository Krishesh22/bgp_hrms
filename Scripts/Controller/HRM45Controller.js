var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM45Controller', function($scope, $http, $timeout) {


    /////////////////////////////////////

$scope.Documentno ="";
$scope.DocumentIssueDate = "";
$scope.RenewalDate = "";
$scope.Documenttype = "";

$scope.DocumentNotes = "";
$scope.btnsave = true;
$scope.btnUpdate = false;
$scope.currentPagePayroll01 =1;
$scope.pageSizePayroll01 = 10;
$scope.currentPageFile = 1;
$scope.pageSizeFile = 10;
$scope.Renewalyesorno = "Yes";
$scope.Documentname = "";
$scope.Renewalnotificationindays = 30;
$scope.btnrenewal = true;
$scope.RenewalDate ="";
$scope.Documentnoasperrecord ="";

    ///////////////////////////////////////////////////
$scope.Reset = function()
{
$scope.Getnextno();

$scope.LoadDate();
$scope.Documenttype = "";

$scope.DocumentNotes = "";

$scope.Renewalyesorno = "Yes";
$scope.Documentname = "";
$scope.Renewalnotificationindays = 30;
$scope.btnsave = true;
$scope.btnUpdate = false;
$scope.GetDocMasterFileList = null;
$scope.Documentfilepath  = null;
$scope.btnrenewal = true;
$scope.RenewalDate ="";
$scope.Documentnoasperrecord = "";

}


    /////////////////////////////////
    $scope.GetExpiredYesorNo = function()
    {
       
        if($scope.Renewalyesorno =='Yes')
        {
            $scope.btnrenewal = true;
        }
        else
        {
            $scope.btnrenewal = false;
        }

    }
    $scope.GetExpiredYesorNoVW = function()
    {
       

        
        if($scope.VWRenewalyesorno =='Yes' && $scope.Documentstatus =="Open")
        {
            $scope.VWbtnrenewal = true;
        }
        else
        {
            $scope.VWbtnrenewal = false;
        }
    }


    ///////////////////
    $scope.CheckingSession = function()
    {
   
        // $http({



        //     method: "POST",
        //     url: "../Sessionhandling/SessionChecking.php",
        //     data: {
        //        'PageSession' :$scope.PageSession,
               

        //         'Method': 'CurrentSession'
        //     },
        //     headers: { 'Content-Type': 'application/json' },
         

        // }).then(function successCallback(response) {

          
        //     $scope.SessionMessage = response.data.Message;
        //     $scope.Sessionurl = response.data.Url;

        //     $scope.SessionSavedMessage();
        // });
    }


    $scope.SessionSavedMessage = function() {
        if ($scope.SessionMessage == "SessionNo") {
            //  alert("Session Expired! Please Login Again...");

            window.location.replace($scope.Sessionurl);
            return;
        }
    }


   

    //////////////////////

    ////////////////////////////////////////////

    $scope.Getnextno = function() {
        $http(

            {

                method: "POST",
                url: "DocumentMaster.php",
                data: { 'Method': 'ModuleNext' },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {
            //////// alert(response.data);
            $scope.Documentno = response.data;
        });
    }


        ///////////////////////////
  
        $http({



            method: "POST",
            url: "DocumentMaster.php",
            data: {
              
               
    
                'Method': 'PageSession'
            },
            headers: { 'Content-Type': 'application/json' },
         
    
        }).then(function successCallback(response) {
    
          
            $scope.PageSession = response.data.Message;
            $scope.CheckingSession();
           
          
        });
        //////////////////////////////////

        $http(

            {

                method: "POST",
                url: "DocumentMaster.php",
                data: { 'Method': 'ModuleNext' },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function successCallback(response) {
            //////// alert(response.data);
            $scope.Documentno = response.data;
        });


 
    ///////////////////////////////////////
    
    $http(

        {

            method: "POST",
            url: "DocumentMaster.php",
            data: { 'Method': 'DOCTYPE' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.GetDocumenttypeList = response.data;
    });
    //////////////////////////////////////////
    $('#myDiv').hide();

    $(document).ready(function(e) {
        $scope.CheckingSession();
        $('#fileButtonEmpLeave').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBulkFiles').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBulkFiles').files[x]);
            }
           var status ="New";
            // form_data.append("files", files[i]);
            form_data.append("Documentno", $("#Documentno").val());
            form_data.append("DocumentIssueDate", $("#DocumentIssueDate").val());
            form_data.append("RenewalDate", $("#RenewalDate").val());
            form_data.append("Documenttype", $("#Documenttype").val());
            form_data.append("Renewalnotificationindays", $("#Renewalnotificationindays").val());
            form_data.append("DocumentNotes", $("#DocumentNotes").val());
            form_data.append("Renewalyesorno", $("#Renewalyesorno").val());
            form_data.append("Documentname", $("#Documentname").val());
            form_data.append("Documentnoasperrecord", $("#Documentnoasperrecord").val());
            form_data.append("status", status);
        

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploaddoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    $('#myDiv').show();
                    //alert(response);
                    document.getElementById("fileInputBulkFiles").value = '';
               
                  //  $scope.Messagenew = true;
                    $('#msg1').text(response);


                    setTimeout(function() {
                         $('#msg1') .empty().append("");
                         $('#myDiv').hide();
                        // $scope.Messagenew = false;
                 }, 3000);

                    $scope.GetFileList();
                  //  $scope.Update_EducationEmail();
                   // $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function(response) {
                    alert(response);
                    $('#msg1').text(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });

    ///////////////////////////////////////////////////////
    $(document).ready(function(e) {
        $scope.CheckingSession();
        $('#fileButtonEmpLeaveDoc').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBulkFiles').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBulkFiles').files[x]);
            }
           var status ="Renewal";
            // form_data.append("files", files[i]);
            form_data.append("Documentno", $("#Documentno").val());
            form_data.append("DocumentIssueDate", $("#DocumentIssueDate").val());
            form_data.append("RenewalDate", $("#RenewalDate").val());
            form_data.append("Documenttype", $("#Documenttype").val());
            form_data.append("Renewalnotificationindays", $("#Renewalnotificationindays").val());
            form_data.append("DocumentNotes", $("#DocumentNotes").val());
            form_data.append("Renewalyesorno", $("#Renewalyesorno").val());
            form_data.append("Documentname", $("#Documentname").val());
            form_data.append("Documentnoasperrecord", $("#Documentnoasperrecord").val());
            form_data.append("Renewaloldno", $("#VWDocumentno").val());
            form_data.append("status", status);
        

            //  alert($("#Documenttype").val());
            $.ajax({
                url: 'Uploaddoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    $('#myDiv').show();
                    //alert(response);
                    document.getElementById("fileInputBulkFiles").value = '';
               
                  //  $scope.Messagenew = true;
                    $('#msg1').text(response);


                    setTimeout(function() {
                         $('#msg1') .empty().append("");
                         $('#myDiv').hide();
                        // $scope.Messagenew = false;
                 }, 3000);

                    $scope.GetFileList();
                  //  $scope.Update_EducationEmail();
                   // $scope.DisplayCandidateEducation();
                    // display success response from the PHP script
                },
                error: function(response) {
                    alert(response);
                    $('#msg1').text(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    ////////////////////////////////////////////////////
    $http(

        {

            method: "POST",
            url: "DocumentMaster.php",
            data: { 'Method': 'FetchDate' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.DocumentIssueDate = response.data;
       // $scope.RenewalDate = response.data;
    });
/////////////////////////////
$scope.LoadDate= function()
{
    $http(

        {

            method: "POST",
            url: "DocumentMaster.php",
            data: { 'Method': 'FetchDate' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.DocumentIssueDate = response.data;
       // $scope.RenewalDate = response.data;
    });
}
//////////////////////////////////////

$scope.SaveDocumentMaster = function() {
    $scope.CheckingSession();

    $scope.btntestsave = true;
    $http({



        method: "POST",
        url: "DocumentMaster.php",
        data: {
            'Documentno': $scope.Documentno,
            'DocumentIssueDate': $scope.DocumentIssueDate,
            'RenewalDate': $scope.RenewalDate,
            'Documenttype': $scope.Documenttype,
            'Renewalnotificationindays': $scope.Renewalnotificationindays,
            'DocumentNotes': $scope.DocumentNotes,
            'Renewalyesorno' :$scope.Renewalyesorno,
            'Documentname' :$scope.Documentname,
            'Documentnoasperrecord' :$scope.Documentnoasperrecord,
       
            //  'City': $scope.City,
            'Method': 'Save'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {
        $scope.btntestsave = false;

        $scope.TempMessage = response.data.Message;
        $scope.Tempnextno = response.data.Nextno;
        // $scope.DetailListTemp = response.data.mytbl;


        $scope.TempSave();
    });

};

//////////////////////////////////////////
$scope.TempSave = function() {

    if ($scope.TempMessage == "Empty") {
        $scope.Message = true;
        $scope.Message = "Please Enter Detail";
        $timeout(function() { $scope.Message = ""; }, 3000);
    }
 




    if ($scope.TempMessage == "ExpiredDate") {
        $scope.Message = true;
        $scope.Message = "Please Select Expired Date...";
        $timeout(function() { $scope.Message = ""; }, 3000);

    }
    

    if ($scope.TempMessage == "Update") {
        $scope.Message = true;
        $scope.Message = "Data Updated Successfully...";
        $timeout(function() { $scope.Message = ""; }, 3000);

    }
    

    if ($scope.TempMessage == "DocumentName") {
        $scope.Message = true;
        $scope.Message = "Please Enter Document Name...";
        $timeout(function() { $scope.Message = ""; }, 3000);

    }
    

    if ($scope.TempMessage == "Documenttype") {
        $scope.Message = true;
        $scope.Message = "Please Select Document Type...";
        $timeout(function() { $scope.Message = ""; }, 3000);

    }
    

    if ($scope.TempMessage == "NotificationDays") {
        $scope.Message = true;
        $scope.Message = "Please Enter Notification Days...";
        $timeout(function() { $scope.Message = ""; }, 3000);

    }


    if ($scope.TempMessage == "Delete") {
        $scope.Message = true;
        $scope.Message = "Data Deleted Successfully...";
        $timeout(function() { $scope.Message = ""; }, 3000);
        $scope.Documentfilepath = "";
        $scope.GetFileList();

    }
 
    if ($scope.TempMessage == "Saved") {
        $scope.Message = true;
        $scope.Message = "Data Saved Successfully...";
        $scope.Documentno =  $scope.Tempnextno;
        $scope.btnsave = false;
        $scope.btnUpdate=true;
        $timeout(function() { $scope.Message = ""; }, 3000);

    }
   



    if ($scope.TempMessage == "Error") {
        $scope.Message = true;
        $scope.Message = "Error in Saving/Updating ...";
        $timeout(function() { $scope.Message = ""; }, 3000);


    }


}
//////////////////////////////////
$scope.UpdateDocumentMaster = function() {
    $scope.CheckingSession();

   
    $http({



        method: "POST",
        url: "DocumentMaster.php",
        data: {
            'Documentno': $scope.Documentno,
            'DocumentIssueDate': $scope.DocumentIssueDate,
            'RenewalDate': $scope.RenewalDate,
            'Documenttype': $scope.Documenttype,
            'Renewalnotificationindays': $scope.Renewalnotificationindays,
            'DocumentNotes': $scope.DocumentNotes,
            'Renewalyesorno' :$scope.Renewalyesorno,
            'Documentname' :$scope.Documentname,
            'Documentnoasperrecord' :$scope.Documentnoasperrecord,
       
            //  'City': $scope.City,
            'Method': 'Update'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {
     

        $scope.TempMessage = response.data.Message;

        // $scope.DetailListTemp = response.data.mytbl;


        $scope.TempSave();
    });

};
//////////////////////////////////////
$scope.RecuriseDateFormat = function(date) {


    return  new Date(date);;
 
   
    
}
////////////////////////////////
    
$http(

    {

        method: "POST",
        url: "DocumentMaster.php",
        data: { 'Method': 'DOCMAS' },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

    }).then(function successCallback(response) {
    //////// alert(response.data);
    $scope.GetDocMasterList = response.data;
});
//////////////////////
$scope.SendEdit02= function(Documentno)
{
    $scope.CheckingSession();
$scope.Documentno = Documentno;
$scope.VWDocumentno = Documentno;
$scope.Fetchmaster($scope.Documentno);
$scope.VWGetFileList();
$scope.GetFileList();
$('#myCarousel').carousel(1);
$scope.Documentfilepath  = null;


}


$scope.Fetchmaster = function()
{
    $http({



        method: "POST",
        url: "DocumentMaster.php",
        data: {
            'Documentno': $scope.Documentno,
           
       
            //  'City': $scope.City,
            'Method': 'FetchDocument'
        },
        headers: { 'Content-Type': 'application/json' }
    
    }).then(function successCallback(response) {
     
    
        $scope.DocumentIssueDate = response.data.DocumentIssueDate;
        $scope.RenewalDate = response.data.ExpiredDate;
        $scope.Documenttype = response.data.Documenttype;
        $scope.Renewalnotificationindays = response.data.Renewalnotificationindays;
        $scope.DocumentNotes = response.data.DocumentNotes;
        $scope.Documentname = response.data.Documentname;
        $scope.Renewalyesorno = response.data.Renewalyesorno;
        $scope.Documentnoasperrecord = response.data.Documentnoasperrecord;
        $scope.Documentoldno = response.data.Documentoldno;
        $scope.Documenthistoryno = response.data.Documenthistoryno;
        $scope.Documentstatus = response.data.Documentstatus;

        $scope.VWDocumentno = $scope.Documentno;
        $scope.VWDocumentIssueDate = response.data.DocumentIssueDate;
        $scope.VWRenewalDate = response.data.ExpiredDate;
        $scope.VWDocumenttype = response.data.Documenttype;
        $scope.VWRenewalnotificationindays = response.data.Renewalnotificationindays;
        $scope.VWDocumentNotes = response.data.DocumentNotes;
        $scope.VWDocumentname = response.data.Documentname;
        $scope.VWRenewalyesorno = response.data.Renewalyesorno;
        $scope.GetExpiredYesorNoVW();
       
        $scope.VWDocumentnoasperrecord = response.data.Documentnoasperrecord;
        $scope.VWDocumentoldno = response.data.Documentoldno;
        $scope.VWDocumenthistoryno = response.data.Documenthistoryno;
        $scope.GetExpiredYesorNo();
        $scope.Documentfilepath = "";
       $scope.VWDocumentfilepath = "";
    
        // $scope.DetailListTemp = response.data.mytbl;
    
    
       
    });
}
//////////////////////
$scope.GetFileList = function()
{
    $scope.CheckingSession();
    $http(

        {
    
            method: "POST",
            url: "DocumentMaster.php",
            data: { 
                'Documentno': $scope.Documentno,
                'Method': 'DOCMASFILE' 
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    
        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.GetDocMasterFileList = response.data;
    });
}
////////////////

$scope.VWGetFileList = function()
{
    $scope.CheckingSession();
    $http(

        {
    
            method: "POST",
            url: "DocumentMaster.php",
            data: { 
                'Documentno': $scope.VWDocumentno,
                'Method': 'VWDOCMASFILE' 
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    
        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.VWGetDocMasterFileList = response.data;
        $scope.GetDocMasterFileList = response.data;
    });
}

$scope.SendFileEdit = function(Documentno,Sno)
{
$scope.Sno = Sno;
$scope.Documentno = Documentno;
$scope.Fileno = 1;
$scope.FetchFileList();
}
$scope.SendFileEdit02 = function(Documentno,Sno)
{
$scope.Sno = Sno;
$scope.Documentno = Documentno;
$scope.Fileno = 2;
$scope.FetchFileList();
}


$scope.FetchFileList = function()
{
   
    
    $http({



        method: "POST",
        url: "DocumentMaster.php",
        data: {
            'Documentno': $scope.Documentno,
           'Sno' :$scope.Sno,
       
            //  'City': $scope.City,
            'Method': 'FetchFileDocument'
        },
        headers: { 'Content-Type': 'application/json' }
    
    }).then(function successCallback(response) {
     
    
        // $scope.Documentfilepath = response.data.Documentfilepath;
        $scope.TestingFileformat = response.data.Documentfilepath;
      
    
        $scope.FileFetching();
    
    
       
    });

   
}



$scope.FileFetching=function()
{
    if($scope.Fileno ==2)
    {
        
        $scope.VWDocumentfilepath =$scope.TestingFileformat;
    }
    else
    {
        $scope.Documentfilepath =$scope.TestingFileformat;
    }
}


///////////////////////////////////////
$scope.Deletenew = function()
{
    $http({



        method: "POST",
        url: "DocumentMaster.php",
        data: {
            'Documentno': $scope.Documentno,
           'Sno' :$scope.Sno,
       
            //  'City': $scope.City,
            'Method': 'DeleteFile'
        },
        headers: { 'Content-Type': 'application/json' }
    
    }).then(function successCallback(response) {
     
    
        $scope.TempMessage = response.data.Message;

        // $scope.DetailListTemp = response.data.mytbl;


        $scope.TempSave();
      
    
        // $scope.DetailListTemp = response.data.mytbl;
    
    
       
    });
}
//////////////////////////////////////

$scope.Getrefresh = function()
{
    $scope.CheckingSession();
    $http(

        {
    
            method: "POST",
            url: "DocumentMaster.php",
            data: { 'Method': 'DOCMAS' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    
        }).then(function successCallback(response) {
        //////// alert(response.data);
        $scope.GetDocMasterList = response.data;
    });
}
///////////////////////////

$scope.GetRenewalnew = function()
{
$scope.Getnextno();

$scope.LoadDate();
$scope.Documenttype = $scope.VWDocumenttype;

$scope.DocumentNotes = $scope.VWDocumentNotes 

$scope.Renewalyesorno = "Yes";
$scope.Documentname = $scope.VWDocumentname
$scope.Renewalnotificationindays = $scope.VWRenewalnotificationindays;
$scope.btnsave = true;
$scope.btnUpdate = false;
$scope.GetDocMasterFileList = null;
$scope.Documentfilepath  = null;
$scope.btnrenewal = true;
$scope.RenewalDate ="";
$scope.Documentnoasperrecord = "";

}


});