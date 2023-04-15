<?php

class Depense extends CI_Model {

	private $_use_table = 'depense';

	public function __construct () {
		parent::__construct();
		//$this->load->model($this->_use_table);
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

	public function getAllWithProvider() {
		$this->db->select('dp.*, f.raison_social');
		$this->db->from($this->_use_table.' as dp');
		$this->db->join('fournisseurs as f', 'f.id = dp.id_fournisseur');
		$this->db->where(array('statut' => 'D'));

		return $this->db->get()->result();
	}
	
	public function getAllDp()
	{
		$this->db->select('dp.id as dpid, dp.*,f.*,dc.*');
		$this->db->from($this->_use_table.' as dp');
		$this->db->join('fournisseurs as f', 'f.id = dp.id_fournisseur', 'left');
		$this->db->join('depense_categorie as dc', 'dc.id = dp.id_depense_categorie', 'left');
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

	public function getAllBpExpand($Id) {
		
		$this->db->select('dp.id as dpid, dp.*, f.*, dc.*, conv.*');
		$this->db->from($this->_use_table.' as dp');
		$this->db->join('fournisseurs as f', 'f.id = dp.id_fournisseur', 'left');
		$this->db->join('depense_categorie as dc', 'dc.id = dp.id_depense_categorie');
		$this->db->join('convention as conv', 'conv.id = dp.id_convention', 'left');
		$this->db->where(array('dp.id' => $Id));
		$result = $this->db->get()->result();
		$dps = array();
		
		for($i=0;$i<count($result);$i++) {
			$dp = $result[$i];
			
			$this->db->select('depense_article.id as depense_article_id,articles.intitule as articles_intitule, depense_article.description as articles_description, depense_article.qt as articles_quantite, depense_article.prix_u as articles_prix');
			$this->db->from('depense_article');
			$this->db->join('articles', 'articles.id = depense_article.id_article ');
			$this->db->where('depense_article.id_depense', $dp->dpid);
			$articles =  $this->db->get()->result();

			$dp->articles = $articles;

			$dps[] = $dp;

		}
	
		// geting exp besoin Id
		$budget = $this->db->query("SELECT b. * , e.intitule AS etablissement, annes.annee
						FROM budget b, etablissements e, budget_etablissement be, annee_budget ab, annes
						WHERE b.id = be.budget_id
						AND b.type = be.budget_type
						AND b.id = ab.budget_id
						AND b.type = ab.budget_type
						AND ab.annes_id = annes.annee
						AND e.id = be.etablissements_id						
						AND be.id = " . $dps[0]->id_budget_etab); 

		$details = $budget->result();
		for ($j = 0; $j < count($details); $j++)
			$dps[$j]->details = $details[$j];

		return $dps;
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

	public function delete($id,$depense_articles)
	{
		$this->db->trans_start();
		$this->db->delete($this->_use_table, array('id' => $id));
		/*foreach ($depense_articles as $depense_article){
			$this->depense_article->deleteByDepenseId($id);
		}*/
		for($i=0;$i<count($depense_articles);$i++)
			$this->depense_article->deleteByDepenseId($id);
		
		$this->db->trans_complete();
	}

	public function update($dp)
	{
		$this->db->set('numero', $dp["numero"]);

		if($dp["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $dp["date"]/1000));

		$this->db->where('id', $dp["id"]);
		return $this->db->update($this->_use_table);
	}

	public function globalUpdate($data) {
		$this->db->where('id', $data['id']);
		$this->db->update($this->_use_table, $data);
	}

}
?>