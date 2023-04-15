<?php

class Exp_besoin_articles extends CI_Model {

	private $_use_table = 'exp_besoin_articles';

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

	public function deleteByExpBesoinId($exp_besoin_id)
	{
		$this->db->delete($this->_use_table, array('exp_besoin_id' => $exp_besoin_id)); // multiple delete, on peut utiliser on delete cascade à la place cette fonction

	}
/*
	public function updateStatusById($id,$affectedTo)
	{
		if($affectedTo == 'ao')
			$this->db->set('status', 1, FALSE);
		else
			$this->db->set('status', 2, FALSE);

		$this->db->where('id', $id);
		$this->db->update($this->_use_table);
	}*/

	public function updateAffectedToById($id,$affectedTo)
	{
		$this->db->set('affected_to', $affectedTo);
		$this->db->where('id', $id);
		$this->db->update($this->_use_table);
	}
}

?>