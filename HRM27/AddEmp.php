<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Exit Employee</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM27Controller">
        <div class="container-fluid dashboard-content">
            <div id="myCarousel" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="mt-3">
                            <div class="row">
                                <div class="col-xl-12">

                                    <div class="">
                                        <h5 class="text-green">Employee Details</h5>
<hr />
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-12">


                                                    <div class="table-responsive">
                                                        <table class="table table-bordered  table-sm table-striped">
                                                            <thead>
                                                                <tr class="text-green">

                                                                    <th>No</th>
                                                                    <th scope="col" style="width: 100px;">
                                                                        Employee ID</th>
                                                                    <th scope="col" style="width: 200px;">Name</th>
                                                                    <th scope="col" style="width: 90px;">Gender</th>
                                                                    <th scope="col">Department</th>
                                                                    <th scope="col">Designation</th>

                                                                    <th scope="col">Contact</th>

                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>


                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="input-group ">
                                                                            <input type="text" class="form-control"
                                                                                ng-model="searchEmployee.Employeeid">

                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group ">
                                                                            <input type="text" class="form-control"
                                                                                ng-model="searchEmployee.Fullname">

                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group ">
                                                                            <input type="text" class="form-control"
                                                                                ng-model="searchEmployee.Gender">

                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group ">
                                                                            <input type="text" class="form-control"
                                                                                ng-model="searchEmployee.Department">

                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group ">
                                                                            <input type="text" class="form-control"
                                                                                ng-model="searchEmployee.Designation">

                                                                        </div>
                                                                    </td>



                                                                    <td colspan="2">
                                                                        <div class="input-group ">
                                                                            <input type="text" class="form-control"
                                                                                ng-model="searchEmployee.Contactno">

                                                                        </div>
                                                                    </td>



                                                                    </td>


                                                                </tr>
                                                                <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                                                    pagination-id="Employeegrid"
                                                                    current-page="currentPageEmpeXIT">




                                                                    <td style="width: 50px;">
                                                                        {{$index+1 + (currentPageEmpeXIT - 1) * pageSizeEmpexit}}
                                                                    </td>
                                                                    <td>{{e.Employeeid}}</td>
                                                                    <td>{{e.Title}} {{e.Fullname}}</td>
                                                                    <td>{{e.Gender}}</td>
                                                                    <td>{{e.Department}}</td>
                                                                    <td>{{e.Designation}}</td>

                                                                    <td>{{e.Contactno}}</td>



                                                                    <td>
                                                                        <div class="action-btn">
                                                                            <img height="15"
                                                                                ng-click="FetchEmployee(e.Employeeid);"
                                                                                src="<?php echo "$domain"; ?>/assets/icons/edit.png"
                                                                                data-target="#myCarousel"
                                                                                data-slide-to="1">




                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="float-right mt-2">
                                                <div class="pagination ">
                                                    <dir-pagination-controls pagination-id="Employeegrid" max-size="3"
                                                        direction-links="true" boundary-links="true" class="pagination">
                                                    </dir-pagination-controls>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="carousel-item">
                        <div class="mt-3">
                            <div class="">
                                <div class="">
                                    <h5 class="text-green">Exit Employee</h5>
                                    <hr />
                                    <div class="">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Employee Name</label>



                                                <select ng-model="Employeeid" class="form-control"
                                                    ng-change="FetchEmployee(Employeeid)">

                                                    <option ng-repeat="s in GetEmployeeList " value="{{s.Employeeid}}">
                                                        {{s.Fullname}}</option>
                                                </select>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Request Date</label>
                                                <input type="text" class="form-control" ng-model="RequestDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Status</label>
                                                <select class="form-control" ng-model="Exitstatus">
                                                    <option Value="Initialized">Initialized</option>
                                                    <option value="Revoked">Revoked</option>
                                                    <option value="Confirmed">Confirmed</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Releiving Date</label>
                                                <input type="text" class="form-control" ng-model="ReleivingDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Gender</label>
                                                <input type="text" class="form-control" ng-model="Gender"
                                                    autocomplete="off" readonly>

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Category</label>
                                                <input type="text" class="form-control" ng-model="Category"
                                                    autocomplete="off" readonly>

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Department</label>
                                                <input type="text" class="form-control" ng-model="EmpDepartment"
                                                    autocomplete="off" readonly>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Designation</label>
                                                <input type="text" class="form-control" ng-model="EmpDesignation"
                                                    autocomplete="off" readonly>

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Contactno</label>
                                                <input type="text" class="form-control" ng-model="Contactno"
                                                    autocomplete="off" readonly>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Hand Overto</label>



                                                <select ng-model="Handoverid" class="form-control"
                                                    ng-change="FetchHandover(Handoverid);">

                                                    <option ng-repeat="s in GetEmployeeList " value="{{s.Employeeid}}">
                                                        {{s.Fullname}}</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Approval Status</label>



                                                <input type="text" class="form-control" ng-model="Approvalstatus"
                                                    autocomplete="off" readonly>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Meeting Date</label>
                                                <input type="text" class="form-control" ng-model="MeetingDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">MeetingTime</label>
                                                <input class="form-control" onfocus="(this.type='time')"
                                                    onblur="(this.type='time')" ng-model="Meetingtime"
                                                    placeholder="HH:mm:ss" />
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Email-ID</label>
                                                <input type="text" class="form-control" ng-model="Emailid"
                                                    autocomplete="off" readonly>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Reason</label>
                                                <input type="text" class="form-control" ng-model="Releivingreason"
                                                    autocomplete="off"/>

                                            </div>
                                            <div class="text-right  col-md-12">
                                                <button class="btn btn-sm btn-success" ng-click="SaveExit();"
                                                    ng-show="btnsave"><i class="fa fa-save"></i> Save</button>
                                             
                                                <button class="btn btn-sm  btn-danger " ng-click="Reset();"><i
                                                        class="fa fa-times"></i> Reset</button>

                                                <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                                    data-slide-to="0" ng-click="Getallvalues()"><i
                                                        class="fa fa-arrow-left"></i> Back</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-success" role="alert" ng-show="Message" id='msg2'>
                                    {{Message}}
                                </div>


                                <div class="col-md-12">
                                    <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;"
                                        ng-show="btnupdate">

                                        <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">
                                            <ul class="nav nav-pills nav-fill">
                                                <li class="nav-item" ng-click="fnhandinfo();">
                                                    <a>Handover Doc</a>
                                                </li>
                                                <li class="nav-item" ng-click="fniteminfo();">
                                                    <a>Asset</a>
                                                </li>

                                                <li class="nav-item" ng-click="fninterview_formatinfo();">
                                                    <a>Interview Form(Exit)</a>
                                                </li>
                                                <li class="nav-item" ng-click="fnno_dueinfo();">
                                                    <a>No Due Form</a>
                                                </li>
                                                <li class="nav-item" class="nav nav-pills nav-fill"><a data-toggle="tab"
                                                        ng-click="fnno_statusinfo();">Status</a></li>
                                                <li class="nav-item" class="nav nav-pills nav-fill"><a data-toggle="tab"
                                                        ng-click="fnno_settlementinfo();">Settelment</a></li>
                                                <li class="nav-item" class="nav nav-pills nav-fill"><a data-toggle="tab"
                                                        ng-click="fnno_payrollinfo();">Payroll Settelment</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                               

                           
                            </div>
                            <?php include 'Exitother.php'?>





                          




                        </div>
                    </div>




                    <div class="modal" id="ModalCenter1Handover" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete
                                        {{HandNextno}}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">
                                        Are You sure want to delete this record?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-danger" ng-click="DeleteHandover();"
                                        data-dismiss="modal">Delete</button>
                                    <button type="button" class="btn btn-sm btn-dark"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1HandoverView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Handover-
                                        Document
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <iframe ng-src="{{HandoverDocumentView}}"
                                            ng-hide="HandoverDocumentView == null || HandoverDocumentView == '' "
                                            ng-show="HandoverDocumentView != null "
                                            style="height:400px;width:100%"></iframe>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-dark"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalCenter1item" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        Delete {{HandoveritemNextno}}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">
                                        Are You sure want to delete this record?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-danger" ng-click="DeleteHandoveritem();"
                                        data-dismiss="modal">Delete</button>
                                    <button type="button" class="btn btn-sm btn-dark"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalCenter1itemView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Handover-
                                        Items
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <iframe ng-src="{{HandoveritemView}}"
                                            ng-hide="HandoveritemView == null || HandoveritemView == '' "
                                            ng-show="HandoveritemView != null "
                                            style="height:400px;width:100%"></iframe>
                                    </div>
                                    <div class="row">
                                        <iframe ng-src="{{HandoveritemView2}}"
                                            ng-hide="HandoveritemView2 == null || HandoveritemView2 == '' "
                                            ng-show="HandoveritemView2 != null "
                                            style="height:400px;width:100%"></iframe>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-rounded btn-dark"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include '../HRM10/Empasset/Assetpopup.php'?>
                </div>



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <?php include '../footerjs.php'?>


                <script src="../Scripts/Controller/HRM27Controller.js"></script>
                <script type="text/javascript"></script>

            </div>
 </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <?php include '../footerjs.php'?>


            <script src="../Scripts/Controller/HRM27Controller.js"></script>
            <script type="text/javascript"></script>

        </div>

    </div>
    </div>


    <script src="../Scripts/jspdf.min.js"></script>

    <script src="../assets/libs/js/html2canvas.min.js"></script>

    <script>
  
       
    //////////////////////////////////////////////////////


    function Validate(event) {
        var regex = new RegExp("^[0-9-/()]");
        var key = String.fromCharCode(event.charCode ? event
            .which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    </script>


    


    <script>
    $(function() {
        $("#edit_report_btn").click(function() {

            var HTML_Width = $("#reportpdfExport").width();
            var HTML_Height = $("#reportpdfExport").height();
            var data = document.getElementById('reportpdfExport');
            html2canvas(data, {
                allowTaint: true,
                scale: 3,
                useCORS: true
            }).then(canvas => {


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
                        pdf.addImage(pageData, 'jpg', 2, position, imgWidth,
                            imgHeight)
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
    </script>
   

</body>

</html>