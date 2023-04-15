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

</style>

<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Nouvel Appel d'Offres / BC</h4>

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
								Liste des expressions de besoin
							</legend>
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Masquer / Afficher
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="row" ui-i18n="fr">
												<div ui-grid-selection ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptions" ui-grid-resize-columns ui-grid-cellnav class="grid" style="height:240px !important;"></div>
											</div>
											<div class="im-centered">
												<div class="row" style="margin-top:10px;">
													<div class="col-md-6 text-center">
														<button type="button" class="btn btn-default" ng-click="transfertToAO()"><i class="fa fa-chevron-down fa-2x"></i></button>
													</div>
													<div class="col-md-6 text-center">
														<button type="button" class="btn btn-warning" ng-click="transfertToBC()"><i class="fa fa-chevron-down fa-2x"></i></button>
													</div>
												</div>
											</div>
										</div>
										</div>


							<div class="row">
								<div class="col-md-6">
									<fieldset>
										<legend>
											AO
										</legend>
										<div class="row">
												<div class="form-group">
													<label> Numéro </label>
													<input ng-model="ao.numero" type="text" class="form-control" placeholder="" >
												</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label> Date </label>
												<input ng-model="ao.date" type="date" class="form-control" placeholder="" >
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label> Intitulé </label>
												<input ng-model="ao.intitule" type="text" class="form-control" placeholder="" >
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label> Mode d'exécution </label>
												<select ng-model="ao.modeExecution" class="form-control">
													<option ng-repeat="i in modes" value="{{i.key}}">{{i.value}}</option>
												</select>
											</div>
										</div>
										<div class="row" ui-i18n="fr">
											<div ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsAO" ui-grid-resize-columns ui-grid-cellnav class="grid" style="height:200px !important;"></div>
										</div>
										<div class="row">
											<button style="width:100% !important;" type="button" class="btn btn-warning" ng-click="validerAO()">Valider</button>
										</div>
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>
										<legend>
											BC
										</legend>
										<div class="row">
											<div class="form-group">
												<label> Numéro </label>
												<input ng-model="bc.numero" type="text" class="form-control" placeholder="" >
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label> Date </label>
												<input ng-model="bc.date" type="date" class="form-control" placeholder="" >
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label> Fournisseur </label>
												<select ng-model="bc.fournisseurs_id" class="form-control">
													<option ng-repeat="i in fournisseurs" value="{{i.id}}">{{i.raison_social}}</option>
												</select>
											</div>
										</div>
										<div class="row" style="margin-top: 75px;" ui-i18n="fr">
											<div ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsBC" ui-grid-resize-columns ui-grid-cellnav class="grid" style="height:200px !important;"></div>
										</div>
										<div class="row">
											<button style="width:100% !important;" type="button" class="btn btn-warning" ng-click="validerBC()">Valider</button>
										</div>
									</fieldset>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--<script type="text/ng-template" id="expandableRowTemplate.html">
	<div ui-grid="row.entity.subGridOptions" ui-grid-selection ui-grid-pinning style="height:150px;"></div>
</script>
-->
<script language="javascript">
	$(document).ready(function() {
		app.controller("ctrl", ['i18nService','$scope',  'uiGridConstants','notificationFactory','$timeout', function (i18nService,$scope, uiGridConstants,notificationFactory,$timeout) {
			i18nService.setCurrentLang('fr');
			$scope.ao = new Object({items:[]});
			$scope.bc = new Object({items:[]});
			$scope.modes = [{'key':0,'value':'Marché Unique'},{'key':1,'value':'Allotis'},{'key':2,'value':'Reconductible'},{'key':3,'value':'Tranche conditionnelle'}];
			$scope.fournisseurs = [];
			$scope.total = 0;

			$scope.expressionBesoins = [];


			$scope.transfertToAO = function()
			{
				if($scope.gridApi.selection.getSelectedRows().length == 0){
					notificationFactory.warning("Veuillez sélectionner au moins un article!","Attention")
				}

				$scope.selectedRows = $scope.gridApi.selection.getSelectedRows();

				//ajouter les lignes selectionnées
				for(i=0;i<$scope.selectedRows.length;i++)
				{
					$scope.ao.items.push($scope.selectedRows[i]);
				}

				//supprimer les lignes selectionnées
				angular.forEach($scope.gridApi.selection.getSelectedRows(), function (data, index) {
					$scope.gridOptions.data.splice($scope.gridOptions.data.lastIndexOf(data), 1);
				});

			}


			$scope.transfertToBC = function()
			{
				if($scope.gridApi.selection.getSelectedRows().length == 0){
					notificationFactory.warning("Veuillez sélectionner au moins un article!","Attention")
				}

				$scope.selectedRows = $scope.gridApi.selection.getSelectedRows();

				//ajouter les lignes selectionnées
				for(i=0;i<$scope.selectedRows.length;i++)
				{
					$scope.bc.items.push($scope.selectedRows[i]);
				}

				//supprimer les lignes selectionnées
				angular.forEach($scope.gridApi.selection.getSelectedRows(), function (data, index) {
					$scope.gridOptions.data.splice($scope.gridOptions.data.lastIndexOf(data), 1);
				});
				/////
			}
			
			
			$scope.validerAO = function()
			{
				if( $scope.ao.modeExecution == undefined || $scope.ao.modeExecution == null || $scope.ao.modeExecution == "" ||$scope.ao.numero == undefined || $scope.ao.numero == null || $scope.ao.numero == "" || $scope.ao.intitule == undefined || $scope.ao.intitule == null || $scope.ao.intitule == "" || $scope.ao.date == undefined || $scope.ao.date == null || $scope.ao.date == ""){
					notificationFactory.warning("Veuillez saisir tous les informations qui concernent l'AO !", "Attention");
					return;
				}

				if( $scope.ao.items.length == 0 || $scope.ao.items == undefined){
					notificationFactory.warning("La liste d'AO est vide !", "Attention");
					return;
				}

				$scope.ao.date = mySqlDate($scope.ao.date);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('transfert_to_AO_BC/newAO') ?>",
					data : {'ao' : $scope.ao},//$scope.ao contient tous les infos ainsi que la liste des articles
					dataType:'json',
					success: function(result){
						console.log(result);
						$scope.lastAoNumber();

					},error: function (data) {
						console.log(data);
					}
				});
				//succés
				$scope.ao = new Object({items:[]});
				$scope.gridOptionsAO.data = $scope.ao.items;//vider la liste
				notificationFactory.success();
			}


			$scope.validerBC = function()
			{
				if( $scope.bc.fournisseurs_id == undefined || $scope.bc.fournisseurs_id == null || $scope.bc.fournisseurs_id == "" || $scope.bc.numero == undefined || $scope.bc.numero == null || $scope.bc.numero == "" || $scope.bc.date == undefined || $scope.bc.date == null || $scope.bc.date == ""){
					notificationFactory.warning("Veuillez saisir tous les informations qui concernent l'BC !", "Attention");
					return;
				}

				if( $scope.bc.items.length == 0 || $scope.bc.items == undefined){
					notificationFactory.warning("La liste des articles à commander est vide !", "Attention");
					return;
				}

				$scope.bc.date = mySqlDate($scope.bc.date);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('transfert_to_AO_BC/newBC') ?>",
					data : {'bc' : $scope.bc},//$scope.bc contient tous les infos ainsi que la liste des articles
					dataType:'json',
					success: function(result){
						console.log(result);
						$scope.lastBcNumber();

					},error: function (data) {
						console.log(data);
					}
				});
				//succés
				$scope.bc = new Object({items:[]});
				$scope.gridOptionsBC.data = $scope.bc.items;//vider la liste
				notificationFactory.success();
			}


			function mySqlDate(date) {
				var d = new Date(date),
					month = '' + (d.getMonth() + 1),
					day = '' + d.getDate(),
					year = d.getFullYear();

				if (month.length < 2) month = '0' + month;
				if (day.length < 2) day = '0' + day;

				return [year, month, day].join('-');
			}

			$scope.gridOptions = {
					onRegisterApi : function (gridApi) {
					$scope.gridApi = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});
						$scope.gridApi.core.notifyDataChange(uiGridConstants.dataChange.OPTIONS);
					},
				showColumnFooter: true,
				isRowSelectable : function(row) {
				if(row.entity.affected_to === "" || row.entity.affected_to == null) return true;
				else return false;
			},

			}


			$scope.gridOptionsAO = {
				onRegisterApi : function (gridApi) {
					$scope.gridApiAO = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});
				},
				data : $scope.ao.items,
				showColumnFooter: true,

			}


			$scope.gridOptionsBC = {
				onRegisterApi : function (gridApi) {
					$scope.gridApiBC = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});
				},
				data : $scope.bc.items,
				showColumnFooter: true,

			}

			var cellTemplateMontant = '<div class="ui-grid-cell-contents">{{row.entity.exp_besoin_articles_quantite * row.entity.exp_besoin_articles_prix | currency:dh}}</div>'
			var cellTemplateDeleteAO = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteAO(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';

			$scope.gridOptionsAO.columnDefs = [
				{ name: 'numero', displayName: 'Exp°', width: "10%", resizable: true },
				{ name: 'articles_intitule', displayName: 'Article', width: "*", resizable: true },
				{ name: 'description', displayName: 'Description', width: "*", resizable: true },
				{ name: 'exp_besoin_articles_quantite', displayName: 'Qte', width: "9%", resizable: true,cellFilter:'number:2' },
				{ name: 'exp_besoin_articles_prix', displayName: 'P.U', width: "12%", resizable: true,cellFilter:'currency:dh' },
				{name:"montant",displayName:'Montant',
					cellTemplate:cellTemplateMontant,
					type:'number', footerCellTemplate: '<div class="ui-grid-cell-contents">Total :{{grid.appScope.getTotalAo() | currency:dh}}</div>'
				},
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button style="width:40px !important;" class="btn btn-block" ng-click="grid.appScope.toggleFilteringAO()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteAO, sortable: false },
			];

			var cellTemplateDeleteBC = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteBC(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';

			$scope.gridOptionsBC.columnDefs = [
				{ name: 'numero', displayName: 'Exp°', width: "10%", resizable: true },
				{ name: 'articles_intitule', displayName: 'Article', width: "*", resizable: true },
				{ name: 'description', displayName: 'Description', width: "*", resizable: true },
				{ name: 'exp_besoin_articles_quantite', displayName: 'Qte', width: "9%", resizable: true,cellFilter:'number:2' },
				{ name: 'exp_besoin_articles_prix', displayName: 'P.U', width: "12%", resizable: true,cellFilter:'currency:dh' },
				{name:"montant",displayName:'Montant',
					cellTemplate:cellTemplateMontant,
					type:'number', footerCellTemplate: '<div class="ui-grid-cell-contents">Total :{{grid.appScope.getTotalBc() | currency:dh}}</div>'
				},
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button style="width:40px !important;" class="btn btn-block" ng-click="grid.appScope.toggleFilteringBC()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteBC, sortable: false },
			];

			var cellTemplateAffectedTo = '<div class="ui-grid-cell-contents"><div ng-if="row.entity.affected_to != null && row.entity.affected_to != \'\'">{{row.entity.affected_to}}</div><div ng-if="row.entity.affected_to == null || row.entity.affected_to == \'\'">NA</div></div>';

			$scope.gridOptions.columnDefs = [
				{ name: 'numero', displayName: 'Numéro', width: "*", resizable: true },
				{ name: 'objet', displayName: 'Objet', width: "*", resizable: true },
				{ name: 'service', displayName: 'Service Demandeur', width: "*", resizable: true },
				{ name: 'date', displayName: 'Date', width: "*", resizable: true,filterCellFiltered:true, },
				{ name: 'articles_intitule', displayName: 'Article', width: "*", resizable: true },
				{ name: 'description', displayName: 'Description', width: "*", resizable: true },
				{ name: 'exp_besoin_articles_quantite', displayName: 'Qte', width: "*", resizable: true,cellFilter:'number:2' },
				{ name: 'exp_besoin_articles_prix', displayName: 'P.U', width: "*", resizable: true,cellFilter:'currency:dh' },
				{name:"montant",displayName:'Montant',
					cellTemplate:cellTemplateMontant,
					type:'number', footerCellTemplate: '<div class="ui-grid-cell-contents">Total :{{grid.appScope.getTotal() | currency:dh}}</div>'
				},
				{name:"affected_to",displayName:'Affecté?',
					cellTemplate:cellTemplateAffectedTo,
					enableCellEdit: false,
				filterCellFiltered:true,
				},
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFiltering()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: '', sortable: false },
			];

			$scope.toggleFiltering = function () {
				console.log("toggle");
				$scope.gridOptions.enableFiltering = !$scope.gridOptions.enableFiltering;
				$scope.gridApi.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}
			$scope.toggleFilteringAO = function () {
				$scope.gridOptionsAO.enableFiltering = !$scope.gridOptionsAO.enableFiltering;
				$scope.gridApiAO.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}
			$scope.toggleFilteringBC = function () {
				$scope.gridOptionsBC.enableFiltering = !$scope.gridOptionsBC.enableFiltering;
				$scope.gridApiBC.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}
			$scope.deleteAO = function (item)
			{
				$scope.expressionBesoins.unshift(item);
				$scope.ao.items.splice($scope.ao.items.indexOf(item), 1);

			}

			$scope.deleteBC = function (item)
			{
				$scope.expressionBesoins.unshift(item);
				$scope.bc.items.splice($scope.bc.items.indexOf(item), 1);

			}

			
			$scope.getTotal = function()
			{
				$scope.total = 0;
				if($scope.expressionBesoins != undefined){
					for(i=0;i<$scope.expressionBesoins.length;i++)
						$scope.total += parseFloat($scope.expressionBesoins[i].exp_besoin_articles_prix) * parseFloat($scope.expressionBesoins[i].exp_besoin_articles_quantite);
				}

				return $scope.total;
			}

			$scope.getTotalAo = function()
			{
				$scope.totalAo = 0;
				if($scope.ao.items != undefined){
					for(i=0;i<$scope.ao.items.length;i++)
						$scope.totalAo += parseFloat($scope.ao.items[i].exp_besoin_articles_prix) * parseFloat($scope.ao.items[i].exp_besoin_articles_quantite);
				}

				return $scope.totalAo;
			}

			$scope.getTotalBc = function()
			{
				$scope.totalBc = 0;
				if($scope.bc.items != undefined){
					for(i=0;i<$scope.bc.items.length;i++)
						$scope.totalBc += parseFloat($scope.bc.items[i].exp_besoin_articles_prix) * parseFloat($scope.bc.items[i].exp_besoin_articles_quantite);
				}

				return $scope.totalBc;
			}
			var expressionBesoinId = <?php if(isset($_GET["expressionBesoinId"])) echo $_GET["expressionBesoinId"]; else echo "null"?>;

			$scope.lastAoNumber = function()
			{
				//charger le dernier numero AO
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('transfert_to_AO_BC/getLastAoNumber') ?>",
					cache: false,
					async: false,
					success: function(result){
						setTimeout(function(){
							$scope.ao.numero = (parseInt(result)+1) + '/' + new Date().getFullYear();
							$scope.$apply();
						});
					},error: function (data) {
						console.log(data);
					}
				});
			}

			$scope.lastBcNumber = function()
			{
				//charger le dernier numero Bc
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('transfert_to_AO_BC/getLastBcNumber') ?>",
					cache: false,
					async: false,
					success: function(result){
						setTimeout(function(){
							$scope.bc.numero = (parseInt(result)+1) + '/' + new Date().getFullYear();
							$scope.$apply();
						});

					},error: function (data) {
						console.log(data);
					}
				});
			}
			//alert(expressionBesoinId);
			$scope.getData = function(){
				$scope.lastAoNumber();
				$scope.lastBcNumber();

				//cahrger les fournisseurs
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('transfert_to_AO_BC/getFournisseurs') ?>",
					cache: false,
					async: false,
					data:{expressionBesoinId:expressionBesoinId},
					success: function(result){
						$scope.fournisseurs = result;
					},error: function (data) {
						console.log(data);
					}
				});

				$.ajax({
						type: "GET",
						url: "<?php echo base_url('transfert_to_AO_BC/getExpBesoins') ?>",
						cache: false,
						async: false,
						data:{expressionBesoinId:expressionBesoinId},
						success: function(result){
							$scope.expressionBesoins = result;
							console.log(result);

							$scope.gridOptions.data = $scope.expressionBesoins;
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