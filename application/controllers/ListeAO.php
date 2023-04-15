<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListeAO extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('exp_besoin');
		$this->load->model('exp_besoin_ao');
		$this->load->model('ao');
		$this->load->model('exp_besoin_articles');
		$this->load->model('publication_ao');
		$this->load->model('retrait_dossier_ao');
		$this->load->model('affectation_lot');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/listeAO';

		//print_r($data["expressionBesoins"]);
		$this->load->view($this->layout, $data);
	}
	public function getAOs(){
		header('Content-Type: application/json');
		$filter = null;
		if($this->input->get("filter"))
			$filter = $this->input->get("filter");
		$aos = $this->ao->getAllAoExpand($filter,$this->input->get("year"));
		echo json_encode($aos);
	}

	public function update(){
		$ao = $this->input->post("ao");
		$response = $this->ao->update($ao);
		echo $response;
	}

	public function delete(){
		//Suppression

		$id = $this->input->get("id");
		//$exp_besoin_articles = $this->input->get("articles");

		//$this->ao->delete($id,$exp_besoin_articles);

		$this->ao->delete($id);

		echo "1";
	}


	public function addPublication()
	{
		$publication = $this->input->post("publication");

		$publication["date"] = date("Y-m-d", $publication["date"]/1000);

		$response = $this->publication_ao->insert($publication);
		echo $response;//last id
	}

	public function addAffectation()
	{
		$affectation = $this->input->post("affectation");

		$response = $this->affectation_lot->insert($affectation);
		echo $response;//last id
	}


	public function updatePublication()
	{
		$publication = $this->input->post("publication");
		$response = $this->publication_ao->update($publication);
		echo $response;
	}

	public function updateAffectation()
	{
		$affectation = $this->input->post("affectation");
		$response = $this->affectation_lot->update($affectation);
		echo $response;
	}



	public function addRetrait()
	{
		$retrait = $this->input->post("retrait");

		if($retrait["depot_date"] != null)
			$retrait["depot_date"] = date("Y-m-d", $retrait["depot_date"]/1000);
		else
			$retrait["depot_date"] = null;

		if($retrait["retrait_date"] != null)
			$retrait["retrait_date"] = date("Y-m-d", $retrait["retrait_date"]/1000);
		else
			$retrait["retrait_date"] = null;

		if($retrait["visite_lieux_date"] != null)
			$retrait["visite_lieux_date"] = date("Y-m-d", $retrait["visite_lieux_date"]/1000);
		else
			$retrait["visite_lieux_date"] = null;

		if($retrait["depot_echan_prospect_date"] != null)
			$retrait["depot_echan_prospect_date"] = date("Y-m-d", $retrait["depot_echan_prospect_date"]/1000);
		else
			$retrait["depot_echan_prospect_date"] = null;

			$response = $this->retrait_dossier_ao->insert($retrait);
		echo $response;//last id
	}

	public function updateRetrait()
	{
		$retrait = $this->input->post("retrait");
		$response = $this->retrait_dossier_ao->update($retrait);
		echo $response;
	}

	public function deletePublication(){
		$id = $this->input->get("id");
		$this->publication_ao->delete($id);
		echo "1";
	}

	public function deleteAffectation(){
		$id = $this->input->get("id");
		$this->affectation_lot->delete($id);
		echo "1";
	}

	public function deleteRetrait(){
		$id = $this->input->get("id");
		$this->retrait_dossier_ao->delete($id);
		echo "1";
	}

	public function getYears(){
		header('Content-Type: application/json');
		echo json_encode($this->ao->getYears());
	}
}
