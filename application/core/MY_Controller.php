<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller {

	public $layout;
	public $inputs;
	//public $summary;

	public function __construct () {
		parent::__construct();
		$this->layout = 'layouts/wrapper';
		$this->load->model('User');
	}

	public function prepareInputs($data) {
		foreach($data as $key => $value) {  
	        if (!empty($value)) {
	        	if ($key == PASSWORD)
	        		$this->inputs[$key] = md5($this->input->post($key));
	        	else
	        		$this->inputs[$key] = $this->input->post($key);  
	        }  	
	    } 
	    return $this->inputs;
	}

	/*
	if not logged, then redirect to Auth login page
	
	public function checkIfLogged() {
		$isLogged = ($this->session->userdata('isLogged') === true)?true:false;
		if(!$isLogged)
			redirect('auth');
	}

	*/

	public function checkIfLogged() {
		//get  current controller & method
		$CI = &get_instance();
        $controller = strtolower('/'.$CI->router->fetch_class());  //Controller name
        $method    = strtolower('/'.$CI->router->fetch_class().'/'.$CI->router->fetch_method());  //Method name

		// test if  user is logged
		$isLogged = ($this->session->userdata('isLogged') === true)?true:false;
		if($isLogged){
			// get user permission 
			$permissions = array_map('strtolower',array_map(function ($ar) {return $ar['url'];}, $this->User->getPermission($this->session->userdata('userId'))));

			if(count($permissions)> 0){
				if(!in_array($controller, $permissions) && !in_array($method, $permissions))
					redirect('Dashboard');
			}else{
				redirect('auth');
			}
		}else{
			redirect('auth');
		}
	}

}