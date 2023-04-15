<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListeBC extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('exp_besoin');
		$this->load->model('bon_commande');
		$this->load->model('exp_besoin_articles');
		$this->load->model('exp_besoin_commande');
		$this->load->model('fournisseurs');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/listeBC';

		$this->load->view($this->layout, $data);
	}
	public function getBCs(){
		header('Content-Type: application/json');

		$bcs = $this->bon_commande->getAllBcExpand($this->input->get("year"));
		echo json_encode($bcs);
	}

	public function update(){
		$bc = $this->input->post("bc");
		$response = $this->bon_commande->update($bc);
		echo $response;
	}

	public function delete(){

		$id = $this->input->get("id");
		$exp_besoin_articles = $this->input->get("articles");

		$this->bon_commande->delete($id,$exp_besoin_articles);
		echo "1";
	}

}
