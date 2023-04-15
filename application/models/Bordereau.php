<?php



class Bordereau extends CI_Model {



	private $_use_table = 'bordereau';



	public function __construct () {

		parent::__construct();

		$this->load->model($this->_use_table);

	}





	public function insert($data) {

			$this->db->insert($this->_use_table, $data);

	}


	public function getAll() {

		return $this->db->get($this->_use_table)->result();

	}



	public function delete($id) {

		$this->db->delete($this->_use_table, array('id' => $id));

	}

	public function getwhere ($where = array(), $order = false) {
		
		if ($order)
			return $this->db->order_by('id', 'DESC')->limit(1)->get_where($this->_use_table, $where)->result();
		else
			return $this->db->get_where($this->_use_table, $where)->result();
	}





}



?>