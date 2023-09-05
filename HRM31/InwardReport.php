<?php include '../config.php';
session_start();


    $Clientid =$_SESSION["Clientid"];
    $query = "SELECT * FROM indsys1031locationmaster WHERE Clientid ='$Clientid' "; 
    $result = $conn->query($query);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title> Transaction </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <style>
        /* .body-content{padding-top:50px} */
        .checkbox {
            padding: 0;
            margin: 0;
        }

        .dropdown-menu {
            overflow: auto !important;
        }

        .form-group div {
            display: inline-block;
            margin-right: 10px
        }
        </style>

        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.js"></script> -->

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM31Controller">
            <div class="container-fluid dashboard-content">
                <div class="card">
                    <h5 class="card-header text-green"> Transaction Details</h5>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="col-form-label">From Date</label>
                            <input type="text" class="form-control" ng-model="Fromdate" onfocus="(this.type='date')"
                                onblur="(this.type='date')">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-form-label">To Date</label>
                            <input type="text" class="form-control" ng-model="Todate" onfocus="(this.type='date')"
                                onblur="(this.type='date')">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-form-label">Location</label>
                            <!-- <div ng-dropdown-multiselect="" extra-settings="dropdownSetting" 
                     options="Categories" selected-model="CategoriesSelected" checkboxes="true"></div>
                        </div> -->

                            <select id="multiple-checkboxes" multiple="multiple" name="lang[]" ng-model="Locationid">

                                <?php 
                                        if($result->num_rows > 0){ 
                                        while($row = $result->fetch_assoc()){  
                                            echo '<option value="'.$row['ID'].'">'.$row['LocationName'].'</option>'; 
                                                                              } 
                                                                }
                                ?>
                            </select>

                        </div>

                        <div class="form-group col-md-4">

                            <div class="mt-25">
                                <button class="btn btn-sm btn-success" ng-click="GetInbetweendateDetails();"> Get
                                    Detail</button>
                                    
                         
               
                                <a   class="btn btn-warning btn-sm"  href="Transacationpdf.php" ng-click="GETREPORT()"><i class="fa fa-download"></i>
                                    Download</a>
                                

                            </div>

                        </div>

                    </div>
                </div>

                <div class="card-body">

                    <div id="pdfExport">
                        <div class="row">

                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Transaction Detail From Date - {{Fromdate2}} To date -{{Todate2}}
                            </p>
                            <div class="table-responsive custom-table custom-table-noborder ">


                                <table class="table table-bordered  table-sm table-striped">
                                    <thead>

                                        <tr class="tablethrow">


                                            <th style="width: 50px;">S.No</th>


                                            <th>Transaction No</th>
                                            <th>Date</th>

                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Notes</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Balance </th>
                                            <th >Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr dir-paginate="e in GetInwardTransactionList |filter:searchPayroll|itemsPerPage:n "
                                            pagination-id="Transactiongrid" current-page="CurrentPageTransaction">


                                            <td style="width: 50px;">
                                                {{$index+1 + (CurrentPageTransaction - 1) * PageSizeTransaction}}
                                            </td>


                                            <td>{{e.Transactionno}}</td>
                                            <td>{{e.Addormodifydatetime2}} </td>
                                            <td>{{e.Transactiontype}}</td>
                                            <td>{{e.Location}}</td>
                                            <td>{{e.Transactionnotes}}</td>


                                            <td style="text-align: right;">{{e.Debit |currency:''}}</td>
                                            <td style="text-align: right;">{{e.Credit |currency:''}}</td>
                                            <td style="text-align: right;">{{e.Balance |currency:''}}</td>

                                            <td ng-show="e.Transactiontype =='Payment'">
                                                <div class="action-btn">

                                                    <img height="15" data-toggle="modal" data-target="#ModalVoucher"
                                                        ng-click="SendTransactionNo(e.Transactionno,e.Transactiontype);"
                                                        src="<?php echo "$domain";?>/assets/icons/view.png">

                                                </div>
                                            </td>
                                            <td ng-show="e.Transactiontype =='Receipt'">
                                                <div class="action-btn">

                                                    <img height="15" data-toggle="modal" data-target="#ModalWallet"
                                                        ng-click="SendTransactionNo(e.Transactionno,e.Transactiontype);"
                                                        src="<?php echo "$domain";?>/assets/icons/view.png">

                                                </div>
                                            </td>


                                        </tr>
                                    </tbody>
                                </table>





                            </div>

                            <div class="pagination">
                                <dir-pagination-controls pagination-id="Transactiongrid" max-size="3"
                                    direction-links="true" boundary-links="true" class="pagination">
                                </dir-pagination-controls>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade emp-modal" id="ModalWallet" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Transaction Detail - {{Transactionno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="col-form-label">Transaction no</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" ng-model="InwardMasterno"
                                                autocomplete="off" readonly>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="col-form-label">Type</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" ng-model="Inwardtype"
                                                autocomplete="off" readonly>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="col-form-label">Transaction Date</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" ng-model="Inwarddate2"
                                                autocomplete="off" readonly>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="col-form-label">Transaction Amount</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" ng-model="Inwardamount"
                                                autocomplete="off" readonly>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="col-form-label">Location</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" ng-model="InwardLocation"
                                                autocomplete="off" readonly>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="col-form-label">Notes</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" ng-model="InwardNotes"
                                                autocomplete="off" readonly>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalVoucher" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Transaction Detail - {{Transactionno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Voucher no</label>
                                            <input type="text" class="form-control" ng-model="DVoucherno"
                                                autocomplete="off" readonly>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Voucher Date</label>
                                            <input type="text" class="form-control" ng-model="DVoucherdate2"
                                                autocomplete="off" readonly>

                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Receiver Type</label>
                                            <input type="text" class="form-control" ng-model="Receivertype"
                                                autocomplete="off" readonly>

                                        </div>



                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Receiver Name</label>
                                            <input type="text" class="form-control" ng-model="Receivername"
                                                autocomplete="off" readonly>

                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Location<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" ng-model="VoucherLocation"
                                                autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label class="col-form-label">Head Of Account</label>
                                            <input type="text" class="form-control" ng-model="Chartofaccount"
                                                autocomplete="off" readonly>
                                        </div>











                                    </div>

                                    <div class="row">
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
                                                            pagination-id="DeparmentGrid"
                                                            current-page="currentPageVoucherDetail">


                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageVoucherDetail - 1) * pageSizeVoucherDetail}}
                                                            </td>
                                                            <td>{{e.Particulars}}</td>
                                                            <td>{{e.DVAmount}}</td>
                                                            <!-- <td>{{e.voucherattachmentpath}}</td> -->
                                                            <td ng-show="e.voucherattachmentpath !=0">
                                                                <div class="action-btn" ng-show="e.voucherattachmentpath!=''">

                                                                    <img height="15" data-toggle="modal" ng-show="e.voucherattachmentpath!=''"
                                                                        data-target="#ModalCenter1EMPDocumentView"
                                                                        ng-click="SendDetailEdit(e.DVoucherno,e.DVdetailno);"
                                                                        src="<?php echo "$domain";?>/assets/icons/view.png">

                                                                </div>
                                                            </td>
                                                            <td ng-show="e.voucherattachmentpath==0">
                                                                No Document Available

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                   






                                </div>



                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
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
                                        ng-show="voucherattachmentpath != null "
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

            </div>


            <?php include '../footer.php'?>
        </div>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM31Controller.js"></script>
    <script src="../Scripts/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
    </script>

    <script src="../assets/libs/js/html2canvas.min.js"></script>

  

    <script>
    $(function() {
        $("#cash_btn").click(function() {

            var HTML_Width = $("#pdfExportcash").width();
            var HTML_Height = $("#pdfExportcash").height();
            var data = document.getElementById('pdfExportcash');
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

</body>

</html>