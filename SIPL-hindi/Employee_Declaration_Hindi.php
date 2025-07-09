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
    <title>Employee Declaration Form</title>
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
                        <h5 class="card-header text-green">Employee Declaration Form</h5>


                            <a id="data_to_image_btn" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                        <div class="card-body">

                            <div id="pdfExport" >

                                <div class="pdf-sipl">
                               <div class="pdf-header-sipl"> <img src="../Logo/Sainmarknewlogo.png" width="130" height="50" />
                                <p><b>Sainmarks Industries (India) Pvt Ltd</b><br/>
                                476/1b/1a, Label Arcade, Jothi Nagar, Palavanjipalayam,<br/>
                             Dharapuram Main Road, Tirupur-641 608.</p></div>
                            <hr/>
                                <center>
                                    <h4>EMPLOYEE DECLARATION FORM<br/>कर्मचारी घोषणा फॉर्म</h4>
                                </center>

                               <p>SIPL will provide the food, stay and transport facilities for employees in nominal charge.</p>
<p>एसआईपीएल नाममात्र के शुल्क पर कर्मचारियों के लिए भोजन, ठहरने और परिवहन की सुविधा प्रदान करेगा।.</p>
<p>Please find the monthly charges for your reference and if interested select the requirement.</p>
<p>कृपया अपने संदर्भ के लिए मासिक शुल्क खोजें और यदि इच्छुक हैं तो आवश्यकता का चयन करें.</p>
<p>Please confirm your acceptance of this declaration form by signing.</p>
<p>कृपया हस्ताक्षर करके इस घोषणा पत्र की स्वीकृति की पुष्टि करें।.</p>




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

<table class="doc-table">
    <tbody>
        <tr>
            <td>FACILITIES सुविधाएँ</td>
            <td>CHARGE DETAILS शुल्क विवरण</td>
            <td>YES हां</td>
            <td>NO ना</td>
        </tr>
        <tr>
            <td>DORMITORY MAINTENANCE
छात्रावास
</td>
            <td>RS. 428/ महीना</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td rowspan="3">FOOD भोजन</td>
            <td>

सुबह का नाश्ता – RS.16 / दिन
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>

दोपहर का भोजन – RS.22 / दिन
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>

रात का खाना – RS.16 / दिन
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
TRANSPORT
यातायात
</td>
            <td> 
 
RS.156 – महीना
</td>
            
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>


<p>Note :</p>
<ol>
<li>1.   Bus Route: Nallur - Muthanampalayam - Kovilvazhi - K. Chettipalayam - SIPL. <br/>
बस मार्ग: नल्लूर - मुथनमपलयम - कोविल्वाज़ी - के. चेट्टीपलायम - एसआईपीएल।.
</li>
<li>Food & Transport charges would be on pro - rata basis ( consumed / utilized days ) <br/>
खाद्य एवं परिवहन प्रभार यथानुपात आधार पर होंगे (खपत/उपयोग किए गए दिन)
</li>
</ol>
<p>मैं उपयोग की जाने वाली सुविधाओं की सूची के लिए शुल्क स्वीकार करता हूं और एतद्द्वारा अपनी स्वेच्छा से अपनी स्वीकृति की पुष्टि करता हूं और उसका पालन करूंगा।.</p>

<p>SIGNATURE/हस्ताक्षर</p>

                                

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























