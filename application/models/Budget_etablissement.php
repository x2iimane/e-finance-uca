<?php

class Budget_etablissement extends CI_Model {

	private $_use_table = 'budget_etablissement';

	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);
	}


	public function insert($data)
	{
			$this->db->insert($this->_use_table, $data);
	}

	public function getAll()
	{
		return $this->db->get($this->_use_table)->result();
	}

	public function getBudgetByEtablissementId($etablissements_id = 1,$budget_type = 'Fonctionnement') {
		$query = $this->db->query("SELECT b.*, e.intitule AS name, be.budget FROM budget b, etablissements e, budget_etablissement be WHERE e.id = be.etablissements_id and b.id = be.budget_id and b.type = be.budget_type and be.etablissements_id =".$etablissements_id." AND be.budget_type = '$budget_type'");
	//	print_r($query->result());
		return $query->result();
	}

	public function getBudgetEtablissementIdByBudgetIdAndEtablissementId($budget_id,$etablissements_id)
	{
		$query = $this->db->query('SELECT be.id from budget_etablissement be where be.budget_id = '.$budget_id.' AND etablissements_id = '.$etablissements_id);

		return $query->result()[0]->id;
	}
	public function delete($id)
	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}
}

?>