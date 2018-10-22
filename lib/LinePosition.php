<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 16.10.18
 * Time: 11:58
 */

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