<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');
require_once('lib/IPTemplate.php');

$iptemplate = new IPTemplate();

$data['1.1.1'] = "АЛАБЕРГЕНОВ";
$data['1.1.2'] = "АЛАБЕРГЕН";
$data['1.1.3'] = "АЛЕБЕРГЕН УГЛИ-УМЛИ";

$data['1.2.1'] = "ALABERGENOV";
$data['1.2.2'] = "ALABERGEN";
$data['1.2.3'] = "ALABERGEN UGLI-UMLI";

$data['2'] = "123456789108";

$data['3'] = "1";

$data['4.1.1'] = "11";
$data['4.1.2'] = "11";
$data['4.1.3'] = "2011";
$data['4.2'] = "ГОРОД ТАМБОВ, УЛ.АСТРАХАНСКАЯ:(МАЛЫЙ ПЕРЕУЛОК) Д.234/38, КВ.43";

$data['5'] = "2";
$data['5,1'] = "254";


$data['6,1'] = "123456";
$data['6,2'] = "12";
$data['6,3,1'] = "ГОРНЫЙ";
$data['6,3,2'] = "ГОРНЫЙ ПОСЕЛОК 5 КУРГАН";
$data['6,3,3'] = "ПЕРЕУЛОК КРЫТЫЙ 7/34";

$data['6,4,1'] = "ГОРНЫЙ";
$data['6,4,2'] = "ГОРНЫЙ ПОСЕЛОК 5 КУРГАН";

$data['6,5,1'] = "ГОРНЫЙ";
$data['6,5,2'] = "ПЕРЕУЛОК КРЫТЫЙ 7/34";
$data['6,5,3'] = "АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";

$data['6,6,1'] = "ГОРНЫЙ";
$data['6,6,2'] = "ПЕРЕУЛОК КРЫТЫЙ 7/34";
$data['6,6,3'] = "АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";

$data['6,7,1'] = "ВЛФДЕНИЕ";
$data['6,7,2'] = "35456012";

$data['6,8,1'] = "КОРПУС";
$data['6,8,2'] = "35456012";

$data['6,9,1'] = "КОМНАТА";
$data['6,9,2'] = "35456012";

$data['7,1'] = "09";

$data['7,2'] = "6321 23456789456678123456";

$data['7,3,1'] = "58";
$data['7,3,2'] = "46";
$data['7,3,3'] = "1234";

$data['7,4,1'] = "АБВГДЕЖЗИ ОООООООООООО ТУФХЦЧШЩЪЫЬЭЮЯ";
$data['7,4,2'] = "64ПАИСПИВ6586ОПР ЧВТК5ТВПЫМЫ3 3 РАВПАНКНРРП";
$data['7,4,3'] = "АВКНКИМРТОТЕТМ 5 ПМТРИГ ОВВПРСЧОЛОРПВРИАВТЫВА";

$data['7,5,1'] = "109";
$data['7,5,2'] = "569";


$data['8,1'] = "2";
$data['8,2'] = "1234567890123456789012345";

$data['8,3,1'] = "34";
$data['8,3,2'] = "56";
$data['8,3,3'] = "2146";

$data['8,4,1'] = "ВРАНКИАРКСТВРЫНУВОСЛЫФАКЕИСВЧВУЫЧР";
$data['8,4,2'] = "АКУВИРВТЫЕИПЫЦФЙЛОД КАСНРВ 23 СВЫДТИНИВЫВСУВД";
$data['8,4,3'] = "ЫВКАРТИВУЫ 1234 ВЫИТСУКВСЛО ЫВТИСЫЫЫЫУИВУНКЗЛ";

$data['8,5,1'] = "34";
$data['8,5,2'] = "67";
$data['8,5,3'] = "2190";


$data['pagenamber4'] = "004";

$data['page4.1'] = "12";
$data['page4.2'] = "54";
$data['page4.3'] = "39";

$data['page4.2.1.1.1'] = "43";
$data['page4.2.1.1.2'] = "23";
$data['page4.2.1.1.3'] = "89";
$data['page4.2.1.2.1'] = "30";
$data['page4.2.1.2.2'] = "51";
$data['page4.2.1.2.3'] = "42";
$data['page4.2.1.3.1'] = "32";
$data['page4.2.1.3.2'] = "63";
$data['page4.2.1.3.3'] = "21";
$data['page4.2.1.4.1'] = "51";
$data['page4.2.1.4.2'] = "40";
$data['page4.2.1.4.3'] = "59";
$data['page4.2.2.1.1'] = "32";
$data['page4.2.2.1.2'] = "42";
$data['page4.2.2.1.3'] = "60";
$data['page4.2.2.2.1'] = "31";
$data['page4.2.2.2.2'] = "42";
$data['page4.2.2.2.3'] = "76";
$data['page4.2.2.3.1'] = "39";
$data['page4.2.2.3.2'] = "62";
$data['page4.2.2.3.3'] = "38";
$data['page4.2.2.4.1'] = "41";
$data['page4.2.2.4.2'] = "36";
$data['page4.2.2.4.3'] = "26";
$data['page4.2.3.1.1'] = "38";
$data['page4.2.3.1.2'] = "49";
$data['page4.2.3.1.3'] = "97";
$data['page4.2.3.2.1'] = "75";
$data['page4.2.3.2.2'] = "48";
$data['page4.2.3.2.3'] = "67";
$data['page4.2.3.3.1'] = "49";
$data['page4.2.3.3.2'] = "38";
$data['page4.2.3.3.3'] = "56";
$data['page4.2.3.4.1'] = "34";
$data['page4.2.3.4.2'] = "78";
$data['page4.2.3.4.3'] = "46";
$data['page4.2.4.1.1'] = "34";
$data['page4.2.4.1.2'] = "45";
$data['page4.2.4.1.3'] = "31";
$data['page4.2.4.2.1'] = "56";
$data['page4.2.4.2.2'] = "76";
$data['page4.2.4.2.3'] = "59";
$data['page4.2.4.3.1'] = "67";
$data['page4.2.4.3.2'] = "31";
$data['page4.2.4.3.3'] = "98";
$data['page4.2.4.4.1'] = "43";
$data['page4.2.4.4.2'] = "67";
$data['page4.2.4.4.3'] = "89";
$data['page4.2.5.1.1'] = "54";
$data['page4.2.5.1.2'] = "67";
$data['page4.2.5.1.3'] = "89";
$data['page4.2.5.2.1'] = "32";
$data['page4.2.5.2.2'] = "67";
$data['page4.2.5.2.3'] = "79";
$data['page4.2.5.3.1'] = "34";
$data['page4.2.5.3.2'] = "87";
$data['page4.2.5.3.3'] = "78";
$data['page4.2.5.4.1'] = "32";
$data['page4.2.5.4.2'] = "76";
$data['page4.2.5.4.3'] = "56";
$data['page4.2.6.1.1'] = "21";
$data['page4.2.6.1.2'] = "43";
$data['page4.2.6.1.3'] = "76";
$data['page4.2.6.2.1'] = "43";
$data['page4.2.6.2.2'] = "78";
$data['page4.2.6.2.3'] = "51";
$data['page4.2.6.3.1'] = "42";
$data['page4.2.6.3.2'] = "50";
$data['page4.2.6.3.3'] = "56";
$data['page4.2.6.4.1'] = "51";
$data['page4.2.6.4.2'] = "87";
$data['page4.2.6.4.3'] = "38";
$data['page4.2.7.1.1'] = "31";
$data['page4.2.7.1.2'] = "43";
$data['page4.2.7.1.3'] = "34";
$data['page4.2.7.2.1'] = "12";
$data['page4.2.7.2.2'] = "87";
$data['page4.2.7.2.3'] = "67";
$data['page4.2.7.3.1'] = "31";
$data['page4.2.7.3.2'] = "87";
$data['page4.2.7.3.3'] = "54";
$data['page4.2.7.4.1'] = "32";
$data['page4.2.7.4.2'] = "87";
$data['page4.2.7.4.3'] = "30";
$data['page4.2.8.1.1'] = "32";
$data['page4.2.8.1.2'] = "43";
$data['page4.2.8.1.3'] = "61";
$data['page4.2.8.2.1'] = "32";
$data['page4.2.8.2.2'] = "29";
$data['page4.2.8.2.3'] = "50";
$data['page4.2.8.3.1'] = "34";
$data['page4.2.8.3.2'] = "78";
$data['page4.2.8.3.3'] = "59";
$data['page4.2.8.4.1'] = "21";
$data['page4.2.8.4.2'] = "43";
$data['page4.2.8.4.3'] = "70";
$data['page4.2.9.1.1'] = "29";
$data['page4.2.9.1.2'] = "32";
$data['page4.2.9.1.3'] = "56";
$data['page4.2.9.2.1'] = "32";
$data['page4.2.9.2.2'] = "43";
$data['page4.2.9.2.3'] = "86";
$data['page4.2.9.3.1'] = "32";
$data['page4.2.9.3.2'] = "45";
$data['page4.2.9.3.3'] = "89";
$data['page4.2.9.4.1'] = "43";
$data['page4.2.9.4.2'] = "43";
$data['page4.2.9.4.3'] = "31";
$data['page4.2.10.1.1'] = "21";
$data['page4.2.10.1.2'] = "45";
$data['page4.2.10.1.3'] = "19";
$data['page4.2.10.2.1'] = "18";
$data['page4.2.10.2.2'] = "21";
$data['page4.2.10.2.3'] = "41";
$data['page4.2.10.3.1'] = "32";
$data['page4.2.10.3.2'] = "83";
$data['page4.2.10.3.3'] = "91";
$data['page4.2.10.4.1'] = "62";
$data['page4.2.10.4.2'] = "98";
$data['page4.2.10.4.3'] = "81";
$data['page4.2.11.1.1'] = "62";
$data['page4.2.11.1.2'] = "35";
$data['page4.2.11.1.3'] = "41";
$data['page4.2.11.2.1'] = "32";
$data['page4.2.11.2.2'] = "73";
$data['page4.2.11.2.3'] = "96";
$data['page4.2.11.3.1'] = "34";
$data['page4.2.11.3.2'] = "38";
$data['page4.2.11.3.3'] = "59";
$data['page4.2.11.4.1'] = "21";
$data['page4.2.11.4.2'] = "82";
$data['page4.2.11.4.3'] = "90";
$data['page4.2.12.1.1'] = "27";
$data['page4.2.12.1.2'] = "31";
$data['page4.2.12.1.3'] = "92";
$data['page4.2.12.2.1'] = "40";
$data['page4.2.12.2.2'] = "37";
$data['page4.2.12.2.3'] = "47";
$data['page4.2.12.3.1'] = "63";
$data['page4.2.12.3.2'] = "87";
$data['page4.2.12.3.3'] = "62";
$data['page4.2.12.4.1'] = "29";
$data['page4.2.12.4.2'] = "30";
$data['page4.2.12.4.3'] = "41";
$data['page4.2.13.1.1'] = "31";
$data['page4.2.13.1.2'] = "42";
$data['page4.2.13.1.3'] = "71";
$data['page4.2.13.2.1'] = "32";
$data['page4.2.13.2.2'] = "65";
$data['page4.2.13.2.3'] = "90";
$data['page4.2.13.3.1'] = "34";
$data['page4.2.13.3.2'] = "81";
$data['page4.2.13.3.3'] = "73";
$data['page4.2.13.4.1'] = "31";
$data['page4.2.13.4.2'] = "83";
$data['page4.2.13.4.3'] = "79";
$data['page4.2.14.1.1'] = "37";
$data['page4.2.14.1.2'] = "31";
$data['page4.2.14.1.3'] = "63";
$data['page4.2.14.2.1'] = "47";
$data['page4.2.14.2.2'] = "37";
$data['page4.2.14.2.3'] = "59";
$data['page4.2.14.3.1'] = "43";
$data['page4.2.14.3.2'] = "29";
$data['page4.2.14.3.3'] = "28";
$data['page4.2.14.4.1'] = "32";
$data['page4.2.14.4.2'] = "40";
$data['page4.2.14.4.3'] = "56";









$data['pagenamber5'] = "005";

$data['1'] = "1";

$data['telephone'] = "+7(987) 432-34-67";

$data['email'] = "AHS-BRF_HV.NFJF123RHY@GMAIL.COM";
$data['3.1'] = "2";
$data['3.2'] = "123456789012";






















$iptemplate->showPDF($data);