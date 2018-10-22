<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 16.10.18
 * Time: 11:59
 */

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