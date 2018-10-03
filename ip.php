<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');
require_once('lib/IPTemplate.php');
require_once ('lib/log.php');
require_once ('internalconfig.php');

$log = new Log($config);
$iptemplate = new IPTemplate();
$log->info("Start IP template");
$data = array();

foreach ($_POST as $key => $post) {
    $key = str_replace("_", ".", $key);
    $data[$key] = $post;
    $log->debug( "key='".$key."' => '".$post."'");
}

$filename = $iptemplate->showPDF($data);
echo json_encode(array('fileName' => "http://biznesite.ru/registr-ip/download/".$filename));
