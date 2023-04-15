<?php

class Decomptes extends CI_Model {

	private $_use_table = 'decomptes';

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

	public function getAllJoin () {
		$this->db->select('d.*, m.numero, m.intitule AS desc, m.montantTTC');
		$this->db->from($this->_use_table . ' d');
		$this->db->join('marches m', 'm.id = d.marches_id');

		return  $this->db->get()->result();
	}

	public function getById($id) {

	}

	public function delete($id)
	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function update($decompte)
	{
		$this->db->set('intitule', $decompte["intitule"]);
		$this->db->set('comment', $decompte["comment"]);
		$this->db->set('montant', $decompte["montant"]);

		$this->db->set('ordonnance', $decompte["ordonnance"]);

		if($decompte["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $decompte["date"]/1000));

		$this->db->where('id', $decompte["id"]);
		return $this->db->update($this->_use_table);
	}

}

?>