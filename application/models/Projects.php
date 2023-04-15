<?php

class Projects extends CI_Model {

	private $_use_table = 'projets';

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

	public function getBudjetProjectById($id) {
		$this->db->select('*');
		$this->db->from($this->_use_table.' as p');
		$this->db->join('budget_projet as bp', 'p.id = bp.projets_id');
		$this->db->where('p.id', $id);
		return $this->db->get()->result();
		//return $this->db->get_where($this->_use_table, array('id' => $id))->result();
	}

	public function delete($id)	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function save($data) {
		if (!empty($data['id']) && intval($data['id']) > 0) {
			//update code
			$this->db->where('id', $data['id']);
			$this->db->update($this->_use_table, array('intitule' => $data['intitule'], 'description' => $data['description']));
			//update budjet_projet info
			//$this->db->insert('budget_projet', array('projets_id' => $data['id'], 'budget_type' => $data['budget_type'], 'budget_id' => $data['budget_id']));
		}
		else{
			//insert code
			$sql = $this->db->insert_string($this->_use_table, array('intitule' => $data['intitule'], 'description' => $data['description']));
			$this->db->query($sql);
			//$insertId = $this->db->insert_id();
			//update budjet_projet info
			//$this->db->insert('budget_projet', array('projets_id' => $insertId, 'budget_type' => $data['budget_type'], 'budget_id' => $data['budget_id']));
		}
	}

	/*public function save($data) {
		if (!empty($data['id']) && intval($data['id']) > 0) {
			//update code
			$this->db->where('id', $data['id']);
			$this->db->update($this->_use_table, array('intitule' => $data['intitule'], 'description' => $data['description']));
			//update budjet_projet info
			$this->db->insert('budget_projet', array('projets_id' => $data['id'], 'budget_type' => $data['budget_type'], 'budget_id' => $data['budget_id']));
		}
		else{
			//insert code
			$sql = $this->db->insert_string($this->_use_table, array('intitule' => $data['intitule'], 'description' => $data['description']));
			$this->db->query($sql);
			$insertId = $this->db->insert_id();
			//update budjet_projet info
			$this->db->insert('budget_projet', array('projets_id' => $insertId, 'budget_type' => $data['budget_type'], 'budget_id' => $data['budget_id']));
		}
	}*/
}

?>