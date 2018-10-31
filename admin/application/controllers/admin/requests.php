<?php
class Requests extends Core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'Service';
    }
    public function index() {
        $linecount = 20;
        if(isset($_POST['linescount'])){
            $linecount= $_POST['linescount'];
        }
        $requests = $this->db->select (" d.`id`,
        `Date`,
        CONCAT(`0.1.1`,\"-\",`0.1.2`,\"-\",`0.1.3`) AS ifnsData,
         CONCAT(`1.1.1`,\" \",`1.1.2`,\" \",`1.1.3`) AS fio,
         `2`,
         `telephone`,
         `openNewAccount`,
         r.name as regionName,
         email,
         (CASE WHEN (site = 1) THEN \"Да\" ELSE \"Нет\" END) as site,
         (CASE WHEN (personal = 1) THEN \"Да\" ELSE \"Нет\" END) as personal,
         (CASE WHEN (stamp = 1) THEN \"Да\" ELSE \"Нет\" END) as stamp,
         CONCAT(`4.1.1`,\"-\",`4.1.2`,\"-\",`4.1.3`) AS birthday,
         addressText,
         CONCAT(\"Серия и номер документа: \",`7.2`,\" Дата выдачи: \",`7.3.1`,\".\",`7.3.2`,\".\",`7.3.3`,\" Кем выдан: \",`7.4`,\" Код подразделения: \",`7.5.1`,\"-\",`7.5.2`) as pasport,
         `page4.1`,
         `nalog`,
         `dopFileURL`,
         `ipFileURL`,
         `nalogFileURL`
         FROM `documents` as d , `regions` as r WHERE r.id=d.`6.2` ORDER BY `id` DESC LIMIT ".$linecount );
        //echo $this->db->query->last;
        $headFeilds = array();
        foreach ($requests[0] as $key => $value){
            if($key == "kladrObj" || $key== "sign" || $key== "1.2.1"
                || $key== "1.2.2" || $key== "1.2.3" || $key== "dopSoglAddressRegistracii"
            || $key== "signPath" ) continue;
            switch ($key){
                case "telephone":
                    $fieldName="Телефон";
                    break;
                case "openNewAccount":
                    $fieldName="Банк";
                    break;
                case "addressText":
                    $fieldName="Адрес";
                    break;
                case "ifnsData":
                    $fieldName="Поход в ИФНС";
                    break;
                case "regionName":
                    $fieldName="Регион";
                    break;
                case "email":
                    $fieldName="Е-майл";
                    break;
                case "stamp":
                    $fieldName="Печать";
                    break;
                case "page4.1":
                    $fieldName="Основное ОКВД";
                    break;
                case "nalog":
                    $fieldName="Налог";
                    break;
                case "pasport":
                    $fieldName="Данные паспорта";
                    break;
                case "site":
                    $fieldName="Сайт";
                    break;
                case "2":
                    $fieldName="ИНН";
                    break;
                case "3":
                    $fieldName="Пол";
                    break;
                case "5":
                    $fieldName="Гражданство";
                    break;
                case "dopFileURL":
                    $fieldName="ДопСоглашение";
                    break;
                case "birthday":
                    $fieldName="Дата рождения";
                    break;
                case "fio":
                    $fieldName="ФИО";
                    break;
                default:
                    $fieldName ="1";
            }
            $headFeilds[$key] = $fieldName;
        }

        $this->view(
            array(
                'view' => 'requests/index',
                'var' => array(
                    'headFeilds' => $headFeilds,
                    'linecount' => $linecount,
                    'requests' => $requests
                )
            )
        );
    }
}