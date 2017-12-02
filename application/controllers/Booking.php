<?php


defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller for booking flights
 * @author Teah
 */
class Booking extends Application
{
    // render page
    public function index()
    {        
        $this->data['pagebody'] = 'booking';
        $this->data['pagetitle'] = 'BirdBrain - Booking';
                        
        $this->load->model('airportinfo');
        $cities = $this->airportinfo->AllCities();   //get cities to display in drop down
        $this->data['cities'] = $cities;        
        
        // session variables for departure and arrival
        if(isset($_SESSION['departure']) && !empty($_SESSION['departure'])) {
            $this->data['from'] = $this->session->userdata('departure');
        }        
        if(isset($_SESSION['arrival']) && !empty($_SESSION['arrival'])) {
            $this->data['to'] = $this->session->userdata('arrival');
        } 
        
        if(isset($_SESSION['trips']) && !empty($_SESSION['trips'])) {
            $this->data['trips'] = $this->session->userdata('trips');  
        } 
         
        $this->render();        
    }      
    
    /* Work in progress */
    public function submit() {      
        $this->session->set_userdata('departure', $this->input->get('departure'));
        $this->session->set_userdata('arrival', $this->input->get('arrival'));
                
        $trips = $this->get_trips();
               
        
        // sample data
        //$tripplans = array( array('id' => 'sample trip 1'), 
        //                    array('id' => 'sample trip 2'));
        
        $this->session->set_userdata('trips', $trips); 
        $this->data['trips'] = $trips;
        redirect('/booking');
    }  
    
    public function get_trips() {
        $trips = array();
        
        // get flights
        $this->load->model('flightInfo');// load the model
        $flights = $this->flightInfo->all(); 
        
        foreach($flights as $f) { 
            if($f->tocommunity === $this->session->userdata('arrival')) {
                // 1 leg trips
                if($f->fromcommunity === $this->session->userdata('departure')) {
                    
                    $a = array('legs' => array($f));
                    array_push($trips, $a); 
                    
                // 2 leg trips
                } else {
                    foreach($flights as $f2) {     
                        if($f2->tocommunity === $f->fromcommunity) {
                            if($f2->fromcommunity === $this->session->userdata('departure')) {
                                $a = array('legs' => array($f2, $f));
                                array_push($trips, $a); 
                            
                            // 3 leg trips    
                            } else {
                                foreach($flights as $f3) {     
                                    if($f3->tocommunity === $f2->fromcommunity && 
                                       $f3->fromcommunity === $this->session->userdata('departure')) {
                                            $a = array('legs' => array($f3, $f2, $f));
                                            array_push($trips, $a);                                         
                                       }
                                    }
                                }
                            }
                        }
                    } 
                }                
            }
        return $trips;  
    } 
    
    // Work in progress  *add 30 minutes
    private function validate_transfer($f1, $f2) {
        if(strtotime($f1->arr)>strtotime($f2->dep)) {
            
        } else {
            
        }
    }
}
