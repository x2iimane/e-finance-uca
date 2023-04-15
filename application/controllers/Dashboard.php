<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
	    
		parent::__construct();
		$this->checkIfLogged();
		
		$this->load->model('bon_commande');
		$this->load->model('marches');
		$this->load->model('budget_etablissement');
		$this->load->model('etablissements');
		$this->load->model('ao');

	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/dashboard';
		
		$this->load->view($this->layout, $data);
	}

	//ce mois
	public function getNbrBC()
	{
		header('Content-Type: application/json');
		echo json_encode($this->bon_commande->getCountThisMonth($this->input->get("year")));
	}

	public function getNbrAOLance()
	{
		header('Content-Type: application/json');
		echo json_encode($this->ao->getAOLance($this->input->get("year")));
	}

	public function getNbrMarchesSignes()
	{
		header('Content-Type: application/json');
		echo json_encode($this->marches->getNbrMarchesSignes($this->input->get("year")));
	}

	public function getNbrMarchesAnnules()
	{
		header('Content-Type: application/json');
		echo json_encode($this->marches->getNbrMarchesAnnules($this->input->get("year")));
	}

	public function getNbrMarchesResilies()
	{
		header('Content-Type: application/json');
		echo json_encode($this->marches->getNbrMarchesResilies($this->input->get("year")));
	}

	public function getNbrMarchesVises()
	{
		header('Content-Type: application/json');
		echo json_encode($this->marches->getNbrMarchesVises($this->input->get("year")));
	}

	public function montantMarchesByNature()
	{
		header('Content-Type: application/json');
		echo json_encode($this->marches->montantMarchesByNature($this->input->get("year")));
	}

	public function getAOLance()
	{
		header('Content-Type: application/json');
		echo json_encode($this->ao->getAOLance($this->input->get("year")));
	}

	public function getAOAdjuge()
	{
		header('Content-Type: application/json');
		echo json_encode($this->ao->getAOAdjuge($this->input->get("year")));
	}

	public function getNbrAOByMonth()
	{
		header('Content-Type: application/json');
		echo json_encode($this->ao->getNbrAOByMonth($this->input->get("year")));
	}

	public function getNbrMarcheByMonth()
	{
		header('Content-Type: application/json');
		echo json_encode($this->marches->getNbrMarcheByMonth($this->input->get("year")));
	}
	//nbrAOInfructueux

	public function getNbrAOInfructueux()
	{
		header('Content-Type: application/json');
		echo json_encode($this->ao->getNbrAOInfructueux($this->input->get("year")));
	}

	//getMarcheMontant

	public function getMontantMarche()
	{
		header('Content-Type: application/json');
		echo json_encode($this->marches->getMontantMarche($this->input->get("year")));
	}

	public function getYears(){
		header('Content-Type: application/json');
		echo json_encode($this->ao->getYears());
	}
}
