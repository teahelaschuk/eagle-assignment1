<?php
// class TaskTest extends PHPUnit_Framework_TestCase
use PHPUnit\Framework\TestCase;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlaneTest
 *
 * @author Lancelei
 */
class PlaneTest extends TestCase {
    
    private $CI;

    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
    }
    
    public function testPlanes() {
        $this->CI->load->model('planes');
        
        $this->CI->planes->planes = "caravan";
        $this->CI->planes->planes = "asd";
        $this->CI->planes->planes = "citation";
        $this->CI->planes->planes = "kingair";
        $this->CI->planes->planes = "testplane";
        
        // BirdBrain owns caravan model
        $this->assertContains("caravan", $this->CI->planes->planes);
        
        // Not part of BirdBrain airlines
        $this->assertNotContains("asd", $this->CI->planes->planes);
        $this->assertContains("citation", $this->CI->planes->planes);
        $this->assertContains("kingair", $this->CI->planes->planes);
        
        // Check that there is not enough budget to get testplane
        $this->assertNotContains("testplane", $this->CI->planes->planes);
        
    }
    
}
