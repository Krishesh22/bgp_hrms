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
    <title>Employees Training Details</title>
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
                        <h5 class="card-header text-green">Employees Training Details</h5>


                        <a id="data_to_image_btn" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                            Download</a>
                        <div class="card-body">

                            <div id="pdfExport">

                                <div class="pdf-sipl">
                                    <div class="pdf-header-sipl"> <img src="../Logo/Sainmarknewlogo.png" width="130"
                                            height="50" />
                                        <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                            476/1b/1a, Label Arcade, Jothi Nagar, Palavanjipalayam,<br />
                                            Dharapuram Main Road, Tirupur-641 608.</p>
                                    </div>
                                    <hr />
                                    <center>
                                        <h4>Employees Training Details / श्रमिकों के प्रशिक्षण का विवरण</h4>
                                    </center>



                                    <p>NAME OF EMPLOYEE / कामगार का नाम :</p>
                                    <p>EMPLOYEE NO / श्रम संख्या :</p>
                                    <p>DEPARTMENT / अनुभाग :</p>
                                    <p>DATE OF JOINING / काम पर दिन :</p>

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
                                                <td>S.No / नहीं</td>

                                                <td>Training Details
                                                    प्रशिक्षण का विवरण
                                                </td>

                                                <td>Training Type(Internal/ External) & Date
                                                    प्रशिक्षण प्रकार & दिनांक
                                                </td>

                                                <td>Trainer Details
                                                    प्रशिक्षु प्रोफ़ाइल
                                                </td>

                                                <td>Trainee Signature
                                                    प्रशिक्षु हस्ताक्षर
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Training - for Company Policies, Working Hours, Terms & Conditions
                                                    of appointment प्रशासनिक नीति, समय और प्लेसमेंट सिद्धांतों पर
                                                    प्रशिक्षण</td>
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
                                                <td>Awareness on Buyer's Code of conduct and Ethics. भुगतान की नीति और
                                                    सिद्धांतों की व्याख्या करने के लिए प्रशिक्षण</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="4">3

                                                </td>
                                                <td>Safety Awareness<br />
                                                    सुरक्षा जागरूकता प्रशिक्षण
                                                    a. First Aid Training/
                                                    प्राथमिक चिकित्सा प्रशिक्षण
                                                </td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>b. Emergency Evacuation Drill / आपातकाल में प्रशिक्षण से बाहर निकलें
                                                </td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>c. Fire Extinguisher Operation Training / अग्निशामकों का प्रशिक्षण
                                                </td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>d. Use of Emergency Contact Numbers / आपात स्थिति के दौरान संपर्क
                                                    किए जाने वाले नंबर</td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>PPE Usage / Awareness
                                                    व्यक्तिगत सुरक्षात्मक उपकरणों पर प्रशिक्षण और जागरूकता प्रशिक्षण
                                                </td>
                                                <td>“</td>
                                                <td>“</td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Training on general Health &
                                                    House Keeping
                                                    सार्वजनिक स्वास्थ्य और पर्यावरण स्वच्छता पर प्रशिक्षण
                                                </td>
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
                var imgHeight = 592.28 / contentWidth * contentHeight;
                var pageData = canvas.toDataURL('image/jpeg', 1.0);
                var pdf = new jsPDF('', 'pt', 'a4');
                //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
                //When the content does not exceed the range of pdf page display, there is no need to paginate
                if (leftHeight < pageHeight) {
                    pdf.addImage(pageData, 'JPEG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        pdf.addImage(pageData, 'JPEG', 0, position, imgWidth, imgHeight)
                        leftHeight -= pageHeight;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
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