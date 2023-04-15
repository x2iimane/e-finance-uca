<?php


class Ao extends CI_Model {

	private $_use_table = 'ao';
	private $CI;
	public function __construct () {
		parent::__construct();
		$this->load->model($this->_use_table);

		$this->CI =& get_instance();
		$this->CI->load->model('exp_besoin_ao');

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
	/*public function delete($id,$exp_besoin_articles)
	{
		$this->db->trans_start();
		$this->CI->exp_besoin_ao->deleteByAoId($id);
		$this->db->delete($this->_use_table, array('id' => $id));

		for($i=0;$i<count($exp_besoin_articles);$i++)
		{
			$this->exp_besoin_articles->updateAffectedToById($exp_besoin_articles[$i]["exp_besoin_articles_id"],null);
		}

		$this->db->trans_complete();
	}*/

	//Lot

	public function delete($id)
	{
		$this->db->delete($this->_use_table, array('id' => $id));
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

	public function getAllAoExpand($filter,$year)
	{
		// 3600000 <============ +1 pour eviter le probléme d'heure d'été dans la machine du client (javascript date)(dayLight)

		// UNIX_TIMESTAMP(publication_date)*1000+3600000 as publication_date, publication_comment,
		$this->db->select('ao.id as idAO,numero, ao.intitule as ao_intitule, mode_execution as ao_mode_execution,
		 status as status,
		 UNIX_TIMESTAMP(retrait_dossier_date)*1000+3600000 as retrait_dossier_date, retrait_dossier_comment,
		 UNIX_TIMESTAMP(travaux_commission_date)*1000+3600000 as travaux_commission_date, travaux_commission_comment,
		  UNIX_TIMESTAMP(adjudication_date)*1000+3600000 as adjudication_date, adjudication_comment,
		   UNIX_TIMESTAMP(infructueux_date)*1000+3600000 as infructueux_date, infructueux_comment,
		   UNIX_TIMESTAMP(annulation_date)*1000+3600000 as annulation_date, annulation_comment,
		   UNIX_TIMESTAMP(date)*1000+3600000 as date, budget_type');
		$this->db->from($this->_use_table);
		$this->db->where("year(date)",$year);
		if(isset($filter) && $filter != 'null')
		{
			$this->db->where($filter.'_date IS NOT NULL', null, false);
		}
		$this->db->order_by("ao.numero", "desc");
		$result = $this->db->get()->result();
		$aos = array();
		for($i=0;$i<count($result);$i++)
		{
			$ao = $result[$i];

			// jeeebli
			/*$this->db->select('exp_besoin_articles.id as exp_besoin_articles_id,articles.intitule as articles_intitule, exp_besoin_articles.description as articles_description, exp_besoin_articles.quantite as articles_quantite, exp_besoin_articles.prix as articles_prix');
			$this->db->from('exp_besoin_ao');
			$this->db->join('exp_besoin_articles', 'exp_besoin_ao.exp_besoin_articles_id = exp_besoin_articles.id');
			$this->db->join('articles', 'exp_besoin_articles.articles_id = articles.id');
			$this->db->where('exp_besoin_ao.AO_id', $result[$i]->idAO);
			$articles =  $this->db->get()->result();*/

			//lot
			$this->db->select('lot.intitule as lot_intitule, lot.lot as lot, lot.estimation as lot_estimation, lot.caution_provisoire as lot_caution_provisoire');
			$this->db->from('lot');
			$this->db->where('lot.AO_id', $result[$i]->idAO);
			$lots =  $this->db->get()->result();


			$this->db->select('id,UNIX_TIMESTAMP(date)*1000+3600000 as date, type, langue,journal,ao_id');
			$this->db->from('publication_ao');
			$this->db->where('publication_ao.ao_id', $result[$i]->idAO);
			$publications =  $this->db->get()->result();

			$this->db->select('id,lot,candidat,montant,ao_id');
			$this->db->from('affectation_lot');
			$this->db->where('affectation_lot.ao_id', $result[$i]->idAO);
			$this->db->order_by('lot','DESC');
			$this->db->order_by('montant','ASC');
			$affectations =  $this->db->get()->result();

			$this->db->select('id,candidat,UNIX_TIMESTAMP(depot_date)*1000+3600000 as depot_date,UNIX_TIMESTAMP(retrait_date)*1000+3600000 as retrait_date,
			 UNIX_TIMESTAMP(visite_lieux_date)*1000+3600000 as visite_lieux_date,
			 UNIX_TIMESTAMP(depot_echan_prospect_date)*1000+3600000 as depot_echan_prospect_date,comment, ao_id,
			 visite_lieux_responsable,retrait_heure,depot_heure,visite_lieux_responsable,visite_lieux_heure,depot_echan_prospect_heure');
			$this->db->from('retrait_dossier_ao');
			$this->db->where('retrait_dossier_ao.ao_id', $result[$i]->idAO);
			$retraits =  $this->db->get()->result();

			$ao->lots = $lots;
			$ao->publications = $publications;
			$ao->retraits = $retraits;
			$ao->affectations = $affectations;

			$aos[] = $ao;

		}
		return $aos;
	}


	public function getBudgetType($id)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where("id",$id); //<===
		$this->db->limit(1);

		return $this->db->get()->result()[0]->budget_type;

	}

	public function getYears()
	{
		$this->db->select('year(date) as year');
		$this->db->from($this->_use_table);
		$this->db->group_by('year(date)');
		$this->db->order_by('year','DESC');
		return $this->db->get()->result();

	}

	public function update($ao)
	{
		$this->db->set('numero', $ao["numero"]);
		$this->db->set('intitule', $ao["ao_intitule"]);
		$this->db->set('mode_execution', $ao["ao_mode_execution"]);
		$this->db->set('status', $ao["status"]);
		$this->db->set('adjudication_comment', $ao["adjudication_comment"]);
		$this->db->set('retrait_dossier_comment', $ao["retrait_dossier_comment"]);
		$this->db->set('travaux_commission_comment', $ao["travaux_commission_comment"]);
		$this->db->set('infructueux_comment', $ao["infructueux_comment"]);
		$this->db->set('annulation_comment', $ao["annulation_comment"]);
		$this->db->set('budget_type', $ao["budget_type"]);

		//FROM_UNIXTIME

		if($ao["date"] == null)
			$this->db->set('date', null);
		else
			$this->db->set('date', date("Y-m-d", $ao["date"]/1000));


		if($ao["infructueux_date"] == null)
			$this->db->set('infructueux_date', null);
		else
			$this->db->set('infructueux_date', date("Y-m-d", $ao["infructueux_date"]/1000));

		if($ao["annulation_date"] == null)
			$this->db->set('annulation_date', null);
		else
			$this->db->set('annulation_date', date("Y-m-d", $ao["annulation_date"]/1000));

		if($ao["retrait_dossier_date"] == null)
			$this->db->set('retrait_dossier_date', null);
		else
			$this->db->set('retrait_dossier_date', date("Y-m-d", $ao["retrait_dossier_date"]/1000));

		if($ao["travaux_commission_date"] == null)
			$this->db->set('travaux_commission_date', null);
		else
			$this->db->set('travaux_commission_date', date("Y-m-d", $ao["travaux_commission_date"]/1000));

		if($ao["adjudication_date"] == null)
			$this->db->set('adjudication_date', null);
		else
			$this->db->set('adjudication_date', date("Y-m-d", $ao["adjudication_date"]/1000));

		$this->db->where('id', $ao["idAO"]);
		return $this->db->update($this->_use_table);
	}


	public function getAOLance($year)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(date)',$year);
		$aoLance = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(date)',$year);
		$allAo = $this->db->count_all_results();

		if($allAo == 0)
			$percent = 0;
		else
			$percent = $aoLance/$allAo*100;

		return [$aoLance,$percent];

	}

	public function getAOAdjuge($year)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('adjudication_date IS NOT NULL', null, false);
		$this->db->where('YEAR(date)',$year);

		$aoAdjuge = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(date)',$year);

		$allAo = $this->db->count_all_results();

		if($allAo == 0)
			$percent = 0;
		else
			$percent = $aoAdjuge/$allAo*100;

		return [$aoAdjuge,$percent];
	}

	public function getNbrAOInfructueux($year)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('infructueux_date IS NOT NULL', null, false);
		$this->db->where('YEAR(date)',$year);

		$aoInfructueux = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(date)',$year);

		$allAo = $this->db->count_all_results();

		if($aoInfructueux == 0)
			$percent = 0;
		else
			$percent = $aoInfructueux/$allAo*100;
		return [$aoInfructueux,$percent];
	}

	/*public function getAOInfrictueux()
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('adjudication_date IS NOT NULL', null, false);
		return $this->db->count_all_results();
	}*/

	public function getNbrAOByMonth($year)
	{
		$this->db->select('MONTH(ao.date) as month, YEAR(ao.date) as year, count(*) as nombre');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(ao.date)', $year);
		$this->db->group_by(array('YEAR(ao.date)','MONTH(ao.date)'));

		return $this->db->get()->result();
	}
}
?>