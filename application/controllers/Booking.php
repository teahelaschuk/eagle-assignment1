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
                        
        $this->load->model('flightInfo');// load the model
        $this->load->model('airportinfo');
        $cities = $this->airportinfo->allCities();   //get cities to display in drop down
        $this->data['cities'] = $cities;        
        
        if(isset($_SESSION['departure']) && !empty($_SESSION['departure'])) {
            $this->data['from'] = $this->session->userdata('departure');
        }  
        
        if(isset($_SESSION['arrival']) && !empty($_SESSION['arrival'])) {
            $this->data['to'] = $this->session->userdata('arrival');
        } 
         
        $this->render();        
    }      
    
    /* Work in progress */
    public function submit() {      
        $this->session->set_userdata('departure', $this->input->get('departure'));
        $this->session->set_userdata('arrival', $this->input->get('arrival'));
        redirect('/booking');
    }  
}
