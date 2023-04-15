<?php

class Articles extends CI_Model {

	private $_use_table = 'articles';

	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);
	}


	public function insert($data)
	{
			$this->db->insert($this->_use_table, $data);
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

	public function getAllJoin() {
		$this->db->select('a.*, ac.intitule AS category, td.intitule AS type_depense');
		$this->db->from($this->_use_table . ' a');
		$this->db->join('article_categories ac', 'ac.id = a.article_categories_id');
		$this->db->join('type_depenses td', 'td.id = a.type_depenses_id');		
		
		return $this->db->get()->result_array();
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