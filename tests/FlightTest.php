<?php
use PHPUnit\Framework\TestCase;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlightTest
 *
 * @author Lancelei
 */
class FlightTest extends TestCase {
    
    private $CI;

    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
    }
    
    public function testFlight() {
        $this->CI->load->model('flight');
        
        $this->CI->arrivalTime = "test";
        
        $this->assertEquals("test", $this->CI->arrivalTime);
    }
    
    
}
