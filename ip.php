<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(0);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once('lib/TCPDF/tcpdf.php');
require_once('lib/IPTemplate.php');
require_once('lib/UPRFormaTemplate.php');
require_once('lib/UPRFormaTemplate.php');
require_once ('lib/log.php');
require_once ('internalconfig.php');
require_once ('./lib/DopSoglashenieTemplate.php');
include_once ('./lib/LinePosition.php');
include_once ('./lib/CharactersPositionDiviation.php');
include_once ('lib/NalogPay.php');

$log = new Log($config);

$log->info("Start IP template");
$log->debug($_SERVER);
$data = array();

foreach ($_POST as $key => $post) {
    $key = str_replace("_", ".", $key);
    $data[$key] = $post;
    if(!is_array($post)){
        $log->debug( "key='".$key."' => '".urldecode($post)."'");

    }else{
        $log->debug("key=".$key);
        $log->debug($post);
    }
    }
$log->debug("============== OKVED ===============");
foreach ($data['page4.2'] as $key=>$value){

    $log->debug( "key='".$key."' => '".$value."'");
}
$data['7.1'] = "21";
$data['1.2.1'] ="";
$data['1.2.2'] ="";
$data['1.2.3'] ="";
$data['telephone'] = changePhoneNumber( trim($data['telephone']));
$data['kladrObj'] = str_replace("NULL" , "\"\"",$data['kladrObj']);
$kladrData = json_decode($data['kladrObj']);
$log->debug($kladrData, "KladrDATA");
if(is_null($kladrData)){
    $log->error("kladrObj is null");
}
foreach ($kladrData as $key => $value) {
  // code...
//  var_dump( $value->TYPE);
  switch($value->CONTENTTYPE){
    case "CITY":
        if($value->TYPE == "ГОРОД") {
            $data['6.4.1'] = $value->TYPESHORT;
            $data['6.4.2'] = $value->NAME;
            $data['6.5.1']="";
            $data['6.5.2']="";
        }else{
            $data['6.4.1'] = "";
            $data['6.4.2'] = "";
            $data['6.5.1']=$value->TYPESHORT;
            $data['6.5.2']=$value->NAME;
        }
    break;
    case "STREET":
      $data['6.6.1']=$value->TYPESHORT;
      $data['6.6.2']=$value->NAME;
    break;
//    case "ДОМ":
//      $data['6.7.1']=$value->TYPESHORT;
//      $data['6.7.2']=$value->NAME;
//    break;
    case "BUILDING":
      $data['6.7.1']=$value->TYPE;
      $data['6.7.2']=$value->NAME;
    break;
  }
}
if(trim($data['6.9.2'])==""){
    $data['6.9.1'] = "";
}
$log->debug('6.4.1 ='.$data['6.4.1']);
$log->debug('6.4.2 ='.$data['6.4.2']);
$log->debug('6.5.1 ='.$data['6.5.1']);
$log->debug('6.5.2 ='.$data['6.5.2']);
$log->debug('6.6.1 ='.$data['6.6.1']);
$log->debug('6.6.2 ='.$data['6.6.2']);
$log->debug('6.7.1 ='.$data['6.7.1']);
$log->debug('6.7.2 ='.$data['6.7.2']);
$log->debug('6.9.1 ='.$data['6.9.1']);
$log->debug('6.9.2 ='.$data['6.9.2']);
$iptemplate = new IPTemplate();
$ownerName="";
if(isset($data['1.1.1'])){
    $ownerName.="_".$data['1.1.1'];
}
if(isset($data['1.1.2'])){
    $ownerName.=$data['1.1.2'];
}
if(isset($data['1.1.3'])){
    $ownerName.=$data['1.1.3'];
}
$filename = "signature".$ownerName;
$hashfilename = md5($filename);
$path = "/var/www/biznesite/data/www/biznesite.ru/registr-ip/download/".$hashfilename;

$ipfilename = $iptemplate->showPDF($data);
$encoded_image = explode(",",str_replace(' ','+', $data['sign']))[1];
$decoded_image = base64_decode($encoded_image);
file_put_contents($path,$decoded_image);


$uprtemplate = new UPRFormaTemplate();
$uprData['INN'] = $data['2'];
$uprData['KPP'] = "";
$uprData['Nalogorgan'] = "";
$uprData['Priznak'] = "1";
$uprData['FIODATA'] = $data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'];

$uprData['PEREHODIT'] = "2";
$uprData['1YANVAR'] = "";
$uprData['2POSTANOVKAMONTH'] = "";
$uprData['2POSTANOVKAYEAR'] = "";
$uprData['OBEKT'] = "1";
$uprData['GODVIDACH'] = date("y");;
$uprData['DOHODI'] = "";
$uprData['1OKTOBER'] = "";
$uprData['COPYLISTCOUNT'] = "";
$uprData['USERTYPE'] = "1";
$uprData['FIODATA2'] = $uprData['FIODATA'];
$uprData['PHONENUMBER'] = $data['telephone'];
$uprData['CURRENTDATEDAY'] = "";//date("d");
$uprData['CURRENTDATEMONTH'] = "";// date("m");
$uprData['CURRENTDATEYEAR'] = "";//date("Y");
$uprData['PERSONALDOCUMENT'] = "";

$uprfilename = $uprtemplate->showPDF($uprData);


$staticData['SBERBANK']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['SBERBANK']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['SBERBANK']['OGRN']="318645100032480";
$staticData['SBERBANK']['agentCity']="г. Саратов";
$staticData['SBERBANK']['email']="aleksander-frolov@yandex.ru";
$staticData['SBERBANK']['agentShortName']="Фролов А.Н.";

$agentCompanyData['SBERBANK']['companyName']="АО «Деловая среда» ОГРН 1127746271355";
$agentCompanyData['SBERBANK']['companyAddress']="г. Москва, ул. Вавилова, д. 19, ПАО Сбербанк ОГРН 1027700132195";
$agentCompanyData['SBERBANK']['companyShortName']="ПАО Сбербанк";
$agentCompanyData['SBERBANK']['companyName']="АО «Деловая среда»";


$staticData['ALFABANK']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['ALFABANK']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['ALFABANK']['OGRN']="318645100032480";
$staticData['ALFABANK']['agentCity']="г. Саратов";
$staticData['ALFABANK']['email']="aleksander-frolov@yandex.ru";
$staticData['ALFABANK']['agentShortName']="Фролов А.Н.";
$agentCompanyData['ALFABANK']['companyName']="АО «АЛЬФА-БАНК» ОГРН 1027700067328";
$agentCompanyData['ALFABANK']['companyAddress']="г. Москва, ул. Каланчевская, д. 27, АО «АЛЬФА-БАНК» ОГРН 1027700067328";
$agentCompanyData['ALFABANK']['companyShortName']="АО «АЛЬФА-БАНК»";
$agentCompanyData['ALFABANK']['companyName']="АО «АЛЬФА-БАНК»";



$staticData['TINKOFF']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['TINKOFF']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['TINKOFF']['OGRN']="318645100032480";
$staticData['TINKOFF']['agentCity']="г. Саратов";
$staticData['TINKOFF']['email']="aleksander-frolov@yandex.ru";
$staticData['TINKOFF']['agentShortName']="Фролов А.Н.";
$agentCompanyData['TINKOFF']['companyName']="АО «Тинькофф Банк» ОГРН 1027739642281";
$agentCompanyData['TINKOFF']['companyAddress']="г. Москва, 1-й Волоколамский проезд, 10, стр. 1, АО «Тинькофф Банк» ОГРН 1027739642281";
$agentCompanyData['TINKOFF']['companyShortName']="АО «Тинькофф Банк»";
$agentCompanyData['TINKOFF']['companyName']="АО «Тинькофф Банк»";

$staticData['TOCHKA']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['TOCHKA']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['TOCHKA']['OGRN']="318645100032480";
$staticData['TOCHKA']['agentCity']="г. Саратов";
$staticData['TOCHKA']['email']="aleksander-frolov@yandex.ru";
$staticData['TOCHKA']['agentShortName']="Фролов А.Н.";

$agentCompanyData['TOCHKA']['companyName']="ПАО Банк «ФК Открытие» ОГРН 1027739019208";
$agentCompanyData['TOCHKA']['companyAddress']="г. Москва, ул. Старокачаловская 1, корпус 2, ПАО Банк «ФК Открытие» ОГРН 1027739019208";
$agentCompanyData['TOCHKA']['companyShortName']="ПАО Банк «ФК Открытие»";
$agentCompanyData['TOCHKA']['companyName']="ПАО Банк «ФК Открытие»";

$staticData['UBRR']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['UBRR']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['UBRR']['OGRN']="318645100032480";
$staticData['UBRR']['agentCity']="г. Саратов";
$staticData['UBRR']['email']="aleksander-frolov@yandex.ru";
$staticData['UBRR']['agentShortName']="Фролов А.Н.";
$agentCompanyData['UBRR']['companyName']="ПАО «Уральский банк реконструкции и развития» ОГРН 1026600000350";
$agentCompanyData['UBRR']['companyAddress']="г. Екатеринбург, ул. Сакко и Ванцетти, д. 67, ПАО «Уральский банк реконструкции и развития» ОГРН 1026600000350";
$agentCompanyData['UBRR']['companyShortName']="ПАО «Уральский банк реконструкции и развития»";
$agentCompanyData['UBRR']['companyName']="ПАО «Уральский банк реконструкции и развития»";


$staticData['PROMSVAZBANK']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['PROMSVAZBANK']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['PROMSVAZBANK']['OGRN']="318645100032480";
$staticData['PROMSVAZBANK']['agentCity']="г. Саратов";
$staticData['PROMSVAZBANK']['email']="aleksander-frolov@yandex.ru";
$staticData['PROMSVAZBANK']['agentShortName']="Фролов А.Н.";

$agentCompanyData['PROMSVAZBANK']['companyName']="ПАО «Промсвязьбанк» ОГРН 1027739019142";
$agentCompanyData['PROMSVAZBANK']['companyAddress']="г. Москва, ул. Смирновская, д. 10, строение 22, ПАО «Промсвязьбанк» ОГРН 1027739019142";
$agentCompanyData['PROMSVAZBANK']['companyShortName']="ПАО «Промсвязьбанк»";
$agentCompanyData['PROMSVAZBANK']['companyName']="ПАО «Промсвязьбанк»";

$staticData['SOVKOMBANK']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['SOVKOMBANK']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['SOVKOMBANK']['OGRN']="318645100032480";
$staticData['SOVKOMBANK']['agentCity']="г. Саратов";
$staticData['SOVKOMBANK']['email']="aleksander-frolov@yandex.ru";
$staticData['SOVKOMBANK']['agentShortName']="Фролов А.Н.";
$agentCompanyData['SOVKOMBANK']['companyName']="ПАО «Совкомбанк» ОГРН 1144400000425";
$agentCompanyData['SOVKOMBANK']['companyAddress']="г. Кострома, пр. Текстильщиков, д. 46, ПАО «Совкомбанк» ОГРН 1144400000425";
$agentCompanyData['SOVKOMBANK']['companyShortName']="ПАО «Совкомбанк»";
$agentCompanyData['SOVKOMBANK']['companyName']="ПАО «Совкомбанк»";

$staticData['VTBBANK']['agentName']="Индивидуальному Предпринимателю Фролову Александру Николаевичу";
$staticData['VTBBANK']['agentName2']="Индивидуальный Предприниматель Фролов Александр Николаевич";
$staticData['VTBBANK']['OGRN']="318645100032480";
$staticData['VTBBANK']['agentCity']="г. Саратов";
$staticData['VTBBANK']['email']="aleksander-frolov@yandex.ru";
$staticData['VTBBANK']['agentShortName']="Фролов А.Н.";
$agentCompanyData['VTBBANK']['companyName']="ПАО Банк ВТБ ОГРН 1027739609391";
$agentCompanyData['VTBBANK']['companyAddress']="г. Санкт-Петербург, ул. Большая Морская, д. 29, ПАО Банк ВТБ ОГРН 1027739609391";
$agentCompanyData['VTBBANK']['companyShortName']="ПАО Банк ВТБ";
$agentCompanyData['VTBBANK']['companyName']="ПАО Банк ВТБ";

$regionData['78'] = "САНКТ-ПЕТЕРБУРГ Г";
$regionData['01'] = "АДЫГЕЯ РЕСП";
$regionData['02'] = "БАШКОРТОСТАН РЕСП";
$regionData['03'] = "БУРЯТИЯ РЕСП";
$regionData['04'] = "АЛТАЙ РЕСП";
$regionData['05'] = "ДАГЕСТАН РЕСП";
$regionData['06'] = "ИНГУШЕТИЯ РЕСП";
$regionData['07'] = "КАБАРДИНО-БАЛКАРСКАЯ РЕСП";
$regionData['08'] = "КАЛМЫКИЯ РЕСП";
$regionData['09'] = "КАРАЧАЕВО-ЧЕРКЕССКАЯ РЕСП";
$regionData['10'] = "КАРЕЛИЯ РЕСП";
$regionData['11'] = "КОМИ РЕСП";
$regionData['12'] = "МАРИЙ ЭЛ РЕСП";
$regionData['13'] = "МОРДОВИЯ РЕСП";
$regionData['14'] = "САХА /ЯКУТИЯ/ РЕСП";
$regionData['15'] = "СЕВЕРНАЯ ОСЕТИЯ - АЛАНИЯ РЕСП";
$regionData['16'] = "ТАТАРСТАН РЕСП";
$regionData['17'] = "ТЫВА РЕСП";
$regionData['18'] = "УДМУРТСКАЯ РЕСП";
$regionData['19'] = "ХАКАСИЯ РЕСП";
$regionData['20'] = "ЧЕЧЕНСКАЯ РЕСП";
$regionData['21'] = "ЧУВАШСКАЯ РЕСПУБЛИКА - ЧУВАШИЯ";
$regionData['22'] = "АЛТАЙСКИЙ КРАЙ";
$regionData['23'] = "КРАСНОДАРСКИЙ КРАЙ";
$regionData['24'] = "КРАСНОЯРСКИЙ КРАЙ";
$regionData['25'] = "ПРИМОРСКИЙ КРАЙ";
$regionData['26'] = "СТАВРОПОЛЬСКИЙ КРАЙ";
$regionData['27'] = "ХАБАРОВСКИЙ КРАЙ";
$regionData['28'] = "АМУРСКАЯ ОБЛ";
$regionData['29'] = "АРХАНГЕЛЬСКАЯ ОБЛ";
$regionData['30'] = "АСТРАХАНСКАЯ ОБЛ";
$regionData['31'] = "БЕЛГОРОДСКАЯ ОБЛ";
$regionData['32'] = "БРЯНСКАЯ ОБЛ";
$regionData['33'] = "ВЛАДИМИРСКАЯ ОБЛ";
$regionData['34'] = "ВОЛГОГРАДСКАЯ ОБЛ";
$regionData['35'] = "ВОЛОГОДСКАЯ ОБЛ";
$regionData['36'] = "ВОРОНЕЖСКАЯ ОБЛ";
$regionData['37'] = "ИВАНОВСКАЯ ОБЛ";
$regionData['38'] = "ИРКУТСКАЯ ОБЛ";
$regionData['39'] = "КАЛИНИНГРАДСКАЯ ОБЛ";
$regionData['40'] = "КАЛУЖСКАЯ ОБЛ";
$regionData['41'] = "КАМЧАТСКИЙ КРАЙ";
$regionData['42'] = "КЕМЕРОВСКАЯ ОБЛ";
$regionData['43'] = "КИРОВСКАЯ ОБЛ";
$regionData['44'] = "КОСТРОМСКАЯ ОБЛ";
$regionData['45'] = "КУРГАНСКАЯ ОБЛ";
$regionData['46'] = "КУРСКАЯ ОБЛ";
$regionData['47'] = "ЛЕНИНГРАДСКАЯ ОБЛ";
$regionData['48'] = "ЛИПЕЦКАЯ ОБЛ";
$regionData['49'] = "МАГАДАНСКАЯ ОБЛ";
$regionData['50'] = "МОСКОВСКАЯ ОБЛ";
$regionData['51'] = "МУРМАНСКАЯ ОБЛ";
$regionData['52'] = "НИЖЕГОРОДСКАЯ ОБЛ";
$regionData['53'] = "НОВГОРОДСКАЯ ОБЛ";
$regionData['54'] = "НОВОСИБИРСКАЯ ОБЛ";
$regionData['55'] = "ОМСКАЯ ОБЛ";
$regionData['56'] = "ОРЕНБУРГСКАЯ ОБЛ";
$regionData['57'] = "ОРЛОВСКАЯ ОБЛ";
$regionData['58'] = "ПЕНЗЕНСКАЯ ОБЛ";
$regionData['59'] = "ПЕРМСКИЙ КРАЙ";
$regionData['60'] = "ПСКОВСКАЯ ОБЛ";
$regionData['61'] = "РОСТОВСКАЯ ОБЛ";
$regionData['62'] = "РЯЗАНСКАЯ ОБЛ";
$regionData['63'] = "САМАРСКАЯ ОБЛ";
$regionData['64'] = "САРАТОВСКАЯ ОБЛ";
$regionData['65'] = "САХАЛИНСКАЯ ОБЛ";
$regionData['66'] = "СВЕРДЛОВСКАЯ ОБЛ";
$regionData['67'] = "СМОЛЕНСКАЯ ОБЛ";
$regionData['68'] = "ТАМБОВСКАЯ ОБЛ";
$regionData['69'] = "ТВЕРСКАЯ ОБЛ";
$regionData['70'] = "ТОМСКАЯ ОБЛ";
$regionData['71'] = "ТУЛЬСКАЯ ОБЛ";
$regionData['72'] = "ТЮМЕНСКАЯ ОБЛ";
$regionData['73'] = "УЛЬЯНОВСКАЯ ОБЛ";
$regionData['74'] = "ЧЕЛЯБИНСКАЯ ОБЛ";
$regionData['75'] = "ЗАБАЙКАЛЬСКИЙ КРАЙ";
$regionData['76'] = "ЯРОСЛАВСКАЯ ОБЛ";
$regionData['77'] = "Г. МОСКВА";
$regionData['79'] = "ЕВРЕЙСКАЯ АОБЛ";
$regionData['83'] = "НЕНЕЦКИЙ АО";
$regionData['86'] = "ХАНТЫ-МАНСИЙСКИЙ АВТОНОМНЫЙ ОКРУГ - ЮГРА АО";
$regionData['87'] = "ЧУКОТСКИЙ АО";
$regionData['89'] = "ЯМАЛО-НЕНЕЦКИЙ АО";
$regionData['91'] = "КРЫМ РЕСП";
$regionData['92'] = "СЕВАСТОПОЛЬ Г";
$regionData['99'] = "БАЙКОНУР Г";
$regionData['00'] = "Центральный аппарат ФНС";
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

<p class=\"first\">Я, ".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'] .", ".$data['4.2'].", паспорт ".$data['7.2'].
    ",  дата выдачи ".$data['7.3.1'].".".$data['7.3.2'].".".$data['7.3.3'].
    " г, выдан ".$data['7.4'].",  настоящим даю свое согласие ". $staticData[$data['openNewAccount']]['agentName']." ОГРН/ОГРНИП ".$staticData[$data['openNewAccount']]['OGRN'].
    ", расположенному по адресу: ".$agentCompanyData[$data['openNewAccount']]['companyName'].", расположенному по адресу: ".$agentCompanyData[$data['openNewAccount']]['companyAddress']."</p>
    

<br />
<p class=\"first\">"."•   ФИО - ".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'].
    "<br>•   регион проживания - ".$regionData[$data['6.2']].
    "<br>•   населенный пункт проживания - ".$data['4.2'].
    "<br>•   контактный телефон - ".$data['telephone'].
    "<br>•   E-mail - ".$data['email']."</p>
<br />
<p class=\"first\">"."Цель обработки персональных данных: для совершения действий по поиску и привлечению\n
покупателей продуктов ".$agentCompanyData[$data['openNewAccount']]['companyShortName'].", для обработки поступившей заявки субъекта персональных\n
данных на приобретение одного из продуктов ".$agentCompanyData[$data['openNewAccount']]['companyShortName']." оператором обработки персональных данных;
 после обработки поступившей заявки субъекта персональных данных направления на рассмотрение специалистов ".$agentCompanyData[$data['openNewAccount']]['companyShortName'].
    " заявки субъекта персональных данных в целях принятия соответствующего решения."."</p> 
<br />
<p class=\"first\">"."Настоящее согласие предоставляется на осуществление любых действий в отношении моих персональных данных, которые необходимы или желаемы для достижения указанных выше целей, включая (без ограничения) сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование, распространение, обезличивание, блокирование, трансграничную передачу персональных данных, а также осуществление любых иных действий с моими персональными данными, предусмотренных действующим законодательством Российской Федерации. "."</p> 

<br />";
if($data['openNewAccount'] == "SBERBANK"){
    $html .= "<p class=\"first\">"."Настоящим, соглашаюсь с направлением в мой адрес посредством использования телефонной, факсимильной, подвижной радиотелефонной связи, а также электронной почты информации и рекламных сообщений о разработанных ".$agentCompanyData[$data['openNewAccount']]['companyName']." и ".$agentCompanyData[$data['openNewAccount']]['companyShortName']." продуктах и услугах.</p>";
}else{
    $html .= "<p class=\"first\">"."Настоящим, соглашаюсь с направлением в мой адрес посредством использования телефонной, факсимильной, подвижной радиотелефонной связи, а также электронной почты информации и рекламных сообщений о разработанных ".$agentCompanyData[$data['openNewAccount']]['companyName']." продуктах и услугах.</p>";
}

$html .= "<br />
<p class=\"first\">".$staticData[$data['openNewAccount']]['agentName2']." гарантирует, что обработка моих личных данных 
осуществляется в соответствии с действующим законодательством Российской Федерации."."</p> 
<br />";

if($data['openNewAccount'] == "SBERBANK"){
    $html .= "<p class=\"first\">Я проинформирован и даю согласие, что ".$staticData[$data['openNewAccount']]['agentName']
    .", ".$agentCompanyData[$data['openNewAccount']]['companyName']." и ".$agentCompanyData[$data['openNewAccount']]['companyShortName']
    ." будут обрабатывать мои персональные данные как неавтоматизированным, так и автоматизированным способом обработки.</p> ";

}else{
    $html .= "<p class=\"first\">Я проинформирован и даю согласие, что ".$staticData[$data['openNewAccount']]['agentName']
        .", ".$agentCompanyData[$data['openNewAccount']]['companyName'].
        " будут обрабатывать мои персональные данные как неавтоматизированным, так и автоматизированным способом обработки.</p> ";
}

$html .= "<br />
<p class=\"first\">"."Данное Согласие действует до достижения целей обработки моих персональных данных, установленных действующим законодательством Российской Федерации, или в течение 1 года с момента его получения. По истечении указанного срока действие согласия считается продленным на каждый следующий год при отсутствии сведений о его отзыве.

Согласие может быть отозвано субъектом путем направления: 
- письменного обращения субъекта на почтовый адрес или направления скана-образа письма в свободной форме за подписью субъекта персональных данных и содержащего в явном виде отзыв согласия на обработку персональных данных на адрес электронной почты: ".
    $staticData[$data['openNewAccount']]['email'].". <br \>
Я подтверждаю, что, давая такое Согласие, я действую своей волей и в своих интересах. 
"."</p> 
<table></table>
<table>
    <tr>    
        <td>
<img src=\"".$path."\" width=\"auto\" height=\"60\" border=\"0\"> <p class=\"first\">"."________________________(".$data['1.1.1']." " .$data['1.1.2']." ".$data['1.1.3'] .")
                       <br \>Подпись
            "."</p> 
        </td>
    </tr>
</table>
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
        <td>______________________/ ".$staticData[$data['openNewAccount']]['agentShortName']." /</td>
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

$dopfilename = $dopSogl->getPDF($data);
if(is_array($kladrData)){
    $np = new NalogPay($data, $log);
    $filenameNalogPlat = $np->process();
}else{
    $filenameNalogPlat = false;
}
if($filenameNalogPlat){
    $urlNalogPlat = "http://biznesite.ru/registr-ip/download/".$filenameNalogPlat;
}else{
    $urlNalogPlat = "https://service.nalog.ru/gp2.do";
}
$log->debug($filenameNalogPlat);

$files =json_encode(array(
    array(
    'title'=>"Форма регистрации ИП - Р21001",
    'fileName' => "Регистрация ИП",
    'filePath' => "http://biznesite.ru/registr-ip/download/".$ipfilename),
    array(
    'title'=>"Форма для перехода на упрощенную систему налогообложения",
    'fileName' => "Форма упрощенки",
    'filePath' => "http://biznesite.ru/registr-ip/download/".$uprfilename
    ),
    array(
    'title'=>"Платежный документ для уплаты госпошлины",
    'fileName' => "Платежный документ",
    'filePath' => $urlNalogPlat
    ),
    array(
    'title'=>"Дополнительное соглашение",
    'fileName' => "Дополнительное соглашение",
    'filePath' => "http://biznesite.ru/registr-ip/download/".$dopfilename
    ),
    array(
    'title'=>"Пошаговая инструкция по регистрации ИП",
    'fileName' => "Форма упрощенки",
    'filePath' => "http://biznesite.ru/registr-ip/download/instruct.pdf"
    )

));
$log->debug($files);
echo $files;

function changePhoneNumber($phone){
    //+01234567890
    //+79878130899
    $newPhone = "";
    if($phone[0] != "7" && $phone[0] <= "8" && $phone[1] < "9"){
        return $phone;
    }
    if($phone[0] == "7"){
	$phone="+".$phone;
    }

    if($phone[0] == "8" && $phone[1] == "9"){
        $phone[0] ="7";
        $phone = "+".$phone;
    }

    for ($i=0; $i< strlen($phone) ; $i++){
        if($i== 2){
            $newPhone .= "(";
        }elseif ($i == 5){
            $newPhone .=  ")";
        }
        $newPhone = $newPhone . $phone[$i];
    }
    return $newPhone;
}
