<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layouts extends MY_Controller {

    function __construct(){

        parent::__construct();
        // $this->checkIfLogged();
    }

    public function index()	{
        // Define Title
        $data['title'] = '';

        /* Define Content */
        $data['content'] = 'html/form';

        $this->load->view($this->layout, $data);
    }

}
