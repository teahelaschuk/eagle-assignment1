<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends Application {

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
        // this is the view we want shown
        $this->data['pagebody'] = 'fleet';
        $this->data['pagetitle'] = 'BirdBrain - Fleet';

        $this->load->model('fleetInfo');       // load the model
        $role = $this->session->userdata('userrole');

        $source = $this->fleetInfo->all();     // get data

        if ($role == ROLE_OWNER)
            $this->data['add'] = $this->parser->parse('fleetadd', [], true);
        else
            $this->data['add'] = "";

        $this->data['planes'] = $source;      // pass to be presented

        $this->render();
    }

    public function show($key) {
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

    // Initiate adding a new task
    public function add() {
        $this->load->model('fleetInfo');
        $plane = $this->fleetInfo->create();
        $this->session->set_userdata('plane', $plane);
        $this->showit();
    }

    private function showit() {
        $this->load->helper('form');
        $plane = $this->session->userdata('plane');
        $this->data['id'] = $plane->id;

        if (empty($plane->id))
            $this->data['modifyTitle'] = "Create Plane";
        else
            $this->data['modifyTitle'] = "Edit Plane";


        // if no errors, pass an empty message
        if (!isset($this->data['error']))
            $this->data['error'] = '';
        $fields = array(
            'fairid' => form_label("Plane ID") . form_input('planeid', $plane->id),
            'zsubmit' => form_submit('submit', 'Submit'),
        );

        $this->data = array_merge($this->data, $fields);
        $this->data['pagebody'] = 'fleetedit';
        $this->render();
    }

    // handle form submission
    public function submit() {
        $this->load->model('fleetInfo');
        
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleetInfo->rules());
        // retrieve & update data transfer buffer
        $plane = (array) $this->session->userdata('plane');
        $plane = array_merge($plane, $this->input->post());
        
        unset($plane["airid"]);
        unset($plane["submit"]);
        
        $plane = (object) $plane;  // convert back to object
        
        $this->session->set_userdata('plane', (object) $plane);
        
        // validate away
        if ($this->form_validation->run()) {
            if (empty($plane->id)) {
                $number = $this->fleetInfo->all();
                $test = (string)count($number) + 1;
                $plane->id = "BB0".$test;
                $this->fleetInfo->add($plane);
                $this->alert('Fleet ' . $plane->id . ' added', 'success');
            } else {
                $this->fleetInfo->update($plane);
                $this->alert('Plane ' . $plane->id . ' updated', 'success');
            }
        } else {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }
    
    // build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');
        $this->data['error'] = heading($message, 3);
    }

}
