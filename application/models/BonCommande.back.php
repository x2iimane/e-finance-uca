<?php

class BonCommande extends CI_Model {

	private $_use_table = 'bon_commande';

	public function __construct () {
		parent::__construct();
	}

	public function getAll($conditions = array()) {
		if (isset($conditions) && count($conditions) > 0)
			return $this->db->get_where($this->_use_table, $conditions)->result();
		else
			return $this->db->get($this->_use_table)->result();
	}

	
	public function getlistBC() {
		
		$this->db->select('bc.id AS idBC, bc.numero, bc.date, bc.tva, f.raison_social as fournisseurs_raison_social');
		$this->db->from($this->_use_table . ' bc');
		$this->db->join('fournisseurs f', 'f.id = bc.fournisseurs_id');
		$this->db->where(array('bc.status' => 'L'));
		$result = $this->db->get()->result();
		$bcs = array();		

		for( $i = 0; $i < count($result); $i++) {

			$bc = $result[$i];
			$this->db->select('exp_besoin_articles.quantite, exp_besoin_articles.prix');
			$this->db->from('exp_besoin_commande');
			$this->db->join('exp_besoin_articles', 'exp_besoin_commande.exp_besoin_articles_id = exp_besoin_articles.id');
			$this->db->where('exp_besoin_commande.bon_commande_id', $result[$i]->idBC);
			$articles =  $this->db->get()->result();

			$total = 0;

			for ($j = 0; $j < count($articles); $j++)
				$total += $articles[$j]->quantite * $articles[$j]->prix;

			$bc->total = $total;

			$bcs[] = $bc;
		}

		return $bcs;
	}	

	public function getAllBcExpand($Id = 0) {
		
		$this->db->select('bc.id as idBC,numero, UNIX_TIMESTAMP(date)*1000 as date, tva, f.raison_social as fournisseurs_raison_social');
		$this->db->from($this->_use_table.' as bc');
		$this->db->join('fournisseurs as f', 'f.id = bc.fournisseurs_id');
		$this->db->where(array('bc.id' => $Id));
		$result = $this->db->get()->result();
		$bcs = array();
		
		for($i = 0; $i < count($result); $i++) {
			$bc = $result[$i];

			$this->db->select('exp_besoin_articles.id as exp_besoin_articles_id,exp_besoin_id, articles.intitule as articles_intitule, exp_besoin_articles.description as articles_description, exp_besoin_articles.quantite as articles_quantite, exp_besoin_articles.prix as articles_prix');
			$this->db->from('exp_besoin_commande');
			$this->db->join('exp_besoin_articles', 'exp_besoin_commande.exp_besoin_articles_id = exp_besoin_articles.id');
			$this->db->join('articles', 'exp_besoin_articles.articles_id = articles.id');
			$this->db->where('exp_besoin_commande.bon_commande_id', $result[$i]->idBC);
			$articles =  $this->db->get()->result();

			$bc->articles = $articles;

			$bcs[] = $bc;

		}
		
		// geting exp besoin Id
		$budget = $this->db->query("SELECT b. * , e.intitule AS etablissement, annes.annee
						FROM budget b, etablissements e, budget_etablissement be, exp_besoin exp, annee_budget ab, annes
						WHERE b.id = be.budget_id
						AND b.type = be.budget_type
						AND b.id = ab.budget_id
						AND b.type = ab.budget_type
						AND ab.annes_id = annes.annee
						AND e.id = be.etablissements_id
						AND be.id = exp.budget_etablissement_id
						AND exp.id = " . $articles[0]->exp_besoin_id); 

		$details = $budget->result();
		for ($j = 0; $j < count($details); $j++)
			$bcs[$j]->details = $details[$j];

		return $bcs;
	}

	public function getById($id) {
		return $this->db->get_where($this->_use_table, array('id' => $id))->result();
	}

	public function delete($id)	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}

	public function save($data) {
		$this->db->insert($this->_use_table, $data);
		$insert_id = $this->db->insert_id();
		
		return $insert_id;
	}

	public function update($data) {
		$this->db->where('id', $data['id']);
		$this->db->update($this->_use_table, $data);
	}

}

?>