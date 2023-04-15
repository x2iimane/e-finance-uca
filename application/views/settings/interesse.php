<!-- start: BASIC TABLE -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<p>
						<button type="button" class="btn btn-default" onclick="window.location.assign('<?=base_url()?>settings/editInteresse/')">
							Nouveau Interessé 
						</button>
					</p>
					<table class="table table-striped table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th>C.I.N</th>
								<th class="hidden-xs">Nom et Prénom</th>
								<th>R.I.B</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<? foreach ($list_interesse as $row) : ?>
							<tr>
								<td class="center"><?=$row->cin?></td>
								<td><?=$row->nom?></td>
								<td><?=$row->rib?></td>
								<td class="center">
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="<?=base_url()?>settings/editInteresse/<?=$row->cin?>" class="btn btn-transparent btn-xs"  data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-pencil"></i></a>
									<!--<a href="#" class="btn btn-transparent btn-xs tooltips"  data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-times fa fa-white"></i></a>-->
								</div>
								</td>
							</tr>
							<? endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: BASIC TABLE -->
