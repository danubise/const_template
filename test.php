<?php

$url = "https://service.nalog.ru/gp2.do";
$cookie_file_path="cookie.txt";
$url2="https://service.nalog.ru/static/pd.html";
$url1="https://service.nalog.ru/gp-proc.json";

$data['6.2'] = '64';
$data['6.9.2'] = '10';
$data['6.7.1']="ДОМ";
$data['6.7.2']="2";
$data['6.4.1'] = "Г";
$data['6.4.2'] = "САРАТОВ";
$data['6.6.1']= "Ш";
$data['6.6.2']= "МОСКОВСКОЕ";
$data['1.1.1']="Марков";
$data['1.1.2']="Александр";
$data['1.1.3']="Алексеевич";
$data['2']="110112479461";

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
//set the cookie the site has for certain features, this is optional
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
curl_setopt($ch, CURLOPT_USERAGENT,
    "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");

//execute post
$result = curl_exec($ch);
//print_r(  curl_getinfo($ch));


$requestBody1 = "c=gp".
"&token=".
"&sum=".
"&gp=21%7C18210807010011000110%7C13%7Cip%7C800".
"&sum9_docKind1=1".
"&inn=".
"&fam=".
"&nam=".
"&otch=".
"&region=".
"&addrUl=".
"&addrUl_ifns=".
"&addrUl_okatom=".
"&addrFl=".
"&addrFl_ifns=".
"&addrFl_okatom="."&PreventChromeAutocomplete=";
////print_r($jsonData);
//exit();
#step 1

curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: service.nalog.ru',
  'Connection: keep-alive',
  'Content-Length: ' . strlen($requestBody1),
  'Accept: application/json, text/javascript, */*; q=0.01',
  'Origin: https://service.nalog.ru',
  'X-Requested-With: XMLHttpRequest',
  'Content-Type: application/x-www-form-urlencoded',
  'Referer: https://service.nalog.ru/gp2.do',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8'

));
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt( $ch, CURLOPT_POSTFIELDS, $requestBody1 );

//do stuff with the info with DomDocument() etc
$json1 = curl_exec($ch);
//print_r($requestBody1);
//print_r(  curl_getinfo($ch));
$answer1 = (array) json_decode($json1);
/*
Array
(
    [gp] => 21|18210807010011000110|13|ip|800
    [sectionId] => 2
    [taxName] => Государственная пошлина за регистрацию ФЛ в качестве ИП
    [kbk] => 18210807010011000110
    [statusFl] => 13
    [sproKind] => ip
    [sum] => 800
    [sum9_docKind1] => 1
)
*/
//print_r($answer1);
// КЛАДР

$kladrJson = json_encode("[{\"ID\":\"6400000000000\",\"NAME\":\"САРАТОВСКАЯ\",\"ZIP\":\"410000\",\"TYPE\":\"ОБЛАСТЬ\",\"TYPESHORT\":\"ОБЛ\",\"OKATO\":\"63000000000\",\"CONTENTTYPE\":\"REGION\"},{\"ID\":\"6402800000000\",\"NAME\":\"ПУГАЧЕВСКИЙ\",\"ZIP\":413704,\"TYPE\":\"РАЙОН\",\"TYPESHORT\":\"Р-Н\",\"OKATO\":\"63237000000\",\"CONTENTTYPE\":\"DISTRICT\"},{\"ID\":\"6402800001500\",\"NAME\":\"ПУГАЧЕВСКИЙ\",\"ZIP\":413723,\"TYPE\":\"ПОСЕЛЕНИЕ\",\"TYPESHORT\":\"П\",\"OKATO\":\"63237865001\",\"CONTENTTYPE\":\"CITY\"},{\"ID\":\"64028000015000300\",\"NAME\":\"КИРПИЧНАЯ\",\"ZIP\":413723,\"TYPE\":\"УЛИЦА\",\"TYPESHORT\":\"УЛ\",\"OKATO\":\"63237865001\",\"CONTENTTYPE\":\"STREET\"}]
");

$requestBodyKladr = "c=context_search"."&region=1".
"&text=". urlencode("Майкоп ханская мира пер");
"&searchCount=1";
//echo "KLADR REQUEST =================================\n";
if(isset($data['6.9.2'])){
    $kb ="&flatGeonim=".urlencode("КВ").
        "&flat=".urlencode($data['6.9.2']);
}
$addr= "";
if(isset($data['6.4.2'])){
    $addr .= $data['6.4.2'] . " ".$data['6.4.1'].",";
}else{
    $addr .= $data['6.5.2'] . " ".$data['6.5.1'].",";
}
$addr.= $data['6.6.2']." ".$data['6.6.1'];
$requestBodyKladr ="c=complete".
    "&flags=1201".
    "&zip=".
    "&region=".$data['6.2'].
    "&addr=".urlencode($addr).
    "&houseGeonim=".urlencode($data['6.7.1']).
    "&house=".$data['6.7.2'].
    "&buildingGeonim=%D0%9A".
    "&building=".
    $kb.
    "&PreventChromeAutocomplete=";
//print_r($requestBodyKladr);
$urlKladr="https://service.nalog.ru/static/kladr-edit.html";
curl_setopt($ch, CURLOPT_URL, $urlKladr);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: service.nalog.ru',
  'Connection: keep-alive',
  'Content-Length: ' . strlen($requestBodyKladr),
  'Accept: application/json, text/javascript, */*; q=0.01',
  'Origin: https://service.nalog.ru',
  'X-Requested-With: XMLHttpRequest',
  'Content-Type: application/x-www-form-urlencoded',
  'Referer: https://service.nalog.ru/static/kladr2.html?inp=addrFl&aver=3.26.4&sver=4.27.0&pageStyle=NALOG',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8'
));
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt( $ch, CURLOPT_POSTFIELDS, $requestBodyKladr );
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

//do stuff with the info with DomDocument() etc
$json1 = curl_exec($ch);
$information = curl_getinfo($ch);
//print_r($information);
$answerKladr = (array) json_decode($json1);
//print_r($answerKladr);


/*
 * Array
(
    [code] => 6400000100051750005
    [ifns] => 6453
    [okatom] => 63701000
    [text] => 410086,64,,САРАТОВ Г,,МОСКОВСКОЕ Ш,2,,10
    [zip] => 410086
)

 */
//die;

$requestBody2 = "c=payer".
"&token=".
"&sum=".urlencode($answer1['sum']).
"&gp=".urlencode($answer1['gp']).
"&sum9_docKind1=".urlencode($answer1['sum9_docKind1']).
"&inn=".urlencode($data['2']).
"&fam=".urlencode($data['1.1.1']).
"&nam=".urlencode($data['1.1.2']).
"&otch=".urlencode($data['1.1.3']).
"&region=".
"&addrUl=".
"&addrUl_ifns=".
"&addrUl_okatom=".
"&addrFl=".urlencode($answerKladr['text']).
"&addrFl_ifns=".urlencode($answerKladr['ifns']).
"&addrFl_okatom=".urlencode($answerKladr['okatom']).
"&PreventChromeAutocomplete=";
curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $requestBody2 );
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: service.nalog.ru',
  'Connection: keep-alive',
  'Content-Length: ' . strlen($requestBody2),
  'Accept: application/json, text/javascript, */*; q=0.01',
  'Origin: https://service.nalog.ru',
  'X-Requested-With: XMLHttpRequest',
  'Content-Type: application/x-www-form-urlencoded',
  'Referer: https://service.nalog.ru/gp2.do',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8'

));
//do stuff with the info with DomDocument() etc
$json2 = curl_exec($ch);
//print_r(  curl_getinfo($ch));
$answer2 = (array) json_decode($json2);
//print_r($answer2);
//die;


$requestBody3="bank=".
"&inline=1".
"&bank_online_test=false".
"&svc=".
"&token=".$answer2['token'].
"&payKind=1".
"&bankFilter=";
curl_setopt( $ch, CURLOPT_POSTFIELDS, $requestBody3 );
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: service.nalog.ru',
  'Connection: keep-alive',
  'Content-Length: ' . strlen($requestBody3),
  'Origin: https://service.nalog.ru',
  'X-Requested-With: XMLHttpRequest',
  'Content-Type: application/x-www-form-urlencoded',
  'Referer: https://service.nalog.ru/gp2.do',
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8',
  'Cache-Control: max-age=0',
  'Upgrade-Insecure-Requests: 1',
  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
  'Referer: https://service.nalog.ru/static/pd-pay.html?token='.$answer2['token'],
  'Accept-Encoding: gzip, deflate, br',
  'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8'
));
curl_setopt($ch, CURLOPT_URL, $url2);
$path = "/var/www/biznesite/data/www/biznesite.ru/registr-ip/download/";
$filenameNalogPlat = $path.$answer2['token'].".pdf";
$fp = fopen ($filenameNalogPlat, 'w+');
curl_setopt($ch, CURLOPT_FILE, $fp);
$pdf = curl_exec($ch);

//print_r(  curl_getinfo($ch));

//$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
//$header = substr($pdf, 0, $header_size);
////print_r($header);

//$body = substr($pdf, $header_size);
//echo "size == ".strlen($body);
//file_put_contents("test.pdf", $body);
////echo $result;
$err = curl_error($ch);

//print_r($err);
fclose($fp);
curl_close($ch);
?>