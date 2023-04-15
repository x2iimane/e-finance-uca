<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Liquidation - Bon de Commande - <?=$data->numero?></h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?php echo base_url()?>BC/"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?php echo base_url()?>ListeBC"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>


<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<?php if($this->session->flashdata('msg')): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success" style="display:<?=(isset($_GET['CISuccess']))?'':'none'?>">
					<button type="button" class="close" data-dismiss="success" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>Succès!</strong>
					Vos Modifications sont bien enregistrés.
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<form action="<?php echo base_url('BC/updateBC'); ?>" method="POST">
							<input type="hidden" name="id" value="<?=(isset($data->id))?$data->id:''?>">
							<input type="hidden" name="status" value="L">
							<fieldset>
								<legend>
									Liquider Bon de commande - <?=$data->numero?>
								</legend>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> TVA (%)  </label>
											<input required type="text" name="tva" class="form-control" value="<?=$data->tva?>" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Numéro de Facture </label>
											<input required type="text" name="num_facture" class="form-control" value="<?=$data->num_facture?>" >
										</div>
									</div>
								</div>
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label> Date de Facturation</label>
											<input required type="date" id="date_facturation" name="date_facturation" class="form-control" value="<?=$data->date_facturation?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label> Date de Réception</label>
											<input required type="date" id="date_receptiont" name="date_receptiont" class="form-control" value="<?=$data->date_receptiont?>">
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Réceptioniste </label>
											<input required type="text" name="receptioniste" class="form-control" value="<?=$data->receptioniste?>" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Numéro de Bon de livraison </label>
											<input required type="text" name="num_bl" class="form-control" value="<?=$data->num_bl?>" >
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> Date Livraison </label>
											<input required type="date" name="date_livraison" class="form-control" value="<?=$data->date_livraison?>" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Lieu Livraison </label>
											<input required type="text" name="lieu_livraison" class="form-control" value="<?=$data->lieu_livraison?>" >
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">

									<button type="submit" class="btn btn-wide btn-warning">
										Enregistrer
									</button>
										</div>
								</div>
							</fieldset>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>