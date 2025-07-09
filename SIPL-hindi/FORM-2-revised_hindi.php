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
    <title>FORM-2(REVISED)/ फॉर्म-2 (संशोधित)</title>
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
                        <h5 class="card-header text-green">FORM-2(REVISED)</h5>


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
                                        <h4>FORM-2(REVISED)/ फॉर्म-2 (संशोधित)</h4>
                                    </center>

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

                                    <p>N0MINATION AND DECLARATION FORM/ नामांकन और घोषणा प्रपत्र</p>
                                    <p>FOR UNEXEMPTED/EXEMPTED ESTABLISHMENTS/( बिना छूट/छूट वाले प्रतिष्ठानों के लिए)
                                    </p>
                                    <p>Declaration and Nomination Form Under the Employees' Provident Funds & Employees'
                                        Pension Scheme/(नियुक्ति और शपथ)</p>
                                    <p>(Paragraph 33 & 61(1) of the Employees' Provident Fund Scheme , 1952 & Paragraph
                                        18 of the Employees' Pension Scheme,1995)/( श्रम भविष्य निधि योजना 1952 पैरा 33
                                        और 61 (1) और टीओ </p>


                                    और टीओ योजना 1995पैरा 18 . के अनुसार)
                                    <table class="doc-table">
                                        <tr>
                                            <td>Name (in Block Letters)/ नाम (बड़े अक्षरों में)</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Father's / Husband's Name / पिता/पति का नाम</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth/( जन्म तिथि)</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Sex/ लिंग</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Marital Status/( वैवाहिक स्थिति)</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Account No/( खाता संख्या)</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Address/ पता</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Permanent/ स्थायी</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Temporary/ अस्थायी</td>
                                            <td>:</td>
                                        </tr>
                                    </table>


                                    <center>
                                        <h4>PART-A(EPF)/ भाग-ए (ईपीएफ)</h4>
                                    </center>



                                    <p><b>I hereby nominate the person (s)/cancel the nomination made by previously and
                                            nominate the person (s) mentioned below to receive the amount standing to my
                                            credit in the Employees' Provident Fund, in the event of my death</b></p>
                                    <p>मैं एतद्द्वारा पूर्व में किए गए व्यक्ति (व्यक्तियों)/नामांकन को रद्द करता/करती
                                        हूं और मेरी मृत्यु की स्थिति में कर्मचारी भविष्य निधि में मेरे खाते में जमा राशि
                                        प्राप्त करने के लिए नीचे उल्लिखित व्यक्ति (व्यक्तियों) को नामित करता हूं।.
                                    </p>

                                    <table class="doc-table">
                                        <tbody>
                                            <tr>
                                                <td>Name & Address of the nominee/Nominee’s नामिती/नामितियों का नाम और
                                                    पता</td>
                                                <td>Nominee's relationship with the member नॉमिनी का सदस्य के साथ संबंध
                                                </td>
                                                <td>Date of Birth/ Age
                                                    जन्म तिथि / आयु
                                                </td>
                                                <td>Total amount or Share of accumulations in Provident Fund to be Paid
                                                    to each nominee
                                                    प्रत्येक नामांकित व्यक्ति को भुगतान की जाने वाली भविष्य निधि में कुल
                                                    राशि या संचय का हिस्सा
                                                </td>
                                                <td>If the Nominee is a minor, name and relationship & address of the
                                                    guardian who may receive the amount during the minority of naminee
                                                    यदि नामिती अवयस्क है, तो उस अभिभावक का नाम और संबंध और पता, जिसे
                                                    नामिनी की अवयस्कता के दौरान राशि प्राप्त हो सकती है
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <p>1.* Certified that I have no family as defined para 2 (g) of the Employees'
                                        Provident Fund Scheme 1956 and should I acquire a family hereafter the above
                                        nomination should be deemed as cancelled प्रमाणित किया जाता है कि कर्मचारी
                                        भविष्य निधि योजना 1956 के परिभाषित पैरा 2 (जी) के अनुसार मेरा कोई परिवार नहीं है
                                        और क्या मुझे इसके बाद एक परिवार का अधिग्रहण करना चाहिए, उपरोक्त नामांकन को रद्द
                                        माना जाना चाहिए।</p>
                                    <p>2.*Certified that my father /mother is /are dependent upon me. / प्रमाणित किया
                                        जाता है कि मेरे पिता/माता मुझ पर आश्रित हैं/हैं</p>
                                    <p>Strike out whichever is not applicable. जो लागू न हो उसे काट दें।.</p>
                                    <br /><br /><br />
                                    <p>Signature or thumb impression of the subscriber /बाएं अंगूठे के सदस्य (क) अंगूठे
                                        का निशान के हस्ताक्षर। </p>




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