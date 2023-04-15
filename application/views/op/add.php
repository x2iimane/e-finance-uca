<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Nouveau OP pour le BC <?=$bc_details->numero?></h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>Payments/"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Liste des OP</a></li>
	</ul>
</div>


<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<?php if($this->session->flashdata('msg')): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success fade in" style="margin-top:18px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
					<strong>Succés!</strong> <?php echo $this->session->flashdata('msg'); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<form action="<?php echo base_url('Payments/save'); ?>" method="POST">
							<input type="hidden" name="type_engagement" value="<?=$params['type_engagement']?>" />
							<input type="hidden" name="id_engagement" value="<?=$params['id_engagement']?>" />
							<input type="hidden" name="user_id" value="<?=$this->session->userdata('userId')?>" />
							<input type="hidden" name="id" value="<?=(isset($op->id))?$op->id:''?>" />
							<fieldset>
								<legend>
									Nouveau Ordre de Paiment
								</legend>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> N° OP </label>
											<input required type="text" name="numero" class="form-control" value="<?=(isset($op->numero))?$op->numero:''?>"  />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Montant </label>
											<input type="text" name="amount" id="amount" class="form-control" value="<?=(isset($op->amount))?$op->amount:''?>" readonly />
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> N° Bordereau </label>
											<input required type="text" name="id_bordereau" class="form-control" value="<?=(isset($op->id_bordereau))?$op->id_bordereau:''?>" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Date d'ordonnancement</label>
											<input required type="date" id="date" name="create_date" class="form-control" required value="<?=(isset($op->create_date))?$op->create_date:''?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form-field-select-2"> Mode de Paiement </label>
											<select required id="mode_payment" name="mode_payment" class="js-example-basic-single js-states form-control">
												<option value="Chèque" <?=(isset($op->mode_payment) && $op->mode_payment == 'Chèque')?'selected':''?>>Chèque</option>
												<option value="Ordre de virement" <?=(isset($op->mode_payment) && $op->mode_payment == 'Ordre de virement')?'selected':''?>>Ordre de virement</option>
												<option value="Lettre de virement" <?=(isset($op->mode_payment) && $op->mode_payment == 'Lettre de virement')?'selected':''?>>Lettre de virement</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label id='label_payment_mode'> N° Attribué / Rib </label>
											<? if (isset($op->mode_payment) && $op->mode_payment == 'Chèque' || !isset($op->mode_payment)) :?>
											<input required type="text" id="attribute_name" name="numero_rib" class="form-control" value="<?=(isset($op->numero_rib))?$op->numero_rib:''?>" />
											<? endif; ?>
											<? if (isset($op->mode_payment) && $op->mode_payment == 'Ordre de virement') :?>
											<input required type="text" id="attribute_name" name="numero_ov" class="form-control" value="<?=(isset($op->numero_ov))?$op->numero_ov:''?>" />
											<? endif; ?>
											<? if (isset($op->mode_payment) && $op->mode_payment == 'Lettre de virement') :?>
											<input required type="text" id="attribute_name" name="numero_lv" class="form-control" value="<?=(isset($op->numero_lv))?$op->numero_lv:''?>" />
											<? endif; ?>
										</div>
									</div>

								</div>
								<fieldset>
									<legend>
										Passer a l'action
									</legend>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="block"> Choisir une option </label>
												<div class="clip-radio radio-primary">
													<input type="radio" id="default" name="status" value="default" <?=((isset($op->status) && $op->status == 'default') || !isset($op->status))?'checked="checked"':''?>>
													<label for="default"> Ordonnancé </label>
													<input type="radio" id="valide" name="status" value="valide" <?=(isset($op->status) && $op->status == 'valide')?'checked="checked"':''?> />
													<label for="valide"> Validé </label>
													<input type="radio" id="rejet" name="status" value="rejet" <?=(isset($op->status) && $op->status == 'rejet')?'checked="checked"':''?>>
													<label for="rejet"> Rejeté </label>													
												</div>
											</div>
										</div>
									</div>

									<div id="viseB"> 
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label> Date du Visa </label>
													<input type="date" id="date_visa" name="date_visa" class="form-control" value="<?=(isset($op->date_visa))?$op->date_visa:''?>" />
												</div>
											</div>
										</div>
									</div>

									<div id="rejetB" style="display:none"> 
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label> Date du Rejet </label>
													<input type="date" id="date_rejet" name="date_rejet" class="form-control" value="<?=(isset($op->date_rejet))?$op->date_rejet:''?>" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label> N# du Rejet </label>
													<input type="text" name="numero_rejet" class="form-control" value="<?=(isset($op->numero_rejet))?$op->numero_rejet:''?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label> Raison du rejet  : <br /></label>
													<div class="checkbox clip-check check-primary checkbox-inline">
														<input type="checkbox" id="rejet_montant" value="montant" name="rejet[montant]" <?=(isset($op->rejet['montant']))?'checked="checked"':''?>>
														<label for="rejet_montant"> Montant </label>
													</div>
													<div class="checkbox clip-check check-primary checkbox-inline">
														<input type="checkbox" id="rejet_rubrique" value="rubrique" name="rejet[rubrique]" <?=(isset($op->rejet['rubrique']))?'checked="checked"':''?>>
														<label for="rejet_rubrique"> Rubrique </label>
													</div>
													<div class="checkbox clip-check check-primary checkbox-inline">
														<input type="checkbox" id="rejet_incomplet" value="incomplet" name="rejet[incomplet]" <?=(isset($op->rejet['incomplet']))?'checked="checked"':''?>>
														<label for="rejet_incomplet"> Dossier Incomplet</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label> Motifs du rejet  : </label>
													<div class="form-group">
														<textarea class="form-control autosize area-animated" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 71px;" name="rejet[motif]"> <?=(isset($op->rejet['motif']))?$op->rejet['motif']:''?></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label> Action  : <br /></label>
													<div class="checkbox clip-check check-primary checkbox-inline">
														<input type="checkbox" id="annule" value="annule" name="etat" <?=(isset($op->etat) && $op->etat == 'annule')?'checked="checked"':''?>>
														<label for="annule"> Annuler OP </label>
														<input type="checkbox" id="reo" value="reo" name="etat" <?=(isset($op->etat) && $op->etat == 'reo')?'checked="checked"':''?>>
														<label for="reo"> Réordonnancé OP </label>
													</div>
												</div>
											</div>
										</div>

									</div>

								</fieldset>
								
									
								<div class="row">
									<div class="col-md-6">
										<button type="submit" class="btn btn-wide btn-warning">
											Enregistrer
										</button>
									</div>
								</div>
							</fieldset>
							</form>
					</div>
				</div>
				
				<div class="panel panel-white">
					<div class="panel-body">
						<fieldset>
							<legend>
								Détail du Bon 
								<? switch ($params['type_engagement']) {
									case 'BC':
										echo 'Bon de Commande ';
										break;
									case 'D' :
										echo 'Dépense ';
									default:
										echo 'Marché ';
										break;
								}
								?> 
								 Selectionné
							</legend>
							<div class="row">
								<div class="col-md-12">

									<table class="table">
										<thead>
											<tr>
												<th colspan="3">Informations General</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>année budgétaire</td>
												<td><strong><?=$bc_details->details->annee?></strong></td>
											</tr>
											<tr>
												<td>Code du Budget</td>
												<td><strong><?=$bc_details->details->id?></strong></td>
											</tr>
											<tr>
												<td>Budget - <?=$bc_details->details->type?></td>
												<td><strong><?=$bc_details->details->intitule?></strong></td>
											</tr>
											<tr>
												<td>Etablissement</td>
												<td><strong><?=$bc_details->details->etablissement?></strong></td>
											</tr>
										<? if ($params['type_engagement'] == 'BC') :?>
											<tr>
												<td>Numéro du Bon de Commande</td>
												<td><strong><?=$bc_details->numero?></strong></td>
											</tr>
											<tr>
												<td>bénéficiaire</td>
												<td><strong><?=$bc_details->fournisseurs_raison_social?></strong></td>
											</tr>
										<? elseif ($params['type_engagement'] == 'D') : ?>	
											<tr>
												<td>Type de dépense </td>
												<td><strong><?=$bc_details->intitule . ' ' . $bc_details->objet?></strong></td>
											</tr>
											<tr>
												<td>Réference</td>
												<td><strong><?=$bc_details->reference?></strong></td>
											</tr>
											<? if (!empty($bc_details->ref_lc)) :?>
											<tr>
												<td>Réference et Objet de Commande</td>
												<td><strong><?=$bc_details->ref_lc . '/' . $bc_details->object_lc?></strong></td>
											</tr>
											<? endif; ?>
											<? if (!empty($bc_details->nature)) :?>
											<tr>
												<td>Nature de dépense </td>
												<td><strong><?=$bc_details->nature?></strong></td>
											</tr>
											<? endif; ?>
											<? if (!empty($bc_details->interesse)) :?>
											<tr>
												<td>Interessé </td>
												<td><strong><?=$bc_details->interesse?></strong></td>
											</tr>
											<? endif; ?>
											<? if (!empty($bc_details->type_regie)) :?>
											<tr>
												<td>Type de régie </td>
												<td><strong><?=$bc_details->type_regie?></strong></td>
											</tr>
											<? endif; ?>
										<? endif; ?>																					
										</tbody>
									</table>
								<table class="table table-hover" id="sample-table-1">
									<thead>
									<tr>
										<th>Article</th>
										<th>Description</th>
										<th>Quantité</th>
										<th>Prix Unitaire</th>
										<th></th>
									</tr>
									</thead>
									<tbody>
										<? for ($i = 0; $i < count($bc_details->articles); $i++) : 
											$sub_total += $bc_details->articles[$i]->articles_quantite * $bc_details->articles[$i]->articles_prix;
										?>
											<tr>
												<td><?=$bc_details->articles[$i]->articles_intitule?></td>
												<td><?=$bc_details->articles[$i]->articles_description?></td>
												<td><?=$bc_details->articles[$i]->articles_quantite?></td>
												<td><?=number_format($bc_details->articles[$i]->articles_prix, 2, ',', ' ')?></td>
											</tr>
										<? endfor; ?>

										<? if ($params['type_engagement'] == 'D') : ?>	
										<tr>
											<td colspan="4" align="right">Montant HT : <strong><?=number_format($bc_details->mht, 2, ',', ' ')?></strong></td>
										</tr>
										<tr>
											<td colspan="4" align="right">TVA : <strong><?=$bc_details->tva?> %</strong></td>
										</tr>
										<tr>
											<td colspan="4" align="right">Montant TTC : <strong id="amount_to"><?=number_format($bc_details->mttc, 2, ',', ' ')?></strong></td>
										</tr>
										<? elseif ($params['type_engagement'] == 'BC') : ?>
										<tr>
											<td colspan="4" align="right">Montant HT : <strong id="amount_to_to"><?=number_format($sub_total, 2, ',', ' ')?></strong></td>
										</tr>
										<tr>
											<td colspan="4" align="right">TVA : <strong><?=$bc_details->tva?> %</strong></td>
										</tr>
										<tr>
											<? $mnt_ttc = (($sub_total * $bc_details->tva) / 100) + $sub_total; ?>
											<td colspan="4" align="right">Montant TTC : <strong id="amount_to"><?=number_format($mnt_ttc, 2, ',', ' ')?></strong></td>
										</tr>
										<? endif; ?>
									</tbody>
								</table>

								</div>
							</div>
						</fieldset>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script language="javascript">
	$( window ).load(function(){

		initPage();	

		$("#mode_payment").change(function() {			
			if ($(this).val() == 'Ordre de virement') {
				$("#attribute_name").attr('name', 'numero_ov');
				$('#label_payment_mode').text("Numéro Attribué / OV");
			}
			else if ($(this).val() == 'Lettre de virement') {
				$("#attribute_name").attr('name', 'numero_lv');
				$('#label_payment_mode').text("Numéro Attribué / LV");
			}
			else {
				$("#attribute_name").attr('name', 'numero_rib');
				$('#label_payment_mode').text("Numéro RIB");
			}
		}).change();

		$('.clip-radio input:radio').change(function() {

			if($('#valide').is(':checked')) {
				$('#rejetB').hide();
				$('#viseB').show();
			}
			else if($('#rejet').is(':checked')) {
				$('#viseB').hide();
				$('#rejetB').show();
			}
			else {
				$('#viseB').hide();
				$('#rejetB').hide();
			}		
		}).change();

		function initPage() {
			/*set Amount to Input */
			$('#amount').val($('#amount_to').text());	
		}

		

	});
	
</script>