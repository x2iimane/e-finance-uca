<?php

class Exp_besoin extends CI_Model {

	private $_use_table = 'exp_besoin';

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
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->order_by("exp_besoin.id", "desc");
		return $this->db->get()->result();
	}

	public function getAllExpand()
	{
		$this->db->select('date,service,responsable,objet,remarque,numero,exp_besoin.id');
		$this->db->from($this->_use_table);
		$this->db->where('exp_besoin.numero > 0');
		$this->db->join('demandeurs', 'demandeurs.id = exp_besoin.demandeurs_id');
		$this->db->order_by("exp_besoin.id", "desc");

		return $this->db->get()->result();
	}

	public function getAllExpandArticlesByExpressionBesoinId($expressionBesoinId)
	{
		$this->db->select('date as date,service,responsable,objet,remarque,numero,exp_besoin.id as id,exp_besoin_articles.id as exp_besoin_articles_id,exp_besoin_articles.quantite as exp_besoin_articles_quantite,exp_besoin_articles.prix as exp_besoin_articles_prix,articles.intitule as articles_intitule');
		//$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->join('demandeurs', 'demandeurs.id = exp_besoin.demandeurs_id');
		$this->db->join('exp_besoin_articles', 'exp_besoin.id = exp_besoin_articles.exp_besoin_id');
		$this->db->join('articles', 'exp_besoin_articles.articles_id = articles.id');
		$this->db->where('exp_besoin.id', $expressionBesoinId);
		$this->db->distinct();
		return $this->db->get()->result();
	}

	public function getAllExpandArticles($expressionBesoinId)
	{
		$this->db->select('exp_besoin_articles.description as description,DATE_FORMAT(date,\'%d/%m/%Y\') as date,service,responsable,objet,remarque,numero,
		exp_besoin.id as id,exp_besoin_articles.id as exp_besoin_articles_id,exp_besoin_articles.quantite as exp_besoin_articles_quantite,
		exp_besoin_articles.prix as exp_besoin_articles_prix,articles.intitule as articles_intitule,
		exp_besoin_articles.affected_to as affected_to');
		//$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->join('demandeurs', 'demandeurs.id = exp_besoin.demandeurs_id');
		$this->db->join('exp_besoin_articles', 'exp_besoin.id = exp_besoin_articles.exp_besoin_id');
		$this->db->join('articles', 'exp_besoin_articles.articles_id = articles.id');
		//$this->db->where('exp_besoin_articles.status', 0);
		$this->db->where('exp_besoin.numero > 0');

		if($expressionBesoinId != null && isset($expressionBesoinId))
		{
			$this->db->where('exp_besoin.id', $expressionBesoinId);
		}
		//$this->db->distinct();
		$this->db->order_by("exp_besoin.id", "desc");
		return $this->db->get()->result();
	}

	public function delete($id)
	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	function getMinId() {
		$query = $this->db->query('SELECT MIN(id) FROM ' . $this->_use_table . ' LIMIT 1');
		$row = $query->row();
		
		return (empty($row->id))?'1':abs($row->id);
	}

}

?>