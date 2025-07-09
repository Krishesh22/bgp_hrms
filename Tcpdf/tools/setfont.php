<?php 

// Add more files if the font offers for
// Bold styles, Oblique etc.
$pathTTFFiles = array(
    'Latha.ttf'
);

foreach($pathTTFFiles as $ttfFile){
    $fontname = TCPDF_FONTS::addTTFfont($ttfFile, 'TrueTypeUnicode', '', 96);
    
    echo "The processed font '$ttfFile' can be used with the name: $fontname";
}

