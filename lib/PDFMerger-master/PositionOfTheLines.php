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
            case 4:
                return $this->page4();
                break;
            case 5:
                return $this->page5();
                break;
            case 6:
                return $this->page6();
                break;
            case 7:
                return $this->page7();
                break;
            case 8:
                return $this->page8();
                break;
            case 9:
                return $this->page9();
                break;
            case 10:
                return $this->page10();
                break;
            case 11:
                return $this->page11();
                break;
            case 12:
                return $this->page12();
                break;
            case 13:
                return $this->page13();
                break;
            case 14:
                return $this->page14();
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
        $linePosition['4.1'][0] = new LinePosition(66, 148.3, 15);
        $linePosition['4.1'][1] = new LinePosition(145, 148.3, 4);
        $linePosition['4.2.1'][0] = new LinePosition(36, 170, 3);
        $linePosition['4.2.1'][1] = new LinePosition(56, 170, 15);
        $linePosition['4.2.2'][0] = new LinePosition(46, 181, 1);
        $linePosition['4.2.2'][1] = new LinePosition(56, 181, 15);
        $linePosition['4.2.3'][0] = new LinePosition(41, 193, 15);
        $linePosition['4.2.3'][1] = new LinePosition(121, 193, 15);
        return $linePosition;
    }
    private function page4(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['1'][0] = new LinePosition(7, 42, 40);
        $linePosition['1'][1] = new LinePosition(7, 50, 40);
        $linePosition['1'][2] = new LinePosition(7, 58, 40);
        $linePosition['1'][3] = new LinePosition(7, 67, 40);
        $linePosition['1'][4] = new LinePosition(7, 75, 40);
        $linePosition['1'][5] = new LinePosition(7, 83, 40);
        $linePosition['2.1'][0] = new LinePosition(56, 102, 3);
        $linePosition['2.2'][0] = new LinePosition(117, 102, 2);
        $linePosition['2.2'][1] = new LinePosition(131, 102, 2);
        $linePosition['2.2'][2] = new LinePosition(146, 102, 4);
        $linePosition['2.3'][0] = new LinePosition(56, 116, 25);
        $linePosition['2.4'][0] = new LinePosition(5.5, 135, 40);
        $linePosition['2.4'][1] = new LinePosition(5.5, 144, 40);
        $linePosition['2.4'][2] = new LinePosition(5.5, 152, 40);
        $linePosition['2.4'][3] = new LinePosition(5.5, 160, 40);
        $linePosition['2.5'][0] = new LinePosition(5.5, 178, 40);
        $linePosition['2.5'][1] = new LinePosition(5.5, 186.3, 40);
        $linePosition['2.5'][2] = new LinePosition(5.5, 194.5, 40);
        $linePosition['2.5'][3] = new LinePosition(5.5, 202.5, 40);
        $linePosition['3'][0] = new LinePosition(45.5, 212.5, 10);
        $linePosition['4.1.1'][0] = new LinePosition(65.5, 228, 15);
        $linePosition['4.1.2'][0] = new LinePosition(144.5, 228, 4);
        $linePosition['4.2.1.1'][0] = new LinePosition(40.5, 246.5, 3);
        $linePosition['4.2.1.2'][0] = new LinePosition(60, 246.5, 15);
        $linePosition['4.2.2.1'][0] = new LinePosition(50.5, 257.3, 1);
        $linePosition['4.2.2.2'][0] = new LinePosition(60, 257.3, 15);
        $linePosition['4.2.3.1'][0] = new LinePosition(45, 268.5, 15);
        $linePosition['4.2.3.2'][0] = new LinePosition(124.5, 268.5, 15);
        return $linePosition;
    }
    private function page5(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['1.1'][0] = new LinePosition(30.3, 47.5, 35);
        $linePosition['1.2'][0] = new LinePosition(30.3, 60, 35);
        $linePosition['1.3'][0] = new LinePosition(30.3, 74, 35);
        $linePosition['2'][0] = new LinePosition(43.5, 89, 12);
        $linePosition['3.1.1'][0] = new LinePosition(43.5, 110.5, 2);
        $linePosition['3.1.2'][0] = new LinePosition(58.5, 110.5, 2);
        $linePosition['3.1.3'][0] = new LinePosition(73.5, 110.5, 4);
        $linePosition['3.2'][0] = new LinePosition(5.7, 129, 40);
        $linePosition['3.2'][1] = new LinePosition(5.7, 137.3, 40);
        $linePosition['4'][0] = new LinePosition(33.5, 149, 15);
        $linePosition['5.1'][0] = new LinePosition(41.5, 172.5, 2);
        $linePosition['5.2'][0] = new LinePosition(55.5, 188, 25);
        $linePosition['5.3.1'][0] = new LinePosition(35.5, 199.3, 2);
        $linePosition['5.3.2'][0] = new LinePosition(50.3, 199.3, 2);
        $linePosition['5.3.3'][0] = new LinePosition(65, 199.3, 4);
        $linePosition['5.4'][0] = new LinePosition(35.2, 212.7, 34);
        $linePosition['5.4'][1] = new LinePosition(5.8, 223, 40);
        $linePosition['5.4'][2] = new LinePosition(5.8, 233, 40);
        $linePosition['5.5.1'][0] = new LinePosition(45.2, 246.5, 3);
        $linePosition['5.5.2'][0] = new LinePosition(65, 246.5, 3);

        return $linePosition;
    }
    private function page6(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['6.1.1'][0] = new LinePosition(46, 48, 6);
        $linePosition['6.1.2'][0] = new LinePosition(148, 48, 2);
        $linePosition['6.1.3.1'][0] = new LinePosition(5.5, 63.7, 10);
        $linePosition['6.1.3.2'][0] = new LinePosition(64.7, 63.7, 28);
        $linePosition['6.1.3.2'][1] = new LinePosition(5.5, 73.5, 40);
        $linePosition['6.1.4.1'][0] = new LinePosition(5.5, 88, 10);
        $linePosition['6.1.4.2'][0] = new LinePosition(64.7, 88, 28);
        $linePosition['6.1.5.1'][0] = new LinePosition(5.5, 103, 10);
        $linePosition['6.1.5.2'][0] = new LinePosition(64.7, 103, 28);
        $linePosition['6.1.5.2'][1] = new LinePosition(5.5, 113, 40);
        $linePosition['6.1.6.1'][0] = new LinePosition(5.5, 128, 10);
        $linePosition['6.1.6.2'][0] = new LinePosition(64.7, 128, 28);
        $linePosition['6.1.6.2'][1] = new LinePosition(5.5, 137, 40);
        $linePosition['6.1.7.1'][0] = new LinePosition(5.5, 152, 9);
        $linePosition['6.1.7.2'][0] = new LinePosition(60.5, 152, 8);
        $linePosition['6.1.8.1'][0] = new LinePosition(108.5, 152, 10);
        $linePosition['6.1.8.2'][0] = new LinePosition(164, 152, 8);
        $linePosition['6.1.9.1'][0] = new LinePosition(60.5, 161, 8);
        $linePosition['6.1.9.2'][0] = new LinePosition(164, 161, 8);
        $linePosition['6.2.1'][0] = new LinePosition(60.5, 184, 3);
        $linePosition['6.2.2'][0] = new LinePosition(5.5, 199, 40);
        $linePosition['6.2.2'][1] = new LinePosition(5.5, 207, 40);
        $linePosition['7.1.1'][0] = new LinePosition(64, 227, 15);
        $linePosition['7.1.2'][0] = new LinePosition(143, 227, 4);
        $linePosition['7.2.1.1'][0] = new LinePosition(39.5, 246, 3);
        $linePosition['7.2.1.2'][0] = new LinePosition(59.5, 246, 15);
        $linePosition['7.2.2.1'][0] = new LinePosition(49.5, 256, 1);
        $linePosition['7.2.2.2'][0] = new LinePosition(59.5, 256, 15);
        $linePosition['7.2.3.1'][0] = new LinePosition(44.5, 266, 15);
        $linePosition['7.2.3.2'][0] = new LinePosition(123.5, 266, 15);

        return $linePosition;
    }
    private function page7(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['1.1'][0] = new LinePosition(20, 79, 1);
        $linePosition['1.2'][0] = new LinePosition(66, 96, 2);
        $linePosition['1.3'][0] = new LinePosition(5.5, 119.5, 40);
        $linePosition['1.3'][1] = new LinePosition(5.5, 127.5, 40);
        $linePosition['1.3'][2] = new LinePosition(5.5, 135.8, 40);
        $linePosition['1.3'][3] = new LinePosition(5.5, 144, 40);
        $linePosition['2.1.1'][0] = new LinePosition(63.2, 172, 15);
        $linePosition['2.1.2'][0] = new LinePosition(142.2, 172, 4);
        $linePosition['2.2.1.1'][0] = new LinePosition(41.5, 198.5, 3);
        $linePosition['2.2.1.2'][0] = new LinePosition(61, 198.5, 15);
        $linePosition['2.2.2.1'][0] = new LinePosition(51, 215, 1);
        $linePosition['2.2.2.2'][0] = new LinePosition(61, 215, 15);
        $linePosition['2.2.3.1'][0] = new LinePosition(46.5, 232, 15);
        $linePosition['2.2.3.2'][0] = new LinePosition(125.5, 232, 15);


        return $linePosition;
    }
    private function page8(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['3.1.1'][0] = new LinePosition(31, 64.5, 13);
        $linePosition['3.1.2'][0] = new LinePosition(130, 64.5, 10);
        $linePosition['3.1.3'][0] = new LinePosition(5.5, 81.5, 40);
        $linePosition['3.1.3'][1] = new LinePosition(5.5, 90, 40);
        $linePosition['3.1.3'][2] = new LinePosition(5.5, 98.5, 40);
        $linePosition['3.1.3'][3] = new LinePosition(5.5, 107, 40);
        $linePosition['3.1.3'][4] = new LinePosition(5.5, 115, 40);
        $linePosition['3.1.3'][5] = new LinePosition(5.5, 123, 40);
        $linePosition['3.2.1.1'][0] = new LinePosition(35, 155.5, 34);
        $linePosition['3.2.1.2'][0] = new LinePosition(35, 165.5, 34);
        $linePosition['3.2.1.3'][0] = new LinePosition(35, 179.5, 34);
        $linePosition['3.2.2'][0] = new LinePosition(45.5, 191, 12);
        $linePosition['3.2.3.1.1'][0] = new LinePosition(46, 207, 2);
        $linePosition['3.2.3.1.2'][0] = new LinePosition(61, 207, 2);
        $linePosition['3.2.3.1.3'][0] = new LinePosition(76, 207, 4);
        $linePosition['3.2.3.2'][0] = new LinePosition(5.5, 222.5, 40);
        $linePosition['3.2.3.2'][1] = new LinePosition(5.5, 231, 40);

        return $linePosition;
    }
    private function page9(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['3.2.4.1'][0] = new LinePosition(45.5, 42, 2);
        $linePosition['3.3.4.2'][0] = new LinePosition(62.5, 54, 25);
        $linePosition['3.2.4.3.1'][0] = new LinePosition(40.5, 64, 2);
        $linePosition['3.2.4.3.2'][0] = new LinePosition(55, 64, 2);
        $linePosition['3.2.4.3.3'][0] = new LinePosition(70, 64, 4);
        $linePosition['3.2.4.4'][0] = new LinePosition(40.5, 73.5, 33);
        $linePosition['3.2.4.4'][1] = new LinePosition(5.5, 82, 40);
        $linePosition['3.2.4.4'][2] = new LinePosition(5.5, 91.5, 40);
        $linePosition['3.2.4.5.1'][0] = new LinePosition(48.5, 101.5, 3);
        $linePosition['3.2.4.5.2'][0] = new LinePosition(68.5, 101.5, 3);
        $linePosition['3.2.5.1.1'][0] = new LinePosition(53, 125, 6);
        $linePosition['3.2.5.1.2'][0] = new LinePosition(159, 125, 2);
        $linePosition['3.2.5.1.3.1'][0] = new LinePosition(5.7, 140.2, 10);
        $linePosition['3.2.5.1.3.2'][0] = new LinePosition(65, 140.2, 28);
        $linePosition['3.2.5.1.3.2'][1] = new LinePosition(5.7, 149, 40);
        $linePosition['3.2.5.1.4.1'][0] = new LinePosition(5.7, 164, 10);
        $linePosition['3.2.5.1.4.2'][0] = new LinePosition(65, 164, 28);
        $linePosition['3.2.5.1.5.1'][0] = new LinePosition(5.7, 177, 10);
        $linePosition['3.2.5.1.5.2'][0] = new LinePosition(65, 177, 28);
        $linePosition['3.2.5.1.5.2'][1] = new LinePosition(5.7, 187, 40);
        $linePosition['3.2.5.1.6.1'][0] = new LinePosition(5.7, 200, 10);
        $linePosition['3.2.5.1.6.2'][0] = new LinePosition(65, 200, 28);
        $linePosition['3.2.5.1.6.2'][1] = new LinePosition(5.7, 209, 40);
        $linePosition['3.2.5.1.7.1'][0] = new LinePosition(5.7, 224, 10);
        $linePosition['3.2.5.1.7.2'][0] = new LinePosition(61, 224, 8);
        $linePosition['3.2.5.1.8.1'][0] = new LinePosition(109, 224, 10);
        $linePosition['3.2.5.1.8.2'][0] = new LinePosition(164.5, 224, 8);
        $linePosition['3.2.5.1.9.1'][0] = new LinePosition(61, 235, 8);
        $linePosition['3.2.5.1.9.2'][0] = new LinePosition(164.5, 235, 8);
        $linePosition['3.2.5.2.1'][0] = new LinePosition(64, 253, 3);
        $linePosition['3.2.5.2.2'][0] = new LinePosition(5.5, 268.5, 40);
        $linePosition['3.2.5.2.2'][1] = new LinePosition(5.5, 276.5, 40);
        return $linePosition;
    }
    private function page10(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['1'][0] = new LinePosition(5, 63, 40);
        $linePosition['1'][1] = new LinePosition(5, 72, 40);
        $linePosition['1'][2] = new LinePosition(5, 80, 40);
        $linePosition['1'][3] = new LinePosition(5, 88, 40);
        $linePosition['1'][4] = new LinePosition(5, 96, 40);
        $linePosition['1'][5] = new LinePosition(5, 105, 40);
        $linePosition['2.1'][0] = new LinePosition(25, 125, 13);
        $linePosition['2.2'][0] = new LinePosition(122, 125, 10);
        $linePosition['2.3'][0] = new LinePosition(5, 141.5, 40);
        $linePosition['2.3'][1] = new LinePosition(5, 149.5, 40);
        $linePosition['2.3'][2] = new LinePosition(5, 158, 40);
        $linePosition['2.3'][3] = new LinePosition(5, 166.5, 40);
        $linePosition['2.3'][4] = new LinePosition(5, 174.5, 40);
        $linePosition['2.3'][5] = new LinePosition(5, 182.8, 40);
        $linePosition['3.1.1'][0] = new LinePosition(62, 205.3, 15);
        $linePosition['3.1.2'][0] = new LinePosition(140.5, 205.3, 4);
        $linePosition['3.2.1.1'][0] = new LinePosition(36.5, 225.5, 3);
        $linePosition['3.2.1.2'][0] = new LinePosition(56.3, 225.5, 15);
        $linePosition['3.2.2.1'][0] = new LinePosition(46.5, 235.7, 1);
        $linePosition['3.2.2.2'][0] = new LinePosition(56.3, 235.7, 15);
        $linePosition['3.2.3.1'][0] = new LinePosition(41.7, 246, 15);
        $linePosition['3.2.3.2'][0] = new LinePosition(121, 246, 15);
        return $linePosition;
    }
    private function page11(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['1.1'][0] = new LinePosition(30.5, 64, 35);
        $linePosition['1.2'][0] = new LinePosition(30.5, 75, 35);
        $linePosition['1.3'][0] = new LinePosition(30.5, 85, 35);
        $linePosition['2'][0] = new LinePosition(46, 97.7, 12);
        $linePosition['3.1.1'][0] = new LinePosition(46, 117.7, 2);
        $linePosition['3.1.2'][0] = new LinePosition(61, 117.7, 2);
        $linePosition['3.1.3'][0] = new LinePosition(75.5, 117.7, 4);
        $linePosition['3.2'][0] = new LinePosition(6, 134.5, 40);
        $linePosition['3.2'][1] = new LinePosition(6, 143, 40);
        $linePosition['4'][0] = new LinePosition(6, 162, 40);
        $linePosition['4'][1] = new LinePosition(6, 170.2, 40);
        $linePosition['5.1'][0] = new LinePosition(41, 191.2, 2);
        $linePosition['5.2'][0] = new LinePosition(55.5, 205, 25);
        $linePosition['5.3.1'][0] = new LinePosition(36, 215.5, 2);
        $linePosition['5.3.2'][0] = new LinePosition(51, 215.5, 2);
        $linePosition['5.3.3'][0] = new LinePosition(65.5, 215.5, 4);
        $linePosition['5.4'][0] = new LinePosition(36, 228.5, 34);
        $linePosition['5.4'][1] = new LinePosition(6.5, 238.5, 40);
        $linePosition['5.4'][2] = new LinePosition(6.5, 248.5, 40);
        $linePosition['5.5.1'][0] = new LinePosition(49, 259, 3);
        $linePosition['5.5.2'][0] = new LinePosition(68.5, 259, 3);

        return $linePosition;
    }
    private function page12(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['6.1.1'][0] = new LinePosition(48, 56, 6);
        $linePosition['6.1.2'][0] = new LinePosition(152, 56, 2);
        $linePosition['6.1.3.1'][0] = new LinePosition(5.5, 73.7, 10);
        $linePosition['6.1.3.2'][0] = new LinePosition(64.7, 73.7, 28);
        $linePosition['6.1.3.2'][1] = new LinePosition(5.5, 83.5, 40);
        $linePosition['6.1.4.1'][0] = new LinePosition(5.5, 97.5, 10);
        $linePosition['6.1.4.2'][0] = new LinePosition(64.7, 97.5, 28);
        $linePosition['6.1.5.1'][0] = new LinePosition(5.5, 116, 10);
        $linePosition['6.1.5.2'][0] = new LinePosition(64.7, 116 , 28);
        $linePosition['6.1.5.2'][1] = new LinePosition(5.5, 126, 40);
        $linePosition['6.1.6.1'][0] = new LinePosition(5.5, 141, 10);
        $linePosition['6.1.6.2'][0] = new LinePosition(64.9, 141, 28);
        $linePosition['6.1.6.2'][1] = new LinePosition(5.5, 151, 40);
        $linePosition['6.1.7.1'][0] = new LinePosition(5.5, 166, 9);
        $linePosition['6.1.7.2'][0] = new LinePosition(60.5, 166, 8);
        $linePosition['6.1.8.1'][0] = new LinePosition(108.5, 166, 10);
        $linePosition['6.1.8.2'][0] = new LinePosition(164, 166, 8);
        $linePosition['6.1.9.1'][0] = new LinePosition(60.5, 176, 8);
        $linePosition['6.1.9.2'][0] = new LinePosition(164, 176, 8);
        $linePosition['6.2.1'][0] = new LinePosition(60.5, 201, 3);
        $linePosition['6.2.2'][0] = new LinePosition(5.6, 220, 40);
        $linePosition['6.2.2'][1] = new LinePosition(5.6, 228, 40);
        $linePosition['7'][0] = new LinePosition(50.5, 243.5, 20);


        return $linePosition;
    }
    private function page13(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['1'][0] = new LinePosition(27.5, 39.8, 13);
        $linePosition['2'][0] = new LinePosition(124, 39.8, 10);
        $linePosition['3'][0] = new LinePosition(5.3, 58, 40);
        $linePosition['3'][2] = new LinePosition(5.3, 66, 40);
        $linePosition['3'][3] = new LinePosition(5.3, 74.3, 40);
        $linePosition['3'][4] = new LinePosition(5.3, 83, 40);
        $linePosition['3'][5] = new LinePosition(5.3, 91, 40);
        $linePosition['3'][6] = new LinePosition(5.3, 99.5, 40);
        $linePosition['4.1'][0] = new LinePosition(55, 117.5, 3);
        $linePosition['4.2.1'][0] = new LinePosition(128.5, 117.5, 2);
        $linePosition['4.2.2'][0] = new LinePosition(143.5, 117.5, 2);
        $linePosition['4.2.3'][0] = new LinePosition(158, 117.5, 4);
        $linePosition['4.3'][0] = new LinePosition(55, 132, 25);
        $linePosition['4.4'][0] = new LinePosition(5.3, 150, 40);
        $linePosition['4.4'][1] = new LinePosition(5.3, 158, 40);
        $linePosition['4.4'][2] = new LinePosition(5.3, 166.5, 40);
        $linePosition['4.4'][3] = new LinePosition(5.3, 174.5, 40);
        $linePosition['4.5'][0] = new LinePosition(5.3, 191, 40);
        $linePosition['4.5'][1] = new LinePosition(5.3, 199.5, 40);
        $linePosition['4.5'][2] = new LinePosition(5.3, 207.5, 40);
        $linePosition['5'][0] = new LinePosition(5.3, 226.5, 40);
        $linePosition['5'][1] = new LinePosition(5.3, 235, 40);
        $linePosition['5'][2] = new LinePosition(5.3, 243, 40);
        $linePosition['5'][3] = new LinePosition(5.3, 251.5, 40);
        $linePosition['5'][4] = new LinePosition(5.3, 259.8, 40);
        $linePosition['5'][5] = new LinePosition(5.3, 268, 40);



        return $linePosition;
    }
    private function page14(){
        $linePosition = array();
        $linePosition['pagenumber'][0] = new LinePosition(118.5, 12.2, 3);
        $linePosition['6.1'][0] = new LinePosition(47.3, 44.7, 6);
        $linePosition['6.2'][0] = new LinePosition(146, 44.7, 2);
        $linePosition['6.3.1'][0] = new LinePosition(5.3, 61, 10);
        $linePosition['6.3.2'][0] = new LinePosition(64.5, 61.3, 28);
        $linePosition['6.3.2'][1] = new LinePosition(5.3, 69.7, 40);
        $linePosition['6.4.1'][0] = new LinePosition(5.3, 85.7, 10);
        $linePosition['6.4.2'][0] = new LinePosition(64.5, 85.7, 28);
        $linePosition['6.5.1'][0] = new LinePosition(5.3, 100.7, 10);
        $linePosition['6.5.2'][0] = new LinePosition(64.5, 100.7, 28);
        $linePosition['6.5.2'][1] = new LinePosition(5.3, 109.5, 40);
        $linePosition['6.6.1'][0] = new LinePosition(5.3, 125.5, 10);
        $linePosition['6.6.2'][0] = new LinePosition(65, 125, 28);
        $linePosition['6.6.2'][1] = new LinePosition(5.3, 134.5, 40);
        $linePosition['6.7.1'][0] = new LinePosition(5.3, 151.2, 10);
        $linePosition['6.7.2'][0] = new LinePosition(60.5, 151.2, 8);
        $linePosition['6.8.1'][0] = new LinePosition(108.5, 151.2, 10);
        $linePosition['6.8.2'][0] = new LinePosition(163.5, 151.2, 8);
        $linePosition['6.9.1'][0] = new LinePosition(50.3, 160.5, 10);
        $linePosition['6.9.2'][0] = new LinePosition(163.5, 160.5, 8);
        $linePosition['7'][0] = new LinePosition(50.3, 173, 20);
        $linePosition['8.1.1'][0] = new LinePosition(34.5, 199.7, 34);
        $linePosition['8.1.2'][0] = new LinePosition(34.5, 209.5, 34);
        $linePosition['8.1.3'][0] = new LinePosition(34.5, 218.7, 34);
        $linePosition['8.2'][0] = new LinePosition(45, 229.5, 12);
        $linePosition['8.3.1.1'][0] = new LinePosition(45, 247.7, 2);
        $linePosition['8.3.1.2'][0] = new LinePosition(60, 247.7, 2);
        $linePosition['8.3.1.3'][0] = new LinePosition(74.5, 247.7, 4);
        $linePosition['8.3.2'][0] = new LinePosition(5.3, 262.5, 40);
        $linePosition['8.3.2'][1] = new LinePosition(5.3, 270.5, 40);



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