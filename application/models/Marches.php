<?php

class Marches extends CI_Model {

	private $_use_table = 'marches';

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
		return $this->db->get($this->_use_table)->result();
	}
	public function delete($id)
	{
		$this->db->delete($this->_use_table, array('id' => $id));
	}


	public function getAllMarcheExpand($filter,$year)
	{
		// 3600000 <============ +1 pour eviter le probléme d'heure d'été (dayLight)

		$this->db->select('ao.id as idAO,ao.numero as ao_numero, ao.intitule as ao_intitule, m.id as idM, m.numero as m_numero, m.intitule as m_intitule, m.nature as m_nature, m.montantTTC as m_montantTTC,m.status as m_status,m.observation as m_observation, f.raison_social as f_raison_social,
		UNIX_TIMESTAMP(m.signature_date)*1000+3600000 as m_signature_date, UNIX_TIMESTAMP(m.approbation_date)*1000+3600000 as m_approbation_date, UNIX_TIMESTAMP(m.visa_date)*1000+3600000 as m_visa_date, m.visa_numero as m_visa_numero, UNIX_TIMESTAMP(m.notification_date)*1000+3600000 as m_notification_date,m.caution_montant as m_caution_montant,UNIX_TIMESTAMP(m.caution_date)*1000+3600000 as m_caution_date,
		m.caution_banque as m_caution_banque,m.delai_execution as m_delai_execution,m.nantissement_banque as m_nantissement_banque, UNIX_TIMESTAMP(m.nantissement_date)*1000+3600000 as m_nantissement_date,m.avenant as m_avenant,
		UNIX_TIMESTAMP(m.resiliation_date)*1000+3600000 as m_resiliation_date, m.resiliation_motif as m_resiliation_motif, UNIX_TIMESTAMP(m.maintien_date)*1000+3600000 as m_maintien_date,
		UNIX_TIMESTAMP(m.main_levee_date)*1000+3600000 as m_main_levee_date,
		UNIX_TIMESTAMP(m.ordre_service_date)*1000+3600000 as m_ordre_service_date,
		UNIX_TIMESTAMP(m.annulation_date)*1000+3600000 as m_annulation_date,m.annulation_comment as m_annulation_comment
		');

		$this->db->from($this->_use_table.' as m');
		$this->db->join('fournisseurs as f', 'f.id = m.fournisseurs_id');
		$this->db->join('ao', 'ao.id = m.AO_id');
		$this->db->where("year(ao.date)",$year);
		if(isset($filter) && $filter != 'null')
		{
			$this->db->where($filter.'_date IS NOT NULL', null, false);
		}

		//$this->db->order_by("ao.id", "desc");
		$this->db->order_by("m.id", "desc");
		$result = $this->db->get()->result();

		$marches = array();
		for($i=0;$i<count($result);$i++)
		{
			$marche = $result[$i];

			$this->db->select('d.id, d.intitule, d.comment, d.montant, UNIX_TIMESTAMP(d.date)*1000+3600000 as date,d.ordonnance,d.marches_id');
			$this->db->from('decomptes as d');
			$this->db->where('d.marches_id', $result[$i]->idM);
			$decomptes =  $this->db->get()->result();

			$marche->decomptes = $decomptes;

			$this->db->select('r.id, r.comment, UNIX_TIMESTAMP(r.date)*1000+3600000 as date,r.marches_id');
			$this->db->from('reclamation_marche as r');
			$this->db->where('r.marches_id', $result[$i]->idM);
			$reclamations =  $this->db->get()->result();

			$marche->reclamations = $reclamations;

			//arret_reprise

			$this->db->select('a.id, a.arret_ou_reprise, a.comment, UNIX_TIMESTAMP(a.date)*1000+3600000 as date,a.marches_id');
			$this->db->from('arret_reprise_marches as a');
			$this->db->where('a.marches_id', $result[$i]->idM);
			$arret_reprise_marches =  $this->db->get()->result();

			$marche->arret_reprise_marches = $arret_reprise_marches ;

			//lots
			$this->db->select("concat(lot,':',lot.intitule) as lot");
			$this->db->from('lot');
			$this->db->where('lot.AO_id', $result[$i]->idAO);
			$lots =  $this->db->get()->result();

			$marche->lots = $lots;


			//attachement/livraison

			$this->db->select('al.id, al.lot as lot,al.type_reception as type_reception,al.nature_reception as nature_reception, al.lieu as lieu, al.comment, al.montant, UNIX_TIMESTAMP(al.date_livraison)*1000+3600000 as date_livraison,al.marches_id');
			$this->db->from('attachement_livraison as al');
			$this->db->where('al.marches_id', $result[$i]->idM);
			$attachement_livraisons =  $this->db->get()->result();

			$marche->attachement_livraisons = $attachement_livraisons;

			$marches[] = $marche;

		}
		return $marches;
	}

	public function update($ao)
	{
		$this->db->set('numero', $ao["m_numero"]);
		$this->db->set('intitule', $ao["m_intitule"]);
		$this->db->set('status', $ao["m_status"]);
		$this->db->set('observation', $ao["m_observation"]);
		$this->db->set('nature', $ao["m_nature"]);
		$this->db->set('montantTTC', $ao["m_montantTTC"]);
		$this->db->set('avenant', $ao["m_avenant"]);
		$this->db->set('caution_banque', $ao["m_caution_banque"]);
		$this->db->set('caution_montant', $ao["m_caution_montant"]);
		$this->db->set('delai_execution', $ao["m_delai_execution"]);
		$this->db->set('nantissement_banque', $ao["m_nantissement_banque"]);
		$this->db->set('resiliation_motif', $ao["m_resiliation_motif"]);
		$this->db->set('visa_numero', $ao["m_visa_numero"]);
		$this->db->set('annulation_comment', $ao["m_annulation_comment"]);


		if($ao["m_ordre_service_date"] == null)
			$this->db->set('ordre_service_date', null);
		else
			$this->db->set('ordre_service_date', date("Y-m-d", $ao["m_ordre_service_date"]/1000));

		if($ao["m_annulation_date"] == null)
			$this->db->set('annulation_date', null);
		else
			$this->db->set('annulation_date', date("Y-m-d", $ao["m_annulation_date"]/1000));


		if($ao["m_caution_date"] == null)
			$this->db->set('caution_date', null);
		else
			$this->db->set('caution_date', date("Y-m-d", $ao["m_caution_date"]/1000));

		if($ao["m_approbation_date"] == null)
			$this->db->set('approbation_date', null);
		else
			$this->db->set('approbation_date', date("Y-m-d", $ao["m_approbation_date"]/1000));

		if($ao["m_maintien_date"] == null)
			$this->db->set('maintien_date', null);
		else
			$this->db->set('maintien_date', date("Y-m-d", $ao["m_maintien_date"]/1000));

		if($ao["m_main_levee_date"] == null)
			$this->db->set('main_levee_date', null);
		else
			$this->db->set('main_levee_date', date("Y-m-d", $ao["m_main_levee_date"]/1000));

		if($ao["m_nantissement_date"] == null)
			$this->db->set('nantissement_date', null);
		else
			$this->db->set('nantissement_date', date("Y-m-d", $ao["m_nantissement_date"]/1000));

		if($ao["m_notification_date"] == null)
			$this->db->set('notification_date', null);
		else
			$this->db->set('notification_date', date("Y-m-d", $ao["m_notification_date"]/1000));

		if($ao["m_resiliation_date"] == null)
			$this->db->set('resiliation_date', null);
		else
			$this->db->set('resiliation_date', date("Y-m-d", $ao["m_resiliation_date"]/1000));

		if($ao["m_signature_date"] == null)
			$this->db->set('signature_date', null);
		else
			$this->db->set('signature_date', date("Y-m-d", $ao["m_signature_date"]/1000));

		if($ao["m_visa_date"] == null)
			$this->db->set('visa_date', null);
		else
			$this->db->set('visa_date', date("Y-m-d", $ao["m_visa_date"]/1000));



		$this->db->where('id', $ao["idM"]);
		return $this->db->update($this->_use_table);
	}


	//marchés signés
	public function getNbrMarchesSignes($year)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('signature_date IS NOT NULL', null, false);
		$this->db->where('YEAR(signature_date)',$year);

		$marcheSigne = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(signature_date)',$year);

		$allAo = $this->db->count_all_results();

		if($marcheSigne == 0)
			$percent = 0;
		else
			$percent = $marcheSigne/$allAo*100;
		return [$marcheSigne,$percent];
	}

	public function getNbrMarchesVises($year)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('visa_date IS NOT NULL', null, false);
		$this->db->where('YEAR(signature_date)',$year);

		$marchesVises = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(signature_date)',$year);

		$allAo = $this->db->count_all_results();

		if($marchesVises == 0)
			$percent = 0;
		else
			$percent = $marchesVises/$allAo*100;
		return [$marchesVises,$percent];
	}

	public function getNbrMarchesAnnules($year)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('annulation_date IS NOT NULL', null, false);
		$this->db->where('YEAR(signature_date)',$year);

		$marchesAnnules = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(signature_date)',$year);

		$allAo = $this->db->count_all_results();

		if($marchesAnnules == 0)
			$percent = 0;
		else
			$percent = $marchesAnnules/$allAo*100;
		return [$marchesAnnules,$percent];
	}

	public function getNbrMarchesResilies($year)
	{
		$this->db->select('*');
		$this->db->from($this->_use_table);
		$this->db->where('resiliation_date IS NOT NULL', null, false);
		$this->db->where('YEAR(signature_date)',$year);

		$marcheResilies = $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from($this->_use_table);
		$allAo = $this->db->count_all_results();

		if($marcheResilies == 0)
			$percent = 0;
		else
			$percent = $marcheResilies/$allAo*100;
		return [$marcheResilies,$percent];
	}



	public function montantMarchesByNature($year)
	{
		$this->db->select('nature,sum(montantTTC) as total,count(distinct m.id) as nombre');
		$this->db->from($this->_use_table.' as m');
		$this->db->where('YEAR(m.signature_date)', $year);// <== le probléme c que cette date est nullable !
		$this->db->group_by('nature');
		//$this->db->group_by('annee_budget.annee_id');

		return $this->db->get()->result();
	}


	public function getNbrMarcheByMonth($year)
	{
		$this->db->select('MONTH(signature_date) as month, YEAR(signature_date) as year, count(*) as nombre');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(signature_date)', $year);// <== le probléme c que cette date est nullable !
		$this->db->group_by(array('YEAR(signature_date)','MONTH(signature_date)'));

		return $this->db->get()->result();
	}

	public function getMontantMarche($year)
	{
		$this->db->select('MONTH(signature_date) as month, YEAR(signature_date) as year, sum(montantTTC) as montant');
		$this->db->from($this->_use_table);
		$this->db->where('YEAR(signature_date)', $year);// <== le probléme c que cette date est nullable !
		$this->db->group_by(array('YEAR(signature_date)','MONTH(signature_date)'));

		return $this->db->get()->result();
	}


}
?>