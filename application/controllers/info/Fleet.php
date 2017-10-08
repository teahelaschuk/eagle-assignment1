<?php
/**
 * Created by PhpStorm.
 * User: kimdongwon
 * Date: 2017-09-28
 * Time: 8:17 PM
 */

class Fleet extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

    public function index (){
        $this->load->model('fleetinfo');
        $record = $this->fleetinfo->all();

        header("Content-type: application/json");
        echo json_encode($record);

    }
}