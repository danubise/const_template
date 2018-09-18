<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 20.06.18
 * Time: 17:39
 */

class UPRFormaTemplate
{
    private $linePosition = array();
    private $pdf = null;
    private $cpd = null;
    private $cellWigth = 4.956;
    private $pageNumber = 0;
    function  __construct()
    {
        $this->setLinePosition(1,"INN",0, 64.5,3.5, 12);
        $this->setLinePosition(1,"KPP",0, 64,12.5, 9);
        $this->setLinePosition(1,"Nalogorgan",0, 70,35.5, 4);
        $this->setLinePosition(1,"Priznak",0, 159,35.5, 1);
        $this->setLinePosition(1,"FIODATA",0, 5.5,51.5, 40);
        $this->setLinePosition(1,"FIODATA",1, 5.5,60, 40);
        $this->setLinePosition(1,"FIODATA",2, 5.5,68.5, 40);
        $this->setLinePosition(1,"FIODATA",3, 5.5,76.5, 40);
        $this->setLinePosition(1,"PEREHODIT",0, 89,89, 1);
        $this->setLinePosition(1,"1YANVAR",0, 48,97.5, 2);
        $this->setLinePosition(1,"2POSTANOVKAYEAR",0, 186,97.5, 2);
        $this->setLinePosition(1,"OBEKT",0, 78.5,108, 1);
        $this->setLinePosition(1,"2POSTANOVKAMONTH",0, 161,97.5, 2);

        $this->setLinePosition(1,"GODVIDACH",0, 138.5,121, 2);
        $this->setLinePosition(1,"DOHODI",0, 105.5,130.5, 9);
        $this->setLinePosition(1,"1OKTOBER",0, 145.5,140.5, 9);
        $this->setLinePosition(1,"COPYLISTCOUNT",0, 125.8,150, 3);
        //                                                                                                                                                                                 vcccccc
        $this->setLinePosition(1,"USERTYPE",0, 23.8,162, 1);
        $this->setLinePosition(1,"FIODATA2",0, 5.8,170, 20);
        $this->setLinePosition(1,"FIODATA2",1, 5.8,178, 20);
        $this->setLinePosition(1,"FIODATA2",2, 5.8,186, 20 );
        $this->setLinePosition(1,"PHONENUMBER",0, 5.8,208, 20 );
        $this->setLinePosition(1,"CURRENTDATEDAY",0, 55,217, 2 );
        $this->setLinePosition(1,"CURRENTDATEMONTH",0, 70,217, 2 );
        $this->setLinePosition(1,"CURRENTDATEYEAR",0, 85,217, 4 );
        $this->setLinePosition(1,"PERSONALDOCUMENT",0, 5.8,235, 20 );
        $this->setLinePosition(1,"PERSONALDOCUMENT",1, 5.8,243.5, 20 );

        $this->cpd = new CharactersPositionDiviation();
    }

    function setLinePosition($page, $lineId, $index, $x, $y, $maxCharCount = 50){
        $this->linePosition[$page][$lineId][$index] = new LinePosition($x, $y, $maxCharCount);

    }

    public function showPDF($data){
        $this->createPDF();
        $this->writeDataToPage($data);
        $this->pdf->Output('example_001.pdf', 'I');

    }

    private function writeDataToPage($data){
        for($page=1 ; $page<=5; $page++) {
            switch($page){
                case 1:
                    $this->pagesFromOnetoThree($page, $data);
                    break;
            }
        }

    }

    private function addNewPage($page){
        $this->pageNumber++;
        $this->pdf->AddPage();
        $this->pdf->Image("images/UPR_0".$page.".jpg", 0, 0, 210, 297, 'JPG', null, '', true, 300, '', false, false, 1, false, false, false);
    }
    private function pagesFromOnetoThree($page, $data){
        $this->addNewPage($page);
        foreach ($data as $lineid => $text) {
            if (isset($this->linePosition[$page][$lineid]) ) {
                $textArray = $this->mb_str_split($text);
                $this->printLines($page, $lineid, $textArray);
            }
        }
    }
    private function printLines($page , $lineid , $textArray){
        $inlineStartPosition = 0;
        foreach ($this->linePosition[$page][$lineid] as $index => $linePosition){

            $inlineStartPosition = $this->printOneLine( $linePosition , $textArray, $inlineStartPosition  );
            if($inlineStartPosition == -1 ){
                break;
            }
        }
        return $inlineStartPosition;
    }

    private function printOneLine($linePosition , $textArray, $inlineStartPosition){

        $stringLength =  sizeof($textArray) - $inlineStartPosition;
        for($i=0; $i < $stringLength; $i++){
            $symbol = $textArray[$i + $inlineStartPosition];
            $this->pdf->SetXY($linePosition->x + $i * $this->cellWigth + $this->cpd->get($symbol), $linePosition->y);
            $this->pdf->Write(10, $symbol);

            if($i >= $linePosition->maxCharCount){
                return $i + 1 + $inlineStartPosition;
            }
        }
        return -1;
    }

    private function mb_str_split($string){
        return preg_split('/(?<!^)(?!$)/u',$string);

    }
    private function createPDF(){
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('KonstantaPLUS');
        $this->pdf->SetTitle('Уведомление о переходе на упрощенную систему налогообложения');
        $this->pdf->SetSubject('Форма 26.2-1');
        $this->pdf->SetKeywords('Форма 26.2-1');

        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $this->pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
        $this->pdf->SetMargins(10,20,0,true);
        $this->pdf->setFontSubsetting(true);

        $this->pdf->SetFont('couriercyrillic_12144', '', 18, '', true);

    }

}

class LinePosition{
    public $x =0;
    public $y =0;
    public $maxCharCount =0;

    public function __construct($x,$y, $maxCharCount)
    {
        $this->maxCharCount = $maxCharCount - 1 ;
        $this->x = $x;
        $this->y = $y;

    }
}

class CharactersPositionDiviation{
    private $CharacterBase = array();
    public function get($character){
        if(isset($this->CharacterBase[$character])){
            return $this->CharacterBase[$character];
        }
        return 0;
    }
    public function __construct()
    {
        $this->CharacterBase['А'] = 0;
        $this->CharacterBase['У'] = 0.3;
        $this->CharacterBase['Д'] = 0.3;
        $this->CharacterBase['Ж'] = 0.5;

    }

}