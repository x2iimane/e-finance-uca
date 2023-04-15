<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marche extends MY_Controller {
	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('ao');
		$this->load->model('marches');
		$this->load->model('fournisseurs');
		$this->load->model('budget_etablissement');
		$this->load->model('etablissements');

	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/marche';

		$data['fournisseurs'] = $this->fournisseurs->getAll();
		$data['aos'] = $this->ao->getAll();
		$data['etablissements'] = $this->etablissements->getAll();
		$this->load->view($this->layout, $data);
	}


	public function add()
	{
		$data_ = $this->input->post();//$this->prepareInputs($this->input->post());

		$budget_etablissements_id = $this->budget_etablissement->getBudgetEtablissementIdByBudgetIdAndEtablissementId($data_['budget_id'],$data_['etablissements_id']);

		$marche = array('AO_id'=>$data_['AO_id'],'numero'=>$data_['numero'],'intitule'=>$data_['intitule'],'fournisseurs_id'=>$data_["fournisseurs_id"],
			"montantTTC"=>$data_["montantTTC"],'budget_etablissements_id'=>$budget_etablissements_id,"nature"=>$data_["nature"],"nature_prix"=>$data_["nature_prix"],"status"=>$data_["status"],"observation"=>$data_["observation"]);
		$this->marches->insert($marche);

		$this->session->set_flashdata('msg', 'bien ajouté');
		header("Location: ".base_url()."Marche");
	}

	public function getBudgetByEtablissement()
	{
		header('Content-Type: application/json');
		$etablissements_id = $this->input->get("etablissements_id");
		$AO_id = $this->input->get("AO_id");

		$budget_type = $this->ao->getBudgetType($AO_id);

		echo json_encode($this->budget_etablissement->getBudgetByEtablissementId($etablissements_id,$budget_type));
	}
	public function getBudgetType()
	{
		header('Content-Type: application/json');
		$AO_id = $this->input->get("AO_id");

		$budget_type = $this->ao->getBudgetType($AO_id);

		echo json_encode($budget_type);
	}

}
