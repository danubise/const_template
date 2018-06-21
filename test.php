<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->setFontSubsetting(true);

$pdf->SetFont('couriercyrillic_12144', '', 18, '', true);

$pdf->AddPage();

$pdf->Image('images/IP_01.jpg', 0, 0,210,297, 'JPG', null, '', true, 300, '', false, false, 1, false, false, false);

$text = "АБВASD";

$lineid = "1.1.1";
writeLine($text,$lineid,$pdf);

$pdf->Output('example_001.pdf', 'I');


function writeLine($text, $lineid, $pdf){
    $line['1.1.1']['x'] = 34;
    $line['1.1.1']['y'] = 59.5;
    $array = mb_str_split($text);

    for($i=0; $i < sizeof($array); $i++){
        $pdf->SetXY($line[$lineid]['x'] + $i * 5, $line[$lineid]['y']);
        $pdf->Write(10, $array[$i]);
    }
}
function mb_str_split($string){
    return preg_split('/(?<!^)(?!$)/u',$string);

}

class IPReport{


}
//============================================================+
// END OF FILE
//============================================================+
//=====================