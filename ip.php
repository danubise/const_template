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
$staticData['SBERBANK'][]="";
$staticData['SBERBANK'][]="";
$staticData['SBERBANK'][]="";
$agentCompanyData['SBERBANK']['companyName']="АО «Деловая среда» ОГРН 1127746271355";
$agentCompanyData['SBERBANK']['companyAddress']="г. Москва, ул. Вавилова, д. 19, ПАО Сбербанк ОГРН 1027700132195";
$agentCompanyData['SBERBANK']['companyShortName']="ПАО Сбербанк";
$agentCompanyData['SBERBANK']['companyName']="АО «Деловая среда»";
$agentCompanyData['SBERBANK']['companyName']="АО «Деловая среда»";


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
    "<br>•   регион проживания - Саратовская область*".
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

<br />
<p class=\"first\">"."Настоящим, соглашаюсь с направлением в мой адрес посредством использования телефонной, факсимильной, подвижной радиотелефонной связи, а также электронной почты информации и рекламных сообщений о разработанных ".$agentCompanyData[$data['openNewAccount']]['companyName']." и ".$agentCompanyData[$data['openNewAccount']]['companyShortName']." продуктах и услугах. "."</p> 
<br />
<p class=\"first\">".$staticData[$data['openNewAccount']]['agentName2']." гарантирует, что обработка моих личных данных 
осуществляется в соответствии с действующим законодательством Российской Федерации."."</p> 
<br />
<p class=\"first\">"."Я проинформирован и даю согласие, что ".$staticData[$data['openNewAccount']]['agentName']
    .", ".$agentCompanyData[$data['openNewAccount']]['companyName']." и ".$agentCompanyData[$data['openNewAccount']]['companyShortName']
    ." будут обрабатывать мои персональные данные как неавтоматизированным, так и автоматизированным способом обработки. "."</p> 
<br />
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
