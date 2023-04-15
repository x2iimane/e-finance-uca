<style>

	.grid {

		width: 99.7%;

		/*height: auto;*/
		height: 900px !important;

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

	<h4 class="mainTitle no-margin">Gestion des BC</h4>

	<ul class="pull-right breadcrumb">

		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>

		<li><a href="<?php echo base_url()?>BC"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>

		<li><a href="<?php echo base_url()?>ListeBC"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>

		<li><a href="<?php echo base_url()?>BC/listBcforCtr"><i class="fa fa-list margin-right-5 text-large text-dark"></i>Contrôle BC</a></li>

		<li><a href="<?php echo base_url()?>BC/listBcforCtr/progress"><i class="fa fa-list margin-right-5 text-large text-dark"></i>BC pour contrôle</a></li>

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

								Liste des BC

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

								<div ui-grid-edit ui-grid-pagination ui-grid-pinning ui-grid-expandable ui-grid-auto-resize ui-grid-move-columns ui-grid="gridOptions" ui-grid-resize-columns ui-grid-cellnav class="grid"></div>

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

			$scope.bcs = [];



			$scope.statuts = [{'key':0,'value':'Engagé'},{'key':1,'value':'Livré'},{'key':2,'value':'Liquidé'}

				,{'key':3,'value':'Ordonnancé'},{'key':4,'value':'Payé'}];

			$scope.gridOptions = {



				expandableRowTemplate: 'expandableRowTemplate.html',

				expandableRowHeight: 1000,

				enableVerticalScrollbar : 2,

				expandableRowScope: {

					subGridVariable: 'subGridScope'

				},

					onRegisterApi : function (gridApi) {

					$scope.gridApi = gridApi;



					gridApi.grid.registerRowBuilder(function (row, gridOptions) {

					});

					gridApi.cellNav.on.navigate($scope, function (newRowCol, oldRowCol) {

					});

				},

				paginationPageSizes: [100, 200, 500],

				paginationPageSize: 100,

			}



			var cellTemplateUpdate = '<a title="Paiement" style="margin-left:12px !important;"  href="<?= base_url()?>BC/edit/{{row.entity.idBC}}" class="btnGridUpdate"><i class="fa fa-money"></i></a><a style="margin-left:12px !important;"  ng-click="grid.appScope.updateBC(row.entity)" class="btnGridUpdate"><i class="fa fa-save"></i></a>';

			var cellTemplateDelete = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteBC(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';

			$scope.gridOptions.columnDefs = [

				{ enableCellEdit: false, width: "80", name: ' ', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.getData()"><span class="fa fa-refresh text-white"></span></button>', cellTemplate: cellTemplateUpdate, sortable: false },

				{ name: 'numero', displayName: 'Numéro', width: "*", resizable: true },

				{ name: 'date', displayName: 'Date BC', width: "*", resizable: true, type:'date',cellFilter :'date:\'dd/MM/yyyy\'',filterCellFiltered:true },

				{ name: 'fournisseurs_raison_social', displayName: 'Fournisseur', width: "*", resizable: true,enableCellEdit: false,

					cellTemplate : '<div class="ui-grid-cell-contents" title="{{row.entity.fournisseurs_raison_social}}">{{grid.getCellValue(row, col)}}</div>',

				},

				{ name: 'montant', displayName: 'Montant TTC', width: "*", resizable: true,enableCellEdit: false},

				{ name: 'statut', displayName: 'Statut', width: "*", resizable: true,

					editType: 'dropdown',

					editDropdownOptionsArray: $scope.statuts,

					editableCellTemplate: 'ui-grid/dropdownEditor',

					editDropdownIdLabel: 'key',

					editDropdownValueLabel: 'value',

					cellFilter:'mapStatutBC',

				},

				{ enableCellEdit: false, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFiltering()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDelete, sortable: false },



			];





			$scope.toggleFiltering = function () {

				console.log("toggle");

				$scope.gridOptions.enableFiltering = !$scope.gridOptions.enableFiltering;

				$scope.gridApi.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);

			}



			$scope.deleteBC = function (item)

			{

				if(confirm("Voulez vous supprimer cet enregistrement ?"))

				{

					$.ajax({

						type: "GET",

						url: "<?php echo base_url('ListeBC/delete') ?>",

						data: {id:item.idBC,articles:item.articles},

						dataType:'json',

						success: function(result){

							console.log(result);

							$scope.bcs.splice($scope.bcs.indexOf(item), 1);

							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax

							notificationFactory.success();



						},error: function (jqXHR, textStatus, errorThrown) {

							notificationFactory.error("Il faut supprimer les les paiements liés à ce BC","Suppression impossible !");

							console.log(textStatus);

							console.log(errorThrown);

						}

					});

				}

			}







			$scope.updateBC = function(item)

			{

				if(item.date == undefined || item.date == undefined)

				{

					notificationFactory.warning("Remplissez la date du BC !","Attention")

					return;

				}



				console.log(item);



				var bc = new Object();

				bc.idBC = item.idBC;

				bc.numero = item.numero;

				bc.statut = item.statut;

				if(item.date instanceof Date)

				{

					bc.date = item.date.getTime();

				}else

				{

					bc.date = item.date;

				}





				$.ajax({

					type: "POST",

					url: "<?php echo base_url('ListeBC/update') ?>",

					data: {bc:bc},

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



			var cellTemplateMontant = '<div class="ui-grid-cell-contents">{{row.entity.articles_quantite * row.entity.articles_prix | currency:dh}}</div>'



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

					url: "<?php echo base_url('ListeBC/getBCs') ?>",

					cache: false,

					async: false,

					data:{filter:$scope.filter,year:$scope.selectedYear},

					success: function(result){

						$scope.bcs = result;

						//console.log(result);



						for(i = 0; i < result.length; i++){

							if(result[i].publication_date != "0" && result[i].publication_date != null)

								result[i].publication_date = new Date(parseInt(result[i].publication_date));

							if(result[i].adjudication_date != "0" && result[i].adjudication_date != null)

								result[i].adjudication_date = new Date(parseInt(result[i].adjudication_date));

							if(result[i].travaux_commission_date != "0" && result[i].travaux_commission_date != null)

								result[i].travaux_commission_date = new Date(parseInt(result[i].travaux_commission_date));

							if(result[i].retrait_dossier_date != "0" && result[i].retrait_dossier_date != null)

								result[i].retrait_dossier_date = new Date(parseInt(result[i].retrait_dossier_date));

							if(result[i].infructueux_date != "0" && result[i].infructueux_date != null)

								result[i].infructueux_date = new Date(parseInt(result[i].infructueux_date));

							if(result[i].date != "0" && result[i].date != null)

								result[i].date = new Date(parseInt(result[i].date));



							var total = 0;

							for(j=0;j<result[i].articles.length;j++)

								total += result[i].articles[j].articles_quantite*result[i].articles[j].articles_prix;



							total = total + ((total * result[i].tva) / 100);



							result[i].montant = total.formatMoney(2);

							result[i].subGridOptions = {

								columnDefs: [

									{name:"articles_intitule", field:"articles_intitule",displayName:'Article',

										cellTemplate : '<div class="ui-grid-cell-contents" title="{{row.entity.articles_intitule}}">{{grid.getCellValue(row, col)}}</div>',},

									{name:"articles_description", field:"articles_description",displayName:'Déscription',

										cellTemplate : '<div class="ui-grid-cell-contents" title="{{row.entity.articles_description}}">{{grid.getCellValue(row, col)}}</div>',},

									{name:"articles_quantite", field:"articles_quantite",displayName:'Qte',type:'number'},

									{name:"articles_prix", field:"articles_prix",displayName:'P.U',type:'number'},

									{name:"montant", field:"montant",displayName:'Montant HT',

										cellTemplate:cellTemplateMontant,

										type:'number', footerCellTemplate: '<div class="ui-grid-cell-contents" >Total TTC: '+total.formatMoney(2)+' Dh</div>'

									},

								],

								data: result[i].articles,

								showColumnFooter: true,



							}

						}

						$scope.gridOptions.data = $scope.bcs;



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