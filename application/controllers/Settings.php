<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

	function __construct(){	    
	   parent::__construct();
	   $this->checkIfLogged();

	   $this->layout = 'layouts/body'; // temporary
	}

	public function index()	{
		/* Load Models */
		$this->load->model('Articles');
		$this->load->model('ProductCategory');

		// Define Title
		$data['title'] = 'UCA Finance - Gestion des Articles';

		/* Forward list of prooducts to the view */
		$data['list'] = $this->Articles->getAllJoin();

		/* Forward list of prooducts categories to the view */
		$data['categories_list'] = $this->ProductCategory->getAll();
		
		/* Define Content */
		$data['content'] = 'settings/product';
		$data['requirements'] = 'layouts/requirements/tables';

		$this->load->view($this->layout, $data);
	}

	public function editProduct($id = 0) {
		$this->load->model('Articles');
		$this->load->model('ProductCategory');
		$this->load->model('TypeDepense');
		
		//$this->Articles->save();
		/* if mode edit */
		if (isset($id) && intval($id) > 0) {
			$result = $this->Articles->getById($id);
			foreach ($result as $row)
				$data['data'] = $row;
		}
			

		/* Forward list of prooducts categories to the view */
		$data['categories_list'] = $this->ProductCategory->getAll();
		$data['depense_list'] = $this->TypeDepense->getAll();

		/* Define Content */
		$data['content'] = 'settings/edit_product';
		$data['requirements'] = 'layouts/requirements/forms';

		$this->load->view($this->layout, $data);

	}

	public function saveProduct() {
		$this->load->model('Articles');
		$this->Articles->save($_POST);

		redirect('settings/editProduct?CISuccess=1');		
	}

	public function listApplicant() {
		/* Load Models */
		$this->load->model('Demandeurs');

		/* Forward list of prooducts to the view */
		$data['list'] = $this->Demandeurs->getAll();
		
		/* Define Content */
		$data['content'] = 'settings/applicant';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}

	public function editApplicant($id = 0) {
		/* Load Models */
		$this->load->model('Etablissements');
		$this->load->model('Demandeurs');

		/* Forward list of prooducts to the view */
		$data['etablissement_list'] = $this->Etablissements->getAll();
		
		/* if mode edit */
		if (isset($id) && intval($id) > 0) {
			$result = $this->Demandeurs->getById($id);
			foreach ($result as $row)
				$data['data'] = $row;
		}

		/* Define Content */
		$data['content'] = 'settings/edit_applicant';
		$data['requirements'] = 'layouts/requirements/forms';
		
		$this->load->view($this->layout, $data);
	}

	public function saveApplicant() {
		$this->load->model('Demandeurs');
		$this->Demandeurs->save($_POST);

		redirect('settings/editApplicant?CISuccess=1');		
	}

	public function listProjects() {
		/* Load Models */
		$this->load->model('Projects');

		/* Forward list of prooducts Projectsto the view */
		$data['list'] = $this->Projects->getAll();
		
		/* Define Content */
		$data['content'] = 'settings/projects';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}


	public function editProject($id = 0) {
		/* Load Models */
		$this->load->model('Projects');

		if (isset($id) && intval($id) > 0) {
			$result = $this->Projects->getById($id);
			foreach ($result as $row)
				$data['data'] = $row;
		}

		/* get project info  
		if(isset($id) && intval($id) > 0){
			$result = $this->Projects->getBudjetProjectById($id);
			foreach ($result as $row){
				$data['data']= $row;
				$budget_ids[] = $row->budget_id;
			}
			$data['budgetSelectedValues'] = $budget_ids;
		}*/
		
		/* Define Content */
		$data['content'] = 'settings/edit_project';
		$data['requirements'] = 'layouts/requirements/forms';
		$this->load->view($this->layout, $data);
	}

	public function saveProject() {
		$this->load->model('Projects');
		$this->Projects->save($_POST);
		$id=$_POST['id'];
		redirect('settings/editProject/'.$id.'/?CISuccess=1');		
	}

	public function listSousProjects() {
		/* Load Models */
		$this->load->model('SousProjects');

		/* Forward list of prooducts Projectsto the view */
		$data['list'] = $this->SousProjects->getAllProjetSousProjet();
		
		/* Define Content */
		$data['content'] = 'settings/sousprojects';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}


	public function editSousProject($id = 0) {
		/* Load Models */
		$this->load->model('SousProjects');
		$this->load->model('Projects');

		$data['listProjects'] = $this->Projects->getAll();

		if (isset($id) && intval($id) > 0) {
			$result = $this->SousProjects->getProjetSousProjetById($id);
			foreach ($result as $row)
				$data['data'] = $row;
		}

		/* get project info  
		if(isset($id) && intval($id) > 0){
			$result = $this->Projects->getBudjetProjectById($id);
			foreach ($result as $row){
				$data['data']= $row;
				$budget_ids[] = $row->budget_id;
			}
			$data['budgetSelectedValues'] = $budget_ids;
		}*/
		
		/* Define Content */
		$data['content'] = 'settings/edit_sous_project';
		$data['requirements'] = 'layouts/requirements/forms';
		$this->load->view($this->layout, $data);
	}

	public function saveSousProject() {
		$this->load->model('SousProjects');
		$this->SousProjects->save($_POST);
		$id=$_POST['id'];
		redirect('settings/editSousProject/'.$id.'/?CISuccess=1');	
	}

	public function listProvider() {
		/* Load Models */
		$this->load->model('Fournisseur');

		/* Forward list of prooducts Projectsto the view */
		$data['list_provider'] = $this->Fournisseur->getAll();
		
		/* Define Content */
		$data['content'] = 'settings/providers';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}

	public function editProvider($id = 0) {
		/* Load Models */
		$this->load->model('Fournisseur');
		
		/* if mode edit */
		if (isset($id) && intval($id) > 0) {
			$result = $this->Fournisseur->getById($id);
			foreach ($result as $row)
				$data['data'] = $row;
		}

		/* Define Content */
		$data['content'] = 'settings/edit_provider';
		$data['requirements'] = 'layouts/requirements/forms';
		
		$this->load->view($this->layout, $data);
	}

	public function saveProvider() {
		$this->load->model('Fournisseur');
		$this->Fournisseur->save($_POST);

		redirect('settings/editProvider?CISuccess=1');		
	}

	public function getBudgetByType() {
		$this->load->model('BudgetProjet');

		header('Content-Type: application/json');
		$budget_type = $this->input->get("budget_type");
		echo json_encode($this->BudgetProjet->getBudgetByType($budget_type));
	}

	public function budget() {
		/* Load Models */
		$this->load->model('Budget_etablissement');
		$this->load->model('Etablissements');

		if (isset($_GET) && count($_GET) > 0)
			$data['list'] = $this->Budget_etablissement->getBudgetByEtablissementId($_GET['etablissements_id'], $_GET['budget_type']);
		else
			$data['list'] = $this->Budget_etablissement->getBudgetByEtablissementId();
			
		$data['etablissement_list'] = $this->Etablissements->getAll();
		
		/* Define Content */
		$data['content'] = 'settings/budgets';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);

	}

	//yns : gestion categories des depenses. 

	public function listDepenseCategorie() {
		/* Load Models */
		$this->load->model('DepenseCategorie');

		/* Forward list of prooducts Projectsto the view */
		$data['list'] = $this->DepenseCategorie->getAll();
		
		/* Define Content */
		$data['content'] = 'settings/depense_categorie';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}

	public function editDepenseCategorie($id = 0) {
		/* Load Models */
		$this->load->model('DepenseCategorie');

		if (isset($id) && intval($id) > 0) {
			$result = $this->DepenseCategorie->getById($id);
			foreach ($result as $row)
				$data['data'] = $row;
		}
		
		/* Define Content */
		$data['content'] = 'settings/edit_depense_categorie';
		$data['requirements'] = 'layouts/requirements/forms';
		
		$this->load->view($this->layout, $data);
	}

	public function saveDepenseCategorie() {
		$this->load->model('DepenseCategorie');
		$this->DepenseCategorie->save($_POST);

		redirect('settings/editDepenseCategorie?CISuccess=1');		
	}

	//yns : gestion des Conventions. 

	public function listConvention() {
		/* Load Models */
		$this->load->model('Convention');

		/* Forward list of prooducts Projectsto the view */
		$data['list'] = $this->Convention->getAll();
		
		/* Define Content */
		$data['content'] = 'settings/convention';
		$data['requirements'] = 'layouts/requirements/tables';
		
		$this->load->view($this->layout, $data);
	}

	public function editConvention($id = 0) {
		/* Load Models */
		$this->load->model('Convention');

		if (isset($id) && intval($id) > 0) {
			$result = $this->Convention->getById($id);
			foreach ($result as $row)
				$data['data'] = $row;
		}
		
		/* Define Content */
		$data['content'] = 'settings/edit_convention';
		$data['requirements'] = 'layouts/requirements/forms';
		
		$this->load->view($this->layout, $data);
	}

	public function saveConvention() {
		$this->load->model('Convention');
		$this->Convention->save($_POST);

		redirect('settings/editConvention?CISuccess=1');		
	}

		// gestion des interessés

	public function listInteresse() {
		$this->load->model('Interesse');
		/* Forward list of prooducts Projectsto the view */
		$data['list_interesse'] = $this->Interesse->getAll();
		/* Define Content */
		$data['content'] = 'settings/interesse';
		$data['requirements'] = 'layouts/requirements/tables';
		$this->load->view($this->layout, $data);
	}

	public function editInteresse($cin =null) {
		/* Load Models */
		$this->load->model('Interesse');
		/* if mode edit */
		if (isset($cin) && strlen($cin)>0) {
			$result = $this->Interesse->getByCin(strtoupper($cin));
			foreach ($result as $row)
				$data['data'] = $row;

		}
		/* Define Content */
		$data['content'] = 'settings/edit_interesse';
		$data['requirements'] = 'layouts/requirements/forms';
		
		$this->load->view($this->layout, $data);
	}

	public function saveInteresse() {
		$this->load->model('Interesse');
		$_POST['cin'] = strtoupper($_POST['cin']);
		$this->Interesse->save($_POST);
		redirect('settings/editInteresse?CISuccess=1');		
	}

}
