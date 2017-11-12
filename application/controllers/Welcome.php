<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/welcome/index
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->data['pagebody'] = 'welcome';
        $this->data['pagetitle'] = 'BirdBrain - Home';
        
        // load models needed
        $this->load->model('fleetInfo');
        $this->load->model('flightInfo');

        // retrieve info from models
        $fleet = $this->fleetInfo->all();
        $flights = $this->flightInfo->all();
        $airports = $this->flightInfo->allAirports();

        // save info to data
        $this->data['fleetNum'] = count($fleet);
        $this->data['flightsNum'] = count($flights);
        $this->data['baseAirport'] = reset($flights)['from'];
        $this->data['airports'] = $airports;
        
        // set default user role 
        if(isset($_SESSION['userrole']) && !empty($_SESSION['userrole'])) {
            $this->session->userdata(ROLE_GUEST);
        }
        $this->render();
    }

}
