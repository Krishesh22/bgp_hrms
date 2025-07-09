<?php 
include('../config.php');
include('../session.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>தொழிலாளர் பற்றிய விபரம்</title>
</head>

<body>
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
    <!-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script> -->

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper">

            <div class="row">
                <div class="col-lg-9">

                <div class="pdf-data" style="margin: 30px">
                    
                        <h5 class="card-header text-green">தொழிலாளர் பற்றிய விபரம்</h5>
                        <div class="card-body">




                            <div id="pdfExport">
                                <p>
                                    
                                        <h2>தொழிலாளர் பற்றிய விபரம்</h2>
                                    

                                    <style type="text/css">
                                    table.doc-table {
                                        border-collapse: collapse;
                                        margin: 20px 0;
                                    }

                                    table.doc-table td,
                                    table.doc-table th {
                                        border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;
                                    }

                                    .candidate-photo {
                                        display: inline-block;
                                        height: 80px;
                                        width: 80px;
                                        padding: 40px;
                                        background-color: #f5f5f5;
                                        text-align: center;
                                        position: absolute;
                                        right: 5%;
                                        top: 80px;
                                        border: 1px solid #888888;
                                    }
                                    </style>


                                <div class="candidate-photo">
                                    <p style="margin:22px 0 0 0px">Candidate Photo</p>
                                </div>

                                <table>
                                    <tr>
                                        <td>பெயர்</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>தொழிலாளர் எண்</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>பதவி</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>பிரிவு / துறை</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>கல்வி தகுதி</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>பிறந்த தேதி / வயது</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>திருமண நிலை</td>
                                        <td>:</td>
                                    </tr>
                                    <tr>
                                        <td>பாலினம்</td>
                                        <td>:</td>
                                    </tr>
                                </table>

                                <table class="doc-table">
                                    <tbody>
                                        <tr>
                                            <td style="width:383.2px; text-align: center;">தற்போதைய
                                                முகவரி<br /><br /><br /><br /><br /><br /></td>
                                            <td style="width:383.2px; text-align: center;">நிரந்தர
                                                முகவரி<br /><br /><br /><br /><br /><br /></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p>அவசரகால தொடர்புக்கு (குடும்ப உறுப்பினர்கள்)</p>

                                <table class="doc-table">
                                    <tbody>
                                        <tr>
                                            <td style="width:250px; text-align: center;">
                                                பெயர்<br /><br /><br /><br /><br /><br /></td>
                                            <td style="width:250px; text-align: center;">தொலைபேசி
                                                எண்<br /><br /><br /><br /><br /><br /></td>
                                            <td style="width:250px; text-align: center;">
                                                உறவுமுறை<br /><br /><br /><br /><br /><br /></td>
                                        </tr>
                                    </tbody>
                                </table>


                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width:250px; text-align: center;">நியமனதாரர் பெயர்<br /><br />
                                            </td>
                                            <td style="width:250px; text-align: center;"><br /><br /></td>
                                            <td style="width:250px; text-align: center;">உறவுமுறை<br /><br /></td>
                                        </tr>
                                    </tbody>
                                </table>



                                <p>சமூக நன்மைகள்/NA</p>
                                <table class="doc-table">
                                    <tbody>
                                        <tr>
                                            <td style="width:383.2px; text-align: center;">ESI<br /><br />0.75%</td>
                                            <td style="width:383.2px; text-align: center;">PF<br /><br />12%</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="doc-table">
                                    <tbody>
                                        <tr>
                                            <td style="width:766.4px;">சம்பளம்:RS.
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                நாள் / மாதம்</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p style="text-align:left;">தொழிலாளர் கையொப்பம்<span style="float:right;">நிர்வாகி
                                        கையொப்பம்</span></p>
                                <p>நாள் :</p>

                            </div>





                            <a id="data_to_image_btn" style="margin-top:30px" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                            <!-- <a id="pdfExporttest" onclick="demoFromHTML();" class="btn btn-info btn-nda-down"><i
                                        class="fa fa-download"></i>
                                    Download</a> -->

                            <style>
                            .btn-nda-down {
                                position: absolute;
                                top: 5px;
                                right: 15px;
                            }

                            h4 {
                                font-size: 1.3rem;
                                font-weight: bold;
                                color: #3AC47D
                            }
                            </style>




                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <?php include '../footer.php'?>
    </div>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
    $(function() {
        $("#data_to_image_btn").click(function() {

            var HTML_Width = $("#pdfExport").width();
            var HTML_Height = $("#pdfExport").height();
            var data = document.getElementById('pdfExport');
            html2canvas(data).then(canvas => {
                // Few necessary setting options
                //   var imgWidth = 250;
                //   var imgHeight = canvas.height * imgWidth / canvas.width;

                var contentWidth = canvas.width;
                var contentHeight = canvas.height;

                var pageHeight = contentWidth / 600 * 841.89;

                var leftHeight = contentHeight;

                var position = 0;
                //a4 paper size [595.28841.89], width and height of image in pdf of canvas generated by html page
                var imgWidth = 900;
                var imgHeight = 600 / contentWidth * contentHeight;



                var top_left_margin = 10;
                var PDF_Width = HTML_Width + (top_left_margin * 2);
                var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);


                const contentDataURL = canvas.toDataURL('image/jpeg', 1.0);
                let pdf = new jspdf('L', 'pt', [PDF_Width, PDF_Height]); // A4 size page of PDF
                var position = 0;
                var canvas_image_width = HTML_Width;
                var canvas_image_height = HTML_Height;
                //
                pdf.addImage(contentDataURL, 'JPEG', top_left_margin, top_left_margin,
                    canvas_image_width, pageHeight);

                window.open(pdf.output('bloburl', {
                    filename: 'new-file.pdf'
                }), '_blank');
            });

        });
    });



    function demoFromHTML() {

        html2canvas(document.getElementById('pdfExport'), {
            onrendered: function(canvasObj) {
                var pdf = new jsPDF('P', 'pt', 'a4'),
                    pdfConf = {
                        pagesplit: false,
                        backgroundColor: '#FFF'
                    };
                document.body.appendChild(canvasObj); //appendChild is required for html to add page in pdf
                pdf.addHTML(canvasObj, 0, 0, pdfConf, function() {
                    document.body.removeChild(canvasObj);
                    pdf.addPage();
                    //pdf.save('Test.pdf');
                    alert("Cursor In");
                    window.open(pdf.output('bloburl', {
                        filename: 'new-file.pdf'
                    }), '_blank');

                });
            }
        });
    }
    </script>





    <!-- //<script src="../Scripts/Controller/NDAtamilController.js"></script> -->

</body>

</html>























///////////////////////////////////