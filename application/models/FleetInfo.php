<?php
/**
 * Created by PhpStorm.
 * User: Getry
 * Date: 2017-10-05
 * Time: 3:41 PM
 */
class FleetInfo extends CI_Model
{
    /*
     * shows all fleet data
     */
    var $data = array(
        '1' => array('airid' => 'BB01', 'name' => 'citation', 'manufacturer' => 'Cessna', 'model' => 'Citation M2', 'seats' => '7'),
        '2' => array('airid' => 'BB02', 'name' => 'kingair', 'manufacturer' => 'Beechcraft', 'model' => 'King Air C90', 'seats' => '12'),
        '3' => array('airid' => 'BB03', 'name' => 'caravan', 'manufacturer' => 'Cessna', 'model' => 'Grand Caravan EX', 'seats' => '14')
    );

        // Constructor
    public function __construct()
    {
        parent::__construct();

        // inject each "record" key into the record itself, for ease of presentation
        foreach ($this->data as $key => $record)
        {
            $record['key'] = $key;
            $this->data[$key] = $record;
        }
    }

    // retrieve a single plane, null if not found
    public function get($which)
    {
        return !isset($this->data[$which]) ? null : $this->data[$which];
    }

    // retrieve all of the planes
    public function all()
    {
        return $this->data;
    }

}