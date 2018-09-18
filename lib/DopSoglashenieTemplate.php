<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 17.09.18
 * Time: 12:54
 */

class DopSoglashenieTemplate{
    private $pdf = null;
    public function showPDF($data){
        $this->createPDF();
        $this->writeDataToPage($data);
        $this->pdf->Output('dopsoglashenie.pdf', 'I');

    }
    private function createPDF(){
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('Konstanta');
        $this->pdf->SetTitle('ДОП. СОГЛАШЕНИЕ для Агентов');
        $this->pdf->SetSubject('Согласие субъекта на обработку его персональных данных');
        $this->pdf->SetKeywords('Согласие субъекта на обработку его персональных данных');

        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $this->pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
        $this->pdf->SetMargins(10,20,0,true);
        $this->pdf->setFontSubsetting(true);

        $this->pdf->SetFont('couriercyrillic_12144', '', 18, '', true);
        $this->pdf->AddPage();


    }
    private function writeDataToPage($data){
        //$this->pdf->
        $this->pdf->writeHTML($data, true, false, true, false, '');


    }
}