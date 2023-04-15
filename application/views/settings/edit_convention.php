<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Gestion des Conventions</h4>
	<ul class="pull-right breadcrumb">
		<li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard margin-right-5 text-large text-dark"></i>Dashboard</a></li>
		<li><a href="<?=base_url()?>settings/editConvention"><i class="fa fa-edit margin-right-5 text-large text-dark"></i>Nouveau</a></li>
		<li><a href="<?=base_url()?>settings/listConvention"><i class="fa fa-list margin-right-5 text-large text-dark"></i>liste</a></li>
	</ul>
</div>


<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
							<form action="<?=base_url()?>settings/saveConvention" method="POST">
								<input type="hidden" name="id" value="<?=(isset($data->id))?$data->id:''?>">
							<fieldset>
								<legend>
									Ajouter / Modifier une Convention
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
											<label> Numéro </label>
											<input type="text" name="numero" class="form-control" placeholder="" value="<?=(isset($data->numero))?$data->numero:''?>" >
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label> Objet </label>
											<input type="text" name="objet" class="form-control" placeholder="" value="<?=(isset($data->objet))?$data->objet:''?>" >
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
	<script language="javascript">
	$(document).ready(function(){

		$("#budget_type").change(function(){
			changeEtabOrBudgetType();
		});

		function changeEtabOrBudgetType()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('ExpressionBesoin/getBudgetByEtablissement') ?>",
				data: {'etablissements_id' : 1,'budget_type' : $("#budget_type").val()},
				success: function(result){
					console.log(result);

					var $el = $("#budget_id");
					$el.empty();
					/*$el.append($("<option></option>")
					 .attr("value", '').text('Please Select'));*/
					$.each(result, function(key, value) {
						$el.append($("<option></option>")
							.attr("value", value.id).text(value.intitule + " - " + value.type));
					});

					$(".js-example-basic-single").select2();

				},error: function (data) {
					console.log('error : '+data);
				}
			});
		}
	});
</script>