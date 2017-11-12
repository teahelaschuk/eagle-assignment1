<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Planes
 *
 * @author Lancelei
 */
class Plane extends Entity {
    
    private $planes = array("test");
    private $fleetValue = 10000;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setPlanes($kind) {
        $value = 0;
        $futureBudget = $this->fleetValue;
        
        if($kind === "citation" || $kind === "kingair" || $kind === "caravan") {
            switch($kind) {
                case "citation":
                    $value = 3200;
                    break;
                case "kingair":
                    $value = 3900;
                    break;
                case "caravan":
                    $value = 2300;
                    break;
                case "testplane":
                    $value = 4000;
                default:
                    $value = 0;
            }
            $futureBudget -= $value;
        
            if($value <= $futureBudget) {
                $this->planes[] = $kind;
            }
                
                    
        }
    }
    
    public function getPlanes() {
        return $this->planes;
    }
    
    
    
    
}
