<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Gestion des Projets</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="/settings/editProject"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="/settings/listProjects"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>

<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<form action="<?=base_url()?>settings/saveProject" method="POST">
								<input type="hidden" name="id" value="<?=(isset($data->id))?$data->id:''?>">
							<fieldset>
								<legend>
									Ajouter / Modifier un Projet
								</legend>
								
								<div class="alert alert-success" style="display:<?=(isset($_GET['CISuccess']))?'':'none'?>">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>Succès!</strong>Vos Modifications sont bien enregistrés.
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Intitulé </label>
											<input type="text" name="intitule" class="form-control" placeholder="" value="<?=(isset($data->intitule))?$data->intitule:''?>" >
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label> Description </label>
											<input type="text" name="description" class="form-control" placeholder="" value="<?=(isset($data->description))?$data->description:''?>" >
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
	