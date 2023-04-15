<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NouvelAO extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('bon_commande');
		$this->load->model('exp_besoin_ao');
		$this->load->model('ao');
		$this->load->model('exp_besoin');
		$this->load->model('exp_besoin_articles');
		$this->load->model('articles');
		$this->load->model('budget_etablissement');
		$this->load->model('etablissements');
		$this->load->model('demandeurs');
		$this->load->model('lot');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/nouvelAO';

		$data['demandeurs'] = $this->demandeurs->getAll();
		$data['etablissements'] = $this->etablissements->getAll();
		$data['articles'] = $this->articles->getAll();

		$this->load->view($this->layout, $data);

	}

	/*public function getBudgetByEtablissement()
	{
		header('Content-Type: application/json');
		$etablissements_id = $this->input->get("etablissements_id");
		$budget_type = $this->input->get("budget_type");
		echo json_encode($this->budget_etablissement->getBudgetByEtablissementId($etablissements_id,$budget_type));
	}*/

	public function add()
	{
		$data_ = $this->input->post();//$this->prepareInputs($this->input->post());

	//	$budget_etablissements_id = $this->budget_etablissement->getBudgetEtablissementIdByBudgetIdAndEtablissementId($data_['budget_id'],$data_['etablissements_id']);

		//$expressionBesoin = array('numero'=>$data_['exp_numero'],'objet'=>$data_['objet'],'date'=>$data_['date'],'remarque'=>$data_['remarque'],'budget_etablissement_id'=>$budget_etablissements_id,'demandeurs_id'=>$data_['demandeur_id']);
		//$expressionBesoin_id = $this->exp_besoin->insert($expressionBesoin);



		$ao = array('numero'=>$data_['ao_numero'],'date'=>$data_['date'],'intitule'=>$data_['objet'],'status'=>$data_["status"],
			"mode_execution"=>$data_["mode_execution"],'budget_type'=>$data_['budget_type']);
		$ao_id = $this->ao->insert($ao);

		/*$articles = $data_["articles"];
		$quantites = $data_["quantites"];
		$prix = $data_["prix"];
		$descriptions = $data_["descriptions"];*/

		$lots = $data_["lots"];
		$estimations = $data_["estimations"];
		$caution_provisoires = $data_["caution_provisoires"];
		$intitules = $data_["intitules"];


		for($i=0;$i<count($lots);$i++)
		{
			//$exp_besoin_articles_id = $this->exp_besoin_articles->insert(array('exp_besoin_id'=>$expressionBesoin_id,'articles_id'=>$articles[$i],'quantite'=>$quantites[$i],'prix'=>$prix[$i],'description'=>$descriptions[$i]));

			//insertion dans la table LOT
			$this->lot->insert(array('lot'=>$lots[$i],'intitule'=>$intitules[$i],'estimation'=>$estimations[$i],'caution_provisoire'=>$caution_provisoires[$i],'ao_id'=>$ao_id));

			//$exp_besoin_ao = array('ao_id'=>$ao_id,'exp_besoin_articles_id'=>lot_id);
			//$this->exp_besoin_ao->insert($exp_besoin_ao);
		}


		$this->session->set_flashdata('msg', 'bien ajouté');
		header("Location: ".base_url()."NouvelAO");
	}


}
