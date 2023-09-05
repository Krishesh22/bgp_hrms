var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM28Controller', function($scope, $http, $timeout, $filter) {

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
   //     $scope.btnedit = true;
    // $scope.btnview = true;



    $scope.TempSave = function() {

       
        if ($scope.TempMessage == "Data Saved") {
            $scope.Message = true;
            $scope.Message = "Data Saved Successfully...";
            $timeout(function() { $scope.Message = ""; }, 3000);
            $scope.Candidateid = $scope.Tempnextno;
            $scope.btnsave = false;
            $scope.btnupdate = true;
            $scope.ResetAttDoc();
        }
        if ($scope.TempMessage == "Delete") {
            $scope.Message = true;
            $scope.Message = "Data Deleted Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        
       
        if ($scope.TempMessage == "Description") {
            $scope.Message = true;
            $scope.Message = " Enter the Description";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }

        if ($scope.TempMessage == "Update") {
            $scope.Message = true;
            $scope.Message = "Updated Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }
        if ($scope.TempMessage == "Upload") {
            $scope.Message = true;
            $scope.Message = "Uploaded Successfully";
            $timeout(function() { $scope.Message = ""; }, 3000);


        }


        
    }
    /////////////////////////////////////////////////////////

    // $scope.StatusAtt = function() {
    //     $scope.btnedit = true;
    //         $scope.btnview = true;
           
       
    // }
      
    $scope.ResetAttDoc = function() {
        $scope.Attendencedate = "";
        $scope.Description = "";
        $scope.Status = "";
        $scope.Document = "";
       
    }
    //////////////////////////////////////////////////////
   
    $(document).ready(function(e) {
        $('#AttDocumentButton').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('Document').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('Document').files[x]);
            }

            // form_data.append("files", files[i]);
            form_data.append("Attendencedate", $("#Attendencedate").val());
            form_data.append("Description", $("#Description").val());
            form_data.append("Status", $("#Status").val());
            // form_data.append("Document", $("#Document").val());

            $.ajax({
                url: 'UploadAttendanceDoc.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    alert(response);
                    document.getElementById("Document").value = '';

                    $('#msg2').html(response);
                    setTimeout(function() {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);
                    $scope.Getallvalues();
                    $scope.TempSave();
                   
                },
                error: function(response) {
                    alert(response);
                    $('#msg2').html(response);
                    setTimeout(function() {
                        $('#msg2')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000); // display error response from the PHP script
                }
            });
        });
    });
    
    /////////////////////////////////////

    $scope.Getallvalues = function() {



        $http({



            method: "POST",
            url: "AttendanceDoc.php",
            data: { 'Attendencedate': $scope.Attendencedate, 'Method':'Getall' },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

        }).then(function successCallback(response) {

            $scope.GetEmpDailyAttendanceList2 = response.data;


        });

    };


    $scope.UpdateAttDoc = function() {
        $http({



            method: "POST",
            url: "AttendanceDoc.php",
            data: {
                'Attendencedate': $scope.Attendencedate,
                'Description': $scope.Description,
                'Status': $scope.Status,
                

                'Method': 'UpdateAtt'
            },
            headers: { 'Content-Type': 'application/json' }

        }).then(function successCallback(response) {


            $scope.TempMessage = response.data.Message;


          



        });
        $scope.TempSave();
        $scope.Getallvalues();
    };

     /////////////////////////////////////////////////////////
 $http({
    method: "POST",
    url: "AttendanceDoc.php",
    data: { 'Method': 'FETCH' },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

}).then(function successCallback(response) {
    

    $scope.GetEmpDailyAttendanceList2 = response.data;
    // $scope.StatusAtt();
});

///////////////////////////////////////////////////////////



 $scope.FetchDetails = function(Attendencedate) {
            $scope.Attendencedate = Attendencedate;
            
            $http({
                method: "POST",
                url: "AttendanceDoc.php",
                data: {
                    'Attendencedate': $scope.Attendencedate,
                    
                    'Method': "FetchDetail"
                },
                headers: { 'Content_Type': 'application/json' }
            }).then(function successCallback(response) {
                
             
                $scope.Description = response.data.Description;
                $scope.Status = response.data.Status;
                $scope.HandoverDocumentView = response.data.Document;
              


  
            });
        }


//          $scope.StatusAtt = function() {

//             $scope.Status = Status;
      
//   if($Status=="Close")
//   {
//     $scope.btnedit = false;
//   }
           
       
//     }

///////////////////////////////////////////////////////


$scope.FetchAttDoc = function() {
    $http({



        method: "POST",
        url: "AttendanceDoc.php",
        data: {
            'Fromdate': $scope.Fromdate,
            'Todate': $scope.Todate,
            'Status' : $scope.Status,
            'Method': 'ATTDocFetch'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.GetAttDocList = response.data.data01;

    });

};


//////////////////////////////////////////////////



$scope.FetchAttDetails = function() {
    $http({



        method: "POST",
        url: "AttendanceDoc.php",
        data: {
            'Fromdate': $scope.Fromdate,
            'Todate': $scope.Todate,
           
            'Method': 'FetchAttDetails'
        },
        headers: { 'Content-Type': 'application/json' }

    }).then(function successCallback(response) {


        $scope.GetAttDetailList = response.data.data01;

    });

};


});