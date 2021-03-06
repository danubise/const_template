<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
require_once('lib/TCPDF/tcpdf.php');
require_once ('./lib/DopSoglashenieTemplate.php');
require_once ('lib/log.php');
require_once ('internalconfig.php');
date_default_timezone_set('Europe/Samara');

$log = new Log($config);
$log->info("Start IP template");
$data = array();
foreach ($_POST as $key => $post) {
    $key = str_replace("_", ".", $key);
    $data[$key] = $post;
    $log->debug( "key='".$key."' => '".$post."'");
}

//$data['1.1.1'] = "АЛАБЕРГЕНОВ";
//$data['1.1.2'] = "АЛАБЕРГЕН";
//$data['1.1.3'] = "АЛЕБЕРГЕН УГЛИ-УМЛИ";
//
//$data['1.2.1'] = "ALABERGENOV";
//$data['1.2.2'] = "ALABERGEN";
//$data['1.2.3'] = "ALABERGEN UGLI-UMLI";
//
//$data['2'] = "123456789108";
//
//$data['3'] = "1";
//
//$data['4.1.1'] = "11";
//$data['4.1.2'] = "11";
//$data['4.1.3'] = "2011";
//$data['4.2'] = "ГОРОД ТАМБОВ, УЛ.АСТРАХАНСКАЯ:(МАЛЫЙ ПЕРЕУЛОК) Д.234/38, КВ.43";
//$data['6.4.1'] = "ГОРОД";
//$data['6.4.2'] = "ТАМБОВ";
//
//$data['7.2'] = "6321 23456789456678123456";
//$data['7.3.1'] = "58";
//$data['7.3.2'] = "46";
//$data['7.3.3'] = "1234";
//$data['7.4'] = "АБВГДЕЖЗИ ОООООООООООО ТУФХЦЧШЩЪЫЬЭЮЯ 64ПАИСПИВ6586ОПР ЧВТК5ТВПЫМЫ3 3 РАВПАНКНРРП АВКНКИМРТОТЕТМ 5 ПМТРИГ ОВВПРСЧОЛОРПВРИАВТЫВА";
//
//$data['telephone'] = "+7(987) 432-34-67";
//
//$data['email'] = "AHS-BRF_HV.NFJF123RHY@GMAIL.COM";

$staticData[0]['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData[0]['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData[0]['OGRN']="318645100032480";
$staticData[0]['agentCity']="г. Саратов";
$staticData[0]['email']="aleksander-frolov@yandex.ru";
$staticData[0]['agentShortName']="Фролов А.Н.";
$staticData[0][]="";
$staticData[0][]="";
$staticData[0][]="";
$agentCompanyData[0]['companyName']="АО «Деловая среда» ОГРН 1127746271355";
$agentCompanyData[0]['companyAddress']="г. Москва, ул. Вавилова, д. 19, ПАО Сбербанк ОГРН 1027700132195";
$agentCompanyData[0]['companyShortName']="ПАО Сбербанк";
$agentCompanyData[0]['companyName']="АО «Деловая среда»";
$agentCompanyData[0]['companyName']="АО «Деловая среда»";


$dopSogl = new DopSoglashenieTemplate();



$html = "
<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
        color: black;
        font-family: couriercyrillic_12144;
        font-size: 16pt;
    }
    p.first {
        color: black;
        font-family: couriercyrillic_12144;
        font-size: 8px;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p.second{
        color: black;
        font-family: couriercyrillic_12144;
        font-size: 8px;
    }


</style>

<h1 class=\"title\">Согласие субъекта на обработку его персональных данных</h1>

<p class=\"first\"> <small>Я, ".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'] .", ".$data['4.2'].", паспорт ".$data['7.2'].
    ",  дата выдачи ".$data['7.3.1'].".".$data['7.3.2'].".".$data['7.3.3'].
    " г, выдан ".$data['7.4'].",  настоящим даю свое согласие ". $staticData[0]['agentName']." ОГРН/ОГРНИП ".$staticData[0]['OGRN'].
    ", расположенному по адресу: ".$agentCompanyData[0]['companyName'].", расположенному по адресу: ".$agentCompanyData[0]['companyAddress']."</small></p>
    

<br />
<p class=\"first\">"."•   ФИО - ".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'].
    "<br>•   регион проживания - Саратовская область*".
    "<br>•   населенный пункт проживания - ".$data['4.2'].
    "<br>•   контактный телефон - ".$data['telephone'].
    "<br>•   E-mail - ".$data['email']."</p>
<br />
<p class=\"first\">"."Цель обработки персональных данных: для совершения действий по поиску и привлечению\n
покупателей продуктов ".$agentCompanyData[0]['companyShortName'].", для обработки поступившей заявки субъекта персональных\n
данных на приобретение одного из продуктов ".$agentCompanyData[0]['companyShortName']." оператором обработки персональных данных;
 после обработки поступившей заявки субъекта персональных данных направления на рассмотрение специалистов ".$agentCompanyData[0]['companyShortName'].
    " заявки субъекта персональных данных в целях принятия соответствующего решения."."</p> 
<br />
<p class=\"first\">"."Настоящее согласие предоставляется на осуществление любых действий в отношении моих персональных данных, которые необходимы или желаемы для достижения указанных выше целей, включая (без ограничения) сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование, распространение, обезличивание, блокирование, трансграничную передачу персональных данных, а также осуществление любых иных действий с моими персональными данными, предусмотренных действующим законодательством Российской Федерации. "."</p> 

<br />
<p class=\"first\">"."Настоящим, соглашаюсь с направлением в мой адрес посредством использования телефонной, факсимильной, подвижной радиотелефонной связи, а также электронной почты информации и рекламных сообщений о разработанных ".$agentCompanyData[0]['companyName']." и ".$agentCompanyData[0]['companyShortName']." продуктах и услугах. "."</p> 
<br />
<p class=\"first\">".$staticData[0]['agentName2']." гарантирует, что обработка моих личных данных 
осуществляется в соответствии с действующим законодательством Российской Федерации."."</p> 
<br />
<p class=\"first\">"."Я проинформирован и даю согласие, что ".$staticData[0]['agentName']
    .", ".$agentCompanyData[0]['companyName']." и ".$agentCompanyData[0]['companyShortName']
    ." будут обрабатывать мои персональные данные как неавтоматизированным, так и автоматизированным способом обработки. "."</p> 
<br />
<p class=\"first\">"."Данное Согласие действует до достижения целей обработки моих персональных данных, установленных действующим законодательством Российской Федерации, или в течение 1 года с момента его получения. По истечении указанного срока действие согласия считается продленным на каждый следующий год при отсутствии сведений о его отзыве.

Согласие может быть отозвано субъектом путем направления: 
- письменного обращения субъекта на почтовый адрес или направления скана-образа письма в свободной форме за подписью субъекта персональных данных и содержащего в явном виде отзыв согласия на обработку персональных данных на адрес электронной почты: ".
    $staticData[0]['email'].". <br \>
Я подтверждаю, что, давая такое Согласие, я действую своей волей и в своих интересах. 
"."</p> 
<table></table>
<br />
<p class=\"first\">"."________________________(".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'] .")
           <br \>подпись
"."</p> 
<br />
<p class=\"second\">Форма Согласия субъекта на обработку его персональных данных согласована Сторонами
</p> 
<br />
<p class=\"second\">
<table>
    <tr>
        <td>от Принципала</td><td>от Агента</td>
    </tr>
    <tr>
        <td ></td>
        <td></td>
    </tr>
    <tr>
        <td>________________________/В.Г. Тарасов /</td>
        <td>______________________/ ".$staticData[0]['agentShortName']." /</td>
    </tr>

        <tr>
        <td ></td>
        <td></td>
    </tr>
        <tr>
        <td align='centre'>М.П.</td>
        <td>М.П.</td>
    </tr>
</table>
</p> 
";
$dopSogl->writeData($html );
//$dopSogl->writeData($p5 );

$filename = $dopSogl->getPDF($data);
echo json_encode(array('fileName' => "http://biznesite.ru/registr-ip/download/".$filename));
?>