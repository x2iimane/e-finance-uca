<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Liste des Dépenses pour Ordonnancement</h4>
	
	<ul class="pull-right breadcrumb">
		<li><a href="/welcome"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="/Payments"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Liste OP</a></li>
	</ul>
</div>
<!-- start: BASIC TABLE -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<table class="table table-striped table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th>Réference</th>
								<th>Date Facturation</th>
								<th>Fournisseur</th>
								<th>Montant TTC</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<? for ($i = 0; $i < count($list_depenses); $i++) : ?>
							<tr>
								<td><?=$list_depenses[$i]->reference?></td>
								<td><?=date_format(date_create($list_depenses[$i]->date),'d/m/Y')?></td>
								<td><?=$list_depenses[$i]->raison_social?></td>
								<td><?=number_format($list_depenses[$i]->mttc, 2, ',', ' ')?></td>
								<td class="center">
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="<?=base_url()?>Payments/addOP/D/<?=$list_depenses[$i]->id?>" data-toggle="tooltip" data-placement="top" title="Passer Ordonnancement"><i class="fa fa-cc-visa"></i></a>
								</div>
								</td>
							</tr>
							<? endfor; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: BASIC TABLE -->
