<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller {

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

		redirect('Product/editProduct?CISuccess=1');
	}

}
