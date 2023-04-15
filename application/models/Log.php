<?php



class Log extends CI_Model {



	private $_use_table = 'logs';



	public function __construct () {

		parent::__construct();

	}



	public function saveLog($data) {

		$this->db->insert($this->_use_table, $data);

		$insert_id = $this->db->insert_id();
		
		return $insert_id;

	}

}



?>