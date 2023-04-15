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
	<h4 class="mainTitle no-margin">Gestion des Depenses</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>Depenses"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeDepense"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
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
								Liste des Depenses
							</legend>
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
			$scope.dps = [];
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
				},
				paginationPageSizes: [10, 50, 100],
				paginationPageSize: 10,
			}

			var cellTemplateUpdate = '<a title="Paiement" style="margin-left:12px !important;"  href="<?= base_url()?>Depenses/edit/{{row.entity.id}}" class="btnGridUpdate"><i class="fa fa-money"></i></a><a style="margin-left:12px !important;"  ng-click="grid.appScope.updateDepense(row.entity)" class="btnGridUpdate"><i class="fa fa-arrow-circle-down"></i></a>';
			var cellTemplateDelete = '<a style="margin-left:12px !important;"  ng-click="grid.appScope.deleteDP(row.entity)" class="btnGrid"><i class="fa fa-trash"></i></a>';
			$scope.gridOptions.columnDefs = [
				{ name: 'dpid', displayName: 'ID', width: "*", resizable: true },
				{ name: 'reference', displayName: 'Numéro Facture', width: "*", resizable: true },
				{ name: 'date', displayName: 'Date Facture', width: "*", resizable: true, type:'date',cellFilter :'date:\'dd/MM/yyyy\'',filterCellFiltered:true },
				{ name: 'intitule', displayName: 'Type Dépanse', width: "*", resizable: true},
				{ name: 'raison_social', displayName: 'Fournisseur', width: "*", resizable: true, enableCellEdit: false, },
				{ name: 'mttc', displayName: 'Montant', width: "*", resizable: true, cellFilter: 'number: 2',enableCellEdit: false, },
				{ name: 'statut', displayName: 'Statut', width: "*", resizable: true,enableCellEdit: false, },
				{ enableCellEdit: true, width: "40", name: '\'', allowCellFocus: false, headerCellTemplate: '<button class="btn btn-block" ng-click="grid.appScope.toggleFiltering()"><span class="fa fa-filter text-white"></span></button>', cellTemplate: cellTemplateDelete, sortable: false },
			];


			$scope.toggleFiltering = function () {
				console.log("toggle");
				$scope.gridOptions.enableFiltering = !$scope.gridOptions.enableFiltering;
				$scope.gridApi.core.notifyDataChange(uiGridConstants.dataChange.COLUMN);
			}

			$scope.deleteDP = function (item)
			{
				if(confirm("Voulez vous supprimer cet enregistrement ?"))
				{
					$.ajax({
						type: "GET",
						url: "<?php echo base_url('ListeDepense/delete') ?>",
						data: {id:item.dpid,articles:item.articles},
						dataType:'json',
						success: function(result){
							console.log(result);
							$scope.depense.splice($scope.depense.indexOf(item), 1);
							$scope.$apply();// forcer la suppression dans la vue, on peut utiliser $http (angularJS) à la place de $.ajax
							notificationFactory.success();

						},error: function (jqXHR, textStatus, errorThrown) {
							notificationFactory.error("Il faut supprimer les  articles liés à cette depense","Suppression impossible !");
							console.log(textStatus);
							console.log(errorThrown);
						}
					});
				}
			}



			$scope.updateDP = function(item)
			{
				if(item.date == undefined || item.date == undefined)
				{
					notificationFactory.warning("Remplissez la date du Depense !","Attention")
					return;
				}

				console.log(item);

				var dp = new Object();
				dp.idDP = item.idDP;
				dp.reference = item.reference;

				if(item.date instanceof Date)
				{
					dp.date = item.date.getTime();
				}else
				{
					dp.date = item.date;
				}


				$.ajax({
					type: "POST",
					url: "<?php echo base_url('ListeDepense/update') ?>",
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
					url: "<?php echo base_url('ListeDepense/getDP') ?>",
					cache: false,
					async: false,
					data:{filter:$scope.filter},
					success: function(result){
						$scope.depense = result;
						//console.log(result);

						for(i = 0; i < result.length; i++){
							if(result[i].date != "0" && result[i].date != null)
								result[i].date = new Date(parseInt(result[i].date));
							

							var total = 0;
							for(j=0;j<result[i].articles.length;j++)
							total += result[i].articles[j].articles_quantite * result[i].articles[j].articles_prix;

							result[i].montant = total.formatMoney(2);
							result[i].subGridOptions = {
								columnDefs: [
									{name:"articles_intitule", field:"articles_intitule",displayName:'Article'},
									{name:"articles_description", field:"articles_description",displayName:'Déscription'},
									{name:"articles_quantite", field:"articles_quantite",displayName:'Qte',type:'number'},
									{name:"articles_prix", field:"articles_prix",displayName:'P.U',type:'number'},
									{name:"montant", field:"montant",displayName:'Montant ',
										cellTemplate:cellTemplateMontant,
										type:'number', footerCellTemplate: '<div class="ui-grid-cell-contents" >Total H.T : '+total.formatMoney(2)+' Dh</div>'
									},
								],
								data: result[i].articles,
								showColumnFooter: true,

							}
						}
						$scope.gridOptions.data = $scope.depense;

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