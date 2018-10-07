<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');
require_once('lib/UPRFormaTemplate.php');
require_once ('lib/log.php');
require_once ('internalconfig.php');
date_default_timezone_set('Europe/Samara');

$log = new Log($config);
$log->info("Start IP template");
$dataPost = array();
foreach ($_POST as $key => $post) {
    $key = str_replace("_", ".", $key);
    $dataPost[$key] = $post;
    $log->debug( "key='".$key."' => '".$post."'");
}

$iptemplate = new UPRFormaTemplate();
$data['INN'] = $dataPost['2'];
$data['KPP'] = "123456789";
$data['Nalogorgan'] = "123456789";
$data['Priznak'] = "123456789";
$data['FIODATA'] = $dataPost['1.1.1']." " .$dataPost['1.1.2']." ".$dataPost['1.1.3'];

$data['PEREHODIT'] = "12";
$data['1YANVAR'] = "12";
$data['2POSTANOVKAMONTH'] = "01";
$data['2POSTANOVKAYEAR'] = "12";
$data['OBEKT'] = "1";
$data['GODVIDACH'] = "12";
$data['DOHODI'] = "123456789";
$data['1OKTOBER'] = "123456789";
$data['COPYLISTCOUNT'] = "123456789";
$data['USERTYPE'] = "1";
$data['FIODATA2'] = $data['FIODATA'];
$data['PHONENUMBER'] = $dataPost['telephone'];
$data['CURRENTDATEDAY'] = date("d");
$data['CURRENTDATEMONTH'] =  date("m");
$data['CURRENTDATEYEAR'] = date("Y");
$data['PERSONALDOCUMENT'] = "1234567890123456789012345678901234567890";




$filename = $iptemplate->showPDF($data);
echo json_encode(array('fileName' => "http://biznesite.ru/registr-ip/download/".$filename));
