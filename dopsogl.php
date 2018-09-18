<?php

setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ('./lib/PDFMerger-master/PDFMerger.php');
require_once ('./lib/PDFMerger-master/tcpdf/tcpdi.php');
require_once ('./lib/PDFMerger-master/tcpdf/tcpdf.php');
$pdf = new PDFMerger(); // or use $pdf = new \PDFMerger; for Laravel

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
$staticData[0]['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData[0]['OGRN']="318645100032480";
$staticData[0]['agentCity']="г. Саратов";
$staticData[0][]="";
$staticData[0][]="";
$staticData[0][]="";
$staticData[0][]="";
$staticData[0][]="";
$agentCompanyData[0]['companyName']="АО «Деловая среда» ОГРН 1127746271355";
$agentCompanyData[0]['companyAddress']="г. Москва, ул. Вавилова, д. 19, ПАО Сбербанк ОГРН 1027700132195";
$agentCompanyData[0]['companyShortName']="ПАО Сбербанк";
$agentCompanyData[0]['companyName']="АО «Деловая среда»";
$agentCompanyData[0]['companyName']="АО «Деловая среда»";



$p1= "Я, ".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'] .", ".$data['4.2'].", паспорт ".$data['7.2'].
    ",  дата выдачи ".$data['7.3.1'].".".$data['7.3.2'].".".$data['7.3.3'].
    " г, выдан ".$data['7.4'].",  настоящим даю свое согласие ". $staticData[0]['agentName']." ОГРН/ОГРНИП ".$staticData[0]['OGRN'].
    ", расположенному по адресу: ".$agentCompanyData[0]['companyName'].", расположенному по адресу: ".$agentCompanyData[0]['companyAddress']." ";
/*
 * •    ФИО - Иванов Иван Иванович
•    регион проживания - Саратовская область
•    населенный пункт проживания - , г. Саратов ул. Лунная, дом 10 кв 11
•    контактный телефон - 89172153011
•    E-mail - ivanov@yandex.ru
 */
$p2 ="•   ФИО - ".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'].
    "\n•   регион проживания - Саратовская область*".
    "\n•   населенный пункт проживания - ".$data['4.2'].
    "\n•   контактный телефон - ".$data['telephone'].
    "\n•   E-mail - ".$data['email'];

$p3 ="Цель обработки персональных данных: для совершения действий по поиску и привлечению\n
покупателей продуктов ".$agentCompanyData[0]['companyShortName'].", для обработки поступившей заявки субъекта персональных\n
данных на приобретение одного из продуктов ".$agentCompanyData[0]['companyShortName']." оператором обработки персональных данных;
 после обработки поступившей заявки субъекта персональных данных направления на рассмотрение специалистов ".$agentCompanyData[0]['companyShortName'].
    " заявки субъекта персональных данных в целях принятия соответствующего решения.";

$p4="Настоящее согласие предоставляется на осуществление любых действий в отношении моих персональных данных, которые необходимы или желаемы для достижения указанных выше целей, включая (без ограничения) сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование, распространение, обезличивание, блокирование, трансграничную передачу персональных данных, а также осуществление любых иных действий с моими персональными данными, предусмотренных действующим законодательством Российской Федерации. ";

$p5="Настоящим, соглашаюсь с направлением в мой адрес посредством использования телефонной, факсимильной, подвижной радиотелефонной связи, а также электронной почты информации и рекламных сообщений о разработанных ".$agentCompanyData[0]['companyName']." и ".$agentCompanyData[0]['companyShortName']." продуктах и услугах. ";

$p6="Индивидуальный ".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3']." гарантирует, что обработка моих личных данных 
осуществляется в соответствии с действующим законодательством Российской Федерации.";
$p7="Я проинформирован и даю согласие, что ".$staticData[0]['agentName']
    .", ".$agentCompanyData[0]['companyName']." и ".$agentCompanyData[0]['companyShortName']
    ." будут обрабатывать мои персональные данные как неавтоматизированным, так и автоматизированным способом обработки. ";
$p8="Данное Согласие действует до достижения целей обработки моих персональных данных, установленных действующим законодательством Российской Федерации, или в течение 1 года с момента его получения. По истечении указанного срока действие согласия считается продленным на каждый следующий год при отсутствии сведений о его отзыве.

Согласие может быть отозвано субъектом путем направления: 
- письменного обращения субъекта на почтовый адрес или направления скана-образа письма в свободной форме за подписью субъекта персональных данных и содержащего в явном виде отзыв согласия на обработку персональных данных на адрес электронной почты: ".
    $data['email'].". 
Я подтверждаю, что, давая такое Согласие, я действую своей волей и в своих интересах. 
";
$p9="________________________(".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'] .")
           подпись
";

$dopSogl = new DopSoglashenieTemplate();
$dopSogl->showPDF($p1);
?>