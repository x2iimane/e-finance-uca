<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	
	public function index() {
		$this->load->view('layouts/header');
		$this->load->view('login');
		$this->load->view('layouts/footer');
	}

	public function signin () {
		/* Load User Model*/
		$this->load->model('User');
		$item = $this->User->login();

		if ($item != false) {	
			/* save log informations */
			$this->load->model('Log');
			$this->Log->saveLog(array('user_id' => $item->id, 'ip' => $this->getrealIp()));

			$this->session->set_userdata(array('userId' => $item->id, 'name' => $item->name,'isLogged' => true));
			redirect('dashboard');
		}
		else {
			$this->session->set_flashdata('signin_flash_msg', $this->_flash_data['signin']['error']);
			redirect('auth?CIError=1');
		}
			
	} 

	public function logout() {
		$this->session->unset_userdata('isLogged');
		redirect('auth','refresh'); 
	}

	function getrealIp () {
		$Ip = 'Null';
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}

		return $Ip;
	}

}
