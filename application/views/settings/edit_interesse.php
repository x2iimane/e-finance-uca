<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Gestion des Interessés</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?=base_url()?>settings/editInteresse"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?=base_url()?>settings/listInteresse"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>


<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<form action="<?=base_url()?>settings/saveInteresse" method="POST">
								<input type="hidden" name="cin" value="<?=(isset($data->id))?$data->cin:''?>">
							<fieldset>
								<legend>
									Ajouter / Modifier un Interessé
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
											<label> C.I.N </label>
											<input type="text" name="cin" class="form-control" placeholder="" value="<?=(isset($data->cin))?$data->cin:''?>" >
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label> Nom et Prénom </label>
											<input type="text" name="nom" class="form-control" placeholder="" value="<?=(isset($data->nom))?$data->nom:''?>" >
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label> R.I.B </label>
											<input type="text" name="rib" class="form-control" placeholder="" value="<?=(isset($data->rib))?$data->rib:''?>" >
										</div>
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