<?php
setlocale(LC_CTYPE, 'POSIX');
error_reporting(0);
#error_reporting(E_ALL);
#ini_set('display_errors', 1);

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
include_once ('admin/internal_config.php');
include_once ('admin/core/mysqli.php');
$db = new db($_config['mysql']);


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
$dopSoglAddressRegistracii ="";
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
            $dopSoglAddressRegistracii = $data['6.4.1']. " " .$data['6.4.2'];
        }else{
            $data['6.4.1'] = "";
            $data['6.4.2'] = "";
            $data['6.5.1']=$value->TYPESHORT;
            $data['6.5.2']=$value->NAME;
            $dopSoglAddressRegistracii = $data['6.5.1']. " " .$data['6.5.2'];
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

$dopSogl = new DopSoglashenieTemplate();

$data['dopSoglAddressRegistracii'] = $dopSoglAddressRegistracii;
$data['signPath'] = $path;
//$dopSogl->writeData($html );

$dopfilename = $dopSogl->getPDF($data);
if(is_array($kladrData)){
    $np = new NalogPay($data, $log);
    $filenameNalogPlat = $np->process();
    $data['addressText'] =$np->getTextAddress();
}else{
    $filenameNalogPlat = false;
    $data['addressText'] = "";
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
unset($data['alfabank']);
$data['kladrObj'] = base64_encode($data['kladrObj']);
$db->set_charset("utf8");
$data['Date'] = date("Y-m-d");
$data['dopFileURL'] =  "http://biznesite.ru/registr-ip/download/".$dopfilename;
$data['ipFileURL'] =  "http://biznesite.ru/registr-ip/download/".$ipfilename;
$data['nalogFileURL'] =  $urlNalogPlat;
$data['uprFileURL'] = "http://biznesite.ru/registr-ip/download/".$uprfilename;

$inserID = $db->insert("documents", $data);
$log->debug($inserID);
$log->debug($db->query->last);

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
