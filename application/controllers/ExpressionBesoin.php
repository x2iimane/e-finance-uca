<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExpressionBesoin extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('demandeurs');
		$this->load->model('budget_etablissement');
		$this->load->model('articles');
		$this->load->model('etablissements');
		$this->load->model('exp_besoin_articles');
		$this->load->model('exp_besoin');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/expressionBesoin';

		$data['demandeurs'] = $this->demandeurs->getAll();
		$data['etablissements'] = $this->etablissements->getAll();
		$data['articles'] = $this->articles->getAll();
		//print_r($data["demandeurs"]);

		$this->load->view($this->layout, $data);

	}

	public function getBudgetByEtablissement()
	{
		header('Content-Type: application/json');
		$etablissements_id = $this->input->get("etablissements_id");
		$budget_type = $this->input->get("budget_type");
		echo json_encode($this->budget_etablissement->getBudgetByEtablissementId($etablissements_id,$budget_type));
	}

	public function add()
	{
		$data_ = $this->input->post();//$this->prepareInputs($this->input->post());

		//print_r($data_);

		$budget_etablissements_id = $this->budget_etablissement->getBudgetEtablissementIdByBudgetIdAndEtablissementId($data_['budget_id'],$data_['etablissements_id']);

		$expressionBesoin = array('numero'=>$data_['numero'],'objet'=>$data_['objet'],'date'=>$data_['date'],'remarque'=>$data_['remarque'],'budget_etablissement_id'=>$budget_etablissements_id,'demandeurs_id'=>$data_['demandeur_id']);
		$expressionBesoin_id = $this->exp_besoin->insert($expressionBesoin);

		$articles = $data_["articles"];
		$quantites = $data_["quantites"];
		$prix = $data_["prix"];
		$descriptions = $data_["descriptions"];

		for($i=0;$i<count($articles);$i++)
		{
			$this->exp_besoin_articles->insert(array('exp_besoin_id'=>$expressionBesoin_id,'articles_id'=>$articles[$i],'quantite'=>$quantites[$i],'prix'=>$prix[$i],'description'=>$descriptions[$i]));
		}

		//print_r($articles);
		/*foreach($articles as $row){
			echo $row['designation'];
		}
		print_r($articles);*/
		$this->session->set_flashdata('msg', 'bien ajouté');
		header("Location: ".base_url()."ExpressionBesoin");
	}

}
