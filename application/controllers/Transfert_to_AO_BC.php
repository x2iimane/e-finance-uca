<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transfert_to_AO_BC extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('exp_besoin');
		$this->load->model('exp_besoin_ao');
		$this->load->model('ao');
		$this->load->model('exp_besoin_articles');
		$this->load->model('exp_besoin_ao');
		$this->load->model('fournisseurs');
		$this->load->model('bon_commande');
		$this->load->model('exp_besoin_commande');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/transfert_to_AO_BC';

		$this->load->view($this->layout, $data);
	}
	public function getExpBesoins(){
		header('Content-Type: application/json');
		$expressionBesoinId = null;
		if($this->input->get("expressionBesoinId"))
			$expressionBesoinId = $this->input->get("expressionBesoinId");

		$exp_besoins = $this->exp_besoin->getAllExpandArticles($expressionBesoinId);
		echo json_encode($exp_besoins);
	}

	public function getFournisseurs(){
		header('Content-Type: application/json');
		$exp_besoins = $this->fournisseurs->getAll();
		echo json_encode($exp_besoins);
	}

	public function newAO()
	{
		header('Content-Type: application/json');
		$aojson = $this->input->post("ao");

		$ao = array('numero'=>$aojson["numero"],'intitule'=>$aojson["intitule"],'mode_execution'=>$aojson["modeExecution"],'date'=>$aojson["date"]);

		$exp_besoin_articles = $aojson["items"];

		$ao_id = $this->ao->insert($ao);//insertion AO

		for($i=0;$i<count($exp_besoin_articles);$i++)
		{
			//$this->exp_besoin_articles->updateStatusById($exp_besoin_articles[$i]["exp_besoin_articles_id"],'ao');
			$this->exp_besoin_articles->updateAffectedToById($exp_besoin_articles[$i]["exp_besoin_articles_id"],'AO ('.$ao["numero"].')');
			$this->exp_besoin_ao->insert(array('exp_besoin_articles_id'=>$exp_besoin_articles[$i]["exp_besoin_articles_id"],'AO_id'=>$ao_id));
		}

		echo json_encode($exp_besoin_articles);
	}
	//NB: il faut utiliser un Trigger lors de la suppression d'une ligne de AO ou BC (càd exp_besoin_ao ou bc) afin d'affecter 0 au status   <=== trés important

	public function newBC()
	{
		header('Content-Type: application/json');
		$bcjson = $this->input->post("bc");

		$bc = array('numero'=>$bcjson["numero"],'fournisseurs_id'=>$bcjson["fournisseurs_id"],'date'=>$bcjson["date"]);

		$exp_besoin_articles = $bcjson["items"];

		$bc_id = $this->bon_commande->insert($bc);//insertion BC

		for($i=0;$i<count($exp_besoin_articles);$i++)
		{
			$this->exp_besoin_articles->updateAffectedToById($exp_besoin_articles[$i]["exp_besoin_articles_id"],'BC ('.$bc["numero"].')');
			$this->exp_besoin_commande->insert(array('exp_besoin_articles_id'=>$exp_besoin_articles[$i]["exp_besoin_articles_id"],'bon_commande_id'=>$bc_id));
		}

		echo json_encode($exp_besoin_articles);
	}

	public function getLastAoNumber()
	{
		header('Content-Type: application/json');
		echo json_encode($this->ao->getLastNumber());
	}

	public function getLastBcNumber()
	{
		header('Content-Type: application/json');
		echo json_encode($this->bon_commande->getLastNumber());
	}
}
