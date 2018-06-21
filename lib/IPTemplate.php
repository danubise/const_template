<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 20.06.18
 * Time: 17:39
 */

class IPTemplate
{
    private $linePosition = array();
    private $pdf = null;
    private $cpd = null;
    private $cellWigth = 4.956;
    function  __construct()
    {
        $this->setLinePosition(1,"1.1.1",33.5,59.5, 37);
        $this->setLinePosition(1,"1.1.2",34,69.5, 34);
        $this->setLinePosition(1,"1.1.3",34,79.5, 34);

        $this->setLinePosition(1,"1.2.1",34,99.3, 34);
        $this->setLinePosition(1,"1.2.2",34,109.2, 34);
        $this->setLinePosition(1,"1.2.3",34,119.2, 34);

        $this->setLinePosition(1,"2",54.5,130.2, 12);

        $this->setLinePosition(1,"3",30,142.4, 1);

        $this->setLinePosition(1,"4.1.1",42,163, 2);
        $this->setLinePosition(1,"4.1.2",57,163, 2);
        $this->setLinePosition(1,"4.1.3",72,163, 4);
        $this->setLinePosition(1,"4.2,1",5.7,178.4, 40);
        $this->setLinePosition(1,"4.2,2",5.5,186.8, 40);

        $this->setLinePosition(1,"5",40.5,207.7, 1);
        $this->setLinePosition(1,"5,1",103,223.3, 3);


        $this->setLinePosition(2,"6,1",45,47, 6);
        $this->setLinePosition(2,"6,2",144,47, 2);
        $this->setLinePosition(2,"6,3,1",5.3,63, 10);
        $this->setLinePosition(2,"6,3,2",64.5,63, 28);
        $this->setLinePosition(2,"6,3,3",5.3,72.7, 40);

        $this->setLinePosition(2,"6,4,1",5.3,87.5, 10);
        $this->setLinePosition(2,"6,4,2",64.5,87.5, 28);

        $this->setLinePosition(2,"6,5,1",5.3,102.1, 10);
        $this->setLinePosition(2,"6,5,2",64.5,102.1, 28);
        $this->setLinePosition(2,"6,5,3",5.3,111.8, 40);

        $this->setLinePosition(2,"6,6,1",5.3,126.2, 10);
        $this->setLinePosition(2,"6,6,2",65,126.2, 28);
        $this->setLinePosition(2,"6,6,3",5.3,136, 40);

        $this->setLinePosition(2,"6,7,1",5.3,150, 10);
        $this->setLinePosition(2,"6,7,2",60.5,150, 8);

        $this->setLinePosition(2,"6,8,1",108.5,150, 10);
        $this->setLinePosition(2,"6,8,2",163.7,150, 8);

        $this->setLinePosition(2,"6,9,1",60.5,160, 8);
        $this->setLinePosition(2,"6,9,2",163.7,160, 8);

        $this->setLinePosition(2,"7,1",40.5,184.3, 2);

        $this->setLinePosition(2,"7,2",56,199, 25);

        $this->setLinePosition(2,"7,3,1",35.3,209.1, 2);
        $this->setLinePosition(2,"7,3,2",50,209.1, 2);
        $this->setLinePosition(2,"7,3,3",65,209.1, 4);

        $this->setLinePosition(2,"7,4,1",34.8,220, 34);
        $this->setLinePosition(2,"7,4,2",5.2,230, 40);
        $this->setLinePosition(2,"7,4,3",5.2,240, 40);

        $this->setLinePosition(2,"7,5,1",44.8,251.5, 3);
        $this->setLinePosition(2,"7,5,2",64.5,251.5, 3);







        $this->cpd = new CharactersPositionDiviation();
    }

    function setLinePosition($page, $lineId,$x,$y, $maxCharCount = 50){
        $this->linePosition[$page][$lineId] = new LinePosition($x, $y, $maxCharCount);
    }

    public function showPDF($data){
        $this->createPDF();
        $this->writeDataToPage($data);
        $this->pdf->Output('example_001.pdf', 'I');

    }

    private function writeDataToPage($data){
        for($p=1 ; $p<=1; $p++) {
            $this->pdf->AddPage();

            $this->pdf->Image("images/IP_0".$p.".jpg", 0, 0, 210, 297, 'JPG', null, '', true, 300, '', false, false, 1, false, false, false);
            foreach ($data as $lineid => $text) {
                if (isset($this->linePosition[$p][$lineid]) ) {
                    $this->printLines( $this->linePosition[$p][$lineid], $text);
                }
            }
        }

    }
    private function printLines($linePosition , $text){
        $array = $this->mb_str_split($text);

        for($i=0; $i < sizeof($array); $i++){
            $this->pdf->SetXY($linePosition->x + $i * $this->cellWigth + $this->cpd->get($array[$i]), $linePosition->y);
            $this->pdf->Write(10, $array[$i]);

            if($i >= $linePosition->maxCharCount){
                break;
            }
        }

    }

    private function mb_str_split($string){
        return preg_split('/(?<!^)(?!$)/u',$string);

    }
    private function createPDF(){
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('Nicola Asuni');
        $this->pdf->SetTitle('TCPDF Example 001');
        $this->pdf->SetSubject('TCPDF Tutorial');
        $this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $this->pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
        $this->pdf->SetMargins(10, 20, 0, true);
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