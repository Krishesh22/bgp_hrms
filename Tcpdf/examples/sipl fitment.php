<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// class MYPDF extends TCPDF {

//     //Page header
//     public function Header() {
//         // Logo
//         $image_file = K_PATH_IMAGES.'logo_example.jpg';
//         $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//         // Set font
//         $this->SetFont('helvetica', 'B', 20);
//         // Title
//         $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
//     }

//     // Page footer
//     // public function Footer() {
//     //     // Position at 15 mm from bottom
//     //     $this->SetY(-15);
//     //     // Set font
//     //     $this->SetFont('helvetica', 'I', 8);
//     //     // Page number
//     //     $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
//     // }
// }



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// create new PDF document


// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('');
$pdf->setTitle('HRMS NDA');
$pdf->setSubject('');
$pdf->setKeywords('');

// set default header data

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));



$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

$pdf->setFontSubsetting(true);
 //$pdf->SetFont('freeserif', '', 10);
$pdf->setFont('pdfahelvetica', '', 10);

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content



$pdf->Image('images/sainmarks.png', '93', '', 28, 13, '', '', 'T', false, 0, '', false, false, 1, false, false, false);
$html = '
<br/><br/><br/>
<p style="font-size:8px;color:green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Together forward</i></p>
<p style="font-size:15px;font-weight:bold;margin-bottom:0px"><u>OFFER</u></p>


<table>
<tbody>
<tr><td style="width:150px">Name</td><td style="width:10px">:</td><td>0</td></tr>
<tr><td>Business & Location</td><td>:</td><td>0</td></tr>
<tr><td>Department</td><td>:</td><td>0</td></tr>
<tr><td>Offered Designation</td><td>:</td><td>0</td></tr>
<tr><td>Reporting To</td><td>:</td><td>0</td></tr>
</tbody>
</table>
<br/></br>

<style>
.data-table table, 
.data-table td, 
.data-table th {
  border: 0.2px solid #000000;
}
.data-table table {
  width: 100%;
  border-collapse: collapse;
}
</style>

<div class="data-table">
<table style="font-size:10px;padding:5px 3px">
<tbody>
<tr  align="center" bgcolor="#daeef3" style="font-weight:bold"><td  style="width:260px">Components</td><td colspan="2" style="width:140px">Amount (Rs.)</td><td>Reference No.  for Notes</td></tr>

<tr bgcolor="#d9d9d9" ><td>Basic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(A)</td><td></td><td>-</td><td></td></tr>

<tr  bgcolor="#d9d9d9"><td>HRA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(B)</td><td></td><td>-</td><td></td></tr>

<tr><td  bgcolor="#d9d9d9"><u>Total Allowances</u></td><td></td><td></td><td></td></tr>
<tr><td>Special Allowance</td><td>-</td><td></td><td></td></tr>
<tr  bgcolor="#d9d9d9"><td>Total Allowances Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C)</td><td></td><td>-</td><td></td></tr> 
<tr><td  bgcolor="#d9d9d9"><u>Retirals</u></td><td></td><td></td><td></td></tr>  
<tr><td>PF @ 12% of Basic (A)</td><td>-</td><td></td><td></td></tr>   
<tr><td>Gratuity @ 5% of Basic (A)</td><td>-</td><td></td><td></td></tr>
<tr  bgcolor="#d9d9d9"><td>Retirals Total  (D)</td><td></td><td>-</td><td></td></tr>
<tr  bgcolor="#60497a" color="#ffffff"><td>"Gross Annual Compensation<br/>(A+B+C+D)"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(E)</td><td></td><td>-</td><td></td></tr>
<tr  bgcolor="#ffffcc"><td>Estimated Variable Bonus @ 8.33% of GAC (A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(F)</td><td></td><td>-</td><td align="center">1</td></tr>
<tr  bgcolor="#00b050"  color="#ffffff"><td>Estimated CTC (E+F) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(G)</td><td></td><td>-</td><td></td></tr>
</tbody>
</table>

<br/>
<p><b><u>Note:</u></b></p>

<div class="data-table">
<table style="font-size:10px;padding:10px 5px">
<tbody>
<tr><td  style="width:565px">
Bonus has been estimated @ 8.33% of Individual basic considering the Incentive Trend in the last 3 years for budgeted Individual and Business performance and variable pay has been estimated considering the 100% target achievement. The actual incentive will be calculated based on Individual and Business performance for the given year and can be variable as per management decision. The bonus amount is paid annually.
</td>
               

</tr>
</tbody>
</table>


</div>




  






';
// $html = '<h4>test</h4>


// <table>
//     <tbody>
// <tr>
//             <td style="width:150px">Employee Name / பணியாளர் &#3014;&#2986;யர் / कर्मचारी नाम </td>
//             <td style="width:120px">Employee Name Name</td>
//             <td style="width:90px">Basic+DA /<br/>அ&#2975;ப்படை சம்பளம் </td>
//             <td style="width:82px"></td>
//             <td style="width:150px">Earned Basic+DA/ஈட்டிய அடிப்படை ஊதியம் / अर्जित बेसिक + महंगाई भत्त</td>
//             <td style="width:81px"></td>
//         </tr>
//         </table>

// ';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
