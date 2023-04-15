<!--<link href="<?php /*echo  base_url()."assets/css/myStyle.css"*/?>" rel="stylesheet"/>-->
<style type="text/css" rel="stylesheet">
	@media (min-width: 768px){
		.seven-cols .col-md-2,
		.seven-cols .col-sm-2,
		.seven-cols .col-lg-2  {
			width: 100%;
			*width: 100%;
		}
	}

	@media (min-width: 992px) {
		.seven-cols .col-md-2,
		.seven-cols .col-sm-2,
		.seven-cols .col-lg-2 {
			width: 14.285714285714285714285714285714%;
			*width: 14.285714285714285714285714285714%;
		}
	}

	/**
     *  The following is not really needed in this case
     *  Only to demonstrate the usage of @media for large screens
     */
	@media (min-width: 1200px) {
		.seven-cols .col-md-2,
		.seven-cols .col-sm-2,
		.seven-cols .col-lg-2 {
			width: 14.285714285714285714285714285714%;
			*width: 14.285714285714285714285714285714%;
		}
	}
</style>
<!-- start: BREADCRUMB -->
<!--<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Tableau du bord</h4>
<!--	<ul class="pull-right breadcrumb">
		<li><a href="/welcome"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="/requirments/add"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="/requirments"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>-->

<div ng-controller="ctrl" style="margin-top:20px;" ng-cloak>
	<div class="row">
		<div class="col-md-2 col-md-offset-5">
			<div class="form-group">
				<label for="form-field-select-2"> Année </label>
				<select  ng-options="item.year as item.year for item in years" id="year" ng-model="selectedYear" class="form-control">
				</select>
			</div>
		</div>
	</div>
<div class="row seven-cols">
	<div class="col-lg-2 col-md-2">
		<div class="myPanel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-pencil-square-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{nbrMarchesSignes}}</div>
						<div>Marchés</div>
						<div>Signés</div>
						<div> {{nbrMarchesSignes_percent}}%</div>

					</div>
				</div>
			</div>
			<a href="<?= base_url()?>ListeMarche?filter=signature">
				<div class="myPanel-footer">
					<span class="pull-left">Plus d'info</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-2 col-md-2">
	<div class="myPanel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-cc-visa fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{nbrMarchesVises}}</div>
						<div>Marchés</div>
						<div>Visés</div>
						<div> {{nbrMarchesVises_percent}}%</div>

					</div>
				</div>
			</div>
		<a href="<?= base_url()?>ListeMarche?filter=visa">
				<div class="myPanel-footer">
					<span class="pull-left text-green">Plus d'info</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-2 col-md-2">
	<div class="myPanel panel-orange">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-remove fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{nbrMarchesAnnules}}</div>
						<div>Marchés</div>
						<div>annulés</div>
						<div> {{nbrMarchesAnnules_percent}}%</div>

					</div>
				</div>
			</div>
		<a href="<?= base_url()?>ListeMarche?filter=annulation">
				<div class="myPanel-footer">
					<span class="pull-left text-orange">Plus d'info</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-2 col-md-2">
		<div class="myPanel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-stop-circle fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{nbrMarchesResilies}}</div>
						<div>Marchés</div>
						<div>Résiliés</div>
						<div> {{nbrMarchesResilies_percent}}%</div>

					</div>
				</div>
			</div>
			<a href="<?= base_url()?>ListeMarche?filter=resiliation">
				<div class="myPanel-footer">
					<span class="pull-left text-red">Plus d'info</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-2 col-md-2">
		<div class="myPanel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-rocket fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{nbrAOLance}}</div>
						<div>AO</div>
						<div>Lancés</div>
						<div> {{nbrAOLance_percent}}%</div>
					</div>
				</div>
			</div>
			<a href="<?= base_url()?>ListeAO?filter=lance">
				<div class="myPanel-footer">
					<span class="pull-left text-blue">Plus d'info</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-2 col-md-2">
		<div class="myPanel panel-light-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-check-square-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{nbrAOAdjuge}}</div>
						<div>AO</div>
						<div>Adjugés</div>
						<div> {{nbrAOAdjuge_percent}}%</div>

					</div>
				</div>
			</div>
			<a href="<?= base_url()?>ListeAO?filter=adjudication">
				<div class="myPanel-footer">
					<span class="pull-left text-light-blue">Plus d'info</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-2 col-md-2">
		<div class="myPanel panel-pink">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-thumbs-down fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{nbrAOInfructueux}}</div>
						<div>AO</div>
						<div>Infructueux</div>
						<div> {{nbrAOInfructueux_percent}}%</div>

					</div>
				</div>
			</div>
			<a href="<?= base_url()?>ListeAO?filter=infructueux">
				<div class="myPanel-footer">
					<span class="pull-left text-light-blue">Plus d'info</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>

<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
					<div class="row">
						<div class="col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-bar-chart-o fa-fw"></i> La périodicité de lancement des AO/Marchés Signés
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												Actions
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu pull-right" role="menu">
												<li><a href="#">Exporter</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<canvas id="bar" class="chart chart-bar"
											chart-options="optionsAoMarcheChart" chart-data="dataAoMarche" chart-labels="labelsAo" chart-series="series">
									</canvas>
								</div>
								<!-- /.panel-body -->
							</div>
						</div>

						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-pie-chart fa-fw"></i> Montant Marché/Nature
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<canvas id="pieNature" class="chart chart-pie" legend="true"
											chart-data="dataNature" chart-labels="labelsNature" chart-options="optionsNature" >
									</canvas>
								</div>
								<!-- /.panel-body -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="panel panel-default">
									<div class="panel-heading">
										<i class="fa fa-pie-chart fa-fw"></i> Montant Marché/Mois
									</div>
									<div class="panel-body">
										<canvas id="radar" class="chart chart-radar"
												chart-data="dataMarche" chart-options="optionsMarche" chart-labels="labelsAo">
										</canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<script language="javascript">
	$(document).ready(function() {
		app.controller("ctrl", ['i18nService','$scope',  'uiGridConstants','notificationFactory','$timeout','$filter', function (i18nService,$scope, uiGridConstants,notificationFactory,$timeout,$filter) {

			$scope.getYears = function(){
				$scope.years = [];
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('Dashboard/getYears') ?>",
					cache: false,
					async: false,
					success: function(result){
						$scope.years = result;
						console.log(result);
						$scope.selectedYear = $scope.years[0].year;
					},error: function (data) {
						console.log(data);
					}
				});
			}

			$scope.getYears();

			$scope.getData = function() {
				$scope.labelsNature = [];
				$scope.dataNature = [];
				$scope.labelsAo = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
				$scope.series = ['Nombre d\'AO', 'Nombre de marchés'];
				$scope.optionsNature = {
					showAllTooltips: true,
					tooltips: {
						callbacks: {
							label: function(tooltipItem, data) {
								var value = data.datasets[0].data[tooltipItem.index];
								var label = data.labels[tooltipItem.index];
								var percentageValue = Math.round(value / totalMarches * 100);
								var percentageNumber = Math.round(parseInt(label.split('|')[1]) / totalNbr * 100);
								return ['Nature : '+label.split('|')[0],'Nombre : '+label.split('|')[1], 'Montant :' + $filter('currency')(value),'% en Valeur : '+percentageValue + '%',
									'% en Nombre : '+percentageNumber + '%'];
							}
						}
					},
				}

				$scope.dataAoMarche = [[0,0,0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,0]];
				$scope.optionsAoMarcheChart = {
					scaleStartValue:0,
				}

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getNbrAOByMonth') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log("chaaart");
						console.log(result);
						for (i = 0; i < result.length; i++) {
							$scope.dataAoMarche[0][parseInt(result[i].month) - 1] = result[i].nombre;
						}
					}, error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getNbrMarcheByMonth') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log("chaaart");
						console.log(result);
						for (i = 0; i < result.length; i++) {
							$scope.dataAoMarche[1][parseInt(result[i].month) - 1] = result[i].nombre;
						}
					}, error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/montantMarchesByNature') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						totalMarches = 0;
						totalNbr = 0;
						for (i = 0; i < result.length; i++) {
							totalMarches += parseFloat(result[i].total);
							totalNbr += parseInt(result[i].nombre);
							$scope.dataNature.push(result[i].total);
							if (result[i].nature == "0") $scope.labelsNature.push("Fournitures|" + result[i].nombre);
							if (result[i].nature == "1") $scope.labelsNature.push("Services|" + result[i].nombre);
							if (result[i].nature == "2") $scope.labelsNature.push("Travaux|" + result[i].nombre);
						}

					}, error: function (data) {
						console.log(data);
					}
				});

				$scope.dataMarche = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				$scope.optionsMarche = {
					showAllTooltips: true,
					tooltips: {
						callbacks: {
							label: function (tooltipItem, data) {
								var value = data.datasets[0].data[tooltipItem.index];
								var label = data.labels[tooltipItem.index];
								return [$filter("currency")(value)];
							}
						}
					},
				}

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getMontantMarche') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log("chaaart");
						console.log(result);
						for (i = 0; i < result.length; i++) {
							$scope.dataMarche[parseInt(result[i].month) - 1] = result[i].montant;
						}
					}, error: function (data) {
						console.log(data);
					}
				});


				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getNbrMarchesSignes') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						$scope.nbrMarchesSignes = result[0];
						$scope.nbrMarchesSignes_percent = result[1].toFixed(2);
					}, error: function (data) {
						console.log(data);
					}
				});

				//nbrAOInfructueux

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getNbrAOInfructueux') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						$scope.nbrAOInfructueux = result[0];
						$scope.nbrAOInfructueux_percent = result[1].toFixed(2);
					}, error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getNbrMarchesAnnules') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						$scope.nbrMarchesAnnules = result[0];
						$scope.nbrMarchesAnnules_percent = result[1].toFixed(2);
					}, error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getNbrMarchesResilies') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						$scope.nbrMarchesResilies = result[0];
						$scope.nbrMarchesResilies_percent = result[1].toFixed(2);
					}, error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getNbrMarchesVises') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						$scope.nbrMarchesVises = result[0];
						$scope.nbrMarchesVises_percent = result[1].toFixed(2);
					}, error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getAOLance') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						$scope.nbrAOLance = result[0];
						$scope.nbrAOLance_percent = result[1].toFixed(2);
					}, error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "<?php echo base_url('dashboard/getAOAdjuge') ?>",
					cache: false,
					async: false,
					data:{year:$scope.selectedYear},
					success: function (result) {
						console.log(result);
						$scope.nbrAOAdjuge = result[0];
						$scope.nbrAOAdjuge_percent = result[1].toFixed(2);
					}, error: function (data) {
						console.log(data);
					}
				});
			}

			$scope.$watch('selectedYear', function(newValue, oldValue) {
				$scope.getData();
			});

		}]);
		angular.bootstrap(document, ['AdminModule']);
	});

</script>
