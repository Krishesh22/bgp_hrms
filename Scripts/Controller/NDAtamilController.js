var app = angular.module('MyApp', ['textAngular', 'angularUtils.directives.dirPagination', 'ngSanitize']);
app.controller('NDAtamilController', function($scope, $http, $timeout, ) {

    $scope.Method = "";

    ///////////////////////////////

    $scope.Export = function() {


            // html2canvas($("#pdfExport"), {
            //     onrendered: function(canvas) {
            //         theCanvas = canvas;

            //         document.body.appendChild(canvas);

            //         canvas.toBlob(function(blob) {
            //             saveas(blob, "Dashboard.png");
            //         });
            //     }
            // });



            // var HTML_Width = $("#pdfExport").width();
            // var HTML_Height = $("#pdfExport").height();
            // var top_left_margin = 10;
            // var PDF_Width = HTML_Width + (top_left_margin * 2);
            // var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            // var canvas_image_width = HTML_Width;
            // var canvas_image_height = HTML_Height;

            // var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


            // html2canvas($("#pdfExport")[0], { allowTaint: true }).then(function(canvas) {
            //     canvas.getContext('2d');

            //     console.log(canvas.height + "  " + canvas.width);


            //     var imgData = canvas.toDataURL("image/jpeg", 1.0);
            //     var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            //     pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);


            //     for (var i = 1; i <= totalPDFPages; i++) {
            //         pdf.addPage(PDF_Width, PDF_Height);
            //         pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
            //     }
            //     pdf.save("NDA-TAMIL.pdf");

            // });






        }
        ///////////////////////////////////////////////////////////////////
});