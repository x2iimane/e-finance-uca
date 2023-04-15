<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Expression de Besoin</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>ExpressionBesoin/"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeExpressionBesoin"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>

<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12" id="msg">

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<a class="btn btn-wide btn-default" href="<?= base_url()?>Transfert_to_AO_BC">
									Créer AO/BC
								</a>
							</div>
						</div>
							<fieldset>
								<legend>
									Liste des expressions de besoin
								</legend>

								<div class="row">
									<div class="col-md-12">
									<table class="table table-hover" id="sample-table-1">
									<thead>
									<tr>
										<th class="center"><a href="<?php echo base_url().'ExpressionBesoin' ?>"><i class="fa fa-plus"></i></a></th>
										<th>Numéro</th>
										<th>Objet</th>
										<th>Date</th>
										<th>Service Demandeur</th>
										<th></th>
									</tr>
									</thead>
									<tbody>
									<?php
										foreach($expressionBesoins as $row)
										{
									?>
									<tr>
										<td class="center"></td>
										<td>
											<?php echo $row->numero; ?>
										</td>
										<td>
											<a href="<?php echo base_url().'transfert_to_AO_BC?expressionBesoinId='.$row->id; ?>"><?php echo $row->objet; ?></a>
										</td>
										<td>
											<?php echo date_format(date_create($row->date),'d/m/Y'); ?>

										</td>
										<td>
											<?php echo $row->service; ?>
										</td>
										<td class="center">
											<div class="visible-md visible-lg hidden-sm hidden-xs">
												<a onclick="remove(<?php echo $row->id; ?>,this)" class="btn btn-transparent btn-xs tooltips"  data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-times fa fa-white"></i></a>
											</div>
											<div class="visible-xs visible-sm hidden-md hidden-lg">
												<div class="btn-group dropdown ">
													<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right dropdown-light" role="menu">
														<li>
															<a> Supprimer </a>
														</li>
													</ul>
												</div>
											</div></td>
									</tr>
									<?php } ?>
									</tbody>
									</table>
									</div>
								</div>
							</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script language="javascript">
	$(document).ready(function() {

		  remove = function(id,t) {

			  if(!confirm("Voulez vous supprimer cet enregistrement ?")) return;
			  //alert(id);
			 // return;
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('ListeExpressionBesoin/delete') ?>",
				data: {'id': id},
				success: function (result) {
					$("#msg").html("<div class='alert alert-success'><strong>Succés!</strong> L'enregistrement est bien supprimé</div>");;

					$(t).closest('tr').remove();

				}, error: function (data) {
					console.log(data);
					$("#msg").html("<div class='alert alert-danger'><strong>Erreur !</strong> </div>");;

				}
			});
		}
	});

</script>