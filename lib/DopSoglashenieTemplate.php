<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 17.09.18
 * Time: 12:54
 */

class DopSoglashenieTemplate{
    private $pdf = null;

    /**
     * DopSoglashenieTemplate constructor.
     * @param null $pdf
     */
    public function __construct()
    {
        $this->createPDF();
    }

    public function writeData($data){
        $this->pdf->writeHTML($data, true, false, true, false, '');

    }
    public function getPDF($data){
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
        $filename = "ДОПОЛНИТЕЛЬНОЕ_СОГЛАШЕНИЕ".$ownerName;
        $hashfilename = md5($filename);
        $path = "/var/www/biznesite/data/www/biznesite.ru/registr-ip/download/";
        $this->pdf->Output($path.$hashfilename.".pdf", 'F');
        return $hashfilename.".pdf";

    }

    private function createPDF(){
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('Konstanta');
        $this->pdf->SetTitle('ДОП. СОГЛАШЕНИЕ для Агентов');
        $this->pdf->SetSubject('Согласие субъекта на обработку его персональных данных');
        $this->pdf->SetKeywords('Согласие субъекта на обработку его персональных данных');

        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $this->pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $this->pdf->SetMargins(10,10,10,true);
        $this->pdf->setFontSubsetting(true);
        $this->pdf->setPrintFooter(false);
        $this->pdf->setPrintHeader(false);
        //$this->pdf->SetFont('couriercyrillic_12144', '', 18, '', true);

        $this->pdf->AddPage();


    }

}