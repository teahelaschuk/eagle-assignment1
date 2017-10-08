<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends Application
{

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
	public function index()
	{
        $this->data['pagebody'] = 'fleet';
        $this->data['pagetitle'] = 'BirdBrain - Fleet';

        $this->load->model('fleetinfo');       // load the model

        $source = $this->fleetinfo->all();     // get data
        $this->data['planes'] = $source;      // pass to be presented

        $this->render();
    }
    public function show($key)
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'fleet';
        $this->load->model('fleetinfo');
        // build the list of authors, to pass on to our view
        $source = $this->fleetinfo->get($key);

        // pass on the data to present, as the "authors" view parameter
        //$this->data['authors'] = $source;

        // pass on the data to present, adding the author record's fields
        $this->data = array_merge($this->data, (array) $source);

        $this->data['pagebody'] = 'planes';

        $this->render();
    }

}
