<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Dépenses</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>Depenses/"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeDepense"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
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
							<form id="form" action="<?php echo base_url('Depenses/add'); ?>" method="POST" novalidate>
							<fieldset>
								<legend>
									Nouvelle Dépense
								</legend>
								<div class="row">
									<div class="text-center col-md-4"></div>
									<div class="text-center col-md-4">
										<div class="form-group">
											<label for="form-field-select-2"> Type Dépense </label>
											<select id="id_depense_categorie" name="id_depense_categorie" class="js-example-basic-single js-states form-control">
												<option required value="" disabled selected>Séléctionnez un Type de Dépense</option>
												<?php

												foreach($categories as $row)
												{
													echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
												}
												?>
											</select>
										</div>
									</div>
									<div class="text-center col-md-4"></div>
								</div>

								<!-- div form of facture-->
								<div id="facture">
									<h1>Facture</h1>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> Date </label>
												<input required type="date" id="date_fac" name="date_fac" class="form-control" placeholder="">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Fournisseur </label>
												<select id="id_fournisseur_fac" name="id_fournisseur_fac" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un Fournisseur</option>
													<?php

													foreach($provider as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->raison_social.'</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> Numéro de Facture</label>
												<input required type="text" name="reference_fac" class="form-control" placeholder="" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label> Objet de Facture</label>
												<input required type="text" name="object_fac" class="form-control" placeholder="" >
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Etablissement </label>
												<select id="etablissements_id_fac" name="etablissements_id_fac" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un établissement</option>
													<?php

													foreach($etablissements as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Type Budget </label>
												<select required id="budget_type_fac" name="budget_type_fac" class="js-example-basic-single js-states form-control">
													<option value="Fonctionnement">Fonctionnement</option>
													<option value="Investissement">Investissement</option>
												</select>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Budget </label>
												<select required id="budget_id_fac" name="budget_id_fac" class="js-example-basic-single fac js-states form-control">
													<option value="" disabled selected>Séléctionnez un budget</option>
												</select> 
											</div>
										</div>
									</div>



									<div class="row">
										<div class="col-md-12">
										<table class="table table-hover table_facture" id="sample-table-1">
										<thead>
										<tr>
											<th class="center"><a onclick="newLine()"><i class="fa fa-plus"></i></a></th>
											<th>Article</th>
											<th>Description</th>
											<th>Quantité</th>
											<th>Prix Unitaire</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<tr class="tr_clone">
											<td class="center"></td>
											<td class="col-md-4">
													<select required id="facture_article" name="articles[]" class="js-example-basic-single js-states form-control">
														<?php

														foreach($articles as $row)
														{
															echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
														}

														?>
													</select>

											</td>
											<td class="col-md-4">
												<input  name="descriptions[]" type="text" placeholder="Description" class="form-control underline">
											</td>
											<td class="col-md-2">
												<input required step="0.01" name="quantites[]" type="number" placeholder="Qte" class="form-control underline fac_art_qt">
											</td>
											<td class="col-md-2">
												<input required name="prix[]" step="0.01" type="number" placeholder="Pu" class="form-control underline fac_art_px">
											</td>
											<td class="center">
												<div class="visible-md visible-lg hidden-sm hidden-xs">
													<a onclick="deleteLine(this)" class="btn btn-transparent btn-xs tooltips"  data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group dropdown ">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a> Supprimer </a>
															</li>
														</ul>
													</div>
												</div></td>
										</tr>
										</tbody>
										</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="form-field-select-2"> Mantant H.T. </label>
												<input required type="text" onfocus="loadpht()" id="mht_fac" name="mht_fac" class="form-control" placeholder="" >
											</div>
										</div>	
										<div class="col-md-4">
											<div class="form-group">
												<label for="form-field-select-2"> T.V.A </label>
												<input required type="text" id="tva_fac" name="tva_fac" class="form-control" placeholder="" >
											</div>
										</div>	
										<div class="col-md-4">
											<div class="form-group">
												<label for="form-field-select-2"> Montant T.T.C </label>
												<input required type="text" onfocus="loadpttc()" id="mttc_fac" name="mttc_fac" class="form-control" placeholder="" >
											</div>
										</div>
									</div>
								</div>
								<!-- End Form of facture-->

								<!-- Form of Divers-->
								<div id="divers">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> Date </label>
												<input required type="date" id="date_dv" name="date_dv" class="form-control" placeholder="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label> Numéro de Facture</label>
												<input required type="text" name="reference_dv" class="form-control" placeholder="" >
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label> Objet de Facture</label>
												<input required type="text" name="object_dv" class="form-control" placeholder="" >
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Etablissement </label>
												<select id="etablissements_id_dv" name="etablissements_id_dv" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un établissement</option>
													<?php

													foreach($etablissements as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Type Budget </label>
												<select required id="budget_type_dv" name="budget_type_dv" class="js-example-basic-single js-states form-control">
													<option value="Fonctionnement">Fonctionnement</option>
													<option value="Investissement">Investissement</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Budget </label>
												<select required id="budget_id_dv" name="budget_id_dv" class="js-example-basic-single js-states form-control">
													<option value="" disabled selected>Séléctionnez un budget</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-3"> Intéressé </label>
												<select id="interesse_dv" name="interesse_dv" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un interesse</option>
													<?php

													foreach($interesses as $row)
													{
														echo '<option value="'.$row->cin.'">'. $row->cin .' - '. $row->nom.'</option>';
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label> Montant</label>
												<input required type="text" id="mttc_dv" name="mttc_dv" class="form-control" placeholder="" >
											</div>
										</div>
									</div>
								</div>
								<!-- end Form of divers-->

								<!-- Form of regie-->
								<div id="regir">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> Date </label>
												<input required type="date" id="date_reg" name="date_reg" class="form-control" placeholder="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label> Numéro de Facture</label>
												<input required type="text" name="reference_reg" class="form-control" placeholder="" >
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label> Objet de Facture</label>
												<input required type="text" name="object_reg" class="form-control" placeholder="" >
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Etablissement </label>
												<select id="etablissements_id_reg" name="etablissements_id_reg" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un établissement</option>
													<?php

													foreach($etablissements as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Type Budget </label>
												<select required id="budget_type_reg" name="budget_type_reg" class="js-example-basic-single js-states form-control">
													<option value="Fonctionnement">Fonctionnement</option>
													<option value="Investissement">Investissement</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Budget </label>
												<select required id="budget_id_reg" name="budget_id_reg" class="js-example-basic-single js-states form-control">
													<option value="" disabled selected>Séléctionnez un budget</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Type Régie </label>
												<select required id="type_regie_reg" name="type_regie_reg" class="js-example-basic-single js-states form-control">
													<option value="normale">Normale</option>
													<option value="speciale">Spéciale</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> Nom du régisseur</label>
												<input required type="text" id="nom_regisseur_reg" name="nom_regisseur_reg" class="form-control" placeholder="" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label> N° d’autorisation de paiement</label>
												<input required type="text" id="num_autorisation_pai_reg" name="num_autorisation_pai_reg" class="form-control" placeholder="" >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Fournisseur </label>
												<select id="id_fournisseur_reg" name="id_fournisseur_reg" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un Fournisseur</option>
													<?php

													foreach($provider as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->raison_social.'</option>';
													}
													?>
												</select>
											</div>
										</div>	
										<div class="col-md-6">
											<div class="form-group">
												<label> Montant T.T.C</label>
												<input required type="text" id="mttc_reg" name="mttc_reg" class="form-control" placeholder="" >
											</div>
										</div>
									</div>
								</div>
								<!-- end Form of regie-->

								<!-- Form of convention-->
								<div id="convention">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> Date </label>
												<input required type="date" id="date_conv" name="date_conv" class="form-control" placeholder="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label> Numéro de Facture</label>
												<input required type="text" name="reference_conv" class="form-control" placeholder="" >
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Fournisseur </label>
												<select id="id_fournisseur_conv" name="id_fournisseur_conv" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un Fournisseur</option>
													<?php

													foreach($provider as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->raison_social.'</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Convention </label>
												<select id="id_convention" name="id_convention_conv" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez une convention</option>
													<?php

													foreach($convention as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->numero.'-'.$row->objet.'</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> N° Lettre de Commande </label>
												<input required type="text" id="ref_lc_conv" name="ref_lc_conv" class="form-control" placeholder="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label> Objet de Lettre de commande</label>
												<input required type="text" id="object_lc_conv" name="object_lc_conv" class="form-control" placeholder="" >
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Nature de Préstation </label>
												<select id="prestation_id_conv" name="prestation_id_conv" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez une Nature</option>
													<?php

													foreach($nature as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Etablissement </label>
												<select id="etablissements_id_conv" name="etablissements_id_conv" class="js-example-basic-single js-states form-control">
													<option required value="" disabled selected>Séléctionnez un établissement</option>
													<?php

													foreach($etablissements as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Type Budget </label>
												<select required id="budget_type_conv" name="budget_type_conv" class="js-example-basic-single js-states form-control">
													<option value="Fonctionnement">Fonctionnement</option>
													<option value="Investissement">Investissement</option>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Budget </label>
												<select required id="budget_id_conv" name="budget_id_conv" class="js-example-basic-single js-states form-control">
													<option value="" disabled selected>Séléctionnez un budget</option>
												</select>
											</div>
										</div>
									</div>



									<div class="row">
										<div class="col-md-12">
										<table class="table table-hover" id="sample-table-1">
										<thead>
										<tr>
											<th class="center"><a onclick="newLine()"><i class="fa fa-plus"></i></a></th>
											<th>Article</th>
											<th>Description</th>
											<th>Quantité</th>
											<th>Prix Unitaire</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<tr class="tr_clone">
											<td class="center"></td>
											<td class="col-md-4">
													<select required name="articles[]" class="js-example-basic-single js-states form-control">
														<?php

														foreach($articles as $row)
														{
															echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
														}

														?>
													</select>

											</td>
											<td class="col-md-4">
												<input  name="descriptions[]" type="text" placeholder="Description" class="form-control underline">
											</td>
											<td class="col-md-2">
												<input required step="0.01" name="quantites[]" type="number" placeholder="Qte" class="form-control underline">
											</td>
											<td class="col-md-2">
												<input required name="prix[]" step="0.01" type="number" placeholder="Pu" class="form-control underline">
											</td>
											<td class="center">
												<div class="visible-md visible-lg hidden-sm hidden-xs">
													<a onclick="deleteLine(this)" class="btn btn-transparent btn-xs tooltips"  data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group dropdown ">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" data-toggle="dropdown">
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a> Supprimer </a>
															</li>
														</ul>
													</div>
												</div></td>
										</tr>
										</tbody>
										</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="form-field-select-2"> Mantant H.T. </label>
												<input required type="text" id="mht_conv" name="mht_conv" class="form-control" placeholder="" >
											</div>
										</div>	
										<div class="col-md-4">
											<div class="form-group">
												<label for="form-field-select-2"> T.V.A </label>
												<input required type="text" id="tva_conv" name="tva_conv" class="form-control" placeholder="" >
											</div>
										</div>	
										<div class="col-md-4">
											<div class="form-group">
												<label for="form-field-select-2"> Montant T.T.C </label>
												<input required type="text" id="mttc_conv" name="mttc_conv" class="form-control" placeholder="" >
											</div>
										</div>
									</div>
								</div>
								<!-- End Form of Convention-->
								
								<div id="projet">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<div class="form-group">
													<label> Projet  </label>
													<select id="project_id" name="id_projet" class="js-example-basic-single js-states form-control" required="">
													<option required value="" disabled selected>Séléctionnez un Projet</option>
													<?php
													foreach($projects as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
													}
													?>
												</select>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="form-field-select-2"> Sous Projet </label>
												<select id="sub_project_id" name="id_sousprojet" class="js-example-basic-single js-states form-control" required="">
													<option required value="" disabled selected>Séléctionnez sous projet</option>
													<?php
													foreach($sub_projects as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->intitule.'</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="row" id ="submit">
									<div class="col-md-6">
										<button type="submit" id ="submit" class="btn btn-wide btn-warning">
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

	$(document).ready(function(){

		$("#etablissements_id_fac").change(function(){
			changeEtabOrBudgetType_fac();
		});

		$("#etablissements_id_dv").change(function(){
			changeEtabOrBudgetType_dv();
		});

		$("#etablissements_id_conv").change(function(){
			changeEtabOrBudgetType_conv();
		});

		$("#etablissements_id_reg").change(function(){
			changeEtabOrBudgetType_reg();
		});

		$("#budget_type_conv").change(function(){
			changeEtabOrBudgetType_conv();
		});

		$("#budget_type_fac").change(function(){
			changeEtabOrBudgetType_fac();
		});

		$("#budget_type_dv").change(function(){
			changeEtabOrBudgetType_dv();
		});

		$("#budget_type_reg").change(function(){
			changeEtabOrBudgetType_reg();
		});

		function changeEtabOrBudgetType_dv()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('Depenses/getBudgetByEtablissement') ?>",
				data: {'etablissements_id' : $("#etablissements_id_dv").val(),'budget_type' : $("#budget_type_dv").val()},
				success: function(result){
					console.log(result);

					var $el = $("#budget_id_dv");
					$el.empty();
					$.each(result, function(key, value) {
						$el.append($("<option></option>")
							.attr("value", value.id).text(value.intitule + " - " + value.type));
					});

					$("#budget_id_dv").select2();

				},error: function (data) {
					console.log('error : '+data);
				}
			});
		}

		function changeEtabOrBudgetType_fac()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('Depenses/getBudgetByEtablissement') ?>",
				data: {'etablissements_id' : $("#etablissements_id_fac").val(),'budget_type' : $("#budget_type_fac").val()},
				success: function(result){
					console.log(result);

					var $el = $("#budget_id_fac");
					$el.empty();
					$.each(result, function(key, value) {
						$el.append($("<option></option>")
							.attr("value", value.id).text(value.intitule + " - " + value.type));
					});

					$("#budget_id_fac").select2();

				},error: function (data) {
					console.log('error : '+data);
				}
			});
		}

		function changeEtabOrBudgetType_conv()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('Depenses/getBudgetByEtablissement') ?>",
				data: {'etablissements_id' : $("#etablissements_id_conv").val(),'budget_type' : $("#budget_type_conv").val()},
				success: function(result){
					console.log(result);

					var $el = $("#budget_id_conv");
					$el.empty();
					$.each(result, function(key, value) {
						$el.append($("<option></option>")
							.attr("value", value.id).text(value.intitule + " - " + value.type));
					});

					$("#budget_id_conv").select2();

				},error: function (data) {
					console.log('error : '+data);
				}
			});
		}

		function changeEtabOrBudgetType_reg()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('Depenses/getBudgetByEtablissement') ?>",
				data: {'etablissements_id' : $("#etablissements_id_reg").val(),'budget_type' : $("#budget_type_reg").val()},
				success: function(result){
					console.log(result);

					var $el = $("#budget_id_reg");
					$el.empty();
					$.each(result, function(key, value) {
						$el.append($("<option></option>")
							.attr("value", value.id).text(value.intitule + " - " + value.type));
					});

					$("#budget_id_reg").select2();

				},error: function (data) {
					console.log('error : '+data);
				}
			});
		}
	});

	 function loadpht(){
		var pht=0;
		var prodprice = 0;
        $('.table_facture tbody tr').each(function() {
			var prodprice = $(this).find(".fac_art_qt").val() * $(this).find(".fac_art_px").val();  
			pht = pht + prodprice;
        });
        $('#mht_fac').val(pht);
     }

     function loadpttc(){
		var pht= $('#mht_fac').val();
        var taux_tva = $('#tva_fac').val();
        var pttc = (pht*(1+taux_tva/100));
        $('#mttc_fac').val(pttc);
     }

	function newLine()
	{
		var dep_id= $('#id_depense_categorie').val();
		$(".js-example-basic-single").select2("destroy");
		$("table tbody tr:first").clone().find("input").each(function() {
			$(this).val('')//.attr('id', function(_, id) { return id});
			console.log("ok");
		}).end().appendTo("table");
		$(".js-example-basic-single").select2();
		$('#id_depense_categorie').val( dep_id);
	}

	function deleteLine(t)
	{
		$(t).closest('tr').remove();
	}

	$(window).load(function(){

		$('#projet').hide();
		$('#facture').hide();
	    $('#divers').hide();
	    $('#regir').hide();
	    $('#convention').hide();
	    $('#submit').hide();
	    var dep_id= $('#id_depense_categorie').val();
	    document.getElementById('form').reset();
	    $('#id_depense_categorie').val( dep_id);

		$('#id_depense_categorie').on('change', function() {
	        if($(this).val() == ''){
	            $('#facture').hide();
	            $('#divers').hide();
	            $('#regir').hide();
	            $('#convention').hide();
	            $('#submit').hide();
	           var dep_id= $('#id_depense_categorie').val();
			    document.getElementById('form').reset();
			    $('#id_depense_categorie').val( dep_id);
	        }else if($(this).val() == '1'){
	            $('#facture').show();
	            $('#projet').show();
	            $('#divers').hide();
	            $('#regir').hide();
	            $('#convention').hide();
	            $('#submit').show();
	            var dep_id= $('#id_depense_categorie').val();
			    document.getElementById('form').reset();
			    $('#id_depense_categorie').val( dep_id);
	        }else if($(this).val() == '2') {
	            $('#facture').hide();
	            $('#divers').hide();
	            $('#regir').hide();
	            $('#convention').show();
	            $('#projet').show();
	            $('#submit').show();
	            var dep_id= $('#id_depense_categorie').val();
			    document.getElementById('form').reset();
			    $('#id_depense_categorie').val( dep_id);
	        }else if($(this).val() == '3') {
	            $('#facture').hide();
	            $('#divers').show();
	            $('#projet').show();
	            $('#regir').hide();
	            $('#convention').hide();
	            $('#submit').show();
	            var dep_id= $('#id_depense_categorie').val();
			    document.getElementById('form').reset();
			    $('#id_depense_categorie').val( dep_id);
	        }else if($(this).val() == '4') {
	            $('#facture').hide();
	            $('#divers').hide();
	            $('#regir').show();
	            $('#projet').show();
	            $('#convention').hide();
	            $('#submit').show();
	            var dep_id= $('#id_depense_categorie').val();
			    document.getElementById('form').reset();
			    $('#id_depense_categorie').val( dep_id);
	        }
	 	});
	});

</script>