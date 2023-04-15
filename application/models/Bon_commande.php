<?php

class Bon_commande extends CI_Model {

	private $_use_table = 'bon_commande';

	private $CI;
	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);

		$this->CI =& get_instance();
		$this->CI->load->model('exp_besoin_commande');
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

	public function getAllBcExpand($year)
	{
		$this->db->select('bc.statut as statut,bc.id as idBC,bc.tva, numero, UNIX_TIMESTAMP(date)*1000 as date,f.raison_social as fournisseurs_raison_social');
		$this->db->from($this->_use_table.' as bc');
		$this->db->join('fournisseurs as f', 'f.id = bc.fournisseurs_id');
		$this->db->where("year(date)",$year);
		$this->db->order_by("bc.id", "desc");
		$result = $this->db->get()->result();
		$bcs = array();
		for($i=0;$i<count($result);$i++)
		{
			$bc = $result[$i];

			$this->db->select('exp_besoin_articles.id as exp_besoin_articles_id,articles.intitule as articles_intitule, exp_besoin_articles.description as articles_description, exp_besoin_articles.quantite as articles_quantite, exp_besoin_articles.prix as articles_prix');
			$this->db->from('exp_besoin_commande');
			$this->db->join('exp_besoin_articles', 'exp_besoin_commande.exp_besoin_articles_id = exp_besoin_articles.id');
			$this->db->join('articles', 'exp_besoin_articles.articles_id = articles.id');
			$this->db->where('exp_besoin_commande.bon_commande_id', $result[$i]->idBC);
			$articles =  $this->db->get()->result();

			$bc->articles = $articles;

			$bcs[] = $bc;

		}
		return $bcs;
	}
	public function getLastNumber()
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where("numero like '%/%'"); //<===
		$this->db->order_by('id','DESC');
		$this->db->limit(1);

		$result = $this->db->get()->result();
		if(count($result)>0)
		{
			$numero = explode('/',$result[0]->numero)[0];
			return $numero;
		}
		else
			return '0';
	}
	public function delete($id,$exp_besoin_articles)
	{
		$this->db->trans_start();

		$this->CI->exp_besoin_commande->deleteByBcId($id);
		$this->db->delete($this->_use_table, array('id' => $id));

		for($i=0;$i<count($exp_besoin_articles);$i++)
		{
			$this->exp_besoin_articles->updateAffectedToById($exp_besoin_articles[$i]["exp_besoin_articles_id"],null);
		}

		$this->db->trans_complete();
	}

	/*public function getCountThisMonth()
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$where = "MONTH(date) = ".date('m');
		$this->db->where($where);
		$where = "YEAR(date) = ".date('Y');
		$this->db->where($where);
		$thisMonth = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$where = "MONTH(date) = ".(date('m')-1);//<===
		$this->db->where($where);
		$where = "YEAR(date) = ".date('Y');
		$this->db->where($where);
		$lastMonth = $this->db->count_all_results();

		if($lastMonth == 0)
			$pourcent = 0;
		else
			$pourcent = $thisMonth/$lastMonth*100;

		return [$thisMonth,$pourcent];
	}*/


	public function update($bc)
	{
		$this->db->set('numero', $bc["numero"]);
		$this->db->set('statut', $bc["statut"]);

		if($bc["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $bc["date"]/1000));

		$this->db->where('id', $bc["idBC"]);
		return $this->db->update($this->_use_table);
	}


}
?>