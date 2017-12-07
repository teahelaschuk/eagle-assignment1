<?php
/**
 * Created by PhpStorm.
 * User: Getry
 * Date: 2017-10-05
 * Time: 3:41 PM
 */
class FleetInfo extends CSV_Model
{
    /*
     * shows all fleet data
     */


        // Constructor
    public function __construct()
    {
        parent::__construct(APPPATH . '../data/airplanes.csv', 'id');

    }

    function get($key, $key2 = null)
    {
        $temp = (isset($this->_data[$key])) ? $this->_data[$key] : null;
        $method ='https://wacky.jlparry.com/info/airplanes/'.$temp->airid;
        $response = file_get_contents($method);
        $tmp = (object) json_decode($response);
        $tmp->airid = $temp->id;
        return $tmp;

    }
    
    // provide form validation rules
    public function rules() {
        $config = array(
            ['field' => 'airid', 'label' => 'Plane ID', 'rules' => 'regex_match[/([A-Z])\w+/g]'],
        );
        return $config;
    }

    

    // retrieve a single plane, null if not found



}