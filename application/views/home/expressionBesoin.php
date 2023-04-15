<style type="text/css">
	.select2-container
	{
		width: 100% !important;
	}
</style>

<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Expression de Besoin</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>ExpressionBesoin/"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeExpressionBesoin"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
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
							<form action="<?php echo base_url('ExpressionBesoin/add'); ?>" method="POST">
							<fieldset>
								<legend>
									Nouvelle expression de besoin
								</legend>
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label> Date </label>
											<input required type="date" id="date" name="date" class="form-control" placeholder="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Numéro </label>
											<input required type="text" name="numero" class="form-control" placeholder="" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Objet </label>
											<input required type="text" name="objet" class="form-control" placeholder="" >
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form-field-select-2"> Etablissement </label>
											<select id="etablissements_id" name="etablissements_id" class="js-example-basic-single js-states form-control">
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
											<select required id="budget_type" name="budget_type" class="js-example-basic-single js-states form-control">
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
											<select required id="budget_id" name="budget_id" class="js-example-basic-single js-states form-control">
												<option value="" disabled selected>Séléctionnez un budget</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Service demandeur </label>
											<select required name="demandeur_id" class="js-example-basic-single js-states form-control">
												<?php

												foreach($demandeurs as $row)
												{
													echo '<option value="'.$row->id.'">'.$row->service.'</option>';
												}
												?>
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
											<input required name="descriptions[]" type="text" placeholder="Description" class="form-control underline">
										</td>
										<td class="col-md-2">
											<input required step="0.01" name="quantites[]" type="number" placeholder="Qte" class="form-control underline">
										</td>
										<td class="col-md-2">
											<input required name="prix[]" step="0.01" type="number" placeholder="pu" class="form-control underline">
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
									<div class="col-md-6">
										<div class="form-group">
											<label for="form-field-select-2"> Remarque </label>
												<textarea placeholder="Remarque ..." id="form-field-22" name="remarque" class="form-control"></textarea>
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
	$(document).ready(function(){
		$("#etablissements_id").change(function(){
			changeEtabOrBudgetType();
		});

		$("#budget_type").change(function(){
			changeEtabOrBudgetType();
		});

		function changeEtabOrBudgetType()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('ExpressionBesoin/getBudgetByEtablissement') ?>",
				data: {'etablissements_id' : $("#etablissements_id").val(),'budget_type' : $("#budget_type").val()},
				success: function(result){
					console.log(result);

					var $el = $("#budget_id");
					$el.empty();
					/*$el.append($("<option></option>")
					 .attr("value", '').text('Please Select'));*/
					$.each(result, function(key, value) {
						$el.append($("<option></option>")
							.attr("value", value.id).text(value.intitule + " - " + value.type));
					});

					$(".js-example-basic-single").select2();

				},error: function (data) {
					console.log('error : '+data);
				}
			});
		}

	});

	function newLine()
	{
		$(".js-example-basic-single").select2("destroy");
		$("table tbody tr:first").clone().find("input").each(function() {
			$(this).val('')//.attr('id', function(_, id) { return id});
			console.log("ok");
		}).end().appendTo("table");
		$(".js-example-basic-single").select2();
	}

	function deleteLine(t)
	{
		$(t).closest('tr').remove();
	}

</script>