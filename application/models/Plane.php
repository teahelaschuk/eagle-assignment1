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
    
    private $planes = array();
    private $budget;
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Test if all the planes are valid and under the budget
     * @param type $fleet
     * @author Lancelei Herradura
     */
    public function setPlanes($fleet) {
        $value = 0;
        $futureValue = $this->budget;
        echo "FUTURE: " . $futureValue;
        echo "Budget: " . $this->budget;
        foreach($fleet as $plane) {
            $id = $plane->airid;
            if($id === "citation" || $id === "kingair" || $id === "caravan") {
                switch($id) {
                    case "citation":
                        $value = 3200;
                        break;
                    case "kingair":
                        $value = 3900;
                        break;
                    case "caravan":
                        $value = 2300;
                        break;
                    default:
                        $value = 0;
                }
                $futureValue -= $value;
            }
        }
        
        if($futureValue <= $this->budget) {
            $this->budget = $futureValue;
            $this->planes = $fleet;
        }
        
    }
    
    public function getPlanes() {
        return $this->planes;
    }
    
    public function setBudget($value) {
        $this->budget = $value;
    }
    
    public function getBudget() {
        return $this->budget;
    }
    
    
}
