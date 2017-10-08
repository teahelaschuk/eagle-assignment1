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
        // this is the view we want shown
        $this->data['pagebody'] = 'fleet';
        $this->data['pagetitle'] = 'BirdBrain - Fleet';

        $this->load->model('fleetInfo');       // load the model

        $source = $this->fleetInfo->all();     // get data
        $this->data['planes'] = $source;      // pass to be presented

        $this->render();
    }
    public function show($key)
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'fleet';
        $this->load->model('fleetInfo');
        // build the list of planes, to pass on to our view
        $source = $this->fleetInfo->get($key);

        // pass on the data to present, adding the planes info fields
        $this->data = array_merge($this->data, (array) $source);

        $this->data['pagebody'] = 'planes';

        $this->render();
    }

}
