<?php

class ProductCategory extends CI_Model {

	private $_use_table = 'article_categories';

	public function __construct () {
		parent::__construct();
	}


	public function getAll() {
		return $this->db->get($this->_use_table)->result();
	}

}

?>