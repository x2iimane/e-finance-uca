<?php

class ExpBesoinCommande extends CI_Model {

	private $_use_table = 'exp_besoin_commande';

	public function __construct () {
		parent::__construct();
	}

	public function save($data) {
		$this->db->insert($this->_use_table, $data);
		$insert_id = $this->db->insert_id();
		
		return $insert_id;
	}

}

?>