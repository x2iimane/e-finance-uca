<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListeMarche extends MY_Controller {

	function __construct(){
	    
	    parent::__construct();
	    $this->checkIfLogged();
		
		$this->load->model('ao');
		$this->load->model('marches');
		$this->load->model('decomptes');
		$this->load->model('attachement_livraison');
		$this->load->model('reclamation_marche');
		$this->load->model('arret_reprise_marches');
	}

	public function index()	{
		// Define Title
		$data['title'] = '';

		/* Define Content */
		$data['content'] = 'home/listeMarche';

		$this->load->view($this->layout, $data);
	}
	public function getMarches(){
		header('Content-Type: application/json');

		$filter = null;
		if($this->input->get("filter"))
			$filter = $this->input->get("filter");

		$marches = $this->marches->getAllMarcheExpand($filter,$this->input->get("year"));
		echo json_encode($marches);
	}

	public function update(){
		$marche = $this->input->post("marche");
		$response = $this->marches->update($marche);
		echo $response;
	}

	public function delete(){
		$id = $this->input->get("id");
		$this->marches->delete($id);
		echo "1";
	}

	public function deleteDecompte(){
		$id = $this->input->get("id");
		$this->decomptes->delete($id);
		echo "1";
	}

	public function deleteAttachementLivraison(){
		$id = $this->input->get("id");
		$this->attachement_livraison->delete($id);
		echo "1";
	}

	public function updateDecompte()
	{
		$decompte = $this->input->post("decompte");
		$response = $this->decomptes->update($decompte);
		echo $response;
	}

	public function updateAttachementLivraison()
	{
		$attachement_livraison = $this->input->post("attachement_livraison");
		$response = $this->attachement_livraison->update($attachement_livraison);
		echo $response;
	}

	public function addDecompte()
	{
		$decompte = $this->input->post("decompte");

		$decompte["date"] = date("Y-m-d", $decompte["date"]/1000);

		$response = $this->decomptes->insert($decompte);
		echo $response;//last id
	}

	public function addAttachementLivraison()
	{
		$attachement_livraison = $this->input->post("attachement_livraison");

		$attachement_livraison["date_livraison"] = date("Y-m-d", $attachement_livraison["date_livraison"]/1000);

		$response = $this->attachement_livraison->insert($attachement_livraison);
		echo $response;//last id
	}

	public function updateReclamation()
	{
		$reclamation = $this->input->post("reclamation");
		$response = $this->reclamation_marche->update($reclamation);
		echo $response;
	}

	public function addReclamation()
	{
		$reclamation = $this->input->post("reclamation");

		$reclamation["date"] = date("Y-m-d", $reclamation["date"]/1000);

		$response = $this->reclamation_marche->insert($reclamation);
		echo $response;//last id
	}

	public function deleteReclamation(){
		$id = $this->input->get("id");
		$this->reclamation_marche->delete($id);
		echo "1";
	}

	public function addArretReprise()
	{
		$arret_reprise_marches = $this->input->post("arret_reprise_marches");

		$arret_reprise_marches["date"] = date("Y-m-d", $arret_reprise_marches["date"]/1000);

		$response = $this->arret_reprise_marches->insert($arret_reprise_marches);
		echo $response;//last id
	}


	public function deleteArretReprise(){
		$id = $this->input->get("id");
		$this->arret_reprise_marches->delete($id);
		echo "1";
	}

	public function updateArretReprise()
	{
		$arret_reprise_marches = $this->input->post("arret_reprise_marches");
		$response = $this->arret_reprise_marches->update($arret_reprise_marches);
		echo $response;
	}

}
