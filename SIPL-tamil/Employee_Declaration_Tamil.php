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
    <title>தொழிலாளர் சுய அறிவிப்பு படிவம்</title>
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
                        <h5 class="card-header text-green">தொழிலாளர் சுய அறிவிப்பு படிவம்</h5>


                        <a id="data_to_image_btn" style="margin-top:30px" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                        <div class="card-body">

                            <div id="pdfExport" >

                                <div class="pdf-sipl">
                               <div class="pdf-header-sipl"> <img src="../Logo/Sainmarknewlogo.png" width="130" height="50" />
                                <p><b><br><br>Sainmarks Industries (India) Pvt Ltd</b><br/>
                                476/1b/1a, Label Arcade, Jothi Nagar, Palavanjipalayam,<br/>
                             Dharapuram Main Road, Tirupur-641 608.</p></div>
                            <hr/>
                               
                                    <h4>EMPLOYEE DECLARATION FORM<br/>தொழிலாளர் சுய அறிவிப்பு படிவம்</h4>
                                
                               
<p>SIPL will provide the food, stay and transport facilities for employees in nominal charge.<br/>SIPL தொழிலாளர்களுக்கு குறைந்த விலையில் உணவு , தங்கும் இடம் மற்றும் போக்குவரத்து வசதிகளை அளிக்கிறது</p>


<p>Please find the monthly charges for your reference and if interested select the requirement.<br/>கீழே குறிப்பிட்டுள்ள மாத கட்டணங்களை படித்து நீங்கள் விரும்பினால் உங்கள் தேவைகளை தேர்ந்தெடுங்கள்</p>
<p>Please confirm your acceptance of this declaration form by signing.<br/>தங்களது ஒப்புதலை இந்த தொழிலாளர் அறிவிப்பு படிவத்தில் கையெழுத்து இட்டு உறுதி செய்யவும் .</p>


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
            <td>FACILITIES</td>
            <td>CHARGE DETAILS</td>
            <td>YES</td>
            <td>NO</td>
        </tr>
        <tr>
            <td>தங்கும் இடம்/Hostel</td>
            <td>RS. 428/மாதம்</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td rowspan="3">உணவு/Food </td>
            <td>
காலை உணவு – RS.16 / நாள்/Morning
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
மதிய உணவு – RS.22 / நாள்/Lunch
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
இரவு உணவு – RS.16 / நாள்/Dinner
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
போக்குவரத்து/Transport
</td>
            <td> 
RS.156 - மாதம்
</td>
            
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>


<p>குறிப்பு :</p>
<ol>
<li>Bus Route: Nallur - Muthanampalayam - Kovilvazhi - K. Chettipalayam - SIPL.<br/>
பேருந்து வழித்தடம்: நல்லூர் - முத்தனம்பாளையம் - கோவில்வழி - கே. செட்டிபாளையம் – SIPL.</li>
<li>Food & Transport charges would be on pro - rata basis ( consumed / utilized days ) <br/>
உணவு மற்றும் போக்குவரத்துக் கட்டணங்கள் தொழிலாளர்கள் உபயோகிக்கும் நாட்களை கொண்டு கணக்கிடப்படும்.</li>
</ol>
<p>I acknowledge the charges for list of facilities utilized and hereby confirm my acceptance with my own free will and shall abide by the same.<br/>நான் மேலே குறிப்பிட்டுள்ள வசதிகளையும் அதற்கான கட்டணத்தையும் எனது சொந்த விருப்பத்துடன் ஒப்புக்கொள்கிறேன் என்பதை உறுதி செய்கிறேன்.</p>

<p>EMPLOYEE SIGNATURE<br/>
கையெழுத்து</p>
 

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




















