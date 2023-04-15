<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Liste des Décomptes Liquidés pour Ordonnancement</h4>
	
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
								<th>Date</th>
								<th>Intitulé</th>
								<th>Montant</th>
								<th>Numéro Marché</th>
								<th>Intitulé Marché</th>
								<th>Montant Global</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<? for ($i = 0; $i < count($list_decomptes); $i++) : ?>
							<tr>
								<td><?=date_format(date_create($list_decomptes[$i]->date),'d/m/Y')?></td>
								<td><?=$list_decomptes[$i]->intitule?></td>																
								<td><?=number_format($list_decomptes[$i]->montant, 2, ',', ' ')?></td>
								<td><?=$list_decomptes[$i]->numero?></td>
								<td><?=substr($list_decomptes[$i]->desc, 0, 35) . ' ...'?></td>
								<td><?=number_format($list_decomptes[$i]->montantTTC, 2, ',', ' ')?></td>
								<td class="center">
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="<?=base_url()?>Payments/addOP/M/<?=$list_decomptes[$i]->id?>" data-toggle="tooltip" data-placement="top" title="Passer Ordonnancement"><i class="fa fa-cc-visa"></i></a>
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
