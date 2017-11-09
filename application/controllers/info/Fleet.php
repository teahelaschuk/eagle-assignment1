<?php
/**
 * User: lanceleih
 * Fleet controller for info/fleet
 */

class Fleet extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

    public function index (){
        $this->load->model('fleetInfo');
        $record = $this->fleetInfo->all();

        header("Content-type: application/json");
        echo json_encode($record);

    }
}