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

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h4>EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE AGREEMENT</h4>
<p>FOR GOOD CONSIDERATION and in consideration of my employment or continued employment by Sainmarks Industries India Pvt Ltd (the Company”), I, the undersigned employee, hereby agree to the terms of this agreement (the “Agreement”): </p>


<h4>1. CONFIDENTIAL INFORMATION</h4>
<p style="text-indent: 50px;text-align:justify;"><b>a. <u>Company Information</u></b> - I agree at all times during the term of my employment and for a period of three years thereafter, to hold in strictest confidence, and not to use, except for the benefit of the Company, or to disclose to any person, firm or corporation without written authorization of the Company, any Confidential Information of the Company.  I understand that “Confidential Information” means any Company proprietary information, technical data, trade secrets or know-how, including, but not limited to, research, product plans, products, services, customer lists, markets, software, developments, inventions, processes, formulas, technology, designs, drawings, engineering, hardware configuration information, marketing, finances or other business information disclosed to me by the Company either directly or indirectly.</p>


<p style="text-align:justify;"><b>1. <u>Exceptions</u></b> - The foregoing obligations and restrictions do not apply to that part of the Confidential Information that I can demonstrate:</p>

<p style="text-indent: 50px;text-align:justify;">i.	was available or became generally available to the public; or</p>
<p style="text-indent: 50px;text-align:justify;">ii. was requested or legally compelled (by oral questions, interrogatories, requests for information or documents, <br/>subpoena, civil or criminal investigative demand or similar process) or is required by a regulatory body to make any<br/> disclosure which is prohibited or otherwise constrained by this Agreement, provided, that I shall</p>

<p style="text-indent: 100px;text-align:justify;">a. provide the Company with prompt notice of any such request(s) so that the Company may seek an<br/>appropriate protective order or other appropriate remedy  and </p>
<p style="text-indent: 100px;text-align:justify;">b. Provide reasonable assistance to the Company in obtaining any such protective order. If such protective<br/>order or other remedy is not obtained or the Company grants a waiver hereunder, then I may furnish that <br/>portion (and only that portion) of the Confidential Information which, in the written opinion of counsel<br/>reasonably acceptable to the Company, I am legally compelled or am otherwise required to disclose;<br/>provided, that I shall use reasonable efforts to obtain reliable assurance that confidentiality be accorded any<br/>Confidential Information so disclosed.</p>


<p style="text-align:justify;"><b>a. <u>Former Employment Information</u></b> - I agree during my employment with the Company, not to improperly use or disclose any proprietary information or trade secrets of any former or concurrent employer or other person or entity and not bring onto the premises of the Company any unpublished document or proprietary information belonging to any such employer, person or entity unless consented to in writing by such employer, person or entity.</p>




<p style="text-align:justify;"><b>4. <u>Third Party Information</u></b> - I recognize that the Company has received and in the future will receive from third parties their confidential or proprietary information to use it only for certain limited purposes.  I agree to hold all such confidential or proprietary information in the strictest confidence and not to disclose it to any person, firm or corporation or to use it except as necessary in carrying out my work for the Company consistent with the Company’s agreement with such third party.</p>


<h4>2. RETURN OF PROPERTY</h4>
<p style="text-align:justify;">Upon termination of my employment, I will return to the Company, retaining no copies or notes, all documents relating to the Company’s business including, but not limited to, reports, abstracts, lists, correspondence, information, computer files, computer disks, and all other materials and all copies of such material, obtained by me during my employment with the Company.  </p>

<h4>3. LEGAL AND EQUITABLE REMEDIES</h4>
<p style="text-align:justify;">I recognize that the Company may be irreparably damaged by any breach of this Agreement and that the Company shall be entitled to seek an injunction, specific performance or other equitable remedy to prevent such competition or disclosure, and may entitle the Company to other legal remedies, including attorney’s fees and costs.</p>






<h4>4.  SUCCESORS AND ASSIGNS</h4>
<p style="text-align:justify;">This Agreement will be binding upon my heirs, executors, administrators and other legal representatives and will be for the benefit of the Company, its successors, and its assigns. I may not assign any of my rights, or delegate any of my obligations, under this Agreement.</p>

<h4>5.  CONTINUING OBLIGATIONS</h4>
<p style="text-align:justify;">The obligations and rights described in this Agreement shall survive the termination of my employment with the Company.</p>


<h4>6.  SEVERABILITY</h4>
<p style="text-align:justify;">Whenever possible, each provision of this Agreement will be interpreted in such manner as to be effective and valid under applicable law, but if any provision of this Agreement is held to be invalid, illegal or unenforceable in any respect under any applicable law or rule in any jurisdiction, such invalidity, illegality or unenforceability will not affect any other provision or any other jurisdiction, but this agreement will be reformed, construed and enforced in such jurisdiction as if such invalid, illegal or unenforceable provisions had never been contained herein.</p>

<h4>7.  GOVERNING LAW</h4>

<p style="text-align:justify;">This Agreement shall be governed by the laws of the state of Tamil Nadu without regard to its conflicts of law provisions.</p> 

<p style="text-align:justify;">IN WITNESS WHEREOF, the parties below hereby execute this Agreement on ___________________________.</p>
<p></p>
<p style="text-align:justify;">
Accepted and Acknowledged&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sainmarks Industries India Pvt Ltd.,
</p>



<p></p>
<p></p>
<p style="text-align:justify;">
Employee’s name/signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorized Signatory
</p>';

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
