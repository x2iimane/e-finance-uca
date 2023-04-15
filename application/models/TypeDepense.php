<?php

class TypeDepense extends CI_Model {

	private $_use_table = 'type_depenses';

	public function __construct () {
		parent::__construct();
	}


	public function getAll() {
		return $this->db->get($this->_use_table)->result();
	}

}

?>