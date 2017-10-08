<?php
/**
 * Created by PhpStorm.
 * User: Getry
 * Date: 2017-10-05
 * Time: 3:41 PM
 */
class Fleets extends CI_Model
{
    var $data = array(
        '1' => array('airid' => 'BB01', 'name' => 'citation'),
        '2' => array('airid' => 'BB02', 'name' => 'kingair'),
        '3' => array('airid' => 'BB03', 'name' => 'citation')
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

    // retrieve a single quote, null if not found
    public function get($which)
    {
        return !isset($this->data[$which]) ? null : $this->data[$which];
    }

    // retrieve all of the quotes
    public function all()
    {
        return $this->data;
    }

}