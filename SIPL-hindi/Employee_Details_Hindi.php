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
    <title>Employee Details /  कर्मचारी का विवरण</title>
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
                        <h5 class="card-header text-green">Employee Details</h5>

                        <div class="card-body">

                            <div id="pdfExport" >

                                <div class="pdf-sipl">
                               <div class="pdf-header-sipl"> <img src="../Logo/Sainmarknewlogo.png" width="130" height="50" />
                                <p><b>Sainmarks Industries (India) Pvt Ltd</b><br/>
                                476/1b/1a, Label Arcade, Jothi Nagar, Palavanjipalayam,<br/>
                             Dharapuram Main Road, Tirupur-641 608.</p></div>
                            <hr/>
                                <center>
                                    <h4>Employee Details /  कर्मचारी का विवरण</h4>
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
.candidate-photo{
  display: inline-block;
  height: 140px;width: 140px;
  padding: 40px;
  text-align: center;
  position: absolute;
  right: 4.8%;
  top: 250px;
  border: 1px solid #888888;
}
</style>


<div class="candidate-photo"><p style="margin:22px 0 0 0px"></p></div>

<table cellpadding="3">
<tr><td>NAME / नाम</td><td>:</td></tr>
<tr><td>EMPLOYEE NO / कर्मचारी संख्या</td><td>:</td></tr>
<tr><td>DESIGNATION / पदनाम</td><td>:</td></tr>
<tr><td>DEPARTMENT / विभाग</td><td>:</td></tr>
<tr><td>EDUCATIONAL QUALIFICATION / शैक्षिक योग्यता </td><td>:</td></tr>
<tr><td>DATE OF BIRTH / AGE / की तारीख</td><td>:</td></tr>
<tr><td>MARITAL STATUS / वैवाहिक स्थिति </td><td>:</td></tr>
<tr><td>GENDER / लिंग 
</td><td>:</td></tr>
</table>
                                                      


<table class="doc-table">
  <tbody>
    <tr >
      <td style="width:383.2px; text-align: center;">PRESENT ADDRESS/वर्तमान पता<br/><br/><br/><br/></td>
      <td style="width:383.2px; text-align: center;">PERMANENT ADDRESS / स्थाई पता<br/><br/><br/><br/></td>
    </tr>
  </tbody>
</table>

INCASE OF EMERGENCY CONTACT / आपातकालीन संपर्क की वृद्धि

<table class="doc-table">
  <tbody>
    <tr>
      <td style="width:250px; text-align: center;">NAME/ नाम<br/><br/><br/><br/></td>
      <td style="width:250px; text-align: center;">TELEPHONE NO / टेलीफ़ोन नंबर<br/><br/><br/><br/></td>
      <td style="width:250px; text-align: center;">RELATIONSHIP/संबंध<br/><br/><br/><br/></td>
    </tr>
  </tbody>
</table>


<table style="margin-left:-5px">
    <tr>
      <td style="width:260px; text-align: center;">NOMINEE NAME/नामांकित व्यक्ति का नाम<br/><br/></td>
      <td style="width:250px; text-align: center;"><br/><br/></td>
      <td style="width:250px; text-align: center;">RELATIONSHIP / संबंध<br/><br/></td>
    </tr>
</table>



<p>SOCIAL BENEFITS / सामाजिक लाभ</p>
<table class="doc-table">
  <tbody>
    <tr >
      <td style="width:383.2px; text-align: center;">ESI<br/><br/>0.75%</td>
      <td style="width:383.2px; text-align: center;">PF<br/><br/>12%</td>
    </tr>
  </tbody>
</table>

<table class="doc-table">
  <tbody>
    <tr > 
      <td style="width:766.4px;">WAGES / वेतन: RS. &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PER  MONTH / प्रति महीने</td>
    </tr>
  </tbody>
</table>

<p style="text-align:left;">EMPLOYEE SIGNATURE / कर्मचारी हस्ताक्षर<span style="float:right;">AUTHORISED SIGNATURE / अधिकृत हस्ताक्षर </span></p>
<br/>
<p>DATE / दिनांक  :</p>
                                

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























