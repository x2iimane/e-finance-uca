<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListeExpressionBesoin extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('exp_besoin');
		$this->load->model('exp_besoin_articles');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/listeExpressionBesoin';
		$data['expressionBesoins'] = $this->exp_besoin->getAllExpand();

		//print_r($data["expressionBesoins"]);

		$this->load->view($this->layout, $data);
	}

	public function delete()
	{
		$id = $this->input->get("id");
		$this->exp_besoin_articles->deleteByExpBesoinId($id);
		$this->exp_besoin->delete($id);
	}
}
