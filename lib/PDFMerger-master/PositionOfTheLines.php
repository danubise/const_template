<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 21.07.18
 * Time: 18:50
 */

class PositionOfTheLines
{
    public function getPagePositions($page){
        switch ($page){
            case 1:
                return $this->page1();
                break;
            case 2:
                return $this->page2();
                break;
            case 3:
                return $this->page3();
                break;

        }
    }
    private function page1(){

        $linePosition['1.1'][0] = new LinePosition(5, 64, 40);
        $linePosition['1.1'][1] = new LinePosition(5, 72, 40);
        $linePosition['1.1'][2] = new LinePosition(5, 81, 40);
        $linePosition['1.1'][3] = new LinePosition(5, 89, 40);
        $linePosition['1.1'][4] = new LinePosition(5, 98, 40);
        $linePosition['1.1'][5] = new LinePosition(5, 105, 40);
        $linePosition['1.2'][0] = new LinePosition(5, 125, 40);
        $linePosition['1.2'][1] = new LinePosition(5, 133, 40);
        $linePosition['1.2'][2] = new LinePosition(5, 141, 40);
        $linePosition['1.2'][3] = new LinePosition(5, 149, 40);
        $linePosition['2.1'][0] = new LinePosition(48.5, 179.5, 6);
        $linePosition['2.2'][0] = new LinePosition(151, 179.5, 2);
        $linePosition['2.3.1'][0] = new LinePosition(5.1, 200.5, 10);
        $linePosition['2.3.2'][0] = new LinePosition(64.3, 200.5, 28);
        $linePosition['2.3.2'][1] = new LinePosition(5.1, 210, 40);
        $linePosition['2.4.1'][0] = new LinePosition(5.1, 225, 10);
        $linePosition['2.4.2'][0] = new LinePosition(64.3, 225.5, 28);
        return $linePosition;
    }
    private function page2(){
        $linePosition = array();
        $linePosition['2.5'][0] = new LinePosition(5.1, 43, 10);
        $linePosition['2.5.1'][0] = new LinePosition(65, 43, 28);
        $linePosition['2.5.1'][1] = new LinePosition(5.1, 52, 40);
        $linePosition['2.6.1'][0] = new LinePosition(5.1, 70, 10);
        $linePosition['2.6.2'][0] = new LinePosition(65, 70, 28);
        $linePosition['2.6.2'][1] = new LinePosition(5.1, 78.5, 40);
        $linePosition['2.7.1'][0] = new LinePosition(5.1, 96, 10);
        $linePosition['2.7.2'][0] = new LinePosition(60, 96, 8);
        $linePosition['2.8.1'][0] = new LinePosition(108.5, 96.5, 10);
        $linePosition['2.8.2'][0] = new LinePosition(164, 96.5, 8);
        $linePosition['2.9.1'][0] = new LinePosition(5.1, 114.5, 10);
        $linePosition['2.9.2'][0] = new LinePosition(60, 114.5, 8);
        $linePosition['3.1'][0] = new LinePosition(15.5, 137.2, 1);
        $linePosition['3.2.1'][0] = new LinePosition(33, 156.7, 15);
        $linePosition['3.2.2'][0] = new LinePosition(112, 156.7, 4);
        $linePosition['4.1'][0] = new LinePosition(15.5, 178.5, 1);
        return $linePosition;
    }
    private function page3(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['1'][0] = new LinePosition(29.3, 61, 13);
        $linePosition['2'][0] = new LinePosition(128.5, 61, 10);
        $linePosition['3'][0] = new LinePosition(5.3, 82, 40);
        $linePosition['3'][1] = new LinePosition(5.3, 90, 40);
        $linePosition['3'][2] = new LinePosition(5.3, 98.5, 40);
        $linePosition['3'][3] = new LinePosition(5.3, 107, 40);
        $linePosition['3'][4] = new LinePosition(5.3, 115, 40);
        $linePosition['3'][5] = new LinePosition(5.3, 123.3, 40);
        return $linePosition;
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