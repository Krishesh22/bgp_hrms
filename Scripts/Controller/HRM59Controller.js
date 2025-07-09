var app = angular.module('MyApp', ['angularUtils.directives.dirPagination']);
app.controller('HRM59Controller', function($scope, $http, $timeout) {


    /////////////////////////////////////
    $scope.currentPagePayroll01 = 1;
    $scope.pageSizePayroll01 = 10;
    $scope.GrandTotal = 0;


    ///////////////////////////////////////////////////

    $scope.CheckingSession = function() {

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


    $scope.SessionSavedMessage = function() {
        if ($scope.SessionMessage == "SessionNo") {
            //  alert("Session Expired! Please Login Again...");

            window.location.replace($scope.Sessionurl);
            return;
        }
    }


   
    //////////////////////
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
    ////////////////////////////////////////////

    


    $(document).ready(function(e) {
        $scope.CheckingSession();


        $('#fileButtonEmp').on('click', function() {
            $("#overlay").fadeIn(300);
            var form_data = new FormData();
            var ins = document.getElementById('fileInputBulkEmp').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('fileInputBulkEmp').files[x]);
            }

           
            $.ajax({
                url: 'Employeeleave.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {

                    alert(response);
                    $("#overlay").fadeOut(300);
                    document.getElementById("fileInputBulkEmp").value = '';
                    //  $scope.GetDeductionDetails();
                    $('#msg1').html(response);
                    setTimeout(function() {
                        $('#msg1')
                            .empty().append("");

                        $scope.Message = "";
                    }, 3000);

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
    ///////////////////////////////////////////
    
    ////////////////////////////////////////////////////////////////////
});