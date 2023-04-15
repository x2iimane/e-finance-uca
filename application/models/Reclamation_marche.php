<?php

class Reclamation_marche extends CI_Model {

	private $_use_table = 'reclamation_marche';

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

	public function update($reclamation)
	{
		$this->db->set('comment', $reclamation["comment"]);

		if($reclamation["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $reclamation["date"]/1000));

		$this->db->where('id', $reclamation["id"]);
		return $this->db->update($this->_use_table);
	}


}

?>