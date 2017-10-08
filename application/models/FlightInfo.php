<?php
/**
 * Created by PhpStorm.
 * User: Getry
 * Date: 2017-10-05
 * Time: 3:42 PM
 */


function __autoload($class_name) {
    require_once $class_name . '.php';
}

$vars = new FleetInfo();

class FlightInfo extends CI_Model
{
    var $data = array(
        '1' => array('flightid' => 'E001', 'from' => 'Dawson Creek', 'to' => 'Hudson Hope', 'dep' => '8:00', 'arr' => '8:23', 'plane' => 'BB01' ),
        '2' => array('flightid' => 'E002', 'from' => 'Dawson Creek', 'to' => 'Fort St John', 'dep' => '8:00', 'arr' => '8:20', 'plane' => 'BB02'),
        '3' => array('flightid' => 'E003', 'from' => 'Dawson Creek', 'to' => 'Chetwynd', 'dep' => '8:00', 'arr' => '8:30', 'plane' => 'BB03'),
        '4' => array('flightid' => 'E004', 'from' => 'Hudson Hope', 'to' => 'Chetwynd', 'dep' => '10:00', 'arr' => '10:16', 'plane' => 'BB01'),
        '5' => array('flightid' => 'E005', 'from' => 'Fort St John', 'to' => 'Hudson Hope', 'dep' => '12:00', 'arr' => '12:22', 'plane' => 'BB02'),
        '6' => array('flightid' => 'E006', 'from' => 'Chetwynd', 'to' => 'Fort St John', 'dep' => '15:00', 'arr' => '15:33', 'plane' => 'BB03'),
        '7' => array('flightid' => 'E007', 'from' => 'Chetwynd', 'to' => 'Dawson Creek', 'dep' => '13:00', 'arr' => '13:19', 'plane' => 'BB01'),
        '8' => array('flightid' => 'E008', 'from' => 'Hudson Hope', 'to' => 'Dawson Creek', 'dep' => '14:00', 'arr' => '14:30', 'plane' => 'BB02'),
        '9' => array('flightid' => 'E009', 'from' => 'Fort St John', 'to' => 'Dawson Creek', 'dep' => '18:00', 'arr' => '18:25', 'plane' => 'BB03'),
    );
    
    var $data2 = array (
      '1' => array('id' => 'YXJ', 'airport' => 'Fort St. John Airport (North Peace Airport)'),
      '2' => array('id' => 'YNH', 'airport' => 'Hudson\'s Hope Airport'),
      '3' => array('id' => 'YCQ', 'airport' => 'Chetwynd Airport'),
    );

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
    
    public function allAirports() {
        return $this->data2;
    }

}