<?php

class SousProjects extends CI_Model {

	private $_use_table = 'sous_projets';

	public function __construct () {
		parent::__construct();
		//$this->load->model($this->_use_table);
	}


	public function getAll() {
		return $this->db->get($this->_use_table)->result();
	}

	public function getAllProjetSousProjet() {
		$this->db->select('sp.id , sp.intitule, sp.description, p.id as idp, p.intitule as intitulep ');
		$this->db->from($this->_use_table.' as sp');
		$this->db->join('projets as p', 'sp.projets_id = p.id');
		return $this->db->get()->result();
	}

	public function getById($id) {
		return $this->db->get_where($this->_use_table, array('id' => $id))->result();
	}

	public function getProjetSousProjetById($id) {
		$this->db->select('sp.id , sp.intitule, sp.description, p.id as idp, p.intitule as intitulep ');
		$this->db->from($this->_use_table.' as sp');
		$this->db->join('projets as p', 'sp.projets_id = p.id');
		$this->db->where('sp.id', $id);
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
			$this->db->update($this->_use_table, array('intitule' => $data['intitule'], 'description' => $data['description'], 'projets_id'=> $data['projets_id']));
			//update budjet_projet info
			//$this->db->insert('budget_projet', array('projets_id' => $data['id'], 'budget_type' => $data['budget_type'], 'budget_id' => $data['budget_id']));
		}
		else{
			//insert code
			$sql = $this->db->insert_string($this->_use_table, array('intitule' => $data['intitule'], 'description' => $data['description'], 'projets_id'=> $data['projets_id']));
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