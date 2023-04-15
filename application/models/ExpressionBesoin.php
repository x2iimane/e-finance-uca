<?php

class ExpressionBesoin extends CI_Model {

	private $_use_table = 'exp_besoin';

	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);
	}


	public function insert($data)
	{
			$this->db->insert($this->_use_table, $data);
	}

	public function getAll()
	{
		return $this->db->get($this->_use_table)->result();
	}
}

?>