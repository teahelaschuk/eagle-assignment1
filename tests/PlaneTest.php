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
    
    public function testPlane() {
        $this->CI->load->model('plane');
        
        $this->CI->plane->planes = "caravan";
        $this->CI->plane->planes = "asd";
        $this->CI->plane->planes = "citation";
        $this->CI->plane->planes = "kingair";
        $this->CI->plane->planes = "testplane";
        
        // BirdBrain owns caravan model
        $this->assertContains("caravan", $this->CI->plane->planes);
        
        // Not part of BirdBrain airlines
        $this->assertNotContains("asd", $this->CI->plane->planes);
        $this->assertContains("citation", $this->CI->plane->planes);
        $this->assertContains("kingair", $this->CI->plane->planes);
        
        // Check that there is not enough budget to get testplane
        $this->assertNotContains("testplane", $this->CI->plane->planes);
        
    }
    
}
