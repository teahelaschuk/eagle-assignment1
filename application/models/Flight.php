<?php

/*
 * Remember!!
 * No departures before 08:00
 * No landings after 22:00
 * Minimum 30 minutes between a plane's landing and any subsequent departure
 * all fleet must be back at airline base by the end of the day
 * 10 minute buffer added to each flight in order to reach cruising/landing speed and altitude
 * 
 */

/**
 * Description of Flight
 *
 * @author Lancelei
 */
class Flight extends Entity {
    
    private $plane;
    private $departureTime;
    private $arrivalTime;
    private $destination;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setPlane($value) {
        $this->plane = $value;
    }
    
    public function getPlane() {
        return $plane;
    }
    
    public function setArrivalTime($value) {
        $this->arrivalTime = $value;
        
    }
    
    public function getArrivalTime() {
        return $value;
        
    }
    
    
    
    
}
