<?php

class Exp_besoin_commande extends CI_Model {

	private $_use_table = 'exp_besoin_commande';

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

	public function delete($id)
	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function deleteByBcId($id)
	{
		$this->db->delete($this->_use_table, array('bon_commande_id' => $id)); // multiple delete, on peut utiliser on delete cascade à la place cette fonction
	}
}

?>