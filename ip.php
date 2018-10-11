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
    if(!is_array($post)){
        $log->debug( "key='".$key."' => '".$post."'");

    }else{
        $log->debug("key=".$key);
        $log->debug($post);
    }
    }
$log->debug("============== OKVED ===============");
foreach ($data['page4.2'] as $key=>$value){

    $log->debug( "key='".$key."' => '".$value."'");
}

$filename = $iptemplate->showPDF($data);
echo json_encode(array('fileName' => "http://biznesite.ru/registr-ip/download/".$filename));
