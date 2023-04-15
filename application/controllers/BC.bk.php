<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BC extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	   // $this->checkIfLogged();
		$this->load->model('demandeurs');
		$this->load->model('budget_etablissement');
		$this->load->model('articles');
		$this->load->model('etablissements');
		$this->load->model('exp_besoin_articles');
		$this->load->model('exp_besoin');
		$this->load->model('Fournisseur');
		$this->load->model('BonCommande');
		$this->load->model('ExpBesoinCommande');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/bc';

		$data['demandeurs'] = $this->demandeurs->getAll();
		$data['etablissements'] = $this->etablissements->getAll();
		$data['articles'] = $this->articles->getAll();
		$data['provider'] = $this->Fournisseur->getAll();

		$this->load->view($this->layout, $data);

	}

	public function getBudgetByEtablissement()
	{
		header('Content-Type: application/json');
		$etablissements_id = $this->input->get("etablissements_id");
		$budget_type = $this->input->get("budget_type");
		echo json_encode($this->budget_etablissement->getBudgetByEtablissementId($etablissements_id,$budget_type));
	}

	public function add($bc = true)
	{
		$data_ = $this->input->post();//$this->prepareInputs($this->input->post());

		$budget_etablissements_id = $this->budget_etablissement->getBudgetEtablissementIdByBudgetIdAndEtablissementId($data_['budget_id'],$data_['etablissements_id']);

		/**/
		$expIdToInsert = ($this->exp_besoin->getMinId() + 1) * -1;
		//'id' => $expIdToInsert,
		$expressionBesoin = array('numero'=> '-1','objet'=>$data_['objet'],'date'=>$data_['date'],'remarque'=>$data_['remarque'],'budget_etablissement_id'=>$budget_etablissements_id,'demandeurs_id'=>$data_['demandeur_id']);
		$this->exp_besoin->insert($expressionBesoin);

		/* Adding New BC */
		$dataBC = array('numero' =>$data_['numero'], 'date' => $data_['date'], 'fournisseurs_id' => $data_['fournisseurs_id']);
		$bcLastId = $this->BonCommande->save($dataBC);

		$articles = $data_["articles"];
		$quantites = $data_["quantites"];
		$prix = $data_["prix"];
		$descriptions = $data_["descriptions"];
		for($i=0;$i<count($articles);$i++) {
			$idToIsert = $this->exp_besoin_articles->insert(array('exp_besoin_id'=>$expIdToInsert,'articles_id'=>$articles[$i],'quantite'=>$quantites[$i],'prix'=>$prix[$i],'description'=>$descriptions[$i]));
			$this->ExpBesoinCommande->save(array('bon_commande_id' => $bcLastId, 'exp_besoin_articles_id' => $idToIsert));
		}
		//print_r($articles);
		/*foreach($articles as $row){
			echo $row['designation'];
		}
		print_r($articles);*/
		$this->session->set_flashdata('msg', 'bien ajouté');
		header("Location: ".base_url()."ListeBC");
	}

	public function edit($Id = 0) {
		// Define Title
		$data['title'] = 'Bon de Commande - Liquidation';

		/* Define Content */
		$data['content'] = 'home/edit_bc';

		$Id = (isset($_GET['Id']) && $_GET['Id'] > 0)?$_GET['Id']:$Id;
		$result = $this->BonCommande->getById($Id);
			foreach ($result as $row)
				$data['data'] = $row;

		$this->load->view($this->layout, $data);
	}

	public function updateBC() {
		$this->BonCommande->update($_POST);
		redirect('BC/edit?CISuccess=1&Id=' . $_POST['id']);
	}

}
