<?php 
include('../config.php');
include('../session.php');
include('../phpspreadsheet.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Cat-3 Absent Attendence Details </title>
</head>
<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM48Controller">
            <div class="container-fluid dashboard-content">
                <div class="row col-lg-12">
                <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Category-3 Absent Attendances Details</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Attendance Date</label>
                                    <input type="text" class="form-control" ng-model="AttendanceDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')" ng-model-options='{ debounce: 1500 }'  
                                        ng-change="Getcat3absAttendanceDate();"
                                      >
                                </div>
                                <!--  -->
                                <div class="form-group text-right mt-25">
                                <button class="btn btn-sm btn-success" 
                                        ng-click="Getcat3absAttendanceDate();">Get Details</button> 
                                        <a class="btn btn-warning btn-sm" href="Cat3absexcel.php"
                                               ><i class="fa fa-download"></i>
                                                Download</a>
                                      
                                </div>
                            </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>



                    
                   
                        
                    <div class="card">
                        <h5 class="card-header text-green">Employee Present  Details</h5>
                        <div class="card-body">
                            <div id="pdfExport" >
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr class="bg-green text-white">



                                        <th>#</th>
                                        <th scope="col">Empid</th>
                                        <th scope="col">Empname</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Intime</th>
                                        <th scope="col">Outtime</th>
                                        <th scope="col">Workinghrs</th>
                                       
                                        <th scope="col">OT</th>
                                      
                                       
                                    </tr>
                                </thead>


                                <tbody>
                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Employeeid">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Firstname">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.AttenStatus">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Intime">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Outtime">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.Workinghours">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                  
                                                    <td >
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchHoliday.OT_HRS">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                  

                                                    </td>

                                    <tr dir-paginate="e in Getcat3EmpDailyAttendanceList|filter:searchHoliday |itemsPerPage:n"
                                        pagination-id="EmpAttendancegrid" current-page="currentPageEmpAttendance">
                                        
                                        <td style="width: 50px;">
                                            {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                        </td>
                                        <td>{{e.Employeeid}}</td>
                                        <td>{{e.Title}}{{e.Firstname}}</td>
                                        <td>{{e.AttenStatus}}</td>
                                        <td>{{e.Intime}}</td>
                                        <td>{{e.Outtime}}</td>
                                        <td>{{e.Workinghours}}</td>
                                        
                                        <td>{{e.OT_HRS}}</td>
                                    
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <div class="float-right mt-2">
                                <div class="pagination ">
                                    <dir-pagination-controls pagination-id="EmpAttendancegrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>
                                </div>

                            </div>
                        </div>
                    </div>





                </div>
            </div>

        </div>
        <?php include '../footer.php'?>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM48Controller.js"></script>
    <script src ="../Scripts/html2canvas/html2canvas.min.js"></script>
    <script src="../Scripts/cloudflare/html2canvas.min.js"></script>
    <script src="../Scripts/cloudflare/debug.js"></script>
    
    
 
     <script>

$(document).ready(function(){


$("#data_to_image_btn").click(function(){


var HTML_Width = $("#pdfExport").width();
var HTML_Height = $("#pdfExport").height();
var data = document.getElementById('pdfExport');

html2canvas(data,{useCORS : true,scale:3,allowTaint: true,  
onrendered: function(canvas) {
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
var imgHeight = 592.28/contentWidth * contentHeight;
var imgData = canvas.toDataURL('image/jpg', 1.0);
console.log('Report Image URL: '+imgData);
var pdf = new jsPDF('', 'pt', 'a4');
//
if (leftHeight < pageHeight) {
    pdf.addImage(imgData, 'jpg', 2, 2, imgWidth, imgHeight );
} else {
while(leftHeight > 0) {
pdf.addImage(imgData, 'jpg', 2, position, imgWidth, imgHeight)
  leftHeight -= pageHeight;
  position -= 841.89;
  //Avoid adding blank pages
  if(leftHeight > 0) {
    pdf.addPage();
  }
}
}

pdf.save('sample.pdf');
}

});

});


})
    </script>

</body>

</html>