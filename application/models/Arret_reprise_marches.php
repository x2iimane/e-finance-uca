<?php

class Arret_reprise_marches extends CI_Model {

	private $_use_table = 'arret_reprise_marches';

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

	public function update($arret_reprise_marches)
	{
		$this->db->set('arret_ou_reprise', $arret_reprise_marches["arret_ou_reprise"]);
		$this->db->set('comment', $arret_reprise_marches["comment"]);

		if($arret_reprise_marches["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $arret_reprise_marches["date"]/1000));

		$this->db->where('id', $arret_reprise_marches["id"]);
		return $this->db->update($this->_use_table);
	}

}

?>