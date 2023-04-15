<?php

class Depense extends CI_Model {

	private $_use_table = 'depense';

	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);
		$this->load->model('depense_article');
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



	public function getAllDp($filter,$year)
	{
		$this->db->select('dp.id as dpid, dp.*,f.*,dc.*,int.*,p.*,sp.*, p.intitule as pintitule, sp.intitule as spintitule, dc.intitule as dintitule');
		$this->db->from($this->_use_table.' as dp');

		$this->db->join('fournisseurs as f', 'f.id = dp.id_fournisseur','left');
		$this->db->join('depense_categorie as dc', 'dc.id = dp.id_depense_categorie','left');
		$this->db->join('budget_etablissement as be', 'be.id = dp.id_budget_etab','left');
		$this->db->join('convention as c', 'c.id = dp.id_convention','left');
		$this->db->join('projets as p', 'p.id = dp.id_projet','left');
		$this->db->join('sous_projets as sp', 'sp.id = dp.id_sousprojet','left');
		$this->db->join('interesse as int', 'int.cin = dp.interesse','left');
		$this->db->where("year(dp.date)",$year);
		if(isset($filter) && $filter != 'null')
			$this->db->where($filter.'_date IS NOT NULL', null, false);

		$this->db->order_by("dp.id", "desc");
		$result = $this->db->get()->result();
		
		$dps = array();
		for($i=0;$i<count($result);$i++)
		{
			$dp = $result[$i];
			if($dp->statut == 'D')
				$dp->statut = 'Non Payée';
			else
				$dp->statut = 'Payée';

			$this->db->select('depense_article.id as depense_article_id,articles.intitule as articles_intitule, depense_article.description as articles_description, depense_article.qt as articles_quantite, depense_article.prix_u as articles_prix');

			$this->db->from('depense_article');
			$this->db->join('articles', 'articles.id = depense_article.id_article ');
			$this->db->where('depense_article.id_depense', $dp->dpid);
			$articles =  $this->db->get()->result();

			$dp->articles = $articles;

			$dps[] = $dp;
		}
		return $dps;
	}

	public function getLastNumber(){
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where("numero like '%/%'"); //<===
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$result = $this->db->get()->result();
		if(count($result)>0){
			$numero = explode('/',$result[0]->numero)[0];
			return $numero;
		}else
			return '0';
	}

	public function delete($id,$depense_articles){
		$this->db->trans_start();
		$this->db->delete($this->_use_table, array('id' => $id));
		for($i=0;$i<count($depense_articles);$i++)
			$this->depense_article->deleteByDepenseId($id);
		$this->db->trans_complete();
	}

	public function update($dp){
		$this->db->set('reference', $dp["reference"]);
		$this->db->set('object', $dp["object"]);
		if($dp["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $dp["date"]/1000));
		$this->db->where('id', $dp["id"]);
		return $this->db->update($this->_use_table);
	}

	public function getYears(){
		$this->db->select('year(date) as year');
		$this->db->from($this->_use_table);
		$this->db->group_by('year(date)');
		$this->db->order_by('year','DESC');
		return $this->db->get()->result();
	}
}

?>