<?php

class Attachement_livraison extends CI_Model {

	private $_use_table = 'attachement_livraison';

	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);
	}


	public function insert($data)
	{
		$this->db->insert($this->_use_table, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}


	public function getAll()
	{
		return $this->db->get($this->_use_table)->result();
	}


	public function getById($id) {

	}

	public function delete($id)
	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function update($attachement_livraison)
	{
		$this->db->set('lot', $attachement_livraison["lot"]);
		$this->db->set('lieu', $attachement_livraison["lieu"]);
		$this->db->set('comment', $attachement_livraison["comment"]);
		$this->db->set('montant', $attachement_livraison["montant"]);
		$this->db->set('type_reception', $attachement_livraison["type_reception"]);
		$this->db->set('nature_reception', $attachement_livraison["nature_reception"]);


		if($attachement_livraison["date_livraison"] == null)
			$this->db->set('date_livraison', null);
		else
			$this->db->set('date_livraison', date("Y-m-d", $attachement_livraison["date_livraison"]/1000));

		$this->db->where('id', $attachement_livraison["id"]);
		return $this->db->update($this->_use_table);
	}

}

?>