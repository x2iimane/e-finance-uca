<style type="text/css">

	.select2-container

	{

		width: 100% !important;

	}

</style>



<!-- start: BREADCRUMB -->

<div class="breadcrumb-wrapper">

	<h4 class="mainTitle no-margin">Appel d'Offres</h4>

	<ul class="pull-right breadcrumb">

		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>

		<li><a href="#"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>

		<li><a href="<?php echo base_url()?>ListeAO"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>

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

						<form action="<?php echo base_url('NouvelAO/add'); ?>" method="POST">

							<fieldset>

								<legend>

									Nouvel AO

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

									<input  type="hidden" value="-1" name="exp_numero" class="form-control" placeholder="" >

									<div class="col-md-6">

										<div class="form-group">

											<label> Numéro AO</label>

											<input  required type="text" name="ao_numero" class="form-control" placeholder="" >

										</div>

									</div>

									<div class="col-md-6">

										<div class="form-group">

											<label> Intitulé </label>

											<input required type="text" name="objet" class="form-control" placeholder="" >

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-md-6">

										<div class="form-group">

											<label for="form-field-select-2"> Type Budget </label>

											<select required id="budget_type" name="budget_type" class="js-example-basic-single js-states form-control">

												<option value="">Choisir un Budget</option>

												<option value="Fonctionnement">Fonctionnement</option>

												<option value="Investissement">Investissement</option>

											</select>

										</div>

									</div>

									<div class="col-md-6">

										<div class="form-group">

											<label for="form-field-select-2"> Mode Passation </label>

											<select required id="status" name="status" class="js-example-basic-single js-states form-control">

												<option value="0">Appel d'offres ouvert</option>

												<option value="1">Consultation</option>

												<option value="2">Procédure négociée</option>

												<option value="3">Préselection</option>

												<option value="4">Restreint</option>

											</select>

										</div>

									</div>



								</div>

								<div class="row">

									<div class="col-md-6">

										<div class="form-group">

											<label for="form-field-select-2"> Mode d'éxecution </label>

											<select required name="mode_execution" class="js-example-basic-single js-states form-control">

												<option value="0">Marché Unique</option>

												<option value="1">Allotis</option>

												<option value="2">Reconductible</option>

												<option value="3">Tranche conditionnelle</option>

											</select>

										</div>

									</div>

								</div>

					<!--</div>-->



								<div class="row">

									<div class="col-md-12">

										<table class="table table-hover" id="sample-table-1">

											<thead>

											<tr>

												<th class="center"><a ng-click="newLine()"><i class="fa fa-plus"></i></a></th>

												<th>Lot</th>

												<th>Intitulé</th>

												<th>Estimation</th>

												<th>Caution provisoire</th>

												<th></th>

											</tr>

											</thead>

											<tbody>

											<tr class="tr_clone">

												<td class="center"></td>

												<td class="col-md-4">

													<input required name="lots[]" type="text" class="form-control underline" placeholder="Ex : Lot 1">

												</td>

												<td class="col-md-4">

													<input required name="intitules[]" type="text" placeholder="Intitulé" class="form-control underline">

												</td>

												<td class="col-md-2">

													<input required step="0.01" name="estimations[]" type="number" placeholder="Estimation" class="form-control underline">

												</td>

												<td class="col-md-2">

													<input required name="caution_provisoires[]" step="0.01" type="number" placeholder="Caution provisoire" class="form-control underline">

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

		app.controller("ctrl", ['i18nService','$scope',  'uiGridConstants','notificationFactory','$timeout', function (i18nService,$scope, uiGridConstants,notificationFactory,$timeout) {

			/*$("#etablissements_id").change(function(){

				changeEtabOrBudgetType();

			});



			$("#budget_type").change(function(){

				changeEtabOrBudgetType();

			});



			function changeEtabOrBudgetType()

			{

				$.ajax({

					type: "GET",

					url: "<?php echo base_url('NouvelAO/getBudgetByEtablissement') ?>",

					data: {'etablissements_id' : $("#etablissements_id").val(),'budget_type' : $("#budget_type").val()},

					success: function(result){

						console.log(result);



						var $el = $("#budget_id");

						$el.empty()!;

						$.each(result, function(key, value) {

							$el.append($("<option></option>")

								.attr("value", value.id).text(value.intitule + " - " + value.type));

						});



						$(".js-example-basic-single").select2();



					},error: function (data) {

						console.log('error : '+data);

					}

				});

			}*/

			$scope.newLine = function ()

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

		}]);

		angular.bootstrap(document, ['AdminModule']);

	});



</script>