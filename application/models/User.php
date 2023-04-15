<?php



class User extends CI_Model {



	private $_use_table = 'users';



	public function __construct () {

		parent::__construct();

	}



	public function login() {

		$query = $this->db->get_where($this->_use_table, array('login' => $this->input->post('login'), 'password' => md5($this->input->post('password')), 'status' => 1));



		if ($query->num_rows() == 1)

			return $query->row();

		else

			return false;

	}



	public function getPermission($iduser){

		$this->db->select('*');

		$this->db->from('module_user');

		$this->db->where('id_user',$iduser);

		$this->db->join('modules', 'modules.id = module_user.id_module');

		$query = $this->db->get();



		if ($query->num_rows() >0)

			return $query->result_array();

		else

			return false;

	}



}



?>