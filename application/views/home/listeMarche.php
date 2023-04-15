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
		<li><a href="<?php echo base_url()?>welcome"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>marche"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeMarche"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>

<div class="wrap-content container" id="container" ng-controller="ctrl" ng-cloak>
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
								Liste des marchés
							</legend>
							<div class="row">
								<div class="col-md-2 col-md-offset-5">
									<div class="form-group">
										<label for="form-field-select-2"> Année </label>
										<select  ng-options="item.year as item.year for item in years" id="year" ng-model="selectedYear" class="form-control">
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div ui-grid-selection ui-grid-edit ui-grid-pagination ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptions" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>
							</div>
							<div ng-show="selectedRow() != null">
							<div class="row">
								<div class="cola-md-12">
									<ul class="nav nav-tabs">
										<li><a href="#conditions" data-toggle="tab">Conditions</a></li>
										<li><a href="#attachement_livraison" data-toggle="tab">Attachement/Livraison</a></li>
										<li><a href="#decomptes" data-toggle="tab">Liquidation</a></li>
										<li><a href="#autres" data-toggle="tab">Autres</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="conditions">


											<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOne" style="background-color: #BEBEBE">
														<h4 class="panel-title">
															<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
																Dates
															</a>
														</h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
														<div class="panel-body">

																	<div class="row">
																		<div class="col-md-4">
																			<div class="form-group">
																				<label> Date de maintien d'offre</label>
																				<input ng-model="selectedRow().m_maintien_date" type="date" class="form-control" placeholder="">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label> Date de signature </label>
																				<input ng-model="selectedRow().m_signature_date" type="date" class="form-control" placeholder="">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label> Date d'approbation </label>
																				<input ng-model="selectedRow().m_approbation_date" type="date" class="form-control" placeholder="">
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-4">
																			<div class="form-group">
																				<label> Date de notification </label>
																				<input ng-model="selectedRow().m_notification_date" type="date" class="form-control" placeholder="">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label> Date d'ordre de service </label>
																				<input ng-model="selectedRow().m_ordre_service_date" type="date" class="form-control" placeholder="">
																			</div>
																		</div>
																	</div>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingTwo" style="background-color: #CCCCCC">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
																VISA
															</a>
														</h4>
													</div>
													<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
														<div class="panel-body">

															<div class="col-md-6">
																<div class="form-group">
																	<label> Numéro VISA </label>
																	<input ng-model="selectedRow().m_visa_numero" type="text" class="form-control" placeholder="">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label> Date VISA </label>
																	<input ng-model="selectedRow().m_visa_date" type="date" class="form-control" placeholder="">
																</div>
															</div>

														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingThree" style="background-color: #D3D3D3">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
																Caution définitive
															</a>
														</h4>
													</div>
													<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
														<div class="panel-body">

															<div class="col-md-4">
																<div class="form-group">
																	<label> Montant (en Dh)</label>
																	<input ng-model="selectedRow().m_caution_montant" type="number" class="form-control" placeholder="">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label> Banque </label>
																	<input ng-model="selectedRow().m_caution_banque" type="text" class="form-control" placeholder="">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label> Date </label>
																	<input ng-model="selectedRow().m_caution_date" type="date" class="form-control" placeholder="">
																</div>
															</div>



														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingNantissement" style="background-color: #DBDBDB">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#colNantissement" aria-expanded="false" aria-controls="colNantissement">
																Nantissement
															</a>
														</h4>
													</div>
													<div id="colNantissement" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNantissement">
														<div class="panel-body">

															<div class="col-md-6">
																<div class="form-group">
																	<label> Banque</label>
																	<input ng-model="selectedRow().m_nantissement_banque" type="text" class="form-control" placeholder="">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label> Date</label>
																	<input ng-model="selectedRow().m_nantissement_date" type="date" class="form-control" placeholder="">
																</div>
															</div>



														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingDelai" style="background-color: #E3E3E3">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#colDelai" aria-expanded="false" aria-controls="colDelai">
																Délai d'exécution
															</a>
														</h4>
													</div>
													<div id="colDelai" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDelai">
														<div class="panel-body">

															<div class="col-md-6">
																<div class="form-group">
																	<label> Délai d'exécution (en mois)</label>
																	<input ng-model="selectedRow().m_delai_execution" type="number" class="form-control" placeholder="en mois ...">
																</div>
															</div>


														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingAvenant" style="background-color: #EBEBEB">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#colAvenant" aria-expanded="false" aria-controls="colAvenant">
																Avenant
															</a>
														</h4>
													</div>
													<div id="colAvenant" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAvenant">
														<div class="panel-body">

															<div class="col-md-6">
																<div class="form-group">
																	<label> Avenant</label>
																	<input ng-model="selectedRow().m_avenant" type="text" class="form-control" placeholder="">
																</div>
															</div>



														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOrdre" style="background-color: #F5F5F5">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#colOrdre" aria-expanded="false" aria-controls="colOrdre">
																Ordre d'Arrêt/Reprise
															</a>
														</h4>
													</div>
													<div id="colOrdre" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOrdre">
														<div class="panel-body">

															<div class="col-md-12">
																<div ui-grid-edit ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsArretReprise" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>
															</div>



														</div>
													</div>
												</div>





											</div>








										</div>

										<div class="tab-pane" id="decomptes">
											<div ui-grid-edit ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsDecompte" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>
										</div>

										<div class="tab-pane" id="attachement_livraison">



											<div class="row">
												<div ui-grid-edit ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsAttachementLivraison" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>

											</div>



										</div>
										<div class="tab-pane" id="autres">









											<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">


											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingResiliation" style="background-color: #BEBEBE">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseResiliation" aria-expanded="true" aria-controls="collapseResiliation">
															Résiliation
														</a>
													</h4>
												</div>
												<div id="collapseResiliation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingResiliation">
													<div class="panel-body">

														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label> Date </label>
																	<input ng-model="selectedRow().m_resiliation_date" type="date" class="form-control" placeholder="">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label> Motif </label>
																	<input ng-model="selectedRow().m_resiliation_motif" type="text" class="form-control" placeholder="">
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>



												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingMainLevee" style="background-color: #D3D3D3">
														<h4 class="panel-title">
															<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseMainLevee" aria-expanded="false" aria-controls="collapseMainLevee">
																Main levée
															</a>
														</h4>
													</div>
													<div id="collapseMainLevee" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMainLevee">
														<div class="panel-body">

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label> Date </label>
																		<input ng-model="selectedRow().m_main_levee_date" type="date" class="form-control" placeholder="">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>



												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingAnnulation" style="background-color: #F0F0F0">
														<h4 class="panel-title">
															<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseAnnulation" aria-expanded="false" aria-controls="collapseAnnulation">
																Annulation
															</a>
														</h4>
													</div>
													<div id="collapseAnnulation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAnnulation">
														<div class="panel-body">

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label> Date </label>
																		<input ng-model="selectedRow().m_annulation_date" type="date" class="form-control" placeholder="">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label> Commentaire </label>
																		<input ng-model="selectedRow().m_annulation_comment" type="text" class="form-control" placeholder="">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

										</div>



















											<div class="row">
												<fieldset>
													<legend>
														Réclamations
													</legend>
													<div class="col-md-12">
														<div ui-grid-edit ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsReclamation" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>
													</div>
												</fieldset>
											</div>
											<!--<div class="row">
												<fieldset>
													<legend>
														Réclamation
													</legend>
													<div class="col-md-6">
														<div class="form-group">
															<label> Réclamation </label>
															<input ng-model="selectedRow().m_reclamation" type="text" class="form-control" placeholder="">
														</div>
													</div>
												</fieldset>
											</div>-->

										</div>
										</div>
									</div>
								</div>
							<div class="row" ng-hide="filter!='null'">
								<div class="col-md-12 text-center">
									<button ng-click="updateMarche(selectedRow())" class="btn btn-wide btn-warning" style="width:30%;">
										Enregistrer
									</button>
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
		app.controller("ctrl", ['i18nService','$scope',  'uiGridConstants','notificationFactory','$timeout', function (i18nService,$scope, uiGridConstants,notificationFactory,$timeout) {
			i18nService.setCurrentLang('fr');
			$scope.marches = [];
			$scope.status = [{'key':0,'value':'Liquidation'},{'key':1,'value':'Soldé'},{'key':2,'value':'Annulé'},{'key':3,'value':'Résilié'}];
			$scope.arretReprise = [{'key':0,'value':'Arrêt'},{'key':1,'value':'Reprise'}];
			$scope.natures = [{'key':0,'value':'Fournitures'},{'key':1,'value':'Services'},{'key':2,'value':'Travaux'}];
			$scope.types_reception = [{'key':'Provisoire','value':'Provisoire'},{'key':'Définitive','value':'Définitive'}];
			$scope.natures_reception = [{'key':'Partielle','value':'Partielle'},{'key':'Totale','value':'Totale'}];
			$scope.gridOptions = {
				//enableRowSelection: true,
				//enableFullRowSelection : true,
				onRegisterApi : function (gridApi) {
					$scope.gridApi = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});
					gridApi.selection.on.rowSelectionChanged($scope, function(row)
					{
						console.log(row.entity);
					});
					$scope.gridApi.grid.modifyRows($scope.gridOptions.data);
					$scope.gridApi.selection.selectRow($scope.gridOptions.data[0]);
				},
				paginationPageSizes: [10, 50, 100],
				paginationPageSize: 10,
			}

			$scope.gridOptionsDecompte = {
				//enableRowSelection: true,
				//enableFullRowSelection : true,
				onRegisterApi : function (gridApi) {
					$scope.gridApiDecompte = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});

				},

				showColumnFooter: true,
			}


			$scope.gridOptionsAttachementLivraison = {
				//enableRowSelection: true,
				//enableFullRowSelection : true,
				onRegisterApi : function (gridApi) {
					$scope.gridApiAttachementLivraison = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});

				},

				showColumnFooter: true,
			}
			$scope.gridOptionsReclamation = {
				//enableRowSelection: true,
				//enableFullRowSelection : true,
				onRegisterApi : function (gridApi) {
					$scope.gridApiReclamation = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});

				},

				showColumnFooter: true,
			}

			$scope.gridOptionsArretReprise = {
				//enableRowSelection: true,
				//enableFullRowSelection : true,
				onRegisterApi : function (gridApi) {
					$scope.gridApiArretReprise = gridApi;

					gridApi.grid.registerRowBuilder(function (row, gridOptions) {
					});
					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {
					});

				},
			}

			$scope.gridOptions.multiSelect = false;
			$scope.gridOptions.modifierKeysToMultiSelect = false;
			$scope.gridOptions.noUnselect = true;
			$scope.selectedRow = function()
			{
				if($scope.gridApi != undefined && $scope.gridApi != null && $scope.gridApi.selection.getSelectedRows().length == 1) {

					var selected = $scope.gridApi.selection.getSelectedRows()[0];
					$scope.gridOptionsDecompte.data = selected.decomptes;
					$scope.gridOptionsReclamation.data = selected.reclamations;
					$scope.gridOptionsAttachementLivraison.data = selected.attachement_livraisons;
					$scope.gridOptionsArretReprise.data = selected.arret_reprise_marches;

					$scope.gridOptionsAttachementLivraison.columnDefs[4].editDropdownOptionsArray = selected.lots;

					return selected;
				}

				return null;// ou undefined
			}

			function jsDate(date)
			{
					var parts = date
				Str.split("-");
					return new Date(parts[2], parts[1] - 1, parts[0]);
			}

			var cellTemplateUpdate = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateMarche(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';
			var cellTemplateDelete = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteMarche(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';
			$scope.gridOptions.columnDefs = [
				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.getData()"><span class="fa fa-refresh text-white"></span></button>', cellTemplate: cellTemplateUpdate, sortable: false },
				{ name: 'ao_numero', displayName: 'AO°', width: "*", resizable: true,enableCellEdit: false, },
				{ name: 'm_numero', displayName: 'Marché°', width: "*", resizable: true },
				{ name: 'm_intitule', displayName: 'Intitulé', width: "*", resizable: true, cellTemplate : '<div class="ui-grid-cell-contents" title="{{row.entity.m_intitule}}">{{grid.getCellValue(row, col)}}</div>',},
				{ name: 'm_nature', displayName: 'Nature', width: "*", resizable: true,
					editType: 'dropdown',
					editDropdownOptionsArray: $scope.natures,
					editableCellTemplate: 'ui-grid/dropdownEditor',
					editDropdownIdLabel: 'key',
					editDropdownValueLabel: 'value',
					cellFilter:'mapNature',
				},
				{ name: 'f_raison_social', displayName: 'Fournisseur', width: "*", resizable: true,enableCellEdit: false, },
				{ name: 'm_montantTTC', displayName: 'Montant TTC', width: "*", resizable: true,type:'number',cellFilter:'currency:dh' },
				{ name: 'm_status', displayName: 'Statut', width: "*", resizable: true,
					editType: 'dropdown',
					editDropdownOptionsArray: $scope.status,
					editableCellTemplate: 'ui-grid/dropdownEditor',
					editDropdownIdLabel: 'key',
					editDropdownValueLabel: 'value',
					cellFilter:'mapStatusMarche',
				},
				{ name: 'm_observation', displayName: 'Obsérvation', width: "*", resizable: true },
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFiltering()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDelete, sortable: false },
			];



			var cellTemplateUpdateDecompte = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateDecompte(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';
			var cellTemplateDeleteDecompte = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteDecompte(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';
			$scope.gridOptionsDecompte.columnDefs = [
				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.addNewDecompte()"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdateDecompte, sortable: false },
				{ name: 'intitule', displayName: 'Intitulé', width: "*", resizable: true,},
				{ name: 'date', displayName: 'Date', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },
				{ name: 'montant', displayName: 'Montant', width: "*", resizable: true,type:'number',cellFilter:'currency:dh',aggregationType: uiGridConstants.aggregationTypes.sum },
				{ name: 'comment', displayName: 'Commentaire', width: "*", resizable: true },
				{ name: 'ordonnance', displayName: 'Ordonnancé ?', width: "*",type:'boolean',cellTemplate : '<input type="checkbox" ng-change="grid.appScope.updateDecompte(row.entity)" ng-model="row.entity.ordonnance">', resizable: true },
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFilteringDecompte()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteDecompte, sortable: false },
			];

			var cellTemplateUpdateAttachementLivraison = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateAttachementLivraison(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';
			var cellTemplateDeleteAttachementLivraison = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteAttachementLivraison(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';
			$scope.gridOptionsAttachementLivraison.columnDefs = [
				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.addNewAttachementLivraison()"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdateAttachementLivraison, sortable: false },
				{ name: 'date_livraison', displayName: 'Date de la livraison', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },
				{ name: 'type_reception', displayName: 'Type Réception', width: "*", resizable: true,
					editType: 'dropdown',
					editDropdownOptionsArray: $scope.types_reception,
					editableCellTemplate: 'ui-grid/dropdownEditor',
					editDropdownIdLabel: 'key',
					editDropdownValueLabel: 'value',},
				{ name: 'nature_reception', displayName: 'Nature Réception', width: "*", resizable: true,
					editType: 'dropdown',
					editDropdownOptionsArray: $scope.natures_reception,
					editableCellTemplate: 'ui-grid/dropdownEditor',
					editDropdownIdLabel: 'key',
					editDropdownValueLabel: 'value',},
				{ name: 'lot', displayName: 'LOT', width: "*", resizable: true,
					editType: 'dropdown',
					editableCellTemplate: 'ui-grid/dropdownEditor',
					editDropdownIdLabel: 'lot',
					editDropdownValueLabel: 'lot',
					cellTemplate : '<div class="ui-grid-cell-contents" title="{{row.entity.lot}}">{{grid.getCellValue(row, col)}}</div>',
				},
				{ name: 'lieu', displayName: 'Lieu', width: "*", resizable: true },
				{ name: 'montant', displayName: 'Montant', width: "*", resizable: true,type:'number',cellFilter:'currency:dh',aggregationType: uiGridConstants.aggregationTypes.sum },
				{ name: 'comment', displayName: 'Commentaire', width: "*", resizable: true },
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFilteringDecompte()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteAttachementLivraison, sortable: false },
			];

			var cellTemplateUpdateReclamation = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateReclamation(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';
			var cellTemplateDeleteReclamation = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteReclamation(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';
			$scope.gridOptionsReclamation.columnDefs = [
				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.addNewReclamation()"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdateReclamation, sortable: false },
				{ name: 'date', displayName: 'Date', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },
				{ name: 'comment', displayName: 'Pourquoi ?', width: "*", resizable: true },
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFilteringReclamation()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteReclamation, sortable: false },
			];
			
			//arret_reprise

			var cellTemplateUpdateArretReprise = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateArretReprise(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';
			var cellTemplateDeleteArretReprise = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteArretReprise(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';
			$scope.gridOptionsArretReprise.columnDefs = [
				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.addNewArretReprise()"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdateArretReprise, sortable: false },
				{ name: 'arret_ou_reprise', displayName: 'Arrêt/Reprise', width: "*", resizable: true,filterCellFiltered:true,
					editType: 'dropdown',
					editDropdownOptionsArray: $scope.arretReprise,
					editableCellTemplate: 'ui-grid/dropdownEditor',
					editDropdownIdLabel: 'key',
					editDropdownValueLabel: 'value',
					cellFilter:'mapArretReprise',

				},
				{ name: 'date', displayName: 'Date', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'" ,filterCellFiltered:true},
				{ name: 'comment', displayName: 'Commentaire', width: "*", resizable: true },
				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFilteringArretReprise()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteArretReprise, sortable: false },
			];

			$scope.toggleFiltering = function () {
				console.log("toggle");
				$scope.gridOptions.enableFiltering = !$scope.gridOptions.enableFiltering;
				$scope.gridApi.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}

			$scope.toggleFilteringArretReprise = function () {
				console.log("toggle");
				$scope.gridOptionsArretReprise.enableFiltering = !$scope.gridOptionsArretReprise.enableFiltering;
				$scope.gridApiArretReprise.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}
			
			$scope.toggleFilteringDecompte = function () {
				console.log("toggle");
				$scope.gridOptionsDecompte.enableFiltering = !$scope.gridOptionsDecompte.enableFiltering;
				$scope.gridApiDecompte.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}

			$scope.toggleFilteringDecompte = function () {
				console.log("toggle");
				$scope.gridOptionsAttachementLivraison.enableFiltering = !$scope.gridOptionsAttachementLivraison.enableFiltering;
				$scope.gridApiDecompte.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}

			$scope.toggleFilteringReclamation = function () {
				console.log("toggle");
				$scope.gridOptionsReclamation.enableFiltering = !$scope.gridOptionsReclamation.enableFiltering;
				$scope.gridApiReclamation.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}

			$scope.addNewDecompte = function()
			{
				$scope.selectedRow().decomptes.unshift({id:null,marches_id:$scope.selectedRow().idM,date:new Date()});
			}

			$scope.addNewAttachementLivraison = function()
			{
				$scope.selectedRow().attachement_livraisons.unshift({id:null,marches_id:$scope.selectedRow().idM,date_livraison:new Date()});
			}

			$scope.addNewArretReprise = function()
			{
				$scope.selectedRow().arret_reprise_marches.unshift({id:null,marches_id:$scope.selectedRow().idM,date:new Date()});
			}

			$scope.addNewReclamation = function()
			{
				$scope.selectedRow().reclamations.unshift({id:null,marches_id:$scope.selectedRow().idM,date:new Date()});
			}
			
			$scope.deleteMarche = function (item)
			{
				if(confirm("Voulez vous supprimer cet enregistrement ?"))
				{
					$.ajax({
						type: "GET",
						url: "<?php echo base_url('ListeMarche/delete') ?>",
						data: {id:item.idM},
						dataType:'json',
						success: function(result){
							console.log(result);
							$scope.marches.splice($scope.marches.indexOf(item), 1);
							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}
			}

			$scope.deleteReclamation = function (item)
			{
				if(confirm("Voulez vous supprimer cet enregistrement ?"))
				{
					$.ajax({
						type: "GET",
						url: "<?php echo base_url('ListeMarche/deleteReclamation') ?>",
						data: {id:item.id},
						dataType:'json',
						success: function(result){
							console.log(result);
							$scope.selectedRow().reclamations.splice($scope.selectedRow().reclamations.indexOf(item), 1);
							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}
			}

			$scope.updateDecompte = function(item)
			{

				if(item.date == undefined || item.date == null || item.date == "0")//1970
				{
					notificationFactory.warning("Remplissez la date du décompte/attachement","Attention");
					return;
				}

				var decompte = new Object();
				decompte.id = item.id;
				decompte.intitule = item.intitule;
				decompte.comment = item.comment;
				decompte.montant = item.montant;
				if(item.ordonnance == true)
					decompte.ordonnance = 1;
				else
					decompte.ordonnance = 0;
				decompte.marches_id = item.marches_id;
				if(item.date != null)
					decompte.date = item.date.getTime();
				else
					decompte.date = null;


				if(decompte.id == null)
				{
					//delete decompte["id"];//
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/addDecompte') ?>",
						data: {decompte:decompte},
						dataType:'json',
						success: function(result){
							console.log(result);
							item.id = parseInt(result);
							notificationFactory.success();
						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}else
				{

					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/updateDecompte') ?>",
						data: {decompte:decompte},
						dataType:'json',
						success: function(result){
							console.log(result);
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}

			}


			$scope.updateAttachementLivraison = function(item)
			{

				if(item.date_livraison == undefined || item.date_livraison == null || item.date_livraison == "0")//1970
				{
					notificationFactory.warning("Remplissez la date de livraison","Attention");
					return;
				}

				var attachement_livraison = new Object();
				attachement_livraison.id = item.id;
				attachement_livraison.lot = item.lot;
				attachement_livraison.comment = item.comment;
				attachement_livraison.type_reception = item.type_reception;
				attachement_livraison.nature_reception = item.nature_reception;
				attachement_livraison.lieu = item.lieu;
				attachement_livraison.montant = item.montant;
				attachement_livraison.marches_id = item.marches_id;


				if(item.date_livraison != null)
					attachement_livraison.date_livraison = item.date_livraison.getTime();
				else
					attachement_livraison.date_livraison = null;


				if(attachement_livraison.id == null)
				{
					//delete decompte["id"];//
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/addAttachementLivraison') ?>",
						data: {attachement_livraison:attachement_livraison},
						dataType:'json',
						success: function(result){
							console.log(result);
							item.id = parseInt(result);
							notificationFactory.success();
						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}else
				{

					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/updateAttachementLivraison') ?>",
						data: {attachement_livraison:attachement_livraison},
						dataType:'json',
						success: function(result){
							console.log(result);
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}

			}

			$scope.updateReclamation = function(item)
			{

				if(item.date == undefined || item.date == null || item.date == "0")//1970
				{
					notificationFactory.warning("Remplissez la date de la réclamation","Attention");
					return;
				}

				var reclamation = new Object();
				reclamation.id = item.id;
				reclamation.comment = item.comment;
				reclamation.marches_id = item.marches_id;

				if(item.date != null)
					reclamation.date = item.date.getTime();
				else
					reclamation.date = null;


				if(reclamation.id == null)
				{
					//delete reclamation["id"];//
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/addReclamation') ?>",
						data: {reclamation:reclamation},
						dataType:'json',
						success: function(result){
							console.log(result);
							item.id = parseInt(result);
							notificationFactory.success();
						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}else
				{

					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/updateReclamation') ?>",
						data: {reclamation:reclamation},
						dataType:'json',
						success: function(result){
							console.log(result);
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}

			}


			$scope.updateArretReprise = function(item)
			{

				if(item.date == undefined || item.date == null || item.date == "0")//1970
				{
					notificationFactory.warning("Entrez une date valide !","Attention");
					return;
				}

				var arretReprise = new Object();
				arretReprise.id = item.id;
				arretReprise.arret_ou_reprise = item.arret_ou_reprise;
				arretReprise.comment = item.comment;
				arretReprise.marches_id = item.marches_id;
				if(item.date != null)
					arretReprise.date = item.date.getTime();
				else
					arretReprise.date = null;


				if(arretReprise.id == null)
				{
					console.log(arretReprise);
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/addArretReprise') ?>",
						data: {arret_reprise_marches:arretReprise},
						dataType:'json',
						success: function(result){
							console.log(result);
							item.id = parseInt(result);
							notificationFactory.success();
						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}else
				{
					console.log(arretReprise);

					$.ajax({
						type: "POST",
						url: "<?php echo base_url('ListeMarche/updateArretReprise') ?>",
						data: {arret_reprise_marches:arretReprise},
						dataType:'json',
						success: function(result){
							console.log(result);
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}





			}

			$scope.deleteDecompte = function (item)
			{
				if(confirm("Voulez vous supprimer cet enregistrement ?"))
				{
					$.ajax({
						type: "GET",
						url: "<?php echo base_url('ListeMarche/deleteDecompte') ?>",
						data: {id:item.id},
						dataType:'json',
						success: function(result){
							console.log(result);
							$scope.selectedRow().decomptes.splice($scope.selectedRow().decomptes.indexOf(item), 1);
							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}
			}

			$scope.deleteAttachementLivraison = function (item)
			{
				if(confirm("Voulez vous supprimer cet enregistrement ?"))
				{
					$.ajax({
						type: "GET",
						url: "<?php echo base_url('ListeMarche/deleteAttachementLivraison') ?>",
						data: {id:item.id},
						dataType:'json',
						success: function(result){
							console.log(result);
							$scope.selectedRow().attachement_livraisons.splice($scope.selectedRow().attachement_livraisons.indexOf(item), 1);
							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}
			}

			$scope.deleteArretReprise = function (item)
			{
				if(confirm("Voulez vous supprimer cet enregistrement ?"))
				{
					$.ajax({
						type: "GET",
						url: "<?php echo base_url('ListeMarche/deleteArretReprise') ?>",
						data: {id:item.id},
						dataType:'json',
						success: function(result){
							console.log(result);
							$scope.selectedRow().arret_reprise_marches.splice($scope.selectedRow().arret_reprise_marches.indexOf(item), 1);
							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}
			}

			$scope.updateMarche = function(item)
			{
				console.log(item);


				var marche = new Object();
				marche.ao_intitule = item.ao_intitule;
				marche.ao_numero = item.ao_numero;
				marche.f_raison_social = item.f_raison_social;
				marche.idM = item.idM;
				/*marche.m_reclamation = item.m_reclamation ;*/

				if(item.m_approbation_date != null)
					marche.m_approbation_date = item.m_approbation_date.getTime();
				else
					marche.m_approbation_date = null;

				if(item.m_ordre_service_date != null)
					marche.m_ordre_service_date = item.m_ordre_service_date.getTime();
				else
					marche.m_ordre_service_date = null;

				marche.m_avenant = item.m_avenant;
				marche.m_caution_banque = item.m_caution_banque;

				if(item.m_caution_date != null)
					marche.m_caution_date = item.m_caution_date.getTime();
				else
					marche.m_caution_date = null;

				marche.m_caution_montant = item.m_caution_montant;
				marche.m_delai_execution = item.m_delai_execution;
				marche.m_intitule = item.m_intitule;

				if(item.m_maintien_date != null)
					marche.m_maintien_date = item.m_maintien_date.getTime();
				else
					marche.m_maintien_date = null;

				if(item.m_main_levee_date != null)
					marche.m_main_levee_date = item.m_main_levee_date.getTime();
				else
					marche.m_main_levee_date = null;

				if(item.m_annulation_date != null)
					marche.m_annulation_date = item.m_annulation_date.getTime();
				else
					marche.m_annulation_date = null;

				marche.m_annulation_comment = item.m_annulation_comment;


				marche.m_montantTTC = item.m_montantTTC;
				marche.m_nantissement_banque = item.m_nantissement_banque;

				if(item.m_nantissement_date != null)
					marche.m_nantissement_date = item.m_nantissement_date.getTime();
				else
					marche.m_nantissement_date = null;

				marche.m_nature = item.m_nature;

				if(item.m_notification_date != null)
					marche.m_notification_date = item.m_notification_date.getTime();
				else
					marche.m_notification_date = null;

				marche.m_numero = item.m_numero;
				marche.m_observation = item.m_observation;

				if(item.m_resiliation_date != null)
					marche.m_resiliation_date = item.m_resiliation_date.getTime();
				else
					marche.m_resiliation_date = null;

				marche.m_resiliation_motif = item.m_resiliation_motif;

				if(item.m_signature_date != null)
					marche.m_signature_date = item.m_signature_date.getTime();
				else
					marche.m_signature_date = null;

				marche.m_status = item.m_status;

				if(item.m_visa_date != null)
					marche.m_visa_date = item.m_visa_date.getTime();
				else
					marche.m_visa_date = null;

				marche.m_visa_numero = item.m_visa_numero;

				$.ajax({
					type: "POST",
					url: "<?php echo base_url('ListeMarche/update') ?>",
					data: {marche:marche},
					dataType:'json',
					success: function(result){
						console.log(result);
						notificationFactory.success();

					},error: function (jqXHR, textStatus, errorThrown) {
						console.log(textStatus);
						console.log(errorThrown);
					}
				});

			}

			$scope.filter = '<?php if(isset($_GET["filter"])) echo $_GET["filter"]; else echo "null"?>';

			if($scope.filter != 'null')
			{
				$scope.gridOptions.columnDefs[0].cellTemplate = '';
				$scope.gridOptions.columnDefs[$scope.gridOptions.columnDefs.length-1].cellTemplate = '';
				$scope.gridOptions.enableCellEdit = false;

				$scope.gridOptionsArretReprise.columnDefs[0].cellTemplate = '';
				$scope.gridOptionsArretReprise.columnDefs[$scope.gridOptionsArretReprise.columnDefs.length-1].cellTemplate = '';
				$scope.gridOptionsArretReprise.enableCellEdit = false;

				$scope.gridOptionsDecompte.columnDefs[0].cellTemplate = '';
				$scope.gridOptionsDecompte.columnDefs[$scope.gridOptionsDecompte.columnDefs.length-1].cellTemplate = '';
				$scope.gridOptionsDecompte.enableCellEdit = false;

			}
			$scope.getData = function(){
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('ListeMarche/getMarches') ?>",
					cache: false,
					async: false,
					data:{filter:$scope.filter,year:$scope.selectedYear},
					success: function(result){

						console.log(result);

						for(i = 0; i < result.length; i++) {
							//daates
							if(result[i].m_signature_date != "0" && result[i].m_signature_date != null)
								result[i].m_signature_date = new Date(parseInt(result[i].m_signature_date));
							if(result[i].m_approbation_date != "0" && result[i].m_approbation_date != null)
								result[i].m_approbation_date = new Date(parseInt(result[i].m_approbation_date));
							if(result[i].m_caution_date != "0" && result[i].m_caution_date != null)
								result[i].m_caution_date = new Date(parseInt(result[i].m_caution_date));
							if(result[i].m_maintien_date != "0" && result[i].m_maintien_date != null)
								result[i].m_maintien_date = new Date(parseInt(result[i].m_maintien_date));
							if(result[i].m_nantissement_date != "0" && result[i].m_nantissement_date != null)
								result[i].m_nantissement_date = new Date(parseInt(result[i].m_nantissement_date));
							if(result[i].m_notification_date != "0" && result[i].m_notification_date != null)
								result[i].m_notification_date = new Date(parseInt(result[i].m_notification_date));
							if(result[i].m_resiliation_date != "0" && result[i].m_resiliation_date != null)
								result[i].m_resiliation_date = new Date(parseInt(result[i].m_resiliation_date));
							if(result[i].m_visa_date != "0" && result[i].m_visa_date != null)
								result[i].m_visa_date = new Date(parseInt(result[i].m_visa_date));
							if(result[i].m_main_levee_date != "0" && result[i].m_main_levee_date != null)
								result[i].m_main_levee_date = new Date(parseInt(result[i].m_main_levee_date));
							if(result[i].m_annulation_date != "0" && result[i].m_annulation_date != null)
								result[i].m_annulation_date = new Date(parseInt(result[i].m_annulation_date));
							if(result[i].m_ordre_service_date != "0" && result[i].m_ordre_service_date != null)
								result[i].m_ordre_service_date = new Date(parseInt(result[i].m_ordre_service_date));


							if(result[i].m_caution_montant != null)
								result[i].m_caution_montant = parseFloat(result[i].m_caution_montant);
							if(result[i].m_montantTTC != null)
								result[i].m_montantTTC = parseFloat(result[i].m_montantTTC);
							if(result[i].m_delai_execution != null)
								result[i].m_delai_execution = parseFloat(result[i].m_delai_execution);

							for(k=0;k<result[i].decomptes.length;k++)
							{
								if(result[i].decomptes[k].date != "0" && result[i].decomptes[k].date != null)
									result[i].decomptes[k].date = new Date(parseInt(result[i].decomptes[k].date));

								if(result[i].decomptes[k].montant != null)
									result[i].decomptes[k].montant = parseFloat(result[i].decomptes[k].montant);

								result[i].decomptes[k].ordonnance = Boolean(+result[i].decomptes[k].ordonnance);

							}

							for(k=0;k<result[i].attachement_livraisons.length;k++)
							{
								if(result[i].attachement_livraisons[k].date_livraison != "0" && result[i].attachement_livraisons[k].date_livraison != null)
									result[i].attachement_livraisons[k].date_livraison = new Date(parseInt(result[i].attachement_livraisons[k].date_livraison));

								if(result[i].attachement_livraisons[k].montant != null)
									result[i].attachement_livraisons[k].montant = parseFloat(result[i].attachement_livraisons[k].montant);

							}

							for(k=0;k<result[i].reclamations.length;k++)
							{
								if(result[i].reclamations[k].date != "0" && result[i].reclamations[k].date != null)
									result[i].reclamations[k].date = new Date(parseInt(result[i].reclamations[k].date));

							}

							for(k=0;k<result[i].arret_reprise_marches.length;k++)
							{
								if(result[i].arret_reprise_marches[k].date != "0" && result[i].arret_reprise_marches[k].date != null)
									result[i].arret_reprise_marches[k].date = new Date(parseInt(result[i].arret_reprise_marches[k].date));
							}
						}
						$scope.marches = result;
						$scope.gridOptions.data = $scope.marches;

					},error: function (data) {
						console.log(data);
					}
				});
			}
			$scope.$watch('selectedYear', function(newValue, oldValue) {
				$scope.getData();
			});



			$scope.getYears = function(){
				$scope.years = [];
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('Dashboard/getYears') ?>",
					cache: false,
					async: false,
					success: function(result){
						$scope.years = result;
						$scope.selectedYear = $scope.years[0].year;
					},error: function (data) {
						console.log(data);
					}
				});
			}

			$scope.getYears();
		}]);
		angular.bootstrap(document, ['AdminModule']);
	});

</script>