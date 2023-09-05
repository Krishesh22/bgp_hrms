<?php include '../config.php'?>
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
        <div class="dashboard-wrapper"  ng-App="MyApp" ng-controller="HRM31Controller" >
            <div class="container-fluid dashboard-content">
            <div class="card" >
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

                        <div class="form-group col-md-3">

                            <div class="mt-25">
                                <button class="btn btn-sm btn-success" ng-click="GetInbetweendateDetails();"> Get Detail</button>
                           
                                <a id="data_to_image_btn" class="btn btn-warning btn-sm"><i
                                class="fa fa-download"></i>
                            Download</a>

                            </div>

                        </div>
               
           </div>
            </div>

                <div class="card-body">

                <div id="pdfExport">
                    <div class="row">

<p>&nbsp;&nbsp;&nbsp;&nbsp;Transaction Detail From Date - {{Fromdate2}} To date -{{Todate2}}</p>
                        <div class="table-responsive custom-table custom-table-noborder ">


                            <table class="table table-bordered  table-sm table-striped">
                                <thead>
                                
                                    <tr class="tablethrow">
                                       

                                        <th style="width: 50px;">S.No</th>


                                        <th>Transaction No</th>
                                        <th>Date</th>
                                       
                                        <th>Type</th>
                                        <th>Notes</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance </th>
                                   
                                        
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr dir-paginate="e in GetInwardTransactionList |filter:searchPayroll|itemsPerPage:n "
                                        pagination-id="Transactiongrid" current-page="CurrentPageTransaction"
                                       >

    
                                        <td style="width: 50px;">
                                            {{$index+1 + (CurrentPageTransaction - 1) * PageSizeTransaction}}
                                        </td>


                                        <td>{{e.Transactionno}}</td>
                                        <td>{{e.Transactiondate2}} </td>
                                        <td>{{e.Transactiontype}}</td>
                                        <td>{{e.Transactionnotes}}</td>
                                       

                                        <td style="text-align: right;">{{e.Debit |currency:''}}</td>
                                        <td style="text-align: right;">{{e.Credit |currency:''}}</td>
                                        <td style="text-align: right;">{{e.Balance |currency:''}}</td>
                                        


                                    </tr>
                                </tbody>
                            </table>





                        </div>

                        <div class="pagination">
                            <dir-pagination-controls pagination-id="Transactiongrid" max-size="3" direction-links="true"
                                boundary-links="true" class="pagination">
                            </dir-pagination-controls>
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
  
    <script src="../assets/libs/js/html2canvas.min.js"></script>

    <script>
    $(function() {
        $("#data_to_image_btn").click(function() {

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
                        pdf.addImage(pageData, 'jpg', 2, position, imgWidth, imgHeight)
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