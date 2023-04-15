<?php

class Budgetrojet extends CI_Model {

	private $_use_table = 'budget_projet';

	public function __construct () {
		parent::__construct();
	}

	public function getAll() {
		return $this->db->get($this->_use_table)->result();
	}

	public function getBudgetByType($type) {
		$query = $this->db->query('SELECT * FROM Budget WHERE type = ' . $type);
		return $query->result();
	}

}

?>