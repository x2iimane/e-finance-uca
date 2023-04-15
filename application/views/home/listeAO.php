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

	

	.green{

		background: #bedcbe !important;

	}





</style>



<!-- start: BREADCRUMB -->

<div class="breadcrumb-wrapper">

	<h4 class="mainTitle no-margin">Appel d'Offres</h4>

	<ul class="pull-right breadcrumb">

		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>

		<li><a href="<?php echo base_url()?>NouvelAO"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>

		<li><a href="<?php echo base_url()?>ListeAo"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>

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

								Liste des AO

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

								<div ui-grid-selection ui-grid-edit ui-grid-pagination ui-grid-pinning ui-grid-expandable ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptions" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>

							</div>

							<div ng-show="selectedRow() != null">

								<div class="row">

									<div class="cola-md-12">

										<ul class="nav nav-tabs">

											<li><a href="#publications" data-toggle="tab">Publications</a></li>

											<li><a href="#retraits" data-toggle="tab">Retrait/Dépôt</a></li>

											<li><a href="#commission" data-toggle="tab">Travaux de la commission</a></li>

											<li><a href="#adjudication" data-toggle="tab">Adjudication</a></li>

										</ul>

										<div class="tab-content">

											<div class="tab-pane active" id="publications">

												<div ui-grid-edit ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsPublication" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>

											</div>



											<div class="tab-pane" id="retraits">

												<div ui-grid-edit ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptionsRetrait" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>

											</div>

											<div class="tab-pane" id="commission">

												<div class="row">

													<fieldset>

														<legend>

															Travaux de la commission

														</legend>

														<div class="col-md-6">

															<div class="form-group">

																<label> Date </label>

																<input ng-model="selectedRow().travaux_commission_date" type="date" class="form-control" placeholder="">

															</div>

														</div>

														<div class="col-md-6">

															<div class="form-group">

																<label> Commentaire </label>

																<input ng-model="selectedRow().travaux_commission_comment" type="text" class="form-control" placeholder="">

															</div>

														</div>

													</fieldset>

												</div>

												<div class="row" ng-show="selectedRow().ao_mode_execution == 1">

													<div ui-grid-auto-resize ui-grid-edit ui-grid-move-columns ui-grid="gridOptionsAllotis" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>

												</div>





											</div>



											<div class="tab-pane" id="adjudication">

												<div class="row">

													<fieldset>

														<legend>

															Adjudication

														</legend>

														<div class="col-md-6">

															<div class="form-group">

																<label> Date </label>

																<input ng-model="selectedRow().adjudication_date" type="date" class="form-control" placeholder="">

															</div>

														</div>

														<div class="col-md-6">

															<div class="form-group">

																<label> Commentaire </label>

																<input ng-model="selectedRow().adjudication_comment" type="text" class="form-control" placeholder="">

															</div>

														</div>

															<div class="col-md-6">

																<a class="btn btn-wide btn-default" href="<?= base_url()?>Marche?id={{selectedRow().idAO}}">

																	Nouveau marché

																</a>

															</div>

													</fieldset>

												</div>



												<div class="row">

													<fieldset>

														<legend>

															Infructuosité

														</legend>

														<div class="col-md-6">

															<div class="form-group">

																<label> Date </label>

																<input ng-model="selectedRow().infructueux_date" type="date" class="form-control" placeholder="">

															</div>

														</div>

														<div class="col-md-6">

															<div class="form-group">

																<label> Commentaire </label>

																<input ng-model="selectedRow().infructueux_comment" type="text" class="form-control" placeholder="">

															</div>

														</div>

													</fieldset>

												</div>



												<div class="row">

													<fieldset>

														<legend>

															Annulation

														</legend>

														<div class="col-md-6">

															<div class="form-group">

																<label> Date </label>

																<input ng-model="selectedRow().annulation_date" type="date" class="form-control" placeholder="">

															</div>

														</div>

														<div class="col-md-6">

															<div class="form-group">

																<label> Commentaire </label>

																<input ng-model="selectedRow().annulation_comment" type="text" class="form-control" placeholder="">

															</div>

														</div>

													</fieldset>

												</div>

											</div>

										</div>

									</div>

								</div>

								<div class="row" ng-hide="filter!='null'">

									<div class="col-md-12 text-center">

										<button ng-click="updateAO(selectedRow())" class="btn btn-wide btn-warning" style="width:30%;">

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

<script type="text/ng-template" id="expandableRowTemplate.html">

	<div ui-grid="row.entity.subGridOptions"  style="height:200px;" ui-grid-resize-columns ui-grid-cellnav ui-grid-auto-resize ui-grid-move-columns></div>

</script>



<script language="javascript">

	$(document).ready(function() {

		app.controller("ctrl", ['i18nService','$scope',  'uiGridConstants','notificationFactory','$timeout', function (i18nService,$scope, uiGridConstants,notificationFactory,$timeout) {

			i18nService.setCurrentLang('fr');

			$scope.aos = [];

			$scope.status = [{'key':0,'value':'Appel d\'offres ouvert'},{'key':1,'value':'Consultation'},{'key':2,'value':'Procédure négociée'},{'key':3,'value':'Préselection'},{'key':4,'value':'Restreint'}];

			$scope.modes = [{'key':0,'value':'Marché Unique'},{'key':1,'value':'Allotis'},{'key':2,'value':'Reconductible'},{'key':3,'value':'Tranche conditionnelle'}];

			$scope.types = [{'key':'Fonctionnement','value':'Fonctionnement'},{'key':'Investissement','value':'Investissement'}];

			console.log($scope.status);



			$scope.gridOptions = {



				expandableRowTemplate: 'expandableRowTemplate.html',

				expandableRowHeight: 200,

				expandableRowScope: {

					subGridVariable: 'subGridScope'

				},

				onRegisterApi : function (gridApi) {

				$scope.gridApi = gridApi;



				gridApi.grid.registerRowBuilder(function (row, gridOptions) {

				});

				gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {

				});

					$scope.gridApi.grid.modifyRows($scope.gridOptions.data);

					$scope.gridApi.selection.selectRow($scope.gridOptions.data[0]);

				},

				paginationPageSizes: [10, 50, 100],

				paginationPageSize: 10,

				multiSelect : false,

			}



			$scope.gridOptionsAllotis = {

				//enableRowSelection: true,

				//enableFullRowSelection : true,

				onRegisterApi : function (gridApi) {

					$scope.gridApiAllotis = gridApi;



					gridApi.grid.registerRowBuilder(function (row, gridOptions) {

					});

					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {

					});



				},

			}



			$scope.gridOptionsPublication = {

				//enableRowSelection: true,

				//enableFullRowSelection : true,

				onRegisterApi : function (gridApi) {

					$scope.gridApiPublication = gridApi;



					gridApi.grid.registerRowBuilder(function (row, gridOptions) {

					});

					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {

					});



				},

			}



			$scope.gridOptionsRetrait = {

				//enableRowSelection: true,

				//enableFullRowSelection : true,

				onRegisterApi : function (gridApi) {

					$scope.gridApiRetrait = gridApi;



					gridApi.grid.registerRowBuilder(function (row, gridOptions) {

					});

					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {

					});



				},

			}

			

			$scope.selectedRow = function()

			{

				if($scope.gridApi != undefined && $scope.gridApi != null && $scope.gridApi.selection.getSelectedRows().length == 1) {



					var selected = $scope.gridApi.selection.getSelectedRows()[0];

					$scope.gridOptionsPublication.data = selected.publications;

					$scope.gridOptionsRetrait.data = selected.retraits;

					$scope.gridOptionsAllotis.data = selected.affectations;



					$scope.gridOptionsAllotis.columnDefs[2].editDropdownOptionsArray = selected.retraits;

					$scope.gridOptionsAllotis.columnDefs[1].editDropdownOptionsArray = selected.lots;

					return selected;

				}



				return null;// ou undefined

			}



			var cellTemplateUpdate = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateAO(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';

			var cellTemplateDelete = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteAO(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';

			var statusEditableTemplate = '<div><select ui-grid-editor class="js-example-basic-single js-states form-control" ng-model="row.entity.status"><option ng-repeat="i in grid.appScope.status" value="{{i.key}}">{{i.value}}</option></select></div>';



			var cellTemplateEtat = '<div class="ui-grid-cell-contents">{{grid.appScope.getEtat(row.entity)}}</div>'



			$scope.getEtat = function(item)

			{

				if(item.adjudication_date != undefined) return "Adjugé";

				else if (item.infructueux_date != undefined) return "Infructueux";

				else if (item.annulation_date != undefined) return "Annulé";

				else return "Lancé";



			}

			$scope.gridOptions.columnDefs = [

				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" onclick="javascript:window.location=\'NouvelAO\'"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdate, sortable: false },

				{ name: 'numero', displayName: 'Numéro AO', width: "*", resizable: true,},

				{ name: 'ao_intitule', displayName: 'Intitulé', width: "*", resizable: true,

				cellTemplate : '<div class="ui-grid-cell-contents" title="{{row.entity.ao_intitule}}">{{grid.getCellValue(row, col)}}</div>',},

				{ name: 'budget_type', displayName: 'Type Budget', width: "*", resizable: true,

					editType: 'dropdown',

					editDropdownOptionsArray: $scope.types,

					editableCellTemplate: 'ui-grid/dropdownEditor',

					editDropdownIdLabel: 'key',

					editDropdownValueLabel: 'value',},

				{ name: 'date', displayName: 'Date d\'ouverture.', width: "*", resizable: true, type:'date',cellFilter :'date:\'dd/MM/yyyy\'' ,filterCellFiltered:true},

				{ name: 'status', displayName: 'Mode Passation', width: "*", resizable: true,

					editType: 'dropdown',

					editDropdownOptionsArray: $scope.status,

					editableCellTemplate: 'ui-grid/dropdownEditor',

					editDropdownIdLabel: 'key',

					editDropdownValueLabel: 'value',

					cellFilter:'mapStatus',

				},

				{ name: 'ao_mode_execution', displayName: 'Mode d\'exécution', width: "*", resizable: true,

					editType: 'dropdown',

					editDropdownOptionsArray: $scope.modes,

					editableCellTemplate: 'ui-grid/dropdownEditor',

					editDropdownIdLabel: 'key',

					editDropdownValueLabel: 'value',

					cellFilter:'mapMode',

				},

/*				{ name: 'travaux_commission_date', displayName: 'Date Comm.', width: "*", resizable: true, type:'date',cellFilter :'date:\'dd/MM/yyyy\'' ,filterCellFiltered:true},

				{ name: 'travaux_commission_comment', displayName: 'Commentaire', width: "*", resizable: true },*/

				/*{ name: 'adjudication_date', displayName: 'Date Adj.', width: "*", resizable: true, type:'date',cellFilter :'date:\'dd/MM/yyyy\'' ,filterCellFiltered:true},

				{ name: 'adjudication_comment', displayName: 'Commentaire', width: "*", resizable: true },*/

				//{ name: 'infructueux_date', displayName: 'Date Infruct.', width: "*", resizable: true, type:'date',cellFilter :'date:\'dd/MM/yyyy\'' ,filterCellFiltered:true},

				//	{ name: 'infructueux_comment', displayName: 'Commentaire', width: "*", resizable: true },

					{ name: 'etat', displayName: 'Etat', width: "*", resizable: true,enableCellEdit: true,cellTemplate:cellTemplateEtat,enableCellEdit:false,filterCellFiltered:true },

				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFiltering()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDelete, sortable: false },

			];





			$scope.toggleFilteringPublication = function () {

				$scope.gridOptionsPublication.enableFiltering = !$scope.gridOptionsPublication.enableFiltering;

				$scope.gridApiPublication.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);

			}



			$scope.toggleFilteringRetrait = function () {

				$scope.gridOptionsRetrait.enableFiltering = !$scope.gridOptionsRetrait.enableFiltering;

				$scope.gridApiRetrait.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);

			}



			$scope.toggleFilteringAffectation = function () {

				$scope.gridOptionsAllotis.enableFiltering = !$scope.gridOptionsAllotis.enableFiltering;

				$scope.gridApiAllotis.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);

			}

			

			$scope.typesJournal = [{'key':0,'value':'Lancement '},{'key':1,'value':'Rectification'}];

			var cellTemplateUpdatePublication = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updatePublication(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';

			var cellTemplateDeletePublication = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deletePublication(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';

			$scope.gridOptionsPublication.columnDefs = [

				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.addNewPublication()"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdatePublication, sortable: false },

				{ name: 'date', displayName: 'Date d\'envoi', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },

				{ name: 'type', displayName: 'Type', width: "*", resizable: true,

					editType: 'dropdown',

					editDropdownOptionsArray: $scope.typesJournal,

					editableCellTemplate: 'ui-grid/dropdownEditor',

					editDropdownIdLabel: 'key',

					editDropdownValueLabel: 'value',

					cellFilter:'mapTypeJournal',},

				{ name: 'journal', displayName: 'Journal', width: "*", resizable: true },

				{ name: 'langue', displayName: 'Langue', width: "*", resizable: true },

				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFilteringPublication()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeletePublication, sortable: false },

			];





			var cellTemplateUpdateRetrait = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateRetrait(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';

			var cellTemplateDeleteRetrait = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteRetrait(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';

			$scope.gridOptionsRetrait.columnDefs = [

				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.addNewRetrait()"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdateRetrait, sortable: false },

				{ name: 'candidat', displayName: 'Candidat', width: "*", resizable: true },

				{ name: 'retrait_date', displayName: 'Date Retrait', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },

				{ name: 'depot_date', displayName: 'Date Dépot', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },

				{ name: 'depot_heure', displayName: 'Heure Dépot', width: "*", resizable: true },

				{ name: 'comment', displayName: 'Lieu', width: "*", resizable: true },

				{ name: 'visite_lieux_responsable', displayName: 'Visite Lieu', width: "*", resizable: true },

				{ name: 'visite_lieux_date', displayName: 'Date Visite', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },

				{ name: 'depot_echan_prospect_date', displayName: 'Date échantillon/prospect', width: "*", resizable: true,type:'date',cellFilter:"date:'dd/MM/yyyy'",filterCellFiltered:true },

				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFilteringRetrait()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteRetrait, sortable: false },

			];



			var cellTemplateUpdateAffectation = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.updateAffectation(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';

			var cellTemplateDeleteAffectation = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteAffectation(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';

			var min;



			$scope.gridOptionsAllotis.columnDefs = [

				{ enableCellEdit: false, width: "40", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.addNewAffectation()"><span class="fa fa-plus text-white"></span></button>', cellTemplate: cellTemplateUpdateAffectation, sortable: false },

				{ name: 'lot', displayName: 'LOT', width: "*", resizable: true,

					editType: 'dropdown',

					editableCellTemplate: 'ui-grid/dropdownEditor',

					editDropdownIdLabel: 'lot',

					editDropdownValueLabel: 'lot',

				},

				{ name: 'candidat', displayName: 'Candidat', width: "*", resizable: true,

					editType: 'dropdown',

					//editDropdownOptionsArray: $scope.selectedRow().retraits,

					editableCellTemplate: 'ui-grid/dropdownEditor',

					editDropdownIdLabel: 'candidat',

					editDropdownValueLabel: 'candidat',

				},

				{ name: 'montant', displayName: 'Montant', width: "*", resizable: true,cellFilter:'currency:dh',

					cellClass: function(grid, row, col, rowRenderIndex, colRenderIndex) {

						var rows = grid.rows;



						//min = row.entity;

						var globalIndex = 0;





						var groupped = groupBy(rows, function(item)

						{

							return [item.entity.lot];

						});



						for(i=globalIndex;i<groupped.length;i++)

						{

							globalIndex++;

							var min = groupped[i][0];

							for(j=0;j<groupped[i].length;j++)

							{

								if(min.entity.montant > groupped[i][j].entity.montant)// 1000 > 1100

									min = groupped[i][j]; //

								//console.log(groupped[i][j].entity);



							}



							if (row.entity.montant == min.entity.montant) {

								return 'green';

							}

						}





					/*	for(i=0;i<rows.length;i++)

						{

							if(i==0)

							{

								return "green";

							}

							if(rows[i].lot != rows[i-1].lot && i != lastI)//lot 1 != lot 1

							{

								lastI = i;

								return "green";



							}

						}*/









						return "";

					}

				},

				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFilteringAffectation()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDeleteAffectation, sortable: false },

			];



			$scope.addNewPublication = function()

			{

				$scope.selectedRow().publications.unshift({id:null,ao_id:$scope.selectedRow().idAO,date:new Date()});

			}



			$scope.addNewAffectation = function()

			{

				var lot = '';

				if($scope.selectedRow().affectations.length > 0)

				{

					lot = $scope.selectedRow().affectations[0].lot;

				}

				$scope.selectedRow().affectations.unshift({id:null,ao_id:$scope.selectedRow().idAO,lot:lot});

			}



			$scope.addNewRetrait = function()

			{

				$scope.selectedRow().retraits.unshift({id:null,ao_id:$scope.selectedRow().idAO});

			}



			$scope.updatePublication = function(item)

			{



				if(item.date == undefined || item.date == null || item.date == "0")//1970

				{

					notificationFactory.warning("Entrez la date de publication","Attention");

					return;

				}



				var publication = new Object();

				publication.id = item.id;

				publication.type = item.type;

				publication.langue = item.langue;

				publication.journal = item.journal;

				publication.ao_id = item.ao_id;

				if(item.date != null)

					publication.date = item.date.getTime();

				else

					publication.date = null;





				if(publication.id == null)

				{

					$.ajax({

						type: "POST",

						url: "<?php echo base_url('ListeAO/addPublication') ?>",

						data: {publication:publication},

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

						url: "<?php echo base_url('ListeAO/updatePublication') ?>",

						data: {publication:publication},

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





			$scope.updateAffectation = function(item)

			{



				var affectation = new Object();

				affectation.id = item.id;

				affectation.montant = item.montant;

				affectation.lot = item.lot;

				affectation.candidat = item.candidat;

				affectation.ao_id = item.ao_id;



				if(item.id == null)

				{

					$.ajax({

						type: "POST",

						url: "<?php echo base_url('ListeAO/addAffectation') ?>",

						data: {affectation:affectation},

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

						url: "<?php echo base_url('ListeAO/updateAffectation') ?>",

						data: {affectation:affectation},

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



			$scope.updateRetrait = function(item)

			{



				var retrait = new Object();

				retrait.id = item.id;

				retrait.depot_heure = item.depot_heure;

				retrait.visite_lieux_responsable = item.visite_lieux_responsable;

				retrait.candidat = item.candidat;



				retrait.comment = item.comment;

				retrait.ao_id = item.ao_id;



				if(item.depot_date != null)

					retrait.depot_date = item.depot_date.getTime();

				else

					retrait.depot_date = null;



				if(item.retrait_date != null)

					retrait.retrait_date = item.retrait_date.getTime();

				else

					retrait.retrait_date = null;



				if(item.visite_lieux_date != null)

					retrait.visite_lieux_date = item.visite_lieux_date.getTime();

				else

					retrait.visite_lieux_date = null;



				if(item.depot_echan_prospect_date != null)

					retrait.depot_echan_prospect_date = item.depot_echan_prospect_date.getTime();

				else

					retrait.depot_echan_prospect_date = null;



				if(retrait.id == null)

				{

					$.ajax({

						type: "POST",

						url: "<?php echo base_url('ListeAO/addRetrait') ?>",

						data: {retrait:retrait},

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

						url: "<?php echo base_url('ListeAO/updateRetrait') ?>",

						data: {retrait:retrait},

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





			$scope.deleteRetrait = function (item)

			{

				if(confirm("Voulez vous supprimer cet enregistrement ?"))

				{

					$.ajax({

						type: "GET",

						url: "<?php echo base_url('ListeAO/deleteRetrait') ?>",

						data: {id:item.id},

						dataType:'json',

						success: function(result){

							console.log(result);

							$scope.selectedRow().retraits.splice($scope.selectedRow().retraits.indexOf(item), 1);

							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax

							notificationFactory.success();



						},error: function (jqXHR, textStatus, errorThrown) {

							console.log(textStatus);

							console.log(errorThrown);

						}

					});

				}

			}



			$scope.deletePublication = function (item)

			{

				if(confirm("Voulez vous supprimer cet enregistrement ?"))

				{

					$.ajax({

						type: "GET",

						url: "<?php echo base_url('ListeAO/deletePublication') ?>",

						data: {id:item.id},

						dataType:'json',

						success: function(result){

							console.log(result);

							$scope.selectedRow().publications.splice($scope.selectedRow().publications.indexOf(item), 1);

							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax

							notificationFactory.success();



						},error: function (jqXHR, textStatus, errorThrown) {

							console.log(textStatus);

							console.log(errorThrown);

						}

					});

				}

			}



			$scope.deleteAffectation = function (item)

			{

				if(confirm("Voulez vous supprimer cet enregistrement ?"))

				{

					$.ajax({

						type: "GET",

						url: "<?php echo base_url('ListeAO/deleteAffectation') ?>",

						data: {id:item.id},

						dataType:'json',

						success: function(result){

							console.log(result);

							$scope.selectedRow().affectations.splice($scope.selectedRow().affectations.indexOf(item), 1);

							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax

							notificationFactory.success();



						},error: function (jqXHR, textStatus, errorThrown) {

							console.log(textStatus);

							console.log(errorThrown);

						}

					});

				}

			}





			$scope.toggleFiltering = function () {

				console.log("toggle");

				$scope.gridOptions.enableFiltering = !$scope.gridOptions.enableFiltering;

				$scope.gridApi.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);

			}



			$scope.deleteAO = function (item)

			{

				if(confirm("Voulez vous supprimer cet enregistrement ?"))

				{

					$.ajax({

						type: "GET",

						url: "<?php echo base_url('ListeAO/delete') ?>",

						//data: {id:item.idAO,lots:item.lots},

						data: {id:item.idAO},

						dataType:'json',

						success: function(result){

							console.log(result);

							$scope.aos.splice($scope.aos.indexOf(item), 1);

							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax

							notificationFactory.success();



						},error: function (jqXHR, textStatus, errorThrown) {

							notificationFactory.error("Il faut supprimer les marchés liés à cet AO","Suppression impossible !");

						}

					});

				}

			}



		

			$scope.updateAO = function(item)

			{

				if(item.date == undefined || item.date == undefined)

				{

					notificationFactory.warning("Remplissez la date d'AO !","Attention")

					return;

				}



				console.log(item);



				var ao = new Object();

				ao.idAO = item.idAO;

				ao.numero = item.numero;

				ao.adjudication_comment = item.adjudication_comment;

				ao.ao_intitule = item.ao_intitule;

				ao.ao_mode_execution = item.ao_mode_execution;

				ao.publication_comment = item.publication_comment;

				ao.retrait_dossier_comment = item.retrait_dossier_comment;

				ao.status = item.status;

				ao.travaux_commission_comment = item.travaux_commission_comment;

				ao.infructueux_comment = item.infructueux_comment;

				ao.annulation_comment = item.annulation_comment;

				ao.budget_type = item.budget_type;



				if(item.date instanceof Date)

				{

					ao.date = item.date.getTime();

				}else

				{

					ao.date = item.date;

				}



				if(item.travaux_commission_date instanceof Date)

				{

					ao.travaux_commission_date = item.travaux_commission_date.getTime();

				}else

				{

					ao.travaux_commission_date = item.travaux_commission_date;

				}



				if(item.annulation_date instanceof Date)

				{

					ao.annulation_date = item.annulation_date.getTime();

				}else

				{

					ao.annulation_date = item.annulation_date;

				}



				if(item.infructueux_date instanceof Date)

				{

					ao.infructueux_date = item.infructueux_date.getTime();

				}else

				{

					ao.infructueux_date = item.infructueux_date;

				}



				if(item.retrait_dossier_date instanceof Date)

				{

					ao.retrait_dossier_date = item.retrait_dossier_date.getTime();

				}else

				{

					ao.retrait_dossier_date = item.retrait_dossier_date;

				}



				if(item.publication_date instanceof Date)

				{

					ao.publication_date = item.publication_date.getTime();

				}else

				{

					ao.publication_date = item.publication_date;

				}





				if(item.adjudication_date instanceof Date)

				{

					ao.adjudication_date = item.adjudication_date.getTime();

				}else

				{

					ao.adjudication_date = item.adjudication_date;

				}



				$.ajax({

					type: "POST",

					url: "<?php echo base_url('ListeAO/update') ?>",

					data: {ao:ao},

					dataType:'json',

					success: function(result){

						console.log(result);

						notificationFactory.success();



					},error: function (jqXHR, textStatus, errorThrown) {

						console.log(textStatus);

						console.log(errorThrown);

					}

				});



				//$scope.getData();

			}



			//var cellTemplateMontant = '<div class="ui-grid-cell-contents">{{row.entity.articles_quantite * row.entity.articles_prix | currency:dh}}</div>'



			$scope.filter = '<?php if(isset($_GET["filter"])) echo $_GET["filter"]; else echo "null"?>';



			if($scope.filter != 'null' || $scope.filter == 'lance')

			{

				$scope.gridOptions.columnDefs[0].cellTemplate = '';

				$scope.gridOptions.columnDefs[$scope.gridOptions.columnDefs.length-1].cellTemplate = '';

				$scope.gridOptions.enableCellEdit = false;



			}



			if($scope.filter == 'lance') $scope.filter = 'null';

			$scope.getData = function(){

				$.ajax({

					type: "GET",

					url: "<?php echo base_url('ListeAO/getAOs') ?>",

					cache: false,

					async: false,

					data:{filter:$scope.filter,year:$scope.selectedYear},

					success: function(result){

						console.log(result);

						$scope.aos = result;

						//console.log(result);



						for(i = 0; i < result.length; i++){

							/*if(result[i].publication_date != "0" && result[i].publication_date != null)

								result[i].publication_date = new Date(parseInt(result[i].publication_date));*/

							if(result[i].adjudication_date != "0" && result[i].adjudication_date != null)

								result[i].adjudication_date = new Date(parseInt(result[i].adjudication_date));

							if(result[i].travaux_commission_date != "0" && result[i].travaux_commission_date != null)

								result[i].travaux_commission_date = new Date(parseInt(result[i].travaux_commission_date));

							/*if(result[i].retrait_dossier_date != "0" && result[i].retrait_dossier_date != null)

								result[i].retrait_dossier_date = new Date(parseInt(result[i].retrait_dossier_date));*/

							if(result[i].infructueux_date != "0" && result[i].infructueux_date != null)

								result[i].infructueux_date = new Date(parseInt(result[i].infructueux_date));

							if(result[i].annulation_date != "0" && result[i].annulation_date != null)

								result[i].annulation_date = new Date(parseInt(result[i].annulation_date));

							if(result[i].date != "0" && result[i].date != null)

								result[i].date = new Date(parseInt(result[i].date));



							/*var total = 0;

							for(j=0;j<result[i].articles.length;j++)

								total += result[i].articles[j].articles_quantite*result[i].articles[j].articles_prix;*/



							for(j=0;j<result[i].publications.length;j++)

							{

								if(result[i].publications[j].date != "0" && result[i].publications[j].date != null)

									result[i].publications[j].date = new Date(parseInt(result[i].publications[j].date));

							}



							for(j=0;j<result[i].retraits.length;j++)

							{

								if(result[i].retraits[j].depot_date != "0" && result[i].retraits[j].depot_date != null)

									result[i].retraits[j].depot_date = new Date(parseInt(result[i].retraits[j].depot_date));

								if(result[i].retraits[j].retrait_date != "0" && result[i].retraits[j].retrait_date != null)

									result[i].retraits[j].retrait_date = new Date(parseInt(result[i].retraits[j].retrait_date));

								if(result[i].retraits[j].visite_lieux_date != "0" && result[i].retraits[j].visite_lieux_date != null)

									result[i].retraits[j].visite_lieux_date = new Date(parseInt(result[i].retraits[j].visite_lieux_date));

								if(result[i].retraits[j].depot_echan_prospect_date != "0" && result[i].retraits[j].depot_echan_prospect_date != null)

									result[i].retraits[j].depot_echan_prospect_date = new Date(parseInt(result[i].retraits[j].depot_echan_prospect_date));

							}



							result[i].subGridOptions = {

								columnDefs: [

									{name:"lot", field:"lot",displayName:'LOT', resizable: true},

									{name:"lot_intitule", field:"lot_intitule",displayName:'Intitulé', resizable: true,

										cellTemplate : '<div class="ui-grid-cell-contents" title="{{row.entity.lot_intitule}}">{{grid.getCellValue(row, col)}}</div>',},

									{name:"lot_estimation", field:"lot_estimation",displayName:'Estimation',type:'number', resizable: true,cellFilter:'currency:dh',aggregationType: uiGridConstants.aggregationTypes.sum,},

									{name:"lot_caution_provisoire", field:"lot_caution_provisoire",displayName:'Caution provisoire',type:'number', resizable: true,

										 cellFilter:'currency:dh'  },

									/*{name:"montant", field:"montant",displayName:'Montant', resizable: true,

										cellTemplate:cellTemplateMontant,

										type:'number', footerCellTemplate: '<div class="ui-grid-cell-contents" >Total : '+total.formatMoney(2)+' Dh</div>'

									},*/

								],

								data: result[i].lots,

								showColumnFooter: true,



							}



							///////////// Allotis







							/*for(j=0;j<result[i].affectations.length;j++)

							{

								result[i].affectations[j]

							}*/

						}

						$scope.gridOptions.data = $scope.aos;



					},error: function (data) {

						console.log(data);

					}

				});

			}



			function groupBy( array , f )

			{

				var groups = {};

				array.forEach( function( o )

				{

					var group = JSON.stringify( f(o) );

					groups[group] = groups[group] || [];

					groups[group].push( o );

				});

				return Object.keys(groups).map( function( group )

				{

					return groups[group];

				})

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

			//$scope.getData();

		}]);

		angular.bootstrap(document, ['AdminModule']);

	});



</script>