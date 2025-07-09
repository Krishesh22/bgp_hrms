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

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 006');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);


$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);



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
$pdf->setFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();
$html = '<table border="0"><tr><td style="width:355px"><img src="images/sainmarks_logo.png" alt="test alt attribute" width="130" height="60" border="0"/></td><td>
<p style="font-size:14px;">Sainmarks Industries India Pvt Ltd<br/><br/>Payslip for <b>$test</b></p></td></tr></table><br/><hr/>&nbsp;';
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->setFont('dejavusans', '', 8);

$html = '<br/>
<table border="1" cellpadding="5">
<tr><td>Name</td><td> : </td><td>Payslip Month & Year</td><td> : </td></tr>
<tr><td>Department</td><td> : </td><td>Workingdays</td><td> : </td></tr>
<tr><td>Code</td><td> : </td><td>Workeddays</td><td> : </td></tr>
<tr><td>Designation</td><td> : </td><td>LOP</td><td> : </td></tr>
<tr><td>Employee Category</td><td> : </td><td></td><td></td></tr>
</table>
<br/><br/>

<table border="1" cellpadding="5">
    <tbody>
        <tr>
        <td rowspan="2"></td>
            <td colspan="2" align="center">Allowances</td>
            <td colspan="2"  align="center" rowspan="2"><br/><br/>Deductions</td>
        </tr>



        <tr>
            <td align="center">Standard</td>
            <td align="center">Earned</td>
        </tr>
        <tr>
            <td>Basic DA</td>
            <td></td>
            <td></td>
            <td>Salary Advance</td>
            <td></td>
        </tr>
        <tr>
            <td>HRA</td>
            <td></td>
            <td></td>
            <td>Food</td>
            <td></td>
        </tr>
        <tr>
            <td>Other Allowances</td>
            <td></td>
            <td></td>
            <td>TOS</td>
            <td></td>
        </tr>
      
        <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td></td>
        </tr>
      
    </tbody>
</table>

<br/><br/>


<table border="0" cellpadding="7">

<tr><td>PF 	:</td><td></td><td></td><td></td></tr>
<tr><td>ESI :</td><td></td><td>Net Salary:</td><td></td></tr>
</table>

<p><b>Amount in Words</b>: <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</i></p>

<p><b>Note</b>: <i>This is a computer generated payslip & does not require a signature.</i></p>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');




// Print some HTML Cells

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print all HTML colors

// add a page


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('info.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
