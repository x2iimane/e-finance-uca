<?php

class Publication_ao extends CI_Model {

	private $_use_table = 'publication_ao';

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
		$this->db->set('type', $publication["type"]);
		$this->db->set('langue', $publication["langue"]);
		$this->db->set('journal', $publication["journal"]);


		if($publication["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $publication["date"]/1000));

		$this->db->where('id', $publication["id"]);
		return $this->db->update($this->_use_table);
	}
}

?>