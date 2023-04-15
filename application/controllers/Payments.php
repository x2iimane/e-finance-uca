<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();

		$this->load->model('Bordereau');
		$this->load->model('OP');
		$this->load->model('budget_etablissement');
		$this->load->model('articles');
		$this->load->model('etablissements');
		$this->load->model('exp_besoin_articles');
		$this->load->model('Fournisseur');
		$this->load->model('BonCommande');
		$this->load->model('Depense');
		$this->load->model('Decomptes');
	}

	public function index()	{
		$this->layout = 'layouts/body'; 

		// Define Title
		$data['title'] = 'Ordonnancement et paiements';

		$data['list_op'] = $this->OP->getAll();
		/* Define Content */
		$data['content'] = 'op/list_op';
		$data['requirements'] = 'layouts/requirements/tables';

		$this->load->view($this->layout, $data);
		
	}

	public function listBc() {
		$this->layout = 'layouts/body'; 
		$data['title'] = 'Liste des Bon De Commandes Liquidés pour Ordonnancement';

		$data['list_bc'] = $this->BonCommande->getlistBC();

		/* Define Content */
		$data['content'] = 'op/list_bc';
		$data['requirements'] = 'layouts/requirements/tables';

		$this->load->view($this->layout, $data);
	}

	public function listOfBills() {
		$this->layout = 'layouts/body'; 
		$data['title'] = 'Liste des Dépenses Liquidés pour Ordonnancement';

		$data['list_depenses'] = $this->Depense->getAllWithProvider();

		/* Define Content */
		$data['content'] = 'op/list_depenses';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}

	public function listDecompte () {
		$this->layout = 'layouts/body'; 
		$data['title'] = 'Liste des Dcomptes Liquidés pour les Marchés';

		$data['list_decomptes'] = $this->Decomptes->getAllJoin();

		/* Define Content */
		$data['content'] = 'op/list_decomptes';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}

	public function addOP ($type = 'D', $engagementId = 0, $Id = 0) {

		$data['title'] = 'Nouveau Ordre de Paiement';
		$data['sub_total'] = $data['mnt_ttc'] = 0;
		
		/* Define Content */
		$data['content'] = 'op/add';

		switch ($type) {
			case 'D' :
				$_data = $this->Depense->getAllBpExpand($engagementId);
				break;
			case 'BC' :
				$_data = $this->BonCommande->getAllBcExpand($engagementId);
				break;
		}
		
		// fetch data
		$data['bc_details'] = $_data[0];

		/* get url param */
		$data['params'] = array('type_engagement' => $type, 'id_engagement' => $engagementId);

		/* if mode edit */
		if ($Id > 0) {
			$result = $this->OP->getById($Id);
			foreach ($result as $row)
				$data['op'] = $row;

			$data['op']->rejet = unserialize($data['op']->rejet);
		}

		$this->load->view($this->layout, $data);
	}

	public function save() {
		$_data = $_POST;
		$_data['rejet'] = serialize($_data['rejet']);
		$_data['amount'] = substr(preg_replace('/[^0-9.]+/', '', $_data['amount']), 0, -2);

		$this->OP->save($_data);
		switch ($_data['type_engagement']) {
			case 'BC':
				$this->BonCommande->update(array('id' => $_POST['id_engagement'], 'status' => 'P'));
				break;
			case 'D':
				$this->Depense->globalUpdate(array('id' => $_POST['id_engagement'], 'statut' => 'P'));
				break;							
		}
		
		redirect('Payments/');	
	}

}
