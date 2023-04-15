<style>
	.grid {
		width: 99.7%;
		height: auto;
	}
	.btnGrid i{
		color:orange !important;
		font-size: large;
		margin-top:5px !important;
	}

	.btnGridUpdate i{
		color:dodgerblue !important;
		font-size: large;
		margin-top:5px !important;
	}
</style>

<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Gestion des marchés</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>Marche"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeMarche"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>

<div class="wrap-content container" id="container" ng-controller="ctrl">
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
						<form action="<?php echo base_url('marche/add'); ?>" method="POST">
						<fieldset>
							<legend>
								Nouveau Marché
							</legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label> AO° </label>
										<select required name="AO_id" id="AO_id" class="js-example-basic-single js-states form-control">
											<option  value="" disabled selected>Séléctionnez un AO°</option>
											<?php
											foreach($aos as $row)
											{
												echo '<option value="'.$row->id.'">'.$row->numero.'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> Type du Budget </label>
										<input  type="text" id="type_budget" class="form-control" placeholder="" readonly >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Numéro </label>
										<input required type="text" name="numero" class="form-control" placeholder="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> Intitulé </label>
										<input required  type="text" name="intitule" class="form-control" placeholder="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Fournisseur </label>
										<select required name="fournisseurs_id" class="js-example-basic-single js-states form-control">
											<option  value="" disabled selected>Séléctionnez un fournisseur</option>
											<?php
											foreach($fournisseurs as $row)
											{
												echo '<option value="'.$row->id.'">'.$row->raison_social.'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> Montant TTC (en Dh) </label>
										<input required step="0.01" type="number" name="montantTTC" class="form-control" placeholder="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label for="form-field-select-2"> Etablissement </label>
											<select id="etablissements_id" name="etablissements_id" class="js-example-basic-single js-states form-control">
												<option required value="null" disabled selected>Séléctionnez un établissement</option>
												<?php

                                                                                foreach($etablissements as $row)
                                                                                {
                                                                                    echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
                                                                                }
                                                  ?>
											</select>
										</div>
									</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form-field-select-2"> Budget </label>
											<select required id="budget_id" name="budget_id" class="js-example-basic-single js-states form-control">
												<option value="" disabled selected>Séléctionnez un budget</option>
											</select>
										</div>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Nature </label>
										<select required name="nature" class="js-example-basic-single js-states form-control">
											<option value="0" selected>Fournitures</option>
											<option value="1">Services</option>
											<option value="2">Travaux</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> Statut </label>
										<select required name="status" class="js-example-basic-single js-states form-control">
											<option value="0" selected>Liquidation</option>
											<option value="1">Soldé</option>
											<option value="2">Annulé</option>
											<option value="3">Résilié</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Nature des prix </label>
										<select required name="nature_prix" class="js-example-basic-single js-states form-control">
											<option value="Fermes et non révisables">Fermes et non révisables</option>
											<option value="Révisables​">Révisables​</option>
										</select>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Obsérvation</label>
										<textarea placeholder="Obsérvation ..." class="form-control" name="observation"></textarea>
									</div>
								</div>
							</div>
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
			</div>
		</div>
	</div>
</div>

<script language="javascript">
	$(document).ready(function() {
		$("#etablissements_id").change(function(){
			if($("#AO_id").val() == null) {alert("Sélectionnez un AO !"); $("#etablissements_id").val("null"); return false;}
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('Marche/getBudgetByEtablissement') ?>",
					data: {'etablissements_id' : $("#etablissements_id").val(),'AO_id' : $("#AO_id").val()},
					success: function(result){
						console.log(result);

						var $el = $("#budget_id");
						$el.empty();
						$.each(result, function(key, value) {
							$el.append($("<option></option>")
								.attr("value", value.id).text(value.intitule));//
						});

						$(".js-example-basic-single").select2();

					},error: function (data) {
						console.log('error : '+data);
					}
				});
		});

		$("#AO_id").change(function(){
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('Marche/getBudgetType') ?>",
				data: {'AO_id' : $("#AO_id").val()},
				success: function(result){
					$("#type_budget").val(result);

				},error: function (data) {
					console.log('error : '+data);
				}
			});
		});
	});

</script>