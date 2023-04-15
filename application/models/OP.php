<?php

class OP extends CI_Model {

	private $_use_table = 'op';

	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);
	}


	public function insert($data) {
			$this->db->insert($this->_use_table, $data);
	}


	public function getAll($conditions = array()) {
		if (isset($conditions) && count($conditions) > 0)
			return $this->db->get_where($this->_use_table, $conditions)->result();
		else
			return $this->db->get($this->_use_table)->result();
	}

	public function getById($id) {
		return $this->db->get_where($this->_use_table, array('id' => $id))->result();
	}

	public function delete($id) {
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function save($data) {
		if (!empty($data['id']) && intval($data['id']) > 0) {
			$this->db->where('id', $data['id']);
			$this->db->update($this->_use_table, $data);
		}
		else {
			$sql = $this->db->insert_string($this->_use_table, $data);
			$this->db->query($sql);
		}

	}


}

?>