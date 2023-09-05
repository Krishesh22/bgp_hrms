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
    <title>Interview Details</title>
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


                    <div class="card" style="margin: 30px">
                        <h5 class="card-header text-green">Interview Details</h5>

                        <div class="card-body">

                            <div id="pdfExport" >

                                <div class="pdf-sipl">
                               <div class="pdf-header-sipl"> <img src="../Logo/Sainmarknewlogo.png" width="130" height="50" />
                                <p><b>Sainmarks Industries (India) Pvt Ltd</b><br/>
                                476/1b/1a, Label Arcade, Jothi Nagar, Palavanjipalayam,<br/>
                             Dharapuram Main Road, Tirupur-641 608.</p></div>
                            <hr/>
                                <center>
                                    <h4>INTERVIEW DETAILS / साक्षात्कार विवरण</h4>
                                </center>

                               
<style type="text/css">

    table.doc-table {
  border-collapse: collapse;
  margin: 20px 0;
}

table.doc-table td, table.doc-table th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>

    <p>EMPLOYEE NAME / कर्मचारी का नाम :_______________________</p>
    <p>DESIGNATION / पद :_____________________</p>
<table class="doc-table">
  <tbody>
    <tr>
      <td>S.No</td>
      <td>DETAILS</td>
      <td>YES</td>
      <td>NO</td>
      <td>REMARKS</td>
    </tr>
    <tr>
      <td>1</td>
      <td>क्या उम्र प्रमाणित की गई है? </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>2</td>
     <td>क्या शैक्षिक साक्ष्य की पुष्टि की गई है? </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>3</td>
      <td>क्या कंसोल का पता लगाया गया था? </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td>क्या पहले का अनुभव सुना गया है? </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>5</td>
      <td>क्या काम के घंटों की रिपोर्ट की गई थी? </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>6</td>
      <td>क्या नौकरी परिभाषाएँ समझाई गई हैं?    </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>7</td>
      <td>क्या प्रशासनिक नीतियों को विस्तृत किया गया है? </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>8</td>
      <td>क्या आप किसी भी स्तर पर काम करते हैं?     </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>9</td>
      <td>क्या जाति धार्मिक असहिष्णुता का माहौल बनाएगी?</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>10</td>
      <td>क्या नियुक्ति आदेश जारी किया गया है?     </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>


<p>भोरा अफ़िज़ उसाचे ओनली / FOR OFFICE USE ONLY</p>
<p>साक्षात्कार और सदस्यों के प्रारंभिक स्पष्टीकरण के आधार पर ___________________ काम के लिए योग्य मैं </p>

<p>अस्थायी/स्थायी कर्मचारी के रूप में नियुक्ति की सिफारिश करता हूं। मूल वेतन के अंतर्गत, वेतन 100 रुपए है।   अन्य चरणों में जोड़ें नियत मजदूरी रु. _______</p>

<p>अन्य चरणों में जोड़ें.</p>

<p>अन्य चरण       : NILL</p>
<p>कटौती          : ESI = 0.75 %, EPF = 12%</p>
<p>अध्ययन दिवस   : _____________</p>
<p>(विभाग प्रभारी)</p>
<p>(प्रबंधक)</p>   
                                

                            </div>





                            <a id="data_to_image_btn" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                           
        



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























