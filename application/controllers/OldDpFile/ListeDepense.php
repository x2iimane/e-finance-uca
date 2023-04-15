<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListeDepense extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('Depense_article');
		$this->load->model('DepenseCategorie');
		$this->load->model('Depense');
		$this->load->model('Convention');
		$this->load->model('fournisseurs');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/listeDepense';
		$this->load->view($this->layout, $data);
	}

	public function getDP(){
		header('Content-Type: application/json');
		$dps = $this->Depense->getAllDp();
		echo json_encode($dps);
	}

	public function update(){
		$dp = $this->input->post("dp");
		$response = $this->Depense->update($dp);
		echo $response;
	}

	public function delete(){
		$this->Depense->delete($this->input->get("id"),$this->input->get("articles"));
	}

}
