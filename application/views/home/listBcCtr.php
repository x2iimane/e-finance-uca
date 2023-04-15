<!-- start: BREADCRUMB -->

<div class="breadcrumb-wrapper">

	<h4 class="mainTitle no-margin"><?=$title?></h4>

	

	<ul class="pull-right breadcrumb">

		<li><a href="/welcome"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>

		<li><a href="/ListeBC"><i class="fa fa-list margin-right-5 text-large text-dark"></i>Liste BC</a></li>

	</ul>

</div>

<!-- start: BASIC TABLE -->

<div class="container-fluid container-fullw">

	<div class="row">

		<div class="col-md-12">

			<div class="panel panel-white">

				<div class="panel-body">
				<form name="setControl" id="setControl" method="POST" action="<?=base_url()?>BC/setControle">
					<table class="table table-striped table-hover table-full-width" id="sample_1">

						<thead>

							<tr>

								<th>Numéro</th>

								<th>Date BC</th>

								<th>Fournisseur</th>

								<th>Montant TTC</th>

								<th>Remarque</th>

								<th>Action</th>

							</tr>

						</thead>

						<tbody>

							<? for ($i = 0; $i < count($list_bc); $i++) : ?>

							<tr>

								<td><?=$list_bc[$i]->numero?></td>

								<td><?=date_format(date_create($list_bc[$i]->date),'d/m/Y')?></td>

								<td><?=$list_bc[$i]->fournisseurs_raison_social?></td>

								<td>

								<?=number_format(($list_bc[$i]->total + (($list_bc[$i]->total * $list_bc[$i]->tva) / 100)), 2, ',', ' ')?>											

								</td>

								<? if ($status == 'none') :?>
								<td><input type="text" name="bcRmk[]" id="bcRmk-<?=$i?>" value="<?=$list_bc[$i]->ctrl_remarque?>" style="width: 100%; display: none;"></td>
								<? endif ?>
								<? if ($status == 'progress') :?>
								<td><?=$list_bc[$i]->ctrl_remarque?></td>
								<? endif; ?>
								<td class="center">

								<div class="visible-md visible-lg hidden-sm hidden-xs">

									<input type="checkbox" name="bcCtr[]" id="<?=$i?>" value="<?=$list_bc[$i]->idBC?>" class="checky">

								</div>

								</td>

							</tr>

							<? endfor; ?>

						</tbody>

					</table>

					<table class="table table-full-width">
						<tr><td>&nbsp;</td></tr>
						<? if ($status == 'none') :?>
						<tr><td style="text-align: right;"><a class="btn btn-wide btn-orange" href="#" onclick="$( 'form:first' ).submit();">Passer les BC selectionés pour Controle</a></td></tr>
						<? endif; ?>
						<? if ($status == 'progress') :?>
						<tr><td style="text-align: right;"><a class="btn btn-wide btn-orange" href="#" id="feedCtrl">Passer les BC selectionés pour Feed de Contrôle</a></td></tr>
						<? endif; ?>
					</table>
				</form>
				</div>

			</div>

		</div>

	</div>

</div>

<!-- end: BASIC TABLE -->
<script language="javascript">
$(".checky").click(function() {
	var Id = $(this).attr('id');

	if ($( this ).is(':checked')) {
		$("#bcRmk-" + Id).show();
	}
	else {
		$("#bcRmk-" + Id).hide();
		$("#bcRmk-" + Id).val('');
	}
	
});

$('#feedCtrl').click(function(){
   var action = $('#setControl').attr('action');
   $('#setControl').attr('action', action + '/feed');

   $('#setControl').submit();
});

</script>

