<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends Application
{
	/**
	 * Index Page for the Flights controller.
	 * TE
	 */
	public function index()
	{
		$this->data['pagebody'] = 'flights'; 
                $this->data['pagetitle'] = 'BirdBrain - Flights';
                
                $this->load->model('flightinfo');       // load the model
                
                $source = $this->flightinfo->all();     // get data
                $this->data['schedule'] = $source;      // pass to be presented
                
		$this->render(); 
	}

}
