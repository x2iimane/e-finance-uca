<!-- start: BREADCRUMB 
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Paramètres</h4>
	
	<ul class="pull-right breadcrumb">
		<li><a href="/welcome"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<!--<li><a href="/requirments/add"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="/requirments"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>-->
<!-- start: BASIC TABLE -->

<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<p>
						<button type="button" class="btn btn-default" onclick="window.location.assign('<?=base_url()?>Product/editProduct/')">
							Nouveau Article
						</button>
					</p>
					<table class="table table-striped table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th class="center">#</th>
								<th>Intitulé</th>
								<th class="hidden-xs">Catégorie</th>
								<th>Type de dépense</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<? for ($i = 0; $i < count($list); $i++) : ?>
							<tr>
								<td class="center"><?=$list[$i]['id']?></td>
								<td class="hidden-xs"><?=$list[$i]['intitule']?></td>
								<td>
									<?=$list[$i]['category']?>
								</td>
								<td><?=$list[$i]['type_depense']?></td>
								<td class="center">
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="<?=base_url()?>Product/editProduct/<?=$list[$i]['id']?>" class="btn btn-transparent btn-xs"  data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-transparent btn-xs tooltips"  data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-times fa fa-white"></i></a>
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
