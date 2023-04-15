<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Gestion des Service</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="/settin/editApplicant"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="/settings/listApplicant"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>


<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<form action="<?=base_url()?>settings/saveApplicant" method="POST">
								<input type="hidden" name="id" value="<?=(isset($data->id))?$data->id:''?>">
							<fieldset>
								<legend>
									Ajouter / Modifier un Service
								</legend>
								
								<div class="alert alert-success" style="display:<?=(isset($_GET['CISuccess']))?'':'none'?>">
									<button type="button" class="close" data-dismiss="success" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>Succès!</strong>
									Vos Modifications sont bien enregistrés.
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Service </label>
											<input type="text" name="service" class="form-control" placeholder="" value="<?=(isset($data->service))?$data->service:''?>" >
										</div>
									</div>	
								</div>														

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Résponsable </label>
											<input type="text" name="responsable" class="form-control" placeholder="" value="<?=(isset($data->responsable))?$data->responsable:''?>" >
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-6">
											<div class="form-group">
												<label> Etablissement </label>
												<select name="etablissements_id" class="js-example-basic-single js-states form-control">
													<option value="" disabled selected>Séléctionnez un Etablissement</option>												
													<?php foreach($etablissement_list as $row) : ?>
													<option value="<?=$row->id?>" <?=($row->id == (isset($data->etablissements_id))?$data->etablissements_id:'')?'selected':''?>><?=$row->intitule?></option>
													<?php endforeach; ?>
												</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-actions">
											<button type="submit" class="btn btn-orange btn-block">
												Enregistrer
											</button>
										</div>
									</div>
								</div>
							</div>	
								
							</fieldset>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>