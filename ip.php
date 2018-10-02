<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');
require_once('lib/IPTemplate.php');

$iptemplate = new IPTemplate();

$data = array();

foreach ($_POST as $key => $post) {
    $key = str_replace("_", ".", $key);
    $data[$key] = $post;
    echo "key=".$key." => '".$post."'<br>";
}

$filename = $iptemplate->showPDF($data);
echo json_encode(array('fileName' => "http://biznesite.ru/registr-ip/download/".$filename));
