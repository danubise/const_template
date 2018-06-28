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
    private $pageNumber = 0;
    function  __construct()
    {
        $this->setLinePosition(1,"1.1.1",0, 33.5,59.5, 34);
        $this->setLinePosition(1,"1.1.2",0, 34,69.5, 34);
        $this->setLinePosition(1,"1.1.3",0, 34,79.5, 34);

        $this->setLinePosition(1,"1.2.1",0, 34,99.3, 34);
        $this->setLinePosition(1,"1.2.2",0, 34,109.2, 34);
        $this->setLinePosition(1,"1.2.3",0, 34,119.2, 34);

        $this->setLinePosition(1,"2",0, 54.5,130.2, 12);

        $this->setLinePosition(1,"3",0, 30,142.4, 1);

        $this->setLinePosition(1,"4.1.1",0, 42,163, 2);
        $this->setLinePosition(1,"4.1.2",0, 57,163, 2);
        $this->setLinePosition(1,"4.1.3",0, 72,163, 4);
        $this->setLinePosition(1,"4.2",0, 5.7,178.4, 40);
        $this->setLinePosition(1,"4.2",1, 5.5,186.8, 40);

        $this->setLinePosition(1,"5,1",0, 103,223.3, 3);
        $this->setLinePosition(1,"5",0,40.5,207.7, 1);

        $this->setLinePosition(2,"6,1",0,45,47, 6);
        $this->setLinePosition(2,"6,2",0,144,47, 2);
        $this->setLinePosition(2,"6,3,1",0,5.3,63, 10);
        $this->setLinePosition(2,"6,3,2",0,64.5,63, 28);
        $this->setLinePosition(2,"6,3,2",1,5.3,72.7, 40);

        $this->setLinePosition(2,"6,4,1",0,5.3,87.5, 10);
        $this->setLinePosition(2,"6,4,2",0,64.5,87.5, 28);

        $this->setLinePosition(2,"6,5,1",0,5.3,102.1, 10);
        $this->setLinePosition(2,"6,5,2",0,64.5,102.1, 28);
        $this->setLinePosition(2,"6,5,2",1,5.3,111.8, 40);

        $this->setLinePosition(2,"6,6,1",0,5.3,126.2, 10);
        $this->setLinePosition(2,"6,6,2",0,65,126.2, 28);
        $this->setLinePosition(2,"6,6,2",1,5.3,136, 40);

        $this->setLinePosition(2,"6,7,1",0,5.3,150, 10);
        $this->setLinePosition(2,"6,7,2",0,60.5,150, 8);

        $this->setLinePosition(2,"6,8,1",0,108.5,150, 10);
        $this->setLinePosition(2,"6,8,2",0,163.7,150, 8);

        $this->setLinePosition(2,"6,9,1",0,60.5,160, 8);
        $this->setLinePosition(2,"6,9,2",0,163.7,160, 8);

        $this->setLinePosition(2,"7,1",0,40.5,184.3, 2);

        $this->setLinePosition(2,"7,2",0,56,199, 25);

        $this->setLinePosition(2,"7,3,1",0,35.3,209.1, 2);
        $this->setLinePosition(2,"7,3,2",0,50,209.1, 2);
        $this->setLinePosition(2,"7,3,3",0,65,209.1, 4);

        $this->setLinePosition(2,"7,4",0,34.8,220, 34);
        $this->setLinePosition(2,"7,4",1,5.2,230, 40);
        $this->setLinePosition(2,"7,4",2,5.2,240, 40);

        $this->setLinePosition(2,"7,5,1",0,44.8,251.5, 3);
        $this->setLinePosition(2,"7,5,2",0,64.5,251.5, 3);


        $this->setLinePosition(3,"8,1",0,20.3,58, 1);

        $this->setLinePosition(3,"8,2",0,46,70.7, 25);

        $this->setLinePosition(3,"8,3,1",0,36,83.7, 2);
        $this->setLinePosition(3,"8,3,2",0,51,83.7, 2);
        $this->setLinePosition(3,"8,3,3",0,65.7,83.7, 4);

        $this->setLinePosition(3,"8,4",0,35.5,95, 34);
        $this->setLinePosition(3,"8,4",1,6.2,104.2, 40);
        $this->setLinePosition(3,"8,4",2,6.2,113.5, 40);

        $this->setLinePosition(3,"8,5,1",0,41.3,126.8, 2);
        $this->setLinePosition(3,"8,5,2",0,56,126.8, 2);
        $this->setLinePosition(3,"8,5,3",0,71,126.8, 4);

        $this->setLinePosition(4,"pagenamber4",0,118.2,12.2, 3);

        $this->setLinePosition(4,"page4.1",0,77,61.5, 2);
        $this->setLinePosition(4,"page4.1",1,92,61.5, 2);
        $this->setLinePosition(4,"page4.1",2,107,61.5, 2);


        $this->setLinePosition(4,"page4.2",0,7.5,83.5, 2);
        $this->setLinePosition(4,"page4.2",1,22.5,83.5, 2);
        $this->setLinePosition(4,"page4.2",2,37.5,83.5, 2);
        $this->setLinePosition(4,"page4.2",3,59,83.5, 2);
        $this->setLinePosition(4,"page4.2",4,74,83.5, 2);
        $this->setLinePosition(4,"page4.2",5,89,83.5, 2);
        $this->setLinePosition(4,"page4.2",6,110.5,83.5, 2);
        $this->setLinePosition(4,"page4.2",7,125.5,83.5, 2);
        $this->setLinePosition(4,"page4.2",8,140.5,83.5, 2);
        $this->setLinePosition(4,"page4.2",9,162,83.5, 2);
        $this->setLinePosition(4,"page4.2",10,177,83.5, 2);
        $this->setLinePosition(4,"page4.2",11,192,83.5, 2);

        $this->setLinePosition(4,"page4.2",12,7.5,96.3, 2);
        $this->setLinePosition(4,"page4.2",13,22.5,96.3, 2);
        $this->setLinePosition(4,"page4.2",14,37.5,96.3, 2);
        $this->setLinePosition(4,"page4.2",15,59,96.3, 2);
        $this->setLinePosition(4,"page4.2",16,74,96.3, 2);
        $this->setLinePosition(4,"page4.2",17,89,96.3, 2);
        $this->setLinePosition(4,"page4.2",18,110.5,96.3, 2);
        $this->setLinePosition(4,"page4.2",19,125.5,96.3, 2);
        $this->setLinePosition(4,"page4.2",20,140.5,96.3, 2);
        $this->setLinePosition(4,"page4.2",21,162,96.3, 2);
        $this->setLinePosition(4,"page4.2",22,177,96.3, 2);
        $this->setLinePosition(4,"page4.2",23,192,96.3, 2);

        $this->setLinePosition(4,"page4.2",24,7.5,109, 2);
        $this->setLinePosition(4,"page4.2",25,22.5,109, 2);
        $this->setLinePosition(4,"page4.2",26,37.5,109, 2);
        $this->setLinePosition(4,"page4.2",27,59,109, 2);
        $this->setLinePosition(4,"page4.2",28,74,109, 2);
        $this->setLinePosition(4,"page4.2",29,89,109, 2);
        $this->setLinePosition(4,"page4.2",30,110.5,109, 2);
        $this->setLinePosition(4,"page4.2",31,125.5,109, 2);
        $this->setLinePosition(4,"page4.2",32,140.5,109, 2);
        $this->setLinePosition(4,"page4.2",33,162,109, 2);
        $this->setLinePosition(4,"page4.2",34,177,109, 2);
        $this->setLinePosition(4,"page4.2",35,192,109, 2);

        $this->setLinePosition(4,"page4.2",36,7.5,122, 2);
        $this->setLinePosition(4,"page4.2",37,22.5,122, 2);
        $this->setLinePosition(4,"page4.2",38,37.5,122, 2);
        $this->setLinePosition(4,"page4.2",39,59,122, 2);
        $this->setLinePosition(4,"page4.2",40,74,122, 2);
        $this->setLinePosition(4,"page4.2",41,89,122, 2);
        $this->setLinePosition(4,"page4.2",42,110.5,122, 2);
        $this->setLinePosition(4,"page4.2",43,125.5,122, 2);
        $this->setLinePosition(4,"page4.2",44,140.5,122, 2);
        $this->setLinePosition(4,"page4.2",45,162,122, 2);
        $this->setLinePosition(4,"page4.2",46,177,122, 2);
        $this->setLinePosition(4,"page4.2",47,192,122, 2);

        $this->setLinePosition(4,"page4.2",48,7.5,135, 2);
        $this->setLinePosition(4,"page4.2",49,22.5,135, 2);
        $this->setLinePosition(4,"page4.2",50,37.5,135, 2);
        $this->setLinePosition(4,"page4.2",51,59,135, 2);
        $this->setLinePosition(4,"page4.2",52,74,135, 2);
        $this->setLinePosition(4,"page4.2",53,89,135, 2);
        $this->setLinePosition(4,"page4.2",54,110.5,135, 2);
        $this->setLinePosition(4,"page4.2",55,125.5,135, 2);
        $this->setLinePosition(4,"page4.2",56,140.5,135, 2);
        $this->setLinePosition(4,"page4.2",57,162,135, 2);
        $this->setLinePosition(4,"page4.2",58,177,135, 2);
        $this->setLinePosition(4,"page4.2",59,192,135, 2);

        $this->setLinePosition(4,"page4.2",60,7.5,147, 2);
        $this->setLinePosition(4,"page4.2",61,22.5,147, 2);
        $this->setLinePosition(4,"page4.2",62,37.5,147, 2);
        $this->setLinePosition(4,"page4.2",63,59,147, 2);
        $this->setLinePosition(4,"page4.2",64,74,147, 2);
        $this->setLinePosition(4,"page4.2",65,89,147, 2);
        $this->setLinePosition(4,"page4.2",66,110.5,147, 2);
        $this->setLinePosition(4,"page4.2",67,125.5,147, 2);
        $this->setLinePosition(4,"page4.2",68,140.5,147, 2);
        $this->setLinePosition(4,"page4.2",69,162,147, 2);
        $this->setLinePosition(4,"page4.2",70,177,147, 2);
        $this->setLinePosition(4,"page4.2",71,192,147, 2);

        $this->setLinePosition(4,"page4.2",72,7.5,160, 2);
        $this->setLinePosition(4,"page4.2",73,22.5,160, 2);
        $this->setLinePosition(4,"page4.2",74,37.5,160, 2);
        $this->setLinePosition(4,"page4.2",75,59,160, 2);
        $this->setLinePosition(4,"page4.2",76,74,160, 2);
        $this->setLinePosition(4,"page4.2",77,89,160, 2);
        $this->setLinePosition(4,"page4.2",78,110.5,160, 2);
        $this->setLinePosition(4,"page4.2",79,125.5,160, 2);
        $this->setLinePosition(4,"page4.2",80,140.5,160, 2);
        $this->setLinePosition(4,"page4.2",81,162,160, 2);
        $this->setLinePosition(4,"page4.2",82,177,160, 2);
        $this->setLinePosition(4,"page4.2",83,192,160, 2);


        $this->setLinePosition(4,"page4.2",84,7.5,173, 2);
        $this->setLinePosition(4,"page4.2",85,22.5,173, 2);
        $this->setLinePosition(4,"page4.2",86,37.5,173, 2);
        $this->setLinePosition(4,"page4.2",87,59,173, 2);
        $this->setLinePosition(4,"page4.2",88,74,173, 2);
        $this->setLinePosition(4,"page4.2",89,89,173, 2);
        $this->setLinePosition(4,"page4.2",90,110.5,173, 2);
        $this->setLinePosition(4,"page4.2",91,125.5,173, 2);
        $this->setLinePosition(4,"page4.2",92,140.5,173, 2);
        $this->setLinePosition(4,"page4.2",93,162,173, 2);
        $this->setLinePosition(4,"page4.2",94,177,173, 2);
        $this->setLinePosition(4,"page4.2",95,192,173, 2);

        $this->setLinePosition(4,"page4.2",96,7.5,186, 2);
        $this->setLinePosition(4,"page4.2",97,22.5,186, 2);
        $this->setLinePosition(4,"page4.2",98,37.5,186, 2);
        $this->setLinePosition(4,"page4.2",99,59,186, 2);
        $this->setLinePosition(4,"page4.2",100,74,186, 2);
        $this->setLinePosition(4,"page4.2",101,89,186, 2);
        $this->setLinePosition(4,"page4.2",102,110.5,186, 2);
        $this->setLinePosition(4,"page4.2",103,125.5,186, 2);
        $this->setLinePosition(4,"page4.2",104,140.5,186, 2);
        $this->setLinePosition(4,"page4.2",105,162,186, 2);
        $this->setLinePosition(4,"page4.2",106,177,186, 2);
        $this->setLinePosition(4,"page4.2",107,192,186, 2);

        $this->setLinePosition(4,"page4.2",108,7.5,198.5, 2);
        $this->setLinePosition(4,"page4.2",109,22.5,198.5, 2);
        $this->setLinePosition(4,"page4.2",110,37.5,198.5, 2);
        $this->setLinePosition(4,"page4.2",111,59,198.5, 2);
        $this->setLinePosition(4,"page4.2",112,74,198.5, 2);
        $this->setLinePosition(4,"page4.2",113,89,198.5, 2);
        $this->setLinePosition(4,"page4.2",114,110.5,198.5, 2);
        $this->setLinePosition(4,"page4.2",115,125.5,198.5, 2);
        $this->setLinePosition(4,"page4.2",116,140.5,198.5, 2);
        $this->setLinePosition(4,"page4.2",117,162,198.5, 2);
        $this->setLinePosition(4,"page4.2",118,177,198.5, 2);
        $this->setLinePosition(4,"page4.2",119,192,198.5, 2);


        $this->setLinePosition(4,"page4.2",120,7.5,211, 2);
        $this->setLinePosition(4,"page4.2",121,22.5,211, 2);
        $this->setLinePosition(4,"page4.2",122,37.5,211, 2);
        $this->setLinePosition(4,"page4.2",123,59,211, 2);
        $this->setLinePosition(4,"page4.2",124,74,211, 2);
        $this->setLinePosition(4,"page4.2",125,89,211, 2);
        $this->setLinePosition(4,"page4.2",126,110.5,211, 2);
        $this->setLinePosition(4,"page4.2",127,125.5,211, 2);
        $this->setLinePosition(4,"page4.2",128,140.5,211, 2);
        $this->setLinePosition(4,"page4.2",129,162,211, 2);
        $this->setLinePosition(4,"page4.2",130,177,211, 2);
        $this->setLinePosition(4,"page4.2",131,192,211, 2);


        $this->setLinePosition(4,"page4.2",132,7.5,224, 2);
        $this->setLinePosition(4,"page4.2",133,22.5,224, 2);
        $this->setLinePosition(4,"page4.2",134,37.5,224, 2);
        $this->setLinePosition(4,"page4.2",135,59,224, 2);
        $this->setLinePosition(4,"page4.2",136,74,224, 2);
        $this->setLinePosition(4,"page4.2",137,89,224, 2);
        $this->setLinePosition(4,"page4.2",138,110.5,224, 2);
        $this->setLinePosition(4,"page4.2",139,125.5,224, 2);
        $this->setLinePosition(4,"page4.2",140,140.5,224, 2);
        $this->setLinePosition(4,"page4.2",141,162,224, 2);
        $this->setLinePosition(4,"page4.2",142,177,224, 2);
        $this->setLinePosition(4,"page4.2",143,192,224, 2);



        $this->setLinePosition(4,"page4.2",144,7.5,237, 2);
        $this->setLinePosition(4,"page4.2",145,22.5,237, 2);
        $this->setLinePosition(4,"page4.2",146,37.5,237, 2);
        $this->setLinePosition(4,"page4.2",147,59,237, 2);
        $this->setLinePosition(4,"page4.2",148,74,237, 2);
        $this->setLinePosition(4,"page4.2",149,89,237, 2);
        $this->setLinePosition(4,"page4.2",150,110.5,237, 2);
        $this->setLinePosition(4,"page4.2",151,125.5,237, 2);
        $this->setLinePosition(4,"page4.2",152,140.5,237, 2);
        $this->setLinePosition(4,"page4.2",153,162,237, 2);
        $this->setLinePosition(4,"page4.2",154,177,237, 2);
        $this->setLinePosition(4,"page4.2",155,192,237, 2);


        $this->setLinePosition(4,"page4.2",156,7.5,250, 2);
        $this->setLinePosition(4,"page4.2",157,22.5,250, 2);
        $this->setLinePosition(4,"page4.2",158,37.5,250, 2);
        $this->setLinePosition(4,"page4.2",159,59,250, 2);
        $this->setLinePosition(4,"page4.2",160,74,250, 2);
        $this->setLinePosition(4,"page4.2",161,89,250, 2);
        $this->setLinePosition(4,"page4.2",162,110.5,250, 2);
        $this->setLinePosition(4,"page4.2",163,125.5,250, 2);
        $this->setLinePosition(4,"page4.2",164,140.5,250, 2);
        $this->setLinePosition(4,"page4.2",165,162,250, 2);
        $this->setLinePosition(4,"page4.2",166,177,250, 2);
        $this->setLinePosition(4,"page4.2",167,192,250, 2);

        $this->setLinePosition(5,"pagenamber5",0,118.2,12.2, 3);
        $this->setLinePosition(5,"1",0,20.3,81.5, 1);

        $this->setLinePosition(5,"telephone",0,72.5,99.5, 20);

        $this->setLinePosition(5,"email",0,23.1,109.5, 35);

        $this->setLinePosition(5,"3.1",0,20.5,179, 1);
        $this->setLinePosition(5,"3.2",0,119,195.6, 12);

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
                case 2:
                case 3:
                    $this->pagesFromOnetoThree($page, $data);

                    break;
                case 4:

                        $respond = $this->pageFour($page, $data);

                        if($respond['startFrom'] > -1 ){
                            do{
                                $this->pdf->lastPage();
                                $newstring = substr($respond['data'], $respond['startFrom']);
                                $newdata = array('pagenamber4' => "" , 'page4.2' => $newstring);

                                $respond = $this->pageFour(4 , $newdata);

                            }while($respond['startFrom'] > -1);
                        }
                        break;
                case 5:
                    $this->pageNumber++;

                    $data['pagenamber5'] = sprintf("%03d", $this->pageNumber);

                    $this->pagesFromOnetoThree($page, $data);
                    break;

            }
        }

    }
    private function pageFour($page, $data){
        if($this->pageNumber == 8 ) return;
        $this->addNewPage($page);


        $data['pagenamber4'] = sprintf("%03d", $this->pageNumber);
        $removedDot = "";
        foreach ($data as $lineid => $text) {
            if (isset($this->linePosition[$page][$lineid]) ) {
                if(is_array($text)){
                    $fullString="";
                    foreach($text as $key=>$text){
                        $fullString.=$text;
                    }
                    $text=$fullString;
                }
                $removedDot = str_replace (".","",$text);
                $textArray = $this->mb_str_split($removedDot);
                $inlineStartPosition = $this->printLines($page, $lineid, $textArray);
            }
        }
        return array("startFrom" => $inlineStartPosition, "data" => $removedDot );

    }


    private function addNewPage($page){
        $this->pageNumber++;
        $this->pdf->AddPage();
        $this->pdf->Image("images/IP_0".$page.".jpg", 0, 0, 210, 297, 'JPG', null, '', true, 300, '', false, false, 1, false, false, false);
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