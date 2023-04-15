<style>
	.grid {
		width: 99.7%;
		height: auto;
	}
	.im-centered { margin: auto; max-width: 900px;}
	.marg{
		margin-top: 10px;
	}
</style>

<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Expression de Besoin</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>welcome"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>ExpressionBesoin/"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeExpressionBesoin"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>

<div class="wrap-content container" id="container" ng-controller="ctrl">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12" id="msg">

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<fieldset>
								<legend>
									Liste des articles de l'expression de besoin N° {{item.numero}}
								</legend>
								<div class="row marg">
									<div class="col-md-3">Objet :</div>
									<div class="col-md-3">{{item.objet}}</div>
								</div>
								<div class="row marg">
									<div class="col-md-3">Date de la demande :</div>
									<div class="col-md-6">{{item.date}}</div>
								</div>
								<div class="row marg">
									<div class="col-md-3">Service Demandeur</div>
									<div class="col-md-6">{{item.service}} (Responsable : {{item.responsable | uppercase}})</div>
								</div>
								<div class="row marg">
									<div class="col-md-3">Remarque :</div>
									<div class="col-md-6">{{item.remarque}}</div>
								</div>
								<div class="row" style="margin-top: 30px;">
									<div ui-grid-selection ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptions" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>
								</div>
								<div class="im-centered">
								<div class="row" style="margin-top:40px;">
									<div class="col-md-6">
										<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelNewAO" ng-click="openModalAO($event)">Nouvelle AO</button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-warning">Nouveau BC</button>
									</div>
								</div>
								</div>
							</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modelNewAO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Nouvelle AO</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label> Numéro AO </label>
								<input type="text" name="numero" ng-model="ao.numeroAO" class="form-control" placeholder="" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label> Intitule </label>
								<input type="text" ng-model="ao.intituleAO" name="numero" class="form-control" placeholder="" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="form-field-select-2"> Mode d'exécution </label>
								<select ng-model="ao.modeExecutionAO" class="form-control">
									<option ng-repeat="i in modes" value="{{i}}">{{i}}</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
						Fermer
					</button>
					<button type="button" class="btn btn-primary" ng-click="newAO()">
						Valider
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script language="javascript">
	$(document).ready(function() {
		app.controller("ctrl", ['$scope',  'uiGridConstants','notificationFactory', function ($scope, uiGridConstants,notificationFactory) {
			$scope.ao = new Object({});
			$scope.modes = ['Marché Unique','Allotis','Reconductible','Tranche conditionnelle'];

			$scope.openModalAO = function($event)
			{
				if($scope.gridApi.selection.getSelectedRows().length == 0){
					notificationFactory.warning("Veuillez sélectionner au moins un article!","Attention")
					$event.stopPropagation();
				}
			}
			$scope.newAO = function()
			{
				if( $scope.ao.modeExecutionAO == undefined || $scope.ao.modeExecutionAO == null || $scope.ao.modeExecutionAO == "" ||$scope.ao.numeroAO == undefined || $scope.ao.numeroAO == null || $scope.ao.numeroAO == "" || $scope.ao.intituleAO == undefined || $scope.ao.intituleAO == null || $scope.ao.intituleAO == ""){
					notificationFactory.warning("Veuillez saisir tous les informations qui concernent l'AO !", "Attention");
					return;
				}

				$scope.ao.items = $scope.gridApi.selection.getSelectedRows();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('transfert_to_AO_BC/newAO') ?>",
					data : {'ao' : $scope.ao},
					dataType:'json',
					success: function(result){
						console.log(result);
					},error: function (data) {
						console.log(data);
					}
				});
				//succés
				$scope.ao = new Object({});
				notificationFactory.success();
			}


			$scope.item = new Object();
			$scope.gridOptions = {
				/*expandableRowTemplate: 'expandableRowTemplate.html',
				expandableRowHeight: 150,
				//subGridVariable will be available in subGrid scope
				expandableRowScope: {
					subGridVariable: 'subGridScopeVariable'
				}*/
				//enableFiltering: true,
			}

			$scope.items = [];
			$scope.gridOptions.columnDefs = [
				{ name: 'articles_intitule', displayName: 'Article', width: "*", resizable: true },
				{ name: 'exp_besoin_articles_quantite', displayName: 'Quantité', width: "*", resizable: true },
				{ name: 'exp_besoin_articles_prix', displayName: 'Prix Unitaire', width: "*", resizable: true,cellFilter:'currency:dh' },
				{ enableCellEdit: false, width: "76", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFiltering()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: '', sortable: false },
			];

			$scope.toggleFiltering = function () {
				console.log("toggle");
				$scope.gridOptions.enableFiltering = !$scope.gridOptions.enableFiltering;
				$scope.gridApi.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);

			}

			$scope.gridOptions.onRegisterApi = function (gridApi) {
				$scope.gridApi = gridApi;

				gridApi.grid.registerRowBuilder(function (row, gridOptions) {
				});
				gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					//$scope.gridApi.selection.selectRow(newRowCol.row.entity);
				});
				gridApi.selection.on.rowSelectionChanged($scope, function (row) {
				});
			}

			$scope.getData = function(){
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('transfert_to_AO_BC/getExpBesoins') ?>",
					data : {'expressionBesoinId' : <?php echo $_GET['expressionBesoinId']; ?>},
					success: function(result){
						$scope.items = result;
						console.log(result);
						$scope.item = result[0];

						/*for(i = 0; i < result.length; i++){
							result[i].subGridOptions = {
								columnDefs: [ {name:"Id", field:"id"},{name:"", field:""} ],
								result: result[i].
							}
						}*/
						
						$scope.gridOptions.data = $scope.items;
					},error: function (data) {
						console.log(data);
					}
				});
			}
			$scope.getData();
		}]);
		angular.bootstrap(document, ['AdminModule']);
	});

</script>