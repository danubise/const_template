<?php
class Requests extends Core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'Service';
    }
    public function index() {
        $requests = $this->db->select ("`1.1.1`, `1.1.2`,`1.1.3` FROM `documents`");
        echo $this->db->query->last;
        $this->view(
            array(
                'view' => 'requests/index',
                'var' => array(
                    'requests' => $requests
                )
            )
        );
    }
}