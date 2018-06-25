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
        $this->setLinePosition(1,"1.1.1",33.5,59.5, 34);
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
        $this->setLinePosition(1,"4.2.1",5.7,178.4, 40);
        $this->setLinePosition(1,"4.2.2",5.5,186.8, 40);

        $this->setLinePosition(1,"5",40.5,207.7, 1);
        $this->setLinePosition(1,"5.1",103,223.3, 3);




        $this->setLinePosition(2,"6.1",45,47, 6);
        $this->setLinePosition(2,"6.2",144,47, 2);
        $this->setLinePosition(2,"6.3.1",5.3,63, 10);
        $this->setLinePosition(2,"6.3.2",64.5,63, 28);
        $this->setLinePosition(2,"6.3.3",5.3,72.7, 40);

        $this->setLinePosition(2,"6.4.1",5.3,87.5, 10);
        $this->setLinePosition(2,"6.4.2",64.5,87.5, 28);

        $this->setLinePosition(2,"6.5.1",5.3,102.1, 10);
        $this->setLinePosition(2,"6.5.2",64.5,102.1, 28);
        $this->setLinePosition(2,"6.5.3",5.3,111.8, 40);

        $this->setLinePosition(2,"6.6.1",5.3,126.2, 10);
        $this->setLinePosition(2,"6.6.2",65,126.2, 28);
        $this->setLinePosition(2,"6.6.3",5.3,136, 40);

        $this->setLinePosition(2,"6.7.1",5.3,150, 10);
        $this->setLinePosition(2,"6.7.2",60.5,150, 8);

        $this->setLinePosition(2,"6.8.1",108.5,150, 10);
        $this->setLinePosition(2,"6.8.2",163.7,150, 8);

        $this->setLinePosition(2,"6.9.1",60.5,160, 8);
        $this->setLinePosition(2,"6.9.2",163.7,160, 8);

        $this->setLinePosition(2,"7.1",40.5,184.3, 2);

        $this->setLinePosition(2,"7.2",56,199, 25);

        $this->setLinePosition(2,"7.3.1",35.3,209.1, 2);
        $this->setLinePosition(2,"7.3.2",50,209.1, 2);
        $this->setLinePosition(2,"7.3.3",65,209.1, 4);

        $this->setLinePosition(2,"7.4.1",34.8,220, 34);
        $this->setLinePosition(2,"7.4.2",5.2,230, 40);
        $this->setLinePosition(2,"7.4.3",5.2,240, 40);

        $this->setLinePosition(2,"7.5.1",44.8,251.5, 3);
        $this->setLinePosition(2,"7.5.2",64.5,251.5, 3);




        $this->setLinePosition(3,"8.1",20.3,58, 1);

        $this->setLinePosition(3,"8.2",46,70.7, 25);

        $this->setLinePosition(3,"8.3.1",36,83.7, 2);
        $this->setLinePosition(3,"8.3.2",51,83.7, 2);
        $this->setLinePosition(3,"8.3.3",65.7,83.7, 4);

        $this->setLinePosition(3,"8.4.1",35.5,95, 34);
        $this->setLinePosition(3,"8.4.2",6.2,104.2, 40);
        $this->setLinePosition(3,"8.4.3",6.2,113.5, 40);

        $this->setLinePosition(3,"8.5.1",41.3,126.8, 2);
        $this->setLinePosition(3,"8.5.2",56,126.8, 2);
        $this->setLinePosition(3,"8.5.3",71,126.8, 4);




        $this->setLinePosition(4,"pagenamber4",118.2,12.2, 3);

        $this->setLinePosition(4,"page4.1",77,61.5, 2);
        $this->setLinePosition(4,"page4.2",92,61.5, 2);
        $this->setLinePosition(4,"page4.3",107,61.5, 2);


        $this->setLinePosition(4,"page4.2.1.1.1",7.5,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.1.2",22.5,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.1.3",37.5,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.2.1",59,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.2.2",74,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.2.3",89,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.3.1",110.5,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.3.2",125.5,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.3.3",140.5,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.4.1",162,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.4.2",177,83.5, 2);
        $this->setLinePosition(4,"page4.2.1.4.3",192,83.5, 2);

        $this->setLinePosition(4,"page4.2.2.1.1",7.5,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.1.2",22.5,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.1.3",37.5,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.2.1",59,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.2.2",74,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.2.3",89,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.3.1",110.5,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.3.2",125.5,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.3.3",140.5,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.4.1",162,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.4.2",177,96.3, 2);
        $this->setLinePosition(4,"page4.2.2.4.3",192,96.3, 2);

        $this->setLinePosition(4,"page4.2.3.1.1",7.5,109, 2);
        $this->setLinePosition(4,"page4.2.3.1.2",22.5,109, 2);
        $this->setLinePosition(4,"page4.2.3.1.3",37.5,109, 2);
        $this->setLinePosition(4,"page4.2.3.2.1",59,109, 2);
        $this->setLinePosition(4,"page4.2.3.2.2",74,109, 2);
        $this->setLinePosition(4,"page4.2.3.2.3",89,109, 2);
        $this->setLinePosition(4,"page4.2.3.3.1",110.5,109, 2);
        $this->setLinePosition(4,"page4.2.3.3.2",125.5,109, 2);
        $this->setLinePosition(4,"page4.2.3.3.3",140.5,109, 2);
        $this->setLinePosition(4,"page4.2.3.4.1",162,109, 2);
        $this->setLinePosition(4,"page4.2.3.4.2",177,109, 2);
        $this->setLinePosition(4,"page4.2.3.4.3",192,109, 2);

        $this->setLinePosition(4,"page4.2.4.1.1",7.5,122, 2);
        $this->setLinePosition(4,"page4.2.4.1.2",22.5,122, 2);
        $this->setLinePosition(4,"page4.2.4.1.3",37.5,122, 2);
        $this->setLinePosition(4,"page4.2.4.2.1",59,122, 2);
        $this->setLinePosition(4,"page4.2.4.2.2",74,122, 2);
        $this->setLinePosition(4,"page4.2.4.2.3",89,122, 2);
        $this->setLinePosition(4,"page4.2.4.3.1",110.5,122, 2);
        $this->setLinePosition(4,"page4.2.4.3.2",125.5,122, 2);
        $this->setLinePosition(4,"page4.2.4.3.3",140.5,122, 2);
        $this->setLinePosition(4,"page4.2.4.4.1",162,122, 2);
        $this->setLinePosition(4,"page4.2.4.4.2",177,122, 2);
        $this->setLinePosition(4,"page4.2.4.4.3",192,122, 2);

        $this->setLinePosition(4,"page4.2.5.1.1",7.5,135, 2);
        $this->setLinePosition(4,"page4.2.5.1.2",22.5,135, 2);
        $this->setLinePosition(4,"page4.2.5.1.3",37.5,135, 2);
        $this->setLinePosition(4,"page4.2.5.2.1",59,135, 2);
        $this->setLinePosition(4,"page4.2.5.2.2",74,135, 2);
        $this->setLinePosition(4,"page4.2.5.2.3",89,135, 2);
        $this->setLinePosition(4,"page4.2.5.3.1",110.5,135, 2);
        $this->setLinePosition(4,"page4.2.5.3.2",125.5,135, 2);
        $this->setLinePosition(4,"page4.2.5.3.3",140.5,135, 2);
        $this->setLinePosition(4,"page4.2.5.4.1",162,135, 2);
        $this->setLinePosition(4,"page4.2.5.4.2",177,135, 2);
        $this->setLinePosition(4,"page4.2.5.4.3",192,135, 2);

        $this->setLinePosition(4,"page4.2.6.1.1",7.5,147, 2);
        $this->setLinePosition(4,"page4.2.6.1.2",22.5,147, 2);
        $this->setLinePosition(4,"page4.2.6.1.3",37.5,147, 2);
        $this->setLinePosition(4,"page4.2.6.2.1",59,147, 2);
        $this->setLinePosition(4,"page4.2.6.2.2",74,147, 2);
        $this->setLinePosition(4,"page4.2.6.2.3",89,147, 2);
        $this->setLinePosition(4,"page4.2.6.3.1",110.5,147, 2);
        $this->setLinePosition(4,"page4.2.6.3.2",125.5,147, 2);
        $this->setLinePosition(4,"page4.2.6.3.3",140.5,147, 2);
        $this->setLinePosition(4,"page4.2.6.4.1",162,147, 2);
        $this->setLinePosition(4,"page4.2.6.4.2",177,147, 2);
        $this->setLinePosition(4,"page4.2.6.4.3",192,147, 2);

        $this->setLinePosition(4,"page4.2.7.1.1",7.5,160, 2);
        $this->setLinePosition(4,"page4.2.7.1.2",22.5,160, 2);
        $this->setLinePosition(4,"page4.2.7.1.3",37.5,160, 2);
        $this->setLinePosition(4,"page4.2.7.2.1",59,160, 2);
        $this->setLinePosition(4,"page4.2.7.2.2",74,160, 2);
        $this->setLinePosition(4,"page4.2.7.2.3",89,160, 2);
        $this->setLinePosition(4,"page4.2.7.3.1",110.5,160, 2);
        $this->setLinePosition(4,"page4.2.7.3.2",125.5,160, 2);
        $this->setLinePosition(4,"page4.2.7.3.3",140.5,160, 2);
        $this->setLinePosition(4,"page4.2.7.4.1",162,160, 2);
        $this->setLinePosition(4,"page4.2.7.4.2",177,160, 2);
        $this->setLinePosition(4,"page4.2.7.4.3",192,160, 2);

        $this->setLinePosition(4,"page4.2.8.1.1",7.5,173, 2);
        $this->setLinePosition(4,"page4.2.8.1.2",22.5,173, 2);
        $this->setLinePosition(4,"page4.2.8.1.3",37.5,173, 2);
        $this->setLinePosition(4,"page4.2.8.2.1",59,173, 2);
        $this->setLinePosition(4,"page4.2.8.2.2",74,173, 2);
        $this->setLinePosition(4,"page4.2.8.2.3",89,173, 2);
        $this->setLinePosition(4,"page4.2.8.3.1",110.5,173, 2);
        $this->setLinePosition(4,"page4.2.8.3.2",125.5,173, 2);
        $this->setLinePosition(4,"page4.2.8.3.3",140.5,173, 2);
        $this->setLinePosition(4,"page4.2.8.4.1",162,173, 2);
        $this->setLinePosition(4,"page4.2.8.4.2",177,173, 2);
        $this->setLinePosition(4,"page4.2.8.4.3",192,173, 2);

        $this->setLinePosition(4,"page4.2.9.1.1",7.5,186, 2);
        $this->setLinePosition(4,"page4.2.9.1.2",22.5,186, 2);
        $this->setLinePosition(4,"page4.2.9.1.3",37.5,186, 2);
        $this->setLinePosition(4,"page4.2.9.2.1",59,186, 2);
        $this->setLinePosition(4,"page4.2.9.2.2",74,186, 2);
        $this->setLinePosition(4,"page4.2.9.2.3",89,186, 2);
        $this->setLinePosition(4,"page4.2.9.3.1",110.5,186, 2);
        $this->setLinePosition(4,"page4.2.9.3.2",125.5,186, 2);
        $this->setLinePosition(4,"page4.2.9.3.3",140.5,186, 2);
        $this->setLinePosition(4,"page4.2.9.4.1",162,186, 2);
        $this->setLinePosition(4,"page4.2.9.4.2",177,186, 2);
        $this->setLinePosition(4,"page4.2.9.4.3",192,186, 2);

        $this->setLinePosition(4,"page4.2.10.1.1",7.5,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.1.2",22.5,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.1.3",37.5,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.2.1",59,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.2.2",74,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.2.3",89,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.3.1",110.5,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.3.2",125.5,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.3.3",140.5,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.4.1",162,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.4.2",177,198.5, 2);
        $this->setLinePosition(4,"page4.2.10.4.3",192,198.5, 2);

        $this->setLinePosition(4,"page4.2.11.1.1",7.5,211, 2);
        $this->setLinePosition(4,"page4.2.11.1.2",22.5,211, 2);
        $this->setLinePosition(4,"page4.2.11.1.3",37.5,211, 2);
        $this->setLinePosition(4,"page4.2.11.2.1",59,211, 2);
        $this->setLinePosition(4,"page4.2.11.2.2",74,211, 2);
        $this->setLinePosition(4,"page4.2.11.2.3",89,211, 2);
        $this->setLinePosition(4,"page4.2.11.3.1",110.5,211, 2);
        $this->setLinePosition(4,"page4.2.11.3.2",125.5,211, 2);
        $this->setLinePosition(4,"page4.2.11.3.3",140.5,211, 2);
        $this->setLinePosition(4,"page4.2.11.4.1",162,211, 2);
        $this->setLinePosition(4,"page4.2.11.4.2",177,211, 2);
        $this->setLinePosition(4,"page4.2.11.4.3",192,211, 2);

        $this->setLinePosition(4,"page4.2.12.1.1",7.5,224, 2);
        $this->setLinePosition(4,"page4.2.12.1.2",22.5,224, 2);
        $this->setLinePosition(4,"page4.2.12.1.3",37.5,224, 2);
        $this->setLinePosition(4,"page4.2.12.2.1",59,224, 2);
        $this->setLinePosition(4,"page4.2.12.2.2",74,224, 2);
        $this->setLinePosition(4,"page4.2.12.2.3",89,224, 2);
        $this->setLinePosition(4,"page4.2.12.3.1",110.5,224, 2);
        $this->setLinePosition(4,"page4.2.12.3.2",125.5,224, 2);
        $this->setLinePosition(4,"page4.2.12.3.3",140.5,224, 2);
        $this->setLinePosition(4,"page4.2.12.4.1",162,224, 2);
        $this->setLinePosition(4,"page4.2.12.4.2",177,224, 2);
        $this->setLinePosition(4,"page4.2.12.4.3",192,224, 2);

        $this->setLinePosition(4,"page4.2.13.1.1",7.5,237, 2);
        $this->setLinePosition(4,"page4.2.13.1.2",22.5,237, 2);
        $this->setLinePosition(4,"page4.2.13.1.3",37.5,237, 2);
        $this->setLinePosition(4,"page4.2.13.2.1",59,237, 2);
        $this->setLinePosition(4,"page4.2.13.2.2",74,237, 2);
        $this->setLinePosition(4,"page4.2.13.2.3",89,237, 2);
        $this->setLinePosition(4,"page4.2.13.3.1",110.5,237, 2);
        $this->setLinePosition(4,"page4.2.13.3.2",125.5,237, 2);
        $this->setLinePosition(4,"page4.2.13.3.3",140.5,237, 2);
        $this->setLinePosition(4,"page4.2.13.4.1",162,237, 2);
        $this->setLinePosition(4,"page4.2.13.4.2",177,237, 2);
        $this->setLinePosition(4,"page4.2.13.4.3",192,237, 2);

        $this->setLinePosition(4,"page4.2.14.1.1",7.5,250, 2);
        $this->setLinePosition(4,"page4.2.14.1.2",22.5,250, 2);
        $this->setLinePosition(4,"page4.2.14.1.3",37.5,250, 2);
        $this->setLinePosition(4,"page4.2.14.2.1",59,250, 2);
        $this->setLinePosition(4,"page4.2.14.2.2",74,250, 2);
        $this->setLinePosition(4,"page4.2.14.2.3",89,250, 2);
        $this->setLinePosition(4,"page4.2.14.3.1",110.5,250, 2);
        $this->setLinePosition(4,"page4.2.14.3.2",125.5,250, 2);
        $this->setLinePosition(4,"page4.2.14.3.3",140.5,250, 2);
        $this->setLinePosition(4,"page4.2.14.4.1",162,250, 2);
        $this->setLinePosition(4,"page4.2.14.4.2",177,250, 2);
        $this->setLinePosition(4,"page4.2.14.4.3",192,250, 2);









        $this->setLinePosition(5,"pagenamber5",118.2,12.2, 3);
        $this->setLinePosition(5,"1",20.3,81.5, 1);

        $this->setLinePosition(5,"telephone",72.5,99.5, 20);

        $this->setLinePosition(5,"email",23.1,109.5, 35);

        $this->setLinePosition(5,"3.1",20.5,179, 1);
        $this->setLinePosition(5,"3.2",119,195.6, 12);







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
        for($p=4 ; $p<=4; $p++) {
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