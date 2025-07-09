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


                        <a id="data_to_image_btn" style="margin-top:30px" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                        <div class="card-body">


                            <div id="pdfExport">

                                <div class="pdf-sipl">
                                    <div class="pdf-header-sipl"> <img src="../Logo/Sainmarknewlogo.png" width="130"
                                            height="50" />
                                        <p ><b><br><br>Sainmarks Industries (India) Pvt Ltd</b><br />
                                            476/1b/1a, Label Arcade, Jothi Nagar, Palavanjipalayam,<br />
                                            Dharapuram Main Road, Tirupur-641 608.</p>
                                    </div>
                                    <hr />
                                    
                                        <h4>தொழிலாளர் பற்றிய விபரம்</h4>
                                    
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
                                        height: 140px;
                                        width: 140px;
                                        padding: 40px;
                                        text-align: center;
                                        position: absolute;
                                        right:10.8%;
                                        top: 250px;
                                        border: 1px solid #888888;
                                    }
                                    </style>


                                    <div class="candidate-photo">
                                        <p style="margin:22px 0 0 0px"></p>
                                    </div>
                                    <table cellpadding="5">
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
                                                <td style="width:383.2px; text-align:">தற்போதைய
                                                    முகவரி<br /><br /><br /><br /><br /><br /></td>
                                                <td style="width:383.2px; text-align: ">நிரந்தர
                                                    முகவரி<br /><br /><br /><br /><br /><br /></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <p>அவசரகால தொடர்புக்கு (குடும்ப உறுப்பினர்கள்)</p>

                                    <table class="doc-table">
                                        <tbody>
                                            <tr>
                                                <td style="width:250px; text-align: ;">
                                                    பெயர்<br /><br /><br /><br /><br /><br /></td>
                                                <td style="width:250px; text-align: ;">தொலைபேசி
                                                    எண்<br /><br /><br /><br /><br /><br /></td>
                                                <td style="width:250px; text-align: ;">
                                                    உறவுமுறை<br /><br /><br /><br /><br /><br /></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="width:250px; text-align:;">நியமனதாரர்
                                                    பெயர்<br /><br /></td>
                                                <td style="width:250px; text-align: ;"><br /><br /></td>
                                                <td style="width:250px; text-align: ;">உறவுமுறை<br /><br /></td>
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








                            </div>









                        </div>
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
    <!-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script> -->
    <script src="../assets/libs/js/html2canvas.min.js"></script>
    <script>
    $(function() {
        $("#data_to_image_btn").click(function() {

            var HTML_Width = $("#pdfExport").width();
            var HTML_Height = $("#pdfExport").height();
            var data = document.getElementById('pdfExport');
            html2canvas(data,{ allowTaint: true, scale :3,useCORS : true }).then(canvas => {
             

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
      var pageData = canvas.toDataURL('image/jpeg', 1.0);
      var pdf = new jsPDF('', 'pt', 'a4');
      //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
      //When the content does not exceed the range of pdf page display, there is no need to paginate
      if (leftHeight < pageHeight) {
      pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight );
      } else {
          while(leftHeight > 0) {
              pdf.addImage(pageData, 'jpg', 2, position, imgWidth, imgHeight)
              leftHeight -= pageHeight;
              position -= 841.89;
              //Avoid adding blank pages
              if(leftHeight > 0) {
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



    function demoFromHTML() {
        var data = document.getElementById('pdfExport');
        html2canvas(data, {
            onrendered: function(canvasObj) {
                var contentWidth = canvas.width;
      var contentHeight = canvas.height;
      //One page pdf shows the canvas height generated by html pages.
      var pageHeight = contentWidth / 592.28 * 841.89;
      //html page height without pdf generation
      var leftHeight = contentHeight;
      //Page offset
      var position = 0;
      //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
      var imgWidth = 595.28;
      var imgHeight = 592.28/contentWidth * contentHeight;
      var pageData = canvas.toDataURL('image/jpeg', 1.0);
      var pdf = new jsPDF('', 'pt', 'a4');
      //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
      //When the content does not exceed the range of pdf page display, there is no need to paginate
      if (leftHeight < pageHeight) {
      pdf.addImage(pageData, 'JPEG', 0, 0, imgWidth, imgHeight );
      } else {
          while(leftHeight > 0) {
              pdf.addImage(pageData, 'JPEG', 0, position, imgWidth, imgHeight)
              leftHeight -= pageHeight;
              position -= 841.89;
              //Avoid adding blank pages
              if(leftHeight > 0) {
                pdf.addPage();
              }
          }
      }
      pdf.save('content.pdf');
            }
        });
    }
    </script>





    <!-- //<script src="../Scripts/Controller/NDAtamilController.js"></script> -->

</body>

</html>