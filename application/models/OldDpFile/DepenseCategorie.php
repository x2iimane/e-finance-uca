<?php

class DepenseCategorie extends CI_Model {

	private $_use_table = 'depense_categorie';

	public function __construct () {
		parent::__construct();
		//$this->load->model($this->_use_table);
	}


	public function getAll() {
		return $this->db->get($this->_use_table)->result();
	}

	public function getById($id) {
		return $this->db->get_where($this->_use_table, array('id' => $id))->result();
	}

	public function delete($id)	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function save($data) {
		if (!empty($data['id']) && intval($data['id']) > 0) {
			$this->db->where('id', $data['id']);
			$this->db->update($this->_use_table, array('intitule' => $data['intitule']));
		}
		else {
			$sql = $this->db->insert_string($this->_use_table, array('intitule' => $data['intitule']));
			$this->db->query($sql);
		}
	}
}

?>