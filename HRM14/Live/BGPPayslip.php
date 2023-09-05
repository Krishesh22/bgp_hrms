<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
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
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 * @group html
 * @group table
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('Pay Slip');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

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

// add a page
$pdf->AddPage();

// $pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->setFont('helvetica', '', 8);



// -----------------------------------------------------------------------------
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$client_name="BRITANNIA LABELS INDIA PVT LTD";
$PayslipMonthYear = "September-2022";



$pdf->setFont('helvetica', '', 10);
$pdf->SetXY(15, 10);
$pdf->Write(0, $client_name, '', 0, 'C', true, 0, false, false, 0);

$pdf->setFont('helvetica', '', 6);
$pdf->SetXY(15, 15);
$pdf->Write(0, 'PLOT NO-1750,SECTOR-38,HSIIDC RAI SONIPAT HARYANA-131028', '', 0, 'C', true, 0, false, false, 0);


$pdf->setFont('helvetica', '', 10);
$pdf->SetXY(98, 23);
$pdf->writeHTML('<u>Form X</u>',true,0,true,0);


$pdf->setFont('helvetica', '', 8);
$pdf->SetXY(12, 30);
$pdf->Write(0,'(Rule 26)', '', 0, 'C', true, 0, false, false, 0);


$pdf->SetXY(15, 35);
$pdf->Write(0,'PAYSLIP FOR THE MONTH OF', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetXY(88, 40);
$pdf->setFont('helvetica', '', 8);
$tbl = <<<EOD
<table cellspacing="0" cellpadding="3" border="1">
<tr>
<td width="120" align="center"><b>$PayslipMonthYear</b></td>
</tr>
</table>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetXY(10, 20);
$pdf->writeHTML('Code/C. No',true,0,true,0);

$pdf->SetXY(10, 25);
$pdf->writeHTML('Name',true,0,true,0);

$pdf->SetXY(10, 30);
$pdf->writeHTML("Father's Name",true,0,true,0);

$pdf->SetXY(10, 35);
$pdf->writeHTML("Desig",true,0,true,0);

$pdf->SetXY(10, 40);
$pdf->writeHTML("Dept",true,0,true,0);

$pdf->SetXY(10, 45);
$pdf->writeHTML("DOJ",true,0,true,0);


$pdf->SetXY(160, 20);
$pdf->writeHTML('Bank Name',true,0,true,0);

$pdf->SetXY(160, 25);
$pdf->writeHTML('A/c No',true,0,true,0);

$pdf->SetXY(160, 30);
$pdf->writeHTML('PF No',true,0,true,0);

$pdf->SetXY(160, 35);
$pdf->writeHTML('ESI No',true,0,true,0);

$pdf->SetXY(160, 40);
$pdf->writeHTML('PAN',true,0,true,0);







$pdf->SetXY(10, 50);
$pdf->setFont('helvetica', '', 8);
$tbl = <<<EOD
<table cellspacing="0" cellpadding="3" border="1">

<tr>
<td width="120">Attn.details</td>
<td width="60">Avail</td>
<td width="40">Bal.</td>
<td width="120">Salary/WageRate</td>
<td width="60">Earnings</td>
<td width="60">Arrears</td>
<td width="120">Deductions</td>
<td></td>
</tr>

<tr>
<td>
Present<br/>
WOF<br/>
HD<br/>
EL<br/>
CL<br/>
SL<br/>
Coff<br/>
OL<br/>
AB<br/>
</td>
<td align="right">
26.0<br/>
4.0<br/>
</td>
<td></td>
<td>

Basic  16200.00<br/>
HRA     8100.00<br/>
Conveyance <br/>
Other   2700.00<br/>
Daily Allowance 70.00<br/>

</td>
<td align="right">
16200.00<br/>
8100.00<br/><br/>
2700.00<br/>
1820.00

</td>
<td></td>
<td>

PF<br/>
ESI<br/>
LOAN<br/>
ADVANCE<br/>
TDS<br/>
25.00

</td>
<td align="center">
<br/><br/><br/><br/><br/>
Net Salary
28,975.00
</td>
</tr>


<tr><td colspan="8">
Payable Days 30.0
Total Rate 27,000.00
Gross 28,820.00
0.00
Deductions 25.00
</td></tr>
<tr><td colspan="8">Rs. TWENTY-EIGHT THOUSAND NINE HUNDRED SEVENTY-FIVE Only</td></tr>
<tr><td colspan="8">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;Authorised Signatory
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Employee's Signature
<br><br><br><br><br>
</td></tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


//Close and output PDF document
$pdf->Output('pay-slip.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
