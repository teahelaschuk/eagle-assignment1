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
    
    public function submit() {      
        $this->session->set_userdata('departure', $this->input->get('departure'));
        $this->session->set_userdata('arrival', $this->input->get('arrival'));
                
        $trips = $this->get_trips();
        
        $this->session->set_userdata('trips', $trips); 
        $this->data['trips'] = $trips;
        redirect('/booking');
    }  
    
    // O(n^3)h my, this is inefficient
    // returns all viable trips, with up to 3 legs
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
                                if($this->validate_transfer($f2, $f)) {
                                    $a = array('legs' => array($f2, $f));
                                    array_push($trips, $a); 
                                }
                            
                            // 3 leg trips    
                            } else {
                                foreach($flights as $f3) {     
                                    if($f3->tocommunity === $f2->fromcommunity && 
                                       $f3->fromcommunity === $this->session->userdata('departure')) {
                                            if($this->validate_transfer($f2, $f) && $this->validate_transfer($f3, $f2)) {
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
            }
        return $trips;  
    } 
    
    // Checks the time between two flights, and returns
    // false if the distance is less than 30 minutes
    private function validate_transfer($f1, $f2) {
        
        $dt1 = new DateTime($f1->arr);
        $dt2 = new DateTime($f2->dep);
                
        $since_start = $dt1->diff($dt2); 
        
        if($since_start->invert) {
            return false;
        }
        
        $minutes = ($since_start->h * 60) + ($since_start->i);                
        return (($minutes > 30) ? true : false);         
    }
}
