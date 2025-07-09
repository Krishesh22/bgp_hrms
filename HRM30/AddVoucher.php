<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Add Voucher</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
   

    <div class="dashboard-main-wrapper">

<?php include '../headerin.php'?>
<?php include '../Sidebarin.php'?>
    </div>
    <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM30Controller" id="wrapper">
        <div class="container-fluid dashboard-content">

            <div class="">

                <div class="row">

                    <div class="col-md-12">
                        <h5 class="text-green">Add Voucher </h5>
                        <hr />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Voucher no</label>
                        <input type="text" class="form-control" ng-model="DVoucherno" autocomplete="off" readonly id="DVoucherno">
                    </div>


                    <div class="form-group col-md-3">
                        <label class="col-form-label">Voucher Date</label>
                        <input type="text" class="form-control" ng-model="DVoucherdate" onfocus="(this.type='date')"
                            onblur="(this.type='date')" id="DVoucherdate">
                    </div>

                    
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Receiver Type</label>
                        <select class="form-control" ng-model="ReceiverType" ng-change="GetReceivertype(ReceiverType);" id="ReceiverType">
                                                            <option Value="Internal">Internal</option>
                                                            <option value="Outside">Outside</option>

                                                        </select>
                    </div>

                    <!-- <div class="form-group col-md-3">
                        <label class="col-form-label">Status</label>


                        <select class="form-control" ng-model="DVStatus">
                            <option Value="Open">Open</option>
                            <option value="Close">Close</option>
                            <option value="Cancel">Cancel</option>

                        </select>

                    </div> -->

                    <div class="form-group col-md-3" ng-show="btnouter">
                        <label class="col-form-label">Receiver Name</label>
                        <input type="text" class="form-control" ng-model="Receivername" autocomplete="off" id="Receivername">
                    </div>

                    <div class="form-group col-md-3" ng-show="btninternal">
                        <label class="col-form-label">Receiver Name</label>
                        <select ng-model="Employeeid" class="form-control"
                                        ng-change="FetchReceivername(Employeeid)" id="Employeeid">

                                        <option ng-repeat="s in GetEmployeeList " value="{{s.Employeeid}}">
                                            {{s.Fullname}}</option>
                                    </select>
                    </div>
                    <div class="form-group col-md-3">
                                            <label class="col-form-label">Location<span
                                                    class="required">*</span></label>
                                            <select ng-model="Locationid" class="form-control" ng-change="GETLocationwiseBalance();" id="Locationid">

                                                <option ng-repeat="s in GetLocationList " value="{{s.ID}}">
                                                    {{s.LocationName}}</option>
                                            </select>
                                        </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Head Of Account</label>
                        <select ng-model="Chartofaccount" class="form-control" id="Chartofaccount">
                            <option ng-repeat="s in GetChartOfAccountList " value="{{s.Chartofaccount}}">
                                {{s.Chartofaccount}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                                            <label class="col-form-label">Available Balance</label>
                                            <input type="text" class="form-control" ng-model="CurrentdateBalanceAmount"
                                                autocomplete="off" readonly>
                                        </div>

                    <div class=" col-md-1 text-right">
                        <div class="form-btn-sm form-btn-top">
                            <button class="btn btn-success" ng-click="Reset();">Reset</button>
                        </div>
                    </div>



                    <div class="col-md-12 mt-3">
                        <div class="alert alert-info " role="alert" ng-show="Message">
                            {{Message}}
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">

                            <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item" ng-click="fndetailsinfo();" ng-show="btnUpdate">
                                        <a>Details</a>
                                    </li>
                                    <li class="nav-item" ng-click="fncamerainfo();" ng-show="btnUpdate">
                                        <a>Camera</a>
                                    </li>

                                    <li class="nav-item" ng-click="fncashinfo();" ng-show="btnUpdate">
                                        <a>Cash Voucher</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>





                <div class="" ng-show="btndetails">
                    <h5 class="text-green mt-3">Details</h5>
                    <hr />
                    <div class="">

                        <div class="row">
                            <div class="form-group col-md-1">
                                <label class="col-form-label">S.No</label>
                                <input type="text" class="form-control" ng-model="DVdetailno" autocomplete="off"
                                    readonly id="DVdetailno" >
                            </div>


                            <div class="form-group col-md-5">
                                <label class="col-form-label">Particulars</label>
                                <input type="text" class="form-control" ng-model="Particulars" autocomplete="off" id="Particulars" >
                            </div>


                            <div class="form-group col-md-2">
                                <label class="col-form-label">Amount</label>
                                <input type="text" class="form-control" ng-model="DVAmount" autocomplete="off"  ng-model-options='{ debounce: 1000 }'
                                                ng-change="CheckInwardAmount(DVAmount,Locationid)" id="DVAmount">
                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">Documents</label>
                                <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput" id="fileInput04"
                                                                            name=files[]
                                                                            accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                        <!-- <div class="input-group-append">
                                                                            <p id="fileButton04"
                                                                                class="input-group-text">
                                                                                <i class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div> -->
                                                                    </div>
                            </div>
                            <div class=" col-md-12 text-right">
                                <div class="form-btn-sm mb-2">
                                    <button class="btn btn-success" ng-click="UpdateVoucherNo();" ng-show="btnUpdate"><i
                                            class="fa fa-save"></i> Save</button>




                                    <button class="btn btn-success" ng-click="SaveVoucherNo();" ng-show="btnSave"><i
                                            class="fa fa-save"></i> Save</button>
                                    <button class="btn btn-warning" ng-click="ResetDetail();"><i class="fa fa-plus"></i>
                                        Add
                                        Details</button>
                                </div>
                            </div>


                            <div class="col-md-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="bg-green text-white">

                                                <th>#</th>
                                                <th>Particulars</th>
                                                <th>Amount</th>
                                                <!-- <th>Documents</th> -->
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr dir-paginate="e in GetVoucherDetailList |filter:searchDepartment|itemsPerPage:n "
                                                pagination-id="DeparmentGrid" current-page="currentPageVoucherDetail">


                                                <td style="width: 50px;">
                                                    {{$index+1 + (currentPageVoucherDetail - 1) * pageSizeVoucherDetail}}
                                                </td>
                                                <td>{{e.Particulars}}</td>
                                                <td>{{e.DVAmount}}</td>
                                                <!-- <td>{{e.voucherattachmentpath}}</td> -->
                                                <td ng-show="e.voucherattachmentpath != 0 ">
                                                                <div class="action-btn" ng-show="e.voucherattachmentpath!=''">

                                                                    <img height="15" data-toggle="modal" ng-show="e.voucherattachmentpath!=''"
                                                                        data-target="#ModalCenter1EMPDocumentView"
                                                                        ng-click="SendDetailEdit(e.DVoucherno,e.DVdetailno);"
                                                                        src="<?php echo "$domain";?>/assets/icons/view.png">

                                                                </div>
                                                            </td>
                                            <td ng-show="e.voucherattachmentpath==0">
                                                            {{DocumentsTest}}

                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>



                    </div>

                </div>

                <div class="" ng-show="btncamera">



                    <form method="POST" class="camara-form" action="storeImage.php" id="Imageupload">
                        <h5 class="text-green mt-2">Web Camera</h5>
                        <hr />

                        <div class="row">


                            <div class="col-md-6" ng-show="btncamera">
                                <div class="">

                                    <button type="button" onClick="Startcamera();" class="btn btn-info btn-sm"> <span
                                            class="fa fa-camera" aria-hidden="true"></span>&nbsp;&nbsp;Start
                                        Camera</button>
                             
                                    <button class="btn btn-success btn-sm"> <span class="fa fa-floppy-o"
                                            aria-hidden="true"></span>&nbsp;&nbsp;Save</button>
                                    <button type="button" onClick="Stopcamera();" class="btn btn-danger btn-sm"> <span
                                            class="fa fa-camera" aria-hidden="true"></span>&nbsp;&nbsp;Stop
                                        Camera</button>
                                    <!-- <button type="button" data-target="#myCarousel" data-slide-to="0"
                                        class="btn btn-warning btn-sm">
                                        <span class="fa fa-arrow-left"
                                            aria-hidden="true"></span>&nbsp;&nbsp;Back</button>
                                    <div> -->



                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div style="height: 200px;width:200px" id="my_camera"> </div>
                                <input type="hidden" name="image" class="image-tag">
                            </div>
                            <div class="col-md-3">
                                <div class="t-2">
                                    <div class="camara-preview"> <img style="height: 110px;width:110px"
                                            ng-src="{{ReceiverImagePath}}"
                                            ng-hide="ReceiverImagePath == null || Userimage == '' "
                                            ng-show="ReceiverImagePath != null " />
                                    </div>
                                    <div ng-show="tstsssss">
                                        <div id="results">
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </form>






                    <div class="">
                        <div class="data-table">


                            <div class="row">
                                <div class="col-lg-12">



                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <div class="" ng-show="btncash">




                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5 class="text-green">Cash Voucher</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a id="cash_btn" class="btn btn-info btn-sm text-right"><i class="fa fa-download"></i>
                                Download</a>
                        </div>
                    </div>
                    <hr />
                    <div class="">




                        <div class="">

                            <div id="pdfExport">






                                <style>
                                table {
                                    max-width: 765px;
                                    position: relative;
                                }

                                .settlement-data {}

                                .date {
                                    position: absolute;
                                    left: 685px;
                                    top: 83px
                                }

                                .settlement-data table {
                                    width: 100%;
                                }

                                .settlement-data table,
                                .settlement-data td,
                                .settlement-data th {
                                    border: 1px solid #888888;
                                    border-collapse: collapse;
                                }

                                table.no-border td,
                                table.no-border th {
                                    border: 1px solid transparent;
                                    border-collapse: collapse;
                                    font-size: 1rem !important;
                                }

                                .settlement-data td,
                                .settlement-data th {
                                    padding: 3px 10px;
                                    width: 30px;
                                    height: 25px;
                                    font-size: 13px;
                                }

                                .settlement-data th {
                                    background: #f0e6cc;
                                }

                                .settlement-data .even {
                                    background: #fbf8f0;
                                }

                                .settlement-data .odd {
                                    background: #fefcf9;
                                }

                                .settlement-data .settlement-logo {
                                    height: 35px;
                                    position: absolute;
                                    margin: 10px 0 0px 5px
                                }

                                .profile {
                                    height: 80px;
                                    width: 80px;
                                    background-color: #f5f5f5;
                                    margin-bottom: 5px;
                                }

                                .profile img {
                                    height: 80px;
                                    width: 80px;
                                }
                                </style>
                                <div>
                                    <div class='settlement-data'>
                                        <!-- 	<div class='date'>Date: 17-10-2022</div> -->

                                        <table class=''>
                                            <tbody>

                                                <tr>
                                                    <td><img class='settlement-logo' src='sainmarks.png'>
                                                        <center style="margin-left:80px"><b>SAINMARKS INDUSTRIES INDIA
                                                                PVT
                                                                LTD</b><br /> 476/1b1a,label Arcade, Jothi
                                                            Nagar, Palavanjipalayam, Dharapuram Road,<br />
                                                            KNP Colony (P.o), Tirupur – 641 605, India
                                                        </center>
                                                    </td>
                                                    <td align='center' colspan='2'>
                                                        DEBIT/CREDIT/CASH<br>VOUCHER</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan='2'>
                                                        <p>Head of A/C:{{Chartofaccount}}</p>
                                                        <p>Name: {{Receivername}}</p>
                                                    </td>
                                                    <td colspan='2'>No.{{DVoucherno}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan='2'><b>Date</b>:{{DVoucherdate2}}</td>
                                                </tr>




                                                <tr align='center'>


                                                    <td>Particulars</td>
                                                    <td colspan='2' style='width:24%;height: 15px;'>
                                                        Amount</td>
                                                </tr>

                                                <tr valign='top'
                                                    dir-paginate="e in GetVoucherDetailList |filter:searchDepartment|itemsPerPage:n "
                                                    pagination-id="DeparmentGrid"
                                                    current-page="currentPageVoucherDetail">

                                                    <td>{{e.Particulars}}</td>

                                                    <td colspan='2' style='width:20%;text-align:right'>
                                                        {{e.DVAmount | currency:''}}</td>
                                                </tr>



                                            </tbody>
                                        </table>


                                        <table class='no-border' style='margin-top: -2px;'>
                                            <tbody>
                                                <tr valign='bottom'>
                                                    <td align='center'>Cashier</td>
                                                    <td align='center'>
                                                        <div class='profile' style="margin-top:5px">
                                                            <img ng-src="{{ReceiverImagePath}}"
                                                                ng-hide="ReceiverImagePath == null || ReceiverImagePath == '' "
                                                                ng-show="ReceiverImagePath != null " />
                                                        </div>Receiver
                                                    </td>
                                                    <td align='center'>
                                                        <div class='profile' style="margin-top:5px"
                                                            ng-hide="Receiversignature == null || Receiversignature == '' "
                                                            ng-show="Receiversignature != null ">
                                                            <img ng-src="{{Receiversignature}}"
                                                                ng-hide="Receiversignature == null || Receiversignature == '' "
                                                                ng-show="Receiversignature != null " />
                                                        </div>Signature
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="" ng-show="btnsign">
                    <div class="wdget1 shadow">
                        <div class="data-table">


                            <h5 class="text-green mt-3">Signature</h5>
                            <hr />
                            <form id="formupload" method="post" action="Signature.php">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div id="sig"></div>
                                        <textarea id="signature64" name="signed" ng-model="signed"
                                            style="display: none"></textarea>
                                    </div>
                                    <div class="col-md-4"> <img ng-src="{{Receiversignature}}"
                                            ng-hide="Receiversignature == null || Receiversignature == '' "
                                            ng-show="Receiversignature != null "
                                            style="height:150px;width: auto;border:1px solid #a1a1a1" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-right mt-2">
                                            <button id="clear" class="btn btn-danger btn-sm"> <span class="fa fa-times"
                                                    aria-hidden="true"></span>&nbsp;&nbsp;Clear</button>
                                            <button type="submit" class="btn btn-success btn-sm"> <span
                                                    class="fa fa-floppy-o"
                                                    aria-hidden="true"></span>&nbsp;&nbsp;Submit</button>

                                        </div>
                                    </div>



                                </div>




                            </form>

                        </div>
                    </div>

                </div>

                <div class="modal fade emp-modal" id="ModalCenter1EMPDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                  Voucher Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{voucherattachmentpath}}"
                                        ng-hide="voucherattachmentpath == null || voucherattachmentpath == '' "
                                        ng-show="voucherattachmentpath != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal fade emp-modal" id="ModalDeleteVoucherDetail" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert alert-info">
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                Delete {{DVdetailno}}
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
                            <button class="btn btn-rounded btn-danger" ng-click="DeleteDetail();"
                                data-dismiss="modal">Delete</button>
                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php include '../footerjs.php'?>

    </div>

    <script src="../Scripts/Controller/HRM30Controller.js">
    </script>
    <script src="../Scripts/jspdf.min.js"></script>
    <script src="../assets/libs/js/html2canvas.min.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

<script type="text/javascript">
    $(".tab-list ul").on('click', 'li', function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
    </script>
    <script language="JavaScript">
    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }

    function Startcamera() {
        Webcam.set({
            width: 200,
            height: 150,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    }

    function Stopcamera() {
        Webcam.reset();
    }
    </script>




<script>
        $(function() {
            $("#cash_btn").click(function() {

                var HTML_Width = $("#pdfExport").width();
                var HTML_Height = $("#pdfExport").height();
                var data = document.getElementById('pdfExport');
                html2canvas(data, {
                    allowTaint: true,
                    scale: 3,
                    useCORS: true
                }).then(canvas => {


                    var contentWidth = canvas.width;
                    var contentHeight = canvas.height;
                    //One page pdf shows the canvas height generated by html pages.
                    // var pageHeight = contentWidth / 592.28 * 841.89;
                    var pageHeight = contentWidth / 592.28 * 741.89;
                    //html page height without pdf generation
                    var leftHeight = contentHeight;
                    //Page offset
                    var position = 2;
                    //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
                    var imgWidth = 595.28;
                    var imgHeight = 592.28 / contentWidth * contentHeight;
                    var pageData = canvas.toDataURL('image/jpeg', 1.0);
                    var pdf = new jsPDF('', 'pt', 'a5');
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

    </div>

</body>

</html>