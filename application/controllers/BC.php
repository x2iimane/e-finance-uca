<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class BC extends MY_Controller {



	function __construct(){

	    

	    parent::__construct();

	   	$this->checkIfLogged();

	   	

		$this->load->model('demandeurs');

		$this->load->model('budget_etablissement');

		$this->load->model('articles');

		$this->load->model('etablissements');

		$this->load->model('exp_besoin_articles');

		$this->load->model('exp_besoin');

		$this->load->model('Fournisseur');

		$this->load->model('BonCommande');

		$this->load->model('ExpBesoinCommande');

		$this->load->model('TypeDepense');

		$this->load->model('Projects');

		$this->load->model('SousProjects');

		$this->load->model('Bordereau');

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

		$data['prestations'] = $this->TypeDepense->getAll();

		$data['projects'] = $this->Projects->getAll();

		$data['sub_projects'] = $this->SousProjects->getAll();



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

		$expressionBesoin = array('id' => "$expIdToInsert", 'numero'=> '-1','objet'=>$data_['objet'],'date'=>$data_['date'],'remarque'=>$data_['remarque'],'budget_etablissement_id'=>$budget_etablissements_id,'demandeurs_id'=>$data_['demandeur_id']);		

		$this->exp_besoin->insert($expressionBesoin);

		/* Adding New BC */

		// extracting Other's Provider amount values 
		$add_provider = array();
		for ($i = 0; $i < count($data_['fournisseur']); $i++) {
			array_push($add_provider, array('provider' => $data_['fournisseur'][$i], 'amount' => $data_['devis'][$i]));
		}

		$dataBC = array('numero' =>$data_['numero'], 'date' => $data_['date'], 'fournisseurs_id' => $data_['fournisseurs_id'], 'nature_prestation' => $data_['nature_prestation'], 'project_id' =>$data_['project_id'], 'sub_project_id' =>$data_['sub_project_id'], 'autre_devis' => serialize($add_provider));

		$bcLastId = $this->BonCommande->save($dataBC);



		$articles = $data_["articles"];

		$quantites = $data_["quantites"];

		$prix = $data_["prix"];

		$tva = $data_["tva"];

		$descriptions = $data_["descriptions"];

		for($i=0;$i<count($articles);$i++) {

			$idToIsert = $this->exp_besoin_articles->insert(array('exp_besoin_id'=>$expIdToInsert,'articles_id'=>$articles[$i],'quantite'=>$quantites[$i],'tva'=>$tva[$i],'prix'=>$prix[$i],'description'=>$descriptions[$i]));

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

	/* building a BC list prepared for controle */
	public function listBcforCtr ($status = 'none') {
		$this->layout = 'layouts/body'; 


		// Define Title

		switch ($status) {
			case 'none':
				$data['title'] = 'Passer des Bon de commande pour Contrôle';
				break;
			
			case 'progress':
				$data['title'] = 'BC doivent être vérifiés';
				break;
		}

		

		$data['status'] = $status;

		$data['list_bc'] = $this->BonCommande->getlistBC(array('bc.status' => 'E', 'bc.controle' => $status));

		/* Define Content */

		$data['content'] = 'home/listBcCtr';

		$data['requirements'] = 'layouts/requirements/tables';


		$this->load->view($this->layout, $data);
	}

	public function setControle ($type_controle = 'progress') {
		$data = $_POST;

		if ($type_controle == 'progress') {

			$borderau = $this->Bordereau->getwhere(array('src' => 'ctrl'), true);
			$bNum = intval($borderau[0]->numero) + 1;
			$this->Bordereau->insert(array('numero' => $bNum, 'src' => 'ctrl', 'user_id' => $this->session->userdata('userId')));

			/* Updtae Bon Commande */
			$rmks = array();
			for ($i = 0; $i < count($data['bcRmk']); $i++)
				if (!empty($data['bcRmk'][$i]))
					$rmks[] = $data['bcRmk'][$i];

			for  ($i = 0; $i < count($data['bcCtr']); $i++) {
				$this->BonCommande->update(array('id' => $data['bcCtr'][$i], 'controle' => $type_controle, 'ctrl_bordereau' => $bNum, 'ctrl_remarque' => $rmks[$i]));
			}
		}
		elseif ($type_controle == 'feed') {
			for  ($i = 0; $i < count($data['bcCtr']); $i++) {
				$this->BonCommande->update(array('id' => $data['bcCtr'][$i], 'controle' => $type_controle));
			}
		}
		
		
		redirect('BC/listBcforCtr');
		
	}



}

