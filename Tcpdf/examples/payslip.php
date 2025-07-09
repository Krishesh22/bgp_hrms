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



 header('Content-Type: text/html; charset=UTF-8'); 
 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
 // $pdf->writeHTMLCell(0, 0, '', '', utf8_encode($CONTENT_), 0, 1, 0, true, '', true);


// create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// create new PDF document


// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('');
$pdf->setTitle('HRMS NDA');
$pdf->setSubject('');
$pdf->setKeywords('');

// set default header data

// $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));



$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
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


$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// add a page
$pdf->AddPage();


// $strBNFont = TCPDF_FONTS::addTTFfont('./Baamini.ttf', 'TrueTypeUnicode', '', 32, '', 3, 1);
// $pdf->SetFont($strBNFont, '', 8, '', 'true');


// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<style>
table, td, th {
  border: 0.2px solid #000000;
  font-size:7.95rem;
  padding:2px 5px;
}

table {
  width: 100%;
  border-collapse: collapse;vertical-align: middle;
}
</style>
<table>
    <tbody>
        <tr>
            <td colspan="6" style="text-align:center">
<b>SAINMARKS INDUSTRIES INDIA PVT LTD</b><br/>   
476/1B1A,LABEL ARCADE, JOTHI NAGAR, PALAVANJIPALAYAM, DHARAPURAM MAIN ROAD,<br/>
TIRUPUR – 641 608, TAMILNADU, INDIA.
</td>
        </tr>
        <tr>
            <td colspan="6">Paid Date :                                                                                                           Pay slip for the month of                                                                                                          </td>
        </tr>
        <tr>
            <td style="width:150px">Employee Name / பணியாளர் &#3014;&#2986;யர் / कर्मचारी नाम </td>
            <td style="width:120px">Employee Name Name</td>
            <td style="width:90px">Basic+DA /<br/>அ&#2975;ப்படை சம்பளம் </td>
            <td style="width:82px"></td>
            <td style="width:150px">Earned Basic+DA/ஈட்டிய அடிப்படை ஊதியம் / अर्जित बेसिक + महंगाई भत्त</td>
            <td style="width:81px"></td>
        </tr>
        <tr>
            <td>Employee Id / <br/>பணியாளர் எண் /<br/>कर्मचारी पहचान संख्या </td>
            <td></td>
            <td>HRA/<br/>வீடு வாடகை படி </td>
            <td></td>
            <td>Earned HRA /ஈட்டிய வீடு வாடகை படி /अर्जित आवास किराए की अनुमति </td>
            <td></td>
        </tr>
        <tr>
            <td>Designation /<br/>பதவி / औहदा</td>
            <td></td>
            <td>OA / இதர படி </td>
            <td></td>
            <td>Earned OA / ஈட்டிய இதர படி/ अन्य भत्ता अर्जित किया </td>
            <td></td>
        </tr>
        <tr>
            <td>WORKING DAYS /<br/>வேலை நாட்கள் /<br/>कार्य दिवस</td>
            <td></td>
            <td></td>
            <td></td>
            <td>OT Amount / மிகை பணி செய்த சம்பளம்/ ओवरटाइम भत्ता </td>
            <td></td>
        </tr>
        <tr>
            <td>WORKED DAYS /வேலை செய்த நாட்கள் / काम किया दिन </td>
            <td></td>
            <td></td>
            <td></td>
            <td>Daily/Monthly Allowance/ தினசரி/மாதாந்திர படி / दैनिक/मासिक भत्ता </td>
            <td></td>
        </tr>
        <tr>
            <td>Paid Leave /சம்பளத்துடன் கூடிய விடுப்பு /  वैतनिक अवकाश </td>
            <td></td>
            <td>Total Wages /மொத்தம்/<br/>सकल वेतन </td>
            <td></td>
            <td>Earned Wages/ஈட்டிய மொத்தம் / अर्जित राशि </td>
            <td></td>
        </tr>
        <tr>
            <td>LOP /சம்பள இழப்பு / वेतन का नुकसान </td>
            <td></td>
            <td></td>
            <td></td>
            <td>PF / பிஎஃப் / भविष्य निधि </td>
            <td></td>
        </tr>
        <tr>
            <td>OT Hrs /மிகை பணி செய்த நேரம் / समयोपरि घंटे </td>
            <td></td>
            <td></td>
            <td></td>
            <td>ESI / இ.எஸ்.ஐ. / कर्मचारियों का राज्य बीमा </td>
            <td></td>
        </tr>
        <tr>
            <td>National / Festival Holidayதேசிய விடுப்பு/ राष्ट्रीय अवकाश </td>
            <td></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td>Salary Advance / சம்பள முன்பணம் / अग्रिम वेतन </td>
            <td></td>
        </tr>
        <tr>
            <td>Total Days / மொத்த நாட்கள்/  सकल दिन</td>
            <td></td>
            <td>Food Deduction / பிடித்தம் / कटौती </td>
            <td></td>
        </tr>
        <tr>
            <td>UAN NO </td>
            <td></td>
            <td></td>
            <td></td>
            <td>TDS/ டிடிஎஸ்/ टीडीएस </td>
            <td></td>
        </tr>
        <tr>
            <td>ESIC NO</td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total deduction / மொத்த பிடித்தம் / कटौती </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Net Wages நிகர ஊதியம் / नेट सैलरी </td>
            <td></td>
        </tr>
        <tr>
            <td>Authorised Signature / மேலாளர் கையொப்பம் / कर्मचारी हस्ताक्षर </td>
            <td></td>
            <td colspan="2">Employee Signature /<br/>பணியாளர் கையொப்பம் /<br/>कर्मचारी हस्ताक्षर </td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>

<br/><br/>
<table>
    <tbody>
        <tr>
            <td colspan="6" style="text-align:center">
<b>SAINMARKS INDUSTRIES INDIA PVT LTD</b><br/>   
476/1B1A,LABEL ARCADE, JOTHI NAGAR, PALAVANJIPALAYAM, DHARAPURAM MAIN ROAD,<br/>
TIRUPUR – 641 608, TAMILNADU, INDIA.
</td>
        </tr>
        <tr>
            <td colspan="6">Paid Date :                                                                                                           Pay slip for the month of                                                                                                          </td>
        </tr>
        <tr>
            <td style="width:166px">Employee Name/ பணியாளர் பெயர் /कर्मचारी नाम </td>
            <td style="width:60px">Rs. 6,00,000</td>
            <td style="width:160px">Basic+DA /அடிப்படை சம்பளம் </td>
            <td style="width:60px"></td>
            <td style="width:167px">Earned Basic+DA/ஈட்டிய அடிப்படை ஊதியம் / अर्जित बेसिक + महंगाई भत्त</td>
            <td style="width:60px"></td>
        </tr>
        <tr>
            <td>Employee Id/ பணியாளர் எண் / कर्मचारी पहचान संख्या </td>
            <td></td>
            <td>HRA/ வீடு வாடகை படி </td>
            <td></td>
            <td>Earned HRA /ஈட்டிய வீடு வாடகை படி /अर्जित आवास किराए की अनुमति </td>
            <td></td>
        </tr>
        <tr>
            <td>Designation/ பதவி / औहदा </td>
            <td></td>
            <td>OA / இதர படி </td>
            <td></td>
            <td>Earned OA / ஈட்டிய இதர படி/ अन्य भत्ता अर्जित किया </td>
            <td></td>
        </tr>
        <tr>
            <td>WORKING DAYS/ வேலை நாட்கள் / कार्य दिवस </td>
            <td></td>
            <td></td>
            <td></td>
            <td>OT Amount / மிகை பணி செய்த சம்பளம்/ ओवरटाइम भत्ता </td>
            <td></td>
        </tr>
        <tr>
            <td>WORKED DAYS /வேலை செய்த நாட்கள் / काम किया दिन </td>
            <td></td>
            <td></td>
            <td></td>
            <td>Daily/Monthly Allowance/ தினசரி/மாதாந்திர படி / दैनिक/मासिक भत्ता </td>
            <td></td>
        </tr>
        <tr>
            <td>Paid Leave /சம்பளத்துடன் கூடிய விடுப்பு /  वैतनिक अवकाश </td>
            <td></td>
            <td>Total Wages /மொத்தம்/ सकल वेतन </td>
            <td></td>
            <td>Earned Wages/ஈட்டிய மொத்தம் / अर्जित राशि </td>
            <td></td>
        </tr>
        <tr>
            <td>LOP /சம்பள இழப்பு / वेतन का नुकसान </td>
            <td></td>
            <td></td>
            <td></td>
            <td>PF / பிஎஃப் / भविष्य निधि </td>
            <td></td>
        </tr>
        <tr>
            <td>OT Hrs /மிகை பணி செய்த நேரம் / समयोपरि घंटे </td>
            <td></td>
            <td></td>
            <td></td>
            <td>ESI / இ.எஸ்.ஐ. / कर्मचारियों का राज्य बीमा </td>
            <td></td>
        </tr>
        <tr>
            <td>National / Festival Holidayதேசிய விடுப்பு/ राष्ट्रीय अवकाश </td>
            <td></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td>Salary Advance / சம்பள முன்பணம் / अग्रिम वेतन </td>
            <td></td>
        </tr>
        <tr>
            <td>Total Days / மொத்த நாட்கள்/  सकल दिन</td>
            <td></td>
            <td>Food Deduction / பிடித்தம் / कटौती </td>
            <td></td>
        </tr>
        <tr>
            <td>UAN NO </td>
            <td></td>
            <td></td>
            <td></td>
            <td>TDS/ டிடிஎஸ்/ टीडीएस </td>
            <td></td>
        </tr>
        <tr>
            <td>ESIC NO</td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total deduction / மொத்த பிடித்தம் / कटौती </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Net Wages நிகர ஊதியம் / नेट सैलरी </td>
            <td></td>
        </tr>
        <tr>
            <td>Authorised Signature / மேலாளர் கையொப்பம் / कर्मचारी हस्ताक्षर </td>
            <td></td>
            <td colspan="2">Employee Signature / பணியாளர் கையொப்பம் / कर्मचारी हस्ताक्षर </td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>

';

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
