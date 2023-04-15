<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Gestion des Fournisseurs</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="/Provider/editProvider"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="/Provider/listProvider"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>


<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<form action="<?=base_url()?>Provider/saveProvider" method="POST">
								<input type="hidden" name="id" value="<?=(isset($data->id))?$data->id:''?>">
							<fieldset>
								<legend>
									Ajouter / Modifier un Fournisseur
								</legend>
								
								<div class="alert alert-success" style="display:<?=(isset($_GET['CISuccess']))?'':'none'?>">
									<button type="button" class="close" data-dismiss="success" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>Succès!</strong>
									Vos Modifications sont bien enregistrés.
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Raison Social </label>
											<input type="text" name="raison_social" class="form-control" placeholder="" value="<?=(isset($data->raison_social))?$data->raison_social:''?>" >
										</div>
									</div>	
								</div>														

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Telephone </label>
											<input type="text" name="telephone" class="form-control" placeholder="" value="<?=(isset($data->telephone))?$data->telephone:''?>" >
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Adresse </label>
											<input type="text" name="adresse" class="form-control" placeholder="" value="<?=(isset($data->adresse))?$data->adresse:''?>" >
										</div>
									</div>									
								</div>

								<div class="row">
									<div class="col-md-6">
										<table class="table table-hover" id="sample-table-1">
											<thead>
												<tr>
													<th class="center"><a onclick="newLine()"><i class="fa fa-plus"></i></a></th>
													<th>R.I.B.</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php if (isset($data->rib) && count(unserialize($data->rib))>0) : ?>
													<?php $ribs = unserialize($data->rib); ?>
													<?php foreach ($ribs as $rib) : ?>
														<tr class="tr_clone">
															<td class="center col-md-1"></td>
															<td class="col-md-4">
																<input  name="rib[]" type="text" placeholder="R.I.B" class="form-control underline" value= "<?=$rib?>" pattern="\d+">
															</td>							
															<td class="center col-md-1">
																<div class="visible-md visible-lg hidden-sm hidden-xs">
																	<a onclick="deleteLine(this)" class="btn btn-transparent btn-xs tooltips"  data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-times fa fa-white"></i></a>
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
															</div>
															</td>
														</tr>
													<?php endforeach; ?>
												<?php endif; ?>
												<tr class="tr_clone">
													<td class="center col-md-1"></td>
													<td class="col-md-4">
														<input  name="rib[]" type="text" placeholder="R.I.B" class="form-control underline" pattern="\d+">
													</td>							
													<td class="center col-md-1">
														<div class="visible-md visible-lg hidden-sm hidden-xs">
															<a onclick="deleteLine(this)" class="btn btn-transparent btn-xs tooltips"  data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-times fa fa-white"></i></a>
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
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-actions">
											<button type="submit" class="btn btn-orange btn-block">
												Enregistrer
											</button>
										</div>
									</div>
								</div>
							</div>	
								
							</fieldset>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		function newLine() {
			$("#sample-table-1 tbody tr:first").clone().find("input").each(function() {
				$(this).val('');
				console.log("ok");
			}).end().appendTo("#sample-table-1");
		}

		function deleteLine(t) {
			$(t).closest('tr').remove();
		}

	</script>