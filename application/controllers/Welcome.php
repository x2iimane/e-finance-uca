<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct(){	    
	   parent::__construct();
	   $this->checkIfLogged();
	   print_r($this->session->all_userdata());exit();

	   $this->layout = 'layouts/body'; // temporary
	}

	public function index()	{
		// Define Title
		$data['title'] = 'UCA Finance - Tableau de Board';

		/* Define Content layout*/
		$data['content'] = 'home/welcome';
		$data['requirements'] = 'layouts/requirements/charts';
		
		$this->load->view($this->layout, $data);
	}

}
