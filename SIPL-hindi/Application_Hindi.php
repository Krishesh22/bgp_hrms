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
require_once('../Tcpdf/examples/tcpdf_include.php');

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
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

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
 $pdf->SetFont('freeserif', '', 10);
 // $pdf->setFont('dejavusans', '', 10);


//$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)


// test Cell stretching
$pdf->SetFont('freeserif', 'b', 15);
$pdf->SetXY(20, 28);
$html = '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYEE DETAILS /  कर्मचारी का विवरण</p>';
$pdf->writeHTML($html);

$pdf->SetXY(166, 40);
$pdf->SetFont('freeserif', '', 9);
$html = <<<EOD
<table cellspacing="0" cellpadding="1" border="1" style="border-color:#000000;">
<tr>
<td style="width:100px;height:100px"><br/><br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;Candidate Photo</td>
</tr>
</table>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->SetXY(15, 40);
$pdf->SetFont('freeserif', '', 9);
$html = <<<EOD
NAME / नाम :<br/> <br/>
EMPLOYEE NO / कर्मचारी संख्या:<br/> <br/>
DESIGNATION / पदनाम :<br/> <br/>
DEPARTMENT / विभाग :<br/> <br/>
EDUCATIONAL QUALIFICATION / शैक्षिक योग्यता:<br/> <br/>
DATE OF BIRTH / AGE / की तारीख :<br/> <br/>
MARITAL STATUS / वैवाहिक स्थिति :<br/> <br/>
GENDER / लिं:<br/> <br/>


<table cellspacing="0" cellpadding="1" border="1" style="border-color:#000000;">
<tr align="center">
<td style="width:317px;height:120px">PRESENT ADDRESS/वर्तमान पता</td><td style="width:317px;">PERMANENT ADDRESS / स्थाई पता</td>
</tr>
</table><br/> <br/>
<h4 style="font-size:15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INCASE OF EMERGENCY CONTACT / आपातकालीन संपर्क की वृद्धि</h4>

<table cellspacing="0" cellpadding="1" border="1" style="border-color:#000000;">
<tr align="center">
<td style="width:211.3px;height:60px">NAME/ नाम</td><td style="width:211.3px;">TELEPHONE NO / टेलीफ़ोन नंबर</td><td style="width:211.3px;">RELATIONSHIP/संबंध</td>
</tr>
</table><br/> <br/>


EOD;
$pdf->writeHTML($html, true, false, true, false, '');

$html = <<<EOD
<h4 style="font-size:9px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOCIAL BENEFITS / सामाजिक लाभ</h4>
<table cellspacing="0" cellpadding="1" border="1" style="border-color:#000000;">
<tr align="center">
<td style="width:211.3px;height:35px">ESI<br/>
0.75%
</td><td style="width:211.3px;">PF<br/>
12%
</td>
</tr>
</table><br/> <br/>

<table cellspacing="0" cellpadding="1" border="1" style="border-color:#000000;">
<tr>
<td style="width:422.6px;height:40px">
&nbsp;&nbsp;&nbsp;&nbsp;WAGES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
PER  MONTH<br/>
&nbsp;&nbsp;&nbsp;&nbsp;वेतन&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RS.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;प्रति महीने
</td>
</tr>
</table><br/> <br/><br/> <br/><br/> <br/><br/> <br/>
EMPLOYEE SIGNATURE / कर्मचारी हस्ताक्षर  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
AUTHORISED SIGNATURE / अधिकृत हस्ताक्षर
<br/> <br/><br/> <br/>Date:
EOD;
$pdf->writeHTML($html, true, false, true, false, '');





// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('download.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
