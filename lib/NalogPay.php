<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 13.10.18
 * Time: 5:52
 */

class NalogPay{
    private $cookie_file_path="cookie.txt";
    private $urlStep1 = "https://service.nalog.ru/gp2.do";
    private $urlStep2="https://service.nalog.ru/gp-proc.json";
    private $urlStep3="https://service.nalog.ru/static/kladr-edit.html";
    private $urlStep4="https://service.nalog.ru/static/pd.html";
    private $path = "/var/www/biznesite/data/www/biznesite.ru/registr-ip/download/";
    private $urlPersonalData = "https://service.nalog.ru/static/personal-data-proc.json";
    private $answerKladr ="";
    private $answer1 ="";
    //$url = "https://service.nalog.ru/gp2.do";
//$cookie_file_path="cookie.txt";
//$url2="https://service.nalog.ru/static/pd.html";
//$url1="https://service.nalo$path = "/var/www/biznesite/data/www/biznesite.ru/registr-ip/download/";g.ru/gp-proc.json";
//$urlPersonalData = "https://service.nalog.ru/static/personal-data-proc.json";
    private $ch = "";
    private $data = "";
    private $log= "";
    public function __construct($data, $log)
    {
        $this->log = new Log();
        $this->data =$data;
        $this->log = $log;
    }
    public function process(){
        if($this->step1()){
            $this->log->error("Step1 failed");
            return false;
        }
        if($this->step2()){
            $this->log->error("Step2 failed");
            return false;
        }
        if($this->step3()){
            $this->log->error("Step3 failed");
            return false;
        }
        if($this->step4()){
            $this->log->error("Step4 failed");
            return false;
        }
        $filename = $this->step5();
        if(!$filename){
            $this->log->error("Step5 failed");
            return false;
        }else{
            return $filename;
        }
    }
    private function step1(){
        //echo "===== Step 1";
        $this->ch = curl_init();
        curl_setopt($this->ch,CURLOPT_URL, $this->urlStep1);
        curl_setopt($this->ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, $this->cookie_file_path);
        curl_setopt($this->ch, CURLOPT_COOKIEFILE, $this->cookie_file_path);
        curl_setopt($this->ch, CURLOPT_USERAGENT,
            "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
        $result = curl_exec($this->ch);
        //echo "curl info\n";
        $responseHeader = curl_getinfo($this->ch);
       //print_r(  $responseHeader);
        //print_r($result);

        if($responseHeader['http_code'] == 302) {
            //echo "Redirecting to ".$responseHeader['redirect_url']."\n";
            $requestBodyPersonalData= "key=payment&from=%2Fgp2.do&personakData=1";
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
                'Host: service.nalog.ru',
                'Connection: keep-alive',
                'Content-Length: ' . strlen($requestBodyPersonalData),
                'Accept: application/json, text/javascript, */*; q=0.01',
                'Origin: https://service.nalog.ru',
                'X-Requested-With: XMLHttpRequest',
                'Content-Type: application/x-www-form-urlencoded',
                'Referer: https://service.nalog.ru/static/personal-data.html?key=payment&from=%2Fgp2.do',
                'Accept-Encoding: gzip, deflate, br',
                'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8'

            ));
            curl_setopt($this->ch,CURLOPT_URL, $this->urlPersonalData);
            curl_setopt($this->ch, CURLOPT_POST,           1 );
            curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $requestBodyPersonalData );
            $result = curl_exec($this->ch);
            //echo "curl info\n";
            $responseHeader = curl_getinfo($this->ch);
           //print_r(  $responseHeader);
           //print_r($result);
            //echo "Done.\n";
            //echo "Normal url ============\n";
            curl_setopt($this->ch,CURLOPT_URL, $this->urlStep1);
            $result = curl_exec($this->ch);
            //echo "curl info\n";
            $responseHeader = curl_getinfo($this->ch);
           //print_r(  $responseHeader);
            if($responseHeader['http_code'] == 302){
                //echo "Redirect STOP";
                return true;
            }
        }
        //echo "==== Step 1 done =====";

    }
    private function step2(){
        //echo "==== Step 2 =====";

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

        curl_setopt($this->ch, CURLOPT_URL, $this->urlStep2);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
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
        curl_setopt($this->ch, CURLOPT_POST,           1 );
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $requestBody1 );

//do stuff with the info with DomDocument() etc
        $json1 = curl_exec($this->ch);
       //print_r($requestBody1);
        $responseHeader =   curl_getinfo($this->ch);
       //print_r($responseHeader);
        $this->answer1 = (array) json_decode($json1);
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
       //print_r($this->answer1);
// КЛАДР
        //echo "==== Step 2 done =====";

        if($responseHeader['http_code'] == 302){
            //echo "Redirect STOP";
            return true;
        }
    }
    private function step3(){
        //echo "======= STEP3 KLADR REQUEST =================================\n";

        $addr= "";
        if(isset($this->data['6.4.2'])){
            $addr .= $this->data['6.4.2'] . " ".$this->data['6.4.1'].",";
        }else{
            $addr .= $this->data['6.5.2'] . " ".$this->data['6.5.1'].",";
        }
        $addr.= $this->data['6.6.2']." ".$this->data['6.6.1'];
        $requestBodyKladr ="c=complete".
            "&flags=1201".
            "&zip=".
            "&region=".$this->data['6.2'].
            "&addr=".urlencode($addr).
            "&houseGeonim=".urlencode($this->data['6.7.1']).
            "&house=".$this->data['6.7.2'].
            "&buildingGeonim=%D0%9A".
            "&building=".
            "&flatGeonim=".urlencode("КВ").
            "&flat=".urlencode($this->data['6.9.2']).
            "&PreventChromeAutocomplete=";
       //print_r($requestBodyKladr);

        curl_setopt($this->ch, CURLOPT_URL, $this->urlStep3);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
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
        curl_setopt($this->ch, CURLOPT_POST,           1 );
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $requestBodyKladr );
        curl_setopt($this->ch, CURLINFO_HEADER_OUT, true);

//do stuff with the info with DomDocument() etc
        $json1 = curl_exec($this->ch);
        $information = curl_getinfo($this->ch);
       //print_r($information);
        $this->answerKladr = (array) json_decode($json1);
       //print_r($this->answerKladr);
        //echo "======= STEP3 done =================================\n";

        if(isset($this->answerKladr['ERROR'])){
            return true;
        }

    }
    private function step4(){
        $this->log->debug( "============ step 4 ============");
        $requestBody2 = "c=payer".
            "&token=".
            "&sum=".urlencode($this->answer1['sum']).
            "&gp=".urlencode($this->answer1['gp']).
            "&sum9_docKind1=".urlencode($this->answer1['sum9_docKind1']).
            "&inn=".urlencode($this->data['2']).
            "&fam=".urlencode($this->data['1.1.1']).
            "&nam=".urlencode($this->data['1.1.2']).
            "&otch=".urlencode($this->data['1.1.3']).
            "&region=".
            "&addrUl=".
            "&addrUl_ifns=".
            "&addrUl_okatom=".
            "&addrFl=".urlencode($this->answerKladr['text']).
            "&addrFl_ifns=".urlencode($this->answerKladr['ifns']).
            "&addrFl_okatom=".urlencode($this->answerKladr['okatom']).
            "&PreventChromeAutocomplete=";
        //echo $requestBody2;
        curl_setopt($this->ch, CURLOPT_URL, $this->urlStep2);
        curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $requestBody2 );
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
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
        $json2 = curl_exec($this->ch);
        $responseHeader= curl_getinfo($this->ch);
        $this->log->debug($responseHeader);
        $this->answer2 = (array) json_decode($json2);
        $this->log->debug($this->answer2);

        $this->log->debug( "============ step 4 done ============");
        if($responseHeader['http_code'] != 200){
            //echo "Redirect STOP";
            return true;
        }
    }
    private function step5(){
        $this->log->debug("============ step 5 ============");
        $requestBody3="bank=".
            "&inline=1".
            "&bank_online_test=false".
            "&svc=".
            "&token=".$this->answer2['token'].
            "&payKind=1".
            "&bankFilter=";
        curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $requestBody3 );
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
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
            'Referer: https://service.nalog.ru/static/pd-pay.html?token='.$this->answer2['token'],
            'Accept-Encoding: gzip, deflate, br',
            'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8'
        ));
        curl_setopt($this->ch, CURLOPT_URL, $this->urlStep4);

        $filenameNalogPlat = $this->path.$this->answer2['token'].".pdf";
        $fp = fopen ($filenameNalogPlat, 'w+');
        curl_setopt($this->ch, CURLOPT_FILE, $fp);
        $pdf = curl_exec($this->ch);
        $responseHeader= curl_getinfo($this->ch);
        $err = curl_error($this->ch);
        $this->log->debug($err);

        fclose($fp);
        curl_close($this->ch);
        $this->log->debug( "============ step 5 done ============");
        if($responseHeader['http_code'] != 200){
            //echo "Redirect STOP";
            return true;
        }
        return $this->answer2['token'].".pdf";
    }
}