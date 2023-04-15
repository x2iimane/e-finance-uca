<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class ListeDepense extends MY_Controller {

	function __construct(){
	    parent::__construct();
	   // $this->checkIfLogged();
		$this->load->model('Depense_article');
		$this->load->model('DepenseCategorie');
		$this->load->model('Depense');
		$this->load->model('Convention');
		$this->load->model('fournisseurs');
		$this->load->model('Interesse');
	}

	public function index()	{
		// Define Title
		$data['title'] = 'Liste des Dépenses';
		/* Define Content */
		$data['content'] = 'home/listeDepense';
		$this->load->view($this->layout, $data);
	}

	public function getDP(){
		header('Content-Type: application/json');
		$filter = null;
		if($this->input->get("filter"))
			$filter = $this->input->get("filter");
		$dps = $this->Depense->getAllDp($filter,$this->input->get("year"));
		
		echo json_encode(array_values($dps));
	}

	public function update(){
		$dp = $this->input->post("dp");
		$response = $this->Depense->update($dp);
		echo $response;
	}

	public function delete(){
		$id = $this->input->get("id");
		$depense_articles = $this->input->get("articles");
		$response = $this->Depense->delete($id,$depense_articles);
		echo $response;
	}

	public function getDpYears(){
		header('Content-Type: application/json');
		echo json_encode($this->depense->getYears());
	}
}

