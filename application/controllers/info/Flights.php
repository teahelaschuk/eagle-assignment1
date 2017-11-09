<?php
/**
 * User: lanceleih
 * Fleet controller for info/flights
 */

class Flights extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

    public function index (){
        $this->load->model('flightInfo');
        $record = $this->flightInfo->all();

        header("Content-type: application/json");
        echo json_encode($record);

    }
}