<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');
require_once('lib/IPTemplate.php');

$iptemplate = new IPTemplate();

$filename = $iptemplate->showPDF($_POST);
echo json_encode(array('fileName' => "http://biznesite.ru/registr-ip/download/".$filename));