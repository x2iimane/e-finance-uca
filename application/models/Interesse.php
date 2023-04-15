<?php

class Interesse extends CI_Model {

	private $_use_table = 'interesse';

	public function __construct () {
		parent::__construct();
		//$this->load->model($this->_use_table);
	}


	public function getAll() {
		return $this->db->get($this->_use_table)->result();
	}

	public function getByCin($cin) {
		return $this->db->get_where($this->_use_table, array('cin' => $cin))->result();
	}

	public function delete($cin)	{
		$this->db->delete($this->_use_table, array('cin' => $cin));
	}

	public function save($data) {
		if (!empty($data['cin']) && intval($data['cin']) > 0) {
			$this->db->where('cin', $data['cin']);
			$this->db->update($this->_use_table, $data);
		}
		else {
			$sql = $this->db->insert_string($this->_use_table, $data);
			$this->db->query($sql);
		}
	}
}

?>