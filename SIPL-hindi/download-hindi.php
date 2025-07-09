<?php

include('../config.php');
include('../session.php');

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

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h4>EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE AGREEMENT</h4>
<p>FOR GOOD CONSIDERATION and in consideration of my employment or continued employment by Sainmarks Industries India Pvt Ltd (the Company”), I, the undersigned employee, hereby agree to the terms of this agreement (the “Agreement”): </p>

<h4>कर्मचारी की गोपनीयता और गैर प्रकटीकरण समझौते</h4>
<p>अच्छी सहमति के लिए और सेनमार्क्स इंडस्ट्रीज इंडिया प्राइवेट लिमिटेड (कंपनी) द्वारा मेरे रोजगार या निरंतर रोजगार पर विचार करते हुए, मैं, हस्ताक्षर किया हुआ कर्मचारी, इस समझौता ("एग्रीमेंट") की शर्तों से सहमत हैं:</p>

<h4>1. CONFIDENTIAL INFORMATION</h4>
<p style="text-indent: 50px;text-align:justify;"><b>a. <u>Company Information</u></b> - I agree at all times during the term of my employment and for a period of three years thereafter, to hold in strictest confidence, and not to use, except for the benefit of the Company, or to disclose to any person, firm or corporation without written authorization of the Company, any Confidential Information of the Company.  I understand that “Confidential Information” means any Company proprietary information, technical data, trade secrets or know-how, including, but not limited to, research, product plans, products, services, customer lists, markets, software, developments, inventions, processes, formulas, technology, designs, drawings, engineering, hardware configuration information, marketing, finances or other business information disclosed to me by the Company either directly or indirectly.</p>

<h4>1. गोपनीय सूचना</h4>
<p style="text-indent: 50px;text-align:justify;"><b>i. <u>कंपनी की जानकारी</u></b> - मैं अपने रोजगार की अवधि के दौरान और उसके बाद तीन साल की अवधि के लिए सहमत हूँ, कंपनी के लाभ के लिए, कंपनी के लिखित प्राधिकरण के बिना किसी भी व्यक्ति, फर्म या निगम के किसी भी व्यक्ति, कंपनी या निगम को प्रकट करने के अलावा, सबसे अधिक कठोरतम विश्रंभ, और उपयोग नहीं करना। मैं समझता हूँ कि "गोपनीय जानकारी" का अर्थ किसी भी कंपनी के सांपातिक वाली जानकारी, तकनीकी डेटा, व्यापार रहस्य, लेकिन शोध, उत्पाद योजनाओं, उत्पादों, सेवाओं, ग्राहक सूचियों, बाजारों, सॉफ्टवेयर, विकास, आविष्कारों तक सीमित नहीं है, प्रक्रिया, सूत्र, प्रौद्योगिकी, डिजाइन, चित्र, इंजीनियरिंग, हार्डवेयर कॉन्फ़िगरेशन जानकारी, विपणन, वित्त या अन्य व्यावसायिक जानकारी कंपनी द्वारा मेरे लिए प्रत्यक्ष या अप्रत्यक्ष रूप से बताई गई है।</p>

<p style="text-align:justify;"><b>1. <u>Exceptions</u></b> - The foregoing obligations and restrictions do not apply to that part of the Confidential Information that I can demonstrate:</p>

<p style="text-indent: 50px;text-align:justify;">i.	was available or became generally available to the public; or</p>
<p style="text-indent: 50px;text-align:justify;">ii. was requested or legally compelled (by oral questions, interrogatories, requests for information or documents, <br/>subpoena, civil or criminal investigative demand or similar process) or is required by a regulatory body to make any<br/> disclosure which is prohibited or otherwise constrained by this Agreement, provided, that I shall</p>

<p style="text-indent: 100px;text-align:justify;">a. provide the Company with prompt notice of any such request(s) so that the Company may seek an<br/>appropriate protective order or other appropriate remedy  and </p>
<p style="text-indent: 100px;text-align:justify;">b. Provide reasonable assistance to the Company in obtaining any such protective order. If such protective<br/>order or other remedy is not obtained or the Company grants a waiver hereunder, then I may furnish that <br/>portion (and only that portion) of the Confidential Information which, in the written opinion of counsel<br/>reasonably acceptable to the Company, I am legally compelled or am otherwise required to disclose;<br/>provided, that I shall use reasonable efforts to obtain reliable assurance that confidentiality be accorded any<br/>Confidential Information so disclosed.</p>

<p style="text-align:justify;"><b>1. <u>अपवाद</u></b> - पूर्वगामी दायित्व और प्रतिबंध गोपनीय जानकारी के उस हिस्से पर लागू नहीं होते हैं जिन्हें मैं प्रदर्शित कर सकता हूं:</p>

<p style="text-indent: 50px;text-align:justify;">i.	आम तौर पर जनता के लिए उपलब्ध था</p>
<p style="text-indent: 50px;text-align:justify;">ii. मैं अनुरोध किया गया था या कानूनी रूप से मजबूर किया गया था (मौखिक प्रश्नों, पूछताछ, सूचना या दस्तावेजों के<br/>लिए अनुरोध, उप-नागरिक, या आपराधिक जांच की मांग या इसी तरह की प्रक्रिया) या किसी भी प्रकटीकरण के लिए<br/>एक नियामक निकाय द्वारा आवश्यक है जो इस समझौते द्वारा निषिद्ध या अन्यथा विवश है,</p>

<p style="text-indent: 100px;text-align:justify;">a.	कंपनी को ऐसे किसी भी अनुरोध (नों) की त्वरित सूचना प्रदान करें ताकि कंपनी एक उचित सुरक्षात्मक<br/>आदेश या अन्य उचित उपाय और खोज सके</p>
<p style="text-indent: 100px;text-align:justify;">b.	इस तरह के किसी भी सुरक्षात्मक आदेश को प्राप्त करने में कंपनी को उचित सहायता प्रदान करें। यदि इस<br/>तरह के सुरक्षात्मक आदेश या अन्य उपाय प्राप्त नहीं किए जाते हैं या कंपनी एक छूट प्रदान करती है, तो मैं<br/>गोपनीय जानकारी के उस हिस्से (और केवल उस हिस्से) को प्रस्तुत कर सकता हूं, जो कंपनी को उचित रूप से<br/>स्वीकार्य वकील की लिखित राय में है, मैं हूं। कानूनी रूप से मजबूर या अन्यथा प्रकट करने के लिए आवश्यक<br/>है; बशर्ते, मैं विश्वसनीय आश्वासन प्राप्त करने के लिए उचित प्रयासों का उपयोग करूंगा, ताकि गोपनीयता<br/>का खुलासा किया गया कोई भी गोपनीय जानकारी प्राप्त हो सके</p>

<p style="text-align:justify;"><b>a. <u>Former Employment Information</u></b> - I agree during my employment with the Company, not to improperly use or disclose any proprietary information or trade secrets of any former or concurrent employer or other person or entity and not bring onto the premises of the Company any unpublished document or proprietary information belonging to any such employer, person or entity unless consented to in writing by such employer, person or entity.</p>

<p style="text-align:justify;"><b>3.<u>पूर्व रोजगार सूचना</u></b> - मैं कंपनी के साथ अपने रोजगार के दौरान सहमत हूं, किसी पूर्व या समवर्ती नियोक्ता या अन्य व्यक्ति या इकाई के किसी भी मालिकाना जानकारी या व्यापार रहस्यों का अनुचित रूप से उपयोग या खुलासा करने के लिए नहीं और कंपनी के परिसर में किसी भी अप्रकाशित दस्तावेज़ या स्वामित्व को नहीं लाना। ऐसे किसी भी नियोक्ता, व्यक्ति या इकाई से संबंधित जानकारी जब तक कि ऐसे नियोक्ता, व्यक्ति या संस्था द्वारा लिखित रूप में सहमति नहीं दी जाती है।</p>


<p style="text-align:justify;"><b>4. <u>Third Party Information</u></b> - I recognize that the Company has received and in the future will receive from third parties their confidential or proprietary information to use it only for certain limited purposes.  I agree to hold all such confidential or proprietary information in the strictest confidence and not to disclose it to any person, firm or corporation or to use it except as necessary in carrying out my work for the Company consistent with the Company’s agreement with such third party.</p>

<p style="text-align:justify;padding-left:20px"><b>5. <u>थर्ड पार्टी इंफॉर्मेशन </u></b> - मैं मानता हूं कि कंपनी को प्राप्त हुआ है और भविष्य में तीसरे पक्षों से प्राप्त होगा उनकी गोपनीय या मालिकाना जानकारी केवल कुछ सीमित उद्देश्यों के लिए इसका उपयोग करने के लिए। मैं इस तरह की सभी गोपनीय या मालिकाना जानकारी को कड़े विश्वास में रखने के लिए सहमत हूं और किसी भी व्यक्ति, फर्म या निगम को इसका खुलासा नहीं करने या कंपनी के लिए कंपनी के समझौते के अनुरूप मेरे काम को पूरा करने के लिए आवश्यक के अलावा इसका उपयोग करने के लिए सहमत हूं।</p>

<h4>2. RETURN OF PROPERTY</h4>
<p style="text-align:justify;">Upon termination of my employment, I will return to the Company, retaining no copies or notes, all documents relating to the Company’s business including, but not limited to, reports, abstracts, lists, correspondence, information, computer files, computer disks, and all other materials and all copies of such material, obtained by me during my employment with the Company.  </p>

<h4>3. LEGAL AND EQUITABLE REMEDIES</h4>
<p style="text-align:justify;">I recognize that the Company may be irreparably damaged by any breach of this Agreement and that the Company shall be entitled to seek an injunction, specific performance or other equitable remedy to prevent such competition or disclosure, and may entitle the Company to other legal remedies, including attorney’s fees and costs.</p>

<h4>2. संपत्ति का पुनर्गठन</h4>
<p style="text-align:justify;">अपने रोजगार को समाप्त करने पर, मैं कंपनी में वापस आऊंगा, कोई प्रतियां या नोट नहीं रखूंगा, कंपनी के व्यवसाय से संबंधित सभी दस्तावेज, लेकिन रिपोर्ट, सार, सूचियों, पत्राचार, सूचना, कंप्यूटर फ़ाइलों, कंप्यूटर डिस्क और अन्य सभी सामग्री और इस तरह की सामग्री की सभी प्रतियां, कंपनी के साथ मेरे रोजगार के दौरान मेरे द्वारा प्राप्त की गई हैं।</p>

<h4>3. कानूनी और योग्य उपाय</h4>
<p style="text-align:justify;">मैं मानता हूं कि कंपनी इस समझौते के किसी भी उल्लंघन से अपूरणीय रूप से क्षतिग्रस्त हो सकती है और कंपनी इस तरह की प्रतियोगिता या प्रकटीकरण को रोकने के लिए निषेधाज्ञा, विशिष्ट प्रदर्शन या अन्य न्यायसंगत उपाय खोजने की हकदार होगी और कंपनी को अन्य कानूनी उपायों का अधिकार दे सकती है। वकील की फीस और लागत सहित।</p>


<h4>4.  SUCCESORS AND ASSIGNS</h4>
<p style="text-align:justify;">This Agreement will be binding upon my heirs, executors, administrators and other legal representatives and will be for the benefit of the Company, its successors, and its assigns. I may not assign any of my rights, or delegate any of my obligations, under this Agreement.</p>

<h4>5.  CONTINUING OBLIGATIONS</h4>
<p style="text-align:justify;">The obligations and rights described in this Agreement shall survive the termination of my employment with the Company.</p>

<h4>4. उत्तराधिकारी</h4>
<p style="text-align:justify;">यह समझौता मेरे उत्तराधिकारियों, निष्पादकों, प्रशासकों और अन्य कानूनी प्रतिनिधियों के लिए बाध्यकारी होगा और कंपनी, इसके उत्तराधिकारियों और इसके कार्य के लाभ के लिए होगा। मैं इस समझौते के तहत अपने किसी भी अधिकार को सौंप नहीं सकता हूं, या अपने किसी भी दायित्व को सौंप सकता हूं।</p>

<h4>5. संपर्क सामग्री</h4>
<p style="text-align:justify;">इस समझौते में वर्णित दायित्वों और अधिकारों को कंपनी के साथ मेरे रोजगार की समाप्ति से बचाना होगा।</p>

<h4>6.  SEVERABILITY</h4>
<p style="text-align:justify;">Whenever possible, each provision of this Agreement will be interpreted in such manner as to be effective and valid under applicable law, but if any provision of this Agreement is held to be invalid, illegal or unenforceable in any respect under any applicable law or rule in any jurisdiction, such invalidity, illegality or unenforceability will not affect any other provision or any other jurisdiction, but this agreement will be reformed, construed and enforced in such jurisdiction as if such invalid, illegal or unenforceable provisions had never been contained herein.</p>

<h4>6. स्थिरता</h4>
<p style="text-align:justify;">जब भी संभव हो, इस समझौते के प्रत्येक प्रावधान की व्याख्या इस प्रकार की जाएगी, जो लागू कानून के तहत प्रभावी और मान्य हो, लेकिन यदि इस समझौते के किसी भी प्रावधान को किसी भी लागू कानून या नियम के तहत किसी भी संबंध में अमान्य, अवैध या अप्राप्य माना जाता है। किसी भी क्षेत्राधिकार, इस तरह की अमान्यता, अवैधता या अनियंत्रितता किसी अन्य प्रावधान या किसी अन्य क्षेत्राधिकार को प्रभावित नहीं करेगी, लेकिन इस समझौते को ऐसे अधिकार क्षेत्र में सुधार, मान लिया जाएगा और लागू किया जाएगा जैसे कि यह अवैध, अवैध या अप्रवर्तनीय प्रावधान कभी भी यहां निहित नहीं थे।</p>

<h4>7.  GOVERNING LAW</h4>

<p style="text-align:justify;">This Agreement shall be governed by the laws of the state of Tamil Nadu without regard to its conflicts of law provisions.</p> 

<p style="text-align:justify;">IN WITNESS WHEREOF, the parties below hereby execute this Agreement on ___________________________.</p>
<p></p>
<p style="text-align:justify;">
Accepted and Acknowledged&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sainmarks Industries India Pvt Ltd.,
</p>

<h4>7. लौटना</h4>

<p style="text-align:justify;">यह समझौता कानून के प्रावधानों के टकराव के बिना तमिलनाडु राज्य के कानूनों द्वारा शासित होगा।</p> 

<p style="text-align:justify;">विटनेस में, नीचे दिए गए पक्ष इस समझौते को ___________________________ पर निष्पादित करते हैं।</p> 
 
स्वीकार किए जाते हैं और स्वीकार किए जाते हैं	
<p></p>
<p style="text-align:justify;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sainmarks Industries India Pvt Ltd.,
</p>

<p></p>
<p style="text-align:justify;">
Employee’s name/signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorized Signatory<br/>
कर्मचारी का नाम / हस्ताक्षर हस्ताक्षरकर्ता&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;अधिकृत हस्ताक्षरकर्ता
</p>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('sipl-hindi.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
