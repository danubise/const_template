<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');
require_once('lib/IPTemplate.php');

$iptemplate = new IPTemplate();

$iptemplate->showPDF($_POST);