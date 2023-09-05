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
    <title>தொழிலாளர்களின் பயிற்சி குறித்த விபரம்</title>
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
                        <h5 class="card-header text-green">தொழிலாளர்களின் பயிற்சி குறித்த விபரம்</h5>


                        <a id="data_to_image_btn" style="margin-top:30px" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                        <div class="card-body">

                            <div id="pdfExport">

                                <div class="pdf-sipl">
                                    <div class="pdf-header-sipl"> <img src="../Logo/Sainmarknewlogo.png" width="130"
                                            height="50" />
                                        <p><b><br><br>Sainmarks Industries (India) Pvt Ltd</b><br />
                                            476/1b/1a, Label Arcade, Jothi Nagar, Palavanjipalayam,<br />
                                            Dharapuram Main Road, Tirupur-641 608.</p>
                                    </div>
                                    <hr />
                                   
                                        <h4>தொழிலாளர்களின் பயிற்சி குறித்த விபரம்</h4>
                                    



                                    <p>பெயர் :</p>
                                    <p>தொழிலாளர் எண் :</p>
                                    <p>பிரிவு :</p>
                                    <p>பணியில் சேர்ந்த நாள் :</p>


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
                                    </style>

                                    <table class="doc-table">
                                        <tbody>
                                            <tr>
                                                <td>S.No / வ.எண்</td>

                                                <td>PPE பயன்பாடு / விழிப்புணர்வு</td>

                                                <td>பயிற்சி வகை & தேதி</td>

                                                <td>பயிற்சி அளித்தவர் விபரம்</td>

                                                <td>பயிற்சி பெற்றவர் கையொப்பம்</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>நிர்வாக கொள்கை, வேலை நேரம், பணியமர்த்தும் கோட்பாடுகள் குறித்த விளக்க
                                                    பயிற்சி</td>
                                                <td>
                                                    In House Training on
                                                    ______________
                                                </td>
                                                <td>(HR -Dept)
                                                    ______________
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>கொடுப்பனர்களின் கொள்கை மற்றும் கோட்பாடுகள் பற்றிய விளக்க பயிற்சி
                                                </td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="4">3

                                                </td>
                                                <td>பாதுகாப்பு விழிப்புணர்வு பயிற்சி<br />a. முதலுதவி பயிற்சி</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>b. அவசரகாலத்தில் வெளியேறும் பயிற்சி</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>c. தீயனைப்பான்கள் இயக்கப் பயிற்சி</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>d. அவசர காலத்தில் தொடர்பு கொள்ள வேண்டிய எண்கள்</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>தனிநபர் பாதுகாப்பு சாதனங்கள் உபயோகிக்க பயிற்சி மற்றும் விழிப்புணர்வு
                                                    குறித்த பயிற்சி</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>பொது சுகாதாரம் மற்றும் சுற்றுப்புற தூய்மை குறித்த பயிற்சி</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

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