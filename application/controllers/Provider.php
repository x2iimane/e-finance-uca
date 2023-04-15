<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provider extends MY_Controller {

	function __construct(){
	    
		parent::__construct();
		$this->checkIfLogged();
		$this->layout = 'layouts/body'; // temporary
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
		$_POST['rib'] = serialize($_POST['rib']);
		$this->Fournisseur->save($_POST);

		redirect('Provider/editProvider?CISuccess=1');
	}

}
