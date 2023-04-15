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
							<div class="col-md-3">
								<a class="btn btn-wide btn-red" href="<?=base_url()?>Payments/listBC">
									Créer OP / BC
								</a>
							</div>
							<div class="col-md-3">
								<a class="btn btn-wide btn-orange" href="<?=base_url()?>Payments/listOfBills">
									Créer OP / Dépenses
								</a>
							</div>
							<div class="col-md-3">
								<a class="btn btn-wide btn-gray" href="<?=base_url()?>Payments/listDecompte">
									Créer OP / Marchés
								</a>
							</div>
						</div>
						<div class="row"><p>&nbsp;</p></div>
							<fieldset>
								<legend>
									Liste des Ordres de payements
								</legend>

								<div class="row">
									<div class="col-md-12">
									<table class="table table-striped table-hover table-full-width" id="sample_1">
									<thead>
									<tr>
										<th class="center"><a href="<?php echo base_url().'OP/add' ?>"><i class="fa fa-plus"></i></a></th>
										<th>Numéro OP/B</th>
										<th>Type Engagement</th>
										<th>Date</th>
										<th>Mode de payment</th>
										<th>Montant</th>
										<th>Etat</th>
										<th></th>
									</tr>
									</thead>
									<tbody>
									<?php foreach($list_op as $row) :?>
									<tr>
										<td class="center"></td>
										<td><?=$row->numero . '/' . $row->id_bordereau?></td>
										<td>
											<a href="#"><div class="letter-icon-wrapper size-sm"><span class="letter-icon"><?=$row->type_engagement?></span></div></a>
										</td>
										<td><?=date_format(date_create($row->create_date),'d/m/Y')?></td>
										<td><?=$row->mode_payment?></td>
										<td><?=number_format($row->amount, 2, ',', ' ')?></td>
										<td>
											<div class="block margin-top-10">
												<?
												switch ($row->status) {
													case 'default' :
														$class = 'warning'; $label = 'en cours';
													break;
													case 'valide' :
														$class = 'success'; $label = 'Visé';
													break;
													case 'rejet' :
														$class = 'danger'; $label = 'Rejeté';
													break;
												} 

												
												switch ($row->etat) {
													case 'reo' :
														$class_2 = 'warning'; $label_2 = 'Réordonnancé';
													break;
													case 'annule' :
														$class_2 = 'danger'; $label_2 = 'Annulé';
													break;
													default :
														$class_2 = '';
												} 
												
												?>
												<span class="label label-<?=$class?>"><?=$label?></span>
												<? if (!empty($class_2)) : ?>
												<span class="label label-<?=$class_2?>"><?=$label_2?></span>
												<? endif; ?>
											</div>
										</td>
										<td class="center">
											<a href="<?=base_url()?>Payments/addOP/<?=$row->type_engagement?>/<?=$row->id_engagement?>/<?=$row->id?>" class="btn btn-transparent btn-xs"  data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-pencil"></i></a>
										</td>
									</tr>
									<?php endforeach; ?>
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