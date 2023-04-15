<?php

class Retrait_dossier_ao extends CI_Model {

	private $_use_table = 'retrait_dossier_ao';

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


	public function getAll() {
		return $this->db->get($this->_use_table)->result();
	}

	public function getById($id) {
		return $this->db->get_where($this->_use_table, array('id' => $id))->result();
	}
	
	public function delete($id) {
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function update($publication)
	{
		$this->db->set('comment', $publication["comment"]);
		$this->db->set('depot_heure', $publication["depot_heure"]);
		$this->db->set('visite_lieux_responsable', $publication["visite_lieux_responsable"]);
		$this->db->set('candidat', $publication["candidat"]);

		if($publication["depot_date"] == null)
			$this->db->set('depot_date', null);
		else
			$this->db->set('depot_date', date("Y-m-d", $publication["depot_date"]/1000));

		if($publication["retrait_date"] == null)
			$this->db->set('retrait_date', null);
		else
			$this->db->set('retrait_date', date("Y-m-d", $publication["retrait_date"]/1000));

		if($publication["visite_lieux_date"] == null)
			$this->db->set('visite_lieux_date', null);
		else
			$this->db->set('visite_lieux_date', date("Y-m-d", $publication["visite_lieux_date"]/1000));

		if($publication["depot_echan_prospect_date"] == null)
			$this->db->set('depot_echan_prospect_date', null);
		else
			$this->db->set('depot_echan_prospect_date', date("Y-m-d", $publication["depot_echan_prospect_date"]/1000));

		$this->db->where('id', $publication["id"]);
		return $this->db->update($this->_use_table);
	}
}

?>